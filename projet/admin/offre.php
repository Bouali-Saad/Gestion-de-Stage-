<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: Login.php");
    exit; // Assurez-vous de sortir après une redirection
}
include_once('../database.php');
if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'delete') {
    // Récupérer l'ID de l'offre à supprimer depuis l'URL
    $offreId = $_GET['id'];

    // Requête SQL pour supprimer l'offre de stage
    $sql = "DELETE FROM offredestage WHERE offre_id = $offreId";

    // Exécuter la requête de suppression
    if(mysqli_query($conn, $sql)) {
        // Rediriger vers la même page après la suppression
        header("Location: offre.php");
        exit;
    } else {
        // En cas d'erreur lors de la suppression, afficher un message d'erreur
        echo "Erreur lors de la suppression de l'offre : " . mysqli_error($conn);
    }
}

// Récupérer les offres de stage postulées par les entreprises
$query = "SELECT offredestage.*, entreprise.nom_complet AS entreprise_nom FROM offredestage INNER JOIN entreprise ON offredestage.entreprise_id = entreprise.entreprise_id";
$result = mysqli_query($conn, $query);

// Vérifier si la requête a renvoyé des résultats
if (!$result) {
    echo "Erreur lors de la récupération des offres de stage : " . mysqli_error($conn);
    exit; // Sortir en cas d'erreur
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="offre.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="panel.php">Dashboard</a></li>
                <li><a href="graph.php">Users</a></li>
                <li><a href="offre.php">Offres</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Offres de Stage des Entreprises</h1>
            <table>
                <tr>
                <th>Entreprise</th>
                    <th>Titre de l'Offre</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php
                // Afficher les offres de stage dans le tableau
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['offre_id'] . "</td>";
                    echo "<td>" . $row['titre'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    // Ajouter un lien de suppression avec l'ID de l'offre dans l'URL
                    echo "<td><a href='?action=delete&id=" . $row['offre_id'] . "'>Supprimer</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        
        
    </div>
</body>