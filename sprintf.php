<?php
/**
    Strings Functions
    
    sprintf:: 
    % - a literal percent character. No argument is required.
    b - the argument is treated as an integer, and presented as a binary number.
    c - the argument is treated as an integer, and presented as the character with that ASCII value.
    d - the argument is treated as an integer, and presented as a (signed) decimal number.
    e - the argument is treated as scientific notation (e.g. 1.2e+2). The precision specifier stands for the number of digits after the decimal point since PHP 5.2.1. In earlier versions, it was taken as number of significant digits (one less).
    E - like %e but uses uppercase letter (e.g. 1.2E+2).
    u - the argument is treated as an integer, and presented as an unsigned decimal number.
    f - the argument is treated as a float, and presented as a floating-point number (locale aware).
    F - the argument is treated as a float, and presented as a floating-point number (non-locale aware). Available since PHP 4.3.10 and PHP 5.0.3.
    g - shorter of %e and %f.
    G - shorter of %E and %f.
    o - the argument is treated as an integer, and presented as an octal number.
    s - the argument is treated as and presented as a string.
    x - the argument is treated as an integer and presented as a hexadecimal number (with lowercase letters).
    X - the argument is treated as an integer and presented as a hexadecimal number (with uppercase letters).
    
*/

// similar text e sprintf
$t1 = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo';
$t2 = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo';

similar_text($t1,$t2,$per);
echo sprintf("%d    ", $per);

echo'<br />';
// locale e format money
setlocale(LC_MONETARY, "pt_BR");
echo money_format('%.2n', "100000.69");

echo'<br />';
// levenshtein — Calcula a distância Levenshtein entre duas strings 
echo levenshtein('can', 'canturia');
