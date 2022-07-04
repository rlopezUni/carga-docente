<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl max-l-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-xl sm:rounded-lg">

                <!--aqui empieza el desmais -->

                <div class="col-md-12">
                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>Ese codigo esta duplicado</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3>Crear materia</h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('materias.store') }}" aria-label="{{ __('docente') }}" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Datos de la materia</h4>
                                        </center>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="materia">Nombres de la materia</label>
                                        <input id="materia" type="text" placeholder="Nombre de la materia" class="form-control" name="materia"  maxlength="35" required autofocus>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="id_pwc">ID PWC</label>
                                        <input id="id_pwc" type="text" placeholder="ID" class="form-control" name="id_pwc"  maxlength="35" required autofocus>

                                    </div>

                                    

                                    <div class="col-md-4">
                                        <label for="areas">Area</label>
                                        <select  id="areas" name="areas" class="form-control selectpicker "data-live-search="true">
                                            <option>Seleciona una Area</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->id}}">{{$area->area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="carreras">Carreras</label>
                                        <select  id="carreras" name="carreras" class="form-control selectpicker "data-live-search="true">
                                            <option>Selecciona una carrera</option>
                                          
                                        </select>
                                    </div>

                                     <div class="col-md-4">
                                        <label for="plantel">Plantel</label>
                                        <select  id="plantel" name="plantel" class="form-control selectpicker "data-live-search="true">
                                            @foreach($planteles as $plantel)
                                                <option value="{{$plantel->id}}">{{$plantel->plantel}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="plantel">Dias</label>
                                        <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="dias[]" id="dias" value="L">
                                        <label class="form-check-label" for="dias">Lunes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="dias[]"  id="dias" value="M">
                                        <label class="form-check-label" for="dias">Martes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="dias[]"  id="dias" value="I">
                                        <label class="form-check-label" for="dias">Miercoles</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="dias[]"  id="dias" value="J">
                                        <label class="form-check-label" for="dias">Jueves</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="dias[]"  id="dias" value="V">
                                        <label class="form-check-label" for="dias">Viernes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="dias[]"  id="dias" value="S">
                                        <label class="form-check-label" for="dias">Sabado</label>
                                    </div>
                                    
                                    </div>

                                    <div class="col-md-3">
                                        <label for="horaInicio">Hora Inicio</label>
                                        <input id="horaInicio" type="time"  class="form-control" name="horaInicio"   required autofocus>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="horaFin">Hora Fin</label>
                                        <input id="horaFin" type="time"  class="form-control" name="horaFin"   required autofocus>

                                    </div>

                                    
                                </div>

                            </div>


                            <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" id="guardar" class="btn btn-success">
                                            <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
                                        </button>
                                        <a href="{{route('materias.index')}}">
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
                
                <script defer src="{{asset('js/materias/materias.js')}}"></script>
                <!--aqui termina -->


            </div>
        </div>
    </div>
</x-app-layout>