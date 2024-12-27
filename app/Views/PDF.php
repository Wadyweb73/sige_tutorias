<?php
require_once __DIR__ .'/../Models/fpdf186/fpdf.php';

//AQUI VAS INSTACIAR O CONTROLLER QUE BUSCARA OS DADOS 
//Exemplo
// require_once __DIR__.('/../Models/Dimensao.php');
// $relatorio = new Dimensao();
// $NrQuestoes= $relatorio->NrQuestoesRespondidas();
// $NrArquivos = $relatorio->NrArquivos();

//


class PDF extends FPDF {
    function ConvertToUTF8($text) {
        return iconv('UTF-8', 'windows-1252', $text);
    }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->Image('../../public/img/UP-Logo.jpg', 10, 10, 20, 20);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(14, 14, 14);
$pdf->Cell(100, 8, ('Universidade Pedagogica'), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(33, 124, 56);
$pdf->Cell(150, 15, $pdf->ConvertToUTF8 ('Centro de Educação Aberta e a Distância'), 0, 1, 'C');


$pdf->SetFillColor(228, 251, 252); 
$pdf->Rect(0, 35, 230, 287, 'F'); 

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(14, 14, 14);
$pdf->Cell(180, 30, 'RELATORIO DA TUTORIA PRESENCIAL', 0, 1, 'C');


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 1, '1. Dados Gerais', 0, 1, 'C');

$pdf->SetFillColor(157, 248, 180); 
$pdf->Rect(5, 70, 200, 80, 'F');
$pdf->Ln(10);


$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Centro de Recurso: ' . $pdf->ConvertToUTF8('$x1'), 0, 1);
$pdf->Cell(0, 10, 'Nome do Tutor: ' . $pdf->ConvertToUTF8('$x2'), 0, 1);
$pdf->Cell(0, 10, 'Curso: ' . $pdf->ConvertToUTF8('$x3'), 0, 1);
$pdf->Cell(0, 10, 'Disciplina/Modulo: ' . $pdf->ConvertToUTF8('$x4'), 0, 1);
$pdf->Cell(0, 10, 'Numero da Tutoria: ' . $pdf->ConvertToUTF8('$x5'), 0, 1);
$pdf->Cell(0, 10, 'Numero de estudantes Presentes: ' . $pdf->ConvertToUTF8('$x6'), 0, 1);
$pdf->Cell(0, 10, '(Anexar lista de presencas)', 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '2. Descricao das actividades desenvolvidas:', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$x7'), 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '3. Dificuldades apresentadas pelos estudantes:', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$x8'), 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '4. Aspectos que dificultaram a realizacao plena da tutoria e solucoes encontradas:', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$x9'), 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '5. Observacoes e recomendacoes:', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$x10'), 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, 'Maputo, aos:' . $pdf->ConvertToUTF8('$date'), 0, 1);
$pdf->Cell(0, 10, 'Assinatura do Tutor: ' . $pdf->ConvertToUTF8('$x11'), 0, 1);
$pdf->Cell(0, 10, 'Assinatura do Gestor do Centro: ' . $pdf->ConvertToUTF8('$12'), 0, 1);

$pdf->Output('relatorio_tutoria.pdf', 'I');
?>
