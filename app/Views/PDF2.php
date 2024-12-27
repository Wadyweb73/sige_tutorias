<?php
require_once __DIR__ .'/../Models/fpdf186/fpdf.php';

// Criação de uma nova instância do FPDF
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
$pdf->Cell(0, 20, $pdf->ConvertToUTF8('RELATÓRIO FINAL DO MÓDULO'), 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 1, '1. Dados Gerais', 0, 1, 'C');

$pdf->SetFillColor(157, 248, 180); 
$pdf->Rect(5, 60, 200, 70, 'F');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('Nome do Tutor: ') . '$a1', 0, 1);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('Módulo/Ano: ') . '$a2', 0, 1);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('Curso: ') . '$a3', 0, 1);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('Centro de Recurso: ') . '$a4', 0, 1);

$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(50, 10, 'Lhanguene', 0, 0);
$pdf->Cell(10, 10, '['.'$a5'.']', 0, 1);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(50, 10, 'Namaacha', 0, 0);
$pdf->Cell(10, 10, '['.'$a6'.']', 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('2. Descrição das actividades desenvolvidas:'), 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$a7'), 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('3. Principais recursos utilizados na Plataforma:'), 0, 1);

$pdf->SetFillColor(157, 248, 180); 
$pdf->Rect(10, 174, 100, 60, 'F');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Recurso', 1, 0, 'C');
$pdf->Cell(50, 10, 'Quantidade', 1, 1, 'C');

$pdf->Cell(50, 10, $pdf->ConvertToUTF8('Vídeos'), 1, 0, 'L');
$pdf->Cell(50, 10, '$a8', 1, 1, 'L');

$pdf->Cell(50, 10, $pdf->ConvertToUTF8('Testes online'), 1, 0, 'L');
$pdf->Cell(50, 10, '$a9', 1, 1, 'L');

$pdf->Cell(50, 10, $pdf->ConvertToUTF8('Ficheiros/Textos/Links'), 1, 0, 'L');
$pdf->Cell(50, 10, '$a10', 1, 1, 'L');

$pdf->Cell(50, 10, $pdf->ConvertToUTF8('Trabalhos'), 1, 0, 'L');
$pdf->Cell(50, 10, '$a11', 1, 1, 'L');

$pdf->Cell(50, 10, $pdf->ConvertToUTF8('Videoconferência'), 1, 0, 'L');
$pdf->Cell(50, 10, '$a12', 1, 1, 'L');

$pdf->Ln(10);


// Nova página
// $pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(0, 10, $pdf->ConvertToUTF8('4. Cumprimento do programa de ensino'), 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$a14'), 0, 1);


$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('5. Avaliação e rendimento dos estudantes'), 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$a15'), 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('6. Principais dificuldades encontradas'), 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$a16'), 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, $pdf->ConvertToUTF8('7. Observações e recomendações'), 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '' . $pdf->ConvertToUTF8('$a18'), 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, 'Maputo, aos:' . $pdf->ConvertToUTF8('$date'), 0, 1);
$pdf->Cell(0, 10, 'Assinatura do Tutor de Especialidade: ' . $pdf->ConvertToUTF8('$a19'), 0, 1);

$pdf->Output('relatorio_final_modulo_completo.pdf', 'I');
?>
