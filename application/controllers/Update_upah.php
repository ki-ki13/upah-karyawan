<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_upah extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->cek_login();
        $this->load->model('karyawan_model','model');
        $this->load->model('upah_model','model2');
        $this->load->library('form_validation');
    }
	public function index()
	{
         //konfig pagination
         $config['base_url'] = site_url('update_upah/index'); //site url
         $config['total_rows'] = $this->db->count_all('karyawan'); //total row
         $config['per_page'] = 10;  //show record per halaman
         $config["uri_segment"] = 3;  // uri parameter
         $choice = $config["total_rows"] / $config["per_page"];
         $config["num_links"] = floor($choice);
 
         //style bootstrap
         $config['first_link']       = 'First';
         $config['last_link']        = 'Last';
         $config['next_link']        = 'Next';
         $config['prev_link']        = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination float-end">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';
 
         $this->pagination->initialize($config);
         $datacontent['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
         //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
         if ($this->input->post('submit')){
             $datacontent['keyword'] = $this->input->post('keyword');
             $datacontent['data'] = $this->model->getDataPagination($config["per_page"], $datacontent['page'],$datacontent['keyword']);
         } else{
             $datacontent['data'] = $this->model->getDataPagination($config["per_page"], $datacontent['page']); 
         }
                   
  
         $datacontent['pagination'] = $this->pagination->create_links();
        $data['title'] = "Update Upah";
        $upah = $this->model2->getUpah();
        $datacontent['upah'] = $upah;

		$this->load->view('head', $data);
        $this->load->view('navbar');
        $this->load->view('update',$datacontent);
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function insertpot(){
        $this->form_validation->set_rules('potongan[]','Potongan','required');
        $this->form_validation->set_rules('total[]','Potongan','required');
        if ($this->form_validation->run()==true)
        {
            $id_karyawan = $_POST['id_karyawan'];
            $id_upah = $_POST['id_upah'];
            $potongan = $_POST['potongan'];
            $total = $_POST['total'];
            $x = 0;
            $result = array();
            
            foreach($potongan as $data) {
                $result[] = array( 	
                    'id_karyawan'=> $id_karyawan[$x],
                    'id_upah'=> $id_upah[$x],			
                    'potongan' => $data,
                    'total' => $total[$x]			
                );	
                $x++;	
            }		
            
            $this->model2->save_batch($result);
            
			redirect('upah');
		}
		else
		{
			redirect('update_upah');
		}
    }
}