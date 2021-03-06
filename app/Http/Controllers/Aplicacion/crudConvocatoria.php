<?php

namespace App\Http\Controllers\Aplicacion;


use Illuminate\Http\Request;
use App\Models\Convocatoria;
use App\Models\ConvocatoriaODS;
use App\Models\ConvocatoriaSector;
use App\Models\ConvocatoriaSubsector;
use App\Http\Controllers\Controller;
use App\Http\Requests\Convocatoria\StorePost;
use App\Http\Requests\Convocatoria\UpdatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// Helpers
use App\Helpers\CustomUrl; // $string
use App\Helpers\Archivos; // $nombre, $archivo, $disk


class crudConvocatoria extends Controller
{
    //
    public function edit($id)
    {

        $convocatoria = Convocatoria::find($id);
        return view('aplicacion.innovacion.create', compact('convocatoria'))->with(['url' => route('app.convocatoria.put',$convocatoria->id),'method'=>'PUT']);
    }


    public function store(StorePost $request)
    {


        $validatedData=$request->validated();

        if($convocatoria=Convocatoria::create($validatedData)){

            if(isset($validatedData['imagen'])){
                $name = CustomUrl::urlTitle('convocatoria'.'_'.$convocatoria->tipoconvocatoria_id.'_'.$convocatoria->id);
                $imageName = Archivos::storeImagen($name, $validatedData['imagen'], 'convocatorias');
                $convocatoria->imagen = $imageName;
                $convocatoria->save();
            }

            foreach ($validatedData['innovacion_ods'] as $ods){

                $conods=ConvocatoriaODS::create([
                    'convocatoria_id'=>$convocatoria['id'],
                    'ods_id' =>$ods
                ]);
                $conods->save();
            }

            if($convocatoria->tipoconvocatoria_id!=2){
                foreach ($validatedData['innovacion_sector_productivo'] as $sector){

                    $consector=ConvocatoriaSector::create([
                        'convocatoria_id'=>$convocatoria['id'],
                        'sector_id' =>$sector
                    ]);
                    $consector->save();
                }
                foreach ($validatedData['innovacion_subsector_productivo'] as $subsector){

                    $consubsector=ConvocatoriaSubsector::create([
                        'convocatoria_id'=>$convocatoria['id'],
                        'subsector_id' =>$subsector
                    ]);
                    $consubsector->save();
                }
            }
            return redirect()->route('home')->with('status', 'Convocatoria creada con éxito');

        }


    }

    public function update(UpdatePost $request, Convocatoria $convocatoria )
    {

        $validatedData = $request->validated();

        $convocatoria->update( $validatedData);

        if(isset($validatedData['imagen'])){
            $name = CustomUrl::urlTitle('convocatoria'.'_'.$convocatoria->tipoconvocatoria_id.'_'.$convocatoria->id);
            $imageName = Archivos::storeImagen($name, $validatedData['imagen'], 'convocatorias');
            $convocatoria->imagen = $imageName;
            $convocatoria->save();
        }
        ConvocatoriaODS::where('convocatoria_id',$convocatoria->id)->delete();
        ConvocatoriaSector::where('convocatoria_id',$convocatoria->id)->delete();
        ConvocatoriaSubsector::where('convocatoria_id',$convocatoria->id)->delete();
        foreach ($validatedData['innovacion_ods'] as $ods){

            $conods=ConvocatoriaODS::create([
                'convocatoria_id'=>$convocatoria['id'],
                'ods_id' =>$ods
            ]);
            $conods->save();
        }

        if($convocatoria->tipoconvocatoria_id!=2){
            foreach ($validatedData['innovacion_sector_productivo'] as $sector){

                $consector=ConvocatoriaSector::create([
                    'convocatoria_id'=>$convocatoria['id'],
                    'sector_id' =>$sector
                ]);
                $consector->save();
            }
            foreach ($validatedData['innovacion_subsector_productivo'] as $subsector){

                $consubsector=ConvocatoriaSubsector::create([
                    'convocatoria_id'=>$convocatoria['id'],
                    'subsector_id' =>$subsector
                ]);
                $consubsector->save();
            }
        }

        return redirect()->route('home')->with('status', 'Convocatoria modificada con éxito');


    }

    public function destroy(Convocatoria $convocatoria) {


        if(Auth::id() != $convocatoria->user_id){
            return back()->with('status', 'No ingresaste esta convocatoria.');
        }
        ConvocatoriaODS::where('convocatoria_id',$convocatoria->id)->delete();
        ConvocatoriaSector::where('convocatoria_id',$convocatoria->id)->delete();
        ConvocatoriaSubsector::where('convocatoria_id',$convocatoria->id)->delete();
        $convocatoria->delete();
        return redirect()->route('home')->with('status', 'Convocatoria eliminada con éxito');
    }

}
