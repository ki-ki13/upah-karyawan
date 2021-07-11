<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
		$this->load->library('form_validation');
		$this->load->library('session');
    }

    public function login()
    {
		$data['title'] = "Login";

		$this->load->view('head', $data);
        $this->load->view('login');
        $this->load->view('js');
    }
    
    public function register()
    {
		$data['title'] = "Register";
		$this->load->view('head', $data);
        $this->load->view('register');
        $this->load->view('js');
    }

    public function proses_login()
    {
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors);
			$this->session->set_flashdata('input', $this->input->post());
			redirect('auth/login'); // LOGIN
		
		} else {
	
			$email = htmlspecialchars($this->input->post('email'));
			$pass = htmlspecialchars($this->input->post('password'));
	
			// CEK KE DATABASE BERDASARKAN EMAIL
			$cek_login = $this->auth_model->cek_login($email); 
				
			if($cek_login == FALSE)
			{
				echo '<script>alert("Email yang Anda masukan salah.");window.location.href="'.site_url('/auth/login').'";</script>';
			
			} else {
			
				if(password_verify($pass, $cek_login->password)){
					// if the username and password is a match
					$this->session->set_userdata('id_user', $cek_login->id_user);
					$this->session->set_userdata('email', $cek_login->email);
					$this->session->set_userdata('namaDepan', $cek_login->namaDepan);
					
					redirect('home');
						
				} else {
					echo '<script>alert("Username atau Password yang Anda masukan salah.");window.location.href="'.site_url('auth/login').'";</script>';
				}
			}
		}
    }

    public function proses_register()
    {

		$this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
		$this->form_validation->set_rules('last_name', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors);
			$this->session->set_flashdata('input', $this->input->post());
			redirect('auth/register');
		} else {
			$namedepan = $this->input->post('first_name');
			$namebelakang = $this->input->post('last_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$pass = password_hash($password, PASSWORD_DEFAULT);
			$data = [
				'namaDepan' => $namedepan,
				'namaBlkg' => $namebelakang,
				'email' => $email,
				'password' => $pass
			];
			$insert = $this->auth_model->register("user", $data);
			if($insert){
				echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="'.base_url('index.php/auth/login').'";</script>';
			}
		}
    }

    public function logout()
    {
        $this->session->sess_destroy();
		echo 'alert("Sukses! Anda berhasil logout."); window.location.href="'.base_url('auth/login').'";     
		';
    }
}