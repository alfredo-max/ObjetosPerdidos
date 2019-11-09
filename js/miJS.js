

function Reportar(){
    Swal.fire('Objeto reportado con exito!','You clicked the button!','success');
    var boton= document.getElementById("reportar");
    boton.innerHTML = 'En tramite';
    boton.disabled = true;
    
    var botoninsertar= document.createElement("input");
    botoninsertar.setAttribute("type","button");
    botoninsertar.setAttribute("value","Cancelar Tramite");
    document.getElementById('form').appendChild(botoninsertar);
   
    
}