<?php

class Basket
{
    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @var int
     */
    private $totalPrice;

    /**
     * @var int
     */
    private $totalPoints;

    public function __construct()
    {
        $this->rentals = [];
        $this->totalPrice = 0;
        $this->totalPoints = 0;
    }

    /**
     * @return Rental[]
     */
    public function getRentals()
    {
        return $this->rentals;
    }

    public function addRental(Rental $rental): void
    {
        //prevent 0 or negative day rentals.
        if($rental->daysRented() < 1){
            return;
        }

        $this->totalPrice += $rental->getPrice();
        $this->totalPoints += $rental->getPoints();
        $this->rentals[] = $rental;
    }

    public function totalPrice(): float
    {
        return $this->totalPrice;
    }

    public function totalPoints(): int
    {
        return $this->totalPoints;
    }

}