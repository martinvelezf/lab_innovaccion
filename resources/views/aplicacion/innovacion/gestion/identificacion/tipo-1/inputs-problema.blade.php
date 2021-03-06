@php
    $sectores = $convocatoria->sectoresName($convocatoria);
    $sectoresArray = '';
    foreach ($sectores as $sector) {
        $sectoresArray .= $sector;
        if ($sector != $sectores->last()) {
            $sectoresArray .= '; ';
        }
    }

    $subsectores = $convocatoria->subsectoresName($convocatoria);
    $subsectoresArray = '';
    foreach ($subsectores as $subsector) {
        $subsectoresArray .= $subsector;
        if ($subsector != $subsectores->last()) {
            $subsectoresArray .= '; ';
        }
    }
@endphp
<div class="form-group">
    <div class="controls-container mb-3">
        <label class="control-label">* Pertenece al sector productivo: {{ $sectoresArray }}.</label>
        <div class="row">
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="sector" type="radio" id="sector-1" name="sector" value="1" {{ old('sector', $problema->sector) == '1' ? 'checked' : '' }} required>
                    <label class="custom-control-label" for="sector-1">Si</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="sector" type="radio" id="sector-2" name="sector" value="0" {{ old('sector', $problema->sector) == '0' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="sector-2">No</label>
                </div>
            </div>
            @error('sector')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
        </div>
        <div class="message-for-no d-none">
            <p>Esta convocatoria está dirigida al sector: {{ $sectoresArray }}.</p>
        </div>
    </div>
    <div class="controls-container mb-3 has-parent sector {{ old('subsector', $problema->subsector) ? '' : 'd-none' }}">
        <label class="control-label">* Pertenece al subsector productivo: {{ $subsectoresArray }}.</label>
        <div class="row">
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="subsector" type="radio" id="subsector-1" name="subsector" value="1"  {{ old('subsector', $problema->subsector) == '1' ? 'checked' : '' }} required>
                    <label class="custom-control-label" for="subsector-1">Si</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="subsector" type="radio" id="subsector-2" name="subsector" value="0" {{ old('subsector', $problema->subsector) == '0' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="subsector-2">No</label>
                </div>
            </div>
            @error('subsector')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
        </div>
        <div class="message-for-no d-none">
            <p>Esta convocatoria está dirigida al sector {{ $subsectoresArray }}.</p>
        </div>
    </div>
    <div class="controls-container mb-3 has-parent subsector {{ old('confidencial', $problema->confidencial) ? '' : 'd-none' }}">
        <label class="control-label">* El problema detectado no es confidencial, por lo tanto, puede ser tratado de forma abierta con actores externos a ti, tu equipo u organización</label>
        <div class="row">
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="confidencial" type="radio" id="confidencial-1" name="confidencial" value="1" {{ old('confidencial', $problema->confidencial) == '1' ? 'checked' : '' }} required>
                    <label class="custom-control-label" for="confidencial-1">Si</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="confidencial" type="radio" id="confidencial-2" name="confidencial" value="0" {{ old('confidencial', $problema->confidencial) == '0' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="confidencial-2">No</label>
                </div>
            </div>
            @error('confidencial')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
        </div>
        <div class="message-for-no d-none">
            <p>Esta convocatoria busca generar porcesos de innovación abierta que requieren la participación de agente externos.</p>
        </div>
    </div>
    <div class="controls-container mb-3 has-parent confidencial {{ old('recomendaciones', $problema->recomendaciones) ? '' : 'd-none' }}">
        <label class="control-label">* Tú, tu equipo u organización están de acuerdo en recibir e implementar cambios rápidos en su esquema de trabajo, a partir de recomendaciones de agentes externos a la organización</label>
        <div class="row">
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="esquema" type="radio" id="esquema-1" name="recomendaciones" value="1" {{ old('recomendaciones', $problema->recomendaciones) == '1' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="esquema-1">Si</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="esquema" type="radio" id="esquema-2" name="recomendaciones" value="0" {{ old('recomendaciones', $problema->recomendaciones) == '0' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="esquema-2">No</label>
                </div>
            </div>
            @error('recomendaciones')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
        </div>
        <div class="message-for-no d-none">
            <p>Esta convocatoria busca generar porcesos de innovación abierta que requieren la participación de agente externos.</p>
        </div>
    </div>
    <div class="controls-container mb-3 has-parent esquema {{ old('datos', $problema->datos) ? '' : 'd-none' }}">
        <label class="control-label">* Tú, tu equipo u organización tienen disponibilidad para interactuar con otros actores para entregar datos e información para resolver el problema detectado</label>
        <div class="row">
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="interactuar" type="radio" id="interactuar-1" name="datos" value="1" {{ old('datos', $problema->datos) == '1' ? 'checked' : '' }} required>
                    <label class="custom-control-label" for="interactuar-1">Si</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-1">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input form-control conditional" data-target="interactuar" type="radio" id="interactuar-2" name="datos" value="0" {{ old('datos', $problema->datos) == '0' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="interactuar-2">No</label>
                </div>
            </div>
            @error('datos')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
        </div>
        <div class="message-for-no d-none">
            <p>Esta convocatoria busca generar porcesos de innovación abierta que requieren la participación de agente externos.</p>
        </div>
    </div>
    <div class="controls-container mb-3 has-parent interactuar {{ old('actividad', $problema->actividad) ? '' : 'd-none' }}">
        <label class="control-label">* Describe cuál es la actividad productiva que realizas, y en la cual se ha presentado el problema detectado (400 caractéres)</label>
        <textarea class="form-control" id="textarea-input" rows="3" name="actividad" placeholder="NUESTRA EMPRESA/PROYECTO/EQUIPO produce enlatados de frutas para exportación, ACTIVIDAD EN LA CUAL TENEMOS EL PROBLEMA de alto costo en el proceso de recepción de materia prima y su clasificación." minlength="20" maxlength="400" required>{{ old('actividad', $problema->actividad) }}</textarea>
        @error('actividad')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
    </div>
    <div class="controls-container mb-3 has-parent interactuar {{ old('problema', $problema->problema) ? '' : 'd-none' }}">
        <label class="control-label">* Describe cuál es el problema detectado (500 caractéres)</label>
        <textarea class="form-control" id="textarea-input" rows="5" name="problema"  placeholder="EN EL PROCESO DE PRODUCCIÓN/GESTIÓN SE HA DETECTADO UN PROBLEMA QUE AFECTA al procesos de clasificación, debido a que la materia prima que llega no cumple con el estándar de calidad requerido en el mercado internacional, LO CUAL OCASIONA demoras en la clasificación, falta de materia prima para el procesamientos, altos costos de manos de obra por el tiempo empleado en clasificar." minlength="20" maxlength="500" required>{{ old('problema', $problema->problema) }}</textarea>
        @error('problema')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
    </div>
    <div class="controls-container mb-3 has-parent interactuar {{ old('sector', $problema->sector) ? '' : 'd-none' }}">
        @if($method == 'POST')
        <div class="cs-file-drop-area">
            <div class="cs-file-drop-icon fe-upload"></div>
            <span class="cs-file-drop-message">ARRASTRA Y SUELTA AQUÍ PARA SUBIR</span>
            <input type="file" class="cs-file-drop-input" title="Avatar del usuario" name="archivo" id="pdf" required>
            <button type="button" class="cs-file-drop-btn btn btn-primary btn-sm">O selecciona archivo</button>
            <div class="invalid-feedback">Agrega una imagen antes de enviar.</div>
        </div>
        @else
        @php
            $img = asset('img/logo/logo-icon-footer.png');
            if(Storage::disk('problemas')->exists($problema->archivo)){
                $img =  asset('storage/problemas/'.$problema->archivo);
            }
            @endphp
        <input type="file" class="dropify" title="Avatar del usuario" name="archivo" id="pdf" required data-default-file="{{$img}}">
        @endif
        @error('archivo')<div class="invalid-feedback d-inline">{{ $message }}</div>@enderror
    </div>
</div>
