<?php

declare(strict_types=1);

function add(int $a, int $b)
{
    echo 'Arg 1: ', gettype($a), "</br>";
    echo 'Arg 2: ', gettype($b);

    return $a + $b;
}

// Returns integer, integer, 4
var_dump(add(2,2));


var_dump(add(2,2.5));
// With strict_types:
// Returns PHP fatal error: Uncaught type error
// Without strict_types:
// Returns 4
// 2.5 is coerced to 2

var_dump(add(2,"abc"));
// With and without strict_types:
// Returns PHP fatal error: Uncaught type error