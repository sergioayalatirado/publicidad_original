document.getElementById('archivo').addEventListener('change', function (event) {
   
   
    //    var file = document.getElementById("archivo");
       
    //    fileFile = file.files[0];
       
    //    fileType = fileFile.type;
    //    fileSize = fileFile.size;   
       
    //    var file  = this.files[0].type;
    
        var fileType = this.files[0].type; // recibe el tamaño en Bytes
        var fileSize = this.files[0].size; // recibe el tamaño en Bytes
        var fileSizeInKb = parseInt(fileSize / 1024); // lo convertimos a Kilobytes
        var maxSizeInKb = 1024; // peso maximo permitido en Kilobytes 1000KB = 1MB    
    
        var spliteado = fileType.split("/");
        // console.log(spliteado[0]);
        // console.log(spliteado[1]);
    
        // if(spliteado[0] == "audio"){
        //     console.log("soy un audio");
        // }else if(spliteado[0] == "video"){
        //     console.log("soy un video");
        // }else if (spliteado[0] == "application") {
        //     console.log("soy un image");
        // }else{
        //     console.log("formato invalido");
        // }
        
        switch (spliteado[0]) {
            case "audio":
                console.log("soy un audio");
                break;
            case "video":
                console.log("soy un video");
                break;
            case "image":
                console.log("soy un image");
                break;
        
            default:
                console.log("Formato no valido");
                break;
        }
    
        if (fileSizeInKb >= maxSizeInKb) { // comparamos que los kb no sean mayoes a ?
            // Si el archivo que cargamos es mayor o igual al limite(1MB) entonces no lo subimos y mandamos mensaje
            console.log("El peso de tu archivo: " + fileSizeInKb +"kb, supera el limite permitido de 1MB.");
        }else{
            console.log("El peso de tu archivo: " + fileSizeInKb +"kb, Archivo guardado correctamente ya que no supera el limite permitido de 1MB.");
        }
    });
    
    