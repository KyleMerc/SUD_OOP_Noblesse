<?php

class Sample
{
    public $name;
}

$obj = new Sample;
$prop = 'name';

$obj->$prop = 'Hello';

echo $obj->$prop . "\n";
