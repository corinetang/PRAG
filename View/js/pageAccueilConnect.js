jQuery(function(){
    $("#AffichageStage2").ready(function(){
        document.getElementById("informationStage2").style.visibility = "hidden";
    });

    $("#AffichageStage2").click(function(){
        document.getElementById("informationStage2").style.visibility = "visible";
    });
    $( ".portlet" ).ready(function(){
      $(this).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
    });

    $( "#AffichageStage" ).accordion();
});
