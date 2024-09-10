<?php
    require "app/config/Router.php";

    include "app/Models/User.php";
    include "app/Controllers/UserController.php";
 

    include "app/Models/Tutoria.php";
    include "app/Controllers/TutoriaController.php";

    include "app/Models/Faculdade.php";
    include "app/Controllers/FaculdadeController.php";

    //include "app/Views/fragments/header.php";

    $router = new Router();
    
    $router->get('/sige_tutorias/teste', function() {
        echo "Rota de teste funcionando!";
    });


    /*----------------- FACULDADE ----------------------*/
    $router->post('/sige_tutorias/faculdade/registar', function() {
        $faculdade = new Faculdade();
        $faculdadeController = new FaculdadeController();
    
        $faculdade->set_nomeFaculdade($_POST['nome_faculdade']);
        $faculdade->set_endereco($_POST['endereco']);
        $faculdadeController->registarFaculdade($faculdade);

        //echo "rota para registar funcionando";
    });


    $router->get('/sige_tutorias/faculdade/{id}', function($id) {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->visualizarFaculdade($id);
    });
    
    $router->get('/sige_tutorias/faculdades', function() {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->listarFaculdades();
        
    });
    
    $router->post('/sige_tutorias/faculdade/{id}/actualizar', function($id) {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->actualizarFaculdade($id, $_POST['nome_faculdade'], $_POST['endereco']);
    });
    

    $router->delete('/sige_tutorias/faculdade/{id}/apagar', function($id) {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->apagarFaculdade($id);
    });


    // tutoria
    $router->post('/sige_tutorias/tutoria/registar', function() {
        $tutoria = new Tutoria();
        $tutoriaController = new TutoriaController();
    
        $tutoria->setIdDisciplina($_POST['id_disciplina']);
        $tutoria->setIdDocente($_POST['id_docente']);
        $tutoria->setHoraInicio($_POST['hora_inicio']);
        $tutoria->setHoraTermino($_POST['hora_termino']);
        $tutoria->setDataRegisto($_POST['data_registo']);
        $tutoria->setDataRealizacao($_POST['data_realizacao']);
        $tutoria->setDescricao($_POST['descricao']);
        
        $tutoriaController->registarTutoria($tutoria);
    });
    
   
    $router->get('/sige_tutorias/tutoria/{id}', function($id) {
        $tutoriaController = new TutoriaController();
        $tutoriaController->visualizarTutoria($id);
    });
    
 
    $router->get('/sige_tutorias/tutorias', function() {
        $tutoriaController = new TutoriaController();
        $tutoriaController->listarTutorias();
    });
    
  
    $router->post('/sige_tutorias/tutoria/{id}/actualizar', function($id) {
        $tutoriaController = new TutoriaController();
        $tutoriaController->actualizarTutoria(
            $id,
            $_POST['id_disciplina'],
            $_POST['id_docente'],
            $_POST['hora_inicio'],
            $_POST['hora_termino'],
            $_POST['data_registo'],
            $_POST['data_realizacao'],
            $_POST['descricao']
        );
    });
    
    $router->delete('/sige_tutorias/tutoria/{id}/apagar', function($id) {
        $tutoriaController = new TutoriaController();
        $tutoriaController->apagarTutoria($id);
    });
    

    // --------------- Rota que nao sei qual e a ideia -------------//
    $router->get('/', function() {
        include "public/index.php";
    });
    $router->get('/home', function() {
        include "app/Views/index.php";
    });
    $router->get('/exit', function() {
        session_destroy();
    });

    

    //Auth
    $router->get('/entrar', function() {
        include "app/Views/auth/login.php";
    });
    $router->get('/registar', function() {
        include "app/Views/auth/signin.php";
    });
    $router->post('/entrar', function() {
        $user = new User();
        $userController = new UserController();
        $user->set_uEmail($_POST['email']);
        $user->set_uPasswd($_POST['passwd']);
        
        if($userController->login($user->get_uEmail(), $user->get_uPasswd())){
            header("Location: /home");
        }
        
    });
    $router->post('/registar', function() {
        $user = new User();
        $userController = new UserController();
        $user->set_uName($_POST['name']);
        $user->set_uSurname($_POST['surname']);
        $user->set_uEmail($_POST['email']);
        $user->set_uPasswd($_POST['passwd']);
        
        if($userController->signin($user->get_uName(), $user->get_uSurname(), $user->get_uEmail(), $user->get_uPasswd())){
            header("Location: /entrar");
        }
        
    });

    //--------------------- tutoria ---------------------- //
        // $router->get('/tutoria', function() {
        //     include "app/Views/Actividade/show.php";
        // });
        // $router->get('/tutoria/create', function() {
        //     include "app/Views/Actividade/create.php";
        // });
        // $router->get('/tutoria/edit', function() {
        //     include "app/Views/Actividade/edit.php";
        // });

    $router->post('/tutoria/registar', function() {
        //
        $tutoria = new Tutoria();
        $tutoriaController = new TutoriaController();
        
        
       
        
    });
   
    $router->run();

