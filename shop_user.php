<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
        <div class="title">
        <h2 id="title">AliExp</h2>
        </div>
        <div class="shop">
            <ul>
                <li><i class="fa-solid fa-gauge"><br><a href="dashboard_user.php" style="text-decoration: none;"> Dashboard</a></i></li>
                <li class="active"><center> <a href="shop_user.php"><i class="fa-solid fa-cart-shopping"></i><br>   shop</a></center></li>
                <li><i class="fa-solid fa-user"></i><br><h3><?php  ; echo  $_SESSION['name'];?></h3></li>
                <li style="display: flex; align-items: center;"><a href="log out.php">Log out</a></li>
            </ul>
            
        </div>
        <style>
             .title h2{
                background-color: yellowgreen;
                padding: 8px 20px;
                border-radius:  40px 0 ;
                font-family: sans-serif;
                letter-spacing: 1px;
                cursor: pointer;
            }
            ul li , ul li a , ul li center , ul li center a , ul li center a i{
                color: black;
                transition: all .3s linear;
            }

            ul li:hover, ul li a:hover , ul li center:hover , ul li center a:hover , ul li center a i:hover{
                color: white;
            }

            ul li{
                padding: 20px;
                background-color: beige;
                border-radius: 5px;
                box-shadow: 1px 1px 4px black;
                cursor: pointer;
                text-align: center;
                align-items:center;
                transition: all .3s linear;
                font-family: monospace;
                letter-spacing: 1px;
            }
            ul li:hover{
                background-color: rgb(104, 104, 101);
            }

            .shop{
                display: flex;   
            }
           .shop a{
            margin: 0 10px 0 2px;
            text-decoration: none;
            font-weight: bold;
            }

            .active{
                background-color: red;
            }
        </style>
    </header>
    
    <main>
    <?php 
require_once 'conn_db.php';


$user_id = $_SESSION['user_id'];

// Requête principale pour récupérer les produits de l'utilisateur
$res = mysqli_query($conn, "SELECT * FROM product 
    WHERE id IN (
        SELECT id_product 
        FROM product_user 
        WHERE id_user = $user_id
    )ORDER BY id");

while ($row = mysqli_fetch_array($res)) {
    $product_id = $row['id'];
    $price = $row['price'];
    $name = $row['name'];
    $image = $row['image'];

    // Calcul du nombre de fois que ce produit a été ajouté par l'utilisateur
    $count_res = mysqli_query($conn, "SELECT COUNT(*) as total 
        FROM product_user 
        WHERE id_user = $user_id AND id_product = $product_id");
    
    $count_row = mysqli_fetch_assoc($count_res);
    $quantity = $count_row['total'];
    $total_price = $quantity * $price;

    echo "
    <table border='1'>
        <thead>
            <tr>
                <th width='200px'>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
    <tr>
            <td>
                <div class='image'>
                    <img src='image/$image' width='80'>
                </div>
            </td>
            <td>
                <div class='title1'>
                    $name
                </div>                                           
            </td>
            <td>
                <div class='price'>
                    $price $
                </div>
            </td>
            <td>
                $total_price $
            </td>
          </tr>";
}

echo "  </tbody>
      </table>";
?>


</main>
</body>

<style>
    table{
        text-align: center;
    }
    table thead , table tbody td {
        text-align: center;
    }
    main{
        margin: 150px auto 0 auto;
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 80%;
        height: fit-content;
        gap: 10px;
    }
    .product{
        width: 300px;
        height: 200px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color:rgba(85, 168, 231, 0.41);
        padding: 10px;
        transition: all .3s linear;
    }

    .product:hover{
        box-shadow: 1px 1px 3px black;
        transform: translateY(-7px);
    }


    .image{
        width: 150px;
        background-position: cover;
        margin: 0 auto;
    }
    .image img{
        width: 150px;
        height: 100%;
        background-position: cover;
    }

    .title1{
        width: 100%;
        font-weight: bold;
        font-family: monospace;
        height: 10%;
        text-align: center;
        background: linear-gradient(to left ,  #751e5b ,  #812fb0 ) ;
        color: white;
      
    }
    .price{
        width: 100%;
        font-weight: bold;
        font-family: monospace;
        height: 10%;
        text-align: center;
        background: linear-gradient(to left ,   #9e58f3  ,  #7c41fa  );
        color: white;
        line-height: -20px;
        
    }

    .add_card{
        
        padding: 4px 0;
        color: white;
        background-color:  #55cfe7  ;
        border: none;
        outline: none;
        transition: all .3s linear;
        margin-bottom: 10px;
        cursor: pointer;
        text-decoration: none;
        
    }
/* end product */

    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    body{
        display: flex;
        flex-wrap: wrap;
        height: 100vh;
    }
    header{
        width: 100vw;
        height: 20%;
        display: flex;
        justify-content: space-between;
        background-color: gold;
        align-items: center;
        padding: 0 10px;
        position: fixed;
        box-shadow: 2px 0 6px black;
        z-index: 99;
    }

    header ul{
        display: flex;
    }
    header ul li{
        list-style: none;
        margin: 0 4px;
        font-weight: bold;
    }

</style>


<script>
    let title = document.getElementById("title");
    title.addEventListener('click' , () => {
        window.location.href = 'dashboard_user.php';
    });
</script>

</html>