@php
    $contactos = $model->iniciativaContactos??[];
@endphp
<div class="panel-heading">
    <h3 class="panel-title">Información de contacto</h3>
</div>
<div class="panel-body">
    <div class="contact_container">
        <div class="contact_placeholder" data-iterator="0">
            <div class="form-group">
                <label class="control-label">* Nombre de la pesona encargada de la Iniciativa</label>
                <input name="iniciativa_contacto[0][nombre_persona]" maxlength="200" type="text" required="required"
                       class="form-control" placeholder="Nombre del encargado"
                       value="{{(isset($contactos[0]))?$contactos[0]->nombre_persona:''}}">
            </div>
            <div class="form-group">
                <label class="control-label">Teléfono móvil</label>
                <input name="iniciativa_contacto[0][celular]" type="text" required="required" class="form-control"
                       value="{{(isset($contactos[0]))?$contactos[0]->celular:''}}">
            </div>
            <div class="form-group">
                <label class="control-label">* Correo electrónico</label>
                <input name="iniciativa_contacto[0][correo_electronico]" maxlength="200" type="email"
                       required="required" class="form-control"
                       value="{{(isset($contactos[0]))?$contactos[0]->correo_electronico:''}}">
            </div>
        </div>
    </div>
    <div class="contact_container is-hidden {{(isset($contactos[1]))?'':'d-none'}}">
        <div class="contact_placeholder" data-iterator="0">
            <hr/>
            <p class="text-right mt-2"><span id="remove_contact" class="btn btn-danger"><i
                            class="fe-trash font-size-lg mr-2"></i> Quitar contacto (2)</span></p>
            <div class="form-group">
                <label class="control-label">* Nombre de la pesona encargada de la Iniciativa (2)</label>
                <input name="iniciativa_contacto[1][nombre_persona]" maxlength="200" type="text" class="form-control"
                       placeholder="Nombre del contacto"
                       value="{{(isset($contactos[1]))?$contactos[1]->nombre_persona:''}}">
            </div>
            <div class="form-group">
                <label class="control-label">Teléfono móvil (2)</label>
                <input name="iniciativa_contacto[1][celular]" type="text" class="form-control"
                       value="{{(isset($contactos[1]))?$contactos[1]->celular:''}}">
            </div>
            <div class="form-group">
                <label class="control-label">* Correo electrónico (2)</label>
                <input name="iniciativa_contacto[1][correo_electronico]" maxlength="200" type="email"
                       class="form-control" value="{{(isset($contactos[1]))?$contactos[1]->correo_electronico:''}}"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-right">
            <button id="add_contact" class="btn btn-sm btn-primary" type="button"><i
                        class="fe-plus font-size-lg mr-2"></i> Agregar nuevo contacto
            </button>
        </div>
    </div>
    <hr/>
    <div class="form-group">
        <input class="custom-control-input" type="checkbox" id="verificada" name="iniciativa_verificada"
               required="required">
        <label class="custom-control-label" for="verificada">* Declaro que conozco los términos y condiciones de esta
            plataforma y autorizo que se publiquen todos los datos registrados en este formulario.</label>
    </div>
    <button class="btn btn-primary submitBtn pull-right" type="submit">
        <i class="fe-save font-size-lg mr-2"></i> Guardar
    </button>
    <div id="error-message" class="text-danger"></div>
</div>