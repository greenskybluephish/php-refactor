<?php

interface MovieCategoryInterface
{
    /**
     * @param int $days
     * @return float
     */
    public function getPrice($days);

    /**
     * @param int $days
     * @return int
     */
    public function getPoints($days);

}