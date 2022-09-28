let boton_sesion = document.querySelector('.boton-sesion'); /*nav boton*/
let contenedor_popup = document.querySelector('.contenedor-popup'); /*todo el popup*/
let cerrar_login = document.querySelector('.cerrar-login'); /*popup boton*/

boton_sesion.addEventListener('click', event=>{ /*aparece el popup*/ 
    contenedor_popup.style.visibility = "visible";
})

cerrar_login.addEventListener('click', event=>{  /*ocultar el popup*/ 
    contenedor_popup.style.visibility = "hidden";
})


