<head>
    <link rel="stylesheet" type="text/css"
                       href="View/css/gestionUsers.css "/>
    <script src="View/js/gestionUsers.js"></script>
    <script link rel="stylesheet" type="text/css" href="View/css/libs/jquery.dataTables.css"></script>
	    <script link rel="stylesheet" type="text/css" href="View/css/libs/dataTables.bootstrap.css"></script>
    <script type="text/javascript" charset="utf8" src="View/js/libs/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="View/js/libs/dataTables.bootstrap.js"></script>
</head>

<div id="gestionUsers">
    <h1>Gestion des membres</h1>
    <br>
    <br>
    <br>
    <table class="table table-striped table-hover" cellspacing="0" id="tableau_gestionUsers">
        <thead>
            <tr>
                <th data-dynatable-sorts= "Alpha">Nom</th>
                <th>Prenom</th>
                <th>Identifiant</th>
                <th>Filière</th>
                <th>Date de naissance</th>
                <th>Adresse mail</th>
                <th>Téléphone</th>
                <th>Membre du SIPHIF ?</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
            <tr id="membre-<?php echo $user['id_user'] ?>">
                <td><?php echo $user['nom_user'] ?></td>
                <td><?php echo $user['prenom_user'] ?></td>
                <td><?php echo $user['identifiant_user'] ?></td>
                <td><?php echo $user['nom_filiere'] ?></td>
                <td><?php echo $user['dateDeNaissance_user'] ?></td>
                <td><?php echo $user['mail_user'] ?></td>
                <td><?php echo $user['numtel_user'] ?></td>
                <td>
                    <?php
                        if ($user['id_Groupe'] == 2)
                            echo "oui";
                        else
                            echo "non";
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-target="#myModalRemove" id="button-remove" onclick="$('#myModalRemove').modal('show')">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="button_edit"
                    onClick="initUserModal(<?php echo $user['id_user'] ?>, '<?php echo $user['nom_user'] ?>', '<?php echo $user['prenom_user'] ?>', '<?php echo $user['NbSemestre_user'] ?>', '<?php echo $user['dateDeNaissance_user'] ?>', '<?php echo $user['mail_user'] ?>', '<?php echo $user['numtel_user'] ?>', <?php echo $user['id_Groupe'] ?>)">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <?php }; ?>
        </tbody>
    </table>
    <!-- Modal MODIF USERS-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modification des informations</h4>
      </div>
      <div class="modal-body">
        <fieldset>
			<form class="form-horizontal" onsubmit="return valideForm(this)">
                <div class="form-group">
                    <label for="Nom" class="col-sm-3 control-label">Nom</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Nom" onblur="verifName(this)" id="membre-nom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Prenom" class="col-sm-3 control-label">Pr&eacute;nom</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Prenom" onblur="verifName(this)" id="membre-prenom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Ddn" class="col-sm-3 control-label">Date de naissance</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="Ddn" id="membre-ddn">
                    </div>
                </div>
                <div class="form-group">
                    <label for="NbSemestre" class="col-sm-3 control-label">Nombre de semestre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="NbSemestre" onblur="verifNbSemestre(this)" placeholder="Nombre de Semestre Valides" id="membre-semestre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="membre-mail" name="Email" onblur="verifMail(this)" placeholder="Adresse Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Telephone" class="col-sm-3 control-label">T&eacute;l&eacute;phone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Telephone" onblur="verifNumTel(this)" id="membre-telephone">
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                      <input type="checkbox" id="membre-siphif"> Membre du SIPHIF ?
                    </label>
                </div>
			</form>
		</fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" id="membre-edit" class="btn btn-primary" onClick="editMembre()">Sauvegarder</button>
      </div>
    </div>
  </div>
</div>
    <!-- Modal REMOVE USERS -->
<div class="modal fade" id="myModalRemove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modal_header_remove">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Attention</h4>
      </div>
      <div class="modal-body">
          <P> Vous allez supprimer définitivement cet utilisateur !</P>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" onClick="supprimerMembre(<?php echo $user['id_user'] ?>)">Supprimer</button>
      </div>
    </div>
  </div>
</div>
</div>
    <script>
        $(document).ready(function() {
            $('#tableau_gestionUsers').DataTable();
        });
    </script>
