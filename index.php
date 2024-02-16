<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ข้อมูลอาหาร</title>

    <style>
        /* Additional CSS styles */
        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            font-weight: bold;
        }

        .btn {
            font-size: 14px;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }

        .img-thumbnail {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h3>รายชื่ออาหาร <a href="addCustomer_dropdown.php" class="btn btn-info">+เพิ่มข้อมูล</a> </h3>
                <br>
                <table id="customerTable" class="table table-striped table-hover table-responsive">
                    <thead align="center">
                        <tr>
                            <th width="10%">รหัสอาหาร</th>
                            <th width="20%">รหัสเมนู</th>
                            <th width="20%">ชื่อ</th>
                            <th width="15%">ราคา</th>
                            <th width="15%">ภาพ</th>
                            <th width="10%">แก้ไข</th>
                            <th width="10%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $sql = 'SELECT * FROM food';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['foodid'] ?></td>
                                <td><?= $r['menuid'] ?></td>
                                <td><?= $r['name'] ?></td>
                                <td><?= $r['price'] ?></td>
                                <td><img src="image/<?= $r['image']; ?>" class="img-thumbnail" alt="image"></td>
                                <td><a href="foodEditupdate.php?foodid=<?= $r['foodid'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="fooddelete.php?foodid=<?= $r['foodid'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>
</body>

</html>
