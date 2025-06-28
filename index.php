<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    


<form  class="form" action="check_login.php" method="POST">
     
    <input type="email" name="email" id="eamil_form" placeholder="email :"  required>
    <input type="password" class="pass" name="password" id="password_form" placeholder="password:" <?php ?> required>
    <i id="eyes" class="fa-solid fa-eye fa-eye-slash" style="position: fixed; z-index:99 ; left: 86%; top: 35%; transform: translate(-50% , -50%) ; cursor: pointer"></i>
    <input type="submit" id="submit_form" value="Login">
    <div class="rem_div">
        <input type="checkbox" name="remember me" id="rem1">
        <label for="rem">Remember me</label>
    </div>
    <a href="#form_register" id="btn_sign_up">signUp</a>

</form>


<form action="form_register.php" id="form_register" style="display: none;" method="POST">
    <h1 id="form_h1">X</h1>
    <img src="../image.jpg" id="image_form">
    <input class="input" type="text" name="name" placeholder="Enter name" required>
    <input class="input" type="number" name="age" placeholder="Enter age">
    <input class="input" type="email" name="email" placeholder="Email">
    <input class="input"  type="password" placeholder="enter password" name="password">
    <input class="input" type="submit" value="signin">
</form>



<script src="main.js"></script>

<!-- start test affichage error login -->

 <?php
 ?> 
 
 <?php
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $error = $_GET['error'];
    ?>
    
    <script>
    let divMessage = document.createElement("div");
    divMessage.style.cssText = `
    width: 60%;
    height: 10px;
    padding: 7px 3px;
    background-color: red;
    `;

    let rem = document.querySelector("#rem1");
    rem.appendChild(divMessage);
 </script>

    <?php
    if($error == 'password'){
        ?> 
        <script>
            divMessage.textContent = 'password incorrect';
            rem.appendChild(divMessage);
        </script>
        <?php
    }else if($error == 'email'){
        ?>
        <script>
            divMessage.textContent = 'email incorrect';
            console.log("hello from email");
            rem.appendChild(divMessage);
        </script>
        <?php
    }else if($error == 'stmt_failed'){
        ?>
        <script>
            divMessage.textContent = 'error for login the page can you test';
            rem.appendChild(divMessage);
        </script>
        <?php
    }
 }
 ?>
</body>
</html>