jQuery(function () {
    $("#ValidationPassword").focusout(function () {
        var passwordVal  = $("#Password").val();
        var checkVal     = $("#ValidationPassword").val();
        
        if (passwordVal !== checkVal) {
            $("#error-password").removeAttr('style');
            /*jQuery(<div/>, {id : 'ValidationPassword', class: 'form-group has-error', text: 'Attention : Votre mot de passe et votre confirmation de mot de passe sont différents'}).appendTo("#error-password");*/
        }
        else {
            $("#error-password").css('display', 'none');
        }
    });
});