<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <header>
        <div class="title">
        <h2 id="title">AliExp</h2>
        </div>
        <div class="shop">
            <ul>
                <li><i class="fa-solid fa-cart-shopping"></i> <a href="shop_user.php">shop</a></li>
                <li><i class="fa-solid fa-user"></i><br><h3><?php  ; echo  $_SESSION['name'];?></h3></li>
                <li><a href="log out.php">Log out</a></li>
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

            ul li {
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
        </style>
    </header>

    <main>
        <?php 
        require_once 'conn_db.php';
            $user_id = $_SESSION['user_id'] ;
        $res = mysqli_query($conn ,"SELECT * FROM product ORDER BY id;" );
        while($row = mysqli_fetch_array($res)){
            
            echo "
            <div class='product'>
                <div class='image'>
                    <img src='image/$row[image]'>
                </div>
                <div class='title1'>
                    $row[name]
                </div>
                <div class='price'>
                    $row[price]$
                </div>
                    <div class='add_card'>
                   <center> <a  href='insert_card.php?id=$row[id]&user= $user_id' >
                        ADD To Card
                    </a></center>
                    </div>

            </div>
            ";
        }
        ?>
    </main>

</body>
<style>
    main{
        margin-top: 140px;
        display: flex;
        justify-content: center;
        height: fit-content;
        flex-wrap: wrap;
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
        width: 300px;
        height: 60%;
        background-position: cover;
    }
    .image img{
        width: 280px;
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

    .add_card:hover{
        background-color:rgb(35, 93, 105)  ;
        letter-spacing: 1px;
    }

    .product .add_card a{
        text-decoration: none;
        text-align: center;
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
        z-index: 99;
        box-shadow: 2px 0 6px black;
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