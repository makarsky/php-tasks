<?php

namespace Itransition\Entities;

use Itransition\Interfaces\Payable;
use Itransition\Entities\Employees\Employee;

class Team implements Payable
{
    public $title;
    private $team = [];

    function __construct($title)
    {
        $this->title = $title;
    }

    function addEmployee(Employee $employee)
    {
        $this->team[] = $employee;
    }

    function getSalary(): float
    {
        $teamSalary = 0;
        foreach ($this->team as $employee) {
            $teamSalary += $employee->getSalary();
        }
        return $teamSalary;
    }
}