<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .top{
            width: 100%;
            height: 50px;
            background-color: deepskyblue;
            font-size: 30px;
            font-weight: bold;
            line-height: 50px;
            text-align: center;
            color: white;
        }
        .top span{
            float: right;
            margin-right: 20px;
            font-size: 20px;
        }
        .shop{
            width: 80%;
            height: 220px;
            /*background-color: yellow;*/
            margin: 0 auto;
            margin-top: 30px;
        }
        .pet{
            width: 25%;
            float: left;
        }
        .petTitle{
            width: 100%;
            height: 30px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            line-height: 30px;
        }
        .petImg img{
            margin-left: 50px;
        }
        .getPet button{
            width: 100%;
            height: 30px;
            font-size: 20px;
            font-weight: bold;
        }
        .a{
            float: left;
            font-size: 20px;
            margin-left: 10px;
            color: pink;
        }
        .out{
            background: yellow;
            margin-left: 500px;
            margin-top: 100px;
        }
        .out a{
            display: block;
            width: 70px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            color: black;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
function autoload($class_name){
    include $class_name. '.php';
}
spl_autoload_register('autoload');
?>
<div class="top">
    <a href="backGarden.php" class="a">后花园</a>
    神奇宝贝带师商店
        <span>疾风训练师:
        <?php
            session_start();
            $user=$_SESSION['user'];
            $pdo=new pdoMysql();
            $p=$pdo->openConnection();
            $result1=$p->query("SELECT name FROM user where userName='{$user}'");
            $name=$result1->fetchColumn();
            $result2=$p->query("SELECT money FROM user where userName='{$user}'");
            $money=$result2->fetchColumn();
            echo '<span style="color: gold">'.'$'.$money.'</span>';
            echo '<span style="color: darkred">'.$name.'</span>';
            $pdo->closeConnection();
        ?>
</div>
<div class="shop">
    <div class="pet">
        <div class="petTitle" style="background-color: rgb(163,215,211)">杰尼龟</div>
        <div class="petImg">
            <img src="sqbb/jng.jpg">
        </div>
        <div class="getPet">
            <button onclick="jump()">查看</button>
        </div>
    </div>
    <div class="pet">
        <div class="petTitle" style="background-color: rgb(81,146,88)">妙蛙种子</div>
        <div class="petImg">
            <img src="sqbb/mwzz.png">
        </div>
        <div class="getPet">
            <button>查看</button>
        </div>
    </div>
    <div class="pet">
        <div class="petTitle" style="background-color: rgb(245,208,32)">皮卡丘</div>
        <div class="petImg">
            <img src="sqbb/pkq.jpg">
        </div>
        <div class="getPet">
            <button>查看</button>
        </div>
    </div>
    <div class="pet">
        <div class="petTitle" style="background-color: rgb(125,96,76)">伊布</div>
        <div class="petImg">
            <img src="sqbb/yb.png">
        </div>
        <div class="getPet">
            <button>查看</button>
        </div>
    </div>
    <button class="out"><a href="login.html">注销</a></button>
</div>
<script>
    function jump() {
        location.href='jng.php';
    }
</script>
</body>
</html>