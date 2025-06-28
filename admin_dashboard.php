<?php

require_once 'conn_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['name'] ?? '';
    $product_price = $_POST['price'] ?? '';

    $image = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = 'image/'.$image_name;
    
    $sql = mysqli_query($conn , "INSERT INTO product (name , price , image) VALUES ('$product_name' , '$product_price' , '$image_name')");
    if(move_uploaded_file($image_location , 'image/'.$image_name)){
       header("location: image_data.php");
    }else{
        ?>
        <script>alert("Not Inserted successfully")</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style_admin.css">
</head>
<body>
    <div class="global">
        <header>
            <div class="div">
            <h2>Dashboard</h2>
            <div class="image">
                <img src="../image.jpg" >
                <span>Welcome </span>     <!-- < ? p hp echo $_SESSION['name']; ?> -->
            </div>
            <div class="link">
                <ul>
                    <li class="link1 active">Home</li>
                    <li class="link3" id="link1" ><i class="fa-solid fa-store"></i> <a href="image_data.php" style="text-decoration: none ; font-weight: bold;">My Shop</a></li>
                    <li class="link4" id="link2">Log Out</li>
                </ul>
            </div>
            </div>
            <div class="setting">
                <span  id="setting"><i class="fa-solid fa-gear"></i>Setting</span>
            </div>
        </header>
        <main>
        <form  class="form" action="admin_dashboard.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <img src="image/images.jpg" alt="">
             <center><h2>Enter New Product</h2></center>
            <input type="text" name="name" id="" placeholder="Name Product...">
            <input type="number" name="price" id="" placeholder="Price Product...">
            <input type="file" name="image" id="" placeholder="Name Product:">
            <input type="submit" value="Add Product">
        </form>
        </main>
    </div>

    <script src="main1_admin.js"></script>
</body>
</html>