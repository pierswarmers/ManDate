<?php


namespace ManDate\Rule;

class MorningRule implements RuleInterface
{
    public function validate(\DateTime $dateTime)
    {
        return $dateTime->format('G') < 12;
    }
}
