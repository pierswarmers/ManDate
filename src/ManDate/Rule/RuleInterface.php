<?php


namespace ManDate\Rule;

interface RuleInterface
{
    public function validate(\DateTime $dateTime);
}
