<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');

class P3keKel extends DefaultController
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
    }

    public function p3ke_keluarga()
    {
        if($this->input->post('tahun',TRUE)){
            $data['tahun']=$this->input->post('tahun',TRUE);
        } else {
            $data['tahun']=date('Y');
        }
        $data['get_p3ke_keluarga'] = $this->get_p3ke_keluarga($data['tahun']);
        $this->load->view('users/page/p3ke_keluarga',$data);
    }

    private function get_p3ke_keluarga($tahun = null) {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('p3ke_keluarga');

        if ($tahun != null) {
            $this->db->where('tahun', $tahun);
        }

        $q = $this->db->get();
        return $q->result();
    }

    public function insertData()
    {
        $this->load->database();

        $data = array(
            'IDKeluargaP3KE' => $this->input->post('IDKeluargaP3KE', TRUE),
            'Provinsi' => $this->input->post('Provinsi', TRUE),
            'KabupatenKota' => $this->input->post('KabupatenKota', TRUE),
            'Kecamatan' => $this->input->post('Kecamatan', TRUE),
            'DesaKelurahan' => $this->input->post('DesaKelurahan', TRUE),
            'KodeKemdagri' => $this->input->post('KodeKemdagri', TRUE),
            'DesilKesejahteraan' => $this->input->post('DesilKesejahteraan', TRUE),
            'Alamat' => $this->input->post('Alamat', TRUE),
            'KepalaKeluarga' => $this->input->post('KepalaKeluarga', TRUE),
            'NIK' => $this->input->post('NIK', TRUE),
            'PadanDukcapil' => $this->input->post('PadanDukcapil', TRUE),
            'JenisKelamin' => $this->input->post('JenisKelamin', TRUE),
            'TanggalLahir' => $this->input->post('TanggalLahir', TRUE),
            'Pekerjaan' => $this->input->post('Pekerjaan', TRUE),
            'Pendidikan' => $this->input->post('Pendidikan', TRUE),
            'KepemilikanRumah' => $this->input->post('KepemilikanRumah', TRUE),
            'MemilikiSimpanan' => $this->input->post('MemilikiSimpanan', TRUE),
            'JenisAtap' => $this->input->post('JenisAtap', TRUE),
            'JenisDinding' => $this->input->post('JenisDinding', TRUE),
            'JenisLantai' => $this->input->post('JenisLantai', TRUE),
            'SumberPenerangan' => $this->input->post('SumberPenerangan', TRUE),
            'BahanBakarMemasak' => $this->input->post('BahanBakarMemasak', TRUE),
            'SumberAirMinum' => $this->input->post('SumberAirMinum', TRUE),
            'MemilikiFasilitasBuangAirBesar' => $this->input->post('MemilikiFasilitasBuangAirBesar', TRUE),
            'PenerimaBPNT' => $this->input->post('PenerimaBPNT', TRUE),
            'PenerimaBPUM' => $this->input->post('PenerimaBPUM', TRUE),
            'PenerimaBST' => $this->input->post('PenerimaBST', TRUE),
            'PenerimaPKH' => $this->input->post('PenerimaPKH', TRUE),
            'PenerimaSEMBAKO' => $this->input->post('PenerimaSEMBAKO', TRUE),
            'ResikoStunting' => $this->input->post('ResikoStunting', TRUE),
            "tahun"                      => date('Y'),
            "created_at"                 => mdate('%Y-%m-%d', now()),
            "created_by"                 => $this->session->userdata('userid')
        );

        $doupload = $this->db->insert('p3ke_keluarga', $data);
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
        $this->db->from("p3ke_keluarga");
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
            'IDKeluargaP3KE' => $this->input->post('IDKeluargaP3KE', TRUE),
            'Provinsi' => $this->input->post('Provinsi', TRUE),
            'KabupatenKota' => $this->input->post('KabupatenKota', TRUE),
            'Kecamatan' => $this->input->post('Kecamatan', TRUE),
            'DesaKelurahan' => $this->input->post('DesaKelurahan', TRUE),
            'KodeKemdagri' => $this->input->post('KodeKemdagri', TRUE),
            'DesilKesejahteraan' => $this->input->post('DesilKesejahteraan', TRUE),
            'Alamat' => $this->input->post('Alamat', TRUE),
            'KepalaKeluarga' => $this->input->post('KepalaKeluarga', TRUE),
            'NIK' => $this->input->post('NIK', TRUE),
            'PadanDukcapil' => $this->input->post('PadanDukcapil', TRUE),
            'JenisKelamin' => $this->input->post('JenisKelamin', TRUE),
            'TanggalLahir' => $this->input->post('TanggalLahir', TRUE),
            'Pekerjaan' => $this->input->post('Pekerjaan', TRUE),
            'Pendidikan' => $this->input->post('Pendidikan', TRUE),
            'KepemilikanRumah' => $this->input->post('KepemilikanRumah', TRUE),
            'MemilikiSimpanan' => $this->input->post('MemilikiSimpanan', TRUE),
            'JenisAtap' => $this->input->post('JenisAtap', TRUE),
            'JenisDinding' => $this->input->post('JenisDinding', TRUE),
            'JenisLantai' => $this->input->post('JenisLantai', TRUE),
            'SumberPenerangan' => $this->input->post('SumberPenerangan', TRUE),
            'BahanBakarMemasak' => $this->input->post('BahanBakarMemasak', TRUE),
            'SumberAirMinum' => $this->input->post('SumberAirMinum', TRUE),
            'MemilikiFasilitasBuangAirBesar' => $this->input->post('MemilikiFasilitasBuangAirBesar', TRUE),
            'PenerimaBPNT' => $this->input->post('PenerimaBPNT', TRUE),
            'PenerimaBPUM' => $this->input->post('PenerimaBPUM', TRUE),
            'PenerimaBST' => $this->input->post('PenerimaBST', TRUE),
            'PenerimaPKH' => $this->input->post('PenerimaPKH', TRUE),
            'PenerimaSEMBAKO' => $this->input->post('PenerimaSEMBAKO', TRUE),
            'ResikoStunting' => $this->input->post('ResikoStunting', TRUE),
            "tahun"                      => date('Y'),
            "created_at"                 => mdate('%Y-%m-%d', now()),
            "created_by"                 => $this->session->userdata('userid')
        );

        $this->db->where('id', $id);
        $doupdate = $this->db->update('p3ke_keluarga', $data);

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
        $delete = $this->db->delete("p3ke_keluarga");

        if ($delete) {
            $status = "success";
            $msg = "Success Delete";
        } else {
            $status = "error";
            $msg = "Error Delete";
        }
        echo json_encode(["status" => $status, "msg" => $msg]);
    }


    public function export_excel() {
        $tahun = $this->input->post('tahun', TRUE);
        $data_p3ke_keluarga = $this->get_p3ke_keluarga($tahun);

        $judul_export = 'Data P3KE Individu';

        $this->load->library('PHPExcel');
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();

        $sheet->setCellValue('A1', $judul_export);
        $sheet->setCellValue('A2', 'Tahun: ' . $tahun);

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'ID Keluarga P3KE');
        $sheet->setCellValue('C4', 'Provinsi');
        $sheet->setCellValue('D4', 'Kabupaten/Kota');
        $sheet->setCellValue('E4', 'Kecamatan');
        $sheet->setCellValue('F4', 'Desa/Kelurahan');
        $sheet->setCellValue('G4', 'Kode Kemdagri');
        $sheet->setCellValue('H4', 'Desil Kesejahteraan');
        $sheet->setCellValue('I4', 'Alamat');
        $sheet->setCellValue('J4', 'Kepala Keluarga');
        $sheet->setCellValue('K4', 'NIK');
        $sheet->setCellValue('L4', 'Padan Dukcapil');
        $sheet->setCellValue('M4', 'Jenis Kelamin');
        $sheet->setCellValue('N4', 'Tanggal Lahir');
        $sheet->setCellValue('O4', 'Pekerjaan');
        $sheet->setCellValue('P4', 'Pendidikan');
        $sheet->setCellValue('Q4', 'Kepemilikan Rumah');
        $sheet->setCellValue('R4', 'Memiliki Simpanan');
        $sheet->setCellValue('S4', 'Jenis Atap');
        $sheet->setCellValue('T4', 'Jenis Dinding');
        $sheet->setCellValue('U4', 'Jenis Lantai');
        $sheet->setCellValue('V4', 'Sumber Penerangan');
        $sheet->setCellValue('W4', 'Bahan Bakar Memasak');
        $sheet->setCellValue('X4', 'Sumber Air Minum');
        $sheet->setCellValue('Y4', 'Memiliki Fasilitas Buang Air Besar');
        $sheet->setCellValue('Z4', 'Penerima BPNT');
        $sheet->setCellValue('AA4', 'Penerima BPUM');
        $sheet->setCellValue('AB4', 'Penerima BST');
        $sheet->setCellValue('AC4', 'Penerima PKH');
        $sheet->setCellValue('AD4', 'Penerima SEMBAKO');
        $sheet->setCellValue('AE4', 'Resiko Stunting');

        $row = 5;
        $count=0; 
        foreach ($data_p3ke_keluarga as $data) {
            $count=$count+1;
            $sheet->setCellValue('A' . $row, $count);
            $sheet->setCellValueExplicit('B' . $row, $data->IDKeluargaP3KE, PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue('C' . $row, $data->Provinsi);
            $sheet->setCellValue('D' . $row, $data->KabupatenKota);
            $sheet->setCellValue('E' . $row, $data->Kecamatan);
            $sheet->setCellValue('F' . $row, $data->DesaKelurahan);
            $sheet->setCellValueExplicit('G' . $row, $data->KodeKemdagri, PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue('H' . $row, $data->DesilKesejahteraan);
            $sheet->setCellValue('I' . $row, $data->Alamat);
            $sheet->setCellValue('J' . $row, $data->KepalaKeluarga);
            $sheet->setCellValueExplicit('K' . $row, $data->NIK, PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue('L' . $row, $data->PadanDukcapil);
            $sheet->setCellValue('M' . $row, $data->JenisKelamin);
            $sheet->setCellValue('N' . $row, $data->TanggalLahir);
            $sheet->setCellValue('O' . $row, $data->Pekerjaan);
            $sheet->setCellValue('P' . $row, $data->Pendidikan);
            $sheet->setCellValue('Q' . $row, $data->KepemilikanRumah);
            $sheet->setCellValue('R' . $row, $data->MemilikiSimpanan);
            $sheet->setCellValue('S' . $row, $data->JenisAtap);
            $sheet->setCellValue('T' . $row, $data->JenisDinding);
            $sheet->setCellValue('U' . $row, $data->JenisLantai);
            $sheet->setCellValue('V' . $row, $data->SumberPenerangan);
            $sheet->setCellValue('W' . $row, $data->BahanBakarMemasak);
            $sheet->setCellValue('X' . $row, $data->SumberAirMinum);
            $sheet->setCellValue('Y' . $row, $data->MemilikiFasilitasBuangAirBesar);
            $sheet->setCellValue('Z' . $row, $data->PenerimaBPNT);
            $sheet->setCellValue('AA' . $row, $data->PenerimaBPUM);
            $sheet->setCellValue('AB' . $row, $data->PenerimaBST);
            $sheet->setCellValue('AC' . $row, $data->PenerimaPKH);
            $sheet->setCellValue('AD' . $row, $data->PenerimaSEMBAKO);
            $sheet->setCellValue('AE' . $row, $data->ResikoStunting);

            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="p3ke_keluarga_export_' . date('YmdHis') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
    }


}

