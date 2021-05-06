<?php

require_once('./src/Movie.php');
require_once('./src/Rental.php');
require_once('./src/Customer.php');
require_once('./src/Basket.php');
require_once('./src/MovieCategory.php');

use PHPUnit\Framework\TestCase;

final class StatementTest extends TestCase
{
    protected $Customer;

    function setUp():void 
    {
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
        
        $this->Customer = new Customer('Joe Schmoe', $basket);
        
    }

    public function testStringStatement(): void
    {
        $result = $this->Customer->statement();
        $ex = 'Rental Record for Joe Schmoe' . PHP_EOL;
        $ex .= "\t" . str_pad('Back to the Future', 30, ' ', STR_PAD_RIGHT) . "\t" . 3 . PHP_EOL;
        $ex .= "\t" . str_pad('Office Space', 30, ' ', STR_PAD_RIGHT) . "\t" . 3.5 . PHP_EOL;
        $ex .= "\t" . str_pad('The Big Lebowski', 30, ' ', STR_PAD_RIGHT) . "\t" . 15 . PHP_EOL;
        $ex .= 'Amount owed is ' . 21.5 . PHP_EOL;
        $ex .= 'You earned ' . 4 . ' frequent renter points' . PHP_EOL;

        $this->assertEquals($ex, $result);
    }

    public function testHtmlStatement(): void
    {
        
        $expected = <<<html
<h1>Rental Record for <em>Joe Schmoe</em></h1>
<ul>
\t<li>Back to the Future - 3</li>
\t<li>Office Space - 3.5</li>
\t<li>The Big Lebowski - 15</li>
<ul>
<p>Amount owed is <em>21.5</em>
<p>You earned <em>4</em> frequent renter points</p>
html;

        $result = $this->Customer->htmlStatement();

        $this->assertEquals($expected, $result);

    }

    protected function tearDown(): void
    {
        $this->Customer = null;
    } 
}