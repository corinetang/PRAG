<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" 
                       href="View/css/headerfooter.css " /> 
    <link rel="stylesheet" type="text/css"
    					href="View/css/libs/bootstrap.min.css">
	<script type="text/javascript" src="View/js/libs/jquery-1.11.3.js"></script> 
	<script src="View/js/libs/bootstrap.min.js"></script>
  <script src="View/js/header.js"></script>
  <script type="text/javascript">
    window.onload = function() {
        var idRole = <?php echo $_SESSION["user"][0]["id_Groupe"]; ?>;
        initializeHeader(idRole);
    };
</script>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
        <li><a href="#" class="accueil-option change-at-focus">Accueil</a></li>
        <li class="dropdown profil-option hide-option">
          <a href="#" class="dropdown-toggle change-at-focus" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profils<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?control=user&action=showProfil">Modifier</a></li>
          </ul>
        </li>
        <li class="dropdown stage-option hide-option">
          <a href="#" class="dropdown-toggle change-at-focus" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Stages<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="stage-voeux-option hide-option"><a href="#">Liste de voeux</a></li>
            <li class="stage-consultation-option hide-option"><a href="#">Consultation</a></li>
            <li class="stage-evaluation-option hide-option"><a href="#">Evaluation</a></li>
          </ul>
        </li>
        <li class="dropdown admin-option hide-option">
              <a href="#" class="dropdown-toggle change-at-focus" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?control=user&action=showUsers">Gestion des utilisateurs</a></li>
            <li><a href="index.php?control=import&action=showImportClassement">Import Classement</a></li>
            <li><a href="index.php?control=import&action=showImportStage">Import Stage</a></li>
          </ul>
        </li>
      </ul>
     <ul class="nav navbar-nav navbar-right utilisateur-option hide-option">
         <p class="navbar-text">Utilisateur</p>
        <p class="navbar-text">Filiere</p>
        <li><a href="#" class="change-at-focus">Deconnexion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>