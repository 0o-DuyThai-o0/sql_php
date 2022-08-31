<?php
    require "sql.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

    <style>

    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    if(isset($_GET['page_layout'])){
        switch($_GET['page_layout']){
            case 'danhsach':
                require_once 'index.php';
                break;
            case 'them':
                require_once 'them.php';
                break;
            case 'sua':
                require_once 'sua.php';
                break;
            case 'xoa':
                require_once 'xoa.php';
                break;
            default:
                require_once 'index.php';
                break;
        }
    }
    else{
        require_once 'index.php';
    }
    ?>

    <?php
        $sql="SELECT * FROM sinhvien";
        $query= mysqli_query($conn,$sql);
    ?>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card1">
                <div class="card-header">
                    <h2>Danh sách sinh viên</h2>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>url</th>
                                <th>mssv</th>
                                <th>img</th>
                                <th>web</th>
                                <th>time</th>
                                <th><a href="them.php">Thêm</a></th>
                                <th>sửa</th>
                                <th>xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $i=1;
                                while($row  = mysqli_fetch_assoc($query)){ ?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['url']?></td>
                                        <td><?php echo $row['mssv']?></td>
                                        <td><?php echo $row['img']?></td>
                                        <td><?php echo $row['web']?></td>
                                        <td><?php echo $row['time']?></td>
                                        <td><a href="them.php">Thêm</a></td>
                                        <td><a href="sua.php?page_layout=sua&id=<?php echo $row['id']?>">Sửa</a></td>
                                        <td><a onclick = "return Del('<?php echo $row['name'];?>')" href="xoa.php?page_layout=sua&id=<?php echo $row['id']?>">Xóa</a></td>
                                    </tr>           
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function Del(name){
            return confirm("Bạn có chắc muốn xóa sinh viên " +name+" ?")
        }
    </script>
</body>
</html>