<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
	    <script>
	        var e = ("abbr,article,aside,audio,canvas,datalist,details," +
	        "figure,footer,header,hgroup,mark,menu,meter,nav,output," +
	        "progress,section,time,video").split(',');
	        for (var i = 0; i < e.length; i++) {
	            document.createElement(e[i]);
	        }
	    </script>
	<![endif]-->
	<title>Oficinas | SOC Asesores</title>
	<meta name="description" content="Encuentra la oficina de SOC Asesores más cercana a tu ciudad, con los servicios de asesoría hipotecaria, asesoría empresarial y de seguros.">
	<link rel="canonical" href="http://socasesores.com/oficinas/" />

	<!-- TALWIND CSS -->
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<!-- CUSTOM CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
	<!-- FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<!-- Fancybox CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
	<link rel="icon" type="image/png" href="https://socasesores.com/img/favicon.png">
	@yield('head')

</head>
<body>
	@yield('content')

	<!-- Fancybox JS -->
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
	<!-- Custom JS -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script> -->
	@yield('scripts')

</body>
</html>