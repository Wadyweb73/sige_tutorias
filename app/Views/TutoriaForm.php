<?php

require_once __DIR__.'/../Controllers/TutoriaController.php';


if(isset($_POST['send'])){
$cliente = new TutoriaController();
$cliente ->Registar();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/formTutoria.css">
    <script type="module" src="../../public/js/TutoriaForm.js"></script>
    <title>Formulario | Tutor</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-container">
            <img class="logo" src="../../public/img/upm.png">
        </div>

        <div class="sidebar-buttons-container">
            <li><a href="./home.html">Home</a></li>
            <li><a href="./FaculdadeLista.html">Faculdades</a></li>
            <li><a href="./CursoLista.html">Cursos</a></li>
            <li><a href="TutorLista.php">Tutores</a></li>
            <li><a href="./TutoriaLista.php">Tutorias</a></li>
            <li><a href="./DisciplinaLista.html">Disciplinas</a></li>
            <li><a href="#">Testes</a></li>
            <li><a href="#">Relatorios</a></li>
        </div>
    </div>

    <div class="right-side">
        <header>
            <img src="../../public/img/hamburger-menu.png" alt="">
            <div class="user-info-container">
                <img class="user-img" src="../../public/img/user.png" alt="">
                <p>João Mateus</p>
            </div>
        </header>
        
        <main>
            <div class="main-title-container">
                <h1>Cadastrar Tutoria</h1>
            </div>

            <form  method="post" class="main-content">
                <div class="field-components-container">
                    <span class="field_title">Id do Tutor:</span>
                    <input class="" name="id_docente" type="text" required>
                </div>
                <div class="field-components-container">
                    <select class="js-select-curso " name="curso" id="">
                        <!-- Conteudo gerado em TutoriaForm.js -->
                    </select>
                </div>
                <div class="field-components-container">
                    <select name="disciplina" id="">
                        <option value="">Seleccionar Disciplina</option>
                        <option value="1">Matemática</option>
                        <option value="2">Física I</option>
                        <option value="3">Lógica de Programação</option>
                        <option value="4">Aplicacoes moveis</option>
                    </select>
                </div>
                <div class="field-components-container date-time-container">
                    <div class="data-realizacao-container date-time-component">
                        <span>Data de realização</span>
                        <input type="date" name="data_realizacao" class="data-realizacao-input">
                    </div>
                    <div class="hora-inicio-container date-time-component">
                        <span>Hora de início</span>
                        <input name="hora_inicio" class="hora-inicio-input" type="time">
                    </div>
                    <div class="hora-fim-container-input date-time-component">
                        <span>Hora de fim</span>
                        <input name="hora_termino" class="hora-fim" type="time">
                    </div>
                </div>
                <div class="field-components-container">
                    <span class="field_title">Descrição:</span>
                    <textarea name="descricao" id=""></textarea>
                </div>
                <button class="submit-button" type="submit" name="send">Cadastrar</button>
            </form>
        </main>
    </div>
</body>
</html>