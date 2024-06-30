
<?php
 
 session_start();
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nom_complet = $_POST['nom_complet'];
    $telephone_entreprise = $_POST['telephone_entreprise'];
    $Raison = $_POST['Raison'];
    $ville_entreprise = $_POST['ville_entreprise'];
    $adresse = $_POST['adresse'];
    $domaine = $_POST['domaine']; 
    $mdp=$_POST['mdp'];
    $email=$_POST['email'];
    $entreprise_id=$_SESSION["entreprise_id"] ;
	
	


    

 
    $sql = "UPDATE entreprise SET nom_complet='$nom_complet',telephone_entreprise='$telephone_entreprise', ville_entreprise='$ville_entreprise', adresse='$adresse', domaine='$domaine',Raison='$Raison',mdp='$mdp', email='$email' WHERE entreprise_id='$entreprise_id '";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/Entreprise/ModifierProfil.page.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    
}


$conn->close();
?>