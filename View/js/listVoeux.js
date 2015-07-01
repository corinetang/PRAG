
jQuery(function () {

    $(function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });

    $('#sortable').sortable({
        start: function(event, ui) {},
        change: function(event, ui) {},
        update: function(event, ui) {
            attributeRank($('#table-result'), $("#userId").text());
        }
    });
});

function choiceMove(id, idUser) {
    var line        = document.getElementById("stage-" + id);
    var append_line = '<tr id="'+ line.getElementsByClassName("stage-id")[0].innerHTML+
                        '"><td class="stage-rank">'+
                        '</td><td class="stage-id">'+line.getElementsByClassName("stage-id")[0].innerHTML+
                        '</td><td class="stage-des">'+line.getElementsByClassName("stage-des")[0].innerHTML+
                        '</td><td class="stage-etablissement">'+line.getElementsByClassName("stage-etablissement")[0].innerHTML+
                        '</td><td class="stage-service">'+line.getElementsByClassName("stage-service")[0].innerHTML+
                        '</td><td class="stage-nb-poste">'+line.getElementsByClassName("stage-nb-poste")[0].innerHTML+
                        '</td><td><button type="button" class="btn btn-default btn-lg btn-result-move" onclick="resultMove('+
                        line.getElementsByClassName("stage-id")[0].innerHTML+
                        ','+ idUser +
                        ')">'+
                            '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                            '</button>'+
                            '</td><td><form method="post" action="index.php?control=classement&action=DisplayResultatPreChoix">'+
                                '<input type="hidden" class="btn btn-info" name="stage_id" value="<?php echo $choosenStage[\'id_Stage\'] ?>">'+ 
                                '<input type="hidden" class="btn btn-info" name="user_id" value="<?php echo $_SESSION[\'user\'][\'id_user\'] ?>">'+ 
                                '<input type="submit" class="btn btn-info" value="Préchoix"/>'+
                            '</form></td></tr>';

    line.remove();

    $('#table-result tbody:last').append(append_line);
    $.ajax({
       url : 'index.php?control=stage&action=enregistrerVoeu',
       type : 'POST',
       data : 'stage_id='+ parseInt(line.getElementsByClassName("stage-id")[0].innerHTML) +
                '&user_id='+ idUser +
                '&rank='+ getLastRank($('#table-result'))
    });
    attributeRank($('#table-result'), idUser);
}

function resultMove(id, idUser) {
    var line        = document.getElementById(id);
    var append_line = '<tr id="'+line.getElementsByClassName("stage-id")[0].innerHTML+
                        '"><td class="stage-id">'+line.getElementsByClassName("stage-id")[0].innerHTML+
                        '</td><td class="stage-des">'+line.getElementsByClassName("stage-des")[0].innerHTML+
                        '</td><td class="stage-etablissement">'+line.getElementsByClassName("stage-etablissement")[0].innerHTML+
                        '</td><td class="stage-service">'+line.getElementsByClassName("stage-service")[0].innerHTML+
                        '</td><td class="stage-nb-poste">'+line.getElementsByClassName("stage-nb-poste")[0].innerHTML+
                        '</td><td><button type="button" class="btn btn-default btn-lg btn-choice-move" onclick="choiceMove('+
                        line.getElementsByClassName("stage-id")[0].innerHTML+
                        ','+ idUser +
                        ')">'+
                            '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>'+
                            '</button></td></tr>';

    line.remove();
    $('#table-choice tbody:last').append(append_line);

    $.ajax({
       url : 'index.php?control=stage&action=retirerVoeu',
       type : 'POST',
       data : 'stage_id='+line.getElementsByClassName("stage-id")[0].innerHTML+
                '&user_id='+idUser
    });

    attributeRank($('#table-result'), idUser);
}

function attributeRank(table, idUser) {

    var rank = 1;

    table.find('tbody').find('tr').each(function () {
        n = rank.toString();
        $(this).find('.stage-rank').text(n);

        $.ajax({
           url : 'index.php?control=stage&action=updateRankVoeu',
           type : 'POST',
           data : 'user_id='+idUser+
                    '&stage_id='+$(this).find('.stage-id').text()+
                    '&rank='+rank
        });
        rank = rank + 1;
    });
}

function getLastRank(table) {
    var size = table.length;
    return size;
}
