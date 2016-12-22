<?php

namespace Itransition\Entities\Payments;

use Itransition\Interfaces\Payable as Payable;

class HourlyPayment implements Payable
{
	private $salary;

	function __construct($salary, $hours)
	{
		$this->salary = $salary * $hours;
	}

	function getSalary(): float
	{
		return $this->salary;
	}
}