<?php

require_once 'conn_db.php';

if($_SERVER['REQUEST_METHOD'] == 'GET')

$id = $_GET['id'];
$user_id = $_GET['user'];

$sql = "INSERT INTO product_user(id_user,id_product) VALUES($user_id , $id);";

if(mysqli_query($conn , $sql)){
    ?>
    <script>alert("inserted successfully");</script>
    <?php
};


?>