# Code Challenge Review

## Time Estimate: 
8-9 hours. 

## Additional Instructions:
The program can be run with `$ php ./src/index.php`

To run the tests, phpunit should be first installed. 

```
$ wget https://phar.phpunit.de/phpunit.phar
$ chmod +x phpunit.phar
$ mv phpunit.phar /usr/local/bin/phpunit
```

Run tests with `$ php phpunit --verbose ./tests/StatementTest.php`

## Process Documentation

    My focus in this challenge was on creating a more robust and flexible code base for the business. As the business requirements grow, testing becomes essential, so my first priority was creating basic tests for the statement methods. More thorough and complex tests will be needed in the future, but the current tests were sufficient to allow safe refactoring. 

    Because of the requirements for more flexibility, I spent most of my time refactoring with a focus on OOP principles. The initial Customer class, and its statement() method, were handling the algorithms and state information that would be better delegated to the classes to which they belong. I created a Basket class which manages the rental array, so that as additional functionality is implemented, it is not clogging up the Customer class. 
    
    The other major change was the addition of the MovieCategory classes. To increase flexibility and allow for easy adjustments to price and points info, I created a MovieCategoryInterface, which allows for new Classifications to easily be implemented. Critically, it allows for maximum flexibility in the Movie Class, so that the algorithms for returning points and prices are dynamically inferred. I would have liked to have set up a more robust type-checking functionality for the MovieCategoryFactory, and that would be the next priority in the process. 