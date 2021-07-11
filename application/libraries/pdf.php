<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';
// require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
        // $dompdf = new Dompdf\DOMPDF();
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download){
            ob_end_clean();
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        }
        else{
            ob_end_clean();
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
        }
    }
}
?>