<?php 
    include("../../config/connection.php"); 
    if (isset($_GET['id'])) {
        $ID_Phanhoi=$_GET['id'];
        $Trangthai=1;
    $sql_Phanhoi="UPDATE phanhoi SET Trangthai='".$Trangthai."' WHERE  
        Id=$ID_Phanhoi";
        mysqli_query($mysqli,$sql_Phanhoi);
        header('location: ../../index.php?feedback=list-feedback');
    }
?>