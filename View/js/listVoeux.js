jQuery(function () {
    $(".btn-choice-move").click(function () {

        var line        = $(this).parent().parent();
        var append_line = '<tr><td class="stage-rank">'+
                            '</td><td class="stage-id">'+$(this).parent().parent().find('.stage-id').text()+
                            '</td><td class="stage-des">'+$(this).parent().parent().find('.stage-des').text()+
                            '</td><td class="stage-etablissement">'+$(this).parent().parent().find('.stage-etablissement').text()+
                            '</td><td class="stage-service">'+$(this).parent().parent().find('.stage-service').text()+
                            '</td><td class="stage-nb-poste">'+$(this).parent().parent().find('.stage-nb-poste').text()+
                            '</td><td><button type="button" class="btn btn-default btn-lg btn-result-move">'+
                                '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                                '</button>'+
                                '</td><td><a ref=#><button type="button" class="btn btn-info"> Resultat</button></td></tr>';

        $(this).parent().parent().remove();

        // It's probably the wrong table for instant

        $('#table-result tbody:last').append(append_line);
        attributeRank($('#table-result'));
        loadMyJs('View/js/listVoeux.js');
    });
    $(".btn-result-move").click(function () {

        var line        = $(this).parent().parent();
        var append_line = '<tr><td class="stage-id">'+$(this).parent().parent().find('.stage-id').text()+
                            '</td><td class="stage-des">'+$(this).parent().parent().find('.stage-des').text()+
                            '</td><td class="stage-etablissement">'+$(this).parent().parent().find('.stage-etablissement').text()+
                            '</td><td class="stage-service">'+$(this).parent().parent().find('.stage-service').text()+
                            '</td><td class="stage-nb-poste">'+$(this).parent().parent().find('.stage-nb-poste').text()+
                            '</td><td><button type="button" class="btn btn-default btn-lg btn-choice-move">'+
                                '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>'+
                                '</button></td></tr>';

        $(this).parent().parent().remove();
        $('#table-choice tbody:last').append(append_line);
        loadMyJs('View/js/listVoeux.js');
    });

    $(function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });
});

function loadMyJs(scriptName) {
    var docHeadObj = document.getElementsByTagName("head")[0];
    var dynamicScript = document.createElement("script");
    dynamicScript.type = "text/javascript";
    dynamicScript.src = scriptName;
    dynamicScript.id = 'myscript';

    document.getElementById('myscript').remove();

    docHeadObj.appendChild(dynamicScript);
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