<?php
    require_once("connection.php");
    $id = $_GET["id"];
    $result = $conn->query("SELECT masp, tensp, anhsp, soluong, CASE WHEN trangthai = 0 THEN N'Còn hàng' ELSE N'Hết hàng' END AS trangthai FROM sanpham WHERE id = '$id'");
    $row = $result->fetch_assoc()
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1.0, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="mb-3 mt-3">Form sửa thông tin sản phẩm</h2>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
            <input type="hidden" name="anhcu" id="anhcu" value="<?php echo $row["anhsp"] ?>">
            <div class="form-group mb-3">
                <label for="masp" class="form-label">Mã sản phẩm</label>
                <input type="text" name="masp" id="masp" class="form-control" value="<?php echo $row["masp"] ?>" readonly style="color: #514A4A">
            </div>
            <div class="form-group mb-3">
                <label for="tensp" class="form-label">Tên sản phẩm</label>
                <input type="text" name="tensp" id="tensp" class="form-control" value="<?php echo $row["tensp"] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="anhsp" class="form-label">Ảnh sản phẩm</label>
                <input type="file" name="anhsp" id="anhsp" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="number" name="soluong" id="soluong" class="form-control" value="<?php echo $row["soluong"] ?>">
            </div>
            <div class="form-group mb-3">
            <fieldset class="form-group mb-3">
  <legend>Trạng thái</legend>
  <label for="còn-hàng">
    <input type="radio" name="trangthai" id="còn-hàng" value="0" checked="checked">
    Còn hàng
  </label>
  <label for="hết-hàng">
    <input type="radio" name="trangthai" id="hết-hàng" value="1">
    Hết hàng
  </label>
</fieldset>
            </div>
            <button class="btn btn-primary">Sửa</button>
        </form>
    </div>
</body>
</html>