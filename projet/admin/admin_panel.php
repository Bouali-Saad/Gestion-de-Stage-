<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: Login.php");
}
include_once('../database.php');

if (isset($_GET['action']) && isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];

    // Désactiver l'utilisateur en fonction du type
    if ($type == 'client') {
        $query = "UPDATE clients SET is_active = 0 WHERE client_id = $id";
    } elseif ($type == 'entreprise') {
        $query = "UPDATE entreprise SET is_active = 0 WHERE entreprise_id = $id";
    }

    // Exécuter la requête
    if (mysqli_query($conn, $query)) {
        // Rediriger vers la page précédente
        header("Location: admin_panel.php");
        exit;
    } else {
        echo "Erreur lors de la désactivation de l'utilisateur : " . mysqli_error($conn);
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Désactiver Utilisateur</title>
    <link rel="stylesheet" href="panel.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Désactiver Utilisateur</h1>
            <p>Êtes-vous sûr de vouloir désactiver cet utilisateur ?</p>
            <a class="button-disable" href="disable_user.php?action=disable&type=<?php echo $_GET['type']; ?>&id=<?php echo $_GET['id']; ?>">Désactiver</a>
            <a class="button-cancel" href="admin_panel.php">Annuler</a>
        </div>
    </div>
</body>
</html>
