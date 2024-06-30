 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    
 

<?php

    include_once('../../database.php');
    session_start();

    
    if (!isset($_SESSION['entreprise_id'])) {
        header("Location: ../auth/login.php"); 
        exit();
    }

    
    $entreprise_id = $_SESSION['entreprise_id'];

    
    $sql = "SELECT * FROM entreprise WHERE entreprise_id = $entreprise_id";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $nom_complet = $row['nom_complet'];
            $telephone_entreprise = $row['telephone_entreprise'];
            $adresse = $row['adresse'];
            $ville_entreprise = $row['ville_entreprise'];
            $domaine=$row['domaine'];
            $Raison=$row['Raison'];
            $email=$row['email'];
           
        }
    }
?>
    <div class="profile-container">
        <form action="../../auth/update_entreprise.php" method="post">
            <h1>Modifier votre profil :</h1>
            <div class="line">
                <input type="text" name="nom_complet"   placeholder="Saisir nom d'entreprise:" value="<?php echo $nom_complet; ?>">
                <input type="text" name="Raison"   placeholder="Saisir votre raison:" value="<?php echo $nom_complet; ?>">
            </div>
            <div class="line">
                <input type="text" name="adresse"   placeholder="Saisir votre adresse:" value="<?php echo $adresse; ?>">
                <input type="text" name="ville_entreprise"  placeholder="Saisir votre ville:"  value="<?php echo $ville_entreprise; ?>">
            </div>
            <div class="line">
                <input type="text" name="domaine"  placeholder="Saisir votre domaine d'activité:" value="<?php echo $domaine; ?>"  >
                <input type="text" name="telephone_entreprise" placeholder="Saisir votre numero de telephone:" value="<?php echo $telephone_entreprise; ?>"  />
            </div>
            <div class="line">
            <input type="password" name="mdp" placeholder="Changer votre mot de passe:" />
            <input type="email" name="email" placeholder="Changer votre email:" value="<?php echo $email; ?>" />
            </div>
            <div class="line">
            <input type="password" name="mdp" placeholder="Confirmer votre nouveau mot de passe:" />
            </div>
            
            <input type="submit" value="Modifier" id='button' />
        </form>        
    </div>
    <script>
   
    function confirmerModification() {
        console.log("La fonction confirmerModification() est appelée."); // Message de débogage

        // Afficher la boîte de dialogue de confirmation
        var confirmation = confirm("Êtes-vous sûr de vouloir modifier ces informations ?");

        // Si l'utilisateur clique sur OK, la soumission du formulaire se fera
        if (confirmation) {
            console.log("L'utilisateur a confirmé la modification."); // Message de débogage
            document.querySelector("form").submit();
        } else {
            console.log("L'utilisateur a annulé la modification."); // Message de débogage
            // Sinon, annuler l'action
            return false;
        }
    }

    // Ajouter un gestionnaire d'événements au bouton de modification
    document.getElementById("button").addEventListener("click", confirmerModification);
</script>


    </body>
 </html>