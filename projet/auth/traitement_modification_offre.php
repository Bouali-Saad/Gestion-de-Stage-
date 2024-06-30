<?php
session_start();
include_once('../database.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['offre_id']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['duration']) && isset($_POST['skills_required'])) {
    
    $offre_id = $_POST['offre_id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $skills_required = $_POST['skills_required'];

   
    $sql = "UPDATE offredestage SET titre='$titre', description='$description', duration='$duration', skills_required='$skills_required' WHERE offre_id=$offre_id";

    
    if ($conn->query($sql) === TRUE) {
        echo "Modifications enregistrées avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement des modifications: " . $conn->error;
    }
} else {
    echo "Erreur: Données manquantes.";
}
?>