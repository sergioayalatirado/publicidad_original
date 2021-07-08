document.getElementById("btn_validar").addEventListener('click', function (event) {
    event.preventDefault();

    var inputSfechaInicio = document.getElementById("fecha_inicio").value;
    var inputShoraInicio = document.getElementById("hora_inicio").value;
    var inputSfechaFinal = document.getElementById("fecha_final").value;
    var inputShoraFinal = document.getElementById("hora_final").value;

    console.log("Formato fecha y hora");
    //Comparar el dia, desde las 00:00 horas.
    // console.log(inputSfechaInicio + ' ' + '00:00');
    // console.log(inputSfechaFinal + ' ' + '00:00');

    var fechaHoy = new Date(Date.now());

    var iFechaHInicio = inputSfechaInicio + ' ' + inputShoraInicio;
    var iFechaHFinal = inputSfechaFinal + ' ' + inputShoraFinal;

    // console.log(iFechaHInicio);
    // console.log(iFechaHFinal);
    // console.log(fechaHoy);

    var horaActual = fechaHoy.getHours();
    var minutosActual = fechaHoy.getMinutes();

    //Añadiendo un cero mientras tiene un digito en su valor
    var minutoActual = ('0' + minutosActual).slice(-2);
    var horaMin = horaActual + ":" + minutoActual;
    console.log(horaMin);
    console.log(fechaHoy);




    // if (iFechaHFinal > iFechaHInicio) {
    //     console.log("La fecha final es mayor a la fecha de inicio");
    // } else {
    //     console.
    // }


    // if(iSFechaFinal >= iSFechaInicio){
    //     console.log("La fecha final es valida, es mayor a la de inicio");
    //     if(iSFechaFinal > fechaHoy){
    //         console.log("La fecha final es mayor a la fecha actual, procede...");
    //         if(iSFechaFinal === iSFechaInicio){
    //             console.log("La fecha de inicio es la misma que la fecha final");
    //         }
    //     }
    // }else{

    // }
    // if (inputSfechaInicio == "" || inputSfechaFinal == "") {
    //     alert("Las fechas se encuentran vacias");
    // } else if (inputSfechaInicio > inputSfechaFinal || inputShoraInicio >= inputShoraFinal) {
    //     alert("La fecha inicio es mayor o igual a la fecha final.");
    // } else if (fechaHoy > inputSfechaFinal || horaMin > inputShoraFinal) {
    //     alert("La fecha o la hora de hoy es mayor a la final.");
    // } else {
    //     console.log("Ha pasado todas las condicionales.");
    // }

    if (inputSfechaInicio == "" || inputSfechaFinal == "" || inputShoraInicio == "" || inputShoraFinal =="") {
        alert("Favor de llenar las fechas y horas faltantes.");
    }
    else if (inputSfechaInicio > inputSfechaFinal) {
        alert("La fecha inicio es mayor a la fecha final.");
    }
    else if( inputShoraInicio >= inputShoraFinal){
        alert("La hora final es mayor o igual a la hora inicial.");
    }
    else if(fechaHoy > inputSfechaFinal ){
        alert("La fecha de hoy es mayor a la final.");
    }
    else if (horaMin > inputShoraFinal) {
        alert("La hora de hoy es mayor a la final.");
    } 
    else {
        alert("Ha pasado todas las condicionales.");
    }

    


    //     if(iSFechaInicio === iSFechaFinal){


    //         alert("La fecha de inicio es igual a la fecha final, corrige e intentalo nuevamente.");
    //     }else if(iSFechaFinal < fechaHoy){
    //         alert("La fecha final es menor a la fecha actual, por favor corrige e intentalo nuevamente.")
    //     }else if(iSFechaFinal < iSFechaInicio){
    //         alert("La fecha final es menor a la de inicio.");
    //     }
    // });
});