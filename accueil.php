<?php
   session_start();
   @$username=$_POST["username"];
   @$password=$_POST["password"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from utilisateur where username=? and password=? limit 1");
      $sel->execute(array($username,$password));
      $tab=$sel->fetchAll();
     
      if(count($tab)>0){
        $entry_postcode = $_POST['username'];
        $entry_postcode1 = $_POST['password'];
        $reponse =$pdo->query( "SELECT statut FROM utilisateur WHERE username = '$entry_postcode' and password = '$entry_postcode1'");
        $donnees = $reponse->fetch();
        if(count($tab)>0){
            $_SESSION["username"]=ucfirst(strtolower($tab[0]["username"]));
            $_SESSION["autoriser"]="oui";
        }
        if( $donnees['statut'] == "responsable")
        {
            $_SESSION["autoriser"]="oui";
            header("location:PlanifierProjet.php");
        } elseif ($donnees['statut'] == "administrateur")
        {
            $_SESSION["autoriser"]="oui";
            header("location:ajouterUtilisateur.php");
        }else {
            $_SESSION["autoriser"]="oui";
            header("location:projetsDeSessionIntervenant.php");
        }

      }
      else
         $erreur="attention !!!!!! Mauvais login ou mot de passe!";
   }
?>

<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stylish Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">

</head>

<body id="page-top" onLoad="document.fo.accueil.focus()">
    <!-- Header -->
    <header class="masthead d-flex">
        <div class="container text-center my-auto">
            <div class="text-danger"><h3><?php echo $erreur ?></h3></div>
            <h1 class="mb-1">Université d'Evry Val d'Essonne</h1>
            <h3 class="mb-5">

            
                <em>Bienvenu sur la plateforme de gestion des projets</em>
            </h3>
            <a class="btn btn-primary btn-xl js-scroll-trigger" data-toggle="modal" data-target="#exampleModal">Se connecter</a>
        </div>
    </header>
    

    

    <!-- Vertically centered scrollable modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="login-logo text-center">
                        <a href="#">
                            <img class="w-25 p-3 " src="images/icon/logo_univ.png" alt="CoolAdmin">
                        </a>
                    </div>
                </div>

                <form name="fo" method="post" action="">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Identifiant :</label>
                            <input type="text" name="username" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mots de passe :</label>
                            <input type="password" name="password" class="form-control" id="recipient-name">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="valider" class="btn btn-primary">Connexion</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>

</body>

</html>
