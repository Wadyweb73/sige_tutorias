<?php
    include_once("../sige_tutorias/app/Models/Faculdade.php");

class FaculdadeController {
    public function registarFaculdade($faculdade) {
        $faculdade->registarFaculdade();
    }


    public function visualizarFaculdade($id) {
        $faculdade = new Faculdade();
        $dadosFaculdade = $faculdade->visualizarFaculdade($id);

        if ($dadosFaculdade) {
            //include 'app/Views/visualizarFaculdade.php'; // caso Wady queira utilizar uma view para isso
          echo json_encode($dadosFaculdade);
        }
    }


    public function listarFaculdades() {
        $faculdade = new Faculdade();
        $facul = $faculdade->listarFaculdades();
        echo json_encode($facul);
    }



    public function actualizarFaculdade($id, $nomeFaculdade, $endereco) {
        $faculdade = new Faculdade();
        $faculdade->set_nomeFaculdade($nomeFaculdade);
        $faculdade->set_endereco($endereco);
        $faculdade->actualizarFaculdade($id);
    }

    public function apagarFaculdade($id) {
        $faculdade = new Faculdade();
        $faculdade->apagarFaculdade($id);
    }

}
?>
