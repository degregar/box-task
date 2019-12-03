<?php

namespace Eselt;

class Box
{
    private $x;
    private $y;
    private $z;

    /**
     * @param float $x
     * @param float $y
     * @param float $z
     */
    public function __construct(float $x, float $y, float $z)
    {
        if ($x <= 0 || $y <= 0 || $z <= 0) {
            throw new \InvalidArgumentException("Dimensions of the box must be greater than 0!");
        }

        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function getZ(): float
    {
        return $this->z;
    }
    
    public function fitsInto(Box $otherBox): bool
    {
        if ($this->x >= $otherBox->getX()) {
            return false;
        }
        if ($this->y >= $otherBox->getY()) {
            return false;
        }
        if ($this->z >= $otherBox->getZ()) {
            return false;
        }

        return true;
    }
}
