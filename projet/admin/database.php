<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "usersdb";


$conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
    }
    
    


    $query_clients = "SELECT COUNT(*) as count FROM clients";
 $result_clients = mysqli_query($conn, $query_clients);
 $row_clients = mysqli_fetch_assoc($result_clients);
 $count_clients = $row_clients['count'];
 
 // Récupérer le nombre d'entreprises
 $query_entreprises = "SELECT COUNT(*) as count FROM entreprise";
 $result_entreprises = mysqli_query($conn, $query_entreprises);
 $row_entreprises = mysqli_fetch_assoc($result_entreprises);
 $count_entreprises = $row_entreprises['count'];
 
 // Créer un tableau avec les données
 $data = [
     ["user_type" => "client", "count" => $count_clients],
     ["user_type" => "entreprise", "count" => $count_entreprises]
 ];
 
 echo json_encode($data);
?>