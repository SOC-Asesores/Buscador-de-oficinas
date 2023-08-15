<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\User2;
use App\Models\User3;
use App\Models\UserAsesores;
use App\Models\Fotos;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Mailjet\Resources;
use Illuminate\Support\Facades\Hash;
use URL;
use DB;

class micrositiosController extends Controller
{
    private $siteMap;
    public function ubica_oficina()
    {
        $locations = User::all()->toArray();
        $seguros   = DB::connection('seguros')->table('users')->get()->toArray();
        $empresas  = DB::connection('empresas')->table('users')->get()->toArray();
        
        // echo '<!--'.count($locations)."-->\n";
        // echo '<!--'.count($seguros)."-->\n";
        // echo '<!--'.count($empresas)."-->\n";
        
        $locations = array_merge($locations,$seguros,$empresas);
        
        $states = [
            'Leon',
            'Baja Califnornia Sur',
            'Ciudad de Mexico',
        ];
        // echo '<!-- Total '.count($locations).'-->';
        $quitarCaracteres = array(
            '’' => '','‘' => '','"' => '',' - ' => '-', 'à' => 'a', 'è' => 'e', 'ì' => 'i', 'ò' => 'o', 'ù' => 'u', 'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ñ' => 'n', '/' => '', 'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U', 'Ñ' => 'N', '?' => '', '¿' => '', ',' => '-', '(' => '-', ')' => '-', '/' => '-', ',' => '', '#' => '-', ':' => '-', '!' => '', '¡' => '', '¡' => '','%' => '', '&' => ''
        );
        
        foreach ($locations as $key => $value) {

            $value = json_decode(json_encode($value),TRUE);
            if(!empty($value['lng']) && !empty($value['lat'])){
                
                $cleanStr = str_replace(array_keys($quitarCaracteres), array_values($quitarCaracteres), trim($value['estado']));
                
                if($cleanStr == 'Hermosillo') { $cleanStr = 'Sonora'; }
                if($cleanStr == 'Monterrey') { $cleanStr = 'Nuevo Leon'; }
                if($cleanStr == 'Villahermosa') { $cleanStr = 'Tabasco'; }

                if(!in_array($cleanStr, $states)){
                    
                    $states[] = $cleanStr;
                    
                    $icons = [
                        'diamante' => 'icon-diamante.png',
                        'oro' => 'icon-oro.png',
                        'plata' => 'icon-plata.png',
                    ];
                    $data['locations'][] = [
                        $value['name'],
                        $value['lat'],
                        $value['lng'],
                        // isset($icons[strtolower($value['certificacion'])]) ? $icons[strtolower($value['certificacion'])] : 'icon-sinergia.png'
                        'faviconx25.png',
                        $cleanStr
                    ];
                }
            }
        }
        $data['locations'] = json_encode($data['locations']);

        echo "<!--";
        var_dump($states);
        echo "-->";

        $data['states'] = [
            "Aguascalientes"=>"Aguascalientes","Baja California"=>"Baja California","Baja California Sur"=>"Baja California Sur","Campeche"=>"Campeche","Chiapas"=>"Chiapas","Chihuahua"=>"Chihuahua","CDMX"=>"Ciudad de México","Coahuila"=>"Coahuila","Colima"=>"Colima","Durango"=>"Durango ","Estado de Mexico"=>"Estado de México","Guanajuato"=>"Guanajuato","Guerrero"=>"Guerrero","Hidalgo"=>"Hidalgo","Jalisco"=>"Jalisco","Michoacan"=>"Michoacán","Morelos"=>"Morelos","Nayarit"=>"Nayarit","Nuevo Leon"=>"Nuevo León","Oaxaca"=>"Oaxaca","Puebla"=>"Puebla","Queretaro"=>"Querétaro","Quintana Roo"=>"Quintana Roo","San Luis Potosi"=>"San Luis Potosí","Sinaloa"=>"Sinaloa","Sonora"=>"Sonora","Tabasco"=>"Tabasco","Tamaulipas"=>"Tamaulipas","Tlaxcala"=>"Tlaxcala","Veracruz"=>"Veracruz","Yucatan"=>"Yucatán","Zacatecas"=>"Zacatecas"];
        
        return view('offices',$data);
    }

    public function lista_oficinas()
    {
        $locations = User::all();
        $seguros   = DB::connection('seguros')->table('users')->get();
        $empresas  = DB::connection('empresas')->table('users')->get();
        return view('offices_lista',["hipotecario" => $locations, "seguros" => $seguros, "empresas"=>$empresas]);
    }

    public function lista_oficinas_meta()
    {
        $locations = User::all();
        $seguros   = DB::connection('seguros')->table('users')->get();
        $empresas  = DB::connection('empresas')->table('users')->get();
        return view('offices_lista_meta',["hipotecario" => $locations, "seguros" => $seguros, "empresas"=>$empresas]);
    }

    public function lista_oficinas_xml()
    {
         $this->siteMap = new SiteMap();

        $this->addUniqueRoutes();
        $this->addArticles();
        $this->addCategories();
        $this->addDynamicPages();
        $this->addTags();
        $this->addProjects();
        $this->addProfilePages();

        return response($this->siteMap->build(), 200)
            ->header('Content-Type', 'text/xml');
    }

    public function ubica_asesor(Request $request)
    {
        return view('buscador_asesores');
    }

    public function getAll($url){
        $micrositios = User::all();

        return $micrositios;
    }
    public function search(Request $request){

        $data['type'] = $request->type;
        $data['state'] = $request->state;
        $data['municipio'] = $request->city;
        $data['products'] = $request->products;
        
        $data['search'] = [];
        if(!empty($data['type'])){ $data['search']['type'] = $data['type']; }
        if(!empty($data['state'])){ $data['search']['state'] = $data['state']; }
        if(!empty($data['municipio'])){ $data['search']['city'] = $data['municipio']; }
        if(!empty($data['products'])){ $data['search']['products'] = $data['products']; }
        
        if($request->type !== 'Asesor') {
            $micrositios = [];
            // Con esto podemos agregar la sucursal de CRECE dependiendo de la búsqueda
            $data['ids'] = [0];
            if(
                // $request->state == 'Campeche' ||
                // $request->city == 'Tuxtla Gutierrez' ||
                // $request->state == 'CDMX' ||
                $request->state == 'Puebla'
            ){
                $data['ids'][] = 628;
            }
            // $seguros   = DB::connection('seguros')->table('users')->get()->toArray();
            // $empresas  = DB::connection('empresas')->table('users')->get()->toArray();

            if(strtolower($request->products) == 'hipotecario'){
                // Situación sumamente específica
                if($data['state'] == 'Quintana Roo'){
                    $micrositios = User::when(!empty($data['state']), function ($query) use($data){
                        return $query->whereIn('id',$data['ids'])->orWhere('name','like', '%'.$data['state'])->orWhere('direccion','like', '%'.$data['state']);
                        // return $query->where('direccion','like', '%'.$data['state'].'%');
                    })
                        ->when (!empty($data['municipio']) , function ($query) use($data){
                        return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
                    })
                    ->orderByRaw('FIELD(id,271,260,1018,946,195)')
                    ->orderBy('name', 'asc')
                    ->get()
                    ->toArray();
                    
                } else{
                    $micrositios = User::when(!empty($data['state']), function ($query) use($data){
                        return $query->whereIn('id',$data['ids'])->orWhere('name','like', '%'.$data['state'])->orWhere('direccion','like', '%'.$data['state']);
                        // return $query->where('direccion','like', '%'.$data['state'].'%');
                    })
                        ->when (!empty($data['municipio']) , function ($query) use($data){
                        return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
                    })
                    ->orderBy('name', 'asc')
                    ->get()
                    ->toArray();
                }
            } elseif(strtolower($request->products) == 'seguros'){
                $seguros = DB::connection('seguros')->table('users')->when(!empty($data['state']), function ($query) use($data){
                    return $query->where('direccion','like', '%'.$data['state'].'%');
                })
                    ->when (!empty($data['municipio']) , function ($query) use($data){
                    return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
                })->orderBy('name', 'asc')->get()->toArray();
                
                $seguros = json_decode(json_encode($seguros),TRUE);
                
                if(!empty($seguros)){
                    foreach($seguros as $s => $seguro){
                        $seguros[$s]['linea_de_negocio'] = 'seguros';
                    }
                }
            
                $micrositios = $seguros;
                
            } elseif(strtolower($request->products) == 'empresarial'){

                $empresas = DB::connection('empresas')->table('users')->when(!empty($data['state']), function ($query) use($data){
                    return $query->where('direccion','like', '%'.$data['state'].'%');
                })
                    ->when (!empty($data['municipio']) , function ($query) use($data){
                    return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
                })->orderBy('name', 'asc')->get()->toArray();
                
                $empresas = json_decode(json_encode($empresas),TRUE);
                
                if(!empty($empresas)){
                    foreach($empresas as $e => $empresa){
                        $empresas[$e]['linea_de_negocio'] = 'empresarial';
                    }
                }
                
                $micrositios = $empresas;
            } elseif(empty($request->products)){
                
                $micrositios = User::when(!empty($data['state']), function ($query) use($data){
                    return $query->whereIn('id',$data['ids'])->orWhere('name','like', '%'.$data['state'])->orWhere('direccion','like', '%'.$data['state']);
                    // return $query->where('direccion','like', '%'.$data['state'].'%');
                })
                    ->when (!empty($data['municipio']) , function ($query) use($data){
                    return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
                })
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
                
                $seguros = DB::connection('seguros')->table('users')->when(!empty($data['state']), function ($query) use($data){
                    return $query->where('direccion','like', '%'.$data['state'].'%');
                })
                    ->when (!empty($data['municipio']) , function ($query) use($data){
                    return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
                })->orderBy('name', 'asc')->get()->toArray();

                $empresas = DB::connection('empresas')->table('users')->when(!empty($data['state']), function ($query) use($data){
                    return $query->where('direccion','like', '%'.$data['state'].'%');
                })
                    ->when (!empty($data['municipio']) , function ($query) use($data){
                    return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
                })->orderBy('name', 'asc')->get()->toArray();
                
                $seguros = json_decode(json_encode($seguros),TRUE);
                
                if(!empty($seguros)){
                    foreach($seguros as $s => $seguro){
                        $seguros[$s]['linea_de_negocio'] = 'seguros';
                    }
                }
                
                $empresas = json_decode(json_encode($empresas),TRUE);
                
                if(!empty($empresas)){
                    foreach($empresas as $e => $empresa){
                        $empresas[$e]['linea_de_negocio'] = 'empresarial';
                    }
                }
                
                $micrositios = array_merge($micrositios,$empresas,$seguros);
                
            }

            $data['micrositios'] = [];
            
            // $columns = array_column($micrositios, 'name');
            // array_multisort($columns, SORT_ASC, $micrositios);
            
            // echo '<!-- ';
            // var_dump($micrositios);
            // echo ' -->';

            if(!empty($micrositios)){
                foreach ($micrositios as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    if(strtolower($value['certificacion']) == 'diamante'){
                        $data['micrositios'][] = $value;
                    }
                }

                foreach ($micrositios as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    if(strtolower($value['certificacion']) == 'oro'){
                        $data['micrositios'][] = $value;
                    }
                }

                foreach ($micrositios as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    if(strtolower($value['certificacion']) == 'plata'){
                        $data['micrositios'][] = $value;
                    }
                }

                foreach ($micrositios as $key => $value) {
                    $value = json_decode(json_encode($value),TRUE);
                    // if(strtolower($value['certificacion']) == '0' || empty(strtolower($value['certificacion']))){
                    if(strtolower($value['certificacion']) !== 'diamante' &&
                        strtolower($value['certificacion']) !== 'oro' &&
                        strtolower($value['certificacion']) !== 'plata'){
                        $data['micrositios'][] = $value;
                    }
                }
            }
        } else{
            $data['micrositios'] = [];
        }
        // return $micrositios;
        $data['states'] = [
            "Aguascalientes"=>"Aguascalientes","Baja California"=>"Baja California","Baja California Sur"=>"Baja California Sur","Campeche"=>"Campeche","Chiapas"=>"Chiapas","Chihuahua"=>"Chihuahua","CDMX"=>"Ciudad de México","Coahuila"=>"Coahuila","Colima"=>"Colima","Durango"=>"Durango ","Estado de Mexico"=>"Estado de México","Guanajuato"=>"Guanajuato","Guerrero"=>"Guerrero","Hidalgo"=>"Hidalgo","Jalisco"=>"Jalisco","Michoacan"=>"Michoacán","Morelos"=>"Morelos","Nayarit"=>"Nayarit","Nuevo Leon"=>"Nuevo León","Oaxaca"=>"Oaxaca","Puebla"=>"Puebla","Queretaro"=>"Querétaro","Quintana Roo"=>"Quintana Roo","San Luis Potosi"=>"San Luis Potosí","Sinaloa"=>"Sinaloa","Sonora"=>"Sonora","Tabasco"=>"Tabasco","Tamaulipas"=>"Tamaulipas","Tlaxcala"=>"Tlaxcala","Veracruz"=>"Veracruz","Yucatan"=>"Yucatán","Zacatecas"=>"Zacatecas"];


        if($request->type !== 'Oficina') {
            $name = $request->name;
            $state = $request->state;
            $products = $request->products;
            if(!empty($name) ||
               !empty($state) ||
               !empty($products)){
                
                $data['asesores'] = [];
                
                $data['asesores'] = UserAsesores::leftJoin('socaseso_micrositios.users as db2','user_asesores.id_office','=','db2.id_sisec')
                    ->select(['user_asesores.*','db2.direccion'])
                    ->when(!empty($name), function ($query) use($name){
                    return $query->where('user_asesores.name','like', '%'.$name.'%');
                })
                    ->when (!empty($state) , function ($query) use($state){
                    return $query->where('direccion','like' ,'%'.$state.'%');
                })
                    ->when (!empty($products) , function ($query) use($products){
                        $services = Servicios::where('service_area',$products)->get()->toArray();
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
                ->get()
                ->toArray();
                
                
                /*
                if(!empty($asesores)){
                    foreach ($asesores as $key => $value) {
                        $value = json_decode(json_encode($value),TRUE);
                        if(strtolower(@$value['level']) == 'master' || strtolower(@$value['level']) == 'máster'){
                            $data['asesores'][] = $value;
                        }
                    }
        
                    foreach ($asesores as $key => $value) {
                        $value = json_decode(json_encode($value),TRUE);
                        if(strtolower(@$value['level']) == 'advanced'){
                            $data['asesores'][] = $value;
                        }
                    }
        
                    foreach ($asesores as $key => $value) {
                        $value = json_decode(json_encode($value),TRUE);
                        if(strtolower(@$value['level']) == 'senior'){
                            $data['asesores'][] = $value;
                        }
                    }
        
                    foreach ($asesores as $key => $value) {
                        $value = json_decode(json_encode($value),TRUE);
                        if(strtolower(@$value['level']) !== 'master' &&
                            strtolower(@$value['level']) !== 'máster' &&
                            strtolower(@$value['level']) !== 'advanced' &&
                            strtolower(@$value['level']) !== 'senior'){
                            $data['asesores'][] = $value;
                        }
                    }
                }
                */
                
            } else{
                $data['asesores'] = [];
            }
        }

        return view('offices_results',$data);
    }

    public function oficina($estado, $ciudad, $url){
        function eliminar_acentos($cadena){
                
                //Reemplazamos la A y a
                $cadena = str_replace(
                array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
                array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
                $cadena
                );

                //Reemplazamos la E y e
                $cadena = str_replace(
                array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
                array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
                $cadena );

                //Reemplazamos la I y i
                $cadena = str_replace(
                array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
                array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
                $cadena );

                //Reemplazamos la O y o
                $cadena = str_replace(
                array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
                array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
                $cadena );

                //Reemplazamos la U y u
                $cadena = str_replace(
                array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
                array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
                $cadena );

                //Reemplazamos la N, n, C y c
                $cadena = str_replace(
                array('Ñ', 'ñ', 'Ç', 'ç'),
                array('N', 'n', 'C', 'c'),
                $cadena
                );
                
                return $cadena;
            }
            function clean($string) {
                $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
                $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
                $string = strtolower($string);
                        
                return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
            }


        $registro = User::where('url_clean',$url)->get();


        if (@count($registro) <= 0) {
            $registro = User::where('url',$url)->get();
            if (@count($registro) == 1) {
                $registro_2 = User::where([
                    ['url', '=', $url],
                    ['estado_seo', '=', $estado],
                    ['ciudad_seo', '=', $ciudad]
                ])->get();

                $tamanio_2 = count($registro_2);
                if($tamanio_2 > 0){
                    if ($registro_2[0]["url_clean"] == null) { 
                    $registro_2 = User::find($registro_2[0]["id"]);
                        $url = explode(" -  ", $registro_2->sucursal);
                        $url = explode(" - ", $url[0]);
                        $url = eliminar_acentos($url[0]);
                        $url = clean($url);
                        $registro_2->url_clean = $url;
                        $registro_2->save();

                        return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro_2->url_clean);
                    }else{
                        return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro_2[0]["url_clean"]);
                    }
                }else{
                    if ($registro[0]["url_clean"] == null) { 
                    $registro = User::find($registro[0]["id"]);
                        $url = explode(" -  ", $registro->sucursal);
                        $url = explode(" - ", $url[0]);
                        $url = eliminar_acentos($url[0]);
                        $url = clean($url);
                        $registro->url_clean = $url;
                        $registro->save();

                        return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro->url_clean);
                    }else{
                        return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro[0]["url_clean"]);
                    }
                }
                
            }else{
                $registro = User3::where('url_clean',$url)->get();

                if (@count($registro) <= 0) {
                    $registro = User3::where('url',$url)->get();
                    if (@count($registro) > 0) {
                        if ($registro[0]["url_clean"] == null) { 
                            $registro = User::find($registro[0]["id"]);
                            $url = explode(" -  ", $registro->sucursal);
                            $url = explode(" - ", $url[0]);
                            $url = eliminar_acentos($url[0]);
                            $url = clean($url);
                            $registro->url_clean = $url;
                            $registro->save();

                            return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro->url_clean);
                }else{
                    return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro[0]["url_clean"]);
                }
                    }else{
                        $registro = User2::where('url_clean',$url)->get();

                        if (@count($registro) <= 0) {
                            $registro = User2::where('url',$url)->get();
                            if (@count($registro) > 0) {
                                if ($registro[0]["url_clean"] == null) { 
                                    $registro = User2::find($registro[0]["id"]);
                                    $url = explode(" -  ", $registro->sucursal);
                                    $url = explode(" - ", $url[0]);
                                    $url = eliminar_acentos($url[0]);
                                    $url = clean($url);
                                    $registro->url_clean = $url;
                                    $registro->save();

                                    return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro->url_clean);
                                }else{
                                    return Redirect::to('https://socasesores.com/oficinas/'.$estado.'/'.$ciudad.'/'.$registro[0]["url_clean"]);
                                }
                            }
                            
                        }else{

                             return view('micrositio_empresarial',['registro' => $registro[0]]);
                        }
                    }
                    
                }else{
                    return view('micrositio_seguros',['registro' => $registro[0]]);
                }
            }
            
        }elseif(@count($registro) >= 2){
                $registro = User::where([
                    ['url_clean', '=', $url],
                    ['estado_seo', '=', $estado],
                    ['ciudad_seo', '=', $ciudad]
                ])->get();


                 if($registro[0]["place_id"] != null){
                        $reviews = Http::get('https://maps.googleapis.com/maps/api/place/details/json?place_id='.$registro[0]["place_id"].'&key=AIzaSyCeaHvmVaf68SRKhVbkuXqx1FJtRiApXvw&language=es');
                        $reviews = $reviews->object()->result;
                        return view('micrositio_hipotecario',['registro' => $registro[0],'reviews'=> $reviews]);
                    }else{
                        return view('micrositio_hipotecario',['registro' => $registro[0]]);
                    }

               
        }else{
            if($registro[0]["place_id"] != null){
                        $reviews = Http::get('https://maps.googleapis.com/maps/api/place/details/json?place_id='.$registro[0]["place_id"].'&key=AIzaSyCeaHvmVaf68SRKhVbkuXqx1FJtRiApXvw&language=es');
                        $reviews = $reviews->object()->result;
                        return view('micrositio_hipotecario',['registro' => $registro[0],'reviews'=> $reviews]);
                    }else{
                      
                        return view('micrositio_hipotecario',['registro' => $registro[0]]);
                    }
             
        }


        
    }
    public function sendMail(Request $request){

         $mj = new \Mailjet\Client("3ed1abd6eef1c2e815025a2801116c70", "4775bb3a9bcedb326bc355925aa04edf",true,['version' => 'v3.1']);

            // Define your request body
            $texto = 
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "developer.soc.asesores@gmail.com",
                            'Name' => "Webmaster"
                        ],
                        'To' => [
                            [
                                'Email' => $request->email_cliente,
                                'Name' => $request->email_cliente
                            ]
                        ],
                        'Subject' => "Contacto desde el Micrositio",
                        'HTMLPart' => 'Estos son los datos del cliente:<ul>
                                            <li>Nombre: '.$request->name.'</li>
                                            <li>Teléfono: '.$request->phone.'</li>
                                            <li>Email: '.$request->email.'</li>
                                            <li>¿Qué tipo de crédito te interesa?: '.$request->type.'</li>
                                            <li>Mensaje: '.$request->message.'</li>
                                        </ul>'
                    ]
                ]
            ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
       
        
        
        return view("sendmail", ["email_cliente" => $request->email_cliente]);
    }
    public function searchAll(Request $request){
        $busqueda = $request->busqueda;
        if ($busqueda == null) {
           $locations = User::all();
            $seguros   = DB::connection('seguros')->table('users')->get();
            $empresas  = DB::connection('empresas')->table('users')->get();
            return view('offices_lista',["hipotecario" => $locations, "seguros" => $seguros, "empresas"=>$empresas]);
        }else{

        }

        $hipotecario = User::where('name', 'LIKE', '%'.$busqueda.'%')->get()->toArray();
        $seguros = DB::connection('seguros')->table('users')->where('name', 'LIKE', '%'.$busqueda.'%')->get()->toArray();
        $empresas = DB::connection('empresas')->table('users')->where('name', 'LIKE', '%'.$busqueda.'%')->get()->toArray();
        $micrositios = array();

        if ($hipotecario != null) {
           $micrositios = array_merge($hipotecario);
        }else{}

        if ($seguros != null) {
            $micrositios = array_merge($seguros);
        }else{}

        if ($empresas != null) {
            $micrositios = array_merge($empresas);
        }else{}
        
        
      
        return view('offices_lista', ["oficinas_busqueda"=>$micrositios]);
        
    }
    public function sendMail2(Request $request){
         $mj = new \Mailjet\Client("3ed1abd6eef1c2e815025a2801116c70", "4775bb3a9bcedb326bc355925aa04edf",true,['version' => 'v3.1']);

            // Define your request body
            $texto = 
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "ingluisfelipe07@gmail.com",
                            'Name' => "Webmaster"
                        ],
                        'To' => [
                            [
                                'Email' => $request->email_cliente,
                                'Name' => $request->email_cliente
                            ]
                        ],
                        'Subject' => "Contacto desde el Micrositio",
                        'HTMLPart' => 'Estos son los datos del cliente:<ul>
                                            <li>Nombre: '.$request->name.'</li>
                                            <li>Teléfono: '.$request->phone.'</li>
                                            <li>Email: '.$request->email.'</li>
                                            <li>Fecha de nacimiento: '.$request->date.'</li>
                                            <li>¿En que vas invertir tu crédito?: '.$request->invertir.'</li>
                                            <li>¿Cuánto ganas al mes?: '.$request->mes.'</li>
                                            <li>¿Como compruebas ingresos?: '.$request->ingresos.'</li>
                                            <li>Email: '.$request->email.'</li>
                                            <li>¿Te gustaría ser contactado por un especialista hipotecario?: '.$request->contactado.'</li>
                                           
                                        </ul>'
                    ]
                ]
            ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
       
        $registro = User::where('url',$request->url)->get();
        return request()->segment(count(request()->segments()));
    }
}