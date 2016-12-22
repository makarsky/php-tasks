<?php

require 'Itransition/Interfaces/Payable.php';
require 'Itransition/Entities/Team.php';
require 'Itransition/Entities/Employees/Employee.php';
require 'Itransition/Entities/Employees/Developer.php';
require 'Itransition/Entities/Employees/SeniorDeveloper.php';
require 'Itransition/Entities/Employees/MiddleDeveloper.php';
require 'Itransition/Entities/Employees/Designer.php';
require 'Itransition/Entities/Employees/HtmlCoder.php';
require 'Itransition/Entities/Payments/FixedPayment.php';
require 'Itransition/Entities/Payments/HourlyPayment.php';

use Itransition\Entities\Team as Team;
use Itransition\Entities\Employees\SeniorDeveloper as SeniorDeveloper;
use Itransition\Entities\Employees\MiddleDeveloper as MiddleDeveloper;
use Itransition\Entities\Employees\Designer as Designer;
use Itransition\Entities\Employees\HtmlCoder as HtmlCoder;
use Itransition\Entities\Payments\FixedPayment as FixedPayment;
use Itransition\Entities\Payments\HourlyPayment as HourlyPayment;

$team = new Team('X');
$team->addEmployee(new Designer('John Doe', new FixedPayment(3000)));
$team->addEmployee(new SeniorDeveloper('Demitrious Johnson', new HourlyPayment(10, 60)));
$team->addEmployee(new MiddleDeveloper('Jack Ripper', new FixedPayment(1000)));
$team->addEmployee(new MiddleDeveloper('Jon Jones', new FixedPayment(1000)));
$team->addEmployee(new HtmlCoder('Cain Velasquez', new HourlyPayment(5, 120)));
echo $team->getSalary();