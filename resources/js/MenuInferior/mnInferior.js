const btnCategorias = document.getElementById('btn-categorias'), 
grid = document.getElementById('grid');

btnCategorias.addEventListener('mouseenter', () =>{
    grid.classList.add('activo');
});

btnCategorias.addEventListener('mouseleave', () =>{
    grid.classList.remove('activo');
});