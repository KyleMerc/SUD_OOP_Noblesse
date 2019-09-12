<?php

namespace Noblesse\Character;

require_once $_SERVER['DOCUMENT_ROOT'] .'vendor/autoload.php';

use Noblesse\Character\Character;

$char = new Character('asd','ad','asd');

$char->damage = [10, 30];
$stack = $char->damage;
array_push($stack, 20);
$char->damage = $stack;

var_dump($char->damage);
