<?php
class SkiRent {
    public function rentBoots ($feetSize, $skierLevel) {
        return 20;
    }
    public function rentSki ($weight, $skierLevel) {
        return 40;
    }
    public function rentPole ($height) {
        return 5;
    }
}

class SkiResortTicketSystem {
    public function buyOneDayTicket () {
        return 125;
    }
    public function buyHalfDayTicket () {
        return 65;
    }
}

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