<?php
require("../config/connect.php");
//khởi tạo session ,tắt trình duyệt là out
session_start();

if (isset($_POST["login"])) {
    $us = $_POST["us"];
    $pa = $_POST["pa"];
    $sql = "select * from tbl_user where us like '$us' and pa like '$pa'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["username"] = $us;
        header("Location:mana_danhmuc.php");
    } else {
        echo "sai us or pa";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="shortcut icon" href="images/logopanda.jpg"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body style="background-image: url('nenlog.jpg')">
    <form  action="login.php" method="post">
    <div class="login">
        <h1 style="color:black">ĐĂNG NHẬP</h1>
    </div>
    <div class="main">
        <input type="text" name="us" placeholder="Tên đăng nhập" id="name"><span>&#128100;</span>
        <input type="password" name="pa" placeholder="Mật khẩu" id="pass"><span>&#128477;</span>
        <a href="signup.php"><p>Sign up?</p></a>
        <input type="submit" name="login" value="Login" class="ok">
    </div>
    <script type="text/javascript" src="../js/login.js"></script>
</form>
</body>
</html>