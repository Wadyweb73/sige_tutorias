<?php

    require "app/config/Router.php";

    include "app/Models/Disciplina.php"; include "app/Controllers/DisciplinaController.php";
    include "app/Models/Faculdade.php"; include "app/Controllers/FaculdadeController.php";
    include "app/Models/Tutoria.php";  include "app/Controllers/TutoriaController.php";
    include "app/Models/Docente.php"; include "app/Controllers/DocenteController.php";
    include "app/Models/Curso.php"; include "app/Controllers/CursoController.php";
    include "app/Models/Avaliacao.php"; include "app/Controllers/AvaliacaoController.php";

    $router   = new Router();
    $GLOBALS['global'] = [
        'base_url' => $_SERVER['DOCUMENT_ROOT'].'/sige_tutorias'
    ];
    
    $router->get('/sige_tutorias/teste', function() {
        echo "Rota de teste funcionando!";
    });

    $router->get('/sige_tutorias', function() {
        include "app/Views/login.html";
    });
    $router->get('/sige_tutorias/', function() {
        include "app/Views/login.html";
    });


    $router->post('/sige_tutorias/entrar', function() {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['email']) || !isset($data['password'])) {
            echo json_encode(["error" => "Dados inválidos!"]);
            http_response_code(400); 
            exit();
        }

        $docente = new Docente();
        $docente->setEmail($data['email']);
        $docente->setPassword($data['password']);

        $docenteController = new DocenteController();
        $autenticado = $docenteController->autenticar($docente);

        header('Content-Type: application/json');
        echo json_encode($autenticado);
        exit();
    });

    /*----------------- FACULDADE ----------------------*/
    $router->post('/sige_tutorias/faculdade/registar', function() {
        $faculdade = new Faculdade();
        $faculdadeController = new FaculdadeController();
    
        $faculdade->set_nomeFaculdade($_POST['nome_faculdade']);
        $faculdade->set_endereco($_POST['endereco']);
        $faculdadeController->registarFaculdade($faculdade);

        header("Location: ../app/Views/FaculdadeLista.html");
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

        include("../app/Views/TutorLista.html");
        return "ola";

        header("Location: ../app/Views/TutorLista.html");
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

    // curso

    $router->post('/sige_tutorias/curso/registar', function() {
        $curso = new Curso();
        $cursoController = new CursoController();

        $curso->set_idFaculdade($_POST['id_faculdade']);
        $curso->set_nomeCurso($_POST['nome']);
        $cursoController->registarCurso($curso);

        header("Location: ../app/Views/CursoLista.html");
    });

    $router->get('/sige_tutorias/cursos', function() {
        $cursoController = new CursoController();
        $cursoController->listarCursos();
    });

    $router->get('/sige_tutorias/curso/{id}', function($id) {
        $cursoController = new CursoController();
        $cursoController->visualizarCurso($id);
    });

    $router->post('/sige_tutorias/curso/{id}/actualizar', function($id) {
        $cursoController = new CursoController();
//        echo "{$id} -> {$_POST['nome']} -> {$_POST['id_faculdade']}";
  //      die();
        $cursoController->actualizarCurso(
            $id,
            $_POST['nome'],
            $_POST['id_faculdade']
        );

        header("Location: /sige_tutorias/app/Views/CursoLista.html");
    });

    $router->delete('/sige_tutorias/curso/{id}/apagar', function($id) {
        $cursoController = new CursoController();
        $cursoController->apagarCurso($id);
    });

    // tutoria
    $router->post('/sige_tutorias/tutoria/registar', function() {
        $tutoriaController = new TutoriaController();
        
        $tutoriaController->registarTutoria( 
            $_POST['id_disciplina'] || 0,
            $_POST['id_docente'],
            $_POST['hora_inicio'],
            $_POST['hora_termino'],
            $_POST['data_registo'],
            "2024-09-03",
            $_POST['descricao']
        );

        header("../app/Views/TutoriaLista.html");         
    });
    
    $router->get('/sige_tutorias/tutorias', function() {
        $tutoriaController = new TutoriaController();
        $tutoriaController->listarTutorias();
    });
    
    $router->get('/sige_tutorias/tutoria/{id}', function($id) {
        $tutoriaController = new TutoriaController();
        $tutoriaController->visualizarTutoria($id);
    });
    
    $router->post('/sige_tutorias/tutoria/{id}/actualizar', function($id) {

        $tutoriaController = new TutoriaController();
        $tutoriaController->actualizarTutoria(
            $id,
            $_POST['id_disciplina'],
            $_POST['id_docente'],
            $_POST['hora_inicio'],
            $_POST['hora_termino'],
            "2024-09-03",
            $_POST['data_realizacao'],
            $_POST['descricao']
        );

        header("../app/Views/TutoriaLista.html");         
    });
    
    $router->delete('/sige_tutorias/tutoria/{id}/apagar', function($id) {
        $tutoriaController = new TutoriaController();
        $tutoriaController->apagarTutoria($id);
    });

    //  disciplina
    $router->post('/sige_tutorias/disciplina/registar', function() {
        $disciplina = new Disciplina();
        $disciplinaController = new DisciplinaController();
        
        $disciplina->set_nomeDisciplina($_POST['nome_disciplina']);
        $disciplina->set_idCurso($_POST['id_curso']);
        $disciplinaController->registarDisciplina($disciplina);
    
        header("../app/Views/DisciplinaLista.html");
    });
    
    $router->get('/sige_tutorias/disciplina/{id}', function($id) {
        $disciplinaController = new DisciplinaController();

        $disciplinaController->visualizarDisciplina($id);
    });
    
    $router->get('/sige_tutorias/disciplinas', function() {
        $disciplinaController = new DisciplinaController();

        $disciplinaController->listarDisciplinas();
    });
    
    $router->post('/sige_tutorias/disciplina/{id}/actualizar', function($id) {
        $disciplinaController = new DisciplinaController();

        $disciplinaController->actualizarDisciplina($id, $_POST['nome_disciplina'], $_POST['id_curso']);

        include("./app/Views/DisciplinaLista.html");
    });
    
    $router->delete('/sige_tutorias/disciplina/{id}/apagar', function($id) {
        $disciplinaController = new DisciplinaController();
        $disciplinaController->apagarDisciplina($id);
    });


    //-------------------- avaliacao --------------------------------//
    $router->post('/sige_tutorias/avaliacao/registar', function() {
        $avaliacao = new Avaliacao();
        $avaliacaoController = new AvaliacaoController();
    
        $avaliacao->setIdDisciplina($_POST['id_disciplina']);
        $avaliacao->setIdDocente($_POST['id_docente']);
        $avaliacao->setTesteNumero($_POST['teste_numero']);
        $avaliacao->setSupervisor($_POST['supervisor']);
        $avaliacao->setDataRealizacao($_POST['data_realizacao']);
        $avaliacao->setDataRegisto(date("Y-m-d"));
        $avaliacao->setHoraInicio($_POST['hora_inicio']);
        $avaliacao->setHoraFim($_POST['hora_fim']);
        $avaliacao->setLocal($_POST['local']);
        $avaliacao->setModalidade($_POST['modalidade']);
        $avaliacao->setTipoAvaliacao($_POST['tipo_avaliacao']);
    
        $avaliacaoController->registarAvaliacao($avaliacao);
    });

    $router->get('/sige_tutorias/avaliacao/visualizar/{id}', function($id) {
        $avaliacaoController = new AvaliacaoController();
        $avaliacaoController->visualizarAvaliacao($id);
    });

    $router->post('/sige_tutorias/avaliacao/actualizar/{id}', function($id) {
        $avaliacao = new Avaliacao();
        $avaliacaoController = new AvaliacaoController();
    
        $avaliacao->setIdDisciplina($_POST['id_disciplina']);
        $avaliacao->setIdDocente($_POST['id_docente']);
        $avaliacao->setTesteNumero($_POST['teste_numero']);
        $avaliacao->setSupervisor($_POST['supervisor']);
        $avaliacao->setDataRealizacao($_POST['data_realizacao']);
        $avaliacao->setHoraInicio($_POST['hora_inicio']);
        $avaliacao->setHoraFim($_POST['hora_fim']);
        $avaliacao->setDataRegisto(date("Y-m-d"));
        $avaliacao->setLocal($_POST['local']);
        $avaliacao->setModalidade($_POST['modalidade']);
        $avaliacao->setTipoAvaliacao($_POST['tipo_avaliacao']);
    
        $avaliacaoController->actualizarAvaliacao($avaliacao, $id);
    });

    $router->delete('/sige_tutorias/avaliacao/apagar/{id}', function($id) {
        $avaliacaoController = new AvaliacaoController();
        $avaliacaoController->apagarAvaliacao($id);
    });
   
    $router->run();