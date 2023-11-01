<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('application/controllers/auth/DefaultController.php');
require_once APPPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportExcelCon extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }


    public function import() {
     $this->load->database();

     $status = "";
     $msg = "";
     $file_element_name = 'excel_file';
     $imgpath = "";

     $config['upload_path'] = './upload_file/folder_excel/';
     $config['allowed_types'] = 'xls|xlsx';
     $config['max_size'] = 1024 * 8;
     $config['file_name'] = time().'.xlsx';

     $this->upload->initialize($config);
     $this->load->library('upload',$config);

     if(!$this->upload->do_upload($file_element_name))
     {
        $status = 'error';
        $msg = $this->upload->display_errors('', '');
    }
    else
    {
       $data = $this->upload->data();
       $c = base_url();
       $a = './upload_file/folder_excel/';
       $b = $data['file_name'];
       $file_path = $a.$b;
       $this->extractValueFromExcel($file_path);
   }

}

public function extractValueFromExcel($file_path) {

    $spreadsheet = IOFactory::load($file_path);
    
    $sheet = $spreadsheet->getActiveSheet();
    
    $extractedValues = array();
    
    $startRow = 7;
    
    while ($sheet->getCell('B' . $startRow)->getValue() != '') {
        $value = $sheet->rangeToArray('B' . $startRow . ':J' . $startRow, null, true, false)[0];
        $extractedValues[] = $value;
        $startRow++;
    }
    
    $this->load->database();
    
    $tableName = 'data_arsip';

    $this->db->trans_start();

    foreach ($extractedValues as $rowValues) {
        $data = array(
            'pokok_masalah' => $rowValues[0],
            'nama_opd' => $this->input->post("nama_opd"),
            'rincian_masalah' => $rowValues[1],
            'tahun' => $rowValues[2],
            'box' => $rowValues[3],
            'rak' => $rowValues[4],
            'sap' => $rowValues[5],
            'aktif' => $rowValues[6],
            'inaktif' => $rowValues[7],
            'keterangan' => $rowValues[8],
            'created_by' => $this->session->userdata('userid'),
            'created_at' => mdate('%Y-%m-%d', now())
        );
        
        if (!$this->db->insert($tableName, $data)) {
            $this->db->trans_rollback();
            $status = "error";
            $msg = "Gagal Insert Data, Rollback!";
        }
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
        $status = "error";
        $msg = "Gagal Insert Data";
    } else {
        $status = "success";
        $msg = "Berhasil Insert Data";
    }

    echo json_encode(array('status' => $status, 'msg' => $msg));
}

}