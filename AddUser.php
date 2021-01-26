<?php
    $nom = $_POST["nom"];
    $prenom =  $_POST["prenom"];
    $status = $_POST["status"];
    $tele = $_POST["tele"];
    $username = $nom.$status;
    $tele = $_POST["tele"];
    include("connexion.php");     

    $sql ="INSERT INTO utilisateur (n_carte,n_utilisateur,p_utilisateur,statut,noumeroTel,password,username) VALUES ('123365','$nom','$prenom','$status','$tele','$username','1234')";
    
    $exec=$pdo->exec($sql);
    // vérifier si la requête d'insertion a réussi
    if($exec){
        $message='Données insérées';
        header('Location: ./ajouterUtilisateur.php');
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

    }else{
        $message="Échec de l'opération d'insertion";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        header('Location: ./ajouterUtilisateur.php');
    }

 ?> 