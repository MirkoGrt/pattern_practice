<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:22
 */

namespace lib\Patterns\Structural\Facade;


class HotelBookingSystem {
    public function bookRoom ($roomQuality) {
        switch ($roomQuality) {
            case 3: return 250;
            case 4: return 500;
            case 5: return 900;
            default: return "Room quantity must be from 3 to 5";
        }
    }
}