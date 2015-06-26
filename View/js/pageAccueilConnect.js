jQuery(function(){
    $("#AffichageStage2").onload(function(){
        document.getElementById("informationStage2").style.visibility = "hidden";
    });
    
    $("#AffichageStage2").onclick(function(){
        document.getElementById("informationStage2").style.visibility = "visible";
    });
    $( ".portlet" ).onload(function(){
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
    });
}
