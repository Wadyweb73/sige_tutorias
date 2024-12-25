<?php
require_once __DIR__.'/../Controllers/DocenteController.php';

if (isset($_GET['id'])) {
    $docenteController = new DocenteController();
    $docenteController->deletarDocente($_GET['id']);
    header('Location: TutorLista.php');
    exit();
}
?>
