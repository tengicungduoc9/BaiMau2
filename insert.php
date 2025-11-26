<?php
    require_once("connection.php");
    $luuAnh = "uploads/";
    if  (!file_exists($luuAnh)) {
        mkdir($luuAnh, 0777, true);
    }
    $anh = "";
    if ($_FILES["anhsp"]["name"] != "") {
        $anh = $luuAnh.time()."_".basename($_FILES["anhsp"]["name"]);
        move_uploaded_file($_FILES["anhsp"]["tmp_name"], $anh);
    }
    $masp = $_POST["masp"];
    $tensp = $_POST["tensp"];
    $soluong = $_POST["soluong"];
    $trangthai = $_POST["trangthai"];
    $query = "INSERT INTO sanpham (masp, tensp, anhsp, soluong, trangthai) VALUES ('$masp', '$tensp', '$anh', '$soluong', '$trangthai')";
    if ($conn->query($query) === TRUE) {
        echo "<script>
            alert('Thêm sản phẩm thành công!');
            window.location = 'ProductList.php';
        </script>";
    } else {
        echo "<script>
            alert('Thêm sản phẩm thất bại!');
            window.location = 'ProductList.php';
        </script>";
    }
?>