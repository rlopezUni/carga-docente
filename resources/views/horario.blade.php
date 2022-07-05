<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl max-l-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-xl sm:rounded-lg">

                <!--aqui empieza el desmais -->
                @if (session('info'))
    <div class="alert alert-danger">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif




                <div class="col-md-12">

                    <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>DIA</th>
                                    <th>PLANTEL</th>
                                    <th>HORA INICIO</th>
                                    <th>HORA FIN</th>
                                    <th>BORRAR</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($enUso as $uso)
                                    <tr>
                                        <td>{{$uso->dia}}</td>
                                        <td>{{$uso->Plantel->plantel}}</td>
                                        <td>{{$uso->hora_inicio}}</td>
                                        <td>{{$uso->hora_fin}}</td>
                                            <td>
                                                <form method="POST" id="formEliminar" action="" aria-label="{{ __('Noticia') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" id="asiganr" value="{{route('principal.destroy',$uso->id)}}" name="asiganr" class="btn btn-danger"
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




                    
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3>Disponibilidad</h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('principal.store') }}" aria-label="{{ __('docente') }}" enctype="multipart/form-data">

                            
                            <div class="card-body">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Disponibilidad</h4>
                                        </center>
                                    </div>
                                    
                                   
                                    <div class="col-md-8">
                                        <label for="plantel">Plantel</label>
                                        <select  id="plantel" name="plantel" class="form-control selectpicker "data-live-search="true">
                                            @foreach($planteles as $plantel)
                                                <option value="{{$plantel->plantel_id}}">{{$plantel->Plantel->plantel}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                       
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Lunes</h4>
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="horaInicioL">Hora Inicio </label>
                                        <input id="horaInicioL" type="time"  class="form-control" name="horaInicioL">

                                    </div>
                                    <div class="col-md-6">
                                       
                                        <label for="horaFinL">Hora Fin </label>
                                        <input id="horaFinL" type="time"  class="form-control" name="horaFinL">

                                    </div>
                                     
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Martes</h4>
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="horaInicioM">Hora Inicio </label>
                                        <input id="horaInicioM" type="time"  class="form-control" name="horaInicioM"    >

                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="horaFinM">Hora Fin </label>
                                        <input id="horaFinM" type="time"  class="form-control" name="horaFinM"    >

                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Miercoles</h4>
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="horaInicioI">Hora Inicio </label>
                                        <input id="horaInicioI" type="time"  class="form-control" name="horaInicioI"    >

                                    </div>
                                    <div class="col-md-6">
                                       
                                        <label for="horaFinI">Hora Fin </label>
                                        <input id="horaFinI" type="time"  class="form-control" name="horaFinI"    >

                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Jueves</h4>
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="horaInicioJ">Hora Inicio </label>
                                        <input id="horaInicioJ" type="time"  class="form-control" name="horaInicioJ"    >

                                    </div>
                                    <div class="col-md-6">
                                       
                                        <label for="horaFinJ">Hora Fin </label>
                                        <input id="horaFinJ" type="time"  class="form-control" name="horaFinJ"    >

                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Viernes</h4>
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="horaInicioV">Hora Inicio </label>
                                        <input id="horaInicioV" type="time"  class="form-control" name="horaInicioV"    >

                                    </div>
                                    <div class="col-md-6">
                                       
                                        <label for="horaFinV">Hora Fin </label>
                                        <input id="horaFinV" type="time"  class="form-control" name="horaFinV"    >

                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Sabado</h4>
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="horaInicioS">Hora Inicio </label>
                                        <input id="horaInicioS" type="time"  class="form-control" name="horaInicioS"    >

                                    </div>
                                    <div class="col-md-6">
                                       
                                        <label for="horaFinS">Hora Fin </label>
                                        <input id="horaFinS" type="time"  class="form-control" name="horaFinS"    >

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
                
                <script defer src="{{asset('js/horario/horario.js')}}"></script>

                <!--aqui termina -->


            </div>
        </div>
    </div>
</x-app-layout>