
    <form action="../../auth/update_annonce.php" method="post">
        <div class="profile-container">
                <h1>Saisir les informations de votre offre à publier:</h1>
                <input type="text" name="titre"  placeholder="Saisir le titre de l'offre:"/>
                <textarea name="description" placeholder="Saisir la description :"></textarea><br>
                <input type="text" name="duration" placeholder="Saisir la durée du stage :" required/>
                <input type="text" name="skills_required" placeholder="Saisir les compétences désirées  :" required/>
                <input type="text" name="adress" placeholder="Saisir le lieu   :" required/>
                <input type="submit" value="Publier" id='button' />
        </div>
    </form>
