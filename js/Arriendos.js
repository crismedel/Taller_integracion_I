function insertarDivsPublicaciones(titulo,direccion,canthabitaciones,valor,padrediv){
    let imagen = document.createElement("img");
    imagen.setAttribute("class","imagen-real-arriendo");
    imagen.src = "img/inicio.svg"; // imagen por defecto

    let nuevoDivImagen = document.createElement("div");
    nuevoDivImagen.setAttribute("class","imagen-publicacion");
    nuevoDivImagen.appendChild(imagen);

    let infoPublicacion = document.createElement("div");
    infoPublicacion.setAttribute("class","info-publicacion");

    let eltitulo = document.createElement("p");
    let ladireccion = document.createElement("p");
    let lacanthabitaciones = document.createElement("p");
    let elvalor = document.createElement("p");

    eltitulo.innerHTML = titulo;
    ladireccion.innerHTML = direccion;
    lacanthabitaciones.innerHTML = canthabitaciones;
    elvalor.innerHTML = valor;

    infoPublicacion.appendChild(eltitulo);
    infoPublicacion.appendChild(ladireccion);
    infoPublicacion.appendChild(lacanthabitaciones);
    infoPublicacion.appendChild(elvalor);

    padrediv.appendChild(nuevoDivImagen);
    padrediv.appendChild(infoPublicacion);


}


async function obtenerArriendos(datosFormulario,padrediv){
    const response = await fetch('filtro.php', {
        method: 'POST',
        body: datosFormulario,
    });
    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);
    console.log(obj);
    insertarDivsPublicaciones(obj['titulo'],obj['direccion'],obj['canthab'],obj['valor'],padrediv); // inserta las publicaciones de auerdo al filtro
}





