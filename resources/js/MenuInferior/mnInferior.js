const btnCategorias = document.getElementById('btn-categorias'), 
grid = document.getElementById('grid'),
contenedorEnlaces =  document.querySelector('#menu .contenedor-enlaces-nav'),
btnCerrarMenu = document.getElementById('btn-menu-cerrar'),
esDispositivoMovil = () => window.innerWidth<=800;

//Cuando se pasa el mouse se abra el menu
btnCategorias.addEventListener('mouseover', () =>{
    if(!esDispositivoMovil()){
        grid.classList.add('activo');
    }
});

//Cuando se salga del grid que se cierre el menu
grid.addEventListener('mouseleave', () =>{
    if(!esDispositivoMovil()){
        grid.classList.remove('activo');
    }
});

//Mostrar las categorias
document.querySelectorAll('#menu .categorias a').forEach( (elemento) => {

    elemento.addEventListener('mouseenter', (e) => {
        
        if(!esDispositivoMovil()){
            document.querySelectorAll('#menu .subcategoria').forEach((categoria) =>{
            
                categoria.classList.remove('activo');
                //mostrar subcategora por categoria
                if(categoria.dataset.categoria == e.target.dataset.categoria){
                    categoria.classList.add('activo');
                }
            });
        }
        
    });

});

//Listerner de dispositivo movil

document.querySelector('#btn-menu-barras').addEventListener('click', (e) =>{

    e.preventDefault();
    if(contenedorEnlaces.classList.contains('activo')){
        contenedorEnlaces.classList.remove('activo');
        document.querySelector('body').style.overflow = 'visible';
    } else{
        contenedorEnlaces.classList.add('activo');
        document.querySelector('body').style.overflow = 'hidden';
    }

});

//Click para todos los categorias

btnCategorias.addEventListener('click' , (e) => {
    e.preventDefault();
    
    grid.classList.add('activo');
    

});


document.querySelector('#grid .categorias .btn-regresar').addEventListener('click' , (e) => {
    e.preventDefault();
    grid.classList.remove('activo');
    
})



