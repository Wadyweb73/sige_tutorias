<?php
require_once __DIR__.'/../Controllers/TutoriaController.php';

if (isset($_GET['id'])) {
    $tutoria = new TutoriaController();
    $tutoria->deletarTutoria($_GET['id']);
    header('Location: TutoriaLista.php');
    exit();
}
?>
