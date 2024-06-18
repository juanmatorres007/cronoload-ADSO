<?php
include_once "../../controller/registerController.php";

extract($_REQUEST);

$registerController = new RegisterController();

    // Lógica para determinar qué tabla se está registrando y extraer los datos correspondientes
    switch ($tabla) {
        case 'knowledge_area':
            $nameAreaKnow = $_POST['name_area'] ?? '';
            $registerDate = $_POST['registerDate'] ?? '';
            $state = $_POST['state'] ?? '';

                $registerController->registerAreaKnow($nameAreaKnow, $registerDate, $state);

            break;
        case 'program':
            $name_program = $_POST['name_program'] ?? '';
            $registerDate = $_POST['registerDate'] ?? '';
            $code = $_POST['code'] ?? '';
            $version = $_POST['version'] ?? '';
            $programType = $_POST['programType'] ?? '';
            $state = $_POST['state'] ?? '';
            $projectId = $_POST['projectId'] ?? '';

                $registerController->registerProgram($name_program, $registerDate, $code, $version, $programType, $state, $projectId);

            break;
        case 'ficha':
            $numberFicha = $_POST['numeroFicha'] ?? '';
            $state = $_POST['state'] ?? '';
            $startDate = $_POST['fecha_inicio'] ?? '';
            $endDate = $_POST['fecha_fin'] ?? '';
            $projectId = $_POST['projectId'] ?? '';

                $registerController->registerFile($numberFicha, $state, $startDate, $endDate, $projectId);

            break;
        case 'project':
            $nameProject = $_POST['nameProyect'] ?? '';
            $numberProject = $_POST['numeroProyect'] ?? '';
            $state = $_POST['state'] ?? '';
            $registerDate = $_POST['registerDate'] ?? '';
            $areaKnowId = $_POST['areaKnowId'] ?? '';

                $registerController->registerProject($nameProject, $numberProject, $state, $registerDate, $areaKnowId);

            break;
        case 'contract':
            $nameContract = $_POST['nameContract'] ?? '';

                $registerController->registerContract($nameContract);

            break;
        case 'genero':   
            $nameGenero = $_POST['nameGenero'] ?? '';
            $state = $_POST['state'] ?? '';

                $registerController->registerGenero($nameGenero, $state);

            break;
        case 'phase':
            $namePhase = $_POST['namePhase'] ?? '';
            $registerDate = $_POST['registerDate'] ?? '';
            $state = $_POST['state'] ?? '';
            $projectId = $_POST['projectId'] ?? '';

                $registerController->registerPhase($namePhase, $registerDate, $state, $projectId);

            break;
        case 'formation_lvl':
            $nameFormationLvl = $_POST['nameFormationLvl'] ?? '';

                $registerController->registerFormationLvl($nameFormationLvl);

            break;
        case 'activity':
            $nameActivity = $_POST['nameActivity'] ?? '';
            $registerDate = $_POST['registerDate'] ?? '';
            $state = $_POST['state'] ?? '';
            $phaseId = $_POST['phaseId'] ?? '';

                $registerController->registerActivity($nameActivity, $registerDate, $state, $phaseId);

            break;
        case 'competition':
            $nameCompetition = $_POST['nameCompetition'] ?? '';
            $numberCompetition = $_POST['numberCompetition'] ?? '';
            $registerDate = $_POST['registerDate'] ?? '';
            $state = $_POST['state'] ?? '';
            $activityId = $_POST['activityId'] ?? '';

                $registerController->registerCompetition($nameCompetition, $numberCompetition, $registerDate, $state, $activityId);

            break;
        case 'result': 
            $nameResult = $_POST['nameResult'] ?? '';
            $registerDate = $_POST['registerDate'] ?? '';
            $state = $_POST['state'] ?? '';
            $competitionId = $_POST['competitionId'] ?? '';
            $knowAreaId = $_POST['knowAreaId'] ?? '';

                $registerController->registerResult($nameResult, $registerDate, $state, $competitionId, $knowAreaId);

            break;
        //     // Lógica para extraer los datos de tabla si es necesario
        //     break;

        default:
            // Manejo de caso por defecto o error si la tabla no es reconocida
            break;
    }

    header("Location: ../contenido.php?dato=consulta_general");
    exit();


?>

