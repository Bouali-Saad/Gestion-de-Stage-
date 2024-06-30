<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div>Tentez votre chance à trouver un stage en s'inscrivant dans dans notre plateforme</div>
        </div>
        <form action="../auth/inscription.php" method="post">
            <div class="form-container">
                <h1>Inscription</h1>
                
                 
                <input type="text" name="nom_complet" class="input" placeholder='Entrer votre nom:' />
                
                <input type="email" name="email" class="input" placeholder='Entrer votre email:' />
                
                <input type="password" name="mdp" class='input' placeholder='Entrer votre mot de passe:' />
                
                <input type="password" name="password_confirmation" class='input' placeholder='Entrer votre mot de passe une deuxiéeme fois :' />
                <select name="role">
                    <option value="">Choisissez votre role:</option>
                    <option value="client">Etudiant</option>
                    <option value="entreprise">Entreprise</option>
                </select>
                <button class='button' name="button" type='submit'>S'INSCRIRE</button> 
            </div>
        </form>
    </div>
</body>
</html>