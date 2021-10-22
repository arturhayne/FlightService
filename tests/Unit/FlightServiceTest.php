<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use FlightService\AirportAnnouncer;
use FlightService\Flight;
use FlightService\FlightRepository;
use FlightService\FlightService;
use FlightService\LocalDateTime;

class FlightServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_persist_flight_in_delay_flight(): void
    {
        //Given
        $mockedFlightRepository = $this->createMock(FlightRepository::class);
        $mockedAnnouncer        = $this->createMock(AirportAnnouncer::class);

        $flight    = $this->createMock(Flight::class);
        $localTime = $this->createMock(LocalDateTime::class);

        $flightService = new FlightService($mockedFlightRepository, $mockedAnnouncer);

        //then
        $mockedFlightRepository->expects($this->once())->method('persist');

        //when
        $flightService->delayFlight($flight, $localTime);
    }

    /**
     * @test
     */
    public function it_should_announce_if_flight_is_departure(): void
    {
        //Given
        $mockedFlightRepository = $this->createMock(FlightRepository::class);
        $mockedAnnouncer        = $this->createMock(AirportAnnouncer::class);

        $flight    = $this->createMock(Flight::class);
        $flight->method('isDeparture')->willReturn(true);
        $localTime = $this->createMock(LocalDateTime::class);

        $flightService = new FlightService($mockedFlightRepository, $mockedAnnouncer);

        //then
        $mockedAnnouncer->expects($this->once())->method('announceTimeChanged');

        //when
        $flightService->delayFlight($flight, $localTime);
    }

    /**
     * @test
     */
    public function it_should_update_flight_time(): void
    {
        //Given
        $delayTime         = new \DateTime('+1 hour');
        $currentFlightTime = new \DateTime();

        $mockedFlightRepository = $this->createMock(FlightRepository::class);
        $mockedAnnouncer        = $this->createMock(AirportAnnouncer::class);

        $flight    = Flight::create(LocalDateTime::create($currentFlightTime));
        $localTime = LocalDateTime::create($delayTime);

        $flightService = new FlightService($mockedFlightRepository, $mockedAnnouncer);

        //when
        $flightService->delayFlight($flight, $localTime);

        //then
        $this->assertTrue($flight->time()->equalsTo($localTime));
    }
}
