<?php

$title = "Edit Profile";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "db/session.php";

$username = $_SESSION["username"];

if(isset($_POST["save"])){
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $district = $_POST["district"];
    $sub_district = $_POST["sub_district"];
    $zip_code = $_POST["zip_code"];

    $controller->updateuser($username,$phone,$address,$district,$sub_district,$zip_code);
}

$result = $controller->selectuser($username);

?>

<!-- เปิดเพื่อแก้ไข CSS -->
<style> 
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        width: 100%;
        background-color: var(--BG5-color);
        background-image: url(img/b63471a7529198e618c055f8e941d959.jpg);
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
    .groupForm{
        display:flex;
    }
    .groupDetails{
        padding: 0 1.5rem;
    }
    .textHead{
        color: var(--BG1-color);
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
        margin-bottom: 1rem;
    }
    button.bgcolor1{
    background-color: var(--BG4-color);
    border: none;
    color: whitesmoke;
    border-radius: 0.5rem;
    padding: 0.6rem 1.1rem;
    margin: 0 0.5rem 0 0;
    font-weight: 700;
    cursor: pointer;
    transition: .5s;
    }
    button.bgcolor1:hover{
        background-color: var(--BG0-color);
        color: var(--BG4-color);
        padding: 0.6rem 2rem;
    }
    button.bgcolor2{
        background-color: var(--BG1-color);
        border: none;
        color: var(--BG0-color);
        border-radius: 0.5rem;
        padding: 0.6rem 1.1rem;
        margin: 0 0.5rem 0 0;
        font-weight: 700;
        cursor: pointer;
        transition: .5s;
    }
    button.bgcolor2:hover{
        background-color: whitesmoke;
        color: var(--BG1-color);
        padding: 0.6rem 2rem;
    }
    .btnOut{
        background-color: var(--BG3-color);
        border: none;
        color: var(--BG5-color);
        font-size:14px;
        border-radius: 0.5rem;
        padding: 0.6rem 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: .5s;
        text-decoration: none;
    }
    .btnOut:hover{
        background-color: whitesmoke;
        color: var(--BG5-color);
        padding: 0.6rem 2rem;
    }
    .link{
        display: flex;
        align-items: center;
        justify-content:flex-end;
        height: 5rem;
        width: 43rem;
    }
</style>

<body>
    <form action="edit.php" method="post" id="form">
        <div class="groupForm">
            <div class="groupDetails">
                <h2 class="textHead">* ข้อมูลส่วนตัว</h2>
                <div class="groupInput">
                    <input type="text" placeholder="กรุณากรอกชื่อผู้ใช้" value="<?php echo $result['username']?>" readonly><br>
                    <small></small>
                </div>
                <div class="groupInput">
                    <input type="email" placeholder="กรุณากรอกอีเมล์" value="<?php echo $result['email']?>" readonly><br>
                    <small></small>
                </div>
                <div class="groupInput">
                    <input type="tel" placeholder="กรุณากรอกเบอร์โทรศัพท์" name="phone" value="<?php echo $result['phone']?>" <?php if(!isset($_POST["edit"])){echo "readonly";}?>><br>
                    <small></small>
                </div>
            </div>
            <div class="groupDetails">
            <h2 class="textHead">* ข้อมูลเพิ่มเติม</h2>
                <div class="groupInput">
                    <input type="text" placeholder="กรุณากรอก ที่อยู่" name="address" value="<?php echo $result['address']?>" <?php if(!isset($_POST["edit"])){echo "readonly";}?>><br>
                    <small></small>
                </div>
                <div class="groupInput">
                    <input type="text" placeholder="กรุณากรอก ตำบล" name="sub_district" value="<?php echo $result['sub_district']?>"<?php if(!isset($_POST["edit"])){echo "readonly";}?>><br>
                    <small></small>
                </div>
                <div class="groupInput">
                    <input type="text" placeholder="กรุณากรอก อำเภอ" name="district" value="<?php echo $result['district']?>" <?php if(!isset($_POST["edit"])){echo "readonly";}?>><br>
                    <small></small>
                </div>
                <div class="groupInput">
                    <input type="number" placeholder="กรุณากรอก รหัสไปรษณีย์" name="zip_code" value="<?php echo $result['zip_code']?>" <?php if(!isset($_POST["edit"])){echo "readonly";}?>><br>
                    <small></small>
                </div>
            </div>
        </div>
        <div class="link">
            <?php if(isset($_POST["edit"])){echo "<button type='submit' name='save' class='bgcolor1'>บันทึก</button><button type='reset' class='bgcolor2'>คืนค่า</button>";}else{echo "<button type='submit' name='edit' class='bgcolor1'>แก้ไข</button>";}?>
            <a href="shopfood.php" class="btnOut">กลับ</a>
        </div>
    </form>
</body>
</html>