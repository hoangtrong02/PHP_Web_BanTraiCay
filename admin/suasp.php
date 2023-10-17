<?php
    $proid = $_GET['proid'];
    
    require_once './connect.php';
    
    //lay thong tin trong csdl
    $edit = "SELECT * FROM products WHERE proid='$proid'";
    $result = mysqli_query($conn,$edit);
    $row = mysqli_fetch_assoc($result);
?>
<?php
if(isset($_POST['btnupdate'])){
    //nhan du lieu tu form
    $proid = $_POST['proid'];
    $proname = $_POST['proname'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $price = $_POST['price'];
    $mota = $_POST['mota'];

    //ket noi csdl
    require_once './connect.php';
    
    //lenh update du lieu sql
    $update = "UPDATE products SET proname = '$proname', image = '$image', price = '$price', mota = '$mota' WHERE proid = '$proid'";

    //thuc thi
    mysqli_query($conn,$update);
    move_uploaded_file($image_tmp, '../assets/img/product/'.$image);
    header("Location: quanlysanpham.php");
}
?>

<!-- hien thi len form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit</title>
</head>
<body>
    
    <div class="container">
    <form action="suasp.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="proid" value="<?php echo $proid; ?>" id="">
        <div class="form-group">
            <label for="usn">Tên sản phẩm:</label>
            <input type="text" name="proname" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $row['proname']; ?>" required>
        </div>
        <div class="form-group">
            <label for="usn">Hình ảnh:</label>
            <input type="file" name="image" class="form-control" value="<?php echo $row['image']; ?>">
        </div>
        <div class="form-group">
            <label for="usn">Giá:</label>
            <input type="text" name="price" class="form-control" placeholder="Giá bán" value="<?php echo $row['price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mô tả chi tiết:</label>
            <input type="text" name="mota" class="form-control" placeholder="Thêm mô tả" value="<?php echo $row['mota']; ?>" required>
        </div>
        <button type="submit" name="btnupdate" class="btn btn-primary">Cập nhật</button>
    </form>
    </div>
</body>
</html>