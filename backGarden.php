<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
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
        #app{
            width: 80%;
            margin: 30px auto;
            font-weight: bold;
            text-align: center;
            border: 1px solid white;
            background-color: deepskyblue;
        }
        #app tr td{
            border: 1px solid white;
            height: 30px;
        }
        .a{
            float: left;
            font-size: 20px;
            margin-left: 10px;
            color: pink;
        }
    </style>
    <script src="jquery.min.js"></script>
</head>
<body>
    <div class="top">
        <a href="jng.php" class="a">商店</a>
        后花园
        <span>疾风训练师:
        <?php
        include "pdoMysql.php";
        session_start();
        $user=$_SESSION['user'];
        $pdo=new pdoMysql();
        $p=$pdo->openConnection();
        $sql1="SELECT name FROM user where userName='{$user}'";
        $result1=$p->query($sql1);
        $name=$result1->fetchColumn();
        $sql2="SELECT money FROM user where userName='{$user}'";
        $result2=$p->query($sql2);
        $money=$result2->fetchColumn();
        echo '<span style="color: gold">'.'$'.$money.'</span>';
        echo '<span style="color: darkred" class="user">'.$name.'</span>';
        ?>
    </div>
    <div>
        <table id="app">
            <thead>
            <tr>
                <td>姓名</td>
                <td>种类</td>
                <td>年龄</td>
                <td>性别</td>
                <td>健康值</td>
                <td>亲密度</td>
                <td colspan="3">操作</td>
            </tr>
            </thead>
            <tbody>
                <?php
                include "gg.php";
                $gg = new gg();
                $result = $gg->selectMyPet();
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td style='display: none'>".$row["id"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["type"]."</td>";
                    echo "<td>".$row["age"]."</td>";
                    echo "<td>".$row["sex"]."</td>";
                    echo "<td>".$row["health"]."</td>";
                    echo "<td>".$row["intimacy"]."</td>";
                    echo "<td>"."<a href=\"javascript:feed('$row[id]')\">喂食</a>"."</td>";
                    echo "<td>"."<a href=\"javascript:play('$row[id]')\">互动</a>"."</td>";
                    echo "<td>"."<a href=\"javascript:recharge()\">充值</a>"."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function feed(id) {
            id=parseInt(id);
            var num=prompt("喂养多少钱的食物呢？");
            if (num==null){
                num=0;
            }
            var user=$(".user").text();
            var page = "bgFeedCheck.php";
            $.ajax({
                type:"post",
                url: page,
                data:{"id":id,"num":num,"user":user},
                success: function(result){
                    if(JSON.parse(result).flag==true){
                        location.reload();
                    }
                    else
                        alert("喂养失败,余额不足");
                }
            });
        }
        function play(id) {
            id=parseInt(id);
            var num=prompt("和宠物互动多久呢？");
            if (num==null){
                num=0;
            }
            var user=$(".user").text();
            var page = "bgPlayCheck.php";
            $.ajax({
                type:"post",
                url: page,
                data:{"id":id,"num":num,"user":user},
                success: function(result){
                    if(JSON.parse(result).flag==true){
                        location.reload();
                    }
                    else
                        alert("互动失败,余额不足");
                }
            });
        }
        function recharge() {
            var num=prompt("请输入充值金额");
            if (num==null){
                num=0;
            }
            var user=$(".user").text();
            var page = "bgRechargeCheck.php";
            $.ajax({
                type:"post",
                url: page,
                data:{"num":num,"user":user},
                success: function(result){
                    if(JSON.parse(result).flag==true){
                        location.reload();
                    }
                    else
                        alert("领养失败,余额不足");
                }
            });
        }
    </script>
</body>
</html>