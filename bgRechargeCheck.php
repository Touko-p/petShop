<?php
include "gg.php";

$num=$_POST["num"];
$user=$_POST["user"];

$gg = new gg();

$money=$gg->getMoney($user);
$tMoney=$money->fetchColumn();

$newMoney=$num+$tMoney;

$gg->setMoney($newMoney,$user);

$result=new ResultMap();
$result->setFlag(true);
echo json_encode($result);