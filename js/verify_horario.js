document.getElementById("btn_validar").addEventListener('click', function (event) {
    event.preventDefault();

    console.log("El boton verificar ha sido oprimido, la respuesta llego correctamente.")
    var titulo_publicidad = document.getElementById("titulo_publicidad").value;
    var fecha_inicio = document.getElementById("fecha_inicio").value;
    var hora_inicio = document.getElementById("hora_inicio").value;
    var fecha_final = document.getElementById("fecha_final").value;
    var hora_final = document.getElementById("hora_final").value;
    var fk_sucursal = document.getElementById("fk_sucursal").value;
    var fk_dispositivo = document.getElementById("fk_dispositivo").value;
    var texto = document.getElementById("texto").value;
    var div_respuesta = document.getElementById('respuesta');
    var respuesta_PublicidadFechas = document.getElementById('respuesta_PublicidadFechas');
    // var archivo = document.getElementById('archivo');

    console.log("Obtuve las siguientes variables: " + "\nTitulo publicidad: " + titulo_publicidad +
        "\nFecha y hora inicio: " + fecha_inicio + " " + hora_inicio +
        "\nFecha y hora final: " + fecha_final + " " + hora_final +
        "\nSucursal: " + fk_sucursal +
        "\nDispositivo: " + fk_dispositivo +
        "\nTexto: " + texto);

    $.ajax({
        type: 'POST',
        url: 'php/verify_horario.php',
        data: {
            'titulo_publicidad': titulo_publicidad,
            // 'texto': texto,
            // 'fecha_inicio': fecha_inicio,
            // 'hora_inicio': hora_inicio,
            // 'fecha_final': fecha_final,
            // 'hora_final': hora_final,
            // 'fk_sucursal': fk_sucursal,
            // 'fk_dispositivo': fk_dispositivo
            // 'archivo': archivo
        },
        success: function (data) {
            div_respuesta.innerHTML = data;
            console.log("Ya obtuve la respuesta");
            console.log(data);
            $("#avisoPublicidad").modal({'show' : true});
        }
    })
});