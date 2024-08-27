<?php
    require "app/config/Router.php";

    include "app/Models/User.php";
    include "app/Models/Event.php";
    include "app/Models/Faculty.php";
    include "app/Models/Amphitheatre.php";

    include "app/Controllers/UserController.php";
    include "app/Controllers/EventController.php";
    include "app/Controllers/FacultyController.php";
    include "app/Controllers/AmphController.php";

    include "app/Views/fragments/header.php";

    $router = new Router();

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
    $router->get('/evento', function() {
        include "app/Views/Event/show.php";
    });
    $router->get('/evento/create', function() {
        include "app/Views/Event/create.php";
    });
    $router->get('/evento/edit', function() {
        include "app/Views/Event/edit.php";
    });

    $router->post('/evento/create', function() {
        //
        $event = new Event();
        $eventController = new EventController();
        
        $event->set_eventTitle($_POST['tema']);
        $event->set_eventType($_POST['tipoEvento']);
        $event->set_eventFaculty($_POST['faculdade']);
        $event->set_eventSpeakers($_POST['orador']);
        $event->set_eventTargetAudience($_POST['publicoAlvo']);
        $event->set_eventPartners($_POST['parceiro']);
        $event->set_eventDescription($_POST['descricao']);
        $event->set_eventDate($_POST['datestart']." ".$_POST['timestart']);
        $event->set_eventTime($_POST['dateend']." ".$_POST['timeend']);      
        
        /*
        if($eventController->createEvent($event->get_eventTitle(), $event->get_eventType(), $event->get_eventFaculty(), $event->get_eventSpeakers(), $event->get_eventTargetAudience(), $event->get_eventPartners(), $event->get_eventDescription(), $event->get_eventDate(), $event->get_eventTime())){
            header("Location: /evento");
        }*/
        if($eventController->createEvent($event)){
            header("Location: /evento");
        }
        
    });
    $router->post('/evento/edit', function() {
        //
    });

    //Anfitetro
    $router->get('/anfiteatro', function() {
        include "app/Views/Amphitheatre/show.php";
    });
    $router->get('/anfiteatro/create', function() {
        include "app/Views/Amphitheatre/create.php";
    });
    $router->get('/anfiteatro/edit', function() {
        include "app/Views/Amphitheatre/edit.php";
    });

    $router->post('/anfiteatro/create', function() {
        //
    });
    $router->post('/anfiteatro/edit', function() {
        //
    });
   
    //Faculdade
    $router->get('/faculdade', function() {
        include "app/Views/Faculty/show.php";
    });
    $router->get('/faculdade/create', function() {
        include "app/Views/Faculty/create.php";
    });
    $router->get('/faculdade/edit', function() {
        include "app/Views/Faculty/edit.php";
    });

    $router->post('/faculdade/create', function() {
        //
    });
    $router->post('/faculdade/edit', function() {
        //
    });



    $router->run();
    // echo $_SERVER['REQUEST_URI'];
    // function rota($rotas, $f){
    //     if($_SERVER['REQUEST_URI'] == $rotas){
    //         $f();
    //         exit();
    //     }
    // }
    // rota("/", function() {
    //     echo "Hello";
    // });
    // rota("/about", function() {
    //     echo "<h1>Hello world</h1>";
    //     new Login();
    // });
