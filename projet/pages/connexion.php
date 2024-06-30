<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
    <link rel="stylesheet" href="../styles/inscription.css">
</head>
<body>
    <header>
        <div class="logo">Interfind</div>
        <nav>
            <a href="Sign in"><button id='b'>Sign up</button></a>
            <a href="log in"><button id='b'>log in</button></a>
        </nav>
    </header>
    <div class="wrapper">
        <div class="text-container">
            <div>Bienvenue , connectez-vous pour voir les nouvelles actualitées de votre profil.</div>
        </div>
        <form action="../auth/connexion.php" method="post">
            <div class="form-container">
                <h1>Connexion:</h1>
                
                <input type="email" name="email" class="input" placeholder='Entrer votre email:' />
                
                <input type="password" name="mdp" class='input' placeholder='Entrer votre mot de passe:' />

                <input type='submit' class='button'  value="Se connecter"  />
            </div>
            <?php 
        // Vérifier s'il y a un message d'erreur dans l'URL
                    if (isset($_GET['error'])) {
                     $error_message = $_GET['error'];
                    echo '<p style="color: red;">' . $error_message . '</p>';
                     }
        ?>
        </form>
    </div>
</body>
</html>