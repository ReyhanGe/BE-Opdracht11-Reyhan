<?php

class Landingpages extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $sumTest = "De som 5 + 2 = " . $this->add(5, 2);
        $data = [
            'title' => "Homepage Mvc Oop Pdo Toets",
            'sayHello' => 'Hallo Allemaal',
            'sumTest' => $sumTest

        ];
        $this->view('landingpages/index', $data);
    }


    /**
    Dit is mijn method afblijven want hij wordt getest 
     */
    public function add($number1, $number2)
    {
        $sum = $number1 + $number2;

        return $sum;
    }
}
