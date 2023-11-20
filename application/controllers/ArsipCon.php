<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');
require_once APPPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminController extends DefaultController {

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
		$data['tahun']=$this->input->post('tahun',TRUE);
		$data['nama_opd']=$this->input->post('nama_opd',TRUE);
		$data['get_data_arsip'] = $this->get_data_arsip($data['tahun'],$data['nama_opd']);
		$data['get_opd'] = $this->get_opd();
		$this->load->view('users/page/data_arsip',$data);
	}

	private function get_opd(){
		$this->load->database();
		$this->db->select('nama_opd');
		$this->db->from('data_arsip');
		$this->db->group_by('nama_opd');
		$q = $this->db->get();
		return $q->result();
	}

	private function get_data_arsip($tahun = null, $nama_opd = null) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('data_arsip');

		if ($tahun != null) {
			$this->db->where('tahun', $tahun);
		}

		if ($nama_opd != null) {
			$this->db->like('nama_opd', $nama_opd);
		}

		$q = $this->db->get();
		return $q->result();
	}

	public function export_excel() {
		$tahun = $this->input->post('tahun', TRUE);
		$nama_opd = $this->input->post('nama_opd', TRUE);
		$data_arsip = $this->get_data_arsip($tahun, $nama_opd);
		
		$judul_export = $this->input->post('judul_export', TRUE);
		$nama_opd_export = $this->input->post('opd_export', TRUE);
		$tahun_export = $this->input->post('tahun_export', TRUE);
		
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->mergeCells('A1:J1');
		$sheet->mergeCells('A2:J2');
		$sheet->mergeCells('A3:J3');
		
		$sheet->setCellValue('A1', $judul_export);
		$sheet->setCellValue('A2', $nama_opd_export);
		$sheet->setCellValue('A3', $tahun_export);


		$commonStyle = $sheet->getStyle('A1:A3');
		$commonStyle->getFont()->setName('Arial')->setSize(11)->setBold(true);
		$commonStyle->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$commonStyle->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$commonStyle->getAlignment()->setWrapText(true);

		$sheet->duplicateStyle($commonStyle, 'A1:A3');

		$sheet->setCellValue('A5', 'No.Bks');
		$sheet->setCellValue('B5', 'Pokok Masalah');
		$sheet->setCellValue('C5', 'Rincian Masalah');
		$sheet->setCellValue('D5', 'Tahun');
		$sheet->setCellValue('E5', 'Lokasi Penyimpanan');
		$sheet->setCellValue('E6', 'Box');
		$sheet->setCellValue('F6', 'Rak');
		$sheet->setCellValue('G6', 'Sap');
		$sheet->setCellValue('H5', 'Jangka Simpan');
		$sheet->setCellValue('H6', 'Aktif');
		$sheet->setCellValue('I6', 'Inaktif');
		$sheet->setCellValue('J5', 'Keterangan');

		$sheet->mergeCells('A5:A6'); 
		$sheet->mergeCells('B5:B6');
		$sheet->mergeCells('C5:C6');
		$sheet->mergeCells('D5:D6');
		$sheet->mergeCells('E5:G5');
		$sheet->mergeCells('H5:I5');
		$sheet->mergeCells('J5:J6');

		$headerCellRange = 'A5:J6'; 
		$headerStyle = $sheet->getStyle($headerCellRange);
		$headerStyle->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$headerStyle->getFont()->setBold(true); 

		$row = 7; 
		$count=0; 
		foreach ($data_arsip as $val) {
			$count=$count+1;
			$sheet->setCellValue('A' . $row, $count); 
			$sheet->setCellValue('B' . $row, $val->pokok_masalah);
			$sheet->setCellValue('C' . $row, $val->rincian_masalah);
			$sheet->setCellValue('D' . $row, $val->tahun);
			$sheet->setCellValue('E' . $row, $val->box);
			$sheet->setCellValue('F' . $row, $val->rak);
			$sheet->setCellValue('G' . $row, $val->sap);
			$sheet->setCellValue('H' . $row, $val->aktif);
			$sheet->setCellValue('I' . $row, $val->inaktif);
			$sheet->setCellValue('J' . $row, $val->keterangan);

			$dataCellRange = 'A' . $row . ':J' . $row;
			$dataCellStyle = $sheet->getStyle($dataCellRange);
			$dataCellStyle->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$row++;
		}
		$filename = 'data_arsip_' . date('YmdHis') . '.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
	}

	public function save_data(){
		$status = "";
		$msg = "";

		$data = [
			"pokok_masalah" => $this->input->post("pokok_masalah"),
			"nama_opd" => $this->input->post("nama_opd"),
			"rincian_masalah" => $this->input->post("rincian_masalah"),
			"tahun" => $this->input->post("tahun"),
			"box" => $this->input->post("box"),
			"rak" => $this->input->post("rak"),
			"sap" => $this->input->post("sap"),
			"aktif" => $this->input->post("aktif"),
			"inaktif" => $this->input->post("inaktif"),
			"keterangan" => $this->input->post("keterangan"),
			"created_by" => $this->session->userdata("userid"),
			"created_at" => mdate('%Y-%m-%d', now())
		];

		$doupload = $this->db->insert("data_arsip", $data);

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
		$this->db->from("data_arsip");
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
			"pokok_masalah" => $this->input->post("pokok_masalah"),
			"nama_opd" => $this->input->post("nama_opd"),
			"rincian_masalah" => $this->input->post("rincian_masalah"),
			"tahun" => $this->input->post("tahun"),
			"box" => $this->input->post("box"),
			"rak" => $this->input->post("rak"),
			"sap" => $this->input->post("sap"),
			"aktif" => $this->input->post("aktif"),
			"inaktif" => $this->input->post("inaktif"),
			"keterangan" => $this->input->post("keterangan")
		];

		$this->db->where($where);

		$update = $this->db->update("data_arsip", $data);

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
		$delete = $this->db->delete("data_arsip");

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
