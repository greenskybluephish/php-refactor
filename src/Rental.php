<?php

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRented;

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function movie(): Movie
    {
        return $this->movie;
    }

    public function daysRented(): int
    {
        return $this->daysRented;
    }

    public function getPrice(): float
    {
        return $this->movie->movieCategory()->getPrice($this->daysRented);
    }

    public function getPoints(): int
    {
        return $this->movie->movieCategory()->getPoints($this->daysRented); 
    }

}
