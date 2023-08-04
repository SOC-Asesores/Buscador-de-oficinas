<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\User2;
use App\Models\User3;
use App\Models\UserAsesores;
use App\Models\Fotos;
use Illuminate\Http\Request;
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
        
        // echo '<!-- Total '.count($locations).'-->';
        
        foreach ($locations as $key => $value) {
            $value = json_decode(json_encode($value),TRUE);
            if(!empty($value['lng']) && !empty($value['lat'])){
                $icons = [
                    'diamante' => 'icon-diamante.png',
                    'oro' => 'icon-oro.png',
                    'plata' => 'icon-plata.png',
                ];
                $data['locations'][] = [$value['name'],$value['lat'],$value['lng'],isset($icons[strtolower($value['certificacion'])]) ? $icons[strtolower($value['certificacion'])] : 'icon-sinergia.png'];
            }
        }
        $data['locations'] = json_encode($data['locations']);
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

        $data['state'] = $request->state;
        $data['municipio'] = $request->city;
        $data['products'] = $request->products;
        
        $data['search'] = [];
        if(!empty($data['state'])){ $data['search']['state'] = $data['state']; }
        if(!empty($data['municipio'])){ $data['search']['city'] = $data['municipio']; }
        if(!empty($data['products'])){ $data['search']['products'] = $data['products']; }
        
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
            $micrositios = User::when(!empty($data['state']), function ($query) use($data){
                return $query->whereIn('id',$data['ids'])->orWhere('name','like', '%'.$data['state'])->orWhere('direccion','like', '%'.$data['state']);
                // return $query->where('direccion','like', '%'.$data['state'].'%');
            })
                ->when (!empty($data['municipio']) , function ($query) use($data){
                return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
            })
            ->get()
            ->toArray();
        } elseif(strtolower($request->products) == 'seguros'){
            $seguros = DB::connection('seguros')->table('users')->when(!empty($data['state']), function ($query) use($data){
                return $query->where('direccion','like', '%'.$data['state'].'%');
            })
                ->when (!empty($data['municipio']) , function ($query) use($data){
                return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
            })->get()->toArray();
            
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
            })->get()->toArray();
            
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
            ->get()
            ->toArray();
            
            $seguros = DB::connection('seguros')->table('users')->when(!empty($data['state']), function ($query) use($data){
                return $query->where('direccion','like', '%'.$data['state'].'%');
            })
                ->when (!empty($data['municipio']) , function ($query) use($data){
                return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
            })->get()->toArray();

            $empresas = DB::connection('empresas')->table('users')->when(!empty($data['state']), function ($query) use($data){
                return $query->where('direccion','like', '%'.$data['state'].'%');
            })
                ->when (!empty($data['municipio']) , function ($query) use($data){
                return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
            })->get()->toArray();
            
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
        // return $micrositios;
        $data['states'] = [
            "Aguascalientes"=>"Aguascalientes","Baja California"=>"Baja California","Baja California Sur"=>"Baja California Sur","Campeche"=>"Campeche","Chiapas"=>"Chiapas","Chihuahua"=>"Chihuahua","CDMX"=>"Ciudad de México","Coahuila"=>"Coahuila","Colima"=>"Colima","Durango"=>"Durango ","Estado de Mexico"=>"Estado de México","Guanajuato"=>"Guanajuato","Guerrero"=>"Guerrero","Hidalgo"=>"Hidalgo","Jalisco"=>"Jalisco","Michoacan"=>"Michoacán","Morelos"=>"Morelos","Nayarit"=>"Nayarit","Nuevo Leon"=>"Nuevo León","Oaxaca"=>"Oaxaca","Puebla"=>"Puebla","Queretaro"=>"Querétaro","Quintana Roo"=>"Quintana Roo","San Luis Potosi"=>"San Luis Potosí","Sinaloa"=>"Sinaloa","Sonora"=>"Sonora","Tabasco"=>"Tabasco","Tamaulipas"=>"Tamaulipas","Tlaxcala"=>"Tlaxcala","Veracruz"=>"Veracruz","Yucatan"=>"Yucatán","Zacatecas"=>"Zacatecas"];

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
            
        }else{
             return view('micrositio_hipotecario',['registro' => $registro[0]]);
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
       
        
        
        return request()->segment(count(request()->segments()));
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