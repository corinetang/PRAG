jQuery(function(){
    $("#AffichageStage2").onload(function(){
        document.getElementById("informationStage2").style.visibility = "hidden";
    });
    
    $("#AffichageStage2").onclick(function(){
        document.getElementById("informationStage2").style.visibility = "visible";
    });