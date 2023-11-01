<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class DataPPKSCon extends DefaultController
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public $thn_ppks=2023;

    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }

    public function index()
    { 
        if($this->input->get('tahun',TRUE)){
            $data['get_data'] = $this->getData($this->input->get('tahun',TRUE)); 
        } else {
            $data['get_data'] = $this->getData($this->thn_ppks);            
        }
        $data['kecamatan'] = $this->load_kecamatan();
        $data['permasalahan'] = $this->load_permasalahan();
        $this->load->view('users/page/data_ppks', $data);
    }

    public function getData($tahun)
    {
        if($this->session->userdata('role') != 1){
            $id_kec=intval(get_id_kec($this->session->userdata('kecamatan')));
            $id_desa=intval(get_id_desa($id_kec,$this->session->userdata('name')));
        }
        
        $this->db->select('data_ppks.id as id_data_ppks, data_ppks.nik as nik, data_ppks.nama as nama, data_ppks.agama as agama, data_ppks.alamat as alamat, data_ppks.kecamatan as kecamatan,     
            kecamatan.nama_kecamatan as nama_kecamatan, desa.desa as nama_desa, data_ppks.desa as desa, data_ppks.jenis_kelamin as jenis_kelamin, data_ppks.nomor_telepon as nomor_telepon, data_ppks.permasalahan as permasalahan  ,data_ppks.created_by as created_by, data_ppks.updated_by as updated_by, data_ppks.created_at as created_at, data_ppks.updated_at as updated_at, data_ppks.isActive as isActive, permasalahan.nama_permasalahan as nama_permasalahan, data_ppks.keterangan_penduduk ');
        $this->db->from('data_ppks');
        $this->db->join('users', 'data_ppks.created_by = users.id', 'INNER');
        $this->db->join('kecamatan', 'data_ppks.kecamatan = kecamatan.id', 'INNER');
        $this->db->join('desa', 'data_ppks.desa = desa.id', 'INNER');
        $this->db->join('permasalahan', 'data_ppks.permasalahan = permasalahan.id', 'INNER');
        if($this->session->userdata('role')!=1){
            $this->db->where('data_ppks.kecamatan',$id_kec);
            $this->db->where('data_ppks.desa',$id_desa);
        }
        $this->db->where('YEAR(data_ppks.created_at)',$tahun);
        $this->db->order_by('id_data_ppks','DESC');
        $q = $this->db->get();
        return $q->result();
    }

    public function insertData()
    {
        $this->load->model('Model_data_ppks');
        $this->load->database();

        $data = array(
            "nik"                  => $_POST["nik"],
            "nama"                 => $_POST["nama"],
            "agama"                => $_POST["agama"],
            "alamat"               => $_POST["alamat"],
            "kecamatan"            => $_POST["kecamatan"],
            "desa"                 => $_POST["desa"],
            "jenis_kelamin"        => $_POST["jenis_kelamin"],
            "nomor_telepon"        => $_POST["nomor_telepon"],
            "permasalahan"         => $_POST["permasalahan"],
            "keterangan_penduduk"  => $_POST["keterangan_penduduk"],
            "created_at"           => mdate('%Y-%m-%d', now()),
            "created_by"           => $this->session->userdata('userid'),
        );

        $doupload = $this->db->insert('data_ppks', $data);
        if ($doupload) {
            $status = "success";
            $msg = "File successfully uploaded";
        } else {
            unlink($data['full_path']);
            $status = "error";
            $msg = "Something went wrong when saving the file, please try again.";
        }

        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function getById($id)
    {
        $this->load->database();
        $this->db->select('data_ppks.id as id, data_ppks.nik as nik, data_ppks.nama as nama, data_ppks.agama as agama, data_ppks.alamat as alamat, data_ppks.kecamatan as kecamatan, data_ppks.desa as desa, data_ppks.jenis_kelamin as jenis_kelamin, data_ppks.nomor_telepon as nomor_telepon, data_ppks.permasalahan as permasalahan  ,data_ppks.created_by as created_by, data_ppks.updated_by as updated_by, data_ppks.created_at as created_at, data_ppks.updated_at as updated_at, data_ppks.isActive as isActive, data_ppks.keterangan_penduduk');
        $this->db->from('data_ppks');
        $this->db->where('data_ppks.id', $id);
        $this->db->join('users', 'data_ppks.created_by = users.id', 'INNER');
        $q = $this->db->get();
        $data['data'] = $q->result();
        $data['desa'] = $this->db->query("SELECT * from desa where id_kecamatan=" . $data['data'][0]->kecamatan)->result_array();
        echo json_encode($data);
    }

    public function editData($id)
    {
        $this->load->database();
        $this->load->model('Model_data_ppks');

        $where = array(
            'id'    => $_POST["id"]
        );
        $data = array(
            "nik"                  => $_POST["nik"],
            "nama"                 => $_POST["nama"],
            "agama"                => $_POST["agama"],
            "alamat"               => $_POST["alamat"],
            "kecamatan"            => $_POST["kecamatan"],
            "desa"                 => $_POST["desa"],
            "jenis_kelamin"        => $_POST["jenis_kelamin"],
            "nomor_telepon"        => $_POST["nomor_telepon"],
            "permasalahan"         => $_POST["permasalahan"],
            "keterangan_penduduk"  => $_POST["keterangan_penduduk"],
            "created_by"           => $this->session->userdata('userid'),
        );
        $update = $this->Model_data_ppks->update_data($where, $data);
        if ($update == true) {
            $status = "success";
            $msg = "Success updated item";
        } else {
            $status = "error";
            $msg = "Error updated item";
        }

        echo json_encode(array('status' => $update, 'msg' => $msg));
        // echo json_encode($this->db->last_query());
    }

    public function delete($id)
    {
        $this->load->database();
        $this->db->where('id', $_POST['id']);
        $update = $this->db->delete('data_ppks');

        if ($update == true) {
            $status = "success";
            $msg = "Success Delete item";
        } else {
            $status = "error";
            $msg = "Error Delete item";
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }


    private function load_kecamatan()
    {
        $this->load->database();
        return $this->db->get('kecamatan')->result();
    }

    public function getdesa()
    {
        $id = $_GET['id'];
        $kategori = $this->db->query('select * from desa where id_kecamatan=' . $id)->result_array();
        echo json_encode($kategori);
    }

    private function load_permasalahan()
    {
        $this->load->database();
        return $this->db->get('permasalahan')->result();
    }

    public function get_data_nik(){
        $conn = $this->load->database('data_penduduk', TRUE);
        $conn->where('NIK',$_POST['nik']);
        $query=$conn->get('data_penduduk_nganjuk_ori_oracle');

        if($query->num_rows() > 0){
            $data['data']=$query->row();
            $data['desa']=$this->db->query('SELECT desa.id as id, desa.desa as desa FROM desa INNER JOIN kecamatan on desa.id_kecamatan=kecamatan.id WHERE kecamatan.nama_kecamatan="'.$data['data']->NAMA_KEC.'"')->result_array();
            echo json_encode($data);
        }
        else{
            $data['data']=0;
            $data['desa']=0;
            echo json_encode($data);
        }
    }

}
