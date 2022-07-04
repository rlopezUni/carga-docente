$( "#areas" ).change(function() {

    var route = "/consulta/materias/" + $('#areas').val();

    $("#carreras option").remove();

     $("#carreras").append("<option value = ''>Seleciona una opcion</option>")
     $("#carreras").selectpicker('refresh');
    //value="res[i].">nombre_area</

    $.get(route, function(res){
       //aqui va si si encuentra resultados
       for( i = 0; i < res.length;i++){
         


         $("#carreras").append("<option value = "+res[i].id+">"+res[i].carrera+"</option>")
       }
       $("#carreras").selectpicker('refresh');
     
    }).fail(function(res) {
    	// aqui si falla dejar vacio
    });

});