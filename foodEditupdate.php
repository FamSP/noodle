<!DOCTYPE html>
<html lang="en">
<head>
    //<?php
     //require('dbconnect.php');
     //$sql = "SELECT * FROM tbl_customer order by customerID ";
    //$stmt = $conn->prepare($sql);
    //$stmt->execute();
    //?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<?php
if (isset($_GET["foodid"]))
{
    $strid = $_GET["foodid"];
}

require('connect.php');
$sql = "SELECT * FROM food WHERE foodid=:foodid ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':foodid',$strid);
$stmt->execute();

?>
    <div class="container">
    <h1 class="text-center">แก้ไขข้อมูลอาหาร</h1>
    <form action="foodUpdate.php" method="post">
   
        <div>
           <select name="id" id="" class="btn btn-secondary dropdown-toggle">
           <?php while ($result = $stmt->fetch(PDO::FETCH_NUM)) {
            ?>
    <option value="<?php echo $result[0] ?>"><?php echo $result[0] ?></option class="form-select">
    

           </select>
           <?php
                    $sqlcountry = "SELECT DISTINCT(menu.menuid),menu.name FROM menu,food 
                    WHERE menu.menuid=food.menuid";
                    $stmt_c= $conn->prepare($sqlcountry);
                    $stmt_c->execute();
                    ?>
                    <select name="menuid" class="btn btn-secondary dropdown-toggle">
                    <?php while ($r = $stmt_c->fetch(PDO::FETCH_NUM)) {
                     ?>
                    <option value="<?php echo $r[0] ?>"><?php echo $r[1] ?></option> 
                    <?php } ?>
                    </select>
                  
        </div class="form-select">

        <div >
            <label for="">ชื่ออาหาร</label>
            <input type="text" name="foodname" id="" class="form-control" value="<?php echo $result[2] ?>">
        </div class="form-group">
        <div>
            <label for="">ราคา</label>
            <input type="text" name="price" id="" class="form-control" value="<?php echo $result[3] ?>">
        </div class="form-group">
        <div>
        <?php } ?>
        <br><input type="submit" value="ยืนยัน" class= "btn btn-success" onclick="return confirm('ยืนยันการแก้ไขข้อมูล')" >
            <input type="reset" value="Reset"  class= "btn btn-danger"><br>

    </form>
<br><a href="index.php" class= "btn btn-primary">กลับหน้าแรก</a>
    </div>
</body>
</html>