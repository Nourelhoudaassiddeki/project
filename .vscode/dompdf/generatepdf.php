<?php
require_once('C:/xampp/htdocs/.vscode/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '<h1 style="color:blue;">Hello this is from dom pdf to convert html</h1>';

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$pdfContent = $dompdf->output();

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="generated_pdf.pdf"');
echo $pdfContent;
?>



