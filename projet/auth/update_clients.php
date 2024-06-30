
<?php
 
 session_start();
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nom_complet = $_POST['nom_complet'];
    $université = $_POST['université'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];
    $NiveauScolaire = $_POST['NiveauScolaire'];
    $cv = $_POST['cv']; 
    $mdp=$_POST['mdp'];
    $email=$_POST['email'];
    $client_id=$_SESSION["client_id"] ;
	
	


    

 
    $sql = "UPDATE clients SET nom_complet='$nom_complet', telephone='$telephone', ville='$ville', adresse='$adresse', cv='$cv',université='$université',NiveauScolaire='$NiveauScolaire',mdp='$mdp', email='$email' WHERE client_id='$client_id '";
    if ($conn->query($sql) === TRUE) { 
        header("Location:../pages/Stagiere/ModifierProfil.page.php");//lien vers son profil
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    
}


$conn->close();
?>