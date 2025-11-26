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
    $id = $_POST["id"];
    $masp = $_POST["masp"];
    $tensp = $_POST["tensp"];
    $anhcu = $_POST["anhcu"];
    $soluong = $_POST["soluong"];
    $trangthai = $_POST["trangthai"];
    if ($anh == "") {
        $anh = $anhcu;
    } else {
        unlink($anhcu);
    }
    $query = "UPDATE sanpham SET masp = '$masp', tensp = '$tensp', anhsp = '$anh', soluong='$soluong', trangthai='$trangthai' WHERE id='$id' ";
    if ($conn->query($query) === TRUE) {
        echo "<script>
            alert('Sửa sản phẩm thành công!');
            window.location = 'ProductList.php';
        </script>";
    } else {
        echo "<script>
            alert('Sửa sản phẩm thất bại!');
            window.location = 'ProductList.php';
        </script>";
    }
?>