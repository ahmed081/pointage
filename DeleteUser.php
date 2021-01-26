    <?php
    
    $id = $_GET["id"];
    include("connexion.php");     

    $sql ="DELETE FROM utilisateur where id_utilisateur = $id";
    echo $sql;
    $exec=$pdo->exec($sql);
    // vérifier si la requête d'insertion a réussi
    if($exec){
        $message='Données insérées';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

        header('Location: ./gererUtilisateurs.php');

    }else{
        $message="Échec de l'opération d'insertion";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

        header('Location: ./deleteUtilisateur.php?id='.$id);
    }

 ?> 