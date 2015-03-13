<?php

namespace Test\ManDate\Rule;


use ManDate\Rule\MorningRule;
use ManDate\Rule\RuleInterface;

class MorningRuleTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var RuleInterface
	 */
	private $rule;

	public function setUp()
	{
		$this->rule = new MorningRule();
	}

	public function testPassWithLowerBoundary()
	{
		$this->assertTrue(
			$this->rule->validate(new \DateTime('2015-03-03 11:59:59', new \DateTimeZone('Australia/Sydney')))
		);
	}

	public function testFailWithLowerBoundary()
	{
		$this->assertFalse(
			$this->rule->validate(new \DateTime('2015-03-03 12:00', new \DateTimeZone('Australia/Sydney')))
		);
	}
}
