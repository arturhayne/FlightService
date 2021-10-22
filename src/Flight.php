<?php
declare(strict_types=1);

namespace FlightService;

class Flight
{
    /**
     * @var LocalDateTime
     */
    private $timeToFly;

    /**
     * @var bool
     */
    private $departure;

    /**
     * Flight constructor.
     * @param LocalDateTime $time
     * @param bool          $departure
     */
    public function __construct(LocalDateTime $time, $departure = false)
    {
        $this->timeToFly = $time;
        $this->departure = $departure;
    }

    /**
     * @param LocalDateTime $time
     * @return static
     */
    public static function create(LocalDateTime $time): self
    {
        return new static ($time);
    }

    /**
     * @param LocalDateTime $localDateTime
     */
    public function delay(LocalDateTime $localDateTime): void
    {
        $this->timeToFly = $localDateTime;
    }

    /**
     * @return bool
     */
    public function isDeparture(): bool
    {
        return $this->departure;
    }

    /**
     * @return LocalDateTime
     */
    public function time(): LocalDateTime
    {
        return $this->timeToFly;
    }
}
