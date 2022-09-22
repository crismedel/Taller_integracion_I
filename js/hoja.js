
const imagenes =document.querySelectorAll('.img-qs')
const imagenesClose = document.querySelector('.agregar-imagen')
const contendorClose =document.querySelector('.imagen-close')
const house_ = document.querySelector('.house');
imagenes.forEach( imagen =>{
    imagen.addEventListener('click', ()=>{
      aparecerImagen(imagen.getAttribute('src'))  
    })
})
contendorClose.addEventListener('click', (c)=>{
    if(c.target !== imagenesClose){       
     contendorClose.classList.toggle('show')
     imagenesClose.classList.toggle('showImage') 
     house_.style.opacity = '1'
    }
})

const aparecerImagen = (imagen)=>{
     imagenesClose.src = imagen;
     contendorClose.classList.toggle('show')
     imagenesClose.classList.toggle('showImage')
     house_.style.opacity = '0'
}
//funciones de flecha del menu de navegacion, que añade una clase elemento para que se cierre y se abra el menu de navegacion al hacerle click 
const house = document.querySelector('.house');
const menu = document.querySelector('.menu-navegacion');



house.addEventListener('click',()=>{
    menu.classList.toggle("elemento")
} ) 

window.addEventListener('click', h=>{
   
    if(menu.classList.contains('elemento') && h.target != menu && h.target != house){

        menu.classList.toggle("elemento")
    }
})