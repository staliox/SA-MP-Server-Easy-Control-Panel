<?php
/* Load Require */
require "Lib/require_cls.php";

/* Check Login */
if (isset($_COOKIE['__account'])) header("Location: Account");

/* Check Forms */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $data = array(
          "user" => $_POST['username'],
          "pass" => $_POST['password']
     );
     if ($data['user'] && $data['pass']) {
          $query = $s_con->prepare("SELECT * FROM `accounts` WHERE `Name` = ? AND `Password` = ?");
          $query->execute(array($data['user'], $data['pass']));
          $result_num = $query->rowCount();
          if ($result_num > 0) {
               setcookie("__account", strtoupper(hash("sha512", $info['salt'] . $data['user'])), time() + 3600, "/");
               header("Location: Account");
          } else {
               header("Location: ");
          }
     }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Control Panel Samp</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--===============================================================================================-->
     <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
     <!--===============================================================================================-->
     <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.1.3/css/bootstrap.min.css" integrity="sha384-Jt6Tol1A2P9JBesGeCxNrxkmRFSjWCBW1Af7CSQSKsfMVQCqnUVWhZzG0puJMCK6" crossorigin="anonymous">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../css/util.css">
     <link rel="stylesheet" type="text/css" href="../css/main.css">
     <!--===============================================================================================-->
</head>

<body>
     <div class="limiter">
          <div class="container-login100" style="background-image: url('images/img-01.jpg');">
               <div class="wrap-login100 p-t-190 p-b-30">
                    <form action="" method="post" class="login100-form validate-form">

                         <span class="login100-form-title p-t-20 p-b-45">
                              لطفا اطلاعات ورود را وارد کنید
                         </span>

                         <div class="wrap-input100 validate-input m-b-10" data-validate="لطفا نام کاربری را وارد کنید">
                              <input class="input100" type="text" name="username" placeholder="Username">
                              <span class="focus-input100"></span>
                              <span class="symbol-input100">
                                   <i class="fa fa-user"></i>
                              </span>
                         </div>

                         <div class="wrap-input100 validate-input m-b-10" data-validate="لطفا رمز عبور را وارد کنید">
                              <input class="input100" type="password" name="password" placeholder="Password">
                              <span class="focus-input100"></span>
                              <span class="symbol-input100">
                                   <i class="fa fa-lock"></i>
                              </span>
                         </div>

                         <div class="container-login100-form-btn p-t-10">
                              <button class="login100-form-btn">
                                   ورود
                              </button>
                         </div>

                         <span class="p-t-20 p-b-45 copyright">
                              ساخته شده توسط DrZeos و NimaBastaniw
                         </span>

                         <div class="text-center w-full p-t-25 p-b-230">
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!--===============================================================================================-->
     <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
     <!--===============================================================================================-->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://cdn.rtlcss.com/bootstrap/v4.1.3/js/bootstrap.min.js" integrity="sha384-C/pvytx0t5v9BEbkMlBAGSPnI1TQU1IrTJ6DJbC8GBHqdMnChcb6U4xg4uRkIQCV" crossorigin="anonymous"></script>
     <!--===============================================================================================-->
     <script src="../vendor/select2/select2.min.js"></script>
     <!--===============================================================================================-->
     <script src="../js/main.js"></script>

</body>

</html>