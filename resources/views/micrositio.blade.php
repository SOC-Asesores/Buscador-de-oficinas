<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="https://socasesores.com/img/favicon.png">
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
     <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PWWWBX');</script>
    <!-- End Google Tag Manager -->
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
         <section class="top-head d-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Seguros</h1>
                  
                        
                    </div>
                    @if ($registro->certificacion == "Plata")
                        <div class="oficina">
                            <p><a class="link-certificado"><img src="{{ url('img/logo_plata.svg') }}" alt=""></a></p>
                        </div>
                    @elseif ($registro->certificacion == "Oro")
                        <div class="oficina">
                            <p><a class="link-certificado"><img src="{{ url('img/logo_oro.svg') }}" alt=""></a></p>
                        </div>
                    @elseif($registro->certificacion == "Diamante")
                        <div class="oficina">
                            <p><a class="link-certificado"><img src="{{ url('img/logo_diamante.svg') }}" alt=""></a></p>
                        </div>
                    @else
                    @endif
                </div>
            </div>
        </section>
        <section class="social-network">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center">Conócenos y descubre porque SOC es diferente</p>
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
                                        @if ($registro->whatsapp != null)
                                        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=521{{$registro->whatsapp}}"><img src="{{ url('img/whatsapp.png') }}" alt=""></a></li>
                                        @else
                                        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=521{{$registro->telefono}}"><img src="{{ url('img/whatsapp.png') }}" alt=""></a></li>
                                        @endif
                                        
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="menu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="text-md-center text-center ml-md-4 content-logo">
                                <a class="navbar-brand text-left" href="#">
                                     @if ($registro->logo != null)
                                        <img src="{{url('img/brokers')}}/{{$registro->logo}}" class="d-inline-block align-top ml-0" style="border-right: 0px; max-width: 200px" alt="">
                                    @else
                                        
                                        @php
                                         $split = explode("-", $registro->name);
                                        @endphp
                                        @if($registro->type == 2)
                                            <img src="{{ url('img/logo-SOC.jpg') }}" class="d-inline-block 
                                        align-top" alt=""> <span style="text-transform: none;">Urban NetBroker</span>
                                        @else
                                            @if(strlen($split[0]) > 30)
                                                <img src="{{ url('img/logo-SOC.jpg') }}" class="d-inline-block 
                                        align-top" alt=""> <span style="font-size: 1rem;">{{ $split[0] }}</span>
                                            @else
                                                <img src="{{ url('img/logo-SOC.jpg') }}" class="d-inline-block 
                                        align-top" alt=""> <span>{{ $split[0] }}</span>
                                            @endif
                                            
                                        @endif
                                    @endif
                                </a>
                                <img class="img-bot" src="{{ url('img/logo_bot.jpg') }}" alt="">
                            </div>
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                  <a class="nav-link" href="#productos">Productos</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#contacto">Contáctanos</a>
                                </li>
                                <!--<li class="nav-item">
                                    <a class="nav-link" href="https://api.whatsapp.com/send?phone=521{{$registro->telefono}}">Únete a nuestro equipo</a>
                                  </li>-->
                              </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <main>
        <section class="home-2 promos d-none">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <h2>Promociones</h2>
                        <div class="promociones">
                            <div class="content-slide">
                                <a href="">
                                    <div class="info" style="background-image: url({{url('img/1.jpg')}});">
                                        
                                    </div>
                                </a>
                            </div>
                            <div class="content-slide">
                                <a href="">
                                    <div class="info" style="background-image: url({{url('img/1.jpg')}});">
                                        
                                    </div>
                                </a>
                            </div>
                            <div class="content-slide">
                                <a href="">
                                    <div class="info" style="background-image: url({{url('img/1.jpg')}});">
                                        
                                    </div>
                                </a>
                            </div>
                        </div>        
                    </div>
                </div> 
            </div>
        </section>
        <section class="promo-1">
            <div class="container mt-4 pt-4">
                <div class="row justify-content-start">
                    <div class="col-md-5 d-none d-md-block">
                        <h2>Asesoría en seguros</h2>
                        <p class="text-justify mb-4 pb-4">Te asesoramos profesionalmente en seguros de vida, fondos de ahorro e inversión, gastos médicos mayores, autos y daños con las mejores aseguradoras de México.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-1-movil d-block d-md-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <h2 class="text-center">Asesoría en seguros</h2>
                        <p class="text-md-justify mb-4 pb-4">Te asesoramos profesionalmente en seguros de vida, fondos de ahorro e inversión, gastos médicos mayores, autos y daños con las mejores aseguradoras de México.</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <h2 id="productos">Productos</h2>
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Empresas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="multiple-items">
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_1">
                                            <div class="info">
                                                <img src="{{url('img/seguros_1.png')}}" alt="">
                                                <div class="description-slide">
                                                    <p>Seguros Personas</p>
                                                    <p>Seguro de vida</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_2">
                                            <div class="info">
                                                <img src="{{url('img/seguros_2.png')}}" alt="">
                                                <div class="description-slide">
                                                    <p>Seguros Personas</p>
                                                    <p>Gastos médicos mayores</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_3">
                                            <div class="info">
                                                <img src="{{url('img/seguros_3.png')}}" alt="">
                                                <div class="description-slide">
                                                    <p>Seguros Personas</p>
                                                    <p>Protección del hogar</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_4">
                                            <div class="info">
                                                <img src="{{url('img/auto_1.png')}}" alt="">
                                                <div class="description-slide">
                                                    <p>Seguros Personas</p>
                                                    <p>Seguro de auto</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="multiple-items-2">
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_5">
                                            <div class="info">
                                                <img src="{{url('img/vida-grupo.jpg')}}" alt="">
                                                <div class="description-slide">
                                                    <p>Seguros Empresas</p>
                                                    <p>Vida grupo</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_6">
                                            <div class="info">
                                                <img src="{{url('img/medico-empresas.jpg')}}" alt="">
                                                <div class="description-slide">
                                                    <p>Seguros Empresas</p>
                                                    <p>Médicos mayores</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_7">
                                            <div class="info">
                                                <img src="{{url('img/flotilla-auto.jpg')}}" alt="">
                                                <div class="description-slide">
                                                    <p>Seguros Empresas</p>
                                                    <p>Auto flotilla</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-slide">
                                        <a href="" data-toggle="modal" data-target=".product_8">
                                            <div class="info">
                                                <img src="{{url('img/danos-pyme.jpg')}}" alt="">
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
        <div class="home-buttons">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 mb-4 mt-4">
                        <h2>Prueba las herramientas que tenemos para ti</h2>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="content-button">
                            <a href="https://www.skandia.com.mx/simuladores/retiro/index.html" target="_blank">
                            <img src="{{ url('/img/Grupo_16522x.png') }}" alt="">
                            <p>Simulador para el retiro</p>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="content-button">
                            <a href="https://sk.mercadodeinversiones.com.mx/" target="_blank">
                            <img src="{{ url('/img/Grupo_1654@2x.png') }}" alt="">
                            <p>Simulador de inversión</p>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="content-button">
                            <a href="{{ $registro->cotizador }}/" target="_blank">
                            <img src="{{ url('/img/Grupo_16562x.png') }}" alt="">
                            <p>Cotizador de auto</p>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="home-4">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-3 col-md-4">
                        <h2 class="text-left">Socios Comerciales</h2>
                    </div>
                    <div class="col-12 col-lg-5 col-md-8">
                        <div class="row align-items-center">
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_350@2x.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_352@2x.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_354@2x.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/logo-qualitas.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_363@2x.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_359@2x.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_361@2x.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_364@2x.png')}}" alt="">
                            </div>
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{url('img/Grupo_365@2x.png')}}" alt="">
                            </div>
                            <div id="cotizador"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @if(isset($registro->oficina_1))
                        <h2>Somos SOC</h2>
                        @endif
                        
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="row">
                            @if ($registro->oficina_1 != null)
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficinas')}}/{{$registro->oficina_1}});">
                                    </div>
                                </div>
                            @else
                               
                            @endif
                            @if ($registro->oficina_2 != null)
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficinas')}}/{{$registro->oficina_2}});">
                                    </div>
                                </div> 
                            @else
                               
                            @endif
                            @if ($registro->oficina_3 != null)
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficinas')}}/{{$registro->oficina_3}});">
                                    </div>
                                </div>
                            @else
                                
                            @endif
                            @if ($registro->oficina_4 != null)
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficinas')}}/{{$registro->oficina_4}});">
                                    </div>
                                </div>
                            @else
                                
                            @endif
                            @if ($registro->oficina_5 != null)
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficinas')}}/{{$registro->oficina_5}});">
                                    </div>
                                </div>
                            @else
                                
                            @endif
                            @if ($registro->oficina_6 != null)
                                <div class="col-md-4 col-12">
                                    <div class="content" style="background-image: url({{url('img/oficinas')}}/{{$registro->oficina_6}});">
                                    </div>
                                </div>
                            @else
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div id="contacto"></div>
        </section>
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
                                      <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Correo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Teléfono</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="55 0000 0000" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">¿Qué tipo de seguro te interesa?</label>
                                        <select class="form-control" name="type" id="exampleFormControlSelect1" required>
                                            <option value="" selected hidden>Seleccionar una opción</option>
                                            <option value="Seguro de Vida">Seguro de Vida</option>
                                            <option value="Gastos Médicos mayores">Gastos Médicos mayores</option>
                                            <option value="Protección del hogar">Protección del hogar</option>
                                            <option value="Seguro de Auto">Seguro de Auto</option>
                                            <option value="Vida para empresas">Vida para empresas</option>
                                            <option value="Gastos médicos mayores para empresas">Gastos médicos mayores para empresas</option>
                                            <option value="Auto flotillas">Auto flotillas</option>
                                            <option value="Seguros PyME">Seguros PyME</option>
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
                                    <p><b>Horarío de atención</b></p>
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
                            <div class="content" style="background-image: url({{ url('img/seguros_1_1.png') }})"></div>
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
    <div class="modal fade product_2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros_2_2.png') }})"></div>
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
    <div class="modal fade product_3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/seguros_3_3.png') }})"></div>
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
    <div class="modal fade product_4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/auto_1_1.png') }})"></div>
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
    <div class="modal fade product_5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/vida-grupo.jpg') }})"></div>
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
    <div class="modal fade product_6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="content" style="background-image: url({{ url('img/medico-empresas.jpg') }})"></div>
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
    <div class="modal fade product_7" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
    <div class="modal fade product_8" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeaHvmVaf68SRKhVbkuXqx1FJtRiApXvw&callback=initMap&libraries=&v=weekly"async></script>
    <script src="{{url('js/slick.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
</html>