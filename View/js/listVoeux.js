jQuery(function () {

    $(function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });

    $('#sortable').sortable({
        start: function(event, ui) {},
        change: function(event, ui) {},
        update: function(event, ui) {
            attributeRank($('#table-result'));
        }
    });
});

function choiceMove(id) {
    var line        = document.getElementById(id);
    var append_line = '<tr id="'+line.getElementsByClassName("stage-id")[0].innerHTML+
                        '"><td class="stage-rank">'+
                        '</td><td class="stage-id">'+line.getElementsByClassName("stage-id")[0].innerHTML+
                        '</td><td class="stage-des">'+line.getElementsByClassName("stage-des")[0].innerHTML+
                        '</td><td class="stage-etablissement">'+line.getElementsByClassName("stage-etablissement")[0].innerHTML+
                        '</td><td class="stage-service">'+line.getElementsByClassName("stage-service")[0].innerHTML+
                        '</td><td class="stage-nb-poste">'+line.getElementsByClassName("stage-nb-poste")[0].innerHTML+
                        '</td><td><button type="button" class="btn btn-default btn-lg btn-result-move" onclick="resultMove('+
                        line.getElementsByClassName("stage-id")[0].innerHTML+
                        ')">'+
                            '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                            '</button>'+
                            '</td><td><a ref=#><button type="button" class="btn btn-info"> Resultat</button></td></tr>';

    line.remove();

    $('#table-result tbody:last').append(append_line);
    attributeRank($('#table-result'));
}

function resultMove(id) {
    var line        = document.getElementById(id);
    var append_line = '<tr id="'+line.getElementsByClassName("stage-id")[0].innerHTML+
                        '"><td class="stage-id">'+line.getElementsByClassName("stage-id")[0].innerHTML+
                        '</td><td class="stage-des">'+line.getElementsByClassName("stage-des")[0].innerHTML+
                        '</td><td class="stage-etablissement">'+line.getElementsByClassName("stage-etablissement")[0].innerHTML+
                        '</td><td class="stage-service">'+line.getElementsByClassName("stage-service")[0].innerHTML+
                        '</td><td class="stage-nb-poste">'+line.getElementsByClassName("stage-nb-poste")[0].innerHTML+
                        '</td><td><button type="button" class="btn btn-default btn-lg btn-choice-move" onclick="choiceMove('+
                        line.getElementsByClassName("stage-id")[0].innerHTML+
                        ')">'+
                            '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>'+
                            '</button></td></tr>';

    line.remove();
    $('#table-choice tbody:last').append(append_line);
    attributeRank($('#table-result'));
}

function attributeRank(table) {

    var size = table.length;
    var rank = 1;

    table.find('tbody').find('tr').each(function () {
        n = rank.toString();
        $(this).find('.stage-rank').text(n);
        rank = rank + 1;
    });
}