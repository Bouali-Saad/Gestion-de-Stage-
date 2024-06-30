<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: Login.php");
    exit(); 
}


if(isset($_POST['type']) && isset($_POST['id'])) {
    include_once('../database.php');

    // Récupérer les données du formulaire
    $type = $_POST['type'];
    $id = $_POST['id'];

    
    if($type === 'client') {
        $query = "DELETE FROM clients WHERE client_id = $id";
    } elseif ($type === 'entreprise') {
        $query = "DELETE FROM entreprise WHERE entreprise_id = $id";
    } else {
       
        echo "Type d'utilisateur invalide.";
        exit(); 
    }

    
    if(mysqli_query($conn, $query)) {
        
        echo json_encode(["success" => true]);
    } else {
       
        echo json_encode(["success" => false, "message" => "Erreur lors de la suppression de l'utilisateur."]);
    }
} else {
    
    echo json_encode(["success" => false, "message" => "Données manquantes pour supprimer l'utilisateur."]);
}
?>
