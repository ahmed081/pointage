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
  

   if ( isset($_POST["submit"]) ) {

    //Récuperer id_utilisateur de l'utilisateur identifier
    $username=$_SESSION["username"];
    $reponse4 = $pdo->query("SELECT id_utilisateur  FROM utilisateur where username ='$username'");
    while ($donnees = $reponse4->fetch())
     { $id = $donnees['id_utilisateur']; }

    //Insertion de niveau, filier et parcours dans la table projet
    $niveau0=$_POST["niveau0"];
    $filiere0=$_POST["filiere0"];
    $parcour0=$_POST["parcour0"];  
   
    $sql ="INSERT INTO projet (niveau,filiere,parcours,id_utilisateur) VALUES ('$niveau0','$filiere0','$parcour0','$id')";
    $exec0=$pdo->exec($sql);
    // vérifier si la requête d'insertion a réussi
    if($exec0){
        $message='Donnees inserees avec succes';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

    }else{
        $message="Echec de l'operation d'insertion des donnees";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    }                           
   


    //upload de liste etudiants
    $handle = fopen($_FILES['csv']["tmp_name"], 'r');
        $ligne=1;
         while($tab=fgetcsv($handle,1024, ';'))
         {
         $champs = count($tab);//nombre de champ dans la ligne en question
         $ligne ++;
         //affichage de chaque champ de la ligne en question
         for($i=0; $i<$champs; $i ++)
         {
           $var[$i] = $tab[$i] ;
         }
         $sql ="INSERT INTO etudiant (num_etudiant,nu_carte,n_etudiant, p_etudiant, filiere) VALUES ('$var[0]','$var[1]','$var[2]','$var[3]','$var[4]' )";
         $exec=$pdo->exec($sql);
       }
            fclose($handle);
        
    //upload de planing
    $handle1 = fopen($_FILES['plan']["tmp_name"], 'r');
    $ligne=1;
         while($tab=fgetcsv($handle1,1024, ';'))
         {
         $champs = count($tab);//nombre de champ dans la ligne en question
         $ligne ++;
         //affichage de chaque champ de la ligne en question
         for($i=0; $i<$champs; $i ++)
         {
           $var[$i] = $tab[$i] ;
         }
         $sql ="INSERT INTO planing (id_planing,heure_arrivee_matin, heure_depart_matin, heure_arrivee_soir,heure_depart_soir, date_jour) VALUES ('$var[0]','$var[1]','$var[2]','$var[3]','$var[4]','$var[5]' )";
         $exec=$pdo->exec($sql);
            }
            fclose($handle1);
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/Universite_Evry.png" alt="logo_univ" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a href="PlanifierProjet.html">Planifier un projet</a>
                        </li>
                        <li>
                            <a href="EnregistrerCarte.php">Enregistrer une carte</a>
                        </li>
                        <li>
                            <a href="consulterPresence.php">Consulter la présence</a>
                        </li>
                        <li>
                            <a href="affecterIntervenant.php">Affecter un intervenant</a>
                        </li>
                        <li>
                            <a href="projetsDeSession.php"> Lancer une session</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->

        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/Universite_Evry.png" alt="logo_univ" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="PlanifierProjet.php">Planifier un projet</a>
                        </li>
                        <li>
                            <a href="EnregistrerCarte.php">Enregistrer une carte</a>
                        </li>
                        <li>
                            <a href="consulterPresence.php">Consulter la présence</a>
                        </li>
                        <li>
                            <a href="affecterIntervenant.php">Affecter un intervenant</a>
                        </li>
                        <li>
                            <a href="projetsDeSession.php">Lancer une session</a>
                        </li>
                    </ul>
                </nav>
            </div>
			
			
			<!-- Fenêtre Modale -->
	<div class="modal fade" id="oMessagerie" tabindex="-1" role="dialog" aria-labelledby="oMessagerieLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="oMessagerieLabel">Titre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Contenu
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			
			
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
		
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
					<div class="pull-right" >
                                        <button type="button" class="btn btn-outline-warning"> <a href="deconnexion.php">Déconnexion</a></button>                                
					</div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
			
            <div class="main-content">
                <div class="section__content section__content--p30 ">
					<div class="form-group col-md-4 ">
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
						<select class=".col-md- form-control " name='filiere0'>
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
						<select class=".col-md- form-control " name ="parcour0">
                        <?php
                        while ($donnees2 = $reponse2->fetch())

                        {  
                            echo "<option>";
                            echo $donnees2['parcour']; 
                            echo "</option>";
                        } 
                        ?>
                        </select>
                        
						</select>
						<p>Importer la liste des étudiants :       </p>
						<div class="custom-file">
						  <input type="file" name="csv" id="file">
						  <label  for="customFile"></label>
						</div>

						<p>Importer le planing :       </p>
						<div class="custom-file">
						  <input name="plan" type="file" id="file">
						  <label  for="customFile"></label>
						</div>

						<br><br>
						<button type="submit" name="submit" class="btn btn-warning centre center col">Ajouter le projet </button>
                    </form>
					</div>
					
					
				</div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>



    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php
     
$reponse->closeCursor(); // Termine le traitement de la requête
$reponse1->closeCursor(); // Termine le traitement de la requête
$reponse2->closeCursor(); // Termine le traitement de la requête
$reponse4->closeCursor(); // Termine le traitement de la requête
?>