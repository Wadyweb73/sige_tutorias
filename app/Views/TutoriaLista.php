<?php
require_once __DIR__."/../Models/Tutoria.php";

$tutorias = new Tutoria();
$dados = $tutorias->listarTutorias();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/home.css">
    <link rel="stylesheet" href="../../public/css/tableStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script type="module" src="../../public/js/TutoriaLista.js"></script>
    <title>Lista | Tutorias</title>
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
                <h1>Lista Tutorias</h1>
            </div>

            <div class="main-content">
              <div class="buttons-container">
              <a class="action-button add-button "  href="TutoriaForm.php"><img class="add-icon" src="../../public/img/add.png">Novo Tutor</a>
        
              </div>
              <section>
                  <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0" border="0">
                      <thead>
                        <tr>
                          <th class="mini-column">&#10003;</th>
                          <th>Id</th>
                          <th>Docente</th>
                          <th>Disciplina</th>
                          <th>Data Realização </th>
                          <th>Hora Inicial </th>
                          <th>Hora do Termino </th>
                          <th>Descrição</th>
                          <th class="mini-column">-</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0" border="0">
                      <tbody class="js-table-body" data-context="faculdade">
                          <?php if (!empty($dados)): ?>
                    <?php foreach ($dados as $fun): ?>
                        <tr>              
                            <td><?php echo $fun['id_tutoria']; ?></td>
                            <td><?php echo $fun['nome_docente']; ?></td>
                            <td><?php echo $fun['nome_disciplina']; ?></td>
                            <td><?php echo $fun['data_realizacao']; ?></td>
                            <td><?php echo $fun['hora_inicio']; ?></td>
                            <td><?php echo $fun['hora_termino']; ?></td>
                            <td><?php echo $fun['descricao']; ?></td>
                            <td>
                            <a href="TutoriaEditar.php?id=<?php echo $fun['id_tutoria']; ?>" class="btn btn-success btn-sm">Editar</a>
                            <a href="TutoriaDeletar.php?id=<?php echo $fun['id_tutoria']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar esta tutoria?');">Suspender</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhum dado encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
                    </table>
                  </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>