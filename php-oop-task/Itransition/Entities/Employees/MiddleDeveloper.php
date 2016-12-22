<?php

namespace Itransition\Entities\Employees;

use Itransition\Interfaces\Payable as Payable;

class MiddleDeveloper extends Developer
{
	function __construct($fullName, Payable $salary)
	{
		parent::__construct($fullName, $salary);
	}
}