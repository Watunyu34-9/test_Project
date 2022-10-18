<?php

$title = "Shop Food";
require_once "db/connect.php";
require_once "layout/header.php";
require_once "db/session.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $result = $controller->selectproduce($id);
    $nameProduce = $result["name"];
    $details = $result["details"];
    $type = $result["type"];
    $price = $result["price"];
    $promotion = $result["promotion"];
    $stock = $result["stock"];
    $img = $result["img"];
}else{
    header("location: login.php");
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
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        width: 100%;
        background-color: var(--BG5-color);
        /* background-image: url(img/b63471a7529198e618c055f8e941d959.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        backdrop-filter: blur(5px); */
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
    .formPage1{
        position: absolute;
        left:0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 50%;
        background-color: var(--BG0-color);
    }
    .imgProduce{
        height: 500px;
        width: 500px;
        object-fit: contain;
    }
    .formPage2{
        position: absolute;
        right: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 50%;
        background-color: var(--BG5-color);
    }
    .namePro{
        color:var(--BG3-color);
    }
    .groupDetails{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top:5rem;
    }
    .groupP4{
        display:flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .groupP4 p{
        display:flex;
        margin-bottom:1rem;
    }
    .group{
        display:flex;
        justify-content: space-between;
        width: 40rem;
    }
    .group .P1{

        color:var(--BG0-color);
    }
    .group .P2{
        color:var(--BG0-color);
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .boxAdd{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 2rem;
        width: 10rem;
        margin: 1rem;
        border-radius: 0.3rem;
        background-color: var(--BG2-color);
    }

    .reduce{
        position: absolute;
        left: 0;
        text-align: center;
        padding: 0.2rem 1.5rem;
        border-right: 1px solid rgba(0,0,0,0.2);
    }

    .number{
        cursor: default;
    }

    .add{
        position: absolute;
        right: 0;
        text-align: center;
        padding: 0.2rem 1.5rem;
        border-left: 1px solid rgba(0,0,0,0.2);
    }

    .reduce:hover,
    .add:hover{
        cursor: pointer;
        color: var(--BG0-color);;
    }
    input.showPrice{
        border:none;
        outline:none;
        height:5rem;
        width: 10rem;
        font-size:2rem;
        border-radius: 0.5rem;
        text-align: center;
        font-weight: 700;
        color:var(--BG5-color);
        background-color: var(--BG4-color);
    }
    button.bgcolor1{
    background-color: var(--BG4-color);
    border: none;
    color: whitesmoke;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: .5s;
    }
    button.bgcolor1:hover{
        background-color: var(--BG0-color);
        color: var(--BG4-color);
        padding: 0.5rem 2rem;
    }
    .btnOut{
        background-color: var(--BG1-color);
        border: none;
        color: var(--BG0-color);
        font-size:14px;
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: .5s;
        text-decoration: none;
    }
    .btnOut:hover{
        background-color: whitesmoke;
        color: var(--BG5-color);
        padding: 0.5rem 2rem;
    }
    .link{
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 5rem;
        width: 10rem;
    }
</style>

<body>
    <div class="formPage1">
        <img src="upload/<?php echo $img;?>" alt="" class="imgProduce">
    </div>
    <div class="formPage2">
        <h1 class="namePro"><?php echo $nameProduce?></h1>
        <div class="groupDetails">
            <div class="groupP4">
                <div class="group"><p class="P1">ชื่อประเภท :</p>&nbsp;<p class="P2"><?php echo $type?></p></div>
                <div class="group"><p class="P1">รายละเอียดสินค้า :</p>&nbsp;<p class="P2"><?php echo $details?></p></div>
                <div class="group"><p class="P1">ราคา :</p>&nbsp;<p class="P2"><?php echo $price?> ฿</p></div>
                <div class="group"><p class="P1">โปรโมชั่นพิเศษ :</p>&nbsp;<p class="P2"><?php echo $promotion?></p></div>
            </div>
            <form action="record.php" method="post">
            <h3 class="namePro">เลือกจำนวนสินค้า</h3>
                <div class="boxAdd">
                    <span class="reduce">-</span>
                    <span class="number">01</span>
                    <span class="add">+</span>
                </div>
                
                <input type="text" name="id" value="<?php echo $id ?>" style="display: none;">
                <input type="text" id="result" name="buyprice" class="showPrice" readonly>
                <input type="text" id="amount" name="amount" readonly style="display: none;">

                <div class="link">
                    <button type="submit" class="bgcolor1" name="buy">สั่งซื้อ</button>
                    <a href="shopfood.php" class="btnOut">กลับ</a>
                </div>
            </form>
        </div>
    </div>

<!-- เปิดเพื่อแก้ไข JS -->
<script>
    const 
    reduce = document.querySelector(".reduce");
    number = document.querySelector(".number");
    add = document.querySelector(".add");
    input = document.querySelector("#result");
    input2 = document.querySelector("#amount");

    let a = 1;
    let price = <?php echo $price;?>;
    input.value = (price*a);
    input2.value = a;
    

    add.addEventListener("click",()=>{
        a++;
        a = (a < 10) ? "0" + a : a;
        number.innerText = a;
        input2.value = a;
        input.value = (price*a);
    });
    reduce.addEventListener("click",()=>{
        if(a > 1){
            a--;
            a = (a < 10) ? "0" + a : a;
            number.innerText = a;
            input2.value = a;
            input.value = (price*a);
        }
    });
</script>

</body>
</html>