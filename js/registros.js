$(document).ready(function() {
    obtenerusuarios();
    function obtenerusuarios(){
        $.ajax({
            url: 'view/task/datos.php',            
            method: 'GET',
            cache: false,
            contentType: 'application/json; charset=utf-8',
            dataType: false,
            success: function (response) {
                //console.log(response);
               let template = '';
               let datos = JSON.parse(response);
               if (response === '[]'){
                    template += `
                        <div class="col-12 col-md-12 col-xl-12">
                            <p class="text-uppercase">No hay usuarios registrados.</p>
                        </div>
                    `
               }else{
                    template+=`
                    <div class="col-12 col-md-12 col-xl-12">                        
                        <table class="table table-sm table-striped-custom text-center">
                            <thead class="bg-custom text-primary">
                                <tr class="h3 font-weight-bold">
                                    <th scope="col">N° Identidad</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Fecha Registro</th>
                                </tr>
                            </thead>
                            <tbody>`                   
                            datos.forEach(dato => { 
                                template += `                                
                                        <tr class="h0">
                                            <td class="align-middle center">${dato.Id}</td>
                                            <td class="align-middle center">${dato.usuario}</td>
                                            <td class="align-middle center">${dato.Email}</td>
                                            <td class="align-middle center">${dato.Fecha}</td>                       
                                        </tr>                        
                                `                       
                            });
                            template+=` 
                            </tbody>                                                
                        </table>
                    </div>`
               }
               $('#registros').html(template);
            }
        });
    }
});