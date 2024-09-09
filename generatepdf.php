<?php
require_once("./vscode/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf= new dompdf();
$html=`<h1 style="color:blue;">Hello this is from dom pdf to conver html</h1>`;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream();
?>



