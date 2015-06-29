<head>
  <!-- <link rel="stylesheet" type="text/css" 
                       href="View/css/listStages.css " />  -->
  <script src="View/js/listStages.js"></script>
</head>

<div id="listStages">

    <h1> Stage Actuel </h1>

    <?php $stage = json_decode($stageActuel);?> 


    <table class="table table-striped" id="table-result">
      <thead>
        <th>Id</th>
        <th>DES</th>
        <th>Etablissement</th>
        <th>Service</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
          
          <tr>
            <td class="stage-id"> <?php echo $stage->{'id_Stage'}?> </td>
            <td class="stage-des"> </td>
            <td class="stage-etablissement">Etablissement</td>
            <td class="stage-service">Service</td>
            <td>
              <button type="button" class="btn btn-default btn-lg btn-choice-move" onClick="showEvaluation(<?php echo $stage->{'id_Stage'}?>)" >
                <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
              </button>
            </td>
            <td></td>
          </tr>
      </tbody>
    </table>

    <h1>Liste des Stages Effectués</h1>
    
    <table class="table table-striped" id="table-choice">
        <thead>
          <th>Id</th>
          <th>DES</th>
          <th>Etablissement</th>
          <th>Service</th>
          <th></th>
        </thead>
        <tbody>
            <tr>
              <td class="stage-id">id_stage</td>
              <td class="stage-des">DES</td>
              <td class="stage-etablissement">Etablissement</td>
              <td class="stage-service">Service</td>
              <td>
                <button type="button" class="btn btn-default btn-lg btn-choice-move">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
              </td>
              <td></td>
            </tr>
        </tbody>
    </table><br>

    
</div>