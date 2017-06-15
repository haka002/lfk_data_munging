<?php

namespace DataMunging;

class SoccerStatCalculator extends StatCalculatorAbstract
{
	const DATA_KEY_TITLE = 2;
	const DATA_KEY_MAX = 7;
	const DATA_KEY_MIN = 9;

	/**
	 * @return string
	 */
	public function writeOutput()
	{
		$this->parseFile($this->file);

		return $this->title . ' ' . ($this->max - $this->min);
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
	 * @return string
	 */
	protected function getTitleIndex()
	{
		return static::DATA_KEY_TITLE;
	}
}
