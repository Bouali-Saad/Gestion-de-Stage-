
            <div class="annonces">
                <?php
                include_once("../../database.php");
                $sql = "SELECT * FROM offredestage o JOIN entreprise e ON (o.entreprise_id = e.entreprise_id)";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='annonce'>";
                        echo "<div class='parag'>";
                        echo "<h3>" . $row["titre"] . "</h3>";
                        echo "<div class='info'>";
                        echo "<div id='nom'>" . $row["nom_complet"] . "</div>";
                        echo "<div id='ville'>" . $row["ville_entreprise"] . "</div>";
                        echo "<div id='duration'>" . $row["duration"] . "</div>";
                        echo "</div>";
                        echo "</div>";
                        $entreprise_id=$row["entreprise_id"];
                        echo "<div class='boutons'>";
                        echo "<form action='../../auth/traitement_candidature.php?entreprise_id=$entreprise_id' method='post'>";
                        echo "<input type='hidden' name='offre_id' value='" . $row["offre_id"] . "'>";
                        echo "<button type='submit' name='submit'>Postuler</button>";
                        echo "</form>";
                        echo "<form action='../../pages/Stagiere/Detail.page.php' method='post'>";
                        echo "<input type='hidden' name='offre_id' value='" . $row["offre_id"] . "'>";
                        echo "<button type='submit' name='submitD'>Details</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "Aucune annonce disponible";
                }
                ?>
            </div>
