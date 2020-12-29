$(function(){
    crearPaginacion();
});

let cambiarPagina =() =>{
    console.log('hola');
    console.log($(this).text);
    $('.page-item>.page-link').on('click', function(){
        $.ajax({
            url:'reporte.php',
            method:'POST',
            data:{
                pagina: $(this).text()
            }
        })

    });
}

let crearPaginacion =()=>{
    $.ajax({
        url:'reporte.php',
        method: 'POST'
    }).done(function(data){
        console.log('data:'+data);
        $('#pagination li').remove();
        for (let i = 0; i < data; i++) {
            $('#pagination').append('<li class="page-item"><a class="page-link text-muted" href="#">'+i+'</a></li>');
        }
        cambiarPagina();
    });
}