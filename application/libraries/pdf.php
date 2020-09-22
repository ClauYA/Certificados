<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
	function createPDF($html, $filename='', $download=TRUE, $paper='letter', $orientation='landscape'){
		$dompdf = new Dompdf\DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper($paper, $orientation);
		$dompdf->render();
		if($download)
			$dompdf->stream($filename.'.pdf', array('Attachment' => 1));
		else
			$dompdf->stream($filename.'.pdf', array('Attachment' => 0));
	}
}
?>
