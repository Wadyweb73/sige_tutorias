<?php
// rafa
    require "app/config/Router.php";

    include "app/Models/User.php";
    include "app/Models/Actividade.php";

    include "app/Controllers/UserController.php";
    include "app/Controllers/ActividadeController.php";

    include "app/Models/Faculdade.php";
    include "app/Controllers/FaculdadeController.php";

    include "app/Models/Docente.php";
    include "app/Controllers/DocenteController.php";

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


    // Docente
    $router->post('/sige_tutorias/docente/registar', function() {
        $docente = new Docente();
        $docenteController = new DocenteController();

        $docente->set_idFaculdade($_POST['id_faculdade']);
        $docente->set_idCurso($_POST['id_curso']);
        $docente->set_idDisciplina($_POST['id_disciplina']);
        $docente->set_nome($_POST['nome']);
        
        $docenteController->registarDocente($docente);
    });

    $router->get('/sige_tutorias/docente/{id}', function($id) {
        $docenteController = new DocenteController();
        $docenteController->visualizarDocente($id);
    });

   
    $router->get('/sige_tutorias/docentes', function() {
        $docenteController = new DocenteController();
        $docenteController->listarDocentes();
    });


    $router->post('/sige_tutorias/docente/{id}/actualizar', function($id) {
        $docenteController = new DocenteController();
        $docenteController->actualizarDocente(
            $id,
            $_POST['id_faculdade'],
            $_POST['id_curso'],
            $_POST['id_disciplina'],
            $_POST['nome']
        );
    });

  
    $router->delete('/sige_tutorias/docente/{id}/apagar', function($id) {
        $docenteController = new DocenteController();
        $docenteController->apagarDocente($id);
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
   
    $router->run();

