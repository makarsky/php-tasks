<?php

namespace Itransition\Entities\Employees;

use Itransition\Interfaces\Payable as Payable;

class Employee
{
	private $fullName;
	private $salary;

	function __construct($fullName, Payable $salary)
	{
		$this->fullName = $fullName;
		$this->salary = $salary;
	}

	function getSalary(): float
	{
		return $this->salary->getSalary();
	}
}