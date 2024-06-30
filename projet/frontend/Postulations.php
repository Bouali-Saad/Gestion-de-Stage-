<table class="content-table">
        <thead>
                <tr>
                    <th>Titre</th>
                    <th>duration</th>
                    <th>skills_required</th>
                    <th>Date de postulation</th>
                    <th>action</th>
                </tr>
        </thead>
        <tbody>
            <?php
                include_once("../../database.php");
                $client_id = $_SESSION['client_id'];
                
                
                $sql = "SELECT offredestage.titre, offredestage.duration,offredestage.skills_required, postulations.date_postulation,postulations.postulation_id 
                    FROM postulations 
                    INNER JOIN offredestage ON postulations.offre_id = offredestage.offre_id
                    WHERE postulations.client_id = $client_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $ids=$row["postulation_id"];
                        echo"<tr>
                            <td>". $row["titre"] ."</td>
                            <td>". $row["duration"] ."</td>
                            <td>". $row["skills_required"] ."</td>
                            <td>". $row["date_postulation"] ."</td>
                            <td><form action='../../auth/supprimer.php?ids=$ids' method='post'><button type='submit' name='submit'>Supprimer</button></form></td>
                        </tr>";
                     
                    }
                } else {
                    echo "Aucune candidature trouvée";
                }
            ?>
       </tbody>
</table>            