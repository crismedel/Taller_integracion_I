function confirmacion(e){

    if (confirm("¿Desea eliminar esta publicación de tus favoritos?")) {
        return true;
    } else{
        e.preventDefault();
    }

}

let linkDelete = document.querySelectorAll("eliminar_favoritos");

for(var i=0; i< linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}