<?php

$title = "ประวัติการซื้อขาย";
require_once "db/connect.php";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "db/session.php";

$username = $_SESSION["username"];
if(isset($_POST["buy"])){
    $id = $_POST["id"];
    $amount = $_POST["amount"];
    $price = $_POST["buyprice"];
    $date = date("d/m/y h-i-s");
    $controller->recorddata($username,$id,$price,$date,$amount);
    echo "<script>alert('สั่งซื้อสำเร็จ กรุณารอชำระเงินปลายทาง')</script>";
}else{
    
}

$controller->showrecord($username);
?>

<!-- เปิดเพื่อแก้ไข CSS -->
<style>
    *{  
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    :root{
        --BG-color: #111111;
        --BG0-color: #FFFFFF;
        --BG1-color: #828282;
        --BG2-color: #882d17;
        --BG3-color: #010203;
        --BG4-color: #2A9D8F;
        --BG5-color: #b9a28b;
        --BG6-color: #cd853f;
        --BG7-color: #009b7d;
    }
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin:0 0 3rem 0;
        /* background-image: url(img/restaurant2.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        backdrop-filter: blur(5px); */
    }
    table{
        border-collapse: collapse;
    }
    th, td{
        text-align: center;
        padding: 1rem 1.5rem;
        border-bottom: 2px solid var(--BG-color);
    }
    tr:nth-child(even){
        color:var(--BG0-color);
        background-color:var(--BG4-color);
    }
    a{
        position: fixed;
        bottom:0;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        height:3rem;
        width: 100%;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--BG0-color);
        background-color: var(--BG1-color);
    }
</style>

<body>
    <a href="shopfood.php">กลับ</a>
</body>
</html>