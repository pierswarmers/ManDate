<?php

namespace Test\ManDate\Rule;


use ManDate\Rule\RuleInterface;
use ManDate\Rule\WeekendRule;

class WeekendRuleTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var RuleInterface
	 */
	private $rule;

	public function setUp()
	{
		$this->rule = new WeekendRule();
	}

	public function testPassWithLowerBoundary()
	{
		$this->assertTrue($this->rule->validate(new \DateTime('2015-03-07 00:01')));
	}

	public function testFailWithLowerBoundary()
	{
		$this->assertFalse($this->rule->validate(new \DateTime('2015-03-06 23:59')));
	}

	public function testPassWithUpperBoundary()
	{
		$this->assertTrue($this->rule->validate(new \DateTime('2015-03-08 23:59')));
	}

	public function testFailWithUpperBoundary()
	{
		$this->assertFalse($this->rule->validate(new \DateTime('2015-03-09 00:00:00')));
	}
}
