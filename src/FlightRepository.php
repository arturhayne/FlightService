<?php
declare(strict_types=1);

namespace FlightService;

interface FlightRepository
{
    public function persist(Flight $flight);
}
