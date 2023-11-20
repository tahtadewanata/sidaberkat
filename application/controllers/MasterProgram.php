<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class MasterProgram extends DefaultController {

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
		$data['get_master_program'] = $this->get_master_program();
		$this->load->view('users/page/master-program',$data);
	}

	private function get_master_program(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('master_program');
		$q = $this->db->get();
		return $q->result();
	}

	public function save_data(){
		$status = "";
		$msg = "";

		$data = [
			"nama_program" => strtoupper($this->input->post("nama_program",TRUE)),
			"singkatan_program" => strtoupper($this->input->post("singkatan_program",TRUE)),
		];

		$doupload = $this->db->insert("master_program", $data);

		if($doupload)
		{
			$status = "success";
			$msg = "File successfully uploaded";
		}
		else
		{
			$status = "error";
			$msg = "Something went wrong when saving the file, please try again.";
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	public function getById($id)
	{
		$this->load->database();
		$this->db->select("*");
		$this->db->from("master_program");
		$this->db->where("id", $id);
		$q = $this->db->get();
		$data["data"] = $q->result();

		echo json_encode($data);
	}

	public function edit_data($id){
		$this->load->database();
		$status = "";
		$msg = "";

		$where = array(
			'id'    => $this->input->post('id')
		);

		$data = [
			"nama_program" => strtoupper($this->input->post("nama_program",TRUE)),
			"singkatan_program" => strtoupper($this->input->post("singkatan_program",TRUE)),
		];

		$this->db->where($where);

		$update = $this->db->update("master_program", $data);

		if($update)
		{
			$status = "success";
			$msg = "Success updated item";
		}
		else
		{
			$status = "error";
			$msg = "Error updated item";    
		}

		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	public function delete($id)
	{
		$this->load->database();
		$status = "";
		$msg = "";

		$where = [
			"id" => $id,
		];

		$this->db->where($where);
		$delete = $this->db->delete("master_program");

		if ($delete) {
			$status = "success";
			$msg = "Success Delete";
		} else {
			$status = "error";
			$msg = "Error Delete";
		}
		echo json_encode(["status" => $status, "msg" => $msg]);
	}

}
