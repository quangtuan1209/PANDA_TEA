<?php
require("../config/connect.php");
//note:kiểm tra tất cả các trang
session_start();
if (isset($_GET["task"]) && $_GET["task"] == "logout") {
    session_unset();
}
if (!$_SESSION) {
    header("location:login.php");
} else {
    echo "Xin chào: " . $_SESSION["username"];
    echo "<a style='margin:10px' href='login.php?task=logout'>Đăng xuất</a>";
    echo "<a style='margin:10px' href='mana_danhmuc.php'>Quản Trị Danh Mục</a>";
    echo "<a style='margin:10px' href='product.php'>Thêm Sản Phẩm</a>";
    echo "<a style='margin:10px' href='pro.php'>Quản Trị Sản Phẩm</a>";
}

//delete dữ liệu theo mã
//kiểm tra xem thao tác của người dùng có pải là update hay k
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $id_sanpham = $_GET["id"];
    //khởi tạo câu lệnh xóa dữ liệu
    $sql_delete = "delete from tbl_sanpham where Ma_SanPham = " . $id_sanpham;
    if (mysqli_query($conn, $sql_delete)) {
        echo "Xóa dữ liệu thành công";
    } else {
        echo "Xóa dữ liệu thất bại" . mysqli_error($conn);
    }
}
//cập nhật
if (isset($_POST["btn_update"])) {
    //lấy thông tin hình ảnh và upload
    $target_dir = "uploads/";
    //đường dẫn file đồng thời sẽ lưu đường dẫn này vào csdl
    $target_file = $target_dir . basename($_FILES["hinhanh-update"]["name"]);
    //lấy ra thành phần mở rộng của tệp tin như pdf, docx, jpg
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg") {
        echo "File của bạn không phải ảnh hoặc ảnh bị trùng nhau";
    } else {
        if (move_uploaded_file($_FILES["hinhanh-update"]["tmp_name"], $target_file)) {
            echo "Cập nhật thành công";
            $sql_update = "UPDATE `tbl_sanpham` SET `Ten_SanPham`= '" . $_POST["title-update"] . "',`AnhSP`= '$target_file',`Gia`= " . $_POST["gia-update"] . ",`MoTa`= '" . $_POST["content-update"] . "',`SoLuong`= '" . $_POST["number-update"] . "' where Ma_SanPham = " . $_POST["id_sp"] . ";";
            if (mysqli_query($conn, $sql_update)) {
                header("Location:pro.php");
                echo "Cập nhật thành công";
            } else
                echo "Cập nhật thất bại " . mysqli_error($conn);
        } else {
            echo "Cập nhật file thất bại";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d3fa3cecaa.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Product</title>
</head>

<body style="background-color: #60FF8D">
    <h1 style="text-align: center;color: #000;margin-bottom:100px">Trang Quản Trị Sản Phẩm</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Ảnh Sản Phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_select = "select * from tbl_sanpham inner join tbl_danhmuc on tbl_sanpham.Ma_DanhMuc = tbl_danhmuc.Ma_DanhMuc order by Ma_SanPham DESC";
            //đổ dữ liệu sau khi truy vấn vào kết quả
            $ketqua = mysqli_query($conn, $sql_select);
            //kiểm tra xem kết quả có dữ liệu hay k
            if (mysqli_num_rows($ketqua) > 0) {
                while ($row = mysqli_fetch_assoc($ketqua)) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["Ma_SanPham"] . "</th>";
                    if (isset($_GET["task"]) && $_GET["task"] == "u") {
                        if ($_GET["id"] == $row["Ma_SanPham"]) {
                            echo "<form action='pro.php' method='post' enctype='multipart/form-data'>";
                            echo "<input type='hidden' name='id_sp' value='" . $row["Ma_SanPham"] . "'>";
                            echo "<td><input type='text' name='title-update' value = '" . $row["Ten_SanPham"] . "'></td>";
                            echo "<td><input type='file' name='hinhanh-update'></td>";
                            echo "<td><input type='number' name='gia-update' value = '" . $row["Gia"] . "'></td>";
                            echo "<td><input type='text' name='content-update' value = '" . $row["MoTa"] . "'></td>";
                            echo "<td><input type='number' name='number-update' value = '" . $row["SoLuong"] . "'></td>";
                            echo "<td>" . $row["TrangThai"] . "</td>";
                            echo '<td><select name="ma_dm">
                            <option>Chọn danh mục...</option>';
                            $sql_select1 = "select * from tbl_danhmuc";
                            //đổ dữ liệu sau khi truy vấn vào kết quả
                            $ketqua1 = mysqli_query($conn, $sql_select1);
                            //kiểm tra xem kết quả có dữ liệu hay k
                            if (mysqli_num_rows($ketqua1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($ketqua1)) {
                                    echo "<option value='" . $row1["Ma_DanhMuc"] . "'>" . $row1["Ten_DanhMuc"] . "</option>";
                                }
                            }
                            echo '</select></td>';
                            echo "<td style='width:180px'>";
                            echo "<input type='submit' name='btn_update' value='Cập nhật' class='btn btn-primary' style='margin-right:10px'>";
                            echo "<a href='pro.php' class='btn btn-danger'>Hủy</a>";
                            echo "</td>";
                            echo "</form>";
                            echo "</tr>";
                        } else {
                            echo "<td>" . $row["Ten_SanPham"] . "</td>";
                            echo "<td><img src='" . $row["AnhSP"] . "' style='max-height:100px;'/></td>";
                            echo "<td>" . $row["Gia"] . "</td>";
                            echo "<td>" . $row["MoTa"] . "</td>";
                            echo "<td>" . $row["SoLuong"] . "</td>";
                            echo "<td>" . $row["TrangThai"] . "</td>";
                            echo "<td>" . $row["Ten_DanhMuc"] . "</td>";
                            echo "<td style='width:180px'>";
                            echo "<a href='pro.php?task=u&id=" . $row["Ma_SanPham"] . "' class='btn btn-warning' style='margin-right:10px'>Cập nhật</a>";
                            echo "<a href='pro.php?task=delete&id=" . $row["Ma_SanPham"] . "' class='btn btn-danger'>Xóa</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<td>" . $row["Ten_SanPham"] . "</td>";
                        echo "<td><img src='" . $row["AnhSP"] . "' style='max-height:100px;'/></td>";
                        echo "<td>" . $row["Gia"] . "</td>";
                        echo "<td>" . $row["MoTa"] . "</td>";
                        echo "<td>" . $row["SoLuong"] . "</td>";
                        echo "<td>" . $row["TrangThai"] . "</td>";
                        echo "<td>" . $row["Ten_DanhMuc"] . "</td>";
                        echo "<td style='width:180px'>";
                        echo "<a href='pro.php?task=u&id=" . $row["Ma_SanPham"] . "' class='btn btn-warning' style='margin-right:10px'>Cập nhật</a>";
                        echo "<a href='pro.php?task=delete&id=" . $row["Ma_SanPham"] . "' class='btn btn-danger'>Xóa</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
            } else {
                echo "Bảng không chứa dữ liệu";
            }
            ?>
        </tbody>
        <!-- //md5, shd1 -->
    </table>
</body>

</html>