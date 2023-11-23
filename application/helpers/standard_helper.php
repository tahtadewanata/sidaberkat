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

if (!function_exists('get_nama_user')) {
 function get_nama_user($id_user){
   $CI =  &get_instance();
   $CI->db->select('username');
   $CI->db->where('id', $id_user); 
   $query=$CI->db->get('users')->row();
   if($query){
    return $query->username;
  } else {
    return 'Kosong';
  }
}
}

if (!function_exists('format_rupiah')) {
 function format_rupiah($angka){
   $jadi = "Rp " . number_format((double)$angka,2,',','.');
   return $jadi;
 }
}

if (!function_exists('get_sumberdana')) {
 function get_sumberdana($id){
  $CI =  &get_instance();
  $CI->db->select('singkatan_sumberdana');
  $CI->db->where('id', $id); 
  $query=$CI->db->get('master_sumberdana')->row();
  if($query){
    return $query->singkatan_sumberdana;
  } else {
    return 'Kosong';
  }
}
}

if (!function_exists('get_namasatuan')) {
 function get_namasatuan($id){
  $CI =  &get_instance();
  $CI->db->select('nama_satuan');
  $CI->db->where('id', $id); 
  $query=$CI->db->get('master_satuan')->row();
  if($query){
    return $query->nama_satuan;
  } else {
    return 'Kosong';
  }
}
}