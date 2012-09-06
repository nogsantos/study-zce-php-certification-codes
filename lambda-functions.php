<?php
    
    session_start();
//    session_regenerate_id();
    session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/www/learphp/'));
    print_r(session_id());
    echo"<br>";
    print_r(session_save_path());
    echo"<br>";
    
    $var = "hellow";
    $message = "var";
    
    echo $$message . " Word";
    /** 
     * Lambda Exemple
     */
    echo"<br>";
    $name = function($v){
        if($v!=""){
            echo "não ta vazio: ".$v;
        }else{
            echo "vazio";
        }
    };
    $name($$message);
    /**
     * Closure Exemple
     */
    echo"<br>";
    $mensagem = "Quem vai";
    $g = function & ($nome) use ($mensagem){
        if(isset ($nome)){
            echo $mensagem ." ". $nome."?";
        }else{
            echo "sem nada";
        }
    };
    $mensagem = "num foi ainda";
    call_user_func_array($g("Maria"),array("p"=>"a",));
    
    echo"<script> alert(dcoment.cookie) </script>";
