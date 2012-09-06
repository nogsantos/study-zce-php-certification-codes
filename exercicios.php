<?php

$str1 = "Y-m-";
$str2 = " Sj";
$str3 =  "\i\s \\t\h\e l";
$dt1 = new DateTime("20091223 23:14:13");
$dt1->modify("+3 d");
$dt1->modify("-2 m");
$dt1->modify("+1 year");
date_sub($dt1, new DateInterval("P3D"));
echo $dt1->format($str1.strrev($str2).$str3);

echo '<br>';

$str = 'My very first string is here.';
echo strstr($str, " string", true);
echo '<br>';
//echo substr($str, 0, strlen($str)-strlen("string")-strlen("is")-strlen("here"));
echo '<br>';
echo substr($str, 0, strrpos($str, "str"));
//strpbrk($str, " string");
//strspn($str, " string");
