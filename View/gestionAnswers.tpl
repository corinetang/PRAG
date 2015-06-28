<head>
<script src="View/js/gestionAnswers.js"></script>
    <link rel="stylesheet" type="text/css" href="View/css/gestionAnswers.css " />
</head>

<div id="gestionAnswers">
    <h1>Gestion des evaluations</h1>
    <br>
    <div class="form-group" id="answerBDD"> 
        <table class="table table-striped" id="tableau_gestionUsers">
            <thead>
                <tr >
                    <th data-dynatable-sorts= "Alpha">Questions  présentes dans les évaluations</th>
                </tr>
            </thead>
        <tbody>
             <?php foreach ($questions as $question) { ?>
            <tr>
                <td><?php echo $question['Libelle_question'] ?></td>
            </tr>
            <?php }; ?>
        </tbody>
        </table>
    </div>
    <form id="Form_Answer" action="index.php?control=evaluation&action=addAnswer" method="post" action="index.php?control=user&action=inscription" enctype="multipart/form-data">
        <div class="form-group multiple-form-group" data-max=5 id="blockAnswerEdit">
	<h4>Questions à ajouter</h4>
        <div class="form-group input-group">
					<input type="text" name="answerMultiple[]" class="form-control">
						<span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
						</button></span>
				</div>
    </div>
    <button type="submit" class="btn btn-primary" name="valider">Enregistrer</button>
</form>
</div>