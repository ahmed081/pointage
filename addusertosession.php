<?php
    
    $n_permanence = $_GET["n_permanence"];
    $student_num = $_POST["student_num"];
    

    include("connexion.php");
    $date = date("Y-m-d");
    $heur = date("h:i:s");
    $sql ="INSERT INTO estpresent (n_permanence,num_etudiant,harriveeM,hdepartM,heurearriveS,heuredepartS,dateP) VALUES ('$n_permanence','$student_num','$heur','$heur','$heur','$heur','$date')";

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

        header('Location: ./session.php?n_permanence='.$n_permanence);
    }

 ?> 