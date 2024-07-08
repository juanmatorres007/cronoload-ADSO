<?php
include_once dirname(__DIR__) . "/conexion/conexion.php";
include_once dirname(__DIR__) . "/model/calendarModel.php";

class CalendarController{

  //-----------------------CALENDAR-----------------------//

  public function getFichaCalendar(){
    $calendarModel = new CalendarModel();
    $fichas = $calendarModel->getFichaCalendar();

    return $fichas; 
  }

  public function getFichaCalendarById($fichaId){
    $calendarModel = new CalendarModel();
    $getFichaCalendarById = $calendarModel->getFichaCalendarById($fichaId);
    
    return $getFichaCalendarById;
  }

  //-----------------------CALENDAR-----------------------//

  //-----------------MODAL DEL CALENDARIO-----------------//

  public function getCompetition(){
    $calendarModel = new CalendarModel();
    $getAreas = $calendarModel->getCompetition();

    return $getAreas;
  }

  public function getResultados(){
    $calendarModel = new CalendarModel();
    $getResultados = $calendarModel->getResultados();

    return $getResultados;
  }

  public function getInstructorsByCompetition($compId, $areaId){
    $calendarModel = new CalendarModel();
    $getInstructorByArea = $calendarModel->getInstructorsByCompetition($compId, $areaId);

    return $getInstructorByArea;
  }

  // public function getCalendarByFicha($fichaId){
  //   $calendarModel = new CalendarModel();
  //   $getCalendarByFicha = $calendarModel->getCalendarByFicha($fichaId);

  //   return $getCalendarByFicha;
  // }

  //-----------------MODAL DEL CALENDARIO-----------------//

  public function saveEvent($data) {
    $calendarModel = new CalendarModel;
    $saveEvent = $calendarModel->saveEvent($data);

    return $saveEvent;
  }

public function getEventsByCalendarId($calendarId) {
    $calendarModel = new CalendarModel;
    $getEventsByCalendarId = $calendarModel->getEventsByCalendarId($calendarId);

    return $getEventsByCalendarId;
}

}