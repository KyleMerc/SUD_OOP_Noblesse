<?php

$case1 = 'Enemy';
$case2 = 'setEnemyBoss';

$res = strncmp($case1, $case2, 8);
$sample = strpos("setenemyBoss", "Enemy");
$one = strcasecmp($case1, $case2);
var_dump($res);