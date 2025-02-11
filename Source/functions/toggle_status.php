<?php
session_start();
if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    echo "<script>window.location = '../index.php';</script>";
}
include '../connect.php'; // kết nối database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    // Lấy trạng thái hiện tại
    $sql = "SELECT status FROM sp WHERE MASP = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $productId);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    // Tắt bật
    $newStatus = $currentStatus == 1 ? 0 : 1;

    // Update trạng thái
    $sql = "UPDATE sp SET status = ? WHERE MASP = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("is", $newStatus, $productId);

    if ($stmt->execute()) {
        echo "Cập nhật trạng thái thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();

    // trở về trang xóa, sửa, tắt
    header("Location: delete_update_toggle_product.php");
    exit();
}
?>