<?php
$title = "Register";
require_once "db/connect.php";
require_once "layout/header.php";

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $md5_password = md5($password.$username);

    $checkuser = $controller->userbyuser($username);
    $checkemail = $controller->emailbyemail($email);
    $error = false;

    if($checkuser){
        echo "<script>alert('ผู้ใช้นี้ถูกใช้ไปแล้ว')</script>";
        $error = true;
    }

    if($checkemail){
        echo "<script>alert('อีเมลผู้ใช้นี้ถูกใช้ไปแล้ว')</script>";
        $error = true;
    }

    if(!$error){
        $controller->insertuser($username,$email,$md5_password);
        header("location: login.php");
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
        padding:5rem;
        height: 100vh;
        width: auto;
        background-image: url(img/login.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        backdrop-filter: blur(5px);
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
    .groupInput{
        height:1rem;
        width: 20rem;;
        margin-bottom: 3rem;
    }
    small.text-error{
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin: 0.2rem 0.5rem 0 0;
        font-weight: 700;
        color: var(--BG1-color);
    }
    button.bgcolor1{
        background-color: var(--BG4-color);
        border: none;
        color: whitesmoke;
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 700;
        margin-bottom: 1rem;
        cursor: pointer;
        transition: .5s;
    }
    button.bgcolor1:hover{
        background-color: var(--BG0-color);
        color: var(--BG4-color);
        padding: 0.5rem 2rem;
    }
    button.bgcolor2{
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
    button.bgcolor2:hover{
        background-color: whitesmoke;
        color: var(--BG1-color);
        padding: 0.5rem 2rem;
    }
    .btnOut{
        background-color: var(--BG3-color);
        border: none;
        color: var(--BG5-color);
        font-size:14px;
        border-radius: 0.5rem;
        padding: 0.6rem 1rem;
        font-weight: 700;
        margin-bottom: 1rem;
        cursor: pointer;
        transition: .5s;
        text-decoration: none;
    }
    .btnOut:hover{
        background-color: whitesmoke;
        color: var(--BG5-color);
        padding: 0.6rem 2rem;
    }
    .error{
        border: 1px solid var(--BG1-color);
    }
</style>

<body>
    <form action="register.php" method="post" id="form">
        <h1>สมัครสมาชิก</h1>
        <div class="groupInput">
            <input type="text" placeholder="กรุณากรอกชื่อผู้ใช้" name="username" id="username" value="<?php if(isset($_POST["username"])){echo $username;}?>"><br>
            <small></small>
        </div>
        <div class="groupInput">
            <input type="email" placeholder="กรุณากรอกอีเมล์" name="email" id="email" value="<?php if(isset($_POST["email"])){echo $email;}?>"><br>
            <small></small>
        </div>
        <div class="groupInput">
            <input type="password" placeholder="กรุณากรอกรหัสผ่าน" name="password" id="password"><br>
            <small></small>
        </div>
        <div class="groupInput">
            <input type="password" placeholder="กรุณายืนยันรหัสผ่าน" name="conPassword" id="conPassword"><br>
            <small></small>
        </div>
        <div class="link">
            <button type="submit" name="submit" class="bgcolor1">ลงทะเบียน</button>
            <button type="reset" class="bgcolor2">ลบทั้งหมด</button>
            <a href="login.php" class="btnOut">กลับ</a>
        </div>
    </form>
    <script>
        const form = document.querySelector("#form");
        const username = document.querySelector("#username");
        const password = document.querySelector("#password");
        const conPassword = document.querySelector("#conPassword");
        const email = document.querySelector("#email");

        form.addEventListener("submit", function(e){
            if (username.value === ""){
                showError(username, "* กรุณากรอกข้อมูล",e);
            }else if (username.value.length < 5 || username.value.length > 20){
                showError(username, "* ห้ามน้อยกว่า 5ตัวหรือ มากกว่า20ตัว",e);
            }else{
                clearError(username);
            }

            if (email.value === ""){
                showError(email, "* กรุณากรอกข้อมูล",e);
            }else if(email.value.indexOf("@") < 0 || email.value.indexOf(".") < 2){
                showError(email, "* อีเมลไม่ถูกต้อง",e);
            }else{
                clearError(email);
            }

            if (password.value === ""){
                showError(password, "* กรุณากรอกข้อมูล",e);
            }else if (password.value.length < 8){
                showError(password, "* ห้ามน้อยกว่า 8ตัว",e);
            }else{
                clearError(password);
            }

            if (conPassword.value === ""){
                showError(conPassword, "* กรุณากรอกข้อมูล",e);
            }else if (conPassword.value !== password.value){
                showError(conPassword, "* รหัสผ่านไม่ตรงกัน",e);
            }else{
                clearError(conPassword);
            }
        });

        function showError(input, message,e) {
            const formControl = input.parentElement;
            const small = formControl.querySelector("small");
            input.className = "error";
            small.className = "text-error";
            small.innerText = message;
            e.preventDefault();
        }

        function clearError(input) {
            const formControl = input.parentElement;
            const small = formControl.querySelector("small");
            input.className = "";
            small.className = "";
            small.innerText = "";
        }

        function exit(){
            window.location.href = 'login.php';
        }
    </script>
</body>

</html>