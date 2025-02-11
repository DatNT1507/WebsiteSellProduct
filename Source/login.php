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
<?php
  require_once 'vendor/autoload.php';

  // init configuration
  $clientID = '793111758450-45suidvlpeje5dtc8n00nu1lef13u920.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost:8080/IS207-PersonalBlog/login.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

  // authenticate code from Google OAuth Flow
  if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    include "connect.php";
    $currentDate = date("Y-m-d");
    $sql = "INSERT INTO `useraccount`(`user_name`, `user_password`, `ho_ten`, `sdt`, `ngay_dk`) VALUES ('$name','$name','$name','0','$currentDate')";
    $results = $connect->query($sql);

    $user_rows = getuser($name);
    $user_row = $user_rows->fetch_row();
    $user_id = $user_row[0];
    
    echo "<script>alert('Đăng nhập thành công');</script>";
    echo "<script>window.location = 'index.php?user_id=$user_id';</script>";
    // now you can use this profile info to create account in your website and make user logged in.
  }
?>
<body>
  <div class="container page_login">
    <div class="login_form">
      <form action="" method="POST">
        <h1>Login</h1>
        <div class="input_box">
            <input type="text" placeholder="Username" name="username" required>
            <i class="fa fa-user"></i>
        </div>
        <div class="input_box">
            <input type="password" placeholder="Password" name="password" required>
            <i class="fa fa-lock"></i>
        </div>

        <div class="remember_forgot">
            <label for=""><input type="checkbox">Remember me</label>
            <a href="forgot_pw.php">Forgot password</a>
        </div>

        <input type="submit" class="btn_login" name="login" value="Login">

        <div class="register">
            Don't have an account? <a href="register.php">Register</a>
        </div>

        <div class="social_login">
            <hr><span>Or Connect With Social Media</span>
            <div class="social-fields">
                <div class="social-field google">
                    <?php 
                      echo "<a href='".$client->createAuthUrl()."'><i class='fa fa-google'></i> Sign in with Google</a>";
                    ?>
                </div>
            </div>
        </div>

      </form>
    </div>
    <?php
      session_start();
      function checkuser($user, $pass) {
        include "connect.php";
        $sql = "SELECT * FROM `useraccount` WHERE user_name='$user' AND user_password='$pass'";
        $results = $connect->query($sql);
        return $results;
      }
      function getuser($user) {
        include "connect.php";
        $sql = "SELECT * FROM `useraccount` WHERE user_name='$user'";
        $results = $connect->query($sql);
        return $results;
      }
      if (isset($_POST['login']) && ($_POST['login']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $results = checkuser($username, $password);
        
        $user_rows = getuser($username);
        $user_row = $user_rows->fetch_row();
        $user_id = $user_row[0];
        $admin_perr = $user_row[6];
    
        if ($results->num_rows > 0) {
          if ($admin_perr == 1)
          {
            $_SESSION['admin'] = 1;
            echo "<script>alert('Đăng nhập thành công');</script>";
            echo "<script>window.location = 'index.php?user_id=$user_id';</script>";
          }
          else
          {
            echo "<script>alert('Đăng nhập thành công');</script>";
            echo "<script>window.location = 'index.php?user_id=$user_id';</script>";
          }
        } else {
            echo "<script>";
            echo "alert('Sai tài khoản hoặc mật khẩu');";
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

