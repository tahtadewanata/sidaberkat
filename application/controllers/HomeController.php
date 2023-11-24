<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function index()
	{
		$data['get_total_stunting'] = $this->get_total_stunting();
		$data['get_desa_stunting'] = $this->get_desa_stunting();
		$year = $this->input->get('year'); // Ambil tahun dari parameter GET

		$data['chart_data'] = $this->getChartData($year); // Mengambil data dari method getChartData()
		$data['chart_anggaran'] = $this->getanggaranchart();
		$this->load->view('visitors/page/home', $data);
	}

	public function kemiskinan()
	{
		$data['get_total_kemiskinan'] = $this->get_total_kemiskinan();
		$data['get_desa_stunting'] = $this->get_desa_stunting();
		$this->load->view('visitors/page/kemiskinan', $data);
	}

	private function get_total_stunting()
	{
		$this->load->database();
		$this->db->select('p3ke_individu.Kecamatan, maps.geojson, SUM(p3ke_individu.ResikoStunting) AS TotalResikoStunting');
		$this->db->from('p3ke_individu');
		$this->db->join('maps', 'p3ke_individu.Kecamatan = maps.nama_kec');
		$this->db->where('p3ke_individu.ResikoStunting', 1);
		$this->db->group_by('p3ke_individu.Kecamatan, maps.geojson');

		$query = $this->db->get();
		return $query->result();
	}
	private function getChartData($year = null)
	{
		$sql = "SELECT master_program.nama_program, nama_kegiatan, jumlah_anggaran, realisasi_anggaran, realisasi_anggaran * 100/(jumlah_anggaran) as persentase, input_program.tahun
                FROM `input_program` 
                JOIN master_program ON input_program.id_program = master_program.id";

		if ($year) {
			$sql .= " WHERE input_program.tahun = $year";
		}

		$query = $this->db->query($sql);
		return $query->result_array();
	}
	private function getanggaranchart()
	{
		$sql = "SELECT nama_kegiatan, jumlah_anggaran, (SELECT SUM(jumlah_anggaran) FROM input_program) as total_anggaran, jumlah_anggaran * 100 / (SELECT SUM(jumlah_anggaran) 
				FROM input_program) AS persentase 
				FROM input_program";
		$query = $this->db->query($sql);
		return $query->result();
	}
	private function getChartDataOld()
	{
		$query = $this->db->query("SELECT master_program.nama_program, nama_kegiatan, jumlah_anggaran, realisasi_anggaran, realisasi_anggaran * 100/(jumlah_anggaran) as persentase, input_program.tahun FROM `input_program`
JOIN master_program ON input_program.id_program = master_program.id;");
		return $query->result_array();
	}

	private function get_total_kemiskinan()
	{
		$this->db->select('COUNT(p3ke_keluarga.id) as count, p3ke_keluarga.Kecamatan, p3ke_keluarga.DesaKelurahan, maps.geojson');
		$this->db->from('p3ke_keluarga');
		$this->db->join('maps', 'p3ke_keluarga.Kecamatan = maps.nama_kec');
		$this->db->where("(PenerimaBPNT = 'Ya' OR PenerimaBPUM = 'Ya' OR PenerimaBST = 'Ya' OR PenerimaPKH = 'Ya' OR PenerimaSEMBAKO = 'Ya')");
		$this->db->group_by(array('p3ke_keluarga.Kecamatan', 'p3ke_keluarga.DesaKelurahan', 'maps.geojson'));

		$query = $this->db->get();
		return $query->result();
	}
	private function get_desa_stunting()
	{
		$this->load->database();
		$this->db->select('COUNT(p3ke_individu.id) AS JumlahIndividu, p3ke_individu.DesaKelurahan, p3ke_individu.Kecamatan, maps.geojson, SUM(p3ke_individu.ResikoStunting) AS TotalResikoStunting');
		$this->db->from('p3ke_individu');
		$this->db->join('maps', 'p3ke_individu.Kecamatan = maps.nama_kec');
		$this->db->where('p3ke_individu.ResikoStunting', 1);
		$this->db->group_by('p3ke_individu.Kecamatan, p3ke_individu.DesaKelurahan, maps.geojson');

		$query = $this->db->get();
		return $query->result();
	}

	public function jml_stunting()
	{
		$this->load->database();
		$this->db->select('id');
		$this->db->from('p3ke_individu');
		$this->db->like('Kecamatan', $this->input->post('nama_kec'));
		$this->db->where('ResikoStunting', 1);
		$q = $this->db->get();
		echo json_encode(array('jml_stunting' => $q->num_rows()));
	}

	//query mengetahui kemiskinan ganti dengan tabel p3k3_keluarga


	//QUERY UNTUK MENGETAHUI STUNTING MASING" DESA DAN DITAMPILKAN DI MAPS

}
