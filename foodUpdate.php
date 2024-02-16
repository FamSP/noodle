<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
require('connect.php');
//echo $_POST["fname"]. "<br>" . $_POST["lname"];

$sql = "UPDATE food SET 
menuid = :menuid , 
name = :foodname , 
price = :price 
Where foodid=:foodid";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':foodid', $_POST['foodid']);
$stmt->bindParam(':menuid', $_POST['menuid']);
$stmt->bindParam(':foodname', $_POST['foodname']);
$stmt->bindParam(':price', $_POST['price']);

if ($stmt->execute()):
    header("location:index.php");
        exit(0);
else :
    $message = 'Update Fail';
endif;
echo $message;

?>
<div class="container">
    <h1 class="text-center"><a href="index.php" class= "btn btn-primary">กลับสู่ข้อมูลลูกค้า</a ></h1>
</div><br>