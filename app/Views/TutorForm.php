<?php

require_once __DIR__.'/../Controllers/DocenteController.php';


if(isset($_POST['send'])){
$cliente = new DocenteController();
$cliente ->Registar();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/formTutor.css">
    <script type="module" src="../../public/js/TutorForm.js"></script>
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
                <h1>Cadastrar Tutor</h1>
            </div>

            <form  method="post" class="main-content">
                <div class="field-components-container">
                    <span class="field_title">Nome do Tutor:</span>
                    <input class="" name="nome" type="text" required>
                </div>
                <div class="field-components-container">
                    <select name="id_faculdade" id="">
                        <option value="">Escolher Faculdade</option>
                        <option value="1">Faculdade de Engenharias e Tecnologias</option>
                        <option value="2">Faculdade de Ciências Naturais e Matemática</option>
                    </select>
                </div>
                <div class="field-components-container">
                    <select name="id_curso" id="">
                        <option value="">Escolher Curso </option>
                        <option value="1">Licenciatura em Informática</option>
                        <option value="2">Licenciatura em Ensino de Física</option>
                    </select>
                </div>
                <div class="field-components-container">
                    <select name="id_disciplina" id="">
                        <option value="">Escolher Disciplina</option>
                        <option value="1">Lógica de Programação</option>
                        <option value="2">Matemática Discreta</option>
                        <option value="3">Design Grafico</option>
                    </select>
                </div>
                <button class="submit-button" type="submit" name="send">Cadastrar</button>
            </form>
        </main>
    </div>
</body>
</html>