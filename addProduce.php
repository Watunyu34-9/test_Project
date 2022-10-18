<?php
$title = "Admin Form";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "db/session.php";

if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
}else{
    header("location: login.php");
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $result = $controller->selectproduce($id);
    $nameProduce2 = $result["name"];
    $details2 = $result["details"];
    $type2 = $result["type"];
    $price2 = $result["price"];
    $promotion2 = $result["promotion"];
    $stock2 = $result["stock"];
    $img2 = $result["img"];
    $controller->seachproduce("");

}else if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $controller->deleteproduce($id);
    $controller->seachproduce("");
}else if(isset($_POST["submit"])){
    $name = $_FILES["file"]["name"];
    $size = $_FILES["file"]["size"];
    $tmp = $_FILES["file"]["tmp_name"];

    $nameProduce = $_POST["nameProduce"];
    $details = $_POST["details"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $promotion = $_POST["promotion"];
    $stock = $_POST["stock"];

    $path = "upload/".basename($name);

    if(empty($name)){
        echo "<script>alert('ยังไม่เลือกรูปภาพ')</script>";
    }else{
        $checkimg = getimagesize($tmp);

        if(!$checkimg){
            echo "<script>alert('ไม่ใช่ไฟล์รูปภาพ')</script>";

        }else if($size > 5000000){
            echo "<script>alert('ขนาดไฟล์รูปภาพใหญ่เกินไป')</script>";

        }else if(move_uploaded_file($tmp,$path)){
            echo "<script>alert('อัพโหลดสำเร็จ')</script>";
            $controller->insertproduce($name,$nameProduce,$details,$type,$price,$promotion,$stock);

        }else{
            echo "<script>alert('การอัพโหลดผิดพลาด')</script>";
        }
    }
    $controller->seachproduce("");

}else if(isset($_POST["update"])){
    $name = $_FILES["file"]["name"];
    $size = $_FILES["file"]["size"];
    $tmp = $_FILES["file"]["tmp_name"];
    $id = $_POST["id"];

    $nameProduce = $_POST["nameProduce"];
    $details = $_POST["details"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $promotion = $_POST["promotion"];
    $stock = $_POST["stock"];

    $path = "upload/".basename($name);

    if(empty($name)){
        $controller->updateproduce($nameProduce,$name,$details,$type,$price,$promotion,$stock,$id);

    }else{
        $checkimg = getimagesize($tmp);

        if(!$checkimg){
            echo "<script>alert('ไม่ใช่ไฟล์รูปภาพ')</script>";

        }else if($size > 5000000){
            echo "<script>alert('ขนาดไฟล์รูปภาพใหญ่เกินไป')</script>";

        }else if(move_uploaded_file($tmp,$path)){
            echo "<script>alert('อัพโหลดสำเร็จ')</script>";
            $controller->updateproduce($nameProduce,$name,$details,$type,$price,$promotion,$stock,$id);

        }else{
            echo "<script>alert('การอัพโหลดผิดพลาด')</script>";
        }
    }
    $controller->seachproduce("");
}else if(isset($_POST["search"])){
    $text = $_POST["text"];
    $controller->seachproduce($text);
}else{
    $controller->seachproduce("");
}
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
        min-height: 100vh;
        width: 100%;
        background-color: var(--BG7-color);
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
    .groupSearch{
        position: fixed;
        height: 2rem;
        width: 70%;
        
    }
    input.search {
        position: relative;
        height: 100%;
        width: 100%;
        color: var(--BG5-color);
        border-radius: 0rem;
        background-color: var(--BG5-color);
    }
    .btnSearch{
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        padding: 0.5rem 1rem;
        border:none;
        font-weight: 700;
        background-color: var(--BG6-color);
        z-index: 99;
        cursor: pointer;
    }
    input.search:focus {
        border: none;
        border-radius: 0rem;
        background-color: var(--BG4-color);
        color : var(--BG0   -color);
    }
    .groupForm {
        position: fixed;
        top: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 30%;
        padding: 2rem;
    }
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    input {
        height: 2rem;
        width: 20rem;
        padding: 0.5rem;
        border: none;
        outline: none;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }
    input:focus {
        border: 2px solid green;
    }
    table {
        display: flex;
        text-align: center;
        justify-content: center;
        width: 70%;
        padding: 3rem 0;
        background-color: white;
        border-collapse: collapse;
    }
    label {
        font-weight: 700;
        color: var(--BG0-color);
    }
    th,tr,td{
        border-bottom: 1px solid var(--BG-color); 
    }
    td {
        padding: 0 1rem;
    }
    button.addBtn{
        border:none;
        background-color: var(--BG1-color);
        padding: 1rem;
        margin-bottom: 0.5rem;
        font-size:1rem;
        color: var(--BG3-color);
        font-weight: 700;
        cursor: pointer;
        transition: .5s;
    }
    button.addBtn:hover{
        background-color: var(--BG4-color);
        color: var(--BG0-color);
        border-radius: 0.5rem;
        cursor: pointer;
    }
    a.Abtn1{
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        border:none;
        background-color: var(--BG6-color);
        height: 3rem;
        width: 20rem;
        font-size:1rem;
        margin-bottom: 0.5rem;
        color: var(--BG3-color);
        font-weight: 700;
        transition: .5s;
    }
    a.Abtn1:hover{
        background-color: var(--BG1-color);
        color: var(--BG0-color);
        border-radius: 0.5rem;
        font-weight: 700;
        cursor: pointer;
    }
    .ATD{
        padding: 1rem;
        background-color: var(--BG4-color);
        text-decoration: none;
        border-radius: 0.5rem;
        color: var(--BG0-color);
        font-weight: 700;
        transition: .3s;
    }
    .ATD:hover{
        border-radius: 0;
        background-color: var(--BG3-color);
        color: var(--BG0-color);
    }
    .ATD1{
        padding: 1rem;
        background-color: var(--BG1-color);
        text-decoration: none;
        border-radius: 0.5rem;
        color: var(--BG0-color);
        font-weight: 700;
        transition: .3s;
    }
    .ATD1:hover{
        border-radius: 50%;
    }
    .IMG{
        height: 150px;
        width: 150px;
        object-fit: cover;
        transform:translateX(50%);
        border: 2px solid var(--BG3-color);
    }
</style>

<body>
    <div class="groupForm">
        <form action="addProduce.php" method="POST" enctype="multipart/form-data">
            <?php if(isset($_GET["id"])){echo "<input type='text' value='".$id."'readonly name='id' style='pointer-events: none;'>";}?>
            <input type="text" placeholder="ชื่อสินค้า" name="nameProduce"
                value="<?php if(isset($_GET["id"])){echo $nameProduce2;}?>">
            <input type="text" placeholder="รายละเอียดสินค้า" name="details"
                value="<?php if(isset($_GET["id"])){echo $details2;}?>">
            <input type="text" placeholder="ประเภทสินค้า" name="type"
                value="<?php if(isset($_GET["id"])){echo $type2;}?>">
            <input type="text" placeholder="ราคา" name="price"
                value="<?php if(isset($_GET["id"])){echo $price2;}?>">
            <input type="text" placeholder="โปรโมชั่น" name="promotion"
                value="<?php if(isset($_GET["id"])){echo $promotion2;}?>">
            <input type="text" placeholder="สินค้าคงเหลือ" name="stock"
                value="<?php if(isset($_GET["id"])){echo $stock2;}?>">
            <label for="file">เพิ่มรูปภาพสินค้า</label>
            <input type="file" name="file">
            <?php if(isset($_GET["id"])){echo "<img src='upload/".$img2."' alt=''class='IMG'><br>";}?>
            <?php if(!isset($_GET["id"])){echo "<button type='submit' name='submit' class='addBtn'>เพิ่มข้อมูล</button>";} else {echo "<button type='submit' name='update' class='addBtn'>บันทึก</button><a href='addProduce.php' class='Abtn1'>ยกเลิก</a>";}?>
        </form>
        <a href="logout.php" class="Abtn1">ออกจากระบบ</a>
    </div>
</body>
</html>