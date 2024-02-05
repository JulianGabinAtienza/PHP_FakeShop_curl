<?php

Class User {
    public $name;
    public $birthDate;
    public $gender;
    public $money;

    function __construct($name, $birthDate, $gender, $money) {
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
        $this->money = $money;
    }

    public function sayHello() {
        $ne = $this->geneder == 'homme'? 'né' : 'née';

        return "Je suis " . $this->name ." et je suis " . $ne . " le " . $this->birthDate . "<br>";
    }
}