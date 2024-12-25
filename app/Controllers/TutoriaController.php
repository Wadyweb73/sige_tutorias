<?php
require_once __DIR__.'/../Models/Tutoria.php';

class TutoriaController {


    // public function registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_registo, $data_realizacao, $descricao) {
    //     $tutoria = new Tutoria();
    //     $tutoria->registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_registo, $data_realizacao, $descricao);
    // }

    public function Registar(){
        $id_disciplina = $_POST['disciplina'];
         $id_docente = $_POST['id_docente'];
          $hora_inicio = $_POST['hora_inicio'];
           $hora_termino = $_POST['hora_termino'];
            $data_registo = date("Y-m-d H:i:s");  
            $data_realizacao = $_POST['data_realizacao'];
         $descricao = $_POST['descricao'];
    
        $tutoria = new Tutoria();
        $tutoria->registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_registo, $data_realizacao, $descricao);
    }


    public function visualizarTutoria($id_tutoria) {
        $tutoria = new Tutoria();
        $dadosTutoria = $tutoria->visualizarTutoria($id_tutoria);

        if ($dadosTutoria) {
            echo json_encode($dadosTutoria);
        } else {
            echo json_encode(['error' => 'Tutoria não encontrada']);
        }
    }

   
    public function listarTutorias() {
        $tutoria = new Tutoria();
        $tutorias = $tutoria->listarTutorias();
        echo json_encode($tutorias);
    }

    public function actualizar() {
        $id_tutoria = $_POST['id_tutoria'];
        $id_disciplina = $_POST['disciplina'];
        $id_docente = $_POST['id_docente'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_termino = $_POST['hora_termino'];
        $data_realizacao = $_POST['data_realizacao'];
        $descricao = $_POST['descricao'];
    
        $tutoria = new Tutoria();

         $tutoria->actualizarTutoria($id_tutoria, $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao) ;
         
    }

    
    public function deletarTutoria($id_tutoria) {
        $tutoria = new Tutoria();
        if ($tutoria->deletarTutoria($id_tutoria)) {
            $_SESSION['message'] = "Tutor deletado com sucesso!";
        } else {
            $_SESSION['message'] = "Erro ao deletar o tutor.";
        }
    }
    

    
    public function buscarTutoriaPorId($id) {
        $tutoria = new Tutoria();
        return $tutoria->buscarPorId($id);
    }
    
    
}

?>
