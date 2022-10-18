<?php

class Controller{
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    function checkuser($data){
        $sql = "SELECT password FROM user WHERE password = '$data'";
        $check = $this->db->query($sql);
        $result = $check->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function userbyuser($data){
        $sql = "SELECT username FROM user WHERE username = '$data'";
        $check = $this->db->query($sql);
        $result = $check->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function emailbyemail($data){
        $sql = "SELECT email FROM user WHERE email = '$data'";
        $check = $this->db->query($sql);
        $result = $check->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertuser($username,$email,$password){
        $sql = "INSERT INTO user (username,email,password) VALUES ('$username','$email','$password')";
        $insert = $this->db->query($sql);
    }

    function selectuser($username){
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $query = $this->db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateuser($username,$phone,$address,$district,$sub_district,$zip_code){
        $sql = "UPDATE user SET phone='$phone',address='$address',district='$district',sub_district='$sub_district',zip_code='$zip_code' WHERE username = '$username'";
        $this->db->query($sql);
    }

    function checkadmin($data){
        $sql = "SELECT password FROM admin WHERE password = '$data'";
        $check = $this->db->query($sql);
        $result = $check->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertproduce($img,$name,$details,$type,$price,$promotion,$stock){
        $sql = "INSERT INTO food (img,name,details,type,price,promotion,stock) VALUES ('$img','$name','$details','$type','$price','$promotion','$stock')";
        $insert = $this->db->query($sql);
    }

    function showfood($char){
        $sql = "SELECT * FROM food WHERE name like '$char%' or type like '$char%'";
        $result = $this->db->query($sql);
        echo "<div class='cardFood'>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='boxCard'>";
            echo "<img src='"."upload/".$row['img']."'class='IMG1'>";
            echo "<div class='sub-boxCard'>";
            echo "<h3 style='color:#E9C46A;'>".$row['name']."</h3><br>";
            echo "<p style='color:#ffff;'><i>".$row['promotion']."</i></p><br>";
            echo "<div class='groupBuy'>";
            echo "<h2 style='color:#ffff;'><b>".$row['price']."&nbsp;.-</b></h2>";
            echo "<form action='shopfood.php' method='post'><a href='buy.php?id=".$row['id']."' class='buy'>สั่งซื้อ</a></form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }

    function selectproduce($id){
        $sql = "SELECT * FROM food WHERE id = '$id'";
        $query = $this->db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateproduce($nameProduce,$img,$details,$type,$price,$promotion,$stock,$id){
        if(empty($img)){
            $sql = "UPDATE food SET name='$nameProduce',details='$details',type='$type',price='$price',promotion='$promotion',stock='$stock' WHERE id = '$id'";
            $this->db->query($sql);
            
        }else{
            $sql = "UPDATE food SET name='$nameProduce',img='$img',details='$details',type='$type',price='$price',promotion='$promotion',stock='$stock' WHERE id = '$id'";
            $this->db->query($sql);
        }
    }

    function deleteproduce($id){
        $sql = "DELETE FROM food WHERE id = '$id'";
        $this->db->query($sql);
    }

    function seachproduce($char){
        $sql = "SELECT * FROM food WHERE name like '$char%' or id like '$char%'";
        $result = $this->db->query($sql);
        echo "<div class='groupSearch'>";
        echo "<form action='addProduce.php' method='POST'>";
        echo "<input type='search' class='search' name='text' placeholder='ค้นหา'>";
        echo "<button type='submit' class='btnSearch' name='search'>ค้นหา</button>";
        echo "</form>";
        echo "</div>";
        echo "<table>";
        echo "<tr>";
        echo "<th>ลำดับ</th>";
        echo "<th>ชื่อ</th>";
        echo "<th>รูปภาพ</th>";
        echo "<th>รายละเอียด</th>";
        echo "<th>ประเภท</th>";
        echo "<th>ราคา</th>";
        echo "<th>โปรโมชั่น</th>";
        echo "<th>สต็อก</th>";
        echo "<th colspan='2'>จัดการข้อมูล</th>";
        echo "</tr>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td class='border'>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td class='border1'><img src='"."upload/".$row['img']."' width=150px></td>";
            echo "<td>".$row['details']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['promotion']."</td>";
            echo "<td>".$row['stock']."</td>";
            echo "<td class='border'><a href='addProduce.php?id=".$row['id']."' class='ATD'>แก้ไข</a></td>";
            echo "<td class='border1'><a href='addProduce.php?delete=".$row['id']."'&delete='' class='ATD1'>ลบ</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function recorddata($username,$idfood,$price,$date,$amount){
        $sql = "INSERT INTO record (username,idfood,price,date,amount) VALUES ('$username','$idfood','$price','$date','$amount')";
        $insert = $this->db->query($sql);
    }

    function showrecord($username){
        $sql = "SELECT * FROM record WHERE username = '$username'";
        $result = $this->db->query($sql);
        echo "<table>";
        echo "<tr>";
        echo "<th>รูปภาพ</th>";
        echo "<th>ชื่ออาหาร</th>";
        echo "<th>โปรโมชั่น</th>";
        echo "<th>ราคาสินค้า</th>";
        echo "<th>วัน/เวลา</th>";
        echo "<th>จำนวนสั่งซื้อ</th>";
        echo "<th>ราคาสั่งซื้อ</th>";
        echo "</tr>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $sql = "SELECT * FROM food WHERE id = '".$row['idfood']."'";
            $result2 = $this->db->query($sql);
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
            echo"<tr>";
            echo"<td><p><img src='upload/".$row2["img"]."' width=100px></p></td>";
            echo"<td><p>".$row2["name"]."</p></td>";
            echo"<td><p> ".$row2["promotion"]."</p></td>";
            echo"<td><p> ".$row2["price"]."</p></td>";
            echo"<td><p> ".$row["date"]."</p></td>";
            echo"<td><p> ".$row["amount"]."</p></td>";
            echo"<td><p> ".$row["price"]."</p></td>";
            echo"</tr>";
        }
        echo "</table>";
    }
}

?>