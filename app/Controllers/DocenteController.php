<?php
    include_once("../sige_tutorias/app/Models/Docente.php");

class DocenteController{


    public function autenticar($credenciais){
        $docente = new Docente();
        $result = $docente->autenticar($credenciais);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function registarDocente($docente){
        $docente->registarDocente();
    }
    
    public function visualizarDocente($id){
        $docente = new Docente();
        $dadosDocente = $docente->visualizarDocente($id);
    
        if($dadosDocente){
            echo json_encode($dadosDocente);
        }
    }

    public function listarDocentes(){
        $docenteList = new Docente();
        $docente = $docenteList->listarDocentes();
        echo json_encode($docente);
        
    }

    public function actualizarDocente($id,$idFaculdade,$idCurso,$idDisciplina,$nome){
        $docente = new Docente();
        $docente->set_idFaculdade($idFaculdade);
        $docente-> set_idCurso($idCurso);
        $docente-> set_idDisciplina($idDisciplina);
        $docente-> set_nome($nome);
        $docente-> actualizarDocente($id);
    }
    
    public function apagarDocente($id) {
        $docente = new Docente();
        $docente->apagarDocente($id);
    } 

}

?>