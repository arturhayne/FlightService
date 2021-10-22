<?php
declare(strict_types=1);

namespace FlightService;

class FlightService
{
    /**
     * @var FlightRepository
     */
    private $flightRepository;

    /**
     * @var AirportAnnouncer
     */
    private $announcer;

    /**
     * @param FlightRepository $flightRepository
     * @param AirportAnnouncer $announcer
     */
    public function __construct(FlightRepository $flightRepository, AirportAnnouncer $announcer)
    {
        $this->flightRepository = $flightRepository;
        $this->announcer        = $announcer;
    }

    /**
     * @param Flight $flight
     * @param LocalDateTime $newTime
     */
    public function delayFlight(Flight $flight, LocalDateTime $newTime): void
    {
        $flight->delay($newTime);

        $this->flightRepository->persist($flight);
        if ($flight->isDeparture()) {
            $this->announcer->announceTimeChanged($flight);
        }
    }
}
