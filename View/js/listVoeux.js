
jQuery(function () {
    $(".btn-choice-move").click(function () {

        var line        = $(this).parent().parent();
        var append_line = '<tr><td class="stage-id">'+$(this).parent().parent().find('.stage-id').text()+
                            '</td><td class="stage-des">'+$(this).parent().parent().find('.stage-des').text()+
                            '</td><td class="stage-etablissement">'+$(this).parent().parent().find('.stage-etablissement').text()+
                            '</td><td class="stage-service">'+$(this).parent().parent().find('.stage-service').text()+
                            '</td><td class="stage-nb-poste">'+$(this).parent().parent().find('.stage-nb-poste').text()+
                            '</td><td><button type="button" class="btn btn-default btn-lg btn-result-move">'+
                                '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                                '</button>'+
                                '</td><td><a ref=#><button type="button" class="btn btn-info"> Resultat</button></td></tr>';

        $(this).parent().parent().css('display', 'none');
        $('#table-result tbody:last').append(append_line);
        LoadMyJs('View/js/listVoeux.js');
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

        $(this).parent().parent().css('display', 'none');
        $('#table-choice tbody:last').append(append_line);
        LoadMyJs('View/js/listVoeux.js');
    });
});

function LoadMyJs(scriptName) {
    var docHeadObj = document.getElementsByTagName("head")[0];
    var dynamicScript = document.createElement("script");
    dynamicScript.type = "text/javascript";
    dynamicScript.src = scriptName;

    var precscript = $.getScript(scriptName);

    // Génère une erreur JS : à régler !!!!!!!!
    precscript.remove();

    docHeadObj.appendChild(dynamicScript);
}