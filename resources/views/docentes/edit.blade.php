<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl max-l-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-xl sm:rounded-lg">

                <!--aqui empieza el desmais -->

                <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3>DETALLES DOCENTE: {{$docente->nombres}}  {{$docente->apellidos}}</h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('docentes.update',$docente) }}" aria-label="{{ __('areas') }}" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    @csrf
                                    @method('PUT')
                                    
                                    
                                    <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>AREAS DEL DOCENTE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($docente->areas as $area)
                                    <tr>
                                        <td>{{$area->carrera}}</td>
                                          
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                           


                            <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>MATERIAS DEL DOCENTE</th>
                                    <th>ID MATERIA</th>
                                    <th>PLANTEL</th>
                                    <th>DIAS MATERIA</th>
                                    <th>HORAS MATERIA</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($docente->materias as $materia)
                                    <tr>
                                        <td>{{$materia->materia}}</td>
                                        <td>{{$materia->id_pwc}}</td>
                                        <td>{{$materia->Plantel->plantel}}</td>
                                        <td>{{$materia->dias}}</td>
                                        <td>{{$materia->horas}}</td>
                                          
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>


                            <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" id="guardar" class="btn btn-success">
                                            <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
                                        </button>
                                        <a href="{{route('docentes.index')}}">
                                            <button type="button" class="btn btn-default" >
                                                <i class="fas fa-undo-alt"></i>&nbsp;&nbsp;{{ __('Regresar') }}
                                            </button>
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <!-- formulario -->
                    </div>
                </div>



                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

                <!-- Latest compiled and minified JavaScript -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

                <!-- (Optional) Latest compiled and minified JavaScript translation files -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
                <script defer src="{{asset('public/js/cliente/cliente.js')}}"></script>


                <!--aqui termina -->


            </div>
        </div>
    </div>
</x-app-layout>