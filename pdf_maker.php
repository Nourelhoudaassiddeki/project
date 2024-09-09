<?php                
require '2_site.php'; 
include_once('C:\xampp\htdocs\TCPDF-main\TCPDF-main\tcpdf.php');
// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Sample PDF');
$pdf->SetSubject('Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add a cell
$content = '<h1>Hello, World!</h1>';
$pdf->writeHTML($content, true, false, true, false, '');
$pdf_file = __DIR__ . '/sample.pdf';
$pdf->Output($pdf_file, 'F');

// Download the PDF file
if (isset($_GET['ACTION'])) {
  $action = $_GET['ACTION'];
  if ($action == 'DOWNLOAD') {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $pdf_file . '"');
    readfile($pdf_file);
  }
}
// Close and output PDF document
if (isset($_GET['ACTION'])) {
	$action = $_GET['ACTION'];
	if ($action == 'VIEW') {
	  // Display the PDF
	  header('Content-Type: application/pdf');
	  header('Content-Disposition: inline; filename="' . $titre . '.pdf"');
	  readfile($pdf_file);
	} 
	}  elseif ($_GET['ACTION'] == 'UPLOAD') {
		// Upload the PDF
		$file_location = 'C:\xampp\htdocs\uploads';
		$file_name = 'sample.pdf';
		$pdf->Output($file_location . $file_name, 'F');
		echo "Upload successfully!";
	  } else {
		echo 'Record not found for PDF.';
	  }

?>




