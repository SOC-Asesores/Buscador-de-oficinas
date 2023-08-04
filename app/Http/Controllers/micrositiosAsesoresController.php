<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAsesores;
use App\Models\Fotos;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class micrositiosAsesoresController extends Controller
{
    public function getAll(Request $request){
        $asesores = UserAsesores::all();
        return $asesores;
    }

    public function searchAsesores(Request $request) {
        $name = $request->name;
        $state = $request->state;
        $products = $request->products;
        if(!empty($name) ||
           !empty($state) ||
           !empty($products)){
            
            $micrositios['asesores'] = [];
            
            $micrositios['asesores'] = UserAsesores::leftJoin('socaseso_micrositios.users as db2','user_asesores.id_office','=','db2.id_sisec')
                ->select(['user_asesores.*','db2.direccion'])
                ->when(!empty($name), function ($query) use($name){
                return $query->where('user_asesores.name','like', '%'.$name.'%');
            })
                ->when (!empty($state) , function ($query) use($state){
                return $query->where('direccion','like' ,'%'.$state.'%');
            })
                ->when (!empty($products) , function ($query) use($products){
                    $services = Servicios::where('service_area',$products)->get();
                    $query->where(function($query) use ($services){
                        $query->where('servicios', 'like', '%'.$services[0]['service_name'].'%');
                        if(count($services) > 1){
                            foreach($services as $service) {
                                $query->orwhere('user_asesores.servicios', 'like', '%'.$service['service_name'].'%');
                            }
                        }
                    });
                # return $query->where('servicios','like' ,'%'.$products.'%');
            })
            ->orderByRaw( "FIELD(level, 'master', 'máster', 'advanced', 'senior')" )
            // ->paginate(12);
            ->get();
            
            
            /*
            if(!empty($asesores)){
                foreach ($asesores as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    if(strtolower(@$value['level']) == 'master' || strtolower(@$value['level']) == 'máster'){
                        $micrositios['asesores'][] = $value;
                    }
                }
    
                foreach ($asesores as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    if(strtolower(@$value['level']) == 'advanced'){
                        $micrositios['asesores'][] = $value;
                    }
                }
    
                foreach ($asesores as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    if(strtolower(@$value['level']) == 'senior'){
                        $micrositios['asesores'][] = $value;
                    }
                }
    
                foreach ($asesores as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    if(strtolower(@$value['level']) !== 'master' &&
                        strtolower(@$value['level']) !== 'máster' &&
                        strtolower(@$value['level']) !== 'advanced' &&
                        strtolower(@$value['level']) !== 'senior'){
                        $micrositios['asesores'][] = $value;
                    }
                }
            }
            */
            
        } else{
            $micrositios['asesores'] = [];
        }

        if(count($micrositios['asesores']) < 1){
            $micrositios['suggest'] = UserAsesores::leftJoin('socaseso_micrositios.users as db2','user_asesores.id_office','=','db2.id')
                ->select(['user_asesores.*','db2.direccion'])
                ->when(!empty($name), function ($query) use($name){
                $keywords = explode(' ',$name);
                // $keywords = ['creditos', 'asesores', 'puebla'];
                foreach($keywords as $keyword) {
                    $query->orwhere('user_asesores.name', 'like', '%'.$keyword.'%');
                }
                // return $query->whereIn('name',$array_names);
            })
                ->when (!empty($state) , function ($query) use($state){
                return $query->orwhere('direccion','like' ,'%'.$state.'%');
            })
                ->when (!empty($products) , function ($query) use($products){
                    $services = Servicios::where('service_area',$products)->get();
                    $query->where(function($query) use ($services){
                        $query->where('servicios', 'like', '%'.$services[0]['service_name'].'%');
                        if(count($services) > 1){
                            foreach($services as $service) {
                                $query->orwhere('user_asesores.servicios', 'like', '%'.$service['service_name'].'%');
                            }
                        }
                    });
                # return $query->orwhere('producto_1','like' ,'%'.$products.'%');
            })
            ->orderByRaw( "FIELD(level, 'master', 'máster', 'advanced', 'senior')" )
            ->limit(5)
            ->get();
        }

        return json_encode($micrositios);
    }
}