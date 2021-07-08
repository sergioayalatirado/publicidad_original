function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    var mensaje = document.getElementById("mensaje_titulo");
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        // document.getElementById("titulo_publicidad").value = "";
        var texto = document.getElementById("titulo_publicidad");
        var mensaje_titulo = document.getElementById("mensaje_titulo");
        mensaje.innerHTML = "Ingresa solo texto";
        setTimeout(function () {
            mensaje.innerHTML = "";
            //mensaje_titulo.classList.remove("d-none");
        }, 3000);
        return false;
    }
}

function checkDate() {
    var fecha_inicio = document.getElementById('fecha_hora_inicio');
    var fecha_final = document.getElementById('fecha_hora_final');
    if (fecha_final < fecha_inicio) {
        alert("La fecha final no puede ser menor que la fecha de inicio.");
        return false;
    }
    return true;
}

//Deshabilitado el 02/07/2021 para realizar pruebas a las 11:37AM
// function fileValidation() {
//     var fileInput = document.getElementById('archivo');
//     var filePath = fileInput.value;
//     var allowedExtensionsImg = /(.jpg|.jpeg|.png|.gif)$/i;
//     if (!allowedExtensionsImg.exec(filePath)) {
//         alert('Por favor carga un archivo solo con las siguientes extensiones: .jpeg/.jpg/.png/.gif.');
//         fileInput.value = '';
//         return false;
//     } else {
//         //Vista de imagen
//         if (fileInput.files && fileInput.files[0]) {
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" width="450" height="300"/>';

//             };
//             reader.readAsDataURL(fileInput.files[0]);
//         }
//     }
// }


//Lector de archivos .txt en navegador
let area = document.getElementById('area');
area.addEventListener('dragover', e => e.preventDefault());
area.addEventListener('drop', readFile);

function readFile(e) {
    e.preventDefault();
    let file = e.dataTransfer.files[0];

    if (file.type === 'text/plain') {
        let reader = new FileReader();
        reader.onloadend = () => printFileContents(reader.result);
        reader.readAsText(file, 'ISO-8859-1');
    } else {
        alert('Solo archivos de texto!');
    }
}

function printFileContents(contents) {
    area.style.lineHeight = '30px';
    area.textContent = '';
    let lines = contents.split('/\n/');

    lines.forEach(line => area.textContent += line + '\n');
}

document.getElementById('archivo').addEventListener('change', function (event) {

    var tipoArchivo = this.files[0].type; //Recibe el tipo de archivo
    var tamanoArchivo = this.files[0].size; //Recibe el tama;o de archivo
    // var bytesAmb = (tamanoArchivo / 1.048); //PRUEBA 
    var limiteBytesImg = 1048576; //1MB IMAGEN
    var limiteBytesImg2 = 2097152; //2MB IMAGEN
    var limiteBytesVid = 52428800; //50MB VIDEO
    var limiteBytesAu = 10485760; //10MB AUDIO

    //Limites archivos a MB
    var maxImgInMB = 1099000;
    var archivoEnMb = parseFloat()
    var splitTArchivo = tipoArchivo.split("/");

    //Prueba de validacion de Fecha y Hora
    console.log(hoy);
    console.log(tipoArchivo);
    console.log(tamanoArchivo);
    console.log(splitTArchivo[0]);
    console.log(limiteBytesImg);
    console.log(limiteBytesVid);
    console.log(limiteBytesAu);

    if (splitTArchivo[0] == "image" || splitTArchivo[0] == "video" || splitTArchivo[0] == "audio") {
        console.log("El archivo ha sido validado exitosamente, es compatible!");
        if (splitTArchivo[0] == "image" && tamanoArchivo < limiteBytesImg) {
            document.getElementById("aviso_valido").innerHTML = "Esta imagen es valida.";
            console.log("La imagen es apta para subirse ya que su tamaño es: " + tamanoArchivo + " y su limite en Bytes es: " + limiteBytesImg);
        } else if (splitTArchivo[0] == "video" && tamanoArchivo < limiteBytesVid) {
            document.getElementById("aviso_valido").innerHTML = "Este video es valido.";
            setTimeout(function () {
                document.getElementById("aviso_valido").innerHTML = "";
            }, 4000);
            console.log("El video es apto para subirse ya que su tamaño es:  " + tamanoArchivo + " y su limite en Bytes es: " + limiteBytesVid);
        } else if (splitTArchivo[0] == "audio" && tamanoArchivo < limiteBytesAu) {
            document.getElementById("aviso_valido").innerHTML = "Este audio es valido.";
            setTimeout(function () {
                document.getElementById("aviso_valido").innerHTML = "";
            }, 4000);
            console.log("El audio es apto para subirse ya que su tamaño es: " + tamanoArchivo + " y su limite en Bytes es: " + limiteBytesAu);
        } else {

            if (splitTArchivo[0] == "image") {
                document.getElementById("aviso_invalido").innerHTML = "La imagen sobrepasa el tamaño de 1MB, elija una de menor tamaño.";
                this.value = "";
                setTimeout(function () {
                    document.getElementById("aviso_invalido").innerHTML = "";
                }, 4000);
            } else if (splitTArchivo[0] == "video") {
                document.getElementById("aviso_invalido").innerHTML = "El video sobrepasa el tamaño de 50MB, elija una de menor tamaño.";
                this.value = "";
                setTimeout(function () {
                    document.getElementById("aviso_invalido").innerHTML = "";
                }, 4000);
            } else if (splitTArchivo[0] == "audio") {
                document.getElementById("aviso_invalido").innerHTML = "El audio sobrepasa el tamaño de 10MB, elija una de menor tamaño.";
                this.value = "";
                setTimeout(function () {
                    document.getElementById("aviso_invalido").innerHTML = "";
                }, 4000);
            } else {}
            // console.log("El archivo excede el tamaño en MB (" + tamanoArchivo + ") y por ende no es apto para subirse " + tamanoArchivo);
            // this.value = '';
            // document.getElementById("aviso_archivo").innerHTML = "El tamaño del Archivo excede al tamaño permitido, elija otro archivo e intente nuevamente.";
            // setTimeout(function () {
            //     document.getElementById("aviso_archivo").innerHTML = "";
            // }, 4000);
        }
    } else {
        console.log("Este no es un archivo valido");
        document.getElementById("aviso_archivo").innerHTML = "Este no es un archivo valido, por favor elija un archivo valido.";
        setTimeout(function () {
            document.getElementById("aviso_archivo").innerHTML = "";
        }, 4000);
        this.value = '';
    }
});



document.getElementById('btn_validar').addEventListener('click', function (event) {
    //Previene a que el form se envie cuando valida los datos
    event.preventDefault();

    const inputTitulo = document.getElementById('titulo_publicidad');
    const inputSucursal = document.getElementById('fk_sucursal');
    const inputDispositivo = document.getElementById('fk_dispositivo');
    const inputTexto = document.getElementById('texto');
    var valInputArchivo = document.getElementById('archivo');

    //Variables fechas recibidas del FrontEn
    var inputSfechaInicio = document.getElementById("fecha_inicio").value;
    var inputShoraInicio = document.getElementById("hora_inicio").value;
    var inputSfechaFinal = document.getElementById("fecha_final").value;
    var inputShoraFinal = document.getElementById("hora_final").value;

    var fechaHoy = new Date(Date.now());
    console.log(fechaHoy);


    // console.log(valInputArchivo);
    console.log("Se imprime la fecha parseada");


    var fechaHoyP = Date.parse(fechaHoy);
    var msj_fhi = document.getElementById("mensaje_fechainicio");


    const lengthTexto = inputTexto.value.length;
    var valueTexto = inputTexto.value;
    console.log(lengthTexto);
    var cantText = document.getElementById('texto').value.length
    //Evaluar el valor de la sucursal
    const valueSucursal = inputSucursal.value;
    const valueDispositivo = inputDispositivo.value;

    //Evaluar el valor de la variable recibida.
    const valueTitulo = inputTitulo.value;
    //Evaluar la longitud de la variable recibida
    const lengthTitulo = valueTitulo.length;

    //Variables para saber si el formato es valido dentro del input file
    var archivo = document.getElementById('archivo');

    
   
    console.log("Formato fecha y hora");
    var fechaHoy = new Date(Date.now());
    var iFechaHInicio = inputSfechaInicio + ' ' + inputShoraInicio;
    var iFechaHFinal = inputSfechaFinal + ' ' + inputShoraFinal;
    var horaActual = fechaHoy.getHours();
    var minutosActual = fechaHoy.getMinutes();

    //Añadiendo un cero mientras tiene un digito en su valor
    var minutoActual = ('0' + minutosActual).slice(-2);
    var horaMin = horaActual + ":" + minutoActual;
    console.log(horaMin);
    console.log(fechaHoy);

    


    //La condicional compara que si el titulo esta vacio o que tenga menos de 5 caracteres automaticamente marcara que hay algun error y por ende no hara nada.
    if (valueTitulo == "" || lengthTitulo < 5) {
        alert("Campo de titulo vacio o muy corto.")
    } else if (lengthTitulo >= 35) {
        alert("La cantidad de caracteres en el titulo de publicidad excede los permitidos.");
    } else if (inputSfechaInicio == "" || inputSfechaFinal == "" || inputShoraInicio == "" || inputShoraFinal == "") {
        alert("Favor de llenar las fechas y horas faltantes.");
    } else if (inputSfechaInicio > inputSfechaFinal) {
        alert("La fecha inicio es mayor a la fecha final.");
    } else if (inputShoraInicio >= inputShoraFinal) {
        alert("La hora final es mayor o igual a la hora inicial.");
    } else if (fechaHoy > inputSfechaFinal) {
        alert("La fecha de hoy es mayor a la final.");
    } else if (horaMin > inputShoraFinal) {
        alert("La hora de hoy es mayor a la final.");
    } else if (valueSucursal == "" || valueSucursal == null) {
        alert("Selecciona una sucursal.");
    } else if (valueDispositivo == "" || valueDispositivo == null) {
        alert("Selecciona un dispositivo.")
    } else if (valueTexto == "" && valInputArchivo.files.length === 0) {
        alert("Por favor adjunta texto o contenido multimedia a tu publicidad.");
    } else if(cantText < 5){
        alert("Muy poco texto o descripcion de la publicidad. \nIngresa desde 5 caracteres.")
    }
    else {
        console.log(valueTitulo);
        $("#form-subir_publicidad").unbind('submit').submit()
    }
});




























































































// $.validator.setDefaults( {
//     submitHandler: function () {
//        alert( "submitted!" );
//     }
//  });


//  $(document).ready(function(){
//     $('#form-subir_publicidad').validate({
//        rules: {
//           titulo_publicidad: {
//              required: true,
//              minlength: 5,
//              maxlength: 35
//           },
//           comments: {
//              required: true
//           },
//           password: {
//              required: true,
//              minlength: 5
//           },
//           confirm_password: {
//              required: true,
//              minlength: 5,
//              equalTo: "#password"
//           },
//           email: {
//              required: true,
//              email: true
//           },
//           agree: "required"
//        },
//        messages: {           
//           fullname: {
//              required: "Por favor ingresa tu nombre completo",
//              minlength: "Tu nombre debe ser de no menos de 5 caracteres"
//           },
//           comments: "Por favor ingresa un comentario",
//           password: {
//              required: "Por favor ingresa una contraseña",
//              minlength: "Tu contraseña debe ser de no menos de 5 caracteres de longitud"
//           },
//           confirm_password: {
//              required: "Ingresa un password",
//              minlength: "Tu contraseña debe ser de no menos de 5 caracteres de longitud",
//              equalTo: "Por favor ingresa la misma contraseña de arriba"
//           },
//           email: "Por favor ingresa un correo válido",
//           agree: "Por favor acepta nuestra política",
//           luckynumber: {
//              required: "Por favor"
//           }
//        },
//        errorElement: "em",
//        errorPlacement: function (error, element) {
//           // Add the `help-block` class to the error element
//           error.addClass("help-block");

//           if (element.prop( "type" ) === "checkbox") {
//              error.insertAfter(element.parent("label") );
//           } else {
//              error.insertAfter(element);
//           }
//        },
//        highlight: function ( element, errorClass, validClass ) {
//           $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
//        },
//        unhighlight: function (element, errorClass, validClass) {
//           $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );  
//        } 
//     });
//  });