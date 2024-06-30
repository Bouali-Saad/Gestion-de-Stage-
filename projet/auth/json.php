<?php
    include_once("../../database.php");
    $sql="SELECT * FROM offredestage o JOIN entreprise e ON (o.entreprise_id=e.entreprise_id); ";
    $results=$conn->query($sql);
    while($offre=$results->fetch_assoc()){
        $offres[]=$offre;
    }
    $data=json_encode($offres);
    file_put_contents("../../data/OffreStageData.json",$data);
?>