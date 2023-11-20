<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class InputProgram extends DefaultController {

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
		$this->load->view('users/page/input-program',$data);
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

	// +++++++++++++++++++++++ FORM INPUT PROGRAM +++++++++++++++++++++++++++++++

	public function form_input_program(){
		if($this->input->get('id_data',TRUE)){
			$id_data = $this->input->get('id_data',TRUE);
			$data['get_data_input'] = $this->get_data_input($id_data);
		} 
		$data['get_sumberdana'] = $this->get_sumberdana();
		$data['get_lokasi'] = $this->get_lokasi();
		$data['get_orang'] = $this->get_orang();
		$data['get_program'] = $this->get_program();
		$data['get_satuan'] = $this->get_satuan();
		$this->load->view('users/page/form-input-program',$data);
	}

	public function getById($id)
	{
		$this->load->database();
		$this->db->select('*');
		$this->db->from('input_program');
		$this->db->where('id',$id);
		$q = $this->db->get();
		$data["data"] = $q->result();

		echo json_encode($data);
	}

	private function get_data_input($id){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('input_program');
		$this->db->where('id',$id);
		$q = $this->db->get();
		return $q->result();
	}

	private function get_program(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('master_program');
		$q = $this->db->get();
		return $q->result();
	}

	private function get_satuan(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('master_satuan');
		$q = $this->db->get();
		return $q->result();
	}

	private function get_sumberdana(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('master_sumberdana');
		$q = $this->db->get();
		return $q->result();
	}

	private function get_lokasi(){
		$this->db->select('kecamatan.id as id_kecamatan, kecamatan.nama as nama_kecamatan, desa.id as id_desa, desa.nama as nama_desa');
		$this->db->from('kecamatan');
		$this->db->join('desa', 'desa.id_kecamatan = kecamatan.id', 'left');
		$q = $this->db->get();
		return $q->result();
	}

	private function get_orang(){
		$this->db->select('*');
		$this->db->from('p3ke_individu');
		$q = $this->db->get();
		return $q->result();
	}


	public function save_data() {

		$id_program = $this->input->post('id_program',TRUE);
		$nama_kegiatan = $this->input->post('nama_kegiatan',TRUE);

		$raw_jumlah_anggaran = $this->input->post('jumlah_anggaran', TRUE);
		$jumlah_anggaran = (int)preg_replace('/[^0-9]/', '', $raw_jumlah_anggaran);
		
		$sumber_dana = $this->input->post('sumber_dana',TRUE);
		$sasaran_lokasi = $this->input->post('sasaran_lokasi',TRUE);
		$sasaran_orang = $this->input->post('sasaran_orang',TRUE);
		$keluaran = $this->input->post('keluaran',TRUE);
		$satuan = $this->input->post('satuan',TRUE);
		$target = $this->input->post('target',TRUE);
		$waktu = $this->input->post('waktu',TRUE);
		$keterangan = $this->input->post('keterangan',TRUE);

		$data = array(
			'id_program' => $id_program,
			'nama_kegiatan' => $nama_kegiatan,
			'jumlah_anggaran' => $jumlah_anggaran,
			'sumber_dana' => $sumber_dana,
			'sasaran_lokasi' => $sasaran_lokasi,
			'sasaran_orang' => $sasaran_orang,
			'keluaran' => $keluaran,
			'satuan' => $satuan,
			'target' => $target,
			'waktu' => $waktu,
			'keterangan' => $keterangan,
			"tahun"      => date('Y'),
			"created_at"  => mdate('%Y-%m-%d', now()),
			"created_by"  => $this->session->userdata('userid')
		);

		$this->db->insert('input_program', $data);

		if ($this->db->affected_rows() > 0) {
			echo json_encode(array('status' => 'success', 'msg' => 'Data berhasil disimpan'));
		} else {
			echo json_encode(array('status' => 'error', 'msg' => 'Gagal menyimpan data'));
		}
	}

	public function edit_data(){
		$id = $this->input->post('id', TRUE);

		$id_program = $this->input->post('id_program', TRUE);
		$nama_kegiatan = $this->input->post('nama_kegiatan', TRUE);

		$raw_jumlah_anggaran = $this->input->post('jumlah_anggaran', TRUE);
		$jumlah_anggaran = (int)preg_replace('/[^0-9]/', '', $raw_jumlah_anggaran);

		$sumber_dana = $this->input->post('sumber_dana', TRUE);
		$sasaran_lokasi = $this->input->post('sasaran_lokasi', TRUE);
		$sasaran_orang = $this->input->post('sasaran_orang', TRUE);
		$keluaran = $this->input->post('keluaran', TRUE);
		$satuan = $this->input->post('satuan', TRUE);
		$target = $this->input->post('target', TRUE);
		$waktu = $this->input->post('waktu', TRUE);
		$keterangan = $this->input->post('keterangan', TRUE);

		$data = array(
			'id_program' => $id_program,
			'nama_kegiatan' => $nama_kegiatan,
			'jumlah_anggaran' => $jumlah_anggaran,
			'sumber_dana' => $sumber_dana,
			'sasaran_lokasi' => $sasaran_lokasi,
			'sasaran_orang' => $sasaran_orang,
			'keluaran' => $keluaran,
			'satuan' => $satuan,
			'target' => $target,
			'waktu' => $waktu,
			'keterangan' => $keterangan,
			"tahun" => date('Y'),
			"created_at" => mdate('%Y-%m-%d', now()),
			"created_by" => $this->session->userdata('userid')
		);

		$this->db->where('id', $id);
		$this->db->update('input_program', $data);

		if ($this->db->affected_rows() > 0) {
			echo json_encode(array('status' => 'success', 'msg' => 'Data berhasil diupdate'));
		} else {
			echo json_encode(array('status' => 'error', 'msg' => 'Gagal mengupdate data'));
		}
	}

	public function edit_realisasi(){
		$id = $this->input->post('id', TRUE);

		$raw_realisasi_anggaran = $this->input->post('realisasi_anggaran', TRUE);
		$realisasi_anggaran = (int)preg_replace('/[^0-9]/', '', $raw_realisasi_anggaran);
		$realisasi_keluaran = $this->input->post('realisasi_keluaran', TRUE);

		$data = array(
			'realisasi_anggaran' => $realisasi_anggaran,
			'realisasi_keluaran' => $realisasi_keluaran
		);

		$this->db->where('id', $id);
		$this->db->update('input_program', $data);

		if ($this->db->affected_rows() > 0) {
			echo json_encode(array('status' => 'success', 'msg' => 'Data berhasil diupdate'));
		} else {
			echo json_encode(array('status' => 'error', 'msg' => 'Gagal mengupdate data'));
		}
	}
}
