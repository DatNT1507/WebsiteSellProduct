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
        <h1>Change password</h1>
        <div class="input_box">
            <?php
              include "connect.php";
              $username = $_GET['username'];
              echo "<input type='text' placeholder='$username' readonly>";
            ?>
        </div>
        <div class="input_box">
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="input_box">
            <input type="password" placeholder="Comfirm password" name="comfirm_pass" required>
        </div>

        <input type="submit" class="btn_register" name="change" value="Đổi mật khẩu">

        <div class="login">
            Do you have an account? <a href="login.php">Login</a>
        </div>

      </form>
    </div>
    <?php
      if (isset($_POST['change']) && ($_POST['change']))
      {
        $pass = $_POST['password'];
        $c_pass = $_POST['comfirm_pass'];
        if ($pass == $c_pass)
        {
          $sql = "UPDATE `useraccount` SET user_password='$pass' WHERE user_name='$username'";
          $results = $connect->query($sql);
          echo "<script>";
          echo "alert('Đổi mật khẩu thành công');";
          echo "window.location = 'login.php'";
          echo "</script>";
        }
        else
        {
          echo "<script>";
          echo "alert('Comfirm password wrong');";
          echo "</script>";
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