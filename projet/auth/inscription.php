
<?php

include_once('../database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nom_complet = $_POST['nom_complet'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $role = $_POST['role'];
    
    $query = "SELECT email FROM clients WHERE email = '$email'
              UNION
              SELECT email FROM entreprise WHERE email = '$email'";
    $result = $conn->query($query);
    
    
    if ($role === 'client') {
        $sql = "INSERT INTO clients (nom_complet, email, mdp) VALUES ('$nom_complet', '$email', '$mdp')";
    } elseif ($role === 'entreprise') {
        $sql = "INSERT INTO entreprise  (nom_complet, email, mdp) VALUES ('$nom_complet', '$email', '$mdp')";
    } else {
        
        die("Rôle non valide");
    }

    if ($conn->query($sql) === TRUE) { 
        if (!empty($_POST['role'])) {
            switch ($_POST['role']) {
                case "client":
                    header("Location:../pages/connexion.php");
                    exit;
                case "entreprise":
                    header("Location:../pages/connexion.php");
                    exit;
            }
        }
        exit(); 
    } else {
        echo "Erreur lors de l'inscription : " . $conn->error;
        header('Location:exemple.php');
        exit();
    }
}


$conn->close();
?>
