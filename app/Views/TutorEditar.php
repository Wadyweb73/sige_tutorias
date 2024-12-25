<?php
require_once __DIR__.'/../Controllers/DocenteController.php';

$docenteController = new DocenteController();
if (isset($_GET['id'])) {
    $tutorData = $docenteController->buscarDocentePorId($_GET['id']);
}

if (isset($_POST['update'])) {
    $docenteController->atualizarDocente($_POST['id_docente'], $_POST['nome_docente'], $_POST['id_faculdade'], $_POST['id_curso'], $_POST['id_disciplina']);
    header('Location: TutorLista.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/formTutor.css">
    <title>Editar Tutor</title>
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
                <h1>Editar Tutor</h1>
            </div>

            <form method="post" class="main-content">
                <input type="hidden" name="id_docente" value="<?php echo $tutorData['id_docente']; ?>">
                <div class="field-components-container">
                    <span class="field_title">Nome do Tutor:</span>
                    <input class="" name="nome_docente" type="text" value="<?php echo $tutorData['nome_docente']; ?>" required>
                </div>
                <div class="field-components-container">
                    <select name="id_faculdade" required>
                        <option value="">Escolher Faculdade</option>
                        <option value="1" <?php echo $tutorData['id_faculdade'] == 1 ? 'selected' : ''; ?>>Faculdade de Engenharias e Tecnologias</option>
                        <option value="2" <?php echo $tutorData['id_faculdade'] == 2 ? 'selected' : ''; ?>>Faculdade de Ciências Naturais e Matemática</option>
                    </select>
                </div>
                <div class="field-components-container">
                    <select name="id_curso" required>
                        <option value="">Escolher Curso </option>
                        <option value="1" <?php echo $tutorData['id_curso'] == 1 ? 'selected' : ''; ?>>Licenciatura em Informática</option>
                        <option value="2" <?php echo $tutorData['id_curso'] == 2 ? 'selected' : ''; ?>>Licenciatura em Ensino de Física</option>
                    </select>
                </div>
                <div class="field-components-container">
                    <select name="id_disciplina" required>
                        <option value="">Escolher Disciplina</option>
                        <option value="1" <?php echo $tutorData['id_disciplina'] == 1 ? 'selected' : ''; ?>>Lógica de Programação</option>
                        <option value="1" <?php echo $tutorData['id_disciplina'] == 2 ? 'selected' : ''; ?>>Matemática Discreta</option>
                        <option value="3" <?php echo $tutorData['id_disciplina'] == 3 ? 'selected' : ''; ?>>Design Grafico</option>
                        <option value="4" <?php echo $tutorData['id_disciplina'] == 4 ? 'selected' : ''; ?>>Estruturas de Dados e Algorítimos</option>
                    </select>
                </div>
                <button class="submit-button" type="submit" name="update">Atualizar</button>
            </form>
        </main>
    </div>
</body>
</html>
