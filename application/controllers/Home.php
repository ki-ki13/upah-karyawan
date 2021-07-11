<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('upah_model','model');
    }

	public function index()
	{
        $datacontent['total'] = $this->model->totalOutcome();
        $datacontent['upahtinggi'] = $this->model->getTinggi();
        $datacontent['upahrendah'] = $this->model->getRendah();
        $data['title'] = "Dashboard";

		$this->load->view('head', $data);
        $this->load->view('navbar');
        $this->load->view('home',$datacontent);
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function generatePdf(){
        $this->load->library('pdf');
        $datacontent['data'] = $this->model->getpdf();
        $html=$this->load->view('pdfview',$datacontent,true);
        // $this->load->view('js');
        $this->pdf->createPDF($html, 'tabelupah', false);
    }
}