<?php
  include("connexion.php"); 
  session_start();  
    $n_permanence = $_GET["n_permanence"];

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
                        <a href="#">
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
                        <li>
                            <a href="affecterIntervenant.php">Affecter un intervenant</a>
                        </li>
                        <li class="active has-sub">
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
                        <li>
                            <a href="affecterIntervenant.php">Affecter un intervenant</a>
                        </li>
                        <li class="active has-sub">
                            <a href="session.php">Lancer une session</a>
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
                    <div class="pull-right">
                        <button type="button" class="btn btn-outline-warning"> <a href="deconnexion.php">Déconnexion</a></button>

                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">

                <div class="section__content section__content--p30 text-center">
                    <form action=<?php echo "addusertosession.php?n_permanence=".$n_permanence ?> method="post">
                        <br><br>
                        <h2 Class="text-center">Interface de pointage : Register des entrées\sorties UFR-ST "Projet1" </h2>
                        <br><br>
                        <h4 Class="text-center">Scanner la carte ou insérer votre n° d’étudiant : </h4>
                        <br>
                        <h5>N° d’étudiant :</h5>
                        <h5>Nom de l’étudiant :</h5>
                        <h5>Prénom de l’étudiant :</h5>
                        <br><br><br><br>
                        <p>Insérer le n° d’étudiant</p>
                        <br>
                        <input type="text" name="student_num" class=" w-25 p-2 text-center" id="validationDefault01" placeholder="Insérer le n° d’étudiant" required>
                        <br><br>
                        <button class="btn btn-warning centre center col w-25 p-2">Valider </button>
                        <br><br><br><br><br><br><br>
                        <a href="./PlanifierProjet.php" class="btn btn-danger centre center col w-25 p-3">Quitté la session</a>
                    </form>

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