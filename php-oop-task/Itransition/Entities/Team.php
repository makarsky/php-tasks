<?php
namespace Itransition\Entities;

use Itransition\Interfaces\Payable;
use Itransition\Entities\Employees\Employee;

class Team implements Payable
{
    private $title;
    private $team = [];

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function addEmployee(Employee $employee)
    {
        $this->team[] = $employee;
    }

    public function getSalary(): float
    {
        $teamSalary = 0;
        
        foreach ($this->team as $employee) {
            $teamSalary += $employee->getSalary();
        }
        
        return $teamSalary;
    }
}
