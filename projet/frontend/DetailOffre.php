
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="detailoffre.css" />
    
</head>


<?php
    include_once('../../database.php');
    if(isset($_POST["submitD"])){
        $offreId=$_POST["offre_id"];
        $sql="SELECT * FROM offredestage o JOIN entreprise e ON (o.entreprise_id = e.entreprise_id) WHERE o.offre_id=$offreId ;";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                <div class='overlay' id='overlay'>    
                    <div class='Details'>
                        <div class='DetailsTitle'>
                        <h1>Détails de l'offre :</h1>
                        </div>
                        
                        <div class='OfferTitle' style='font-size: 50px; color: blue;'>" . $row["titre"] . "</div> 
                        <div class='one'>  publié par :</div>         
                        <div class='OfferEntreprise'>". $row["nom_complet"] . "</span> </div>      
                        <div class='OfferDesc'> 
                        <div class='one'>  Description de l'offre :</div>
                        <div class='p' >". $row["description"] . "</div>
                        </div>    
                        <div class='offerDuree'>
                        <div class='OfferEntreprise'><span >Durée :". $row["duration"] . "</span> </div> 
                        </div>
                        <div class='offerDuree'>
                        <div class='OfferEntreprise'><span >Competences demandées :". $row["skills_required"] . "</span> </div> 
                        </div>
                        <button onclick='window.history.back()' style='background-color: blue; color: white;'>Retour</button>
                    </div>               
                </div>
                ";
                
            }
        }    
    }
?>

