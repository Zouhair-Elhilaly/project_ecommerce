<?php

require_once 'conn_db.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $ID = $_GET['id'];
    $res = mysqli_query($conn , "DELETE FROM product WHERE id = $ID");
    if($res){
        header("location:image_data.php");
        exit;
    }else{
        echo "no";
    }
}


?>