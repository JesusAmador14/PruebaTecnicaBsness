    $('#formLogin').submit(function(ev) {
        ev.preventDefault();
        $('#alertError').removeClass('show');
        $.ajax({
            url: 'login/validate',
            type: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                var response = JSON.parse(data);
                location.href = response.url;
            },
            statusCode: {
                400: function(error) {
                    showError400(JSON.parse(error.responseText));
                },
                401: function(error) {
                    console.log(error);
                    showError401(JSON.parse(error.responseText));
                }
            }
        });
    });


    // Error 400 es para errores en las validaciones de los campos

    function showError400(errors) {
        $('#email > input').removeClass('is-invalid');
        $('#password > input').removeClass('is-invalid');
        if (errors.email.length != 0) {
            $('#email > div').html(errors.email);
            $('#email > input').addClass('is-invalid');
        }
        if (errors.password.length != 0) {
            $('#password > div').html(errors.password);
            $('#password > input').addClass('is-invalid');
        }
    }
    // Error 401 es para error de autenticación del usuario
    function showError401(errors) {
        $('#alertError').addClass('show');
        $('#alertError').html(errors.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
    }