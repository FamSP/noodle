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