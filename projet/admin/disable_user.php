<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: Login.php");
}
include_once('../database.php');


if (isset($_POST['type']) && isset($_POST['id'])) {
    $type = $_POST['type'];
    $id = $_POST['id'];

    
    if ($type == 'client') {
        $query = "UPDATE clients SET is_active = 0 WHERE client_id = $id";
    } elseif ($type == 'entreprise') {
        $query = "UPDATE entreprise SET is_active = 0 WHERE entreprise_id = $id";
    }

    
    if (mysqli_query($conn, $query)) {
       
        http_response_code(200);
        echo json_encode(array("success" => true, "message" => "Utilisateur désactivé avec succès."));
    } else {
        
        http_response_code(500);
        echo json_encode(array("success" => false, "message" => "Erreur lors de la désactivation de l'utilisateur : " . mysqli_error($conn)));
    }
} else {
    
    http_response_code(400);
    echo json_encode(array("success" => false, "message" => "Paramètres manquants."));
}
?>
