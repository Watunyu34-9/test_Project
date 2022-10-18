<?php

$title = "ShopFood";
require_once "db/connect.php";
require_once "layout/header.php";
require_once "db/session.php";

if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
}else{
    header("location: login.php");
}

?>

<!-- เปิดเพื่อแก้ไข CSS -->
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        width: 100%;
        background-color: var(--BG5-color);
        background-image: url(img/login.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
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
    nav{
        position: fixed;
        top:0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 4rem;
        width: 100%;
        padding: 0 5rem;
        background-color: var(--BG4-color);
        z-index: 99;
    }
    ul{
        display: flex;
        align-items: center;
        justify-content: space-between;
        list-style: none;
    }
    li{
        display: flex;
        align-items: center;
        height: 4rem;
    }
    li a{
        display: flex;
        align-items: center;
        height: 4rem;
        padding: 0 1rem;
        text-decoration: none;
        color: var(--BG0-color);
        font-weight: 700;
        font-size: 1rem;
        transition: .3s;
    }
    li a:hover{
        color: var(--BG5-color);
        background-color: var(--BG3-color);
    }
    form{
        display: flex;
    }
    .search{
        height: 2.5rem;
        width: 30rem;
        padding: 1rem;
        outline: none;
        border: none;
        border-radius: 0.5rem;
        font-size: 1rem;
    }
    button.btnSearch{
        margin-left:1rem;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        border: none;
        color: var(--BG0-color);
        background-color: var(--BG5-color);
        transition: .5s;
    }
    button.btnSearch:hover{
        font-size: 1.1rem;
        color: var(--BG5-color);
        background-color: var(--BG3-color);
        cursor: pointer;
    }
    .groupProfile{
        display: flex;
        align-items: center;
        justify-content: space-around;
        height: 4rem;
        width: 20rem;

    }
    .container{
        min-height: 100vh;
        width: 80%;
        padding: 6rem 5rem 2rem 5rem;
        background-color:var(--BG0-color);
    }
    .cardFood{
        display: grid;
        grid-template-columns: 1.5fr 1.5fr 1.5fr 1.5fr;
        column-gap: 3rem;
        row-gap: 2rem;
        justify-content: center;
    }
    .boxCard{
        position: relative;
        top:0;
        left: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 20rem;
        min-width: 10rem;
        box-shadow: 0 0 5px 1px #a9a9a9;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    img.IMG1{    
        position: absolute;
        top:5%;
        height: 150px;
        object-fit: cover;
    }
    .sub-boxCard{
        position: absolute;
        padding: 1rem 0;
        bottom:0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        background-color:var(--BG5-color);
    }
    .groupBuy{
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
    }
    a.buy{
        padding:0.5rem 1rem;
        border-radius: 0.5rem;
        color: var(--BG0-color);
        text-decoration: none;
        background-color:var(--BG4-color);
    }
    .textHello{
        color:var(--BG0-color);
    }
    i.uil-user-circle{
        color:var(--BG0-color);
        font-size:2rem;
    }
    .profile{
        position: fixed;
        display: none;
        flex-direction: column;
        align-items: center;
        height: 10rem;
        width: 15rem;
        z-index: 10;
        top: 10vh;
        right: 2%;
        overflow: hidden;
        border-radius: 0.5rem 0.5rem;
        background-color: var(--BG4-color);
        cursor: pointer;
    }
    a.menu{
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        height: 10rem;
        width: 100%;
        color:var(--BG0-color);
        font-weight: 700;
        transition: .5s;
    }
    a.menu:hover{
        background-color: var(--BG3-color);
        color:var(--BG5-color);
    }
    .hide{
        display: flex;
    }
    p{
        cursor: pointer;
    }
</style>

<body>
    <nav>
        <ul>
            <!-- <li><img src="" alt=""></li> -->
            <li><a href="#">หน้าหลัก</a></li>
            <li><a href="#">ติดต่อเรา</a></li>
        </ul>
        <form action="shopfood.php" method="post">
            <input type="search" class="search" name="text" placeholder="ค้าหารายการสินค้า" value="<?php if(isset($_POST["text"])){echo $_POST["text"];}?>">
            <button type="submit" name="search" class="btnSearch"><i class="uil uil-search"></i></button>
        </form>
        <div class="groupProfile">
            <p class="textHello">สวัสดีคุณ</p>
            <div style="color:#E9C46A; font-weight: 800; text-transform: uppercase;"><?php echo $username;?></div>
            <p id="p"><i class="uil uil-user-circle"></i></p>
        </div>
    </nav>
    <div class="profile">
        <a href="edit.php" class="menu">แก้ไขโปรไฟล์</a>
        <a href="record.php" class="menu">ประวัติการซื้อขาย</a>
        <a href="logout.php" class="menu">ออกจากระบบ</a>
    </div>
    <div class="container">
        <?php 
        if(isset($_POST["search"])){
            $text = $_POST["text"];
            $controller->showfood($text);
        }else{
            $controller->showfood("");
        }
        
        ?>
     </div>

<!-- เปิดเพื่อแก้ไข JS -->
<script>
    const p = document.querySelector("#p");
    const profile = document.querySelector(".profile")
    p.addEventListener("click",function(){
        profile.classList.toggle("hide");
    })
</script>

</body>
</html>