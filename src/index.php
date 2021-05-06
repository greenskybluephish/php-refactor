<?php
require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('Basket.php');
require_once('MovieCategory.php');

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        MovieCategory::CHILDRENS
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        MovieCategory::REGULAR
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        MovieCategory::NEW_RELEASE
    ), 5
);

$basket = new Basket();

$basket->addRental($rental1);
$basket->addRental($rental2);
$basket->addRental($rental3);

$customer = new Customer('Joe Schmoe', $basket);

echo $customer->statement();
echo "\n";
echo $customer->htmlStatement();
