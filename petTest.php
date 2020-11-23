<?php

function autoload($class_name){
    include $class_name. '.php';
}
spl_autoload_register('autoload');

session_start();
$master=$_SESSION['master'];
$money=$master->getMoney();

$id=$_POST['id'];
$name=$_POST['name'];
$type=$_POST['type'];
$price=$_POST['price'];
$age=$_POST['age'];
$sex=$_POST['sex'];

$pet=new Pet($id,$name,$type,$price,$age,$sex,100,60);
$master->setPet($pet);
$_SESSION['master']=$master;

$result=new ResultMap();
if($money>=$price){
    $result->setFlag(true);
    echo $master->setMoney($master->getMoney()-$price);
    echo json_encode($result);
}else{
    $result->setFlag(false);
    echo json_encode($result);
}

