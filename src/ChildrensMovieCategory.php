<?php
require_once("MovieCategoryInterface.php");

class ChildrensMovieCategory implements MovieCategoryInterface 
{
    public function getPrice($days) 
    {
        $price = 1.5;
        if ($days > 3) {
            $price += ($days - 3) * 1.5;
        }
        return $price;
    }

    public function getPoints($days)
    {
        return 1;
    }
}