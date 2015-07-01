jQuery(function(){
    $("#Nom").focusout(function () {
        var nameU  = $("#Nom").val();
        
        if(nameU.length < 2) {
			$("#error-nom").removeAttr('style');
		}
		else{ 
			$("#error-nom").css('display', 'none');
		}
	});
	
	$("#Prenom").focusout(function () {
        var Prenom  = $("#Prenom").val();
        
        if(Prenom.length < 2 || Prenom == '' || espace(Prenom)) {
			$("#error-prenom").removeAttr('style');
		}
		else{ 
			$("#error-prenom").css('display', 'none');
		}
	});

	$("#Telephone").focusout(function () {
        var tel  = $("#Telephone").val();
        
        if(tel.length > 10) {
			$("#error-telephone").removeAttr('style');
		}
		else{ 
			$("#error-telephone").css('display', 'none');
		}
	});
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

function espace(champ) {
	var ch = champ.value;
	if(ch.length == ch.split(" ").length){
		return true;
	}
}
