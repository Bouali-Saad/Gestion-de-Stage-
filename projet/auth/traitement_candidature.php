<?php
session_start();
include_once('../database.php');

if(isset($_POST['submit'])) {
    $offre_id = $_POST['offre_id'];
    $client_id = $_SESSION['client_id'];
    $entreprise_id=$_GET['entreprise_id'];
    
    
    $sql = "INSERT INTO postulations (client_id, offre_id, entreprise_id) VALUES ('$client_id', '$offre_id','$entreprise_id')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/Stagiere/Candidatures.page.php");
        exit();
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

?>
