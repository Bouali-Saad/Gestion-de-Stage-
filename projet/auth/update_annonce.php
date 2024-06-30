<?php
session_start();
include_once('../database.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $entreprise_id = $_SESSION['entreprise_id'];
    
    
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $skills_required = $_POST['skills_required'];

   
    $sql = "INSERT INTO offredestage (titre, description , duration, skills_required, entreprise_id) VALUES ('$titre', '$description', '$duration', '$skills_required', '$entreprise_id') ;";


    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/Entreprise/SaisieOffre.page.php");
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>