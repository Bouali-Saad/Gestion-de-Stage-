
        <div class="notification-container">
                <h1>Notifications</h1>
                <p>Les messages affichés seront automatiquement supprimés lorsque vous quitterez cette page. Pour le cas de refus! Veuillez acceder directement dans votre mail </p>
                <div id="notification-message">
                    <?php
                        include_once('../../database.php');
                        session_start();
                        $client_id=$_SESSION['client_id'];
                        $sql= "SELECT nom_complet, ville_entreprise,email FROM entreprise WHERE entreprise_id IN (SELECT entreprise_id from postulations WHERE acceptee=1 AND client_id=$client_id)";
                        $result = $conn->query($sql);
            



                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {

                                echo"<p>Félicitations ! Votre candidature a été acceptée par ";
                                echo "entreprise: " . $row["nom_complet"] . "";
                                echo ". Nous vous remercions de votre intérêt pour le poste et nous sommes impatients de travailler avec vous.";
                                echo " Si vous avez des questions ou vous avez besoin de plus d'informations, n'hésitez pas à <a href='https://mail.google.com'/>nous contacter par e-mail</a> pour finaliser la procédure.<br><br>";
                                echo "Meilleures salutations;</p>";
                            
                        
                        
                            
                            
                            
                        
                            }
                        }
                        else {
                        
                            echo "<p>Aucun message d'acceptation n'est présent pour le moment.</p>";
                        }
                    ?>
                </div>
        </div>