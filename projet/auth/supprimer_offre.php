<?php
session_start();
include_once('../database.php');



if (isset($_POST['offre_id'])) {
    
    $offre_id = mysqli_real_escape_string($conn, $_POST['offre_id']);

   
    $sql = "DELETE FROM offredestage WHERE offre_id = $offre_id";

    if (mysqli_query($conn, $sql)) {
       
        echo "L'offre de stage a été supprimée avec succès.";
    } else {
        
        echo "Erreur lors de la suppression de l'offre de stage : " . mysqli_error($conn);
    }
} else {
 
    echo "L'identifiant de l'offre de stage n'a pas été spécifié.";
}


mysqli_close($conn);
?>