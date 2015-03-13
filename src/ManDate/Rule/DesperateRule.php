<?php


namespace ManDate\Rule;

class DesperateRule implements RuleInterface
{
    use BoundaryTrait;

    public function validate(\DateTime $dateTime)
    {
        $boundaryLower = clone $dateTime;
        $boundaryUpper = clone $dateTime;

        return $this->validateBoundary($dateTime, $boundaryLower->setTime(5, 30), $boundaryUpper->setTime(23, 0));
    }
}
