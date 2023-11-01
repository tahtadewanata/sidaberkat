<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('users/auth/login');
	}

	public function checkauth()
	{
		$this->load->model('model_users');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->model_users->validateUsers($username,$password);

		if($query === 1) return 1; //"User Tidak Ditemukan";
		else if($query === 2) return 2; //"User Tidak Aktif";
		else if($query === 3) return 3; //"Password Salah";
		else {
			//membuat session dengan nama userdata
			$userData = array(
				'userid' => $query->id,
				'username' => $query->username,
				'name' => $query->nama,
				'kecamatan' => $query->kecamatan,
				'role' => $query->roleid,
				'flag' => 'kecamatan',
				'logged_in' => true
			);
			$this->session->set_userdata($userData);
			return 4;
		}
	}

	public function validatelogin()
	{
		if($this->session->userdata('role' === 1)){redirect('admin');}
		if($this->input->post('submit')){
			$this->load->model('model_users');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			$valid = $this->checkauth();
			if($this->form_validation->run() && $valid == 4)
			{
				$this->session->set_flashdata('success', 'Login Success');
				redirect('admin');
			}
			else {
				if($valid == 1)
				{
					$this->session->set_flashdata('error', 'User Tidak Ditemukan');
				}
				else if($valid == 2)
				{
					$this->session->set_flashdata('error', 'User Tidak Aktif');
				}
				else if($valid == 3)
				{
					$this->session->set_flashdata('error', 'Password Salah');
				}	
				redirect('auth/login');		
			}
		}
		else {
			redirect('auth/login');	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function reset(){
		$this->load->view("users/auth/ganti_password");
	}

	public function save_password(){
		$this->load->model('model_users');
		$username = $this->session->userdata('username');
		$password = $this->input->post('password_lama');
		$query = $this->model_users->validateUsers($username,$password);
		if($query===3){
			$this->session->set_flashdata("status_password",'<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
			redirect(base_url().'admin/reset');
		} else {
			$update_pass = $this->ganti_password($username,$this->input->post('password_baru'));
			redirect(base_url().'admin/reset');
		}
	}

	private function ganti_password($username,$password){
		$this->load->model('model_users');
		$where = array(
			'username'    => $username
		);

		$data = array(
			'password'       => md5($password)
		);

		$this->db->where($where);
		$update = $this->db->update('users',$data);

		if($update)
		{
			return $this->session->set_flashdata("status_password",'<div class="alert alert-success" role="alert">Berhasil Mengganti Password</div>');
		}
		else
		{
			return $this->session->set_flashdata("status_password",'<div class="alert alert-danger" role="alert">Gagal Mengganti Password</div>');    
		}
	}

}