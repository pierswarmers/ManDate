<?php


namespace ManDate\Rule;

class WeekendRule implements RuleInterface
{
    /**
     * Where N is the ISO-8601 numeric representation of the day of the week (added in PHP 5.1.0).
     *
     * @param \DateTime $dateTime
     *
     * @return bool
     */
    public function validate(\DateTime $dateTime)
    {
        return $dateTime->format('N') >= 6;
    }
}
