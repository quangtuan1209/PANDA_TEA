<?php
require("../config/connect.php");
$error = '';

if (isset($_POST["signup"])) {
    $us = $_POST["us"];
    $pa = $_POST["pa"];
    $rpa = $_POST["rpa"];
    // Kiểm tra điều kiện
    if (strlen($pa) < 6) {
        $error = "Mật khẩu pải lớn hơn 6 kí tự";
    }
    // Kiểm tra 2 mật khẩu xem có trùng không
    elseif ($pa != $rpa) {
        $error = "Mật khẩu không trùng nhau";
    } else {
        //kiểm tra xem tài khoản tồn tại hay chưa
        $sql = "select * from tbl_user where us like '$us';";
        $sql_query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($sql_query);
        if ($num == 0) {
            $sql_insert = "INSERT INTO tbl_user(`us`,`pa`)
            VALUES('$us','$pa')";
            $is_insert = mysqli_query($conn, $sql_insert);
            if ($is_insert) {
                header("Location:login.php");
            } else {
                $error = "Đăng ký thất bại";
            }
        } else {
            $error = "Tài khoản đã tồn tại";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body  style="background-image: url('nenlog.jpg')">
    <form action="signup.php" method="post">
    <div class="login">
        <h1 style="color:black">ĐĂNG NHẬP</h1>
    </div>
    <div class="main">
        <input type="text" name="us" placeholder="Tên đăng nhập" id="name"><span>&#128100;</span>
        <input type="password" name="pa" placeholder="Mật khẩu" id="pass"><span>&#128477;</span>
        <input type="password" name="rpa" placeholder="Mật khẩu" id="pass"><span>&#128477;</span>
        <a href="#"><p>Forgot password?</p></a>
        <input type="submit" name="signup" value="Login" class="ok">
    </div>
    <h2> <?php echo $error ?> </h2>
    <script type="text/javascript" src="../js/login.js"></script>
</form>
</body>
</html>