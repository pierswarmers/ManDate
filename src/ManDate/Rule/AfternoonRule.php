<?php


namespace ManDate\Rule;

class AfternoonRule implements RuleInterface
{
    public function validate(\DateTime $dateTime)
    {
        return $dateTime->format('G') >= 12;
    }
}
