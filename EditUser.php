<?php
    $nom = $_POST["nom"];
    $prenom =  $_POST["prenom"];
    $status = $_POST["status"];
    $tele = $_POST["tele"];
    $username = $nom.$status;
    $id = $_GET["id"];
    include("connexion.php");     

    $sql ="UPDATE  utilisateur set n_utilisateur='$nom' , p_utilisateur='$prenom',noumeroTel='$tele',statut='$status'  where id_utilisateur=$id";
    echo $sql;
    $exec=$pdo->exec($sql);
    // vérifier si la requête d'insertion a réussi
    if($exec){
        $message='Données insérées';
        header('Location: ./editUtilisateur.php?id='.$id);
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

    }else{
        $message="Échec de l'opération d'insertion";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        header('Location: ./editUtilisateur.php?id='.$id);
    }

 ?> 