
<?php
session_start();
include_once('../database.php');

if(isset($_POST['submit'])) {
    $postulation_id = $_GET['ids'];

    
    $sql = "DELETE FROM postulations WHERE postulation_id = $postulation_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/Stagiere/Candidatures.page.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de la postulation : " . $conn->error;
    }
} else {
    echo "Aucune donnée reçue pour la suppression.";
}
?>