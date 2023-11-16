<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function index()
	{
		$data['get_total_stunting'] = $this->get_total_stunting();
		$this->load->view('visitors/page/home', $data);
	}

	private function get_total_stunting()
	{
		$this->load->database();
		$this->db->select('p3ke_individu.Kecamatan, maps.geojson, SUM(p3ke_individu.ResikoStunting) AS TotalResikoStunting');
		$this->db->from('p3ke_individu');
		$this->db->join('maps', 'p3ke_individu.Kecamatan = maps.nama_kec');
		$this->db->group_by('p3ke_individu.Kecamatan, maps.geojson');

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
}
