<?php
interface a{
    public function foo($a);
}

interface b{
    public function bar();
}

interface c extends a, b{
    public function baz();
}

class d implements c{
    public function foo($a)    {
        if(!isset($a))
            return "foo";
        else
            return $a;
    }

    public function bar()    {
        return "bar";
    }

    public function baz()    {
            return "baz";
    }
}
$d = new d();
echo $d->foo("tes");
echo "<br>";
echo $d->bar();
echo "<br>";
echo $d->baz();
echo "<br>";
