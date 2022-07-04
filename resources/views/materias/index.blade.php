<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!--aqui empieza el desmais -->
                
                <div class="col-md-12 text-center">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <h2>GESTION MATERIAS</h2>
                        </div>
                        <h3>
                                    <a href="{{route('materias.create')}}" style="color:#037DB4;"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Agregar Materia</a>
                                </h3>
                        <div class="card-body">
                            <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>MATERIA</th>
                                    <th>CARRERA</th>
                                    <th>PLANTEL</th>
                                    <th>DIAS</th>
                                    <th>HORAS</th>
                                    <th>STATUS</th>
                                    <th>DETALLES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($materias as $materia)
                                    <tr>
                                        <td>{{$materia->id_pwc}}</td>
                                        <td>{{$materia->materia}}</td>
                                        <td>{{$materia->Area->carrera}}</td>
                                        <td>{{$materia->Plantel->plantel}}</td>
                                        <td>{{$materia->dias}}</td>
                                        <td>{{$materia->horas}}</td>
                                        @if($materia->status == 1)
                                        <td>Materia sin Asignar</td>
                                        @else
                                        <td>Materia  Asignada al docente {{$materia->Docentes[0]->id_pwc}} </td>
                                        @endif
                                           
                                            <td>
                                                <a href="{{route('materias.edit',$materia)}}">
                                                    <button class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                            </td>
                                          
                                            
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--aqui termina -->
            </div>
        </div>
    </div>
</x-app-layout>
<script defer src="{{asset('js/jquery/jquery.dataTables.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.bootstrap4.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.fixedHeader.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.responsive.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/responsive.bootstrap.min.js')}}" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#personalInfo').DataTable({
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
