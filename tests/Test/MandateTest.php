<?php

namespace Test\ManDate;


use ManDate\Mandate;
use ManDate\Rule\DaytimeRule;
use ManDate\Rule\WeekdayRule;

class MandateTest extends \PHPUnit_Framework_TestCase
{
    public function testPass()
    {
        $mandate = new Mandate();

        $mandate
            ->andWhere(new WeekdayRule())
            ->andWhere(new DaytimeRule())
        ;

        $this->assertTrue($mandate->validate(new \DateTime('2015-03-03 07:00', new \DateTimeZone('Australia/Sydney'))));
    }

    public function testFail()
    {
        $mandate = new Mandate();

        $mandate
            ->andWhere(new WeekdayRule())
            ->andWhere(new DaytimeRule())
        ;

        $this->assertFalse($mandate->validate(new \DateTime('2015-03-03 04:00', new \DateTimeZone('Australia/Sydney'))));
    }

    public function testWhereAndWhereNotPass()
    {
        $mandate = new Mandate();

        $mandate
            ->andWhere(new WeekdayRule())
            ->andWhereNot(new DaytimeRule())
        ;

        $this->assertTrue($mandate->validate(new \DateTime('2015-03-03 04:00', new \DateTimeZone('Australia/Sydney'))));
    }

    public function testWhereAndWhereNotFail()
    {
        $mandate = new Mandate();

        $mandate
            ->where(new WeekdayRule())
            ->andWhereNot(new DaytimeRule())
        ;

        $this->assertFalse($mandate->validate(new \DateTime('2015-03-03 07:00', new \DateTimeZone('Australia/Sydney'))));
    }
}
