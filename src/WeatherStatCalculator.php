<?php

namespace DataMunging;

class WeatherStatCalculator extends StatCalculatorAbstract
{
	const DATA_KEY_TITLE = 1;
	const DATA_KEY_MAX   = 2;
	const DATA_KEY_MIN   = 3;

	/**
	 * @return string
	 */
	public function writeOutput()
	{
		$this->parseFile($this->file);

		return $this->title . ' ' . $this->max . ' ' . $this->min;
	}

	/**
	 * @return int
	 */
	protected function getMaxIndex()
	{
		return static::DATA_KEY_MAX;
	}

	/**
	 * @return int
	 */
	protected function getMinIndex()
	{
		return static::DATA_KEY_MIN;
	}

	/**
	 * @return int
	 */
	protected function getTitleIndex()
	{
		return static::DATA_KEY_TITLE;
	}
}
