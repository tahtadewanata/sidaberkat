<?php
class Model_data_ppks extends CI_Model
{

  var $table = 'data_ppks';
  var $col_search = array('nik', 'data_ppks`.`nama`', 'permasalahan');

  private function get_query_datatable()
  {
    $this->db->select('data_ppks.id as iddata_ppks, data_ppks.nik as nik, data_ppks.nama as nama, data_ppks.agama as agama, data_ppks.alamat as alamat, data_ppks.kecamatan as kecamatan,     
    kecamatan.nama_kecamatan as nama_kecamatan, desa.desa as nama_desa, data_ppks.desa as desa, data_ppks.jenis_kelamin as jenis_kelamin, data_ppks.nomor_telepon as nomor_telepon, data_ppks.permasalahan as permasalahan  ,data_ppks.created_by as created_by, data_ppks.updated_by as updated_by, data_ppks.created_at as created_at, data_ppks.updated_at as updated_at, data_ppks.isActive as isActive, permasalahan.nama_permasalahan, data_ppks.keterangan_penduduk ');
    $this->db->from($this->table);
    $this->db->join('users', 'data_ppks.created_by = users.id', 'INNER');
    $this->db->join('kecamatan', 'data_ppks.kecamatan = kecamatan.id', 'INNER');
    $this->db->join('desa', 'data_ppks.desa = desa.id', 'INNER');
    $this->db->join('permasalahan', 'data_ppks.permasalahan = permasalahan.id', 'INNER');

    $i = 0;

    foreach ($this->col_search as $item) {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->col_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket

      }
      $i++;
    }
  }

  function get_datatables()
  {
    $this->get_query_datatable();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $this->db->order_by("data_ppks.id", "desc");
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->get_query_datatable();
    if ($this->session->userdata('role') != 1)
      $this->db->where(array(
        'data_ppks.isActive' => 1,
        'data_ppks.created_by' => $this->session->userdata('userid')
      ));
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    if ($this->session->userdata('role') != 1)
      $this->db->where(array(
        'data_ppks.isActive' => 1,
        'data_ppks.created_by' => $this->session->userdata('userid')
      ));
    return $this->db->count_all_results();
  }

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert_file($nik, $nama, $agama, $alamat, $kecamatan, $desa, $jenis_kelamin, $nomor_telepon, $permasalahan, $created_by, $updated_by, $created_at, $updated_at, $isActive)
  {
    $data = array(
      'nik'           => $nik,
      'nama'          => $nama,
      'agama'         => $agama,
      'alamat'        => $alamat,
      'kecamatan'     => $kecamatan,
      'desa'          => $desa,
      'jenis_kelamin' => $jenis_kelamin,
      'nomor_telepon' => $nomor_telepon,
      'permasalahan'  => $permasalahan,
      'created_by'    => $created_by,
      'updated_by'    => $updated_by,
      'created_at'    => $created_at,
      'updated_at'    => $updated_at,
      'isActive'      => $isActive,
    );
    $this->db->insert('data_ppks', $data);
    return $this->db->insert_id();
  }

  function update_data($where, $data)
  {
    $this->db->where($where);
    $this->db->update('data_ppks', $data);
    return true;
  }
}
