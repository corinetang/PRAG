<head>
    <link rel="stylesheet" type="text/css"
                       href="View/css/gestionUsers.css "/>
    <script src="View/js/gestionUsers.js"></script>
    <script link rel="stylesheet" type="text/css" href="View/css/libs/jquery.dataTables.css"></script>
    <script type="text/javascript" charset="utf8" src="View/js/libs/jquery.dataTables.js"></script>
</head>

<div id="gestionUsers">
    <h1>Gestion des membres</h1>
    <br>
    <br>
    <br>
    <table class="display" id="tableau_gestionUsers">
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
                <td><input type="checkbox"></td>
                <td>
                    <button type="button" class="btn btn-danger" onClick="supprimerMembre(<?php echo $user['id_user'] ?>)">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="button_edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <?php }; ?>
        </tbody>
    </table>
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modification des informations</h4>
      </div>
      <div class="modal-body">
        <fieldset>
			<form class="form-horizontal" >
                <div class="form-group">
                    <label for="Nom" class="col-sm-3 control-label">Nom</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Nom" value ="<?php echo $user['nom_user'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Prenom" class="col-sm-3 control-label">Pr&eacute;nom</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Prenom" value ="<?php echo $user['prenom_user'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Ddn" class="col-sm-3 control-label">Date de naissance</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="Ddn" value ="<?php echo $user['nom_user'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="NbSemestre" class="col-sm-3 control-label">Nombre de semestre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="NbSemestre" placeholder="Nombre de Semestre Valides">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" name="Email" placeholder="Adresse Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Telephone" class="col-sm-3 control-label">T&eacute;l&eacute;phone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Telephone">
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                      <input type="checkbox" value="2"> Membre du SIPHIF ?
                    </label>
                </div>
			</form>
		</fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
    <script>
        $(document).ready(function () {
    $('#tableau_gestionUsers').DataTable();
} );
    </script>
