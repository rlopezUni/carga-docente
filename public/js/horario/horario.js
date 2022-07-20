$( "#sugerencia" ).click(function() {


  Swal.fire({
  title: '<strong>No te aparece una materia? </strong>',
  icon: 'question',
  html:
    'Cuentanos que otras materias puedes dar  ' +
    '<form method="POST" action="/comentario"  enctype="multipart/form-data"> '+
    '<input type="hidden" name="_token" value="'+$("meta[name='csrf-token']")[0].content +'">'+

    '<textarea required id="comentario" name="comentario" rows="5" cols="40"></textarea>'+
    '<button type="submit" id="guardar" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;&nbsp;Enviar</button>'+
    '</form>',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  showConfirmButton: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',
  cancelButtonAriaLabel: 'Thumbs down',

})

});