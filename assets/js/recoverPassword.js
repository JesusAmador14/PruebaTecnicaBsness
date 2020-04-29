// Enviando petición para guardar datos
$('#recoverPassword').click(function(ev) {
    ev.preventDefault();
    $('#alertError').removeClass('show');
    $.ajax({
        url: 'recoverPassword',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
            // console.log(data);
            showSuccessRegister(JSON.parse(data));
        },
        statusCode: {
            400: function(error) {
                console.log(error);
                showError400(JSON.parse(error.responseText));
            },
            401: function(error) {
                console.log(error);
                showError401(JSON.parse(error.responseText));
            }
        }
    });
});