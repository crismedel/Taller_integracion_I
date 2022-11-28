let formularioeditar = document.getElementById("editar-informacion-formulario");


formularioeditar.addEventListener("submit", function(event){
    event.preventDefault();
    let newform = new FormData(formularioeditar);
    editar(newform);
});


async function editar(formulario){
    const response = await fetch('editarperfil.php', {
        method: 'POST',
        body: formulario
    });
    const respuesta = await response.text();
    const obj = JSON.parse(respuesta);

    console.log(obj.success);

}

