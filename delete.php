<?php
    require_once("connection.php");
    $id = $_GET["id"];
    $sql = "SELECT anhsp FROM sanpham WHERE id = '$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $anh = $row["anhsp"];
    if (!empty($anh) && file_exists("$anh")) {
        unlink("$anh");
    }

    $query = "DELETE FROM `sanpham` WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>
            alert('Xóa sản phẩm thành công!');
            window.location = 'ProductList.php';
        </script>";
    } else {
        echo "<script>
            alert('Xóa sản phẩm thất bại!');
            window.location = 'ProductList.php';
        </script>";
    }
?>