<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function index()
	{
		$data['get_total_stunting'] = $this->get_total_stunting();
		$data['get_desa_stunting'] = $this->get_desa_stunting();
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
