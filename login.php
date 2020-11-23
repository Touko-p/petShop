<?php

function autoload($class_name){
    include $class_name. '.php';
}
spl_autoload_register('autoload');

$username=$_POST["username"];
$password=$_POST["password"];

//数据库
$pdo=new pdoMysql();
$p=$pdo->openConnection();
$sql="SELECT * FROM user where userName='{$username}' and passWord='{$password}'";
$results=$p->query($sql);
$row=$results->fetchAll(PDO::FETCH_ASSOC);
$result=new ResultMap();
if(count($row)==1){
    session_start();
    $_SESSION['user']=$username;
    $result->setFlag(true);
    echo json_encode($result);
    $pdo->closeConnection();
}
else{
    $result->setFlag(false);
    echo json_encode($result);
    $pdo->closeConnection();
}