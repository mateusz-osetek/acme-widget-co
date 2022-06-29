## Solution

### Description
In order to create simple proof of concept I realized console app that sending request into controller.
Controller creates Basket object that is initialized with required interfaces, downloaded from simple json database by
repository. While specific costs are calculated basket requests external services to do the math providing them with
necessary data from repositories (each rule is presented as separate object with unique business logic). Every request
are made from controller level, code is change-friendly.\
As task requirements doesn't require any more complicated architecture, so I've manage to use simple
monolith structure with cataloging by object purposes.

### Tech stack
PHP7.4 and newer

### Assumptions:
Basket is an object that aggregates few repositories providing its own business logic and executes itself. I've tried to make 
code as SOLID as I can in a simple proof of concept in writing good encapsulation, using interfaces and a Trait for
better inheritance in tests.\
`Charge Rules` and `Offer` objects making checks only with provided Basket object and constructor
parameters without need for any more data.\
Prices are now at the edge of safety; in production environment it is necessary to hold prices in a way 
that provide stable management of rounding error (I've made in this code dividing an odd number so the problems 
may occur).\
I've held myself from creating object collections in order to use simpler types such as arrays.

### How it works?
You can run tests by putting `php run_tests.php` up to your console.\
You can run application by running `php app.php [products_codes]` where `products_codes` are valid codes from
product catalogue separated by space, e.q. `php app.php R01 R01 G01`
