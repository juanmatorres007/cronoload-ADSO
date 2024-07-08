<?php

class CalendarModel{
  private $conn;

  public function __construct() {
    $this->db();
  }

  public function db() {
    $this-> conn = conectaDb();
  }

//---------------SELECCION TOTAL DE CRONOGRAMAS---------------//

public function getFichaCalendar() {
  $query = "SELECT * FROM ficha WHERE state_file = '1'";
  $stmt = $this->conn->prepare($query);
  $stmt->execute();
  $fichas = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $fichas;
}

//---------------SELECCION TOTAL DE CRONOGRAMAS---------------//


//---------------------CONSULTA CALENDAR---------------------//

public function getFichaCalendarById($fichaId) {
  $stmt = $this->conn->prepare("SELECT e.*, c.id_auto_cal FROM events e INNER JOIN calendar c
  ON e.id_cal_eve = c.id_auto_cal WHERE c.id_fil_cal = :fichaId");
  $stmt->bindParam(':fichaId', $fichaId, PDO::PARAM_INT);
  $stmt->execute();
  $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $allDays = [];

  // Añade días vacíos al calendario
  $start = new DateTime('first day of this month');
  $end = new DateTime('last day of this month');
  $end->modify('+1 day');
  $interval = new DateInterval('P1D');
  $period = new DatePeriod($start, $interval, $end);

  foreach ($period as $date) {
      $dateString = $date->format('Y-m-d');
      $dayData = [
        'date' => $dateString,
        'title' => 'Hola'
      ];

      foreach ($events as $event) {
          if ($event['date_eve'] == $dateString) {
              $dayData['id_comp_eve'] = $event['id_cal_eve'];
              break;
          }
      }
      $allDays[] = $dayData;
  }
  return $allDays;
}

//---------------------CONSULTA CALENDAR---------------------//

//----------------------CONSULTA MODAL----------------------//

public function getInstructorsByCompetition($compId, $areaId){
  $stmt = $this->conn->prepare("SELECT u.id_auto_user, name_user, lastname_user FROM user u 
  INNER JOIN relation_rol_user rr ON u.id_auto_user = rr.id_user_relaru
  INNER JOIN rol r ON rr.id_rol_relaru = r.id_auto_rol 
  INNER JOIN knowledge_area k ON u.id_know_user = k.id_auto_know
  INNER JOIN competition c ON k.id_auto_know = c.id_area_comp
  WHERE r.id_auto_rol = 4 AND c.id_auto_comp = ? AND c.id_area_comp = ?");
  $stmt->bindParam(1, $compId);
  $stmt->bindParam(2, $areaId);
  $stmt->execute();

  return $stmt->fetchAll();
}

public function getCompetition(){
  $stmt = $this->conn->prepare("SELECT * FROM competition");
  $stmt->execute();

  return $stmt->fetchALL(PDO::FETCH_ASSOC);
}

public function getResultados(){
  $stmt = $this->conn->prepare("SELECT * FROM result");
  $stmt->execute();

  return $stmt->fetchAll();
}

public function getCalendarByFicha($fichaId) {
  try {
      $stmt = $this->conn->prepare("SELECT id_auto_cal FROM calendar WHERE id_fil_cal = ?");
      $stmt->bindParam(1, $fichaId, PDO::PARAM_INT);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch pq solo es un unico resultado el q se espera

      if ($result) {
          return $result;
      } else {
          throw new Exception("No se encontró ningún calendario para la ficha ID: $fichaId");
      }
  } catch (PDOException $e) {
      throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
  }
}

//----------------------CONSULTA MODAL----------------------//

public function saveEvent($data){
  $stmt = $this->conn->prepare("INSERT INTO events (date_eve, id_user_eve, id_comp_eve, id_res_eve, id_cal_eve) VALUES (?,?,?,?,?)");
  $stmt->bindParam(1, $data['calendarDate']);
  $stmt->bindParam(2, $data['calendarInstructor']);
  $stmt->bindParam(3, $data['calendarCompetition']);
  $stmt->bindParam(4, $data['calendarResult']);
  $stmt->bindParam(5, $data['calendarId']);
  $stmt->execute();

  return $stmt->rowCount();
}

public function getEventsByCalendarId($calendarId){
  $stmt = $this->conn->prepare("SELECT id_comp_eve AS title, date_eve AS start FROM events 
  WHERE id_cal_eve = :calendarId");
  $stmt->bindParam('calendarId', $calendarId);  
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}