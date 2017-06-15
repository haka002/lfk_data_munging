<?php

use DataMunging\SoccerStatCalculator;

class SoccerStatCalculatorTest extends PHPUnit_Framework_TestCase
{
	public function testCalculate()
	{
		$filePath    = __DIR__ . '/../Resource/football.dat';
		$calculator = new SoccerStatCalculator($filePath);
		$this->assertEquals('Aston_Villa 1', $calculator->writeOutput());
	}
}
