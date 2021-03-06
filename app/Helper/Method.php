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

  public static function rupiah($number){
    return number_format($number,2,',','.');
  }

  public static function prepayment($price){
    return 50000000;
  }

  public static function loanPaymentMin($price){
    return $price*50/100;
  }

  public static function loanPaymentMax($price){
    return $price*75/100;
  }

  public static function salarySub($salary){
    $id = 0;
    if (999999 < $salary && $salary < 3000001) {
      $id = 1;
    }
    else if (3000000 < $salary && $salary < 6000001) {
      $id = 2;
    }
    else if (6000000 < $salary && $salary < 9000001) {
      $id = 3;
    }
    else if (9000000 < $salary) {
      $id = 4;
    }
    return $id;
  }
}