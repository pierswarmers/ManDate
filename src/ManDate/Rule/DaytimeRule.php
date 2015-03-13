<?php


namespace ManDate\Rule;

class DaytimeRule extends SunlightRuleBase implements RuleInterface
{
    public function validate(\DateTime $dateTime)
    {
        // Odd to format, yes. But it avoids possible PHP bug:  https://bugs.php.net/bug.php?id=53148
        return $dateTime->format('Gi') >= $this->getSunrise($dateTime)->format('Gi') &&
               $dateTime->format('Gi') <= $this->getSunset($dateTime)->format('Gi');
    }
}
