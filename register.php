<?php

function autoload($class_name){
    include $class_name. '.php';
}
spl_autoload_register('autoload');

$user=$_POST["user"];
$username=$_POST["username"];
$password=$_POST["password"];

//数据库
$pdo=new pdoMysql();
$p=$pdo->openConnection();
$sql="SELECT userName FROM user where userName='{$user}' ";
//标准写法:insert into 表名 (列名1,...列名n) value (值1,...值n);
$sqlA="INSERT into user values ('{$user}','{$password}','{$username}',10000,4)";
$results=$p->query($sql);

$row=$results->fetchAll(PDO::FETCH_ASSOC);
$result=new ResultMap();
if(count($row)!=1){
    $p->query($sqlA);
    $result->setFlag(true);
    echo json_encode($result);
    $pdo->closeConnection();
}
else{
    $result->setFlag(false);
    echo json_encode($result);
    $pdo->closeConnection();
}