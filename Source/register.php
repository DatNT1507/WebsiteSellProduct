<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>IS207-PersonalBlog</title>

  <!-- Bootstrap5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="">
  <!-- Main CSS File -->
  <link href="styles.css" rel="stylesheet">

</head>

<body>
  <div class="container page_login">
    <div class="register_form">
      <form action="" method="POST">
        <h1>Register</h1>
        <div class="input_box">
            <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="input_box">
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="input_box">
            <input type="password" placeholder="Comfirm password" name="comfirm_pass" required>
        </div>
        <div class="input_box">
            <input type="text" placeholder="Họ tên" name="ho_ten" required>
        </div>
        <div class="input_box">
            <input type="text" placeholder="SĐT" name="sdt" required>
        </div>

        <input type="submit" class="btn_register" name="register" value="Register">

        <div class="login">
            Do you have an account? <a href="login.php">Login</a>
        </div>

      </form>
    </div>
    <?php
      function register($user, $pass, $name, $sdt) {
        include "connect.php";
        $currentDate = date("Y-m-d");
        $sql1 = "SELECT * FROM `useraccount` WHERE user_name='$user'";
        $result = $connect->query($sql1);
        $row = $result->fetch_row();
        if ($row[1] == $user)
        {
          return 0;
        }
        $sql = "INSERT INTO `useraccount`(`user_name`, `user_password`, `ho_ten`, `sdt`, `ngay_dk`) VALUES ('$user','$pass','$name','$sdt','$currentDate')";
        $results = $connect->query($sql);
        return $results;
      }
      if (isset($_POST['register']) && ($_POST['register']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $comfirm_password = $_POST['comfirm_pass'];
        $ho_ten = $_POST['ho_ten'];
        $sdt = $_POST['sdt'];

        if (strlen($sdt) != 10)
        {
          echo "<script>";
          echo "alert('Sai số điện thoại');";
          echo "</script>";
        }

        elseif ($password != $comfirm_password)
        {
            echo "<script>";
            echo "alert('Mật khẩu không trùng nhau');";
            echo "</script>";
        }
        else
        {
            $results = register($username, $password, $ho_ten, $sdt);
    
            if ($results) {
                echo "<script>alert('Đăng ký thành công');</script>";
                echo "<script>window.location = 'login.php';</script>";
                exit;
            } else {
                echo "<script>";
                echo "alert('Đăng ký không thành công do trùng username');";
                echo "</script>";
            }
        }
      }
    ?>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  <script src="app.js"></script>

</body>

</html>