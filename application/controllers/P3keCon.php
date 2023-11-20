<?php
ini_set('memory_limit', '1024M'); // Increase the limit to 1 GB
defined('BASEPATH') OR exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');
require_once APPPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class P3keCon extends DefaultController {

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

	public function import() {
		$this->load->database();

		$status = "";
		$msg = "";
		$file_element_name = 'excel_file';
		$imgpath = "";

		$config['upload_path'] = './upload_file/folder_excel/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = 150 * 1024;
		$config['file_name'] = time() . '.xlsx';

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)) {
			$status = 'error';
			$msg = $this->upload->display_errors('', '');
		} else {
			$data = $this->upload->data();
			$c = base_url();
			$a = './upload_file/folder_excel/';
			$b = $data['file_name'];
			$file_path = $a . $b;

			$jenis_data = $this->input->post('selected_types');
			$selectedTypes = explode(',', $jenis_data);
			if (in_array('p3ke_keluarga', $selectedTypes)) {
				$this->extractValueKeluarga($file_path);
			}

			if (in_array('p3ke_individu', $selectedTypes)) {
				$this->extractValueIndividu($file_path);
			}
		}
	}

	public function extractValueKeluarga($file_path) {
		$this->load->database();
		$tableName = 'p3ke_keluarga';
		$this->db->trans_start();

		$spreadsheet = IOFactory::load($file_path);
		$sheet = $spreadsheet->getSheet(0);
		$startRow = 5;
		$extractedValues = array();

		while ($sheet->getCell('A' . $startRow)->getValue() != '') {
			$rowValues = $sheet->rangeToArray('A' . $startRow . ':AE' . $startRow, null, true, false)[0];

			if (empty($rowValues[1])) {
				break;
			}

			$tgl_convert = date_create_from_format('d/m/Y H:i:s', $rowValues[13]);
			$tgl_lahir = date_format($tgl_convert, 'Y-m-d');

			$data = array(
				'IDKeluargaP3KE' => $rowValues[1],
				'Provinsi' => $rowValues[2],
				'KabupatenKota' => $rowValues[3],
				'Kecamatan' => $rowValues[4],
				'DesaKelurahan' => $rowValues[5],
				'KodeKemdagri' => $rowValues[6],
				'DesilKesejahteraan' => $rowValues[7],
				'Alamat' => $rowValues[8],
				'KepalaKeluarga' => $rowValues[9],
				'NIK' => $rowValues[10],
				'PadanDukcapil' => $rowValues[11],
				'JenisKelamin' => $rowValues[12],
				'TanggalLahir' => $tgl_lahir,
				'Pekerjaan' => $rowValues[14],
				'Pendidikan' => $rowValues[15],
				'KepemilikanRumah' => $rowValues[16],
				'MemilikiSimpanan' => $rowValues[17],
				'JenisAtap' => $rowValues[18],
				'JenisDinding' => $rowValues[19],
				'JenisLantai' => $rowValues[20],
				'SumberPenerangan' => $rowValues[21],
				'BahanBakarMemasak' => $rowValues[22],
				'SumberAirMinum' => $rowValues[23],
				'MemilikiFasilitasBuangAirBesar' => $rowValues[24],
				'PenerimaBPNT' => $rowValues[25],
				'PenerimaBPUM' => $rowValues[26],
				'PenerimaBST' => $rowValues[27],
				'PenerimaPKH' => $rowValues[28],
				'PenerimaSEMBAKO' => $rowValues[29],
				'ResikoStunting' => $rowValues[30],
				'tahun' => date('Y'),
				'created_at' => date('Y-m-d'),
				'created_by' => $this->session->userdata('userid')
			);

			$cek_nik = $this->db->get_where($tableName, array('NIK' => $data['NIK']))->row();

			if (!empty($cek_nik)) {
				$this->db->update($tableName, $data, array('NIK' => $data['NIK']));
			} else {
				$extractedValues[] = $data;
			}

			$startRow++;
		}

		if (!empty($extractedValues)) {
			$this->db->insert_batch($tableName, $extractedValues);
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$status = "error";
			$msg = "Gagal Insert Data";
		} else {
			$status = "success";
			$msg = "Berhasil Insert Data";
		}

		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	public function extractValueIndividu($file_path) {
		$this->load->database();
		$tableName = 'p3ke_individu';
		$this->db->trans_start();

		$spreadsheet = IOFactory::load($file_path);
		$sheet = $spreadsheet->getSheet(1);
		$startRow = 5;
		$extractedValues = array();

		while ($sheet->getCell('A' . $startRow)->getValue() != '') {
			$rowValues = $sheet->rangeToArray('A' . $startRow . ':AF' . $startRow, null, true, false)[0];

			if (empty($rowValues[1])) {
				break;
			}

			$tgl_convert = date_create_from_format('d/m/Y H:i:s', $rowValues[15]);
			$tgl_lahir = date_format($tgl_convert, 'Y-m-d');

			$data = array(
				'IDKeluargaP3KE' => $rowValues[1],
				'Provinsi' => $rowValues[2],
				'KabupatenKota' => $rowValues[3],
				'Kecamatan' => $rowValues[4],
				'DesaKelurahan' => $rowValues[5],
				'KodeKemdagri' => $rowValues[6],
				'DesilKesejahteraan' => $rowValues[7],
				'Alamat' => $rowValues[8],
				'IDIndividu' => $rowValues[9],
				'Nama' => $rowValues[10],
				'NIK' => $rowValues[11],
				'PadanDukcapil' => $rowValues[12],
				'JenisKelamin' => $rowValues[13],
				'HubunganDenganKepalaKeluarga' => $rowValues[14],
				'TanggalLahir' => $tgl_lahir,
				'StatusKawin' => $rowValues[16],
				'Pekerjaan' => $rowValues[17],
				'Pendidikan' => $rowValues[18],
				'UsiaDibawah7Tahun' => $rowValues[19],
				'Usia7_12' => $rowValues[20],
				'Usia13_15' => $rowValues[21],
				'Usia16_18' => $rowValues[22],
				'Usia19_21' => $rowValues[23],
				'Usia22_59' => $rowValues[24],
				'Usia60TahunKeatas' => $rowValues[25],
				'PenerimaBPNT' => $rowValues[26],
				'PenerimaBPUM' => $rowValues[27],
				'PenerimaBST' => $rowValues[28],
				'PenerimaPKH' => $rowValues[29],
				'PenerimaSEMBAKO' => $rowValues[30],
				'ResikoStunting' => $rowValues[31],
				'tahun' => date('Y'),
				'created_at' => date('Y-m-d'),
				'created_by' => $this->session->userdata('userid')
			);

			$cek_nik = $this->db->get_where($tableName, array('NIK' => $data['NIK']))->row();

			if (!empty($cek_nik)) {
				$this->db->update($tableName, $data, array('NIK' => $data['NIK']));
			} else {
				$extractedValues[] = $data;
			}

			$startRow++;
		}

		if (!empty($extractedValues)) {
			$this->db->insert_batch($tableName, $extractedValues);
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$status = "error";
			$msg = "Gagal Insert Data";
		} else {
			$status = "success";
			$msg = "Berhasil Insert Data";
		}

		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

}
