<head>
<script type="text/javascript">
    function addVoeux() {
        var block = document.getElementById("blockAnswer").cloneNode(true);
        document.getElementById("answerBDD").appendChild(block);
    }
    
    function missVoeux() {
        $(this).parents("blockAnswer").remove();
    }
</script>
</head>

<div id="listVoeux">
    <h1>Pré-choix des stages</h1>
    <br>
<div class="input-group">
  <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div><!-- /btn-group -->
  <input type="text" class="form-control" aria-label="Hopital / Structure">
</div>

<div class="input-group">
  <input type="text" class="form-control" aria-label="Choix du poste">
  <div class="input-group-btn">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
  </div>
</div>
</div>