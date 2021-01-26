<?php
   session_start();   
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

<body class="animsition" onLoad="document.fo.accueil.focus()">

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
                            <a href="ajouterUtilisateur.php">Ajouter Un utilisateur</a>
                        </li>
                        <li>
                            <a href="gererUtilisateurs.php">Gérer les utilisateurs</a>
                        </li>
                        <li>
                            <a href="#.php">Importer liste des utilisateurs</a>
                        </li>
                        <li>
                            <a href="creerType.php">Créer un type</a>
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
                            <a href="ajouterUtilisateur.php">Ajouter Un utilisateur</a>
                        </li>
                        <li>
                            <a href="gererUtilisateurs.php">Gérer les utilisateurs</a>
                        </li>
                        <li>
                            <a href="#.php">Importer liste des utilisateurs</a>
                        </li>
                        <li>
                            <a href="creerType.php">Créer un type</a>
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
                <form name="fo">
                <div class="section__content section__content--p30">
                    <div class="pull-right">
                       
                    <button type="button" class="btn btn-outline-warning"> <a href="deconnexion.php">Déconnexion</a></button>
                        
                    </div>
                </div>
                </form>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content">
                <div class="section__content section__content--p30 ">
                    <div class="form-group col-md-4 ">
                        <form action="./AddUser.php" method="Post">
                            <p>Nom :</p>
                            <input type="text" class="form-control" name="nom" id="validationDefault01" placeholder="Insérer le nom" required>
                            <p>Prénom :</p>
                            <input type="text" class="form-control" name="prenom" id="validationDefault01" placeholder="Insérer le Prénom" required>
                            <p>Numéro de téléphone:</p>
                            <input type="text" class="form-control" name="tele" id="validationDefault01" placeholder="Insérer le Numéro de téléphone" required>
                            <label>Adresse email :</label>
                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            <p> Statut de l'utilisateur : </p>
                            <select name="status" class=".col-md- form-control ">
                            <option value="administrateur">Administrateur</option>
                            <option value="résponsable">Enseignant résponsable</option>
                            <option value="enseignant">Enseignant </option>
                            </select>
                            <br>
                            <button class="btn btn-warning centre center col">Ajouter l'utilisateur </button>
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