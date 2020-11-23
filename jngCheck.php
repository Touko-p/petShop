<?php

include "gg.php";

$id=$_POST["id"];
$user=$_POST["user"];

$gg = new gg();

$price=$gg->getPrice($id);
$tPrice=$price->fetchColumn();
//echo "价格".$tPrice;

$money=$gg->getMoney($user);
$tMoney=$money->fetchColumn();
//echo "余额".$tMoney;

$newMoney=$tMoney-$tPrice;
//echo "买后预期余额".$newMoney;


//$nMomey=$gg->getMoney($user);
$result=new ResultMap();
if ($newMoney>0){
    $gg->updateType($id);
    $gg->setMoney($newMoney,$user);
    $result->setFlag(true);
    echo json_encode($result);
}else{
    $result->setFlag(false);
    echo json_encode($result);
}
//$nnMomey=$nMomey->fetchColumn();
//echo "实际买后余额".$nnMomey;