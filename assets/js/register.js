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
