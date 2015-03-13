<?php


namespace ManDate\Rule;

class CollisionRule implements RuleInterface
{
    public $begin;
    public $end;

    public function __construct(\DateTime $begin, \DateTime $end)
    {
        $this->begin = $begin;
        $this->end = $end;
    }

    public function validate(\DateTime $dateTime)
    {
        return $dateTime >= $this->begin && $dateTime < $this->end;
    }
}
