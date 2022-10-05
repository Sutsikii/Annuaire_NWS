<?php

class Student
{
    public $age;
    public $lastname;
    public $firstname;

    public function __construct($age, $firstname, $lastname)
    {
        $this->age = $age;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }
}
