function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    var mensaje = document.getElementById("mensaje_sucursal");
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        mensaje.innerHTML = "Ingresa solo texto";
        setTimeout(function () {
            mensaje.innerHTML = "";
        }, 3000);
        return false;
    }
}


document.getElementById("btn_esucursal").addEventListener('click', function (event) {
    event.preventDefault();
    var sucursal = document.getElementById("sucursal").value;
    var tipo_sucursal = document.getElementById("tipo_sucursal").value;
    
    var s_leng = document.getElementById("sucursal").value.length;
    var ts_leng = document.getElementById("tipo_sucursal").value.length;

    
    console.log(s_leng);
    console.log(ts_leng);
    
    if(sucursal == ""){
        alert("El apartado de nombre de la sucursal se encuentra vacio o es muy corto.");
    }else if(s_leng >=30 || s_leng <= 5){
        alert("Recuerda, minimo debes ingresar 3 caracteres y maximos 30 caracteres.");
    }else if(tipo_sucursal == ""){
        alert("Selecciona un tipo de sucursal.");
    }else{
        alert("Se han validado todos los campos");
        $("#form-agregarsucursal").unbind('submit').submit();
    }
});