<?php
class Model_data_p3ke_ind extends CI_Model
{

  var $table = 'p3ke_individu';
  var $col_search = array('nik', 'alamat`.`nama',);

  private function get_query_datatable($tahun = null)
  {
    $this->db->select('*');
    $this->db->from($this->table);

    // Assuming you have a 'tahun' field in your table
    if ($tahun) {
      $this->db->where('tahun', $tahun);
    }

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

  function get_datatables($tahun = null)
  {
    $this->get_query_datatable($tahun);
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $this->db->order_by("p3ke_individu.id", "desc");
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->get_query_datatable();
    if ($this->session->userdata('role') != 1)
      $this->db->where(array(
        'p3ke_individu.isActive' => 1,
        'p3ke_individu.created_by' => $this->session->userdata('userid')
      ));
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    if ($this->session->userdata('role') != 1)
      $this->db->where(array(
        'p3ke_individu.isActive' => 1,
        'p3ke_individu.created_by' => $this->session->userdata('userid')
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
    $this->db->insert('p3ke_individu', $data);
    return $this->db->insert_id();
  }

  function update_data($where, $data)
  {
    $this->db->where($where);
    $this->db->update('p3ke_individu', $data);
    return true;
  }
}
