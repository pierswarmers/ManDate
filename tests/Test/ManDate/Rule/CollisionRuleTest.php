<?php

namespace Test\ManDate\Rule;


use ManDate\Rule\CollisionRule;
use ManDate\Rule\RuleInterface;

class CollisionRuleTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var RuleInterface
	 */
	private $rule;

	public function setUp()
	{
		$this->rule = new CollisionRule(new \DateTime('2015-03-03 12:00', new \DateTimeZone('Australia/Sydney')), new \DateTime('2015-03-03 13:00', new \DateTimeZone('Australia/Sydney')));
	}

	public function testPassWithLowerBoundary()
	{
		$this->assertTrue(
			$this->rule->validate(new \DateTime('2015-03-03 12:00', new \DateTimeZone('Australia/Sydney')))
		);
	}

	public function testFailWithLowerBoundary()
	{
		$this->assertFalse(
			$this->rule->validate(new \DateTime('2015-03-03 11:59:59', new \DateTimeZone('Australia/Sydney')))
		);
	}

	public function testPassWithUpperBoundary()
	{
		$this->assertTrue(
			$this->rule->validate(new \DateTime('2015-03-03 12:59:59', new \DateTimeZone('Australia/Sydney')))
		);
	}

	public function testFailWithUpperBoundary()
	{
		$this->assertFalse(
			$this->rule->validate(new \DateTime('2015-03-03 13:00', new \DateTimeZone('Australia/Sydney')))
		);
	}
}
