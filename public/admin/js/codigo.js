$(document).ready(function(){
    $('.delete_link').on('click', function(){
        const id = $(this).attr('rel');
        const titulo = $(this).attr('titulo');
        const table = $(this).attr('table');
        const param = $(this).attr('param');
        const action = $(this).attr('action');

        const delete_url = `index.php?${table}&${param}=${id}`;

        $('.titleDelete').html(titulo);
        if(table == "portafolio"){
            $('.bodyDelete').html("Estas Seguro de eliminar este item?");
        }else{
            if(table == "comentarios" && action == "Aprobar"){
                $('.bodyDelete').html("Quieres aprobar este comentario?");
            }
            else{
                if(table == "comentarios" && action == "Desaprobar"){
                    $('.bodyDelete').html("Quieres desaprobar este comentario?");
                }
            }
        }
        

        const btnDelete = document.querySelector('.btn_delete_link');
        btnDelete.classList.remove('btn-primary');
        btnDelete.classList.add('btn-danger');
        btnDelete.textContent = action;
        $('.btn_delete_link').attr('href', delete_url);
        $('#deleteModal').modal('show');
    })
});

