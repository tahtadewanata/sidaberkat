<?php 
 
class StringManipulation{
	
	function getStringBetween($teks, $sebelum, $sesudah) {
		$teks = ' ' . $teks;
		$ini = strpos($teks, $sebelum);
		if ($ini == 0) return '';
		$ini += strlen($sebelum);
		$panjang = strpos($teks, $sesudah, $ini) - $ini;
		return substr($teks, $ini, $panjang);
	}
}