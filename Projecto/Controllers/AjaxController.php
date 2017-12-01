<?php
    include_once 'AdministrativoController.php';
    include_once 'UserController.php';
    include_once 'HorarioController.php';
    include_once 'RegistadoController.php';
    include_once 'MarcacaoController.php';
    include_once 'TratamentoController.php';
    include_once 'ProfissionalController.php';
    include_once 'CategoriaController.php';

    $response = "";
    $action = filter_input(INPUT_POST, 'action');
    
    $admvControl = new AdministrativoController();
    $userControl = new UserController();
    $horaControl = new HorarioController();
    $registadoControl = new RegistadoController();
    $marcControl = new MarcacaoController();
    $catControl = new CategoriaController();
    $tratamentoControl = new TratamentoController();
    $profissionalControl = new ProfissionalController();
    
    if ($action == "login") {
        $response = $userControl->login();
    } else if ($action == "logout") {
        $response = $userControl->logout();
    } else if ($action == "veriyUserName") {
         
    } else if ($action == "registrar") {
        $response = $registadoControl->createUser();
    } 
    /** COUNTERS REPORT **/
    else if ($action == "countProfissional") {
        $response = $profissionalControl->countProfessional();  
    } else if ($action == "countTreatments") {
        $response = $tratamentoControl->countTreatments();
    } else if ($action == "countUserMarc") {
        $response = $marcControl->countUsersWithMarking();
    } else if ($action == "countAllMarc") {
        $response = $marcControl->countAllMarking();
    } else if ($action == "countMarcActives") {
        $response = $marcControl->countActivesMarking();
    } else if ($action == "countMarcRejected") {
        $response = $marcControl->countRejectedMarking();
    } else if ($action == "countMarcById") {
        session_name(md5(SESSION_COOKIE_NAME));
        session_start();
        $response = $marcControl->countAllMarking($_SESSION[SESSION_ID]);
    } else if ($action == "countMarcWainting") {
        $response = $marcControl->countWaintingMarking();
    } else if ($action == "countTratMarked") {
        $response = $marcControl->countServiceMarked();
    } else if ($action == "countProfessionalMarked") {
        $response = $marcControl->countProfessionalMarked();
    }elseif ($action == "countUsers") {
        $response = $registadoControl->countAllUsers();
    } else if ($action == "countActives") {
        $response = $registadoControl->countUsersActive();
    } else if ($action == "countBlocked") {
        $response = $registadoControl->countUsersBlocked();
    } else if ($action == "countWaiting") {
        $response = $registadoControl->countUsersWainting();
    }
    
    /** PODIOS REPORT **/
    else if ($action == "HorarioPodio") {
        $response = $horaControl->horarioPodio();
    } else if ($action == "podioUser") {
        $response = $registadoControl->userPodio();
    } else if ($action == "podioProfessional") {
        $response = $profissionalControl->profissionalPodio();
    } else if ($action == "podioTreatment") {
        $response = $tratamentoControl->treatmentPodio();
    }
    
    /** Treatments **/
    else if ($action == "treatment") {
        $response = $tratamentoControl->getAllTreatments();
    } else if ($action == "catTreatments") {
        $response = $tratamentoControl->getTreatmentsByCategory();
    } else if ($action == "createTreatment") {
        $response = $tratamentoControl->createTreatment();
    } else if ($action == "editTreatment") {
        $response = $tratamentoControl->updateTreatment();
    } else if ($action == "removeTreatment") {
        $response = $tratamentoControl->deleteTreatment();
    }
    
    /** Professional **/
    else if ($action == "professional") {
        $response = $profissionalControl->getAllProfessional();
    } else if ($action == "createProfessional") {
        $response = $profissionalControl->createProfessional();
    } else if ($action == "editProfessional") {
        $response = $profissionalControl->updateProfessional();
    } else if ($action == "removeProfessional") {
        $response = $profissionalControl->deleteProfessional();
    } else if ($action == "ProfessionalSchedule") {
        $response = $profissionalControl->getProfessionalSchedule();
    } else if ($action == "availableSchedule") {
        $response = $profissionalControl->getAvailableSchedule();
    } else if ($action == "ProfessionalFreeSchedule") {
        $response = $profissionalControl->getProfessionalFreeSchedule();
    } else if ($action == "ProfessionalTreatments") {
        $response = $profissionalControl->getProfessionalTreatments();
    } else if ($action == "ProfessionalsByTreatment") {
        $response = $profissionalControl->getProfessionalsByTreatment();
    } else if ($action == "ProfessionalOtherTreatments") {
        $response = $profissionalControl->getProfessionalOtherTreatments();
    } else if ($action == "createService") {
        $response = $profissionalControl->createService();
    } else if ($action == "removeSchedule") {
        $response = $profissionalControl->deleteProfessionalSchedule();
    } else if ($action == "removeProfTreatment") {
        $response = $profissionalControl->deleteProfessionalTreatment();
    }
    
    /** Categories **/
    else if ($action == "allCategories") {
        $response = $catControl->getAllCategories();
    } else if ($action == "categories") {
        $response = $catControl->getCategoriesWithTreatments();
    }
    /** Schedule **/
    else if ($action == "schedule") {
        $response = $horaControl->getAllSchedule();
    }
    /** Service **/
    
    /** Client **/
    else if ($action == "client") {
        $response = $registadoControl->getAllUsers();
    } else if ($action == "clientEspera") {
        $response = $registadoControl->getUsersByStatus(ESPERA);
    } else if ($action == "clientActivado") {
        $response = $registadoControl->getUsersByStatus(ACTIVADO);
    } else if ($action == "clientBloqueado") {
        $response = $registadoControl->getUsersByStatus(BLOQUEADO);
    } else if ($action == "changeStatus") {
        $response = $registadoControl->changeStatus();
    } else if ($action == "removeClient") {
        $response = $registadoControl->deleteUser();
    }
    
    
    /** Administrative **/
    else if($action == "administrativo") {
        $response = $admvControl->getAllAdministratives();
    } else if($action == "createAdministrative") {
        $response = $admvControl->create();
    } else if($action == "removeAdministrative") {
        $response = $admvControl->deleteAdministrative();
    }
    //Users profile
    else if ($action == "getUserData") {
        $response = $userControl->getData();
    }
    else if ($action == "editUserProfile") {
        $response = $userControl->updateProfile();
    }
    else if ($action == "editUserCredencial") {
        $response = $userControl->updateCredentials();
    }
    
    
    header("Content-type: application/json");
    echo json_encode($response);