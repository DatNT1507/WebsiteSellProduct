<?php
    session_start();
    if (!isset($_SESSION['admin']))
    {
        echo "<script>alert('Bạn không có quyền truy cập')</script>";
        echo "<script>window.location = '../index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
        <div class="container w-50 mx-auto text-center my-5">
            <a href='add_product.php'><h2>Thêm sản phẩm</h2></a>
            <a href='delete_update_toggle_product.php'><h2>Xóa và cập nhật sản phẩm</h2></a>
            <a href='../revenue_statistics.php'><h2>Thống kê</h2></a>
            <a href='../index.php'><h2>Trang chủ</h2></a>
        </div>
</body>
</html>