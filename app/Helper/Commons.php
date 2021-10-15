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
}