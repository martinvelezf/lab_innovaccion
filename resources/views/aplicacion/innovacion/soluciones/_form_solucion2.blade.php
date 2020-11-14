
    <div class="panel-heading">
        <h3 class="panel-title">Identificación de la organización</h3>
    </div>
    <div class="panel-body">

       <div class="row">
           <div class="col-12">
                <div class="form-group">
                    <label class="control-label">* Tipo de innovación propuesta</label><br/>
                    <select style="width:100%;" id="tipo_propuesta" name="tipo_institucion[]"
                            class="form-control select2"
                            data-ajax--url="{{route('api.tipo-poblacion.select2')}}"
                            data-ajax--data-type="json"
                            data-ajax--cache="true"
                            data-close-on-select="false"
                            required="required" multiple>
                        {{-- @if($model->iniciativaInstituciones)
                            @foreach($model->iniciativaInstituciones as $institucion)
                                <option value="{{$institucion->tipo_institucion_id}}"
                                        selected>{{$institucion->tipoInstitucion->descripcion}}</option>
                            @endforeach
                        @endif --}}
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="control-label">* Nivel actual de desarrollo de la solución</label>
                    <select style="width:100%;" id="tipo_poblacion2" name="sector_solucion"
                            class="form-control select2"
                            data-ajax--url="{{route('api.tipo-poblacion.select2')}}"
                            data-ajax--data-type="json"
                            data-ajax--cache="true"
                            data-close-on-select="false"
                            required="required">
                        {{-- @if($model->iniciativaPoblaciones)
                            @foreach($model->iniciativaPoblaciones as $poblacion)
                                <option value="{{$poblacion->tipo_poblacion_id}}"
                                        selected>{{$poblacion->tipoPoblacion->descripcion}}</option>
                            @endforeach
                        @endif --}}
                    </select>
    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label">* Escribe tres palabras o conceptos clave que se refieran a la solución</label>
                    <input maxlength="200" type="text" required="required" class="form-control"
                           placeholder="Ejm:Desarrollo de una plataforma web" name="concepto1_solucion"
                           value=""/>
                    <input maxlength="200" type="text" required="required" class="form-control"
                           placeholder="Ejm:Reingeniería de proceso" name="concepto2_solucion"
                           value=""/>
                    <input maxlength="200" type="text" required="required" class="form-control"
                           placeholder="Ejm:Turnero web" name="concepto3_solucion"
                           value=""/>
                </div>
            </div>
            
        </div>
        
       
        <button class="btn btn-primary nextBtn pull-right mt-4" type="button">Siguiente</button>
    </div>
  