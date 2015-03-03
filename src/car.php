<?php

class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image;

    function __construct($mm, $p, $mi, $im)
    {
        $this->make_model = $mm;
        $this->price = $p;
        $this->miles = $mi;
        $this->image = $im;
    }

    function getImg() {
        return $this->image;
    }

    function setImg($setImg) {
        $this->image = $setImg;
    }

    function getMake_model()
    {
        return $this->make_model;
    }

    function setMake_model($setModel)
    {
        $this->make_model = $setModel;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice($new_price)
    {
        $float_price = (float) $new_price;
        if ($float_price != 0) {
            $this->price = $new_price;
        }
    }

    function getMiles()
    {
        return $this->miles;
    }

    function setMiles()
    {
        $this->miles = $setMiles;
    }

}

 ?>
