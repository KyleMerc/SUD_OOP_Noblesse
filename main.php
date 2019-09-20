<?php

// class First
// {
//     public function firstMethod(): void
//     {
//         echo "Hello First World";
//     }
// }

// class Second
// {
//     public static function secondMethod(?callable $sample): void
//     {
//         call_user_func([First::class, 'firstMethod']);
//     }
// }

// Second::secondMethod(NULL);
function callFunc1(Closure $closure) {
    $closure(5);
}

function callFunc2(Callable $callback) {
    $callback();
}

function xy() {
    echo 'Hello, World!';
}

callFunc1(function ($x) { return $x * $x; }); // Catchable fatal error: Argument 1 passed to callFunc1() must be an instance of Closure, string given
callFunc2("xy");