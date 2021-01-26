<?php
include("connexion.php");
   session_start(); 
   if($_SESSION["autoriser"]!="oui"){
    header("location:accueil.php");
    exit();
 } 
    
 
   $reponse = $pdo->query('SELECT distinct niveau FROM types'); 
   $reponse1 = $pdo->query('SELECT distinct filiere FROM types ');
   $reponse2 = $pdo->query('SELECT distinct parcour FROM types');
   // check there are no errors
   if ( isset($_POST["submit"]) ) {
    $username=$_SESSION["username"];
    $reponse4 = $pdo->query("SELECT id_utilisateur  FROM utilisateur where username ='$username'");
    while ($donnees = $reponse4->fetch())
                        { 
    $id = $donnees['id_utilisateur'];
                        }

      $niveau0=$_POST["niveau0"];
      $filiere0=$_POST["filiere0"];
      $parcour0=$_POST["parcour0"];  
      $sql ="INSERT INTO projet (niveau,filiere,parcours,id_utilisateur) VALUES ('$niveau0','$filiere0','$parcour0','$id')";
      $exec0=$pdo->exec($sql);
        // vérifier si la requête d'insertion a réussi
        if($exec0){
            $message='Données insérées';
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

        }else{
            $message="Échec de l'opération d'insertion";
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        }      
    }
    

?>
 <html>
 <head>
 
 </head>
 <body>
 <form name="fo" method="post" action="" enctype="multipart/form-data"> 

						<p >Niveau :      </p>
						<select class=".col-md- form-control " name='niveau0'>
                        <?php  
                        while ($donnees = $reponse->fetch())
                        { 
                            echo "<option name='niveauz'>";
                            echo $donnees['niveau']; 
                            echo "</option>";
                        } 
                        ?>
						</select>

                        <p >Filière :      </p>
						<select class=".col-md- form-control " name="filiere0">
                        <?php
                       
                        while ($donnees1 = $reponse1->fetch())

                        {  
                            echo "<option>";
                            echo $donnees1['filiere']; 
                            echo "</option>";
                        } 
                        ?>
						</select>
						<p>Parcours :      </p>
						<select class=".col-md- form-control " name="parcour0">
                        <?php
                        while ($donnees2 = $reponse2->fetch())

                        {  
                            echo "<option>";
                            echo $donnees2['parcour']; 
                            echo "</option>";
                        } 
                        ?>
                        </select>
                        <button type="submit" name="submit" class="btn btn-warning centre center col">Ajouter le projet </button>
 </form>
 </body>

</html>
<?php
     
$reponse->closeCursor(); // Termine le traitement de la requête
$reponse1->closeCursor(); // Termine le traitement de la requête
$reponse2->closeCursor(); // Termine le traitement de la requête
 // Termine le traitement de la requête
?>