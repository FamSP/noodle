<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET["foodid"]))
{
    $strid = $_GET["foodid"];
}
//echo $strid;
    require "connect.php";
    $sql = "DELETE FROM food WHERE foodid=:foodid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':foodid',$strid);
    $stmt->execute();


    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

try {
    if ($stmt->execute()) :
        //$message = 'Successfully add new customer';
        echo '
            <script type="text/javascript">        
            $(document).ready(function(){
        
                swal({
                    title: "Success!",
                    text: "Successfuly add customer",
                    type: "success",
                    timer: 2500,
                    showConfirmButton: false
                }, function(){
                        window.location.href = "index.php";
                });
            });                    
            </script>
        ';
    else :
        $message = 'Fail to add new customer';
    endif;
    // echo $message;
} catch (PDOException $e) {
     echo 'Fail! ' . $e;
}
$conn = null;
?>
    else :
        $message = 'Delete Fail';
    endif;

?>



</body>
</html>