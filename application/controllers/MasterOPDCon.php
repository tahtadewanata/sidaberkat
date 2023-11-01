<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class MasterOPDCon extends DefaultController {

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
		$data['get_master_opd'] = $this->get_master_opd();
		$this->load->view('users/page/master_opd',$data);
	}

	private function get_master_opd(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('master_opd');
		$q = $this->db->get();
		return $q->result();
	}

	public function save_data(){
		$status = "";
		$msg = "";

		$data = [
			"nama_opd" => $this->input->post("nama_opd")
		];

		$doupload = $this->db->insert("master_opd", $data);

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
		$this->db->from("master_opd");
		$this->db->where("id", $id);
		$q = $this->db->get();
		$data["data"] = $q->result();

		echo json_encode($data);
	}


	public function edit_artikel($id){
		$this->load->database();
		$status = "";
		$msg = "";

		$where = array(
			'id'    => $this->input->post('id')
		);

		$data = [
			"nama_opd" => $this->input->post("nama_opd")
		];

		$this->db->where($where);

		$update = $this->db->update("master_opd", $data);

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
		$delete = $this->db->delete("master_opd");

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
