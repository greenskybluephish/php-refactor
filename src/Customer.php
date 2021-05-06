<?php

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Basket
     */
    private $basket;

    /**
     * @param string $name
     */
    public function __construct($name, Basket $basket)
    {
        $this->name = $name;
        $this->basket = $basket;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->basket->addRental($rental);
    }

    /**
     * @return string
     */
    public function statement()
    {
        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->basket->getRentals() as $rental) {

            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $rental->getPrice() . PHP_EOL;
        }

        $result .= 'Amount owed is ' . $this->basket->totalPrice() . PHP_EOL;
        $result .= 'You earned ' . $this->basket->totalPoints() . ' frequent renter points' . PHP_EOL;

        return $result;
    }

    /**
     * @return string
     */
    public function htmlStatement()
    {
        $listItems = "";

        foreach ($this->basket->getRentals() as $rental) {
            $listItems .= "\t<li>{$rental->movie()->name()} - {$rental->getPrice()}</li>" . PHP_EOL;
        }

        $result = "<h1>Rental Record for <em>{$this->name()}</em></h1>" . PHP_EOL;
        $result .= "<ul>" . PHP_EOL;
        $result .= $listItems . "<ul>" . PHP_EOL;
        $result .= "<p>Amount owed is <em>{$this->basket->totalPrice()}</em>" . PHP_EOL;
        $result .=  "<p>You earned <em>{$this->basket->totalPoints()}</em> frequent renter points</p>";

        return $result;
    } 
}
