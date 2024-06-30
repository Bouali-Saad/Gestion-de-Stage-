<?php

$pdo = new PDO('mysql:host=localhost;dbname=usersdb', 'root', '');


if (!$pdo) {
    die("Connection Failed:".mysqli_connect_error());
}


$stmt = $pdo->prepare('SELECT date, nombre FROM utilisateurs');
$stmt->execute();
$donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);


$dates = [];
$nombres = [];
foreach ($donnees as $donnee) {
    $dates[] = $donnee['date'];
    $nombres[] = $donnee['nombre'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="graphe.css">
    <title>Graphiques</title>
    <style>
        .dashboard {
            display: flex;
            justify-content: space-between;
        }
        .content {
            width: 45%;
        }
        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }
            .content {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    
    <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="Panel.php">Dashboard</a></li>
                <li><a href="graph.php">Users</a></li>
                <li><a href="offre.php">Offres</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
<div class="dashboard">
    <div class="content">
        <h1>Graph of Users</h1>
        <div class="chart-containe">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="content">
        <h1>Type of Users</h1>
        <div class="chart-container">
            <canvas id="userPieChart"></canvas>
        </div>
    </div>
</div>
<script>
    fetch('database.php')
    .then(response => response.json())
    .then(data => {
        const labels = data.map(item => item.user_type);
        const counts = data.map(item => item.count);

        const ctxPie = document.getElementById('userPieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Types d\'Utilisateurs',
                    data: counts,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverOffset: 4
                }]
            }
        });
    })
    .catch(error => console.error('Error fetching data:', error));

    var ctxLine = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'Nombre d\'utilisateurs',
                data: <?php echo json_encode($nombres); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
