# Flight Service
This is just a sample project exposing a domain service, Flight Service.

- Flight: Domain Model Class representing the flight
- AirportAnnouncer: Domain interface that connects to an external announcer. 
We can use a message broker like RabitMQ, Kafka, or pubsub to delivery the message async.
- Flight Repository: Persist flights. 
- LocalDateTime: Data value object representing a local date time. In our scenario the flight time.

## Concepts
 - Dependency inversion: Flight Service receives AirportAnnouncer and Flight Repository interfaces in its constructor.
 - Single Responsibility: All classes has one unique responsibility, even the value object.
 - DDD: Like a sample, in this project we are presenting the domain layer, but it is easy to see other layers:
    - Infrastructure layer: responsible to persist the flight and announce delyas
    - Application layer: receive the requests an orchestrating the action.
 - Tests: FlightServiceTest covering domain layer with some unit test.
    - Following Given, When, Then structure (when possible)
    - Meaningful names
    - Validating domain logic (business decision)
 - Meaningful names: variables, methods have meaningful names preventing any unnecessary comment.   
 - Formatting: Classes are following PSR-12 code style. 
 - Respect of law of demeter: a module should not know the innards od the objects its manipulates.
 
 ## How to Run the tests
 - docker-compose up -d
 - docker-compose exec web bash
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
