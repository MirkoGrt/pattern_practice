$(document).ready(function () {
    // validate and send registration form
    $("#auth-page-register-form").validate({
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
        submitHandler: function(form) {
            $.ajax({
                url: '/register-user',
                data: JSON.stringify(data),
                contentType: "application/json",
                success: function (response) {
                    console.log('ha-ha');
                },
                error: function (response) {
                    console.log('he-he');
                }
            });
        }
    });
});