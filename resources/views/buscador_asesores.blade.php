@extends('layout')

@section('content')
	<div class="container px-4 mx-auto mt-10">
		<h1 class="text-4xl font-light text-center mb-4">Ubica a tu asesor SOC</h1>
		<form class="md:flex items-center" action="">
			@csrf
			<div class="relative px-2 flex-none">
				<label>Buscar por:</label>
			</div>
			<div class="relative px-2 md:mb-0 mb-4 md:w-2/5">
				<img src="{{ URL::asset('img/usuario.jpg') }}" class="object-contain absolute w-6 h-full inset-y-0 left-4" alt="" />
				<input name="name" type="text" placeholder="Nombre del asesor" class="focus:outline-none w-full border border-gray-200 rounded pr-4 pl-10 py-2" />
			</div>
			<div class="relative px-2 md:mb-0 mb-4 md:w-1/5">
				<div class="relative bg-white text-black border border-grey-200 rounded">
					<img src="{{ URL::asset('img/ubicacion.jpg') }}" class="object-contain absolute w-6 h-full inset-y-0 left-2" alt="" />
					<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
					<select name="state" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-10 pr-8 text-gray-400 text-sm focus:outline-none">
						<option class="bg-white text-black" selected hidden disabled>Estado</option>
						<option class="bg-white text-black" value="Aguascalientes">Aguascalientes</option>
						<option class="bg-white text-black" value="Baja California">Baja California</option>
						<option class="bg-white text-black" value="Baja California Sur">Baja California Sur</option>
						<option class="bg-white text-black" value="Campeche">Campeche</option>
						<option class="bg-white text-black" value="Chiapas">Chiapas</option>
						<option class="bg-white text-black" value="Chihuahua">Chihuahua</option>
						<option class="bg-white text-black" value="CDMX">Ciudad de México</option>
						<option class="bg-white text-black" value="Coahuila">Coahuila</option>
						<option class="bg-white text-black" value="Colima">Colima</option>
						<option class="bg-white text-black" value="Durango">Durango </option>
						<option class="bg-white text-black" value="Estado de Mexico">Estado de México</option>
						<option class="bg-white text-black" value="Guanajuato">Guanajuato</option>
						<option class="bg-white text-black" value="Guerrero">Guerrero</option>
						<option class="bg-white text-black" value="Hidalgo">Hidalgo</option>
						<option class="bg-white text-black" value="Jalisco">Jalisco</option>
						<option class="bg-white text-black" value="Michoacan">Michoacán</option>
						<option class="bg-white text-black" value="Morelos">Morelos</option>
						<option class="bg-white text-black" value="Nayarit">Nayarit</option>
						<option class="bg-white text-black" value="Nuevo Leon">Nuevo León</option>
						<option class="bg-white text-black" value="Oaxaca">Oaxaca</option>
						<option class="bg-white text-black" value="Puebla">Puebla</option>
						<option class="bg-white text-black" value="Queretaro">Querétaro</option>
						<option class="bg-white text-black" value="Quintana Roo">Quintana Roo</option>
						<option class="bg-white text-black" value="San Luis Potosi">San Luis Potosí</option>
						<option class="bg-white text-black" value="Sinaloa">Sinaloa</option>
						<option class="bg-white text-black" value="Sonora">Sonora</option>
						<option class="bg-white text-black" value="Tabasco">Tabasco</option>
						<option class="bg-white text-black" value="Tamaulipas">Tamaulipas</option>
						<option class="bg-white text-black" value="Tlaxcala">Tlaxcala</option>
						<option class="bg-white text-black" value="Veracruz">Veracruz</option>
						<option class="bg-white text-black" value="Yucatan">Yucatán</option>
						<option class="bg-white text-black" value="Zacatecas">Zacatecas</option>
					</select>
				</div>
			</div>
			<div class="relative px-2 md:mb-0 mb-4 md:w-1/5">
				<div class="relative bg-white text-black border border-grey-200 rounded">
					<img src="{{ URL::asset('img/rueda.jpg') }}" class="object-contain absolute w-6 h-full inset-y-0 left-2" alt="" />
					<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
					<select name="products" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-10 pr-8 text-gray-400 text-sm focus:outline-none">
						<option class="bg-white text-black" selected hidden disabled>Asesor&iacute;a</option>
						<option class="bg-white text-black" value="Hipotecario">Hipotecario</option>
						<option class="bg-white text-black" value="Empresarial">Empresarial</option>
						{{-- 
						<optgroup label="Hipotecario">
							<option class="bg-white text-black" value="Asesoría Hipotecaria">Asesoría Hipotecaria</option>
							<option class="bg-white text-black" value="Adquisición de vivienda">Adquisición de vivienda</option>
							<option class="bg-white text-black" value="Construcción">Construcción</option>
							<option class="bg-white text-black" value="Cambio de hipoteca">Cambio de hipoteca</option>
							<option class="bg-white text-black" value="Adquisición de terreno">Adquisición de terreno</option>
							<option class="bg-white text-black" value="Terreno + Construcción">Terreno + Construcción</option>
							<option class="bg-white text-black" value="Preventa">Preventa</option>
							<option class="bg-white text-black" value="Liquidez">Liquidez</option>
							<option class="bg-white text-black" value="Liquidez + sustitución">Liquidez + sustitución</option>
						</optgroup>
						<optgroup label="Empresarial">
							<option class="bg-white text-black" value="Renovación / Remodelación">Renovación / Remodelación</option>
							<option class="bg-white text-black" value="Crédito Empresarial">Crédito Empresarial</option>
							<option class="bg-white text-black" value="Crédito como Anticipo">Crédito como Anticipo</option>
							<option class="bg-white text-black" value="Crédito Simple">Crédito Simple</option>
							<option class="bg-white text-black" value="Crédito Revolvente">Crédito Revolvente</option>
							<option class="bg-white text-black" value="Crédito Arrendamiento">Crédito Arrendamiento</option>
						</optgroup>
						--}}
					</select>
				</div>
			</div>
			{{--
			<div class="relative px-2 md:w-1/5">
				<div class="relative bg-white text-black border border-grey-200 rounded">
					<img src="{{ URL::asset('img/rueda.jpg') }}" class="object-contain absolute w-6 h-full inset-y-0 left-2" alt="" />
					<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
					<select name="badge" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-10 pr-8 text-gray-400 text-sm focus:outline-none">
						<option class="bg-white text-black" selected hidden disabled>Certificaci&oacute;n</option>
							<option class="bg-white text-black" value="Asesoría Hipotecaria">Asesoría Hipotecaria</option>
							<option class="bg-white text-black" value="Adquisición de vivienda">Adquisición de vivienda</option>
							<option class="bg-white text-black" value="Construcción">Construcción</option>
							<option class="bg-white text-black" value="Cambio de hipoteca">Cambio de hipoteca</option>
							<option class="bg-white text-black" value="Adquisición de terreno">Adquisición de terreno</option>
							<option class="bg-white text-black" value="Terreno + Construcción">Terreno + Construcción</option>
							<option class="bg-white text-black" value="Preventa">Preventa</option>
							<option class="bg-white text-black" value="Liquidez">Liquidez</option>
							<option class="bg-white text-black" value="Liquidez + sustitución">Liquidez + sustitución</option>
					</select>
				</div>
			</div>
			--}}
			<div class="relative px-2 md:w-1/5">
				<button type="submit" class="relative text-white bg-tertiary px-10 py-2 w-full rounded-md"><i class="absolute left-2 top-3 fa fa-spinner fa-spin loader" style="display:none"></i> Buscar</button>
			</div>
		</form>

		<div class="px-2 my-10 hidden" id="keywords">
			<span class="inline-block">B&uacute;squeda</span>
			<div id="search_query" class="inline-block"></div>
		</div>

		<div id="results" class="grid lg:grid-cols-3 md:grid-cols-2 md:gap-8 gap-4 mx-auto mt-10 mb-6 max-w-4xl">
		</div>

		<div id="fail_results" class="mx-auto mt-10 max-w-4xl text-center">
			
		</div>

		<div class="hidden" id="sketch">
			<div class="border-2 rounded-md border-tertiary p-6 bg-white">
				<h4 class="text-xl text-primary font-bold text-center" id="user_name"></h4>
				<span class="block font-light text-center">Asesor Hipotecario</span>

				<figure class="badge-image"><img /></figure>

				<span class="flex items-start">
					<i class="fa fa-map-marker-alt flex-none mr-2 mt-1"></i> <span id="user_address"></span>
				</span>

				<div class="text-center">
					<a href="" id="user_link" class="font-bold underline text-tertiary">Ver m&aacute;s</a>
				</div>
			</div>
		</div>
		<div id="query_items" class="hidden">
			<div class="px-3 py-1 mb-2 rounded relative inline-block border border-primary">
				<div class="absolute inset-0 opacity-50 bg-primary"></div>
				<span class="relative z-10 value-item"></span>
				<span class="click-item cursor-pointer ml-2 relative z-10"><i class="far fa-times-circle"></i></span>
			</div>
		</div>
	</div>
	
@endsection

@section('scripts')

	<script type="text/javascript">
	$(document).ready(function() {
		$('body').css('background-image','url(\'{{ URL::asset('img/fondo.jpg') }}\')')
	});
	$('body').on('click','.click-item',function(e) {
		e.stopPropagation();
		var name = $(this).prev().data('name');

		if(name == 'name'){
			$('[name="'+ name +'"]').val('');
		} else{
			$('[name="'+ name +'"]').find("option:selected").prop("selected", false);
			$('[name="'+ name +'"]').find("option:first-child").prop("selected", true);
		}

		$(this).parent().remove();
		$('form').submit();
	});
    $('input').focusout(function() {
        $('form').submit();
    });
    $('select').change(function() {
        $('form').submit();
    });
    function limpiar_buscador(){
    	$('.loader').addClass('loading');
    	$('#keywords').addClass('hidden');
    	$('#results').html('');
    	$('#fail_results').html('');
    	$('#search_query').html('');
    	$('#user_name').html('');
        $('#user_address').html('');
    }
	$('form').submit(function(e) {
		e.preventDefault();
		$('.loader').fadeIn();
		$.ajax({
            url: "{{ URL::to('asesores/search') }}",
            type: 'post',
            data: $('form').serialize(),
            dataType: 'json',
		    beforeSend: function() {
		        limpiar_buscador();
		    },
            success: function (res) {
                limpiar_buscador();
		        $('.loader').fadeOut();
		        
            	var values = {
            		'name': $('[name="name"]').val(),
            		'state': $('[name="state"]').val(),
            		'products': $('[name="products"]').val(),
            		// 'badge': $('[name="badge"]').val(),
            	}

            	Object.keys(values).forEach(function(key) {
            		if(values[key] !== '' && values[key] !== null){
		    			
		    			$('#keywords').removeClass('hidden');

	            		$('#query_items .value-item').attr('data-name',key).html(values[key]);
	            		$('#search_query').append($('#query_items').html());
            		}
            	});

            	if(res.asesores !== undefined && res.asesores !== null && res.asesores !== ""){
            		for (var i = 0; i < res.asesores.length; i++) {
            			
            			
            			
            			
            			item = '<div class="border-2 rounded-md border-tertiary p-6 bg-white">' +
            				'<h4 class="text-xl text-primary font-bold text-center">'+res.asesores[i]['name']+'</h4>' +
            				'<span class="block font-light text-center">Asesor Hipotecario</span>'+
                			'<figure class="badge-image"><img ' + (res.asesores[i]['badge'] ? 'src="{{ URL::asset('img') }}/' + res.asesores[i]['badge'] + '.png" alt="'+res.asesores[i]['badge']+'"' : '') + ' /></figure>'+
            
            				'<span class="flex items-start">'+
            					'<i class="fa fa-map-marker-alt flex-none mr-2 mt-1"></i> <span>'+(res.asesores[i]['direccion'] ? res.asesores[i]['direccion'] : '')+'</span>'+
            				'</span>'+
            
            				'<div class="text-center">'+
            					'<a href="{{ config('constants.base_link') }}' + res.asesores[i]['url']+'" class="font-bold underline text-tertiary">Ver m&aacute;s</a>'+
            				'</div>'+
            			'</div>';
            			
            			
            			
            			
            			
		    			$('#results').append(item);
            		}
            	}
            	if(res.suggest !== undefined && res.suggest !== null && res.suggest !== ""){
        			$('#fail_results').html('<h4 class="mb-4">No se encontró ningún resultado</h4>');
	    			$('#fail_results').append('<p class="mb-4">Quiz&aacute; quisiste decir:</p>');
	    			$('#fail_results').append('<ul></ul>');
            		for (var x = 0; x < res.suggest.length; x++) {
		    			$('#fail_results ul').append('<li><a class="underline" href="{{ config('constants.base_link') }}'+res.suggest[x]['url']+'">'+res.suggest[x]['name']+'</a></li>');
            		}
        		}
            },
		    error: function (x) {
		    	console.log(x.responseText);
		    }
		});
	});
	</script>
@endsection