<?php


class pdoMysql{
    function openConnection(){
        try {
            $pdo=new PDO("mysql:host=localhost;dbname=petShop;port=3307","root","k2753219155");
            return $pdo;
        }catch (PDOException $e){
            echo "数据库连接失败".$e->getMessage();
            return;
        }
    }
    function closeConnection(){
        if(!empty($pdo)){
            $pdo = null;
        }
    }
}