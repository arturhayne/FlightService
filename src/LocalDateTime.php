<?php
declare(strict_types=1);

namespace FlightService;

class LocalDateTime
{
    /**
     * @var \DateTime
     */
    private $value;

    /**
     * LocalDateTime constructor.
     * @param \DateTime $time
     */
    public function __construct(\DateTime $time)
    {
        $this->value = $time;
    }

    /**
     * @param \DateTime $time
     * @return static
     */
    public static function create(\DateTime $time): self
    {
        return new static($time);
    }

    /**
     * @return \DateTime
     */
    public function value(): \DateTime
    {
        return $this->value;
    }

    /**
     * @param LocalDateTime $localDateTime
     * @return bool
     */
    public function equalsTo(LocalDateTime $localDateTime): bool
    {
        return $localDateTime->value() === $this->value;
    }
}
