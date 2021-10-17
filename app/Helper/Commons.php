<?php
namespace App\Helper;

class Commons {
    const HOME_STATUS = ['Dijual', 'Disewakan'];
    const HOME_CATEGORY = ['Rumah', 'Tanah', 'Ruko'];
    const HEATING = ['Tanpa Pemanas', 'Listrik', 'Gas'];
    const BED_ROOM = ['1', '2', '3', '4', '5+'];
    const BATH_ROOM = ['1', '2', '3', '4', '5+'];
    const PARKING_LOT = ['1', '2', '3', '4', '5+'];
    const USER_ROLE = [
        1 => 'User',
        2 => 'Admin',
        3 => 'Super Admin'
    ];
    const ORDER_STATUS = [
        1 => 'Submission',
        2 => 'Proccess',
        3 => 'Done'
    ];
    const PAYMENT_METHOD = [
        1 => 'Uang Tanda Jadi',
        2 => 'Kredit Kepemilikan Rumah'
    ];
    const PAYMENT_TIMES = [
        1 => '3 Tahun',
        2 => '7 Tahun',
        3 => '10 Tahun',
        4 => '15 Tahun',
        5 => '18 Tahun',
        6 => '20 Tahun'
    ];
    const BANK_LOAN = [
        1 => 'May Bank',
        2 => 'BCA',
        3 => 'CIMB',
        4 => 'BTN',
        5 => 'Mandiri'
    ];
}