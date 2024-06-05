<?php
class EventModel {
  private $dbConnection;

  public function __construct($dbConnection) {
    $this->dbConnection = $dbConnection;
  }

  public function getEvents() {
    // Consulta a la base de datos para obtener los eventos
    $query = "SELECT * FROM events";
    $result = $this->dbConnection->query($query);
    $events = $result->fetchAll(PDO::FETCH_ASSOC);
    return $events;
  }

  // Métodos adicionales para agregar, editar y eliminar eventos
}
?>
