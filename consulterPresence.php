<?php
   include("connexion.php"); 
   session_start();  

   $reponse = $pdo->query("SELECT distinct n_permanence FROM estpresent");
   $reponse1 = $pdo->query("SELECT distinct * FROM estpresent");
   if ( isset($_POST["submit"]  ) ) {
   $perm=$_POST["perm"];
   $reponse1 = $pdo->query(" SELECT * FROM estpresent where  n_permanence ='perm' ");
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
                        <li >
                            <a href="EnregistrerCarte.php">Enregistrer une carte</a>
                        </li>
                        <li class="active has-sub">
                            <a href="consulterPresence.php">Consulter la présence</a>
                        </li>
                        <li>
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
                            <a href="PlanifierProjet.html">Planifier un projet</a>
                        </li>
                        <li>
                            <a href="EnregistrerCarte.php">Enregistrer une carte</a>
                        </li>
                        <li class="active has-sub">
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
                    <form name="fo" method="post" action="./download.php" enctype="multipart/form-data">
                        <div class="col-md-4 mb-3">
                            <p> Sélectionner une permanence :</p>
                            <select class=".col-md- form-control " name="perm">
                            <?php
                            while ($donnees = $reponse->fetch())
                            {  
                                echo "<option >";
                                echo $donnees['n_permanence']; 
                                echo "</option>";
                            } 
                            ?>
                            </select>
                        </div>
                        <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-warning centre center ">Télécharger le fichier</button>
                    </form>
				</div>
                
				<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                               
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Permanence :</th>
                                                <th>N° étudiant</th>
                                                <th>Heure d'arrivée matin</th>
                                                <th>Heure de départ matin</th>
												<th>Heure d'arrivée soir</th>
												<th>Heure de départ soir</th>
                                                <th>status</th>
												<th>Retard</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <?php
                                                while ($donnees = $reponse1->fetch())
                                                {  
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo $donnees['n_permanence']; 
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $donnees['num_etudiant']; 
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $donnees['harriveeM']; 
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $donnees['hdepartM']; 
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $donnees['heurearriveS']; 
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $donnees['heuredepartS']; 
                                                    echo "</td>";
                                                    if ($donnees['heurearriveS']=='00:00:00' and $donnees['heurearriveS']=='00:00:00' )
                                                    {
                                                        echo "<td class='denied'> Absent </td>";
                                                        echo "<td class='denied'> 8h </td>";
                                                    } else
                                                    {
                                                        echo " <td class='process'>Présent</td>";
                                                        $var = $donnees['harriveeM']-'08:30:00';
                                                        $var0 = $donnees['heurearriveS']-'14:00:00'; 
                                                        $vars=$var+$var0;
                                                        echo "<td class='denied'> ";
                                                        echo $vars;
                                                        echo "h";
                                                        echo " </td>";

                                                    }
                                                    echo "</tr>";
                                                } 
                                                ?>
                                         
                                        </tbody>
                                    </table>
                                
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
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

?>