<head>
    <script src="View/js/evaluation.js"></script>
</head>

<div id="evaluation" onload="showModal">
    <h1>Evaluation</h1>
    <br>
    <br>
    <br>
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
                        <input type="text" class="form-control" name="Prenom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Ddn" class="col-sm-3 control-label">Date de naissance</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="Ddn">
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