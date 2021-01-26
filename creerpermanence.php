<?php
    
    
    include("connexion.php");     
    $id_project = $_GET["id_project"];
    $date = date("Y-m-d");
    $heur = date("h:i:sa");
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    $n_permanence = generateRandomString();
    $sql ="INSERT INTO permanence (n_permanence,date,heure,duree_permanence,titre_projet) VALUES ('$n_permanence','$date',14,'4','$id_project')";
   	
    echo $sql;
    $exec=$pdo->exec($sql);
    // vérifier si la requête d'insertion a réussi
    if($exec){
        $message='Données insérées';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

       header('Location: ./session.php?n_permanence='.$n_permanence);

    }else{
        $message="Échec de l'opération d'insertion";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

        header('Location: ./projetsDeSession.php');
    }

 ?> 