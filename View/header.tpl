<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css"
    					href="View/css/libs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
                       href="View/css/headerfooter.css " />
	<script type="text/javascript" src="View/js/libs/jquery-1.11.3.js"></script>
	<script src="View/js/libs/bootstrap.min.js"></script>
  <script src="View/js/header.js"></script>
  <script src="View/js/libs/jquery-ui.js"></script>

  <script type="text/javascript">
    window.onload = function() {
      var idRole = <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']))
        echo $_SESSION["user"]["id_Groupe"];
      else
        echo -1;
       ?>;
      initializeHeader(idRole);
    };
  </script>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<div id="container">
    <div id="header">
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
     <img src="View/css/images/logo-siphif_Header_v2.jpg" id="header" alt="logo-siphif_Heade" height="55px" width="55px">
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
        <li><a href="index.php" class="accueil-option change-at-focus">ACCUEIL</a></li>
        <li class="dropdown profil-option hide-option">
          <a href="#" class="dropdown-toggle change-at-focus" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profils<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?control=user&action=showProfil">Modifier</a></li>
          </ul>
        </li>
        <li class="dropdown stage-option hide-option">
          <a href="#" class="dropdown-toggle change-at-focus" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Stages<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="stage-voeux-option hide-option"><a href="index.php?control=stage&action=showVoeux">Liste de voeux</a></li>
            <li class="stage-consultation-option hide-option"><a href="index.php?control=stage&action=showConsultation">Consultation</a></li>
            <li class="stage-evaluation-option hide-option"><a href="index.php?control=stage&action=showStages">Evaluation</a></li>
          </ul>
        </li>
        <li class="dropdown admin-option hide-option">
              <a href="#" class="dropdown-toggle change-at-focus" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="Header_Admin">ADMIN<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?control=user&action=showUsers">Gestion des utilisateurs</a></li>
              <li><a href="index.php?control=question&action=showQuestions">Gestion des evaluations</a></li>
            <li><a href="index.php?control=import&action=showImportClassement">Import Classement</a></li>
            <li><a href="index.php?control=import&action=showImportStage">Import Stage</a></li>
            <li><a href="index.php?control=classement&action=CloseVoeux">Clôturer les demandes</a></li>
          </ul>
        </li>
      </ul>
     <ul class="nav navbar-nav navbar-right utilisateur-option hide-option">
         <p class="navbar-text">
             <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
                    echo $_SESSION["user"]["identifiant_user"];
                }else {?> <?php }?>
         </p>
        <p class="navbar-text">
          Filière :
          <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"]))
              echo $_SESSION["user"]['nom_filiere'];
          ?>
        </p>
        <li><a href="index.php?control=user&action=deconnexion" class="change-at-focus">Deconnexion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    </div>
 <div id="content">
