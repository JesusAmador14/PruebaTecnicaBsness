// Aquí se manda llamar el api de los códigos postales

$("input[type=text]#codigoPostal").change(function(e) {
    e.preventDefault();
    if (e.target.value.length <= 5) {
        var url = 'https://api-sepomex.hckdrk.mx/query/info_cp/' + e.target.value;
        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                cargarDatosPostales(data);
            },
            error: function(e) {
                console.log(e);
            }
        });
    } else {
        alert('Ingrese un código postal valido');
        $("input[type=text]#codigoPostal").val('');
    }
});

// Se encarga de crear el select de las colonias y llenar los campos correspondientes
function cargarDatosPostales(params) {
    if (params.length > 0) {
        $("input[type=text]#municipio").val(params[0].response.municipio);
        $("input[type=text]#estado").val(params[0].response.estado);
        var options = '<label for="colonia">Colonia</label>';
        options += '<select class="custom-select" name="colonia" id="colonia">';
        options += `<option selected>Selecciona una colonia</option>`;
        params.forEach(function(item, index) {
            options += `<option value="${item.response.asentamiento}">${item.response.asentamiento}</option>`;
        });

        options += '</select>';
        var contenedorColonia = document.getElementById('contenedorColonia');
        contenedorColonia.innerHTML = options;
    }
}


// Enviando petición para guardar datos
$('#formRegister').submit(function(ev) {
    ev.preventDefault();
    $('#alertError').removeClass('show');
    $.ajax({
        url: 'create/store',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
            console.log(data);
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


// Error 400 es para errores en las validaciones de los campos

function showError400(errors) {
    console.log(errors);
    $('#email').removeClass('is-invalid');
    $('#nombre').removeClass('is-invalid');
    $('#apellidos').removeClass('is-invalid');
    $('#municipio').removeClass('is-invalid');
    $('#estado').removeClass('is-invalid');
    $('#codigoPostal').removeClass('is-invalid');
    $('#telefono').removeClass('is-invalid');
    if (errors.email.length != 0) {
        $('#contenedorEmail > div').html(errors.email);
        $('#email').addClass('is-invalid');
    }
    if (errors.nombre.length != 0) {
        $('#contenedorNombre > div').html(errors.nombre);
        $('#nombre ').addClass('is-invalid');
    }
    if (errors.municipio.length != 0) {
        $('#contenedorMunicipio > div').html(errors.nombre);
        $('#municipio').addClass('is-invalid');
    }
    if (errors.estado.length != 0) {
        $('#contenedorEstado > div').html(errors.nombre);
        $('#estado').addClass('is-invalid');
    }
    if (errors.telefono.length != 0) {
        $('#contenedorTelefono > div').html(errors.nombre);
        $('#telefono').addClass('is-invalid');
    }
    if (errors.codigoPostal.length != 0) {
        $('#contenedorCodigoPostal > div').html(errors.nombre);
        $('#codigoPostal').addClass('is-invalid');
    }
    if (errors.apellidos.length != 0) {
        $('#contenedorApellidos > div').html(errors.nombre);
        $('#apellidos').addClass('is-invalid');
    }
}
// Error 401 es para error de autenticación del usuario
function showError401(errors) {
    $('#alertError').addClass('show');
    $('#alertError').html(errors.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
}

// Decide que hacer con la respuesta correcta
// Depende de si el email se envió o no
function showSuccessRegister(data) {
    if (data.email == true) {
        Swal.fire({
            icon: 'success',
            title: '¡Correcto!',
            text: 'Se ha registrado correctamente el usuario'
        }).then(res => {
            location.href = data.url;
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: '¡Advertencia!',
            text: 'Se ha registrado correctamente el usuario, pero no se ha enviado el email con sus accesos.'
        }).then(res => {
            location.href = data.url;
        });
    }
}