<?php

require_once __DIR__.'/../Controllers/TutoriaController.php';

$tutoriaController = new TutoriaController();

if(isset($_POST['update'])){
    $tutoriaController->actualizar();
    header('Location: TutoriaLista.php');

}

$id_tutoria = $_GET['id'];
$tutoria = $tutoriaController->buscarTutoriaPorId($id_tutoria);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/formTutoria.css">
    <script type="module" src="../../public/js/TutoriaForm.js"></script>
    <title>Formulario | Editar Tutoria</title>
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
                <h1>Editar Tutoria</h1>
            </div>

            <form method="post" class="main-content">
                <input type="hidden" name="id_tutoria" value="<?php echo $tutoria['id_tutoria']; ?>">
                <div class="field-components-container">
                    <span class="field_title">Id do Tutor:</span>
                    <input class="" name="id_docente" type="text" required value="<?php echo $tutoria['id_docente']; ?>">
                </div>
                <div class="field-components-container">
                    <select class="js-select-curso " name="curso" id="">
                        <!-- Conteudo gerado em TutoriaForm.js -->
                    </select>
                </div>
                <div class="field-components-container">
                    <select name="disciplina" id="">
                        <option value="">Seleccionar Disciplina</option>
                        <option value="1" <?php if($tutoria['id_disciplina'] == 1) echo 'selected'; ?>>Matemática</option>
                        <option value="2" <?php if($tutoria['id_disciplina'] == 2) echo 'selected'; ?>>Física I</option>
                        <option value="3" <?php if($tutoria['id_disciplina'] == 3) echo 'selected'; ?>>Lógica de Programação</option>
                        <option value="4" <?php if($tutoria['id_disciplina'] == 4) echo 'selected'; ?>>Aplicações Móveis</option>
                    </select>
                </div>
                <div class="field-components-container date-time-container">
                    <div class="data-realizacao-container date-time-component">
                        <span>Data de realização</span>
                        <input type="date" name="data_realizacao" class="data-realizacao-input" value="<?php echo $tutoria['data_realizacao']; ?>">
                    </div>
                    <div class="hora-inicio-container date-time-component">
                        <span>Hora de início</span>
                        <input name="hora_inicio" class="hora-inicio-input" type="time" value="<?php echo $tutoria['hora_inicio']; ?>">
                    </div>
                    <div class="hora-fim-container-input date-time-component">
                        <span>Hora de fim</span>
                        <input name="hora_termino" class="hora-fim" type="time" value="<?php echo $tutoria['hora_termino']; ?>">
                    </div>
                </div>
                <div class="field-components-container">
                    <span class="field_title">Descrição:</span>
                    <textarea name="descricao" id=""><?php echo $tutoria['descricao']; ?></textarea>
                </div>
                <button class="submit-button" type="submit" name="update">Actualizar</button>
            </form>
        </main>
    </div>
</body>
</html>
