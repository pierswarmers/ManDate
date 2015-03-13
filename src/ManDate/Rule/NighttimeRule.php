<?php


namespace ManDate\Rule;

class NighttimeRule extends SunlightRuleBase implements RuleInterface
{
    public function validate(\DateTime $dateTime)
    {
        $daytimeRule = new DaytimeRule();

        return !$daytimeRule->validate($dateTime);
    }
}
