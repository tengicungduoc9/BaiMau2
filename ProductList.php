<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 style="margin-top: 25px">Danh sách sản phẩm</h2>
        <a href="insertForm.php" class="btn btn-primary mt-3">Thêm sản phẩm</a>
        <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Số lượng</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        require_once("connection.php");
        $result = $conn->query("SELECT id, masp, tensp, anhsp, soluong, CASE WHEN trangthai = 0 THEN N'Còn hàng' ELSE N'Hết hàng' END AS trangthai FROM sanpham");
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['masp']."</td>";
            echo "<td>".$row['tensp']."</td>";
            echo "<td><img src='".$row["anhsp"]."' class='img-thumbnail' style='width: 80px; height: 80px' /></td>";
            echo "<td>".$row['soluong']."</td>";
            echo "<td>".$row['trangthai']."</td>";
            echo "<td>
        <a href='updateForm.php?id=".$row['id']."' class='btn btn-warning'>Sửa</a>
        <a onclick=\"return confirm('Bạn có muốn xoá học sinh này không?');\"
           href='delete.php?id=".$row['id']."' class='btn btn-danger'>Xoá</a>
      </td>";

        }
      ?>
    </tbody>
  </table>
    </div>
</body>
</html>