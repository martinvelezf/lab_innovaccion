@extends('layouts.aplicacion.app')

@section('content')
    <form role="form" id='frm' class="needs-validation" novalidate action="{{$url}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="position-relative bg-purple-gradient" style="height: 480px;">
        <div class="cs-shape cs-shape-bottom cs-shape-slant bg-secondary d-none d-lg-block">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
            </svg>
        </div>
    </div>
    <div class="container bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px;">
        <div class="row">
            <!-- Content-->
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex flex-column h-100 bg-light rounded-lg box-shadow-lg p-4">
                    <div class="py-2 p-md-3">
                        <!-- Title + Delete link-->
                        <div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-left">
                            <h1 class="h3 mb-2 text-nowrap">Registro de Eventos</h1>
                            @if ($method=='PUT')
                                <a class="btn btn-link text-danger font-weight-medium btn-sm mb-2" data-toggle="modal" data-target="#deleteAlert"><i class="fe-trash-2 font-size-base mr-2"></i>Eliminar evento </a>
                            @endif
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-left">
                            <span style="color: gray">Llena los siguientes campos para completar exitosamente tu registro. Recuerda que los campos con asterisco* son obligatorios.</span> 
                        </div>
                        
                        <!-- Content-->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="organizador">* Nombre del Organizador <span style="color: gray">(max. 250 caracteres)</span></label>
                                    <input class="form-control" type="text" id="organizador" value="{{isset($evento->organizador)?$evento->organizador:old('organizador')}}" maxlength='150' name="organizador" placeholder="Nombre del organizador"  oninvalid="setCustomValidity('Por favor complete este campo.')" onchange="try{setCustomValidity('')}catch(e){}" required>
                                    @error('organizador')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nombre">* Nombre del Evento <span style="color: gray">(max. 250 caracteres)</span></label>
                                            <input class="form-control" type="text" id="nombre" value="{{isset($evento->nombre)?$evento->nombre:old('nombre')}}" maxlength='150' name="nombre" placeholder="Nombre del evento"  oninvalid="setCustomValidity('Por favor complete este campo.')" onchange="try{setCustomValidity('')}catch(e){}" required>
                                            @error('nombre')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col">
                                        <div class="form-group">
                                            <label for="fecha">* Fecha</label>
                                            <input class="form-control" type="date" id="fecha" value="{{isset($evento->fecha)?$evento->fecha:old('fecha')}}" name="fecha"  oninvalid="setCustomValidity('Por favor seleccione una fecha.')" onchange="try{setCustomValidity('')}catch(e){}"  required>
                                        </div>
                                    </div> --}}
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label">* Fecha</label>
                                            <div class="input-group-overlay">
                                            <input class="form-control appended-form-control cs-date-picker js-input" type="text" placeholder="Elija una fecha" data-datepicker-options='{"altInput": true, "allowInput":true, "ariaDateFormat": "F j, Y", "dateFormat": "Y-m-d"}' id="fecha" value="{{isset($evento->fecha)?$evento->fecha:old('fecha')}}" name="fecha"  oninvalid="setCustomValidity('Por favor seleccione una fecha.')" onchange="try{setCustomValidity('')}catch(e){}"  required>
                                            <div class="input-group-append-overlay">
                                                <span class="input-group-text">
                                                <i class="fe-calendar"></i>
                                                </span>
                                            </div>
                                            </div>
                                            @error('fecha')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- <div class="form-group">
                                            <label for="hora">* Hora</label>
                                            <input class="form-control" type="time" id="hora" value="{{isset($evento->hora)?$evento->hora:old('hora')}}" name="hora"  oninvalid="setCustomValidity('Por favor seleccione una hora.')" onchange="try{setCustomValidity('')}catch(e){}" required>
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="form-label">* Hora</label>
                                            <div class="input-group-overlay">
                                              <input class="form-control appended-form-control cs-date-picker js-input-hora" type="text" placeholder="Elija una hora"  data-datepicker-options='{"enableTime": true,"noCalendar": true,"allowInput":true, "dateFormat": "H:i"}'  id="hora" value="{{isset($evento->hora)?$evento->hora:old('hora')}}" name="hora"  oninvalid="setCustomValidity('Por favor seleccione una hora.')" onchange="try{setCustomValidity('')}catch(e){}" required>
                                              <div class="input-group-append-overlay">
                                                <span class="input-group-text">
                                                  <i class="fe-calendar"></i>
                                                </span>
                                              </div>
                                            </div>
                                            @error('hora')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label  class="control-label" for="descripcion">Descripción del Evento <span style="color: gray">(max. 50 palabras)</span></label>

                                            <textarea oninput="countWords();" id="descripcion" class="form-control" name="descripcion" placeholder="Describa su evento"  rows="6"
                                            >{{ old('descripcion', $evento->descripcion ?? null) }}</textarea><span style="color: gray" id="count-words"></span>
                                            <br>
                                            <div class="invalid-feedback" id='descripcion-error'></div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="custom-control custom-radio">
                                                    <input class="lugar custom-control-input" type="radio" id="evento_virtual" value="0" name="tipo" required>
                                                    <label class="custom-control-label" for="evento_virtual">Virtual</label>
                                                </div>
                                                {{-- <label for="evento_virtual">
                                                    <input class="lugar" type="radio" id="evento_virtual" value="0" name="tipo" required>
                                                    Virtual
                                                </label> --}}
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio">
                                                    <input class="lugar custom-control-input" type="radio" id="evento_presencial" value="1" name="tipo" >
                                                    <label class="custom-control-label" for="evento_presencial">Presencial</label>
                                                </div>
                                                {{-- <label for="evento_presencial">
                                                    <input class="lugar" type="radio" id="evento_presencial" value="1" name="tipo">
                                                    Presencial
                                                </label> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row to-hide d-none">
                                            <div class="col mb-4 mt-4">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12 to-hide e-virtual d-none">
                                                    <div class="form-group">
                                                        <label for="url">* URL del Evento</label>
                                                        <input class="form-control" type="text" id="url" oninput="validateURL()" value="{{isset($evento->url)?$evento->url:old('url')}}" name="url" placeholder="URL del Evento" oninvalid="setCustomValidity('Ingrese una dirección web.')" onchange="try{setCustomValidity('')}catch(e){}">
                                                        <div class="invalid-feedback" id='url-error'></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 to-hide e-presencial d-none">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="canton_id">* Cantón</label>
                                                                <div class= "m-0 p-0 w-100 form-group">
                                                                    
                                                                    <select style="width:100%;" class="form-control custom-select select2" id='canton_id' name='canton'

                                                                    data-ajax--url="{{route('api.canton.select2')}}"
                                                                    data-ajax--data-type="json"
                                                                    data-ajax--data-cache="true"
                                                                    data-allow-clear="true"
                                                                    data-placeholder="Seleccione un Cantón"
                                                                    data-close-on-select="false"
                                                                    >
                                                                       
                                                                    </select>
                                                                    <div class="invalid-tooltip">Por favor seleccione un cantón.</div>
                                                                    <div class="valid-tooltip">Ok!</div>
                                                                </div>

                                                                {{-- <select style="width:100%;" id="canton_id" class="form-control select2" name="canton"
                                                                        data-ajax--url="{{route('api.canton.select2')}}"
                                                                        data-ajax--data-type="json"
                                                                        data-ajax--data-cache="true"
                                                                        data-allow-clear="true"
                                                                        data-placeholder="Seleccione un Cantón"
                                                                        data-close-on-select="false"
                                                                        required="required"
                                                                        oninvalid="setCustomValidity('Por favor seleccione una opción de la lista.')" onchange="try{setCustomValidity('')}catch(e){}"
                                                                        ></select> --}}
                                                                
                                                            </div>
                                                            @error('canton_id')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="ubicacion">* Ubicación del Evento</label>
                                                                <input class="form-control" type="text" id="evento_direccion" maxlength='250' value="{{isset($evento->ubicacion)?$evento->ubicacion:old('ubicacion')}}" name="ubicacion" placeholder="Direccion del evento" oninvalid="setCustomValidity('Por favor complete este campo.')" onchange="try{setCustomValidity('')}catch(e){}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div id="map" style="width:100%; height: 350px;"></div>
                                                            <input type="hidden" type="text" id="lat" name="org_lat" value="{{isset($evento->org_lat)?$evento->org_lat:'0'}}">
                                                            <input type="hidden" type="text" id="long" name="org_long" value="{{isset($evento->org_long)?$evento->org_long:'0'}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    
                                    <label for="imagen">* Imagen del Evento</label>

                                    @if ($method=='PUT')
                                        <input type="file" class="dropify" accept="image/gif, image/jpeg, image/png" id="imagen" maxlength='250' name="imagen" data-default-file="{{asset('storage/eventos').'/'.$evento->imagen}}">

                                    @else
                                        <div class="cs-file-drop-area">
                                            <div class="cs-file-drop-icon fe-upload"></div>
                                            <span class="cs-file-drop-message">Arrastre y suelte para subir</span>
                                            
                                                <input type="file" accept="image/gif, image/jpeg, image/png" id="imagen" maxlength='250' name='imagen' class="cs-file-drop-input" required>
                                            
                                            <button type="button" class="cs-file-drop-btn btn btn-primary btn-sm">O seleccione una imagen</button>

                                            <div class="invalid-feedback">Inserta una imagen.</div>
                                        </div>
                                    
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-2 mb-4">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="custom-control custom-checkbox d-block">
                                        <input class="custom-control-input" type="checkbox" id="verificada" name="terminos" value="1" oninvalid="setCustomValidity('Por favor marca esta casilla si tu quieres continuar.')" onchange="try{setCustomValidity('')}catch(e){}" required>
                                        <label class="custom-control-label" for="verificada">* Declaro que conozco los términos y condiciones de esta plataforma y autorizo que se publiquen todos los datos registrados en este formulario.</label>
                                        
                                    </div>
                                    
                                    @if ($method=='PUT')
                                        <button class="btn btn-primary mt-3 mt-sm-0" id='submitbutton' type="submit"><i class="fe-save font-size-lg mr-2"></i>Actualizar</button>
                                    @else
                                        <button class="btn btn-primary mt-3 mt-sm-0" id='submitbutton' type="submit"><i class="fe-save font-size-lg mr-2"></i>Enviar</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    @if ($method=='PUT')

        <div class="modal fade" id="deleteAlert" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h4 class="modal-title text-white"><i class="fe-alert-triangle mr-2"></i> Eliminar Evento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                    </div>

                    <form action="{{ route('app.eventos.delete', $evento->id) }}" role="form" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <div class="text-warning">Está seguro que desea eliminar este evento?</div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary btn-sm">Eliminar</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

        
    @endif
@endsection
@section('footer')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeRzOQr6pAx5Ts1MUHxJRfX6ZjK3ZWJ40&libraries=places&callback=initMap" async defer></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>--}}
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js"></script>
<script>
    //contar palabras
    var maxlength=300;
    var maxword=100;
    function countWords(){

        let str = document.getElementById("descripcion").value;
        var spaces=str.match(/\S+/g);
        var words=spaces ? spaces.length:0;
        // if (words>maxword){
        //     // if (words==maxword+1){
        //     //     maxlength=$('#descripcion').value.length-2
        //     // }
        //     // $('#descripcion').value=$('#descripcion').value.substring(0,maxlength);
        //     // words=maxword;
        //     // alert('Ha rebasado el limite');
        //     $("#descripcion").focus();
        //     $("#descripcion-error-max").addClass('d-inline');
        //     $('#descripcion').addClass('is-invalid');
        // }
        document.getElementById("count-words").innerHTML=words+" palabras";
        if (words>50){
            $("#descripcion-error").html('Ha sobrepasado el límite de palabras permitido');
            $("#descripcion-error").addClass('d-inline');
            $('#descripcion').addClass('is-invalid');
            $('#submitbutton').attr('disabled','disabled');
        }
        else{

            $("#descripcion-error").removeClass('d-inline');
            $('#descripcion').removeClass('is-invalid');
            $('#submitbutton').removeAttr('disabled');
        }
    };
    //
    //funcion url
    function validateURL() {
         var $URL= document.getElementById("url").value;
         var pattern_1 = /^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i;
         var pattern_2 = /^(www)((\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i;       
         if((pattern_1.test($URL) || pattern_2.test($URL) )){
            $("#url-error").removeClass('d-inline');
            $('#url').removeClass('is-invalid');
            $('#submitbutton').removeAttr('disabled');
            
         } else{
            $("#url-error").html('Url invalido');
            $("#url-error").addClass('d-inline');
            $('#url').addClass('is-invalid');
            $('#submitbutton').attr('disabled','disabled');
         }
       }

    //

    var baseURL = '{{ URL::to('/') }}';
    var input = document.getElementById('evento_direccion');
    	
    
    $(document).ready(function(){
        countWords();
        $('.lugar').change(function(){

            if($(this).is(':checked')){
                
                if ($(this).val() == 0){
                    //$('.to-hide').removeClass('d-none');
                    $('.e-presencial .form-control').removeAttr('required');
                    $('.e-presencial').addClass('d-none');
                    $('.e-virtual .form-control').attr('required', true);
                    $('.e-virtual').removeClass('d-none');
                    $('#frm').removeClass('was-validated');
                   
                    
                    

                }else{
                    if ($(this).val() == 1){
                        $('.e-virtual .form-control').removeAttr('required');
                        $('.e-virtual').addClass('d-none');
                        $('.e-presencial .form-control').attr('required', true);
                        $('.e-presencial').removeClass('d-none');
                        $('#frm').removeClass('was-validated');
                        $('#url').removeAttr('required');
                        initMap();
                    }

                }
            }
        });
        
    });
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    function initMap() {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latUsuario = position.coords.latitude;
            var lonUsuario = position.coords.longitude;
            var zoom = 16;
            var dragMarker = true;
            var placeSearch, autocomplete;

            if (
                jQuery('input[id="lat"]').val() != 0 &&
                jQuery('input[id="long"]').val()  != 0
            ){

                latUsuario = jQuery('#lat').val();
                lonUsuario = jQuery('#long').val();
                zoom = zoom;
                //dragMarker = false;
            }

            // var map;
            var marker;
            var myLatlng = new google.maps.LatLng(latUsuario, lonUsuario);
            var geocoder = new google.maps.Geocoder();
            var infowindow = new google.maps.InfoWindow();

            var options = {
                //types: ["locality", "political", "geocode"],
                //types: ['(cities)'],
                componentRestrictions: {country: 'ec'}
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatlng,
                zoom: zoom,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                //icon: baseURL + '/images/markers/me_icon.png',
                draggable: dragMarker,
                animation: google.maps.Animation.DROP,
                title: 'Arrastre para seleccionar la ubicación'
            });
            geocoder.geocode({ 'latLng': myLatlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        jQuery('input[id="lat"],input[id="long"]').show();
                        jQuery('input[id="evento_direccion"]').val(results[0].formatted_address);
                        jQuery('input[id="lat"]').val(marker.getPosition().lat());
                        jQuery('input[id="long"]').val(marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            jQuery('input[id="evento_direccion"]').val(results[0].formatted_address);
                            jQuery('input[id="lat"]').val(marker.getPosition().lat());
                            jQuery('input[id="long"]').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });

            autocomplete.addListener('place_changed', setnewAddress);

            function setnewAddress() {
                var place = autocomplete.getPlace();
                console.log(place.formatted_address);
                var Latlng = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());
                //console.log(Latlng);
                marker.setPosition( Latlng );
                infowindow.setContent(place.formatted_address);
                //infowindow.hideInfoWindow();
                //infowindow.showInfoWindow();
                map.panTo( Latlng );
                jQuery('input[id="lat"]').val(place.geometry.location.lat());
                jQuery('input[id="long"]').val(place.geometry.location.lng());
            }
        });
    };
</script>

<script>

    @if ($method=="PUT" && isset($evento->canton))
        var cantonidd={{old('canton',(int)$evento->canton)??'null'}};
        if (cantonidd){
            var canton_nombre="{{$evento->cantonid->nombre}}";
            $("#canton_id").select2("trigger", "select", {
                     data: { id: cantonidd , text:canton_nombre}
                 });

        }

    @endif



    $(function(){

        let tipo = {{ old('tipo', (int)$evento->tipo) ?? 'null' }};

        switch(tipo){
            case 0:
                $('#evento_virtual').trigger('click');
                break;
            case 1:
                $('#evento_presencial').trigger('click');
                break;
            default:
                break;
        }

    });
  

</script>

@endsection
