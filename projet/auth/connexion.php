
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); 
$_SESSION['entreprise_id'] = null;
$_SESSION['client_nom'] = null;
$_SESSION['client_id'] = null;
$_SESSION["loggedin"] = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    include_once('../database.php');

   
    
    $sql = "SELECT email, mdp  FROM clients WHERE email = ? AND mdp = ? UNION SELECT email, mdp FROM entreprise WHERE email = ? AND mdp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $mdp, $email, $mdp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result !== false && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $email = $data['email'];
        $mdp = $data['mdp'];

        
        $sql_clients = "SELECT client_id  FROM clients WHERE email = ?";
        $stmt_clients = $conn->prepare($sql_clients);
        $stmt_clients->bind_param("s", $email);
        $stmt_clients->execute();
        $result_clients = $stmt_clients->get_result();

        if ($result_clients !== false && $result_clients->num_rows > 0) {
            $res = $result_clients->fetch_assoc();
            
           
            $_SESSION["client_id"] = $res['client_id'];

            

                echo "Redirecting to index.php"; 
                header("Location: ../pages/Stagiere/Offre.page.php");
                exit();
            
        }

        
        $sql_entreprise = "SELECT entreprise_id  FROM entreprise WHERE email = ?";
        $stmt_entreprise = $conn->prepare($sql_entreprise);
        $stmt_entreprise->bind_param("s", $email);
        $stmt_entreprise->execute();
        $result_entreprise = $stmt_entreprise->get_result();

        if ($result_entreprise !== false && $result_entreprise->num_rows > 0) {
            $data = $result_entreprise->fetch_assoc();
            
            
            $_SESSION["entreprise_id"] = $data['entreprise_id'];;

            
                echo "Redirecting to ../pages/Entreprise/MesOffres.page.php"; 
                header("Location: ../pages/Entreprise/MesOffres.page.php");
                exit();
            
        }
    } else {
            
            $error_message = "Email ou mot de passe incorrect.";
            header("Location: ../pages/connexion.php?error=$error_message");
            exit();
    }

   
    $conn->close();
}



