<?php
session_start();
ob_start();
$id = $_GET['masp'];
$quantity = $_GET['quantity'];
if($id != "")
{
    if(isset($_SESSION['giohang'][$id]))
    {
        $_SESSION['giohang'][$id] += intval($quantity);
    }
    else
    {
        $_SESSION['giohang'][$id] = intval($quantity);
    }
    header("location: giohang.php");
}
else
{
    header("location:index.php");
}
?>