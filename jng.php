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
        #shop{
            width: 100%;
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
    <div id="shop">
        <div class="top">
            <a href="backGarden.php" class="a">后花园</a>
            杰尼杰尼
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
                $pdo->closeConnection();
                ?>
            </span>
        </div>
    </div>
    <div class="shop">
        <table id="app">
            <thead>
            <tr>
                <td>姓名</td>
                <td>种类</td>
                <td>价格</td>
                <td>年龄</td>
                <td>性别</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
                <?php
                include "gg.php";
                $gg = new gg();
                $result = $gg->selectType();
                $status='';
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td style='display: none'>".$row["id"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["type"]."</td>";
                    echo "<td>".$row["price"]."</td>";
                    echo "<td>".$row["age"]."</td>";
                    echo "<td>".$row["sex"]."</td>";
                    if($row["status"]==0){
                        $status="未领养";
                    }else if($row["status"]==2){
                        $status="die";
                    }
                    echo "<td>".$status."</td>";
                    echo "<td>"."<a href=\"javascript:getPet('$row[id]')\">领养</a>"."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="checkResult"></div>
    <script>
        function getPet(id) {
            var flag=confirm("选定你的神奇宝贝了？");
            if(flag==true){
                var user=$(".user").text();
                id=parseInt(id);
                // var tId=id;
                var page = "jngCheck.php";
                $.ajax({
                    type:"post",
                    url: page,
                    data:{"id":id,"user":user},
                    success: function(result){
                        if(JSON.parse(result).flag==true){
                            location.reload();
                        }
                        else
                            alert("领养失败,余额不足");
                    }
                });
            }
        }
    </script>
</body>
</html>