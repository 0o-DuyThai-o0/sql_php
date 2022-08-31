<?php
    require "sql.php";
?>

<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM sinhvien where id = $id";
    $query = mysqli_query($conn,$sql);
    header('location: index.php')
?>