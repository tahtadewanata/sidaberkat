<?php
if (!function_exists('kabar_beranda')) {
  function kabar_beranda(){
   $args = array("username" => "admin", "password" => "nganjukkab");
   $url = "https://www.nganjukkab.go.id/api-nganjukkab/get_kabar";
   $content = json_encode($args);
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_HEADER, false);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
   $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
   $json_response = curl_exec($curl);
   curl_close($curl);
   $response = json_decode($json_response, true);
   return $response;
 }
}

if (!function_exists('get_id_kecamatan')) {
 function get_id_kec($nama_kec){
   $CI =  &get_instance();
   $CI->db->select('id');
   $CI->db->like('nama_kecamatan', $nama_kec); 
   $query=$CI->db->get('kecamatan')->row();
   return $query->id;
 }
}

if (!function_exists('get_id_desa')) {
 function get_id_desa($id_kec,$nama_desa){
   $CI =  &get_instance();
   $CI->db->select('id');
   $CI->db->where('id_kecamatan', $id_kec);
   $CI->db->like('desa', $nama_desa); 
   $query=$CI->db->get('desa')->row();
   return $query->id;
 }
}

if (!function_exists('get_nama_kec')) {
 function get_nama_kec($id){
   $CI =  &get_instance();
   $CI->db->select('nama_kecamatan');
   $CI->db->where('id', $id); 
   $query=$CI->db->get('kecamatan')->row();
   return $query->nama_kecamatan;
 }
}

if (!function_exists('get_nama_desa')) {
 function get_nama_desa($id){
   $CI =  &get_instance();
   $CI->db->select('desa');
   $CI->db->where('id', $id);
   $query=$CI->db->get('desa')->row();
   return $query->desa;
 }
}

if (!function_exists('get_pokok_masalah')) {
 function get_pokok_masalah($id){
   $CI =  &get_instance();
   $CI->db->select('nama_pokok_masalah');
   $CI->db->where('id', $id);
   $query=$CI->db->get('master_pokok_masalah')->row();
   if($query){
     return $query->nama_pokok_masalah;
   } else {
    return "Pokok Masalah Tidak Ada";
  }
}
}

if (!function_exists('get_opd')) {
 function get_opd($id){
   $CI =  &get_instance();
   $CI->db->select('nama_opd');
   $CI->db->where('id', $id);
   $query=$CI->db->get('master_opd')->row();
   if($query){
     return $query->nama_opd;
   } else {
    return "Nama OPD Tidak Ada";
  }
 }
}