<?php
abstract class Employee {
    protected $name;
    private static $types = array('minion', 'cluedup', 'wellconnected');

    static function recruit($name) {
        $num = rand(1, count(self::$types)) - 1;
        $class = self::$types[$num];

        return new $class($name);
    }

    function __construct($name) {
        $this->name = $name;
    }

    abstract function fire();
}

class Minion extends Employee {
    function fire() {
        print "{$this->name}: I'll clear my desk\n";
    }
}

class CluedUp extends Employee {
    function fire() {
        print "{$this->name}: I'll call my lawyer\n";
    }
}

class NastyBoss {
    private $employees = array();

    function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    function projectFails() {
        if (count($this->employees)) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}

$boss = new NastyBoss();
$boss->addEmployee(Employee::recruit("Harry"));
$boss->addEmployee(Employee::recruit("Bob"));
$boss->addEmployee(Employee::recruit("Mary"));
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();

// saída:
// Mary: I'll clear my desk
// Bob: I'll call my lawyer
// Harry: I'll clear my desk
?>