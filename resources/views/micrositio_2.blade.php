<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('css/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <title>{{$registro->sucursal}}</title>
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 300px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: {{$registro->lat}}, lng: {{$registro->lng}} };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
  </head>
        @if ($registro->certificacion == "Plata")
        <body class="plata-2">
        <header class="fixed-top">
            <a class="certificado">
                <img src="{{ url('img/Certificaciones-03.png') }}" alt="">
            </a>
        @elseif ($registro->certificacion == "Oro")
        <body class="oro-2">
        <header class="fixed-top oro">
            <a class="certificado">
                <img src="{{ url('img/Certificaciones-02.png') }}" alt="">
            </a>
        @elseif($registro->certificacion == "Diamante")
        <body class="diamante-2">
        <header class="fixed-top diamante">
            <a class="certificado">
                <img src="{{ url('img/Certificaciones-01.png') }}" alt=""> 
            </a>
        @else
        <body >
            <header class="fixed-top">
        @endif
        @if ($registro->whatsapp != null)
            <a href="https://api.whatsapp.com/send?phone=521{{$registro->whatsapp}}" target="_blank" class="position-fixed" style="bottom: 10px; right: 10px;"><img style="width: 40px" src="{{ url('img/whatsapp.png') }}" alt=""></a>
        @endif
        
        <section class="top-head d-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Crédito Hipotecario
                    @if ($registro->certificacion == "Plata")
                        <img src="{{ url('img/logo_plata.svg') }}" alt="">
                    @elseif ($registro->certificacion == "Oro")
                        <img src="{{ url('img/logo_oro.svg') }}" alt=""></a>
                    @elseif($registro->certificacion == "Diamante")
                        <img src="{{ url('img/logo_diamante.svg') }}" alt="">
                    @else
                    @endif
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="menu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            @if ($registro->certificacion == "Plata")
                                <a class="navbar-brand d-flex align-items-center movil-log" href="#">
                            @elseif ($registro->certificacion == "Oro")
                                <a class="navbar-brand d-flex align-items-center movil-log" href="#">
                            @elseif($registro->certificacion == "Diamante")
                                <a class="navbar-brand d-flex align-items-center movil-log" href="#">
                            @else
                                <a class="navbar-brand d-flex align-items-center" href="#">
                            @endif
                            
                                @if ($registro->logo != null)
                                    <img src="{{url('img/brokers')}}/{{$registro->logo}}" class="d-inline-block align-top ml-0" style="border-right: 0px; max-width: 200px" alt="">
                                @else
                                    @php
                                     $split = explode("-", $registro->name);
                                    @endphp
                                    <img src="{{ url('img/logo-SOC.jpg') }}" class="d-inline-block 
                                    align-top" alt=""> <span>{{ $split[0] }}</span>
                                @endif
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            @if($registro->tipo == "Mixto")
                                <div class="collapse navbar-collapse mr-0" id="navbarTogglerDemo01">
                                  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                    <li class="nav-item">
                                      <a class="nav-link" href="#productos">Asesorías</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contacto">Contáctanos</a>
                                      </li>
                                  </ul>
                                </div>
                            @else
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                    <li class="nav-item">
                                      <a class="nav-link" href="#productos">Productos hipotecarios</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#cotizador">Comparador Hipotecario</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contacto">Contáctanos</a>
                                      </li>
                                  </ul>
                                </div>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <main>
        @if($registro->tipo == "Mixto")
            <section class="home-1 home-crece" style="background-image: url({{ url('img') }}/Header.jpg);">
        @else
            <section class="home-1">
        @endif

            @if($registro->tipo != "Mixto")
                <div class="container">
                    <div class="row align-items-center">
                        @if($registro->tipo == "Mixto")
                            <div class="col-md-6">
                                <h1><b>Broker #1 en México</b></h1>
                                <p>Comprometidos en brindarte la mejor asesoría</p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ url('img/Imagen.png') }}" alt="" class="img-fluid">
                            </div>
                        @else
                            <div class="col-md-6">
                                <h1>Antes de comprar una casa <b>piensa en SOC</b></h1>
                                <p>Somos el Broker líder en asesoría hipotecaria en México</p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ url('img/Imagen.png') }}" alt="" class="img-fluid">
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </section>
        @if($registro->tipo != "Mixto")
            <section class="home-2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <p>Te asesoramos en la elección del crédito Hipotecario más conveniente para ti según tu perfil y tus necesidades. Te acompañamos hasta la firma de tus escrituras</p>
                        </div>
                        <div class="col-md-6 col-12">
                            @if ($registro->imagen_1 != null)
                                <img class="img-fluid" src="{{url('img/brokers')}}/{{$registro->imagen_1}}" alt="">
                            @else
                                <img class="img-fluid" src="{{url('img/servicios_1.jpg')}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            @if ($registro->imagen_2 != null)
                                <img class="img-fluid" src="{{url('img/brokers')}}/{{$registro->imagen_2}}" alt="">
                            @else
                                <img class="img-fluid" src="{{url('img/servicios_2.jpg')}}" alt="">
                            @endif
                        </div>
                        <div class="col-md-6 col-12">
                            <p><span>Nuestro servicio no tiene costo, sí, </span>NO TIENE COSTO<span>, porque la institución financiera que elijas será la que cubrirá nuestros honorarios.</span></p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <div id="productos"></div>
        @if($registro->tipo == "Mixto")
            <section class="mixto">
                <div class="row">
                    <div class="col-12">
                        <h2>Asesorías</h2>
                    </div>
                </div>
            </section>
            <div class="home-buttons">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="content-button" style="background: #fff; border: 1px solid #4b9e4f;">
                                <a href="" target="_blank" id="but-hipotecario">
                                <p>Crédito hipotecario</p>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="content-button" style="background: #fff; border: 1px solid #344359;">
                                <a href="" target="_blank" id="but-empresarial">
                                <p>Crédito empresarial</p>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="content-button" style="background: #fff; border: 1px solid #87b600;">
                                <a href="" target="_blank" id="but-seguros">
                                <p>Seguros</p>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="content-button" style="background: #fff; border: 1px solid #27348b;">
                                <a href="" target="_blank" id="but-otros">
                                <p>Otros productos</p>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="info-hipotecario" style="background: #EDF6EA; padding-top: 2rem; padding-bottom: 2rem;">
                <section class="home-3" style="margin-top: 0rem">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                @php
                                    $productos = explode(",", $registro->productos);
                                @endphp
                                <h2>Productos Hipotecarios</h2>
                                <div class="multiple-items d-none d-sm-block">
                                    @if(isset($productos))
                                        @foreach($productos as $producto)
                                        @switch($producto)
                                            @case("Adquisición de vivienda")
                                                <div class="content-slide">
                                                    <a href="" data-toggle="modal" data-target=".product_1">
                                                        <div class="info">
                                                            <img src="{{url('img/1.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Adquisición de vivienda</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break
                                         
                                            @case("Construcción")
                                                <div class="content-slide">
                                                    <a href="" data-toggle="modal" data-target=".product_2">
                                                        <div class="info">
                                                            <img src="{{url('img/2.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Construcción</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Cambio de hipoteca")
                                                <div class="content-slide">
                                                    <a href="" data-toggle="modal" data-target=".product_3">
                                                        <div class="info">
                                                            <img src="{{url('img/3.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Cambio de hipoteca</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Adquisición de terreno")
                                                <div class="content-slide">
                                                    <a href="" data-toggle="modal" data-target=".product_4">
                                                        <div class="info">
                                                            <img src="{{url('img/4.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Adquisición de terreno</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Terreno + Construcción")
                                                <div class="content-slide d-flex align-items-center">
                                                    <a href="" data-toggle="modal" data-target=".product_5">
                                                        <div class="info">
                                                            <img src="{{url('img/5.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Terreno + Construcción</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Preventa")
                                                <div class="content-slide">
                                                    <a href="" data-toggle="modal" data-target=".product_6">
                                                        <div class="info">
                                                            <img src="{{url('img/6.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Preventa</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Liquidez")
                                                <div class="content-slide d-flex align-items-center">
                                                    <a href="" data-toggle="modal" data-target=".product_7">
                                                        <div class="info">
                                                            <img src="{{url('img/7.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Liquidez</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Liquidez + sustitución")
                                                <div class="content-slide d-flex align-items-center">
                                                    <a href="" data-toggle="modal" data-target=".product_8">
                                                        <div class="info">
                                                            <img src="{{url('img/8.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Liquidez + sustitución</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Renovación / Remodelación")
                                                <div class="content-slide d-flex align-items-center">
                                                    <a href="" data-toggle="modal" data-target=".product_9">
                                                        <div class="info">
                                                            <img src="{{url('img/9.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Renovación / Remodelación</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break
                                         
                                            @default
                                              
                                        @endswitch
                                    @endforeach
                                    @endif
                                    
                                </div>
                                <div class="multiple-items productos_movil row justify-content-center d-block d-sm-none">
                                    @if(isset($productos))
                                        @foreach($productos as $producto)
                                        @switch($producto)
                                            @case("Adquisición de vivienda")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_1">
                                                        <div class="info">
                                                            <img src="{{url('img/1.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Adquisición de vivienda</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break
                                         
                                            @case("Construcción")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_2">
                                                        <div class="info">
                                                            <img src="{{url('img/2.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Construcción</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Cambio de hipoteca")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_3">
                                                        <div class="info">
                                                            <img src="{{url('img/3.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Cambio de hipoteca</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Adquisición de terreno")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_4">
                                                        <div class="info">
                                                            <img src="{{url('img/4.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Adquisición de terreno</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Terreno + Construcción")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_5">
                                                        <div class="info">
                                                            <img src="{{url('img/5.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Terreno + Construcción</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Preventa")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_6">
                                                        <div class="info">
                                                            <img src="{{url('img/6.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Preventa</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Liquidez")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_7">
                                                        <div class="info">
                                                            <img src="{{url('img/7.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Liquidez</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Liquidez + sustitución")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_8">
                                                        <div class="info">
                                                            <img src="{{url('img/8.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Liquidez + sustitución</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break

                                            @case("Renovación / Remodelación")
                                                <div class="content-slide col-10 mb-4">
                                                    <a href="" data-toggle="modal" data-target=".product_9">
                                                        <div class="info">
                                                            <img src="{{url('img/9.jpg')}}" alt="">
                                                            <div class="description-slide">
                                                                <p>Crédito Hipotecario</p>
                                                                <p>Renovación / Remodelación</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @break
                                         
                                            @default
                                              
                                        @endswitch
                                    @endforeach
                                    @endif


                                </div>                                 
                            </div>
                        </div>
                    </div>
                </section>
                <section class="home-4">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-lg-12 col-md-12">
                                <h2 class="text-center text-md-center">Trabajamos con los mejores bancos de México</h2>
                            </div>
                            <div class="col-12 col-lg-7 col-md-8">
                                <div class="row align-items-center">
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Afirme.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/logo-banregio.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Banorte.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Grupo 309.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Citibanamex.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Hsbc.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/logo-scotiabank.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Grupo 291.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Grupo 336.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3 text-center">
                                    <img src="https://socasesores.com/micrositios/img/Grupo 325.svg" alt="" style="width: 60%;">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Grupo 298.svg" alt="">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/Mifel.png" alt="">
                                </div>
                                <div class="col-6 col-md-3 text-center">
                                    <img src="https://socasesores.com/micrositios/img/Grupo 302.png" alt="" style="width: auto">
                                </div>
                                <div class="col-6 col-md-3">
                                    <img src="https://socasesores.com/micrositios/img/logo-santander.svg" alt="">
                                </div>
                                
                                
                                <div id="cotizador"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="cotizador">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2>Comparador Hipotecario</h2>
                            </div>
                        </div>
                        <div class="row align-items-center d-none d-lg-flex">
                            <!--<div class="col-lg-3">
                                <ul class="cotizador_lista">
                                    <li><a href="" class="paso_1 active"><span>1</span> Comparas</a></li>
                                    <li><a href="" class="paso_2"><span>2</span> Precalificas</a></li>
                                    <li><a href="" class="paso_3"><span>3</span> Te asesoramos</a></li>
                                    <li><a href="" class="paso_4"><span>4</span> Generamos los trámites</a></li>
                                    <li><a href="" class="paso_5"><span>5</span> Firmas las escrituras</a></li>
                                </ul>
                            </div>-->
                            <div class="col-lg-12 pasos info_1">
                                <div class="row">
                                    <div class="col-12">
                                        @if($registro->cotizador != null)
                                            <iframe style="width: 100%; height: 420px; border: 0;" src="{{ $registro->cotizador }}" class="comparadorsocIframe"></iframe>
                                        @else
                                            <iframe style="width: 100%; height: 420px; border: 0;" src="https://cotizador.socasesores.com/widget-invertido/#/c7e0233e4a9c856d50662005a1c6cfbb" class="comparadorsocIframe"></iframe>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 d-none pasos info_2">
                                <h2>¿Eres candidato a un crédito hipotecario?</h2>
                                <form action="{{ route('sendMail2') }}" method="post">
                                    @csrf
                                     <div class="form-group">
                                                <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                                <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                
                                            </div>
                                    <div class="container">
                                        <div class="row align-items-end">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre Completo</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Correo electrónico</label>
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fecha de nacimiento</label>
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿En que vas invertir tu crédito?</label>
                                                    <input type="text" name="invertir" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿Cuánto ganas al mes?</label>
                                                    <input type="text" name="mes" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿Como compruebas ingresos?</label>
                                                    <input type="text" name="ingresos" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿Te gustaría ser contactado por un especialista hipotecario?</label>
                                                    <input type="text" name="contactado" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="submit" value="Enviar" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-9 d-none pasos info_3">
                                <h2>Asesoría sin costo</h2>
                                <form action="">
                                    <div class="container">
                                        <div class="row align-items-end">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre Completo</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Correo electrónico</label>
                                                    <input type="email" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>¿Cómo podemos ayudarte?</label>
                                                    <textarea class="form-control" name="" id="" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="submit" value="Enviar" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-9 d-none pasos info_4">
                                <ul>
                                    <li>Se te solicitará la documentación para crear un expediente para la solicitud de crédito en el banco de tu elección</li>
                                    <li>Tu expediente< se ingresa al banco, la respuesta puede tardar entre 5 y 8 días.</li>
                                    <li>Si el banco aprueba tu crédito, recibirás una carta de autorización con las condiciones financieras.</li>
                                    <li>Los documentos de la propiedad se ingresan a la notaría para su validación</li>
                                </ul>
                            </div>
                            <div class="col-md-9 d-none pasos info_5">
                                <ul>
                                    <li>Recibirás la hoja de liquidación de gastos con el importe final del crédito y el total de gastos desglosados</li>
                                    <li>Se programa la firma de escrituras</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row align-items-center d-flex d-lg-none">
                            <div class="col-lg-3">
                                <ul class="cotizador_lista text-left">
                                    <!--<li><a href="" class="paso_1 active"><span>1</span> Comparas</a></li>-->
                                    <div class="row">
                                        <div class="col-lg-9 pasos info_1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <iframe style="width: 100%; height: 420px; border: 0;" src="https://cotizador.socasesores.com/widget-invertido/#/c7e0233e4a9c856d50662005a1c6cfbb" class="comparadorsocIframe"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--<li><a href="" class="paso_2"><span>2</span> Precalificas</a></li>
                                    <div class="row">
                                        <div class="col-md-9 d-none pasos info_2">
                                            <h2>¿Eres candidato a un crédito hipotecario?</h2>
                                            <form action="">
                                                <div class="container">
                                                    <div class="row align-items-end">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nombre Completo</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Correo electrónico</label>
                                                                <input type="email" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Teléfono</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Fecha de nacimiento</label>
                                                                <input type="date" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿En que vas invertir tu crédito?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿Cuánto ganas al mes?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿Como compruebas ingresos?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿Te gustaría ser contactado por un especialista hipotecario?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <input type="submit" value="Enviar" class="btn btn-success">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>  
                                    <li><a href="" class="paso_3"><span>3</span> Te asesoramos</a></li>
                                    <div class="row">
                                        <div class="col-md-9 d-none pasos info_3">
                                            <h2>Asesoría sin costo</h2>
                                            <form action="">
                                                <div class="container">
                                                    <div class="row align-items-end">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nombre Completo</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Correo electrónico</label>
                                                                <input type="email" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Teléfono</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>¿Cómo podemos ayudarte?</label>
                                                                <textarea class="form-control" name="" id="" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <input type="submit" value="Enviar" class="btn btn-success">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <li><a href="" class="paso_4"><span>4</span> Generamos los trámites</a></li>
                                    <div class="row">
                                       <div class="col-md-9 d-none pasos info_4">
                                            <ul>
                                                <li>Se te solicitará la documentación para crear un expediente para la solicitud de crédito en el banco de tu elección</li>
                                                <li>Tu expediente< se ingresa al banco, la respuesta puede tardar entre 5 y 8 días.</li>
                                                <li>Si el banco aprueba tu crédito, recibirás una carta de autorización con las condiciones financieras.</li>
                                                <li>Los documentos de la propiedad se ingresan a la notaría para su validación</li>
                                            </ul>
                                        </div> 
                                    </div>
                                    <li><a href="" class="paso_5"><span>5</span> Firmas las escrituras</a></li>
                                    <div class="row">
                                        <div class="col-md-9 d-none pasos info_5">
                                            <ul>
                                                <li>Recibirás la hoja de liquidación de gastos con el importe final del crédito y el total de gastos desglosados</li>
                                                <li>Se programa la firma de escrituras</li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </ul>
                            </div>

                            
                        </div>
                    </div>
                </section>
            </div>
            <div id="info-empresarial" style="background: #EDF6EA; padding-top: 2rem; padding-bottom: 2rem;" class="d-none">
                <section class="home-3" style="margin-top: 0rem">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2>Productos Empresariales</h2>
                                <div class="multiple-items d-none d-sm-block">
                                        <div class="content-slide">
                                            <a href="" data-toggle="modal" data-target=".product_1_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/anticipo.jpg')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Anticipo de ventas</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="content-slide">
                                            <a href="" data-toggle="modal" data-target=".product_2_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_1.png')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Simple</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="content-slide">
                                            <a href="" data-toggle="modal" data-target=".product_3_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_2.png')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Revolvente</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="content-slide">
                                            <a href="" data-toggle="modal" data-target=".product_4_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_4.png')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Arrendamiento</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="content-slide">
                                            <a href="" data-toggle="modal" data-target=".product_5_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_5.jpg')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito</p>
                                                        <p>Tarjeta de crédito</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="content-slide">
                                            <a href="" data-toggle="modal" data-target=".product_6_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_6.jpg')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito</p>
                                                        <p>Hipotecario empresarial</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    
                                   
                                </div>
                                <div class="productos_movil row justify-content-center d-block d-sm-none">
                                    
                                        <div class="content-slide col-10 mb-4">
                                            <a href="" data-toggle="modal" data-target=".product_1_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/anticipo.jpg')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Anticipo de ventas</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="content-slide col-10 mb-4">
                                            <a href="" data-toggle="modal" data-target=".product_2_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_1.png')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Simple</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="content-slide col-10 mb-4">
                                            <a href="" data-toggle="modal" data-target=".product_3_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_2.png')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Revolvente</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
            
                                        <div class="content-slide col-10 mb-4">
                                            <a href="" data-toggle="modal" data-target=".product_4_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_4.png')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Arrendamiento</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                         
                                        <div class="content-slide col-10 mb-4">
                                            <a href="" data-toggle="modal" data-target=".product_5_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_5.jpg')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito</p>
                                                        <p>Tarjeta de crédito</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                          
                                        <div class="content-slide col-10 mb-4">
                                            <a href="" data-toggle="modal" data-target=".product_6_empresarial">
                                                <div class="info">
                                                    <img src="{{url('img/empresarial/empre_6.jpg')}}" alt="">
                                                    <div class="description-slide" style="background: #344359;">
                                                        <p>Crédito Empresarial</p>
                                                        <p>Hipotecario empresarial</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    
                                   
                                </div>                                 
                            </div>
                        </div>
                    </div>
                </section>
                <section class="home-4">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-lg-12 col-md-12">
                                <h2 class="text-center">Trabajamos con los mejores bancos de México</h2>
                            </div>
                            <div class="col-12 col-lg-7 col-md-8">
                                <div class="row align-items-center">
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_308@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_322@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_185@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_287@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_296@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_324@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_327@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Anticipa@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_302@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_330@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_332@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_334@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_335@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_346@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-3 mb-4">
                                        <img src="{{url('img/empresarial/Grupo_348@2x.png')}}" alt="">
                                    </div>
                                    <div id="cotizador"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="info-seguros" style="background: #EDF6EA; padding-top: 2rem; padding-bottom: 2rem;" class="d-none">
                <section style="padding-top: 0rem;">
                    <div class="container mt-4 pt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <h2 id="productos">Productos Seguros</h2>
                                <ul class="nav nav-tabs justify-content-center mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Personas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Empresas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="home-3" style="margin-top: 0rem">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active container" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_1_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/seguros_1.png')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Personas</p>
                                                            <p>Seguro de vida</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_2_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/seguros_2.png')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Personas</p>
                                                            <p>Gastos médicos mayores</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_3_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/seguros_3.png')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Personas</p>
                                                            <p>Protección del hogar</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_4_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/auto_1.png')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Personas</p>
                                                            <p>Seguro de auto</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="tab-pane fade container" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_5_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/vida-grupo.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Empresas</p>
                                                            <p>Vida grupo</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_6_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/medico-empresas.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Empresas</p>
                                                            <p>Médicos mayores</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_7_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/flotilla-auto.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Empresas</p>
                                                            <p>Auto flotilla</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_8_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/danos-pyme.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Seguros Empresas</p>
                                                            <p>Seguros PyME</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>  
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </section>
                <section class="home-4">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12">
                                <h2 class="text-center">Socios Comerciales</h2>
                            </div>
                            <div class="col-12 col-lg-7 col-md-8">
                                <div class="row align-items-center">
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_350@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_352@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_354@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/logo-qualitas.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_363@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_359@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_361@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_364@2x.png')}}" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{url('img/seguros/Grupo_365@2x.png')}}" alt="">
                                    </div>
                                    <div id="cotizador"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="info-otros" style="background: #EDF6EA; padding-top: 2rem; padding-bottom: 2rem;" class="d-none">
                <section style="padding-top: 0rem;">
                    <div class="container mt-4 pt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <h2 id="productos">Productos</h2>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="home-3" style="margin-top: 0rem">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active container" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_1_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/Crédito_Auto.png')}}" alt="">
                                                        <div class="description-slide" style="background: rgb(39,52,139); background: linear-gradient(101deg, rgba(39,52,139,1) 0%, rgba(0,149,219,1) 100%);">
                                                            <p>Crédito</p>
                                                            <p>Auto</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_2_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/Crédito_Moto.png')}}" alt="">
                                                        <div class="description-slide" style="background: rgb(39,52,139); background: linear-gradient(101deg, rgba(39,52,139,1) 0%, rgba(0,149,219,1) 100%);">
                                                            <p>Crédito</p>
                                                            <p>Moto</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="tab-pane fade container" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_5_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/vida-grupo.jpg')}}" alt="">
                                                        <div class="description-slide" style="background: rgb(39,52,139); background: linear-gradient(101deg, rgba(39,52,139,1) 0%, rgba(0,149,219,1) 100%);">
                                                            <p>Crédito</p>
                                                            <p>Auto</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_6_seguros">
                                                    <div class="info">
                                                        <img src="{{url('img/seguros/medico-empresas.jpg')}}" alt="">
                                                        <div class="description-slide" style="background: rgb(39,52,139); background: linear-gradient(101deg, rgba(39,52,139,1) 0%, rgba(0,149,219,1) 100%);">
                                                            <p>Crédito</p>
                                                            <p>Moto</p>
                                                        </div>
                                                    </div>
                                                </a>
                                        </div>  
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </section>
                <section class="home-4">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12">
                                <h2 class="text-center">Socios Comerciales</h2>
                            </div>
                            <div class="col-12 col-lg-7 col-md-8">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-6 col-md-3">
                                        <img src="https://socasesores.com/micrositios/img/Afirme.svg" alt="">
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <img src="https://socasesores.com/micrositios/img/Hsbc.svg" alt="">
                                    </div>
                                    <div id="cotizador"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @else
            <section class="home-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @php
                                $productos = explode(",", $registro->productos);
                            @endphp
                            <h2>Productos Hipotecarios</h2>
                            <div class="multiple-items d-none d-sm-block">
                                @if(isset($productos))
                                    @foreach($productos as $producto)
                                    @switch($producto)
                                        @case("Adquisición de vivienda")
                                            <div class="content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_1">
                                                    <div class="info">
                                                        <img src="{{url('img/1.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Adquisición de vivienda</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break
                                     
                                        @case("Construcción")
                                            <div class="content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_2">
                                                    <div class="info">
                                                        <img src="{{url('img/2.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Construcción</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Cambio de hipoteca")
                                            <div class="content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_3">
                                                    <div class="info">
                                                        <img src="{{url('img/3.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Cambio de hipoteca</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Adquisición de terreno")
                                            <div class="content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_4">
                                                    <div class="info">
                                                        <img src="{{url('img/4.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Adquisición de terreno</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Terreno + Construcción")
                                            <div class="content-slide d-flex align-items-center">
                                                <a href="" data-toggle="modal" data-target=".product_5">
                                                    <div class="info">
                                                        <img src="{{url('img/5.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Terreno + Construcción</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Preventa")
                                            <div class="content-slide">
                                                <a href="" data-toggle="modal" data-target=".product_6">
                                                    <div class="info">
                                                        <img src="{{url('img/6.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Preventa</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Liquidez")
                                            <div class="content-slide d-flex align-items-center">
                                                <a href="" data-toggle="modal" data-target=".product_7">
                                                    <div class="info">
                                                        <img src="{{url('img/7.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Liquidez</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Liquidez + sustitución")
                                            <div class="content-slide d-flex align-items-center">
                                                <a href="" data-toggle="modal" data-target=".product_8">
                                                    <div class="info">
                                                        <img src="{{url('img/8.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Liquidez + sustitución</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Renovación / Remodelación")
                                            <div class="content-slide d-flex align-items-center">
                                                <a href="" data-toggle="modal" data-target=".product_9">
                                                    <div class="info">
                                                        <img src="{{url('img/9.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Renovación / Remodelación</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break
                                     
                                        @default
                                          
                                    @endswitch
                                @endforeach
                                @endif
                                
                            </div>
                            <div class="multiple-items productos_movil row justify-content-center d-block d-sm-none">
                                @if(isset($productos))
                                    @foreach($productos as $producto)
                                    @switch($producto)
                                        @case("Adquisición de vivienda")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_1">
                                                    <div class="info">
                                                        <img src="{{url('img/1.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Adquisición de vivienda</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break
                                     
                                        @case("Construcción")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_2">
                                                    <div class="info">
                                                        <img src="{{url('img/2.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Construcción</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Cambio de hipoteca")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_3">
                                                    <div class="info">
                                                        <img src="{{url('img/3.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Cambio de hipoteca</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Adquisición de terreno")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_4">
                                                    <div class="info">
                                                        <img src="{{url('img/4.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Adquisición de terreno</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Terreno + Construcción")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_5">
                                                    <div class="info">
                                                        <img src="{{url('img/5.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Terreno + Construcción</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Preventa")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_6">
                                                    <div class="info">
                                                        <img src="{{url('img/6.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Preventa</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Liquidez")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_7">
                                                    <div class="info">
                                                        <img src="{{url('img/7.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Liquidez</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Liquidez + sustitución")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_8">
                                                    <div class="info">
                                                        <img src="{{url('img/8.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Liquidez + sustitución</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break

                                        @case("Renovación / Remodelación")
                                            <div class="content-slide col-10 mb-4">
                                                <a href="" data-toggle="modal" data-target=".product_9">
                                                    <div class="info">
                                                        <img src="{{url('img/9.jpg')}}" alt="">
                                                        <div class="description-slide">
                                                            <p>Crédito Hipotecario</p>
                                                            <p>Renovación / Remodelación</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break
                                     
                                        @default
                                          
                                    @endswitch
                                @endforeach
                                @endif


                            </div>                                 
                        </div>
                    </div>
                </div>
            </section>
            <section class="cotizador">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2>Comparador Hipotecario</h2>
                            </div>
                        </div>
                        <div class="row align-items-center d-none d-lg-flex">
                            <!--<div class="col-lg-3">
                                <ul class="cotizador_lista">
                                    <li><a href="" class="paso_1 active"><span>1</span> Comparas</a></li>
                                    <li><a href="" class="paso_2"><span>2</span> Precalificas</a></li>
                                    <li><a href="" class="paso_3"><span>3</span> Te asesoramos</a></li>
                                    <li><a href="" class="paso_4"><span>4</span> Generamos los trámites</a></li>
                                    <li><a href="" class="paso_5"><span>5</span> Firmas las escrituras</a></li>
                                </ul>
                            </div>-->
                            <div class="col-lg-12 pasos info_1">
                                <div class="row">
                                    <div class="col-12">
                                        @if($registro->cotizador != null)
                                            <iframe style="width: 100%; height: 420px; border: 0;" src="{{ $registro->cotizador }}" class="comparadorsocIframe"></iframe>
                                        @else
                                            <iframe style="width: 100%; height: 420px; border: 0;" src="https://cotizador.socasesores.com/widget-invertido/#/c7e0233e4a9c856d50662005a1c6cfbb" class="comparadorsocIframe"></iframe>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 d-none pasos info_2">
                                <h2>¿Eres candidato a un crédito hipotecario?</h2>
                                <form action="{{ route('sendMail2') }}" method="post">
                                    @csrf
                                     <div class="form-group">
                                                <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                                <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                
                                            </div>
                                    <div class="container">
                                        <div class="row align-items-end">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre Completo</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Correo electrónico</label>
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fecha de nacimiento</label>
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿En que vas invertir tu crédito?</label>
                                                    <input type="text" name="invertir" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿Cuánto ganas al mes?</label>
                                                    <input type="text" name="mes" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿Como compruebas ingresos?</label>
                                                    <input type="text" name="ingresos" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿Te gustaría ser contactado por un especialista hipotecario?</label>
                                                    <input type="text" name="contactado" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="submit" value="Enviar" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-9 d-none pasos info_3">
                                <h2>Asesoría sin costo</h2>
                                <form action="">
                                    <div class="container">
                                        <div class="row align-items-end">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre Completo</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Correo electrónico</label>
                                                    <input type="email" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>¿Cómo podemos ayudarte?</label>
                                                    <textarea class="form-control" name="" id="" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="submit" value="Enviar" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-9 d-none pasos info_4">
                                <ul>
                                    <li>Se te solicitará la documentación para crear un expediente para la solicitud de crédito en el banco de tu elección</li>
                                    <li>Tu expediente< se ingresa al banco, la respuesta puede tardar entre 5 y 8 días.</li>
                                    <li>Si el banco aprueba tu crédito, recibirás una carta de autorización con las condiciones financieras.</li>
                                    <li>Los documentos de la propiedad se ingresan a la notaría para su validación</li>
                                </ul>
                            </div>
                            <div class="col-md-9 d-none pasos info_5">
                                <ul>
                                    <li>Recibirás la hoja de liquidación de gastos con el importe final del crédito y el total de gastos desglosados</li>
                                    <li>Se programa la firma de escrituras</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row align-items-center d-flex d-lg-none">
                            <div class="col-lg-3">
                                <ul class="cotizador_lista text-left">
                                    <!--<li><a href="" class="paso_1 active"><span>1</span> Comparas</a></li>-->
                                    <div class="row">
                                        <div class="col-lg-9 pasos info_1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <iframe style="width: 100%; height: 420px; border: 0;" src="https://cotizador.socasesores.com/widget-invertido/#/c7e0233e4a9c856d50662005a1c6cfbb" class="comparadorsocIframe"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--<li><a href="" class="paso_2"><span>2</span> Precalificas</a></li>
                                    <div class="row">
                                        <div class="col-md-9 d-none pasos info_2">
                                            <h2>¿Eres candidato a un crédito hipotecario?</h2>
                                            <form action="">
                                                <div class="container">
                                                    <div class="row align-items-end">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nombre Completo</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Correo electrónico</label>
                                                                <input type="email" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Teléfono</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Fecha de nacimiento</label>
                                                                <input type="date" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿En que vas invertir tu crédito?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿Cuánto ganas al mes?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿Como compruebas ingresos?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>¿Te gustaría ser contactado por un especialista hipotecario?</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <input type="submit" value="Enviar" class="btn btn-success">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>  
                                    <li><a href="" class="paso_3"><span>3</span> Te asesoramos</a></li>
                                    <div class="row">
                                        <div class="col-md-9 d-none pasos info_3">
                                            <h2>Asesoría sin costo</h2>
                                            <form action="">
                                                <div class="container">
                                                    <div class="row align-items-end">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nombre Completo</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Correo electrónico</label>
                                                                <input type="email" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Teléfono</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>¿Cómo podemos ayudarte?</label>
                                                                <textarea class="form-control" name="" id="" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <input type="submit" value="Enviar" class="btn btn-success">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <li><a href="" class="paso_4"><span>4</span> Generamos los trámites</a></li>
                                    <div class="row">
                                       <div class="col-md-9 d-none pasos info_4">
                                            <ul>
                                                <li>Se te solicitará la documentación para crear un expediente para la solicitud de crédito en el banco de tu elección</li>
                                                <li>Tu expediente< se ingresa al banco, la respuesta puede tardar entre 5 y 8 días.</li>
                                                <li>Si el banco aprueba tu crédito, recibirás una carta de autorización con las condiciones financieras.</li>
                                                <li>Los documentos de la propiedad se ingresan a la notaría para su validación</li>
                                            </ul>
                                        </div> 
                                    </div>
                                    <li><a href="" class="paso_5"><span>5</span> Firmas las escrituras</a></li>
                                    <div class="row">
                                        <div class="col-md-9 d-none pasos info_5">
                                            <ul>
                                                <li>Recibirás la hoja de liquidación de gastos con el importe final del crédito y el total de gastos desglosados</li>
                                                <li>Se programa la firma de escrituras</li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </ul>
                            </div>

                            
                        </div>
                    </div>
                </section>
        @endif
        <section class="home-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2>Conoce nuestras instalaciones</h2>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="multiple-items instalaciones d-block d-sm-none">
                            @php
                                
                                if ($registro->oficinas != "") {
                                    $oficinas =  explode(",", $registro->oficinas);
                                }else{
                                    $oficinas = "";
                                }
                            @endphp
                            @if($oficinas != "")
                                @foreach($oficinas as $oficina)
                                    <div class="content-slide">
                                        <div class="content" style="background-image: url(https://socasesores.com/micrositios-app/storage/app/public/images/oficinas/{{$oficina}});">
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($registro->tipo == "Mixto")
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/86887537-9075-4f35-bec1-1aece7188fc1.jpg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/FACHADA.jpg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/JARDIN.jpg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/RECEPCION.jpg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/SALA_JUNTAS_CHICA.jpg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/SALA_JUNTAS_GRANDE.jpg')}}">
                                    </div>
                                </div>
                            @else
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/oficina_1.jpeg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/oficina_2.jpeg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/oficina_3.jpeg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/oficina_4.jpeg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/oficina_5.jpeg')}}">
                                    </div>
                                </div>
                                <div class="content-slide">
                                    <div class="content" style="background-image: url({{url('img/oficina_6.jpeg')}}">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row d-none d-sm-flex">
                            @php
                                
                                if ($registro->oficinas != "") {
                                    $oficinas =  explode(",", $registro->oficinas);
                                }else{
                                    $oficinas = "";
                                }
                            @endphp
                            @if($oficinas != "")
                                @foreach($oficinas as $oficina)
                                    <div class="col-md-4 col-12">
                                        <div class="content" style="background-image: url(https://socasesores.com/micrositios-app/storage/app/public/images/oficinas/{{$oficina}});">
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($registro->tipo == "Mixto")
                                 <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/86887537-9075-4f35-bec1-1aece7188fc1.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/FACHADA_SANCREDIT.jpeg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/JARDIN.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/RECEPCION.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/SALA_JUNTAS_CHICA.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/SALA_JUNTAS_GRANDE.jpg')}}">
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficina_1.jpeg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficina_2.jpeg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficina_3.jpeg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficina_4.jpeg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficina_5.jpeg')}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficina_6.jpeg')}}">
                                    </div>
                                </div>
                            @endif
                            
            
                        </div>
                    </div>
                </div>
            </div>
            <div id="contacto"></div>
        </section>
        @if($registro->tipo == "Mixto")
            <section class="home-asesores">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2>Conoce a nuestros asesores</h2>
                        </div>
                        <div class="col-md-6 mb-4">
                            <select class="custom-select" id="filter-city">
                              <option selected hidden>Filtra por ciudad y ubica a tu asesor más cercano</option>
                              <option value="Acapulco">Acapulco</option>
                              <option value="Cancun">Cancun</option>
                              <option value="Cdmx">CDMX</option>
                              <option value="Carmen">Ciudad del Carmen</option>
                                <option value="Cuernavaca">Cuernavaca</option>
                                <option value="Merida">Mérida</option>
                                <option value="Pachuca">Pachuca</option>
                              <option value="Playa">Playa del Carmen</option>

                              <option value="Puebla">Puebla</option>
                               <option value="Tuxtla">Tuxtla Gutiérrez</option>
                               <option value="Quintana">Quintana Roo</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="home-buttons">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/jorgeolmedo3" target="_blank">
                                    <p class="mb-0"><b>Jorge Ramón Olmedo Rodriguez</b></p>
                                    <p style="font-weight: normal;">Director</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/JORGE OLMEDO.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/fannybello-castro35" target="_blank">
                                    <p class="mb-0"><b>Fanny Bello Castro</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Fanny Bello Castro.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/eduardo-parra-rubio37" target="_blank">
                                    <p class="mb-0"><b>Eduardo Alejandro Parra Rubio</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Eduardo Alejandro Parra Rubio.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Cdmx">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/martha-patricia-perez-bannetts61" target="_blank">
                                    <p class="mb-0"><b>Martha Patricia Perez Bennetts</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> CDMX</p>
                                    <img src="{{ url('img/qr_crece/MARTHA PATRICIA PEREZ BENNETTS.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Playa">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/jose-a-bravo-mejia" target="_blank">
                                    <p class="mb-0"><b>Jose A. Bravo Mejia</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Playa Del Carmen</p>
                                    <img src="{{ url('img/qr_crece/José A. Bravo Mejía.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div> 
                            <div class="col-md-3 col-6 mb-4 asesor-card Puebla">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/eduardo-martinez-nieto57" target="_blank">
                                    <p class="mb-0"><b>Eduardo Martínez Nieto</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Puebla</p>
                                    <img src="{{ url('img/qr_crece/Eduardo Martínez Nieto.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Puebla">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/marco-arturo-guevara-cruz56" target="_blank">
                                    <p class="mb-0"><b>Marco Arturo Guevara Cruz</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Puebla</p>
                                    <img src="{{ url('img/qr_crece/Marco Arturo Guevara Cruz.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/xenia-sherally-carrillo-garrido41" target="_blank">
                                    <p class="mb-0"><b>Xenia  Sherally Carrillo Garrido</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Xenia  Carrillo Garrido.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Puebla">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/mauricio-marquez-medina55" target="_blank">
                                    <p class="mb-0"><b>Mauricio Marquez Medina</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Puebla</p>
                                    <img src="{{ url('img/qr_crece/Mauricio Marquez Medina.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Pachuca">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/eliseo-valencia-barron54" target="_blank">
                                    <p class="mb-0"><b>Eliseo Valencia Barron</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Pachuca</p>
                                    <img src="{{ url('img/qr_crece/Eliseo Valencia Barron.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/hector-rene-couoh-lizama44" target="_blank">
                                    <p class="mb-0"><b>Hector Rene Couoh Lizama</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Hector Rene Couoh Lizama.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/asesorcrece02" target="_blank">
                                    <p class="mb-0"><b>Ricardo Campos Tzugi</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Ricardo Campos Tzugi.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Tuxtla">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/rosario-del-carmen-zepeda-baez58" target="_blank">
                                    <p class="mb-0"><b>Rosario del Carmen Zepeda Baez</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Tuxtla Gutiérrez</p>
                                    <img src="{{ url('img/qr_crece/Rosario del Carmen Zepeda Baez.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Puebla">
                                <div class="content-button">
                                    <a href="#" target="_blank">
                                    <p class="mb-0"><b>Alejandro Olmedo Rodríguez</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Puebla</p>
                                    <img src="{{ url('img/qr_crece/Alejandro Olmedo Rodríguez.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Carmen">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/salvador-martinez-delgado49" target="_blank">
                                    <p class="mb-0"><b>Salvador Martinez Delgado </b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Cd. Carmen</p>
                                    <img src="{{ url('img/qr_crece/Aod Jimenez.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/roberto-montelongo-elias33" target="_blank">
                                    <p class="mb-0"><b>Roberto Arturo Montelongo Elias</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Roberto Montelongo Elías.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Puebla">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/jose-luis-jimenez-oropeza39" target="_blank">
                                    <p class="mb-0"><b>Jose Luis Jimenez Oropeza</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Puebla</p>
                                    <img src="{{ url('img/qr_crece/José Luis Jiménez Oropeza.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/roberto-montelongo-elias33" target="_blank">
                                    <p class="mb-0"><b>Gabriela Alpuche</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Roberto Montelongo Elías.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Cuernavaca">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/luz-angelica-ordaz-hernandez50" target="_blank">
                                    <p class="mb-0"><b>Luz Angelica Ordaz Hernandez</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Cuernavaca</p>
                                    <img src="{{ url('img/qr_crece/Luz Angelica Ordaz Hernandez.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Cuernavaca">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/alfonso-humberto-galeana-medina51" target="_blank">
                                    <p class="mb-0"><b>Alfonso Humberto Galeana Medina</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Cuernavaca</p>
                                    <img src="{{ url('img/qr_crece/Alfonso Humberto Galeana Medina.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Cancun">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/maria-rocio-cuevas-ballesteros59" target="_blank">
                                    <p class="mb-0"><b>Maria Rocio Cuevas Ballesteros</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Cancun</p>
                                    <img src="{{ url('img/qr_crece/Maria Rocio Cuevas Ballesteros.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Merida">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/emma-patricia-velazquez-avila43" target="_blank">
                                    <p class="mb-0"><b>Emma Patricia Velazquez Avila</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Mérida</p>
                                    <img src="{{ url('img/qr_crece/Emma Patricia Velazquez Avila.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Puebla">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/asesor1" target="_blank">
                                    <p class="mb-0"><b>Patricia Eslava Hernandez</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Puebla</p>
                                    <img src="{{ url('img/qr_crece/PATRICIA ESLAVA HERNANDEZ.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Acapulco">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/miriam-liliana-pelaez-molina34" target="_blank">
                                    <p class="mb-0"><b>Miriam Liliana Pelaez Molina</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Acapulco</p>
                                    <img src="{{ url('img/qr_crece/Miriam Liliana Pelaez Molina.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Puebla">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/asesor2" target="_blank">
                                    <p class="mb-0"><b>Ismael Samuel Rodriguez</b></p>
                                    <p style="font-weight: normal;">Asesor </p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Puebla</p>
                                    <img src="{{ url('img/qr_crece/ISMAEL SAMUEL RODRIGUEZ.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Carmen">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/asesorcrece01" target="_blank">
                                    <p class="mb-0"><b>Aod Jimenez Martinez </b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Cd. Carmen</p>
                                    <img src="{{ url('img/qr_crece/Aod Jimenez.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4 asesor-card Cuernavaca">
                                <div class="content-button">
                                    <a href="https://app.allin-one.mx/jose-horacio-garduno-valverda52" target="_blank">
                                    <p class="mb-0"><b>José Horacio Garduño Valverde</b></p>
                                    <p style="font-weight: normal;">Asesor</p>
                                    
                                    <p><img src="{{ url('img/location-pin.png') }}" style="width: 20px;" alt=""> Cuernavaca</p>
                                    <img src="{{ url('img/qr_crece/José Horacio Garduño Valverde.png') }}" alt="" class="mb-0">
                                </a>
                                </div>
                            </div>

                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section class="home-7">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <div class="col-12 text-center">
                            <h2>Contáctanos</h2>
                            <p>Déjanos un mensaje o usa nuestros medios de contacto directo</p>
                        </div>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="correo@email.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">¿Qué tipo de crédito te interesa?</label>
                                        <select class="form-control" name="type" id="exampleFormControlSelect1" required="">
                                            <option value="" selected="" hidden="">Seleccionar una opción</option>
                                            <option value="Adquisición de vivienda">Adquisición de vivienda</option>
                                            <option value="Construcción">Construcción</option>
                                            <option value="Cambio de hipoteca">Cambio de hipoteca</option>
                                            <option value="Adquisición de terreno">Adquisición de terreno</option>
                                            <option value="Terreno + Construcción">Terreno + Construcción</option>
                                            <option value="Preventa">Preventa</option>
                                            <option value="Liquidez">Liquidez</option>
                                            <option value="Liquidez + sustitución">Liquidez + sustitución</option>
                                            <option value="Renovación / Remodelación">Renovación / Remodelación</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5 contact-info">
                                <div class="mb-4">
                                    <p><b>Horario de atención</b></p>
                                    <p>{{$registro->horario}}</p>
                                </div>
                                <div class="mb-4">
                                    <p><b>Atención al cliente</b></p>
                                    <p>{{$registro->telefono}}</p>
                                    <p>{{$registro->email}}</p>
                                </div>
                                <div class="mb-4">
                                    <p>{{$registro->direccion}}<br></p>
                                <div id="map"></div>
                                    @if ($registro->facebook != null)
                                        <p><br>Siguenos en nuestras redes sociales</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <ul>
                                        @if ($registro->facebook != null)
                                        <li><a target="_blank" href="{{$registro->facebook}}"><img src="{{ url('img/001-facebook.png') }}" alt=""></a></li>
                                        @endif
                                        @if ($registro->linkedin != null)
                                        <li><a target="_blank" href="{{$registro->linkedin}}"><img src="{{ url('img/002-linkedin.png') }}" alt=""></a></li>
                                        @endif
                                        @if ($registro->instagram != null)
                                        <li><a target="_blank" href="{{$registro->instagram}}"><img src="{{ url('img/003-instagram.png') }}" alt=""></a></li>
                                        @endif
                                        @if ($registro->twitter != null)
                                        <li><a target="_blank" href="{{$registro->twitter}}"><img src="{{ url('img/004-twitter.png') }}" alt=""></a></li>
                                        @endif
                                        @if ($registro->youtube != null)
                                        <li><a target="_blank" href="{{$registro->youtube}}"><img src="{{ url('img/005-youtube.png') }}" alt=""></a></li>
                                        @endif

                                    </ul>
                                </div>
                                @if ($registro->certificacion == 1)
                                    <div class="d-flex align-items-center">
                                        <img src="{{ url('img/Certificaciones-03.png') }}" class="img-fluid mr-4" width="90" alt="">
                                        <p>Oficina con <br><b>Certificación Plata</b></p>
                                    </div>
                                @elseif ($registro->certificacion == 2)
                                <div class="d-flex align-items-center">
                                        <img src="{{ url('img/Certificaciones-02.png') }}" class="img-fluid mr-4" width="90" alt="">
                                        <p>Oficina con <br><b>Certificación oro</b></p>
                                    </div>
                                @elseif($registro->certificacion == 3)
                                <div class="d-flex align-items-center">
                                        <img src="{{ url('img/Certificaciones-01.png') }}" class="img-fluid mr-4" width="90" alt="">
                                        <p>Oficina con <br><b>Certificación Diamante</b></p>
                                    </div>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-3 col-8">
                    <img src="{{ url('img/soc_blanco.png') }}" alt="">
                </div>
                <div class="col-md-3 col-12">
                    <p class="text-center"><b>Sustentado por SOC<br>Líderes en Asesoría Financiera</b></p>
                </div>
                <div class="col-md-3 col-12 text-center">
                    <a href="https://socasesores.com/terminos-y-condiciones">Términos y condiciones</a><br>
                    <a href="https://socasesores.com/aviso-de-privacidad">Aviso de privacidad</a>
                </div>
                <div class="col-md-3 col-12 text-center">
                    <a href="https://v3.sisec.mx/Pages/Login" class="sisec">Ingresa a SISEC</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade product_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/1.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Adquisición de vivienda</h2>
                            <p>La casa que deseas con el crédito de adquisición de vivienda</p>
                            <p>Conoce los créditos de Adquisición de vivienda y compra la casa que deseas, ya sea nueva o usada. En SOC te asesoramos sobre el proceso y cuál es el financiamiento más conveniente para ti. Lo puedes utilizar para un inmueble nuevo o usado. Sólo necesitas el 10% del enganche.</p>
                            <ul>
                                <li>Si eres asalariado, podrás usar tu crédito INFONAVIT (Apoyo Infonavit o Cofinavit) o FOVISSSTE (Alia2 o Respalda2).</li>
                                <li>Si cuentas con 30% del enganche, tienes la posibilidad de acceder a condiciones preferenciales, dependiendo de cada institución financiera.</li>
                                <li>Al contratar tu crédito hipotecario, contarás con un seguro de vida y un seguro de daños durante toda la vida del crédito.</li>
                                <li>Podrás deducir los intereses reales del crédito hipotecario.</li>
                                <li>Este crédito es combinable con un crédito de renovación. (1)</li>
                                <small>(1) Sólo con Scotiabank</small> 
                            </ul>
                            <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Adquisición de vivienda">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/2.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Construcción</h2>
                            <p>Construye tu casa con el apoyo de un crédito hipotecario. Tu terreno quedará como garantía y podrás obtener hasta 100% del presupuesto de obra sin exceder el 70% del valor total final del inmueble.</p>
                            <ul>
                                <li>Diseña tu hogar tal y como lo quieres según tus gustos y tus necesidades.</li>
                                <li>La mayoría de las instituciones no requieren que cuentes con un avance mínimo de obra.</li>
                                <li>Aplica con Apoyo Infonavit.</li>
                                <li>Si el terreno se encuentra dentro de un desarrollo residencial en zona de alta plusvalía, el banco te puede otorgar hasta 90% del financiamiento para su compra. (1)
                                    <br><br>
                                    <small>(1) Sólo con Banregio.</small> 
                                </li>
                            </ul>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Construcción">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/3.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Cambio de hipoteca</h2>
                            <p>Obtén ahorros, baja la mensualidad o el plazo de tu hipoteca actual cambiando a un banco que te ofrezca mejores condiciones frente a tu crédito actual no debes sólo requieres no presentar atrasos en el pago de las mensualidades* y que el origen de tu financiamiento sea por: adquisición, remodelación o construcción.</p>
                            <p>Es recomendable que tengas al menos 12 meses con el crédito hipotecario que deseas cambiar.</p>
                            <ul>
                                <li>Obtén hasta 100% del presupuesto de obra.</li>
                                <li>Diseña una casa a tu gusto y tus necesidades.</li>
                                <li>La comisión por apertura puede ser financiada, aplica con Apoyo Infonavit</li>
                                <li>Aplica con Apoyo Infonavit</li>
                                <li>Disfruta de bajos costos en los gastos notariales</li>
                            </ul>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Cambio de hipoteca">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/4.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Adquisición de terreno</h2>
                            <p>Compra un terreno en la zona de tu interés y si este se encuentra dentro. Sólo necesitas un 30% del valor del predio y si el este se encuentra dentro de un desarrollo residencial en zona de alta plusvalía, te pueden prestar hasta el 90% del financiamiento para su compra.</p>
                            <p><b>Requisitos y condiciones:</b></p>
                            <p>El terreno deberá contar con las características de urbanización y habitabilidad básicas que establezca el banco (como servicios de: suministro de energía eléctrica, abastecimiento y evacuación de agua a través de la red pública, etcétera).</p>
                            <p>El cliente deberá contar con una parte del valor del terreno para cubrir su costo total (30% aproximadamente).</p>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Adquisición de terreno">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/5.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Terreno + Construcción</h2>
                            <p>Compra un terreno y construye una casa a tu medida a través de un crédito hipotecario. Puedes obtener hasta 100% del presupuesto destinado a la obre y 50% del valor del terreno.</p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>Diseñar una casa a tu gusto y tus necesidades.</li>
                                <li>Puedes obtener hasta el 100% del presupuesto de obra.(1)</li>
                                <li>La comisión por apertura puede ser financiada.(2)</li>
                                <li>Aplica con Apoyo Infonavit.(2)</li>
                                <li>Disfruta de bajos costos en los gastos notariales.
                                    <br><br>
                                    <small>(1) Sin exceder el financiamiento máximo, establecido por la institución, del valor total del inmueble (terreno + construcción).</small> <br>
                                    <small>(2) Estos beneficios varían de acuerdo a la institución financiera con la que se contrate el crédito.</small>
                                </li>
                            </ul>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Terreno + Construcción">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/6.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Preventa</h2>
                            <p>Adquiere tu casa o departamento en preventa con un crédito hipotecario. Tendrás la ventaja de conseguir un mejor precio del inmueble y un incremento en la plusvalía de éste. Además, los gastos notariales pueden disminuir considerablemente ya que se puede escriturar en obra negra.</p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>El cliente podrá contar con la aprobación de su crédito antes de que el inmueble sea terminado.</li>
                                <li>Deducibilidad de los intereses reales del crédito hipotecario.</li>
                                <li>Aplica con Apoyo Infonavit y Cofinavit.(1)
                                    <br><br>
                                    <small>(1) El esquema de Cofinavit sólo aplica para algunas instituciones. </small> 
                                </li>
                            </ul>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Preventa">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_7" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/7.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Liquidez</h2>
                            <p>Liberarte de deudas, invertir en un negocio o emprender un nuevo proyecto nunca ha sido más fácil con un crédito de liquidez. Sólo requieres ser dueño de un inmueble libre de gravamen a tu nombre el cual quedará como garantía de pago. </p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>Tú decides en qué usar los recursos de este crédito.</li>
                                <li>El financiamiento otorgado dependerá del valor de la casa pudiendo alcanzar hasta el 70%.</li>
                                <li>Tendrás con un seguro de vida y uno de daños durante la vigencia del crédito.</li>
                            </ul>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Liquidez">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_8" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/8.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Liquidez + sustitución</h2>
                            <p>Cambia tu hipoteca de banco y obtén dinero adicional. Las condiciones actuales de tu financiamiento mejoran con una tasa de interés más baja o un pago total menor; además, recibirás liquidez para que lo ocupes en lo que requieras.</p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>Además de mejorar las condiciones de tu crédito hipotecario actual, puedes obtener financiamiento para liquidar deudas, hacer frente a una emergencia o cualquier otro proyecto en puerta que requiera liquidez.</li>
                                <li>Sin desembolso inicial al contar con la posibilidad de financiamiento para la comisión por apertura y los gastos notariales.</li>
                                <li>Deducibilidad de los intereses reales del crédito hipotecario.</li>
                            </ul>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Liquidez + sustitución">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_9" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/9.jpg') }})"></div>
                        </div>
                        <div class="col-md-6 info-pop">
                            <h2>Renovación / Remodelación</h2>
                            <p>Si ya eres dueño del inmueble obtén un crédito para renovar, remodelar o ampliar. Puedes obtener hasta el 50% del valor actual de tu vivienda.</p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>No requiere licencia de construcción, sólo presupuesto de obra.</li>
                                <li>Los recursos otorgados pueden destinarse para trabajos de mantenimiento mayor, remodelación de acabados, cambio de instalaciones eléctricas, hidráulicas, sanitarias, cambios de cocina, ampliaciones o adecuaciones a la estructura de la vivienda.</li>
                                <li>Te pueden prestar hasta el 50% de financiamiento sobre el valor actual del inmueble.</li>
                                <li>Es combinable con un crédito de sustitución de hipoteca. (1)</li>
                                <li>
                                    <br><br>
                                    <small>(1) Sólo en algunas instituciones.</small> 
                                </li>
                            </ul>
                        <button class="w-100 btn btn-success want-asesoria">Quiero una asesoría</button>
                        </div>
                        <div class="col-md-6 form-aseso d-none">
                            <form action="{{ route('sendMail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="d-none" name="email_cliente" value="{{$registro->email}}" required>
                                        <input type="text" class="d-none" name="url" value="{{$registro->url}}" required>
                                      <label for="formGroupExampleInput">Nombre</label>
                                      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Mi nombre es" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Correo Electrónico</label>
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="Renovación / Remodelación">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Déjanos un mensaje</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Escribenos tus dudas" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="w-100 btn btn-success">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label label-terms" for="defaultCheck1">
                                            Al dar click en enviar, aceptas las <b>Condiciones de uso</b> y <b>el Aviso de privacidad</b>
                                        </label>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_1_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros/seguros_1_1.png') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Seguro de vida</h2>
                            <p><strong>Retiro:</strong> cumple los sueños que dejaste pendientes. En SOC te ayudamos a desarrollar un plan de retiro de acuerdo con tu perfil de ahorro e inversión, para que vayas tomando acción de tu futuro. Aprovecha todos los beneficios fiscales y maximiza tu inversión.</p>
                            <p><strong>Educación:</strong> la clave de un futuro ideal para tu familia es la educación. Garantiza la educación universitaria de tu hijo iniciando un plan de aportaciones. Además, protégete de los imprevistos con un seguro de vida e invalidez y blindando tu dinero con un fideicomiso. Recibe 3 beneficios 1 sólo plan.</p>
                            <p><strong>Sueños:</strong> ¿Cuál es tu sueño? ¿Viajar por el mundo? ¿Ir a un mundial de fútbol? ¿Ser dueño de tu propio negocio? Nosotros estamos contigo para ayudarte a alcanzar tu meta. Nuestra asesoría integral te ayudará a realizar un diagnóstico para diseñar un plan de ahorro que incluye protección ante cualquier imprevisto con un seguro de vida e invalidez.</p>
                            <p><strong>Vida:</strong>si llegas a hacer falta, tus seres queridos estarán protegidos económicamente como si tú estuvieras ahí cuidando de ellos. Contamos con las dos siguientes opciones:
                                <ul>
                                    <li><strong>Seguro vida entera pagos limitados:</strong> es un seguro patrimonial que garantiza una indemnización a tu familia en caso de que llegues a faltar. Los plazos de pago pueden ser de 10, 15 ó 20 años; o bien al alcanzar los 65 años de edad. Lo puedes contratar en moneda nacional, UDIS o dólares. </li>
                                    <li><strong>Seguros temporales:</strong> si no cuentas con mucho presupuesto y tienes la necesidad de proteger a tu familia puedes optar por un plan temporal que se caracteriza por su alta protección a bajo costo en plazos a 5, 10, 15 o 20 años. Los puede contratar en moneda nacional UDIS o dólares.</li>
                                   
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_2_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros/seguros_2_2.png') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Gastos Médicos mayores</h2>
                            <p>Los seguros de Gastos Médicos Mayores están diseñados para brindar certidumbre al momento de enfrentar un evento que ponga en riesgo nuestra salud. Al contar con este plan tendrás acceso a los servicios de hospitales privados y médicos de la red contratada y hasta la suma asegurada sin poner en riesgo el patrimonio familiar</p>
                            <p>Los principales elementos a considerar al contratar un GMM son:</p>
                            <ul>
                                <li>Deducible.</li>
                                <li>Coaseguro.</li>
                                <li>Nivel hospitalario.</li>
                                <li>Suma asegurada.</li>
                                <li>Honorarios quirúrgicos.</li>
                                <li>Beneficios adicionales como cobertura dental Premium, exención de deducible por accidente o emergencia en el extranjero.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_3_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros/seguros_3_3.png') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Protección del hogar</h2>
                            <p>Nuestro hogar es el lugar donde podemos descansar y convivir con las personas que más amamos; también, es el patrimonio familiar, por ello es importante protegerlo de algunos riesgos.</p>
                            <p>El seguro de Protección al hogar también cubre el menaje de casa y a tu familia por daños a terceros de los cuales sean responsables incluyendo tus mascotas y el personal doméstico.</p>
                            <p>Coberturas:</p>
                            <ul>
                                <li>Incendio</li>
                                <li>Terremoto y riesgos hidrometeorológicos</li>
                                <li>Inundación</li>
                                <li>Daños a equipo electrónico y electrodomésticos</li>
                                <li>Robo</li>
                                <li>Rotura de cristales</li>
                                <li>Dinero y valores</li>
                                <li>Responsabilidad civil</li>
                                <li>Pérdidas consecuenciales y gastos extraordinarios como mudanzas o renta de un inmueble sino es posible habitar por un siniestro.</li>
                                <li>Servicios de asistencia: cerrajería, plomería, ambulancia etc.<br>*Este producto está disponible como propietario o inquilino</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_4_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros/auto_1_1.png') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Seguro de Auto</h2>
                            <p>Protege tu auto con un seguro que te brinde tranquilidad al cuidar tu patrimonio e indemnizarte adecuadamente en caso de imprevistos amparados en tu póliza. Tenemos productos para personas físicas y morales. Acércate y conoce nuestras opciones.</p>
                            <p><b>Ampara tus vehículos automotores contra los siguientes riesgos:</b></p>
                            <ul>
                                <li>Robo Total</li>
                                <li>Daños materiales</li>
                                <li>Responsabilidad civil por daños a terceros</li>
                                <li>Responsabilidad civil en el extranjero: (Estados Unidos de América y Canadá)</li>
                                <li>Gastos médicos a ocupantes</li>
                                <li>Asistencia Vial</li>
                                <li>Muerte del conductor</li>
                            </ul>
                            <p><b>Protegemos:</b></p>
                            <ul>
                                <li>Autos y Pick up Personales</li>
                                <li>Pick up de Carga</li>
                                <li>Camiones</li>
                                <li>Servicio Público de pasajeros</li>
                                <li>Fronterizos y regularizados</li>
                                <li>Turistas</li>
                                <li>Motocicletas</li>
                                <li>Seguro Básico Estandarizado</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_5_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros/vida-grupo.jpg') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Vida para empresas</h2>
                            <p>El seguro de vida es una de las prestaciones más apreciadas por los empleados y de las que genera mayor fidelidad a la empresa. Como empresario puedes contratar una póliza para todos los miembros de la empresa con sumas aseguradas de acuerdo con las políticas establecidas por la propia compañía. Además, se pueden contratar coberturas adicionales complementarias como muerte accidental, pérdidas orgánicas, pago por invalidez total y permanente.</p>
                            <p>Estos seguros se pueden contratar por experiencia global o por experiencia propia dependiendo el número de asegurados que por lo general es a partir de 1,000 empleados.</p>
                            <p>Este producto está dirigido para Pymes (menos de 1000 empleados) y para corporativos (más de 1000 empleados).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_6_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros/medico-empresas.jpg') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Gastos Médicos Mayores</h2>
                            <p>Los seguros de Gastos Médicos Mayores están diseñados para brindar certidumbre al momento de enfrentar un evento que ponga en riesgo nuestra salud. Al contar con este plan tendrás acceso a los servicios de hospitales privados y médicos de la red contratada y hasta la suma asegurada sin poner en riesgo el patrimonio familiar</p>
                            <p class="mb-0">Los principales elementos a considerar al contratar un GMM son:</p>
                            <ul>
                                <li>Deducible.</li>
                                <li>Coaseguro.</li>
                                <li>Nivel hospitalario.</li>
                                <li>Suma asegurada.</li>
                                <li>Honorarios quirúrgicos.</li>
                                <li>Beneficios adicionales como cobertura dental Premium, exención de deducible por accidente o emergencia en el extranjero.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_7_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/flotilla-auto.jpg') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Auto flotillas</h2>
                            <p>Auto flotillas PYMES. Si te dedicas a administrar la operación de flotillas de autos (de 4 a 200) ya sea para transportar productos o para traslados, cuenta con nuestra protección para tu negocio de acuerdo con tus necesidades.</p>
                            <p>Auto flotilla empresas: con auto flotilla empresas (más de 200 unidades) tus autos y camiones están protegidos y cuentan con servicios de asistencia, defensa legal, responsabilidad civil y gastos médicos a ocupantes, entre otros.</p>
                            <p>Planea y protege adecuadamente la inversión de tu empresa anticipándote a los contratiempos que pueda sufrir tu flotilla.</p>
                            
                            <ul>
                                <li>Ahorro de recursos. Evita desembolsos inesperados en caso de accidente o daño a terceros. Protege tus recursos.</li>
                                <li>Asesoría Legal. Cuenta con el acompañamiento de nuestro equipo de expertos para orientarte en caso de dudas o juicios legales de temas vehiculares.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_8_seguros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/danos-pyme.jpg') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Seguros PyME</h2>
                            <p>Hacemos de tu negocio, un proyecto seguro y confiable. Protegemos tu comercio o negocio contra percances inesperados. No lo pongas en riesgo. Cuenta con nuestras coberturas especializadas.</p>
                            <p>Como propietario o arrendatario tienes nuestro apoyo para los momentos difíciles e imprevistos.</p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>Protección a tu medida: decide el detalle de protección que deseas para tu negocio, cuentas con la cobertura de incendio a todo riesgo o a riesgos nombrados de acuerdo con tus necesidades.</li>
                                <li>Daños a terceros: protegemos tu patrimonio, a tus colaboradores y tus clientes de los eventos imprevistos que pudieran ocurrir en tu negocio.</li>
                                <li>Eventos naturales: te protegemos en caso de fenómenos naturales como huracanes, sismos e inundaciones para dar continuidad en tu negocio.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_1_empresarial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/empresarial/anticipo.jpg') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Anticipo de ventas</h2>
                            <p>Es un financiamiento que provee a los establecimientos de liquidez inmediata, en base al historial de sus ventas con tarjetas bancarias. El establecimiento Anticipa ventas futuras. Hace liquidas ventas que todavía no han sucedio.</p>
                            <ul>
                                <li>Puedes obtener desde quince días hasta mes y medio de ventas futuras.</li>
                                <li>Devuelve el anticipo conforme vayas vendiendo.</li>
                                <li>Este financiamiento no tiene un destino definido, es de uso libre.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_2_empresarial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/empresarial/empre_1_1.png') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Simple</h2>
                            <p>Es un crédito que tiene un plazo entre 1 a 5 años que te permitirá obtener los recursos necesarios para cumplir los objetivos de crecimiento de tu compañía.</p>
                            <ul>
                                <li>Lo pueden obtener pequeñas y medianas empresas con sólo 1 año de antigüedad.</li>
                                <li>Tenemos opciones para Personas Morales o PFAE.</li>
                                <li>Se cuentan con algunas soluciones si no cuentas con buen historial crediticio.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_3_empresarial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/empresarial/empre_2_2.png') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>PyME Revolvente</h2>
                            <p>Es una línea de crédito abierta de la cual puedes disponer una parte o la totalidad de los recursos autorizados. Es ideal para cubrir necesidades de corto plazo, y una de sus ventajas es que sólo pagarás los intereses del monto que hayas dispuesto.</p>
                            
                            <ul>
                                <li>Capital de trabajo: para un uso de corto plazo, donde se requieren recursos financieros para cubrir rubros de manera inmediata.</li>
                                <li>Aprovechamiento de oportunidades en el mercado: ofertas de productos en pagos de contado o, por ejemplo, para la adquisición de mayor volumen de productos.</li>
                                <li>Lo pueden obtener pequeñas y medianas empresas con sólo 1 año de antigüedad.</li>
                                <li>Tenemos opciones para Personas Morales o PFAE.</li>
                                <li>Se cuentan con algunas soluciones si no cuentas con buen historial crediticio.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_4_empresarial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/empresarial/empre_4_4.png') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Arrendamiento</h2>
                            <p>Equipa tu negocio y hazlo más productivo con una solución de arrendamiento. Te permitirá la adquisición de bienes productivos y contar con una empresa moderna dirigido a un amplio número de industrias. En SOC tenemos distintas opciones financieras para ti.</p>
                            <p>Tu empresa sólo requiere 1 año de antigüedad, buen desempeño crediticio en el Buró de Crédito, aunque también hay opciones para quienes no cumplen al 100% este punto. Se puede apoyar a una amplia variedad de industrias</p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>Creamos un traje a la medida, ya que el financiamiento se otorga en relación directa a las necesidades del cliente.</li>
                                <li>Obtén la maquinaria o el equipo que necesitas para impulsar tu negocio sin detenerte y dejando en garantía el mismo equipo.</li>
                                <li>Aprovecha la estrategia fiscal del Arrendamiento y al final del plazo compra tu equipo o activo.</li>
                                
                            </ul>
                            <p class="mb-0"><b>Dirigido a:</b></p>
                            <ul>
                                <li>Personas Morales.</li>
                                <li>Personas Físicas con Actividad Empresarial (PFAE).</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_5_empresarial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/empresarial/empre_5.jpg') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Tarjeta de crédito</h2>
                            <p>Con la tarjeta de crédito dispones de un crédito revolvente para tu empresa. Está dirigida a Personas Físicas con Actividad Empresarial y Personas Morales para la adquisición de bienes que ayuden en tus actividades empresariales y/o como capital de trabajo para el desarrollo de tu negocio.<p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>Cuenta con el respaldo de Visa.</li>
                                <li>Seguro por pérdida de equipaje.</li>
                                <li>Seguro por Demora de equipaje.</li>
                                <li>Seguro por protección de compra.</li>
                                <li>Meses con y sin intereses según aplique.</li>
                                <li>Pago por SPEI usando la línea de crédito.</li>
                                <li>Alianza con WeWork.</li>
                                <li>Adicionales sin costo.</li>
                                <li>Posible exención del pago de anualidad.</li>
                                <li>Tarjetas para empleados con límites de gasto establecidos.</li>
                                <li>Control del gasto en tiempo real.</li>
                                <li>Tarjeta digital que podrás usar desde su aprobación.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade product_6_empresarial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/empresarial/empre_6.jpg') }})"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Crédito hipotecario empresarial</h2>
                            <p>Incrementa tu patrimonio al adquirir un bien inmueble como locales, oficinas, bodegas, terrenos industriales o comerciales. También, puedes remodelar o construir en un terreno propio.<p>
                            <p class="mb-0"><b>Beneficios</b></p>
                            <ul>
                                <li>No hay penalización por pagos anticipados.</li>
                                <li>La tasa de interés es fija anual durante toda la vida del crédito.</li>
                                <li>Asesoría sin costo de un experto en financiamiento para empresas.</li>
                            </ul>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeaHvmVaf68SRKhVbkuXqx1FJtRiApXvw&callback=initMap&libraries=&v=weekly"async></script>
    <script src="{{url('js/slick.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
    {!!$registro->tag!!}
  </body>
</html>