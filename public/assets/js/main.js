/* global $*/
(function(){
    let form=document.querySelectorAll('.destroy');
    for(var i = form.length-1;i>=0;i--){
     form[i].addEventListener('submit',function(evento){
      let confirmacion= confirm("¿seguro que desea borrar el producto?");
        if(!confirmacion){
           evento.preventDefault();
        }
     });
    }
})();