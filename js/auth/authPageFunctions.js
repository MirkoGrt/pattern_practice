$(document).ready(function () {
    // validate and send registration form
    $("#auth-page-register-form").validate({
        errorPlacement: function (error, element) {
            var errorText = error[0].innerText;
            var mdlErrorLabel = element.siblings('span.mdl-textfield__error');
            mdlErrorLabel.css("visibility", "visible").text(errorText);
        },
        success: function (label, element) {
            var mdlErrorLabel = $(element).siblings('span.mdl-textfield__error');
            mdlErrorLabel.css("color", "green").text("OK!");
        },
        rules: {
            auth_register_nickname: "required",
            auth_register_email: {
                required: true,
                email: true
            },
            auth_register_pass: {
                required: true,
                minlength: 5
            },
            auth_register_confirm_pass: {
                required: true,
                minlength: 5,
                equalTo: "#auth-register-pass"
            }
        },
        submitHandler: function() {
            registerUser();
        }
    });
});

function registerUser() {
    $("#user-registration-progress").css('display', 'block');
    var data = {
        nickname: $("#auth-register-nickname").val(),
        email: $("#auth-register-email").val(),
        pass: $("#auth-register-pass").val(),
        slogan: $("#auth-register-slogan").val()
    };
    $.ajax({
        type: "POST",
        url: '/register-user',
        data: data,
        dataType: 'json',
        success: function (response) {
            $("#user-registration-progress").css('display', 'none');
            cleanForm('#auth-page-register-form');
            showMdlSnackbar(response, 'success', '#auth-page-snackbar');
        },
        error: function (response) {
            $("#user-registration-progress").css('display', 'none');
            cleanForm('#auth-page-register-form');
            showMdlSnackbar(response, 'error', '#auth-page-snackbar');
        }
    });
}