<?php
/* 
    Arrays 
   
*/
/* RANGE
    array range ( mixed $low , mixed $high [, number $step ] )
    — Cria um array contendo uma faixa de elementos 
*/
echo '<pre><b>range()</b><br>';
    // array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ,11, 12)  
    foreach(range(0, 12) as $numero) {  
        echo ' - '. $numero;
    }
echo '<br>';
echo '<b>list()</b><br>';
/* LIST
    void list ( mixed $varname [, mixed $... ] )
    — Cria variáveis como se fossem arrays
    - funciona somente com arrays numéricos e espera que esses índices comecem de 0 (zero). 
    
    list($first, $second) = array(first,second);
*/
echo '<br>';
echo '<b>current()</b><br>';
/* CURRENT
    mixed current ( array &$array )
    — Retorna o elemento corrente em um array
*/
$transport = array('foot', 'bike', 'car', 'plane');
$mode = current($transport); // $mode = 'foot';
$mode = next($transport);    // $mode = 'bike';
$mode = current($transport); // $mode = 'bike';
$mode = prev($transport);    // $mode = 'foot';
$mode = end($transport);     // $mode = 'plane';
$mode = current($transport); // $mode = 'plane';

$arr = array();
var_dump(current($arr)); // bool(false)

$arr = array(array());
var_dump(current($arr)); // array(0) { }
echo '<br>';
echo '<b>each()</b><br>';
/*EACH()
    array each ( array $array )
     — Retorna o par chave/valor corrente de um array e avança o seu cursor
     Depois da execução de each(), o cursor interno do array vai apontar para o 
     próximo elemento do array, ou após o último elemento se ele chegar ao final
     do array. Você deve usar reset() se quiser percorrer o array novamente. 
*/
$v = array(
    'a' => 'a1',
    'b' => 'a2',
    'c' => '',
    'd' => 'a3',
    'e' => '',
    'f' => 'a4',
    'g' => 'a5',
);
while($vc = each($v)) {
    echo $vc['value'];
}
echo '<br>';
echo '<b>array_push()</b><br>';
/*FILAS E PILHAS - fifo lifo*/
/*ARRAY_PUSH()
    int array_push ( array &$array , mixed $var [, mixed $... ] )
    — Adiciona um ou mais elementos no final de um $arrayName = array('',);
*/
$cesta = array("laranja", "morango");
array_push($cesta, "melancia", "batata");
print_r($cesta);
echo '<br>';
echo '<b>array_pop()</b><br>';
/*ARRAY_POP()
    mixed array_pop ( array &$array )
    — Retira um elemento do final do array
*/
$cesta = array("laranja", "banana", "melancia", "morango");
$fruta = array_pop($cesta);
print_r($cesta);
echo '<br>';
echo '<b>array_unshift()</b><br>';
/*ARRAY_UNSHIFT()
    int array_unshift ( array &$array , mixed $var [, mixed $... ] )
    — Adiciona um ou mais elementos no início de um array
*/
$cesta = array("laranja", "banana");
array_unshift($cesta, "melancia", "morango");
print_r($cesta);
echo '<br>';
echo '<b>array_shift()</b><br>';
/*ARRAY_SHIFT()
    mixed array_shift ( array &$array )
    - Retira o primeiro elemento de um array
*/
$cesta = array("laranja", "banana", "melancia", "morango");
$fruta = array_shift($cesta);
print_r($cesta);






















