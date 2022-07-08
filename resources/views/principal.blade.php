<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if( auth()->user()->rol == 2 )


             <table id="materiasAsignadas" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>MIS MATERERIAS ASIGNADAS</th>
                                    <th>ID MATERIA</th>
                                    <th>MODALIDAD</th>
                                    <th>PLANTEL</th>
                                    <th>BORRAR</th>
                                  
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($docente->materias as $materia)
                                    <tr>
                                        <td>{{$materia->materia}}</td>
                                        <td>{{$materia->id_pwc}}</td>
                                        <td>{{$materia->modalidad->modalidad}}</td>
                                        <td>{{$materia->Plantel->plantel}}</td>
                                        <td>
                                                <form method="POST" id="formEliminar" action="" aria-label="{{ __('Noticia') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" id="asiganr" value="{{route('materias.destroy',$materia->id)}}" name="asiganr" class="btn btn-danger"
                                                            onclick="  var r = confirm('Estas seguro que deseas eliminar este horario?');
                                                        if (r == true) {
                                                            $('#formEliminar').attr('action',this.value).submit();
                                                        } else {
                                                            return false;
                                                        }">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        
                                          
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table id="materiasDisponibles" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>MATERERIAS DISPONIBLES</th>
                                    <th>ID MATERIA</th>
                                    <th>MODALIDAD</th>
                                    <th>PLANTEL</th>
                                    
                                    
                                    <th>ASIGNAR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($materiasDisponibles as $materia)
                                    <tr>
                                        <td>{{$materia->materia}}</td>
                                        <td>{{$materia->id_pwc}}</td>
                                        <td>{{$materia->modalidad->modalidad}}</td>
                                        <td>{{$materia->Plantel->plantel}}</td>
                                        
                                        
                                        <td>
                                                <form method="POST" id="formUpdate" action="" aria-label="{{ __('Noticia') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="button" id="asiganr" value="{{route('principal.update',$materia->id)}}" name="asiganr" class="btn btn-primary"
                                                            onclick="  var r = confirm('Estas seguro que deseas esta materia?');
                                                        if (r == true) {
                                                            $('#formUpdate').attr('action',this.value).submit();
                                                        } else {
                                                            return false;
                                                        }">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            </td>
                                          
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

            @endif

    </div>

    


</x-app-layout>
<script defer src="{{asset('js/jquery/jquery.dataTables.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.bootstrap4.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.fixedHeader.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.responsive.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/responsive.bootstrap.min.js')}}" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#materiasDisponibles').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    } );
</script>