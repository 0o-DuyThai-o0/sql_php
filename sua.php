<?php
    require "sql.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style>
        b{
            color:  red;
        }
    </style>
</head>
<body>
<?php
    if(isset($_GET["id"])){
        $id = $_GET['id'];
    }
?>

<?php 
        if(isset($_POST['fix'])){
            $name =  $_POST['name'];
            $url =  $_POST['url'];
            $mssv=  $_POST['mssv'];
            $img =  $_POST['img'];
            $web =  $_POST['web'];
            $time =  $_POST['time'];
            if($name !='' && $url !='' && is_numeric($mssv)){
                $sql =  "UPDATE sinhvien SET name='$name', url='$url', mssv='$mssv', img='$img', web='$web', time='$time' where id = $id";
                $qrs =  mysqli_query($conn,$sql);
                header("location: index.php");
                echo "<script>alert('Sửa thành công !');</script>";
            }
            else{
                "<script>alert('Sửa thất bại !');</script>";
            }

        }
?>

<?php
    $sql="SELECT * FROM sinhvien where id=$id";
    $qrs= mysqli_query($conn,$sql);
    $rows = mysqli_fetch_array($qrs);
?>  

<div class="container">
        <h1>Sửa Sinh viên</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Tên sinh viên <b>*</b></label>
                <input name="name" class="form-control" value="<?php echo $rows['name']; ?>">
            </div>

            <div class="form-group">
                <label for="url">Url <b>*</b></label>
                <input name="url" class="form-control" value="<?php echo $rows['url']; ?>">
            </div>

            <div class="form-group">
                <label for="mssv">Mã số sinh viên <b>*</b></label>
                <input name="mssv" class="form-control" value="<?php echo $rows['mssv']; ?>">
            </div>

            <div class="form-group">
                <label for="img">ảnh</label>
                <input name="img" class="form-control" value="<?php echo $rows['img']; ?>">
            </div>

            <div class="form-group">
                <label for="web">Web</label>
                <input name="web" class="form-control" value="<?php echo $rows['web']; ?>">
            </div>

            <div class="form-group">
                <label for="time">Time <b>*</b></label>
                <input type="date"  name="time" class="form-control" value="<?php echo $rows['time']; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="fix">Sửa</button>
            <button><a href="index.php">về trang chủ</a></button>
        </form>
    </div>
</body>
</html>