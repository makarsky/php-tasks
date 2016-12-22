<?php

namespace Itransition\Entities\Employees;

use Itransition\Interfaces\Payable as Payable;

class Designer extends Employee
{
	function __construct($fullName, Payable $salary)
	{
		parent::__construct($fullName, $salary);
	}
}