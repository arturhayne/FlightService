<?php
declare(strict_types=1);

namespace FlightService;

interface AirportAnnouncer
{
    public function announceTimeChanged(Flight $flight);
}
