<?php
require_once 'conn_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['name'] ?? '';
    $product_price = $_POST['price'] ?? '';

    echo "<pre>";
    print_r($_FILES);
    echo "<pre>";




    $image = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = 'image/'.$image_name;
    
    $sql = mysqli_query($conn , "INSERT INTO product (name , price , image) VALUES ('$product_name' , '$product_price' , '$image_name')");
    if(move_uploaded_file($image_location , 'image/'.$image_name)){
        echo "imge inserted";

    }else{
        echo "image not inserted";
    }


}
?>
