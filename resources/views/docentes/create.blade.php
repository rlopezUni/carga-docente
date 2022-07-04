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
                                <h3>Crear docente</h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('docentes.store') }}" aria-label="{{ __('docente') }}" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Datos del docente</h4>
                                        </center>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="nombres">Nombres del docente</label>
                                        <input id="nombres" type="text" placeholder="Nombre del docente" class="form-control" name="nombres"  maxlength="35" required autofocus>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="apellidos">Apellidos del docente</label>
                                        <input id="apellidos" type="text" placeholder="Apellidos del docente" class="form-control" name="apellidos"  maxlength="35" required autofocus>

                                    </div>

                                    <div class="col-md-4">
                                        <label for="idpwc">ID PWC</label>
                                        <input id="idpwc" type="text" placeholder="ID PWC" class="form-control" name="idpwc"  maxlength="10" required autofocus>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="correo">correo</label>
                                        <input id="correo" type="email" placeholder="Correo" class="form-control" name="correo"  maxlength="50" required autofocus>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="areas">Areas</label>
                                        <select  id="areas" name="areas" class="form-control selectpicker "data-live-search="true">
                                            @foreach($areas as $area)
                                                <option value="{{$area->id}}">{{$area->area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>

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
                

                <!--aqui termina -->


            </div>
        </div>
    </div>
</x-app-layout>