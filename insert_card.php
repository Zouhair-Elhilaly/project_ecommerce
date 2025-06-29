<?php

require_once 'conn_db.php';

if($_SERVER['REQUEST_METHOD'] == 'GET')

$id = $_GET['id'];
$user_id = $_GET['user'];

$sql = "INSERT INTO product_user(id_user,id_product) VALUES($user_id , $id);";
$res = mysqli_query($conn , $sql);
if($res){
   echo "inserted";
}else{
    echo "not inserted";
};


?>