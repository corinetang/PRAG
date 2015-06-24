jQuery(function(){
    $("#ValidationPassword").focusout(function(){
        var passwordVal  = $("#Password").val();
        var checkVal     = $("#ValidationPassword").val();
        
        if(passwordVal != checkVal) {
            $("#error-password").removeAttr('style');
        }
        else {
            $("#error-password").css('display', 'none');
        }
    });

    /*$(document).ready(function(){
        $.ajax({url: "index.php?control=user&action=getListFilieres",
                type: "POST",
                success: function(result){
                    $("#div1").html(result);
                    console.log(result);
        }});
    });*/
});