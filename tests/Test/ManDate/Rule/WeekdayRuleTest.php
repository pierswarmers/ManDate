<?php

namespace Test\ManDate\Rule;


use ManDate\Rule\RuleInterface;
use ManDate\Rule\WeekdayRule;

class WeekdayRuleTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var RuleInterface
	 */
	private $rule;

	public function setUp()
	{
		$this->rule = new WeekdayRule();
	}

	public function testPassWithLowerBoundary()
	{
		$this->assertTrue($this->rule->validate(new \DateTime('2015-03-02 00:00')));
	}

	public function testFailWithLowerBoundary()
	{
		$dateTime = new \DateTime('2015-03-02 00:00');

		$dateTime->modify('-1 second');

		$this->assertFalse($this->rule->validate($dateTime));
	}

	public function testPassWithUpperBoundary()
	{
		$dateTime = new \DateTime('2015-03-06 23:59');

		$this->assertTrue($this->rule->validate($dateTime));
	}

	public function testFailWithUpperBoundary()
	{
		$dateTime = new \DateTime('2015-03-06 23:59:59');

		$dateTime = $dateTime->modify('+1 seconds');

		$this->assertFalse($this->rule->validate($dateTime, $dateTime->format('l, Y-m-d H:i:m')));
	}
}
