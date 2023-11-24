<?php
defined('BASEPATH') or exit('No direct script access allowed');


class DashboardController extends CI_Controller
{

    public function index()
    {
        $data['jml_program'] = $this->jml_program();
        $data['jml_kegiatan'] = $this->jml_kegiatan();
        $data['total'] = $this->total();
        $data['get_input_program'] = $this->get_input_program();
        // ++++++++++++++ DIAGRAM JENIS ++++++++++++++++

        $data['data_program'] = $this->data_program(date('Y'));
        $data['total_program'] = $this->total_program(date('Y'));
        // ++++++++++++++++ DIAGRAM ANGGARAN +++++++++++++++

        $data['data_anggaran'] = $this->data_anggaran(date('Y'));
        $data['total_anggaran'] = $this->total_anggaran(date('Y'));

        // +++++++++++++++++++ DATA REALISASI TARGET +++++++++++++++
        $data['data_realisasi_target'] = $this->data_realisasi_target(date('Y'));

        $this->load->view('visitors/page/dashboard', $data);
    }

    private function jml_program()
    {
        $this->load->database();
        $this->db->select('id');
        $this->db->from('master_program');
        $this->db->where('tahun', date('Y'));
        $q = $this->db->get();
        return $q->num_rows();
    }

    private function jml_kegiatan()
    {
        $this->load->database();
        $this->db->select('id');
        $this->db->from('input_program');
        $this->db->where('tahun', date('Y'));
        $q = $this->db->get();
        return $q->num_rows();
    }

    private function total()
    {
        $this->load->database();
        $this->db->select('SUM(jumlah_anggaran) as total_anggaran, SUM(realisasi_anggaran) as total_realisasi');
        $this->db->from('input_program');
        $this->db->where('tahun', date('Y'));
        $q = $this->db->get();
        return $q->result();
    }

    private function get_input_program()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('input_program');
        $this->db->where('tahun', date('Y'));
        $q = $this->db->get();
        return $q->result();
    }

    // +++++++++++++++++++++++++++++++++ DIAGRAM JENIS +++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++ DIAGRAM JENIS ++++++++++++++++++++++++++++++++++++++++

    private function data_program($tahun = NULL)
    {
        $this->load->database();
        $this->db->select('input_program.id_program as id_program, master_program.nama_program as nama_program, COUNT(input_program.id_program) as jumlah_program');
        $this->db->from('input_program');
        $this->db->join('master_program', 'master_program.id = input_program.id_program');
        if ($tahun != null) {
            $this->db->where('input_program.tahun', $tahun);
        }
        $this->db->group_by('input_program.id_program');
        $q = $this->db->get();
        return $q->result();
    }


    private function total_program($tahun = NULL)
    {
        $this->load->database();
        $this->db->select('id_program');
        $this->db->from('input_program');
        if ($tahun != null) {
            $this->db->where('tahun', $tahun);
        }
        $q = $this->db->get();
        return $q->num_rows();
    }

    // ++++++++++++++++++++++++++++++++++++++++ DIAGRAM ANGGARAN +++++++++++++++++++++++++++++++++++++++++
    // +++++++++++++++++++++++++++++++++++++++ DIAGRAM ANGGARAN ++++++++++++++++++++++++++++++++++++++++++

    private function data_anggaran($tahun = NULL)
    {
        $this->load->database();
        $this->db->select('input_program.id_program as id_program, master_program.nama_program as nama_program, SUM(input_program.jumlah_anggaran) as jumlah_anggaran, SUM(input_program.realisasi_anggaran) as realisasi_anggaran');
        $this->db->from('input_program');
        $this->db->join('master_program', 'master_program.id = input_program.id_program');
        if ($tahun != null) {
            $this->db->where('input_program.tahun', $tahun);
        }
        $this->db->group_by('input_program.id_program');
        $q = $this->db->get();
        return $q->result();
    }

    private function total_anggaran($tahun = NULL)
    {
        $this->load->database();
        $this->db->select('SUM(jumlah_anggaran) as total_anggaran');
        $this->db->from('input_program');
        if ($tahun != null) {
            $this->db->where('tahun', $tahun);
        }
        $q = $this->db->get();
        return $q->result();
    }

    private function data_realisasi_target($tahun = NULL)
    {
        $this->db->select('master_program.nama_program');
        $this->db->select('COUNT(CASE WHEN input_program.target = input_program.realisasi_keluaran THEN input_program.nama_kegiatan END) AS mencapai_target', FALSE);
        $this->db->select('COUNT(CASE WHEN input_program.target > input_program.realisasi_keluaran THEN input_program.nama_kegiatan END) AS tidak_mencapai_target', FALSE);
        $this->db->select('COUNT(CASE WHEN input_program.target < input_program.realisasi_keluaran THEN input_program.nama_kegiatan END) AS melampaui_target', FALSE);
        $this->db->from('master_program');
        $this->db->join('input_program', 'master_program.id = input_program.id_program', 'left');
        if ($tahun != null) {
            $this->db->where('input_program.tahun', $tahun);
        }
        $this->db->group_by('master_program.nama_program');
        $query = $this->db->get();
        return $query->result();
    }
    // +++++++++++++++++++++++++++++++++++++++ Query Tabel Program Pemberdayaan Masyarakat ++++++++++++++++++++++++++++++++++++++++++

    function view_tabel_program_pmd()
    {
        $query  = "SELECT input_program.nama_kegiatan, input_program.jumlah_anggaran, input_program.sumber_dana, input_program.sasaran_lokasi, input_program.keluaran, input_program.isActive AS status_keluaran, input_program.target, input_program.waktu, input_program.keterangan 
        FROM input_program 
        JOIN users ON input_program.created_by = users.id";
        $search = array('nama_kegiatan', 'sumber_dana', 'created_at');
        $where  = null;
        // $where  = array('nama_kategori' => 'Tutorial');

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->get_tables_query($query, $search, $where, $isWhere);
    }
    public function get_items()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $currentYear = date('Y');

        $this->db->where('tahun', $currentYear);
        $this->db->where('isActive', 1);
        $query = $this->db->get("input_program");


        $data = [];


        foreach ($query->result() as $r) {
            $sasaran_lokasi = json_decode($r->sasaran_lokasi, FALSE);
            $lokasi_text = "";
            $waktu = json_decode($r->waktu);
            foreach ($sasaran_lokasi as $val) {
                $lokasi_text .= "(";
                $lokasi_text .= "KECAMATAN " . $val->nama_kecamatan . "; DESA " . $val->nama_desa;
                $lokasi_text .= ")";
            }

            $data[] = array(
                $r->id,
                $r->nama_kegiatan,
                $r->jumlah_anggaran,
                $r->sumber_dana,
                $lokasi_text,
                $r->keluaran,
                $r->satuan,
                $r->target,
                $waktu,
                $r->keterangan,
            );
        }


        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );


        echo json_encode($result);
        exit();
    }


    function get_tables_query($tables, $cari, $iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");

        $query = $tables;

        if (!empty($iswhere)) {
            $sql = $this->db->query("SELECT * FROM " . $query . " WHERE " . $iswhere);
        } else {
            $sql = $this->db->query("SELECT * FROM " . $query);
        }

        $sql_count = $sql->num_rows();

        $cari = implode(" LIKE '%" . $search . "%' OR ", $cari) . " LIKE '%" . $search . "%'";


        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column'];

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir'];
        $order = " ORDER BY " . $_POST['columns'][$order_field]['data'] . " " . $order_ascdesc;

        if (!empty($iswhere)) {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere AND (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
        } else {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
        }

        if (isset($search)) {
            if (!empty($iswhere)) {
                $sql_cari =  $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere (" . $cari . ")");
            } else {
                $sql_cari =  $this->db->query("SELECT * FROM " . $query . " WHERE (" . $cari . ")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        } else {
            if (!empty($iswhere)) {
                $sql_filter = $this->db->query("SELECT * FROM " . $query . "WHERE " . $iswhere);
            } else {
                $sql_filter = $this->db->query("SELECT * FROM " . $query);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }
        $data = $sql_data->result_array();

        $callback = array(
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,
            'recordsFiltered' => $sql_filter_count,
            'data' => $data
        );
        return json_encode($callback); // Convert array $callback ke json
    }
}
