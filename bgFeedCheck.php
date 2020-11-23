<?php
include "gg.php";

$id=$_POST["id"];
$num=$_POST["num"];
$user=$_POST["user"];

$gg = new gg();

$money=$gg->getMoney($user);
$tMoney=$money->fetchColumn();

$newMoney=$tMoney-$num;

$health=$gg->getHealth($id);
$tHeath=$health->fetchColumn();
$newHeath=$tHeath+($num/1000);

$result=new ResultMap();
if ($newMoney>0){
    $gg->setMoney($newMoney,$user);
    $gg->setHealth($id,$newHeath);
    $result->setFlag(true);
    echo json_encode($result);
}else{
    $result->setFlag(false);
    echo json_encode($result);
}