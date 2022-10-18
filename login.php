<?php
    $title = "Login";
    require_once "db/connect.php";
    require_once "layout/header.php";
    require_once "db/session.php";

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $_SESSION["username"] = $username;
        $md5_password = md5($password.$username);
        

        $result = $controller->checkuser($md5_password);
        $result2 = $controller->checkadmin($md5_password);
        if($result2){
            header("location: addProduce.php");
        }else if($result){
            header("location: shopfood.php");
        }else{
            echo "<script>alert('ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง')</script>";
        }
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
        justify-content: center;
        padding:5rem;
        height: 100vh;
        width: auto;
        background-image: url(img/login.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        backdrop-filter: blur(5px);
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
    .alert{
        display: flex;
        justify-content: center;
        color: red;
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 10rem;
        min-width: 10rem;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0 10px 5px var(--BG-color);
        background-color: var(--BG5-color);
    }
    h1{
        color: var(--BG3-color);
        margin-bottom: 1rem;
    }
    input{
        height: 2rem;
        width: 20rem;
        border-radius: 0.5rem;
        padding: 0.5rem;
        border: none;
        outline: none;
    }
    input:focus{
        border: 2px solid var(--BG3-color);
    }
    button{
        background-color: var(--BG1-color);
        border: none;
        color: var(--BG0-color);
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 700;
        margin-bottom: 1rem;
        cursor: pointer;
        transition: .5s;
    }
    button:hover{
        color: var(--BG0-color);
        padding: 0.5rem 2rem;
    }
    .link{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    a{
        color: var(--BG0-color);
        text-decoration: none;
    }
    p{
        color: var(--BG3-color);
    }
</style>

<body>
    <form action="login.php" method="POST">
        <h1>เข้าสู่ระบบ</h1>
        <input type="text" placeholder="กรุณากรอกชื่อผู้ใช้" name="username" value="<?php if(isset($_POST["username"])){echo $username;}?>"><br>
        <input type="password" placeholder="กรุณากรอกรหัสผ่าน" name="password"><br>
        <button type="submit" name="submit">เข้าสู่ระบบ</button>
        <div class="link">
            <p>คุณมีบัญชีแล้วหรือไม่?</p>
            <a href="register.php">&nbsp;สมัครสมาชิก</a>
        </div>
    </form>
</body>
</html>