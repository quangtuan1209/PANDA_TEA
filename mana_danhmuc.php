<?php
    require("../config/connect.php");
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

    //thêm mới dữ liệu
    if(isset($_POST["insert"])){
        //khai báo biến thực hiện câu truy vấn sql insert data
        $sql_insert = "insert into tbl_danhmuc(Ten_DanhMuc,TrangThai) values(N'".$_POST["tendm"]."',1)";
        if(mysqli_query($conn, $sql_insert)){
            echo "thêm mới dữ liệu thành công";
            //tránh insert lặp dữ liệu
            header("Location:mana_danhmuc.php");
        } else{
            echo "thất bại". mysqli_error($conn);
        }
    }
    //delete dữ liệu theo mã
    //kiểm tra xem thao tác của người dùng có pải là update hay k
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $ma_dm = $_GET["id"];
        //khởi tạo câu lệnh xóa dữ liệu
        $sql_delete = "delete from tbl_danhmuc where Ma_DanhMuc = ".$ma_dm;
        if(mysqli_query($conn,$sql_delete)){
            echo "xóa dữ liệu thành công";
        }else{
            echo "xóa dữ liệu thất bại". mysqli_error($conn);
        }
    }
    
    //cập nhật
    if(isset($_POST["btn_update"]))
    {
        $sql_update = "update tbl_danhmuc set Ten_DanhMuc = N'".$_POST["update"]."' where Ma_DanhMuc = " . $_POST["id_dm"];
        if(mysqli_query($conn,$sql_update))
            echo "Cập nhật thành công";
        else
            echo "Cập nhật thất bại " . mysqli_error($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Demo_php</title>
</head>
<body style="background-color: #60FF8D">
    <div class="container">
        <h1>Trang quản trị danh mục</h1>
    <!-- insert -->
        <div class="row">
            <form action="mana_danhmuc.php" method="post">
                <input type="text" name="tendm">
                <input type="submit" name="insert" value="Thêm mới">
            </form>
        </div>
    <!-- hiển thị và thao tác với dữ liệu -->
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã danh mục</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                //khởi tạo biến lưu chuỗi truy vấn dữ liệu
                    $sql_select = "select * from tbl_danhmuc order by Ma_DanhMuc DESC";
                    //đổ dữ liệu sau khi truy vấn vào kết quả
                    $ketqua = mysqli_query($conn, $sql_select);
                    //kiểm tra xem kết quả có dữ liệu hay k
                    if(mysqli_num_rows($ketqua)>0){
                        while ($row = mysqli_fetch_assoc($ketqua)){
                            echo "<tr>";
                            echo "<td>".$row["Ma_DanhMuc"]."</td>";
                            if(isset($_GET["task"]) && $_GET["task"] == "update"){
                                if($_GET["id"] == $row["Ma_DanhMuc"]){
                                    echo "<form action='mana_danhmuc.php' method='post'><td>";
                                    echo "<input type='text' name='update' value = '".$row["Ten_DanhMuc"]."'>";
                                    echo "</td>";
                                    echo "<input type='hidden' name='id_dm' value='".$row["Ma_DanhMuc"]."'>";
                                    echo "<td>".$row["TrangThai"]."</td>";
                                    echo "<td>";
                                    echo "<input type='submit' name='btn_update' value='Cập nhật' class='btn btn-primary'>";
                                    echo "</td></form>";
                                }else{
                                    echo "<td>".$row["Ten_DanhMuc"]."</td>";
                                    echo "<td>".$row["TrangThai"]."</td>";
                                    echo "<td><a href='mana_danhmuc.php?task=update&id=".$row["Ma_DanhMuc"]."' class='btn btn-warning'>Cập nhật</a>
                                    <a href='mana_danhmuc.php?task=delete&id=".$row["Ma_DanhMuc"]."' class='btn btn-danger'>Xóa</a></td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<td>".$row["Ten_DanhMuc"]."</td>";
                                echo "<td>".$row["TrangThai"]."</td>";
                                echo "<td><a href='mana_danhmuc.php?task=update&id=".$row["Ma_DanhMuc"]."' class='btn btn-warning'>Cập nhật</a>
                                <a href='mana_danhmuc.php?task=delete&id=".$row["Ma_DanhMuc"]."' class='btn btn-danger'>Xóa</a></td>";
                                echo "</tr>";
                            }
                        }
                    }else{
                        echo "bảng k chứa dữ liệu";
                    }
                ?>
                </tbody>
            </table> 
        </div>
    </div>
</body>
</html>