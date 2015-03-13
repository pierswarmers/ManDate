<?php
/**
 * User: pierswarmers
 * DateMock: 2/03/15
 * Time: 7:58 PM
 */

namespace Test\ManDate;

use ManDate\Mandate;
use ManDate\Rule\LunchRule;
use ManDate\Rule\WeekdayRule;

class MandateTest extends \PHPUnit_Framework_TestCase
{
    public function testPass()
    {
        $mandate = new Mandate();

        $mandate
            ->andWhere(new WeekdayRule())
            ->andWhere(new LunchRule())
        ;

        $this->assertTrue($mandate->validate(new \DateTime('2015-03-02 12:30')));
    }

    public function testFail()
    {
        $mandate = new Mandate();

        $mandate
            ->andWhere(new WeekdayRule())
            ->andWhere(new LunchRule())
        ;

        $this->assertFalse($mandate->validate(new \DateTime('2015-03-02 11:30')));
    }

    public function testWhereAndWhereNotPass()
    {
        $mandate = new Mandate();

        $mandate
            ->andWhere(new WeekdayRule())
            ->andWhereNot(new LunchRule())
        ;

        $this->assertTrue($mandate->validate(new \DateTime('2015-03-02 9:30')));
    }

    public function testWhereAndWhereNotFail()
    {
        $mandate = new Mandate();

        $mandate
            ->where(new WeekdayRule())
            ->andWhereNot(new LunchRule())
        ;

        $this->assertFalse($mandate->validate(new \DateTime('2015-03-02 12:30')));
    }
}
