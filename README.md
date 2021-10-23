# Flight Service
This is just a sample project exposing a domain service, [Flight Service](https://github.com/arturhayne/FlightService/blob/main/src/FlightService.php).

- [Flight](https://github.com/arturhayne/FlightService/blob/main/src/Flight.php): Domain Model Class representing the flight
- [AirportAnnouncer](https://github.com/arturhayne/FlightService/blob/main/src/AirportAnnouncer.php): Domain interface that connects to an external announcer. 
We can use a message broker like RabitMQ, Kafka, or pubsub to delivery the message async.
- [Flight Repository](https://github.com/arturhayne/FlightService/blob/main/src/FlightRepository.php): Persist flights. 
- [LocalDateTime](https://github.com/arturhayne/FlightService/blob/main/src/LocalDateTime.php): Data value object representing a local date time. In our scenario, the flight time.

## Concepts
 - Dependency inversion: Flight Service receives AirportAnnouncer and Flight Repository interfaces in its constructor.
 - Single Responsibility: All classes has one unique responsibility, even the value object.
 - DDD: Like a sample, in this project we are presenting the domain layer, but it is easy to see other layers:
    - Infrastructure layer: responsible to persist the flight and announce delyas
    - Application layer: receive the requests an orchestrating the action.
 - Tests: [FlightServiceTest](https://github.com/arturhayne/FlightService/blob/main/tests/Unit/FlightServiceTest.php) covering domain layer with some unit test.
    - Following Given, When, Then structure
    - Meaningful names
    - Validating domain logic (business decision)
 - Meaningful names: variables, methods have meaningful names preventing any unnecessary comment.   
 - Formatting: Classes are following PSR code style. 
 - Respect of law of demeter: a module should not know the innards of the objects its manipulates.
 - Some Design patterns: Repository, factory method
 
 ## How to Run the tests
 - composer install
 - vendor/bin/phpunit --testsuite Unit --testdox
 
 ```
 root@69cc0ab71630:/var/www/html# vendor/bin/phpunit --testsuite Unit --testdox
   PHPUnit 9.5.10 by Sebastian Bergmann and contributors.
   
   Flight Service (Tests\FlightService)
     It should persist flight in delay flight
     It should announce if flight is departure
     It should update flight time
   
   Time: 00:00.071, Memory: 6.00 MB
   
   OK (3 tests, 3 assertions)
```
