<?php

$case1 = 'enemssyVampire';
$case2 = 'enemyBoss';

$res = strncmp($case1, $case2, 5);
var_dump($res);