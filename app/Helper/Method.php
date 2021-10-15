<?php
namespace App\Helper;

class  Method {
  public static function priceFormat($n, $presisi=1) {
    if ($n < 900) {
      $format_angka = number_format($n, $presisi);
      $simbol = '';
    } else if ($n < 900000) {
      $format_angka = number_format($n / 1000, $presisi);
      $simbol = 'rb';
    } else if ($n < 900000000) {
      $format_angka = number_format($n / 1000000, $presisi);
      $simbol = 'Juta';
    } else if ($n < 900000000000) {
      $format_angka = number_format($n / 1000000000, $presisi);
      $simbol = 'Miliyar';
    } else {
      $format_angka = number_format($n / 1000000000000, $presisi);
      $simbol = 'Triliun';
    }
   
    if ( $presisi > 0 ) {
      $pisah = '.' . str_repeat( '0', $presisi );
      $format_angka = str_replace( $pisah, '', $format_angka );
    }
    
    return "$format_angka $simbol";
  }

  public static function rupiah($angka){
    return number_format($angka,2,',','.');
   
  }
}