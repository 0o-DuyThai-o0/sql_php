<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style>
        b{
            color:  red;
        }
    </style>
</head>
<body>
    <?php require_once 'sql.php' ?>
    <?php 
        if(isset($_POST['add'])){
            $name =  $_POST['name'];
            $url =  $_POST['url'];
            $mssv=  $_POST['mssv'];
            $img =  $_POST['img'];
            $web =  $_POST['web'];
            $time =  $_POST['time'];
            if($name !='' && $url !='' && is_numeric($mssv)){
                if($conn -> query("INSERT INTO sinhvien (name,url,mssv,img,web,time) VALUES (N'$name',N'$url',N'$mssv',N'$img',N'$web',N'$time')")){
                    echo "<script>alert('Thêm thành công !');</script>";
                }
                else{
                    echo "<script>alert('Thêm thất bại !');</script>";
                }
            }
            else{
                echo "<script>alert('Thêm thất bại !');</script>";
            }

        }

            $conn->close();
    ?>

    <div class="container">
        <h1>Thêm Sinh viên</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Tên sinh viên <b>*</b></label>
                <input name="name" class="form-control" placeholder="Tên sinh viên">
            </div>

            <div class="form-group">
                <label for="url">Url <b>*</b></label>
                <input name="url" class="form-control" placeholder="Url">
            </div>

            <div class="form-group">
                <label for="mssv">Mã số sinh viên <b>*</b></label>
                <input name="mssv" class="form-control" placeholder="Mã sinh viên">
            </div>

            <div class="form-group">
                <label for="img">ảnh</label>
                <input name="img" class="form-control" placeholder="Ảnh">
            </div>

            <div class="form-group">
                <label for="web">Web</label>
                <input name="web" class="form-control" placeholder="Web">
            </div>

            <div class="form-group">
                <label for="time">Time <b>*</b></label>
                <input type="date"  name="time" class="form-control" placeholder="Time">
            </div>

            <button type="submit" class="btn btn-primary" name="add">Thêm</button>
            <button><a href="index.php">về trang chủ</a></button>
        </form>
    </div>
</body>
</html>