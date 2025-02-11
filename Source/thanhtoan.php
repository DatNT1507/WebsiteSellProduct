<?php
  include "connect.php";
  session_start();
  $tongtien = $_GET['tongtien'];
  $user_id = $_SESSION['user_id'];
  $giohang = $_SESSION['giohang'];
  $currentDate = date("Y-m-d");
  
  $sql1 = "INSERT INTO `hoadon`(`user_id`, `NGHD`, `TRIGIA`) VALUES ('$user_id','$currentDate','$tongtien')";
  $connect->query($sql1);
  $sohd = $connect->insert_id;

  foreach ($giohang as $id => $sl) {
    $sql2 = "INSERT INTO `cthd` VALUES ('$sohd','$id','$sl')";
    $connect->query($sql2);
  }
  unset( $_SESSION['giohang']);
  $connect->close();
  echo "<script>alert('Thanh toán thành công')</script>";
  header("location: index.php");
?>

