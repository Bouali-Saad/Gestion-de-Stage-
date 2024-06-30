<?php
session_start();
include_once('../database.php');

if(isset($_POST['accepter']) && isset($_POST['postulation_id'])) {
    $postulation_id = $_POST['postulation_id'];
    
    
    $sql_update = "UPDATE postulations SET acceptee = 1 WHERE postulation_id = $postulation_id";
    if ($conn->query($sql_update) === TRUE) {
        
        $entreprise_id = $_SESSION['entreprise_id'];
        $sql_entreprise = "SELECT nom_complet FROM entreprise WHERE entreprise_id = $entreprise_id";
        $result_entreprise = $conn->query($sql_entreprise);
        $row_entreprise = $result_entreprise->fetch_assoc();
        $nom_entreprise = $row_entreprise['nom_complet'];
        
        
        $sql_client = "SELECT client_id FROM postulations WHERE postulation_id = $postulation_id";
        $result_client = $conn->query($sql_client);
        $row_client = $result_client->fetch_assoc();
        $client_id = $row_client['client_id'];

        
        $email = "email_du_client@example.com";

        $message = "Votre candidature a été acceptée pour l'offre de stage de l'entreprise $nom_entreprise ! Félicitations ! \n";
        $message .= "Pour plus de détails, veuillez consulter votre <a href='https://mail.google.com/' target='_blank'>boîte e-mail</a> pour finaliser cette . \n";
        $message .= "L'équipe de INTERFIND";

        
       
        header("Location: ../pages/Entreprise/VosCandidats.page.php");
           
           
        } 
        }
        else if(isset($_POST['refuser']) && isset($_POST['postulation_id'])) {
          $postulation_id = $_POST['postulation_id'];{

      $sql = "DELETE postulations FROM postulations WHERE postulation_id = $postulation_id";
      if ($conn->query($sql) === TRUE) {

        header("Location: ../pages/Entreprise/VosCandidats.page.php");

      }
       
    }
}

?>