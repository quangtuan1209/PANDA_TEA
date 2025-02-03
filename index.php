<?php
require("config/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PANDA TEA</title>
	<link rel="shortcut icon" href="images/logopanda.jpg"/>
	<link rel="stylesheet" type="text/css" href="./css/1.css">
	<!-- đây là link của icon boostrap -->
		
</head>
<body>
<!-- bố cục của pts -->
	<div class="pts">
		<div class="pts_1"></div>
		<div class="pts_2">
			<div class="pts_2_left">
				<img src="./img/b1.jpg">
			</div>
			<div class="pts_2_right">
				<input type="text" placeholder="Nhập từ tìm kiếm..." id="tk">
				<img src="./img/1.png" alt="">
			</div>
		</div>
	</div>
	<!-- bố cục của menu -->
	<div class="menu">
		<ul>
			<li><a href="trangchu.html">&#127969; Trang chủ</a></li>
			<li><a href="gioithieu.html">&#128073; Giới Thiệu</a></li>
			<li><a href="sanpham.html">&#127865; Sản Phẩm</a></li>
			<li><a href="lienhe.html">&#128226; Liên Hệ</a></li>
			<li><a href="admin/login.php">&#128100; Đăng Nhập</a></li>
		</ul>
	</div>
	<!-- bố cục của banner -->
	<div class="banner">
		<img src="./img/lk3.jpg" alt="" class="banner_slide" onclick="trans()" style="border-radius: 10px 10px 50px 50px">
	</div>
	

	<!-- phần section thân trang web-->
             <hr  align="center" color="#AAAAAA" />
             
             
        <h1>CÀ PHÊ</h1>
        <div id="main">
            <div id="left">
                <div class="grid-container">
                <?php
             $sql_our = "select * from tbl_sanpham where Ma_DanhMuc = 1;";
             $our = mysqli_query($conn, $sql_our);
             if (mysqli_num_rows($our) > 0) {
                 while ($row = mysqli_fetch_assoc($our)) {
                     echo '<a href="#">
                     <div class="grid-item">
                         
                             <img class="productimg" src="admin/'.$row["AnhSP"].'">
                             <div>
                                 <div class="item-name">
                                     '.$row["Ten_SanPham"].'
                                 </div>
                               <div class="item-price">
                               '.$row["Gia"].' đ
                               </div>
                               <button class="add-to-card">
                                   Đặt hàng
                               </button>
                             </div>
                         
                   </div>
               </a>';
                 }
             }
             ?>
                    
					 </div>
            </div>
        </div>
		<hr width="50%" align="center" color="#AAAAAA" />
		 <h1>NƯỚC ÉP-TRÀ</h1>
        <div id="main">
            <div id="left">
                <div class="grid-container">
                <?php
             $sql_our = "select * from tbl_sanpham where Ma_DanhMuc = 2;";
             $our = mysqli_query($conn, $sql_our);
             if (mysqli_num_rows($our) > 0) {
                 while ($row = mysqli_fetch_assoc($our)) {
                     echo '<a href="#">
                     <div class="grid-item">
                         
                             <img class="productimg" src="admin/'.$row["AnhSP"].'">
                             <div>
                                 <div class="item-name">
                                     '.$row["Ten_SanPham"].'
                                 </div>
                               <div class="item-price">
                               '.$row["Gia"].' đ
                               </div>
                               <button class="add-to-card">
                                   Đặt hàng
                               </button>
                             </div>
                         
                   </div>
               </a>';
                 }
             }
             ?>
                   
                </div>
            </div>
        </div>
			<br>
			<!-- bố cục của phần liên kết -->
	<div class="lienket">
		<p>THÔNG TIN KHUYẾN MẠI</p>
		<a href="#"><img src="./img/lk.jpg" class="img1"></a>
		<a href="#"><img src="./img/lk3.jpg" class="img2"></a>
		</div>
		 <br>
    <button class="hide">Xem Thêm</button>
    <button class="show">Ẩn</button> <br>
    <div class="main">
        <ul>
            <li><a href="#">SIÊU ƯU ĐÃI THÁNG 10 - ĐỒNG GIÁ 19K CHO TRÀ SIZE S</a></li>
            <li><a href="#">Order online giá siêu sốc - Lại thêm freeship</a></li>
            <li><a href="#">GOVIET GIẢM ĐẾN 50% TOÀN MENU</a></li>
            <li><a href="#">TRẢI NGHIỆM ORDER ONLINE VỚI ƯU ĐÃI SIÊU SỐC !!! - KÈM THÊM FREESHIP</a></li>
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('.main')
.css({
    color: '#FF0000',
    fontSize: "20px",
});
  $('.show').click(function(){
    $('.main').hide(2000);
  });
  $('.hide').click(function(){
    $('.main').show(2000);
  });
</script>
<br> 
		<!-- bố cục của phần footer -->
	<div class="footer">
		<div class="footer1">
			<h3>&#128315; Chính Sách</h3>
			<p><a href="#"> &#127963; Chính sách giao hàng</a></p>
			<p><a href="#">&#127973; Chính sách thanh toán</a></p>
			<p><a href="#"> &#128203; Chính sách vận chuyển</a></p>
			<p><a href="#">&#128106; Khách hàng thân thiết</a></p>
		</div>
		<div class="footer2">
			<h3> &#128315; Liên Hệ</h3>
			<p><a href="#">&#128231; Email:</i> pandatea01@gmail.com</a></p>
			<p><a href="#">&#128222; Hotline</i>	0123456789</a></p>
			<p><a href="#">&#127968; Địa Chỉ: </i> 56 Lê Văn Hiến - Bắc Từ Liêm - Hà Nội</a></p>
		</div>
		<div class="footer3">
			<h3> &#128315; Sản Phẩm</h3>
			<p>&#128102;<a href="">Cà Phê Việt</a></p>
			<p>	&#127854;<a href=""> Cà Phê</a></p>
			<p>	&#127863;<a href=""> Nước Ép - Trà</a></p>
			<p>&#127865;<a href=""> Sinh Tố</a></p>
		</div>
	</div>
	<script type="text/javascript" src="./js/1.js"></script>
	
</body>
</html>