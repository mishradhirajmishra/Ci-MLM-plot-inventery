<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('admodel');
    /*    $this->load->helper('url');
        $this->load->helper('form');*/

    }
    function print_item()
    {   $this->load->library('m_pdf');

        $this->data['x']= "test";
        //now pass the data
        $html= $this->load->view('admin/payment',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
        //this the the PDF filename that user will get to download
        $pdfFilePath ="mypdfName-".time()."-download.pdf";

        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html,2);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");
    }
}