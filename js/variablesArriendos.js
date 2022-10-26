/* */




/* Este bloque de codigo se utiliza para obtener el atributo name de la opcion "tipo de vivienda " dentro de los filtros*/

let botonOpcionTipoArriendo = document.getElementsByClassName('current-button-selected');
let currentOPTION = "";
for(let i = 0; i < botonOpcionTipoArriendo.length; i++){ 
    botonOpcionTipoArriendo[i].addEventListener('click', function (event) {
        event.preventDefault();
        currentOPTION =event.target.name;
        console.log(currentOPTION);
    }
    );
}

/* formulario del filtro */

let formularioFiltro = document.getElementById('formulario-filtra-arriendos');

formularioFiltro.addEventListener('submit',function(event){
    event.preventDefault();
    const formularioData = new FormData(formularioFiltro);
    formularioData.append("tipo", currentOPTION);
    const padrediv = document.getElementById('principal-grid-publicaciones');

    const imgdiv = document.getElementsByClassName('imagen-publicacion');

    for(let i = 0; i < imgdiv.length; i++){
        imgdiv[i].remove();
    }

    const infodiv = document.getElementsByClassName('info-publicacion');


    for(let i = 0; i < infodiv.length; i++){
        infodiv[i].remove();
    }

    const parrafos = document.getElementsByClassName('parrafo-info');


    for(let i = 0; i < parrafos.length; i++){
        parrafos[i].remove();
    }

    const imagenes = document.getElementsByClassName('imagen-real-arriendo');


    for(let i = 0; i < imagenes.length; i++ ){
        imagenes[i].remove();
    }

    obtenerArriendos(formularioData, padrediv); 
});


