<?php

namespace DataMunging;

use Exception;

abstract class StatCalculatorAbstract
{
	/**
	 * @var string
	 */
	protected $file;

	/**
	 * @var int
	 */
	protected $max = 0;

	/**
	 * @var int
	 */
	protected $min;

	/**
	 * @var int
	 */
	protected $minDiff;

	/**
	 * @var int
	 */
	protected $title;

	/**
	 * @return int
	 */
	abstract protected function getMaxIndex();

	/**
	 * @return int
	 */
	abstract protected function getMinIndex();

	/**
	 * @return string
	 */
	abstract protected function getTitleIndex();

	/**
	 * @param string $file
	 *
	 * @throws Exception
	 */
	public function __construct($file)
	{
		if (!file_exists($file))
		{
			throw new Exception();
		}

		$this->file = $file;
	}

	/**
	 * @param array $tableRow
	 */
	protected function calculate(array $tableRow)
	{
		$greater  = max($tableRow[$this->getMaxIndex()], $tableRow[$this->getMinIndex()]);
		$lower    = min($tableRow[$this->getMaxIndex()], $tableRow[$this->getMinIndex()]);
		$tempDiff = $greater - $lower;

		if (
			is_numeric($greater)
			&& is_numeric($lower)
			&&
			(
				$this->minDiff > $tempDiff
				|| $this->minDiff === null
			)
		) {
			$this->minDiff = $tempDiff;
			$this->min     = $lower;
			$this->max     = $greater;
			$this->title   = $tableRow[$this->getTitleIndex()];
		}
	}

	/**
	 * @param string $file
	 */
	protected function parseFile($file)
	{
		$lines = file($file);

		for ($i = 1; $i < count($lines) - 1; $i++)
		{
			$tableRow = preg_split('/[\s]+/', $lines[$i]);

			if ($this->isInvalidRow($tableRow))
			{
				continue;
			}

			$this->calculate($tableRow);
		}
	}

	/**
	 * @param array $tableRow
	 *
	 * @return bool
	 */
	private function isInvalidRow(array $tableRow)
	{
		return
			empty($tableRow)
			|| $tableRow[0] == $tableRow[1]
			|| strpos($tableRow[1], '--------') !== false;
	}
}
