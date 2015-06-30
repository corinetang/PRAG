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
        <h4 class="modal-title" id="myModalLabel">Evaluation de votre stage</h4>
      </div>
      <div class="modal-body">
        <fieldset>
			<form class="form-horizontal" >
                 <?php foreach ($questions as $question) { ?>
                <div class="form-group">
                    <label for="Nom" class="col-sm-3 control-label"><?php echo $question['Libelle_question'] ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Question" value ="Votre réponse">
                    </div>
                </div>
                <?php } ?>
			</form>
		</fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sauvegarder</button>
        <button type="button" class="btn btn-primary">Envoyer</button>
      </div>
    </div>
  </div>
</div>
</div>