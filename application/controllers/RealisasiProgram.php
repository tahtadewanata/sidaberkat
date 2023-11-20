<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class RealisasiProgram extends DefaultController {

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
	public function __construct()
	{
		parent::__construct();
		$this->checkLogin();
	}

	public function index()
	{
		if($this->input->post('tahun',TRUE)){
			$data['tahun']=$this->input->post('tahun',TRUE);
		} else {
			$data['tahun']=date('Y');
		}
		$data['get_input_program'] = $this->get_input_program($data['tahun']);
		$this->load->view('users/page/realisasi-program',$data);
	}

	private function get_input_program($tahun = NULL){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('input_program');
		if ($tahun != null) {
			$this->db->where('tahun', $tahun);
		}
		$q = $this->db->get();
		return $q->result();
	}

}
