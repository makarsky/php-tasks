<?php

namespace Itransition\Entities\Employees;

use Itransition\Interfaces\Payable as Payable;

class SeniorDeveloper extends Developer
{
	function __construct($fullName, Payable $salary)
	{
		parent::__construct($fullName, $salary);
	}
}