<?php
/* Load Require */
require "../../Lib/require_cls.php";

/* Check Login */
if (!isset($_COOKIE['__account'])) header("Location: ../../");

/* Create Result */
$result = array(
     "ex" => false,
     "ex_msg" => null
);

/* Check Forms */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if ($_POST['password']) {
          if ($_POST['password'] == 'delete_password') {
               $query = $s_con->prepare("UPDATE `data` SET `Data_ID`='2', `Data_Name`='0' WHERE `ID` = 1;");
               $query->execute();
          } else {
               $query = $s_con->prepare("UPDATE `data` SET `Data_ID`='2', `Data_Name`=? WHERE `ID` = 1;");
               $query->execute(array($_POST['password']));
          }
          $result['ex'] = true;
          $result['ex_msg'] = "رمز عبور سرور با موفقیت تغییر کرد";
     } else {
          $result['ex_msg'] = "مشکلی پیش آمده است لطفا بعدا تلاش کنید";
          $result['ex'] = true;
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
     <link rel="icon" type="image/png" href="../../images/icons/favicon.ico" />
     <!--===============================================================================================-->
     <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.1.3/css/bootstrap.min.css" integrity="sha384-Jt6Tol1A2P9JBesGeCxNrxkmRFSjWCBW1Af7CSQSKsfMVQCqnUVWhZzG0puJMCK6" crossorigin="anonymous">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
     <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../../css/util.css">
     <link rel="stylesheet" type="text/css" href="../../css/main.css">
     <!--===============================================================================================-->
</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Cp Samp | کنترل پنل سمپ</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                         <a class="nav-link" style="color: red;" href="../Logout">خروج</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="../PublicChat">پیغام عمومی</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="../BanIP">محرومیت آیپی</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="../Ban">محرومیت</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="../Restart">راه اندازی مجدد</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="../Password">رمز عبور</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="../Hostname">نام سرور</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="../">خانه</a>
                    </li>
               </ul>
          </div>
     </nav>
     <div class="limiter">
          <div class="container-login100" style="background-image: url('../../images/img-01.jpg');">
               <div class="wrap-login100 p-t-190 p-b-30">
                    <form action="" method="post" class="login100-form validate-form">

                         <?php if ($result['ex']) { ?>
                              <span class="login100-form-title p-t-20 p-b-45">
                                   <?php echo $result['ex_msg']; ?>
                              </span>
                         <?php } ?>

                         <div class="wrap-input100 validate-input m-b-10" data-validate="لطفا رمز عبور را وارد کنید">
                              <input class="input100" type="text" name="password" placeholder="Password">
                              <span class="focus-input100"></span>
                              <span class="symbol-input100">
                                   <i class="fa fa-align-justify"></i>
                              </span>
                         </div>

                         <div class="container-login100-form-btn p-t-10">
                              <button class="login100-form-btn">
                                   تایید
                              </button>
                         </div>

                         <div class="text-center w-full p-t-25 p-b-230">
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!--===============================================================================================-->
     <script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
     <!--===============================================================================================-->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://cdn.rtlcss.com/bootstrap/v4.1.3/js/bootstrap.min.js" integrity="sha384-C/pvytx0t5v9BEbkMlBAGSPnI1TQU1IrTJ6DJbC8GBHqdMnChcb6U4xg4uRkIQCV" crossorigin="anonymous"></script>
     <!--===============================================================================================-->
     <script src="../../vendor/select2/select2.min.js"></script>
     <!--===============================================================================================-->
     <script src="../../js/main.js"></script>

</body>

</html>