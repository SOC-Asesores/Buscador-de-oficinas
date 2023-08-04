@extends('layout')

@section('content')
	<div class="container px-4 mx-auto mt-10">
		<div class="flex px-4 mb-8 flex-wrap items-center">
            <figure class="md:w-1/3 w-1/2"><a href="https://socasesores.com/"><img src="https://socasesores.com/img/SOC1@300x.png" style="width: 200px;" alt=""></a></figure>
			<h4 class="md:w-1/3 w-1/2 md:text-xl text-lg text-primary text-center mb-3 font-bold">Ubica tu oficina</h4>

		</div>
		<div class="mb-8 w-full px-4">
			<form
				action="{{ URL::to('micrositios/search') }}"
				method="post"
                id="search">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				
                <div class="md:flex items-center mb-4">
                    <label class="md:-ml-4 px-4 md:mb-0 mb-4 font-light">
        				Buscar
                    </label>
                    <div class="md:w-40 px-4 md:mb-0 mb-4">
        				<label for="oficina" class="relative cursor-pointer">
        				    <input class="invisible appareance-none absolute z-0 top-0 left-0 w-px h-px" type="radio" name="type" value="Oficina" id="oficina" checked/>
        				    <span class="bg-white inline-flex items-center w-full text-black border border-grey-200 rounded px-4 py-2"><img class="flex-none w-6 mr-2" src="{{ asset('img/office.png') }}" /> Oficina</span>
        				</label>
                    </div>
                    <div class="md:w-40 px-4 md:mb-0 mb-4">
        				<label for="broker" class="relative cursor-pointer">
        				    <input class="invisible appareance-none absolute z-0 top-0 left-0 w-px h-px" type="radio" name="type" value="Asesor" id="broker" />
        				    <span class="bg-white inline-flex items-center w-full text-black border border-grey-200 rounded px-4 py-2"><img class="flex-none w-6 mr-2" src="{{ asset('img/businessman.png') }}" /> Asesor</span>
        				</label>
                    </div>
                </div>
				
				<div class="rounded md:px-9 px-4 py-9 bg-white-smoke shadow-sm">
				    <div class="md:flex items-center">
                        <div class="md:w-1/4 px-4 md:mb-0 mb-4">
            				<div class="relative bg-white text-black border border-grey-200 rounded">
            					<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            					<select name="state" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
            						<option class="bg-white text-black" selected hidden disabled>Estado</option>
            					@foreach ($states as $s => $state_name)
    
            						<option class="bg-white text-black" value="{{ $s }}">{{ $state_name }}</option>
            					@endforeach
    
            					</select>
            				</div>
                        </div>
    
                        <div class="md:w-1/4 px-4 md:mb-0 mb-4">
            				<div class="relative bg-white text-black border border-grey-200 rounded">
            					<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            					<select name="city" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
            						<option class="bg-white text-black" selected hidden disabled>Municipio</option>
            					</select>
            				</div>
                        </div>
    
                        <div class="md:w-1/4 px-4 md:mb-0 mb-4">
            				<div class="relative bg-white text-black border border-grey-200 rounded">
            					<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            					<select name="products" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
            						<!--<option class="bg-white text-black" selected hidden disabled>Asesor&iacute;a</option>-->
            						<option class="bg-white text-black" value="Hipotecario">Hipotecario</option>
            						<option class="bg-white text-black" value="Empresarial">Empresarial</option>
            						<option class="bg-white text-black" value="Seguros">Seguros</option>
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
    
                        <div class="md:w-1/4 px-4">
        				    <button type="submit" class="text-white bg-tertiary px-10 py-2 w-full rounded-md" >Buscar</button>
                        </div>
                    </div>
				</div>
			</form>
		</div>
		<div class="w-full px-4 md:block hidden">
			<div id="map" class="block w-full h-96 shadow-md"></div>
		</div>
	</div>
	@endsection

	@section('scripts')
	<script
      src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.google_maps_api_key') }}&callback=initMap&v=weekly"
      async
    ></script>
	<script type="text/javascript" src="{{ URL::asset('js/states.js?') }}"></script>
	<script type="text/javascript">
		let map;
        
        if($(window).width() >= 768){
            function initMap() {
    	    	var locations = {!! $locations !!};
    		  map = new google.maps.Map(document.getElementById("map"), {
    		    zoom: 5,
    		    center: new google.maps.LatLng(23.6260, -99.12766),
    		  });
    		  var infowindow = new google.maps.InfoWindow();
    
    		    var marker, i;
    		    
    		    for (i = 0; i < locations.length; i++) {  
    		      marker = new google.maps.Marker({
    		        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    		        icon: "{{ URL::asset('img') }}/"+locations[i][3],
    		        map: map
    		      });
    		      
    		      google.maps.event.addListener(marker, 'click', (function(marker, i) {
    		        return function() {
                        $('[name="state"]').val(locations[i][4]);
                        $('#search').submit();
    		          // infowindow.setContent(locations[i][0]);
    		          // infowindow.open(map, marker);
    		        }
    		      })(marker, i));
    		    }
            }
        }
        
        {{--
		$('form').submit(function(e) {
			e.preventDefault();
			$.ajax({
	            url: "{{ URL::to('micrositios/search') }}",
	            type: 'post',
	            data: $('form').serialize(),
			    beforeSend: function() {
			    	$('.loader').addClass('loading');
			    },
	            success: function (res) {
	            	if(res.length){
		            	var locations = [];
		            	for (a = 0; a < res.length; a++) {
		            		if(
		            			res[a]['lat'] !== '' && res[a]['lng'] !== '' &&
		            			res[a]['lat'] !== null && res[a]['lng'] !== null &&
		            			res[a]['lat'] !== '0' && res[a]['lng'] !== '0'
		            		){
			            		locations.push([
			            			res[a]['name'],
			            			res[a]['lat'],
			            			res[a]['lng'],
			            		]);
			            	}
		            	}

		            	console.log(locations);

		            	if(locations.length > 1){
						    x1 = '';
						    x2 = '';
						    y1 = '';
						    y2 = '';

						    for (i = 0; i < locations.length; i++) {
						    	if(x1 == '' || x1 > locations[i][1]){ x1 = locations[i][1]; }
						    	if(x2 == '' || x2 < locations[i][1]){ x2 = locations[i][1]; }
						    	if(y1 == '' || y1 > locations[i][2]){ y1 = locations[i][2]; }
						    	if(y2 == '' || y2 < locations[i][2]){ y2 = locations[i][2]; }
						    }
						    var lat = x1 + (x2-x1)/2;
						    var lng = y1 + (y2-y1)/2;
		            	} else{
		            		var lat = locations[0][1];
		            		var lng = locations[0][2];
		            	}


					  map = new google.maps.Map(document.getElementById("map"), {
					    //center: { lat: 19.716, lng: -99.147 },
					    zoom: 10,
					    center: new google.maps.LatLng(lat, lng),
					    // center: new google.maps.LatLng(-33.92, 151.25),
					    // mapTypeId: google.maps.MapTypeId.ROADMAP
					  });
	            	} else{
	            		alert('No hay resultados disponibles');
	            	}
	            },
			    error: function (x) {
			    	console.log(x);
			    }
			});
		});
		--}}
	</script>
	@endsection