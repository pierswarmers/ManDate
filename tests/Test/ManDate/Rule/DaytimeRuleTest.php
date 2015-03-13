<?php

namespace Test\ManDate\Rule;


use ManDate\Rule\DaytimeRule;
use ManDate\Rule\RuleInterface;

/**
 * Class DaytimeRuleTest
 *
 * 2015-03-03 as the test date - you can expect something close to the following:
 *
 *  Sunrise is 6:44
 *  Sunset is 19:30
 *
 * @package Test\ManDateMock\Rule
 */
class DaytimeRuleTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var RuleInterface
	 */
	private $rule;

	public function setUp()
	{
		$this->rule = new DaytimeRule();
	}

	public function testPassWithLowerBoundary()
	{
		$this->assertTrue(
			$this->rule->validate(new \DateTime('2015-03-03 07:00', new \DateTimeZone('Australia/Sydney')))
		);
	}

	public function testFailWithLowerBoundary()
	{
		$this->assertFalse(
			$this->rule->validate(new \DateTime('2015-03-03 06:00', new \DateTimeZone('Australia/Sydney')))
		);
	}

	public function testPassWithUpperBoundary()
	{
		$this->assertTrue(
			$this->rule->validate(new \DateTime('2015-03-03 18:00', new \DateTimeZone('Australia/Sydney')))
		);
	}

	public function testFailWithUpperBoundary()
	{
		$this->assertFalse(
			$this->rule->validate(new \DateTime('2015-03-03 20:00', new \DateTimeZone('Australia/Sydney')))
		);
	}
}
