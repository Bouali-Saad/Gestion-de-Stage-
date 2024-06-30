<table class="content-table">
        <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>telephone</th>
                    <th>voir CV</th>
                    <th>action</th>
                </tr>
        </thead>
        <tbody>
            <?php
                session_start();
                include_once('../../database.php');



                $entreprise_id = $_SESSION['entreprise_id'];


                $sql = "SELECT clients.nom_complet, clients.telephone,clients.cv,postulations.postulation_id, clients.email, postulations.date_postulation 
                        FROM postulations 
                        INNER JOIN clients ON postulations.client_id = clients.client_id
                        WHERE postulations.entreprise_id = $entreprise_id AND postulations.acceptee=0";

                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    
                    
                    while($row = $result->fetch_assoc()) {
                        echo"<tr class='tmargin'>
                        <td>" . htmlspecialchars($row["nom_complet"]) . "</td>
                        <td>" . htmlspecialchars($row["email"]) . "</td>
                        <td>" . htmlspecialchars($row["telephone"]) . "</td>";
                    
                    if (!empty($row["cv"])) {
                        $cv_url = htmlspecialchars($row["cv"]);
                        echo "<td><a href='$cv_url' target='_blank' style='text-decoration: underline;'>Voir CV</a></td>";
                    } else {
                        echo "<td>Pas de CV</td>";
                    }
                           echo" 
                            <form action='../../auth/traitement_demande.php' method='post'>
                            <input type='hidden' name='postulation_id' value='" . $row["postulation_id"] . "'>
                            <td><button class='voscandidat' type='submit' name='accepter'>Accepter</button><button class='voscandidat' type='submit' name='refuser'>Refuser</button></td>
                            </form>
                        </tr>";
                    
                    }
                
                
                } 
            ?>

        </tbody>
</table>
