<?php

namespace Itransition\Entities\Payments;

use Itransition\Interfaces\Payable;

class FixedPayment implements Payable
{
    private $salary;

    function __construct($salary)
    {
        $this->salary = $salary;
    }

    function getSalary(): float
    {
        return $this->salary;
    }
}