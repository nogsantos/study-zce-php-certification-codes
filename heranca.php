<?php

class a {

    public static function foo($arg){
        if(!isset($arg)){
            return "nao";
        }else{
            return $arg;            
        }
    }
}

class b extends a{

    public static function foo($v){
        return "class b";
    }
}

print a::foo("teste a");
echo "<br>";
$t = new b();
echo $t->foo("as");
echo "<br>";
