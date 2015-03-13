<?php


namespace ManDate;

use ManDate\Rule\RuleInterface;

class Mandate implements RuleInterface
{
    /**
     * @var array|RuleInterface[]
     */
    private $rulesWhere;

    /**
     * @var array|RuleInterface[]
     */
    private $rulesWhereNot;

    public function __construct()
    {
        $this->rulesWhere = [];
        $this->rulesWhereNot = [];
    }

    public function where(RuleInterface $rule)
    {
        return $this->andWhere($rule);
    }

    public function andWhere(RuleInterface $rule)
    {
        $this->rulesWhere[get_class($rule)] = $rule;

        return $this;
    }

    public function whereNot(RuleInterface $rule)
    {
        return $this->andWhereNot($rule);
    }

    public function andWhereNot(RuleInterface $rule)
    {
        $this->rulesWhereNot[get_class($rule)] = $rule;

        return $this;
    }

    public function validate(\DateTime $dateTime)
    {
        foreach ($this->rulesWhere as $rule) {
            if (!$rule->validate($dateTime)) {
                return false;
            }
        }

        foreach ($this->rulesWhereNot as $rule) {
            if ($rule->validate($dateTime)) {
                return false;
            }
        }

        return true;
    }
}
