<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: Login.php");
}
include_once('../database.php');

// Récupérer la liste des clients et des entreprises
$query_clients = "SELECT client_id, nom_complet AS name, email AS email, 'client' AS type FROM clients WHERE is_active = 1";
$result_clients = mysqli_query($conn, $query_clients);

$query_entreprises = "SELECT entreprise_id, nom_complet AS name, email AS email, 'entreprise' AS type FROM entreprise WHERE is_active = 1";
$result_entreprises = mysqli_query($conn, $query_entreprises);


$users = [];
while ($row = mysqli_fetch_assoc($result_clients)) {
    $users[] = $row;
}
while ($row = mysqli_fetch_assoc($result_entreprises)) {
    $users[] = $row;
}


shuffle($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="p.css">
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
        <div class="main">
            
            
           
            
        </div>
        <div class="content">
            <h1>Admin Dashboard</h1>
            <h2>Users List</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo ($user['type'] == 'client') ? $user['client_id'] : $user['entreprise_id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo ucfirst($user['type']); ?></td>
                        <td>
                            <?php if ($user['type'] == 'client' || $user['type'] == 'entreprise') { ?>
                                <a class="button-disable" href="#" onclick="disableUser('<?php echo $user['type']; ?>', '<?php echo ($user['type'] == 'client') ? $user['client_id'] : $user['entreprise_id']; ?>')">Désactiver</a>
                                <a class="button-delete" href="#" onclick="deleteUser('<?php echo $user['type']; ?>', '<?php echo ($user['type'] == 'client') ? $user['client_id'] : $user['entreprise_id']; ?>')">Supprimer</a>
                            <?php } else { ?>
                                <a class="button-enable" href="#">Activer</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <script>
        function disableUser(type, id) {
            if (confirm("Êtes-vous sûr de vouloir désactiver cet utilisateur ?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "disable_user.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        
                    }
                };
                xhr.send("type=" + type + "&id=" + id);
            }
        }
    </script>
    <script>
    function deleteUser(type, id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_user.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    
                }
            };
            xhr.send("type=" + type + "&id=" + id);
        }
    }
</script>

</body>
</html>
