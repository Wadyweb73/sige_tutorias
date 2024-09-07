<?php
    require "app/config/Router.php";

    include "app/Models/User.php";
    include "app/Models/Actividade.php";

    include "app/Controllers/UserController.php";
    include "app/Controllers/ActividadeController.php";

    include "app/Models/Faculdade.php";
    include "app/Controllers/FaculdadeController.php";

    //include "app/Views/fragments/header.php";

    $router = new Router();
    
    $router->get('/sige_tutorias/teste', function() {
        echo "Rota de teste funcionando!";
    });


    
    $router->post('/sige_tutorias/registar', function() {
        // $faculdade = new Faculdade();
        // $faculdade->set_nomeFaculdade($_POST['nome_faculdade']);
        // $faculdade->set_endereco($_POST['endereco']);
        // $faculdade->registarFaculdade($faculdade);



        $faculdade = new Faculdade();
        $faculdadeController = new FaculdadeController();
    
        $faculdade->set_nomeFaculdade($_POST['nome_faculdade']);
        $faculdade->set_endereco($_POST['endereco']);
        
        
        $faculdadeController->registarFaculdade($faculdade);

        //echo "rota para registar funcionando";
    });


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

    //Evento
    $router->get('/tutoria', function() {
        include "app/Views/Actividade/show.php";
    });
    $router->get('/tutoria/create', function() {
        include "app/Views/Actividade/create.php";
    });
    $router->get('/tutoria/edit', function() {
        include "app/Views/Actividade/edit.php";
    });

    $router->post('/tutoria/create', function() {
        //
        $tutoria = new Tutoria();
        $tutoriaController = new ActividadeController();
        
        $tutoria->set_tutoriaAssunto($_POST['assunto']);
        $tutoria->set_tutoriaNum($_POST['tutnum']);
        $tutoria->set_tutoriaLocal($_POST['local']);
        $tutoria->set_tutoriaNumEst($_POST['numEst']);
        $tutoria->set_tutoriaStart($_POST['datestart']." ".$_POST['timestart']);
        $tutoria->set_tutoriaEnd($_POST['dateend']." ".$_POST['timeend']);      
        
        if($tutoriaController->createTutoria($tutoria)){
            header("Location: /tutoria");
        }
        
    });
    $router->post('/tutoria/edit', function() {
        //
    });


    $router->run();

