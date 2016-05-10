<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:23
 */

namespace Patterns\Structural\Facade;


class SkiResortFacade {
    public $ski;
    public $resortTicket;
    public $room;

    public function __construct () {
        $this->ski = new SkiRent();
        $this->resortTicket = new SkiResortTicketSystem();
        $this->room = new HotelBookingSystem();
    }

    public function haveGoodRest ($height, $weight, $feetSize, $skierLevel, $roomQuality) {
        $skiPrice = $this->ski->rentSki($weight, $skierLevel);
        $bootPrice = $this->ski->rentBoots($feetSize, $skierLevel);
        $polePrice = $this->ski->rentPole($height);
        $ticketPrice = $this->resortTicket->buyOneDayTicket();
        $roomPrice = $this->room->bookRoom($roomQuality);

        $totalPrice = $skiPrice + $bootPrice + $polePrice + $ticketPrice + $roomPrice;
        return $totalPrice;
    }

    public function restWithOwnSki ($roomQuality) {
        $ticketPrice = $this->resortTicket->buyOneDayTicket();
        $roomPrice = $this->room->bookRoom($roomQuality);
        $totalPrice = $ticketPrice + $roomPrice;
        return $totalPrice;
    }
}