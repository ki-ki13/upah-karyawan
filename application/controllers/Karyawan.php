<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
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
        $config['base_url'] = site_url('karyawan/index'); //site url
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
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
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
        $data['title'] = "Karyawan";
        //$datacontent['karyawan'] = $this->model->get_karyawan();
		$this->load->view('head', $data);
        $this->load->view('navbar');
        $this->load->view('karyawan', $datacontent);
        $this->load->view('footer');
        $this->load->view('js');
	}
    function create()
	{
		$data['title'] = "Form Karyawan";
        $datacontent['posisi'] = $this->model->get_posisi();

		$this->load->view('head', $data);
        $this->load->view('navbar');
        $this->load->view('form-karyawan', $datacontent);
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function save()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('domisili','Domisili','required');
		$this->form_validation->set_rules('umur','Umur','required');
		if ($this->form_validation->run()==true)
        {
			$data['nama'] = $this->input->post('nama');
			$data['id_upah'] = $this->input->post('posisi');
			$data['domisili'] = $this->input->post('domisili');
			$data['umur'] = $this->input->post('umur');
			$this->model->save($data);
			redirect('karyawan');
		}
		else
		{
			redirect('karyawan/create');
		}
	}
    function edit($id_karyawan)
	{
		$datacontent['karyawan'] = $this->model->getById($id_karyawan);
        $datacontent['posisi'] = $this->model->get_posisi();
		$data['title'] = "Form Karyawan";

		$this->load->view('head', $data);
        $this->load->view('navbar');
        $this->load->view('form-edit',$datacontent);
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function update()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('domisili','Domisili','required');
		$this->form_validation->set_rules('umur','Umur','required');
		if ($this->form_validation->run()==true)
        {
		 	$id_karyawan = $this->input->post('id_karyawan');
             $data['nama'] = $this->input->post('nama');
             $data['id_upah'] = $this->input->post('posisi');
             $data['domisili'] = $this->input->post('domisili');
             $data['umur'] = $this->input->post('umur');
			$this->model->update($data,$id_karyawan);
			redirect('karyawan');
		}
		else
		{
			$id_karyawan = $this->input->post('id_karyawan');
			$data['title'] = "Form Karyawan";
            $datacontent['karyawan'] = $this->model->getById($id_karyawan);

            $this->load->view('head', $data);
            $this->load->view('navbar');
            $this->load->view('form-edit',$datacontent);
            $this->load->view('footer');
            $this->load->view('js');
		}
	}
    function delete($id_karyawan)
	{
		$this->model->delete($id_karyawan);
        $this->model2->delete($id_karyawan);
		redirect('karyawan');
	}
}