<?php

include_once "../../conexion/conexion.php";
require_once '../../model/registerModel.php';


class FormController {


    //----------------------------------------FORMULARIO REGISTRO----------------------------------------//
    public function showForm() {
        $registerModel = new RegisterModel();
        if (isset($_GET['tabla'])) {
            $tabla = $_GET['tabla'];

            $titulo = '';
            $campos = array();

            switch ($tabla) {
            
                case 'knowledge_area':
                    $titulo = 'Nuevo Registro de Área de Conocimiento';
                    $campos = array(
                        array('label' => 'Nombre del Área:', 'name' => 'name_area', 'type' => 'text', 'required' => true),
                        array('label' => 'Fecha de registro:', 'name' => 'registerDate', 'type' => 'date', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                    );
                    break;
                case 'program':
                    $titulo = 'Nuevo Registro de Programa';
                    $campos = array(
                        array('label' => 'Nombre del Programa:', 'name' => 'name_program', 'type' => 'text', 'required' => true),
                        array('label' => 'Fecha de registro:', 'name' => 'registerDate', 'type' => 'date', 'required' => true),
                        array('label' => 'Codigo:', 'name' => 'code', 'type' => 'int', 'required' => true),
                        array('label' => 'Version:', 'name' => 'version', 'type' => 'float', 'required' => true),
                        array('label' => 'Tipo de programa:', 'name' => 'programType', 'type' => 'text', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                        array('label' => 'ID del Proyecto:', 'name' => 'projectId', 'type' => 'select', 'required' => true, 'option' => $registerModel->getProyectosOptions()),
                    );
                    break;
                case 'ficha':
                    $titulo = 'Nuevo Registro de Ficha';
                    $campos = array(
                        array('label' => 'Número de Ficha:', 'name' => 'numeroFicha', 'type' => 'int', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                        array('label' => 'Fecha de Inicio:', 'name' => 'fecha_inicio', 'type' => 'date', 'required' => true),
                        array('label' => 'Fecha de Finalización:', 'name' => 'fecha_fin', 'type' => 'date', 'required' => false),
                        array('label' => 'ID del Proyecto:', 'name' => 'projectId', 'type' => 'select', 'required' => true, 'option' => $registerModel->getProyectosOptions()),
                    );
                    break;
                case 'project':
                    $titulo = 'Nuevo Registro de Proyecto';
                    $campos = array(
                        array('label' => 'Nombre de Proyecto:', 'name' => 'nameProyect', 'type' => 'text', 'required' => true),
                        array('label' => 'Número de Proyecto:', 'name' => 'numeroProyect', 'type' => 'int', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                        array('label' => 'Fecha de Registro:', 'name' => 'registerDate', 'type' => 'date', 'required' => true),
                        array('label' => 'ID area de conocimiento:', 'name' => 'areaKnowId', 'type' => 'select', 'required' => true, 'option' => $registerModel->getAreasConocimientoOptions())
                    );
                    break;
                case 'contract':
                    $titulo = 'Nuevo Registro de Contrato';
                    $campos = array(
                        array('label' => 'Nombre de Contrato:', 'name' => 'nameContract', 'type' => 'text', 'required' => true),
                    );
                    break;
                case 'genero':
                    $titulo = 'Nuevo Registro de Genero';
                    $campos = array(
                        array('label' => 'Nombre de Genero:', 'name' => 'nameGenero', 'type' => 'text', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                    );
                    break;
                case 'phase':
                    $titulo = 'Nuevo Registro de Fase';
                    $campos = array(
                        array('label' => 'Nombre de Fase:', 'name' => 'namePhase', 'type' => 'text', 'required' => true),
                        array('label' => 'Fecha de Registro:', 'name' => 'registerDate', 'type' => 'date', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                        array('label' => 'ID del Proyecto:', 'name' => 'projectId', 'type' => 'select', 'required' => false, 'option' => $registerModel->getProyectosOptions()) //No se pq esto va aqui
                    );
                    break;
                case 'formation_lvl':
                    $titulo = 'Nuevo Registro de Nivel Formativo';
                    $campos = array(
                        array('label' => 'Nombre de Nivel Formativo:', 'name' => 'nameFormationLvl', 'type' => 'text', 'required' => true),
                    );
                    break;
                case 'activity':
                    $titulo = 'Nuevo Registro de Actividad';
                    $campos = array(
                        array('label' => 'Nombre de Actividad:', 'name' => 'nameActivity', 'type' => 'text', 'required' => true),
                        array('label' => 'Fecha de Registro:', 'name' => 'registerDate', 'type' => 'date', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                        array('label' => 'ID de la Fase:', 'name' => 'phaseId', 'type' => 'select', 'required' => false, 'option' => $registerModel->getFasesOptions())
                    );
                    break;
                case 'competition':
                    $titulo = 'Nuevo Registro de Competición';
                    $campos = array(
                        array('label' => 'Nombre de la competicion:', 'name' => 'nameCompetition', 'type' => 'text', 'required' => true),
                        array('label' => 'Numero de la competición', 'name' => 'numberCompetition', 'type' => 'int', 'required' => true),
                        array('label' => 'Fecha de Registro:', 'name' => 'registerDate', 'type' => 'date', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                        array('label' => 'ID de la Actividad:', 'name' => 'activityId', 'type' => 'select', 'required' => false, 'option' => $registerModel->getActividadesOptions())
                    );
                    break;
                case 'result':
                    $titulo = 'Nuevo Registro de Resultado';
                    $campos = array(
                        array('label' => 'Nombre de Resultado:', 'name' => 'nameResult', 'type' => 'text', 'required' => true),
                        array('label' => 'Fecha de Registro:', 'name' => 'registerDate', 'type' => 'date', 'required' => true),
                        array('label' => 'Estado:', 'name' => 'state', 'type' => 'select', 'option' => $registerModel->getStatesOptions(), 'required' => true),
                        array('label' => 'ID de la Competencia:', 'name' => 'competitionId', 'type' => 'select', 'required' => true, 'option' => $registerModel->getCompeticionesOptions()),
                        array('label' => 'ID del Area de Conocimiento:', 'name' => 'knowAreaId', 'type' => 'select', 'required' => false, 'option' => $registerModel->getAreasConocimientoOptions())
                    );
                    break;
                default:
                    // En caso de tabla no reconocida, puedes redirigir o mostrar un mensaje de error
                    echo 'Tabla no válida.';
                    exit;
            }

            // Incluye la vista correspondiente
            include "../view/Registros/generales.php";
        }
    }

    //----------------------------------------FORMULARIO REGISTRO----------------------------------------//

}

$formController = new FormController();
$formController->showForm();
?>
