<?php
session_start();
require_once 'conn_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Requête préparée pour éviter l'injection SQL
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            // Vérification du mot de passe (haché)
            session_start(); // toujours au début

            // Connexion à la base et récupération des données utilisateur
            $stmt = $conn->prepare("SELECT *  FROM user WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($user = $result->fetch_assoc()) {                    // Authentification réussie
                    $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                header("Location: dashboard_user.php");
                exit;
            } else {
                // Mot de passe incorrect
                header("Location: index.php?error=password");
                exit;
            }
        } else {
            // Aucun utilisateur trouvé
            header("Location: index.php?error=email");
            exit;
        }
    } else {
        // Erreur de préparation de la requête
        header("Location: index.php?error=stmt_failed");
        exit;
    }
} else {
    // Si l'utilisateur accède directement sans POST
    header("Location: index.php");
    exit;
}
?>
