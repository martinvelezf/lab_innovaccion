<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convocatoria extends Model
{
    //
    use SoftDeletes;
    protected $table = 'convocatorias';
    protected $fillable = ['tipoconvocatoria_id', 'fecha_inicio', 'fecha_cierre', 'descripcion', 'imagen', 'terminos'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function tipoconvocatoriaid(){
        return $this->belongsTo('App\Models\TipoConvocatoria', "tipoconvocatoria_id","id");
    }
    public function consectores(){
        return $this->hasMany('App\Models\ConvocatoriaSector','convocatoria_id','id');
    }
    public function consubsectores(){
        return $this->hasMany('App\Models\ConvocatoriaSubsector','convocatoria_id','id');
    }
    public function conods(){
        return $this->hasMany('App\Models\ConvocatoriaODS','convocatoria_id','id');
    }

    /**
     * Regresa nos nombres de los sectores productivos de una convocatoria
     */
    public function sectoresName(Convocatoria $convocatoria){
        $sectores = $convocatoria->consectores;
        return $sectores->map(function($s){ return $s->sectorid->nombre; });
    }

    /**
     * Regresa nos nombres de los subsectores productivos de una convocatoria
     */
    public function subsectoresName(Convocatoria $convocatoria){
        $subsectores = $convocatoria->consubsectores;
        return $subsectores->map(function($s){ return $s->subsectorid->nombre; });
    }
}
