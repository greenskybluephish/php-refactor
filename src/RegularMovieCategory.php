<?php
require_once("MovieCategoryInterface.php");

class RegularMovieCategory implements MovieCategoryInterface 
{
    public function getPrice($days) 
    {
        $price = 2;
        if ($days > 2) {
            $price += (($days - 2) * 1.5);
        }
        return $price;
    }

    public function getPoints($days) 
    {
        return 1;
    }
}