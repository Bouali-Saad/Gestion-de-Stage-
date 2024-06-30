<?php

session_start();


$_SESSION = array();


session_destroy();


header("location: /projet/pages/connexion.php");
exit();
?>