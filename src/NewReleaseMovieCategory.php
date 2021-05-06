<?php
require_once("MovieCategoryInterface.php");

class NewReleaseMovieCategory implements MovieCategoryInterface 
{
    public function getPrice($days) 
    {
        $price = $days * 3;
        return $price;
    }

    public function getPoints($days) 
    {
        return $days > 1 ? 2 : 1;
    }
}