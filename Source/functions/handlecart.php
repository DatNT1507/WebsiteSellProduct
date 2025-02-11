<?php
session_start();
ob_start();
if(isset($_POST['scope']))
{
    $scope = $_POST['scope'];
    $masp = $_POST['masp'];
    switch($scope)
    {
        case "delete":
            unset($_SESSION['giohang'][$masp]);
            echo 200;
            break;
        case "plus-quantity":
            $_SESSION['giohang'][$masp] += 1;
            echo 200;
            break;
        case "minus-quantity":
            $_SESSION['giohang'][$masp] -= 1;
            if($_SESSION['giohang'][$masp] <= 0)
                unset($_SESSION['giohang'][$masp]);
            echo 200;
            break;
        default:
            echo "Default handlecart.php";
    }
}
?>