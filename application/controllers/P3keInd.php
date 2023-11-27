<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class P3keInd extends DefaultController
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

    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
        $this->load->model("Model_data_p3ke_ind"); //load model data mahasiswa

    }

    public function ajax_list($tahun = null)
    {
        header('Content-Type: application/json');
        $list = $this->Model_data_p3ke_ind->get_datatables($tahun);
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $val) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $val->IDKeluargaP3KE;
            $row[] = $val->Provinsi;
            $row[] = $val->KabupatenKota;
            $row[] = $val->Kecamatan;
            $row[] = $val->DesaKelurahan;
            $row[] = $val->KodeKemdagri;
            $row[] = $val->DesilKesejahteraan;
            $row[] = $val->Alamat;
            $row[] = $val->IDIndividu;
            $row[] = $val->Nama;
            $row[] = $val->NIK;
            $row[] = $val->PadanDukcapil;
            $row[] = $val->JenisKelamin;
            $row[] = $val->HubunganDenganKepalaKeluarga;
            $row[] = $val->TanggalLahir;
            $row[] = $val->StatusKawin;
            $row[] = $val->Pekerjaan;
            $row[] = $val->Pendidikan;
            $row[] = $val->UsiaDibawah7Tahun;
            $row[] = $val->Usia7_12;
            $row[] = $val->Usia13_15;
            $row[] = $val->Usia16_18;
            $row[] = $val->Usia19_21;
            $row[] = $val->Usia22_59;
            $row[] = $val->Usia60TahunKeatas;
            $row[] = $val->PenerimaBPNT;
            $row[] = $val->PenerimaBPUM;
            $row[] = $val->PenerimaBST;
            $row[] = $val->PenerimaPKH;
            $row[] = $val->PenerimaSEMBAKO;
            $row[] = $val->ResikoStunting;
            $row[] = $val->tahun;
            $row[] = get_nama_user($val->created_by);
            $row[] = '<div class="btn-group"><button class="btn btn-info btn-sm" title="Edit" onclick="update(' . "'" . $val->id . "'" . ')"><i class="fas fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Hapus" onclick="hapus(' . "'" . $val->id . "'" . ')"><i class="fas fa-trash-alt"></i></button></div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->Model_data_p3ke_ind->count_all(),
            "recordsFiltered" => $this->Model_data_p3ke_ind->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    public function p3ke_individu()
    {
        if ($this->input->post('tahun', TRUE)) {
            $data['tahun'] = $this->input->post('tahun', TRUE);
        } else {
            $data['tahun'] = date('Y');
        }
        $this->load->view('users/page/p3ke_individu', $data);
    }



    public function insertData()
    {
        $this->load->database();
        $data = array(
            "IDKeluargaP3KE"             => $this->input->post('IDKeluargaP3KE', TRUE),
            "Provinsi"                   => $this->input->post('Provinsi', TRUE),
            "KabupatenKota"              => $this->input->post('KabupatenKota', TRUE),
            "Kecamatan"                  => $this->input->post('Kecamatan', TRUE),
            "DesaKelurahan"              => $this->input->post('DesaKelurahan', TRUE),
            "KodeKemdagri"               => $this->input->post('KodeKemdagri', TRUE),
            "DesilKesejahteraan"         => $this->input->post('DesilKesejahteraan', TRUE),
            "Alamat"                     => $this->input->post('Alamat', TRUE),
            "IDIndividu"                 => $this->input->post('IDIndividu', TRUE),
            "Nama"                       => $this->input->post('Nama', TRUE),
            "NIK"                        => $this->input->post('NIK', TRUE),
            "PadanDukcapil"              => $this->input->post('PadanDukcapil', TRUE),
            "JenisKelamin"               => $this->input->post('JenisKelamin', TRUE),
            "TanggalLahir"               => $this->input->post('TanggalLahir', TRUE),
            "StatusKawin"                => $this->input->post('StatusKawin', TRUE),
            "Pekerjaan"                  => $this->input->post('Pekerjaan', TRUE),
            "Pendidikan"                 => $this->input->post('Pendidikan', TRUE),
            "UsiaDibawah7Tahun"          => $this->input->post('UsiaDibawah7Tahun', TRUE),
            "Usia7_12"                   => $this->input->post('Usia7_12', TRUE),
            "Usia13_15"                  => $this->input->post('Usia13_15', TRUE),
            "Usia16_18"                  => $this->input->post('Usia16_18', TRUE),
            "Usia19_21"                  => $this->input->post('Usia19_21', TRUE),
            "Usia22_59"                  => $this->input->post('Usia22_59', TRUE),
            "Usia60TahunKeatas"          => $this->input->post('Usia60TahunKeatas', TRUE),
            "PenerimaBPNT"               => $this->input->post('PenerimaBPNT', TRUE),
            "PenerimaBPUM"               => $this->input->post('PenerimaBPUM', TRUE),
            "PenerimaBST"                => $this->input->post('PenerimaBST', TRUE),
            "PenerimaPKH"                => $this->input->post('PenerimaPKH', TRUE),
            "PenerimaSEMBAKO"            => $this->input->post('PenerimaSEMBAKO', TRUE),
            "ResikoStunting"             => $this->input->post('ResikoStunting', TRUE),
            "tahun"                      => date('Y'),
            "created_at"                 => mdate('%Y-%m-%d', now()),
            "created_by"                 => $this->session->userdata('userid'),
        );

        $doupload = $this->db->insert('p3ke_individu', $data);
        if ($doupload) {
            $status = "success";
            $msg = "Data berhasil disimpan";
        } else {
            $status = "error";
            $msg = "Terjadi kesalahan saat menyimpan data, silakan coba lagi.";
        }

        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function getById($id)
    {
        $this->load->database();
        $this->db->select("*");
        $this->db->from("p3ke_individu");
        $this->db->where("id", $id);
        $q = $this->db->get();
        $data["data"] = $q->result();

        echo json_encode($data);
    }

    public function updateData()
    {
        $this->load->database();
        $id = $this->input->post('id', TRUE);

        $data = array(
            "IDKeluargaP3KE"             => $this->input->post('IDKeluargaP3KE', TRUE),
            "Provinsi"                   => $this->input->post('Provinsi', TRUE),
            "KabupatenKota"              => $this->input->post('KabupatenKota', TRUE),
            "Kecamatan"                  => $this->input->post('Kecamatan', TRUE),
            "DesaKelurahan"              => $this->input->post('DesaKelurahan', TRUE),
            "KodeKemdagri"               => $this->input->post('KodeKemdagri', TRUE),
            "DesilKesejahteraan"         => $this->input->post('DesilKesejahteraan', TRUE),
            "Alamat"                     => $this->input->post('Alamat', TRUE),
            "IDIndividu"                 => $this->input->post('IDIndividu', TRUE),
            "Nama"                       => $this->input->post('Nama', TRUE),
            "NIK"                        => $this->input->post('NIK', TRUE),
            "PadanDukcapil"              => $this->input->post('PadanDukcapil', TRUE),
            "JenisKelamin"               => $this->input->post('JenisKelamin', TRUE),
            "TanggalLahir"               => $this->input->post('TanggalLahir', TRUE),
            "StatusKawin"                => $this->input->post('StatusKawin', TRUE),
            "Pekerjaan"                  => $this->input->post('Pekerjaan', TRUE),
            "Pendidikan"                 => $this->input->post('Pendidikan', TRUE),
            "UsiaDibawah7Tahun"          => $this->input->post('UsiaDibawah7Tahun', TRUE),
            "Usia7_12"                   => $this->input->post('Usia7_12', TRUE),
            "Usia13_15"                  => $this->input->post('Usia13_15', TRUE),
            "Usia16_18"                  => $this->input->post('Usia16_18', TRUE),
            "Usia19_21"                  => $this->input->post('Usia19_21', TRUE),
            "Usia22_59"                  => $this->input->post('Usia22_59', TRUE),
            "Usia60TahunKeatas"          => $this->input->post('Usia60TahunKeatas', TRUE),
            "PenerimaBPNT"               => $this->input->post('PenerimaBPNT', TRUE),
            "PenerimaBPUM"               => $this->input->post('PenerimaBPUM', TRUE),
            "PenerimaBST"                => $this->input->post('PenerimaBST', TRUE),
            "PenerimaPKH"                => $this->input->post('PenerimaPKH', TRUE),
            "PenerimaSEMBAKO"            => $this->input->post('PenerimaSEMBAKO', TRUE),
            "ResikoStunting"             => $this->input->post('ResikoStunting', TRUE)
        );

        $this->db->where('id', $id);
        $doupdate = $this->db->update('p3ke_individu', $data);

        if ($doupdate) {
            $status = "success";
            $msg = "Data berhasil diperbarui";
        } else {
            $status = "error";
            $msg = "Terjadi kesalahan saat memperbarui data, silakan coba lagi.";
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
        $delete = $this->db->delete("p3ke_individu");

        if ($delete) {
            $status = "success";
            $msg = "Success Delete";
        } else {
            $status = "error";
            $msg = "Error Delete";
        }
        echo json_encode(["status" => $status, "msg" => $msg]);
    }

    public function export_excel()
    {
        $tahun = $this->input->post('tahun_export', TRUE);
        $data_p3ke_individu = $this->get_p3ke_individu($tahun);

        $judul_export = 'Data P3KE Individu';

        $this->load->library('PHPExcel');
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();

        $sheet->setCellValue('A1', $judul_export);
        $sheet->setCellValue('A2', 'Tahun: ' . $tahun);

        $header = [
            'No',
            'ID Keluarga P3KE',
            'Provinsi',
            'Kabupaten/Kota',
            'Kecamatan',
            'Desa/Kelurahan',
            'Kode Kemdagri',
            'Desil Kesejahteraan',
            'Alamat',
            'ID Individu',
            'Nama',
            'NIK',
            'Padan Dukcapil',
            'Jenis Kelamin',
            'Hubungan dengan Kepala Keluarga',
            'Tanggal Lahir',
            'Status Kawin',
            'Pekerjaan',
            'Pendidikan',
            'Usia < 7 Tahun',
            'Usia 7-12 Tahun',
            'Usia 13-15 Tahun',
            'Usia 16-18 Tahun',
            'Usia 19-21 Tahun',
            'Usia 22-59 Tahun',
            'Usia 60+ Tahun',
            'Penerima BPNT',
            'Penerima BPUM',
            'Penerima BST',
            'Penerima PKH',
            'Penerima SEMBAKO',
            'Resiko Stunting'
        ];

        $column = 'A';
        foreach ($header as $item) {
            $sheet->setCellValue($column . '4', $item);
            $column++;
        }

        $row = 5;
        $count = 0;
        foreach ($data_p3ke_individu as $data) {
            $count = $count + 1;
            $sheet->setCellValue('A' . $row, $data->id);
            $sheet->setCellValueExplicit('B' . $row, $data->IDKeluargaP3KE, PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue('C' . $row, $data->Provinsi);
            $sheet->setCellValue('D' . $row, $data->KabupatenKota);
            $sheet->setCellValue('E' . $row, $data->Kecamatan);
            $sheet->setCellValue('F' . $row, $data->DesaKelurahan);
            $sheet->setCellValueExplicit('G' . $row, $data->KodeKemdagri, PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue('H' . $row, $data->DesilKesejahteraan);
            $sheet->setCellValue('I' . $row, $data->Alamat);
            $sheet->setCellValue('J' . $row, $data->IDIndividu);
            $sheet->setCellValue('K' . $row, $data->Nama);
            $sheet->setCellValueExplicit('L' . $row, $data->NIK, PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue('M' . $row, $data->PadanDukcapil);
            $sheet->setCellValue('N' . $row, $data->JenisKelamin);
            $sheet->setCellValue('O' . $row, $data->HubunganDenganKepalaKeluarga);
            $sheet->setCellValue('P' . $row, $data->TanggalLahir);
            $sheet->setCellValue('Q' . $row, $data->StatusKawin);
            $sheet->setCellValue('R' . $row, $data->Pekerjaan);
            $sheet->setCellValue('S' . $row, $data->Pendidikan);
            $sheet->setCellValue('T' . $row, $data->UsiaDibawah7Tahun);
            $sheet->setCellValue('U' . $row, $data->Usia7_12);
            $sheet->setCellValue('V' . $row, $data->Usia13_15);
            $sheet->setCellValue('W' . $row, $data->Usia16_18);
            $sheet->setCellValue('X' . $row, $data->Usia19_21);
            $sheet->setCellValue('Y' . $row, $data->Usia22_59);
            $sheet->setCellValue('Z' . $row, $data->Usia60TahunKeatas);
            $sheet->setCellValue('AA' . $row, $data->PenerimaBPNT);
            $sheet->setCellValue('AB' . $row, $data->PenerimaBPUM);
            $sheet->setCellValue('AC' . $row, $data->PenerimaBST);
            $sheet->setCellValue('AD' . $row, $data->PenerimaPKH);
            $sheet->setCellValue('AE' . $row, $data->PenerimaSEMBAKO);
            $sheet->setCellValue('AF' . $row, $data->ResikoStunting);

            $row++;
        }

        $filename = 'data_p3ke_individu_' . date('YmdHis') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
    }
}
