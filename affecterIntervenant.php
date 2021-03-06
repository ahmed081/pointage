<?php
    include("connexion.php"); 
    session_start();  
    if($_SESSION["autoriser"]!="oui"){
    header("location:accueil.php");
    exit();
    } 
    $username=$_SESSION["username"];
    $reponse4 = $pdo->query("SELECT id_utilisateur  FROM utilisateur where username ='$username'");
    while ($donnees = $reponse4->fetch())
    { $id = $donnees['id_utilisateur']; }
    $reponse = $pdo->query("SELECT distinct id_projet FROM projet where id_utilisateur = '$id'"); 
    $reponse3 = $pdo->query('SELECT distinct n_utilisateur FROM utilisateur where statut = "intervenant"');

    if ( isset($_POST["submit"]) ) {

        $projet=$_POST["projet"]; 
        $inter=$_POST["inter"];
        $sql ="INSERT INTO intervenir (n_utilisateur,titre_projet) VALUES ('$inter','$projet')";
        $exec=$pdo->exec($sql);
        // vérifier si la requête d'insertion a réussi
        if($exec){
            $message='Donnees inserees avec succes';
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

        }else{
            $message="Echec de l'operation d'insertion des donnees";
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        }  
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
                        <a  href="#">
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
                        <li>
                            <a href="PlanifierProjet.php">Planifier un projet</a>
                        </li>
                        <li>
                            <a href="EnregistrerCarte.php">Enregistrer une carte</a>
                        </li>
                        <li>
                            <a href="consulterPresence.php">Consulter la présence</a>
                        </li>
                        <li class="active has-sub">
                            <a href="affecterIntervenant.php">Affecter un intervenant</a>
                        </li>
                        <li>
                            <a href="projetsDeSession.php">Lancer une session</a>
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
                        <li>
                            <a href="PlanifierProjet.php">Planifier un projet</a>
                        </li>
                        <li>
                            <a href="EnregistrerCarte.php">Enregistrer une carte</a>
                        </li>
                        <li>
                            <a href="consulterPresence.php">Consulter la présence</a>
                        </li>
                        <li class="active has-sub">
                            <a href="affecterIntervenant.php">Affecter un intervenant</a>
                        </li>
                        <li>
                            <a href="projetsDeSession.php">Lancer une session</a>
                        </li>
                    </ul>
                </nav>
            </div>
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
					    <div class="col-md-4 mb-3">
                        <form name="fo" method="post" action="" enctype="multipart/form-data"> 
						<p> Sélectionner un projet :       </p>
						<select class=".col-md- form-control " name="projet">
                        <?php
                        while ($donnees = $reponse->fetch())
                        {  
                            echo "<option name='niveauz'>";
                            echo $donnees['id_projet']; 
                            echo "</option>";
                        } 
                        ?>
						</select>
						<p> Sélectionner un intervenant :       </p>
						<select class=".col-md- form-control " name="inter">
                        <?php
                        while ($donnees3 = $reponse3->fetch())

                        {  
                            echo "<option>";
                            echo $donnees3['n_utilisateur']; 
                            echo "</option>";
                        } 
                        ?>
						</select>
						  <br>
						  <button type="submit" name="submit" class="btn btn-warning centre center col">Affecter l'intervenant </button>
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
$reponse3->closeCursor(); // Termine le traitement de la requête
?>