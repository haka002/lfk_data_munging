<?php

use DataMunging\WeatherStatCalculator;

class WeatherStatCalculatorTest extends PHPUnit_Framework_TestCase
{
	public function testCalculate()
	{
		$filePath    = __DIR__ . '/../Resource/weather.dat';
		$calculator = new WeatherStatCalculator($filePath);
		$this->assertEquals('14 61 59', $calculator->writeOutput());
	}
}
