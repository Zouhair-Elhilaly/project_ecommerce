<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <header>
    <center><h2><b style="color: white">All Product Shere on Web Site</b></h2>
    </center>
   </header>
   <?php

require_once 'conn_db.php';

$result = mysqli_query($conn , "SELECT * FROM product;");

while($row = mysqli_fetch_array($result)){
    echo "
<div class='global'>
        <div class='image'><img src='image/$row[image]'  width='200' height='200'></div>
        <div class='title'>$row[name]</div>
        <div class='price'>$row[price]</div>
    <div class='button'>
        <a href='delete.php?id=$row[id]'  class='delete' >Delete</a>
        <a href='image_data.php?id=$row[id]' onclick='form' class='update'>Update</a>
   </div>
        
   </div>
    
    ";
}
?>

<?php
// Assurez-vous d'avoir une connexion active à la base de données avant cette partie
require_once 'conn_db.php'; // Exemple

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécuriser l’ID
    $res = mysqli_query($conn, "SELECT * FROM product WHERE id = $id"); // Une seule égalité =

    if ($row1 = mysqli_fetch_assoc($res)) { // mysqli_fetch_assoc au lieu de fetch_array si on n’a besoin que des noms de colonnes
        ?>

        <form class='form' action='admin_dashboard.php' method='POST' enctype='multipart/form-data' autocomplete='off'>
            <h2 class='x'><b id='x'>X</b></h2>
            <center><h2><b>Update this product</b></h2></center>

            <!-- Ajouter un champ caché pour l'ID -->
            <input type='hidden' name='id' value='<?php echo htmlspecialchars($row1['id']); ?>' >

            <label>Nom du produit :</label>
            <input type='text' name='name' value='<?php echo htmlspecialchars($row1['name']); ?>' required>

            <label>Prix :</label>
            <input type='number' name='price' value='<?php echo htmlspecialchars($row1['price']); ?>' step='0.01' required>

            <label>Image (re-sélectionner si nécessaire) :</label>
            <input type='file' name='image' accept='image/*'>

            <input type='submit' name='update_product' value='Modifier le produit'>
        </form>

        <?php
    } else {
        echo "Produit introuvable.";
    }
}
?>

      


<script src="image_data.js" ></script>
</body>
</html>

<style>
.x{
    margin-top: -160px;
    padding:0;
    float: left;
    display: flex;
    justify-content: end;
    cursor: pointer;
    font-family: monospace;
    font-size: 20px;
}


.x:hover{
    transform: scale(1.01 , 1.01);
    text-shadow: 1px 1px 3px white;
}

    .form{
        display: flex;
        flex-direction: column;
        width: 400px;
        height: 400px;
        padding: 20px;  
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50% , -50%);
        background: linear-gradient(to bottom right ,  #1b7d93 ,  #813af5 ) ;
        justify-content: center;
        border-radius: 20px;
    }

    .form input{
        margin: 4px 0;
    }


    body{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        background-color: gray;
    }
    header{
        width: 100vw;
        height: 100px;
        position: fixed;
        top: 0;
        background-color:  #c83af5 ;
        color: gray;
        box-shadow: 2px 2px 5px black ;
    }
    .global{
        width: 300px;
        height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 2px solid black;
        margin: 10px;
        text-align: center;
        margin-top: 100px;
    }
    .image{
        width: 300px;
        height: 60%;
        background-position: cover;
    }
    .image img{
        width: 300px;
        height: 100%;
        background-position: cover;
    }

    .title{
        width: 100%;
        font-weight: bold;
        font-family: monospace;
        height: 20%;
        text-align: center;
        background: linear-gradient(to left ,  #751e5b ,  #812fb0 ) ;
        color: white;
    }
    .price{
        width: 100%;
        font-weight: bold;
        font-family: monospace;
        height: 20%;
        text-align: center;
        background: linear-gradient(to left ,   #9e58f3  ,  #7c41fa  );
        color: white;
        line-height: -20px;
    }
    .button{
        width: 300px;
        height: 40px;
        align-items: center;
        background-color: yellow
    }
    .button > a{
        width: 140px;
        margin: 0 auto;
        text-decoration : none
    }

    .button .delete{
        width: 140px;
        padding: 4px; 
        background-color: red;
        color: white;
    }

    .button .update{
        width: 140px;
        padding: 4px; 
        background-color: green;
        color: white;
    }

</style>