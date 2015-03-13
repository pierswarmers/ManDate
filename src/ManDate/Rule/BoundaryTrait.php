<?php


namespace ManDate\Rule;

trait BoundaryTrait
{
    public function validateBoundary(\DateTime $test, \DateTime $boundaryLower, \DateTime $boundaryUpper)
    {
        return $test->getTimestamp() >= $boundaryLower->getTimestamp() &&
               $test->getTimestamp() <= $boundaryUpper->getTimestamp();
    }
}
