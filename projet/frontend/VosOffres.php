<?php
session_start();
include_once('../../database.php');

// Vérification de la session de l'entreprise
if (!isset($_SESSION['entreprise_id'])) {
    header("Location: ../auth/exemple.php"); 
    exit();
}

// Récupération de l'identifiant de l'entreprise connectée
$entreprise_id = $_SESSION['entreprise_id'];

// Requête SQL pour récupérer les offres de stage de l'entreprise
$sql = "SELECT * FROM offredestage WHERE entreprise_id = $entreprise_id";
$result = $conn->query($sql);

?>
    <script>
        function saveChanges(offre_id) {
            var row = document.getElementById('row_' + offre_id);
            var cells = row.getElementsByTagName('td');
            var data = {};
            for (var i = 0; i < cells.length - 1; i++) { 
                var cell = cells[i];
                var columnName = cell.getAttribute('data-column');
                data[columnName] = cell.innerText;
            }

            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../auth/traitement_modification_offre.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText); 
                        alert("Modification réussie !");
                    } else {
                        alert("Erreur lors de la modification.");
                    }
                }
            };
            var formData = "offre_id=" + offre_id + "&titre=" + encodeURIComponent(data.titre) + "&description=" + encodeURIComponent(data.description) + "&duration=" + encodeURIComponent(data.duration) + "&skills_required=" + encodeURIComponent(data.skills_required);
            xhr.send(formData);
        }
        function deleteOffre(offre_id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette offre de stage ?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../../auth/supprimer_offre.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText); 
                            alert("Suppression réussie !");
                            document.getElementById('row_' + offre_id).remove();
                        } else {
                            alert("Erreur lors de la suppression.");
                        }
                    }
                };
                var formData = "offre_id=" + offre_id;
                xhr.send(formData);
            }
        }
    </script>
</head>
<table class="content-table">
        <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Compétemces demandées</th>
                    <th>action</th>
                </tr>
        </thead>
        <tbody>
            <?php
                include_once('../../database.php');
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr id='row_" . $row["offre_id"] . "'>";
                        echo "<td data-column='titre' contenteditable='true'>" . $row["titre"] . "</td>";
                        echo "<td data-column='description' contenteditable='true'>" . $row["description"] . "</td>";
                        echo "<td data-column='duration' contenteditable='true'>" . $row["duration"] . "</td>";
                        echo "<td data-column='skills_required' contenteditable='true'>" . $row["skills_required"] . "</td>";
                        echo "<td><button class='entreprise' onclick='saveChanges(" . $row["offre_id"] . ")'>Enregistrer</button>";
                        echo "<span style='margin-left: 10px;'></span>";
                        echo "<button class='entreprise' onclick='deleteOffre(" . $row["offre_id"] . ")'>Supprimer</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune offre de stage trouvée.</td></tr>";
                }
                ?>

        </tbody>
</table>
