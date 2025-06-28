<?php

require_once 'conn_db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];

    $sql = "INSERT INTO user(name , email , password , age) VALUES('$name' , '$email' , '$password' , '$age');";

    if($conn->query($sql)){
        ?> <script>alert('you are signin welcome home');</script>
        <?php
        header("location: index.php");
    }else{
        echo "not signin";
    }

}


?>