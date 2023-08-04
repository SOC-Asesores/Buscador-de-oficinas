@extends('layout')

@section('content')
	<section class="bg-white-smoke min-h-screen">
		<div class="py-10 bg-white">
            <div class="flex px-4 mb-8 flex-wrap items-center">
                <figure class="md:w-1/3 w-1/2"><a href="https://socasesores.com/"><img src="https://socasesores.com/img/SOC1@300x.png" style="width: 200px;" alt=""></a></figure>
                <h4 id="filtros_title" class="md:w-1/3 w-1/2 md:text-xl text-lg text-primary text-center mb-3 font-bold">Ubica tu oficina <span class="md:hidden">+</span></h4>

            </div>
			<div class="container px-4 mx-auto">
					<form
                        id="filtros"
						action="{{ URL::to('micrositios/search') }}"
						method="post"
						class="md:flex hidden items-center">
						@csrf
						
						<div class="relative px-2 md:w-1/4">
							<div class="relative bg-white md:mb-0 mb-4 text-black border border-grey-200 rounded">
								<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
								<select name="type" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
									<option class="bg-white text-black" {{ empty($type) ? 'selected' : ''}} hidden disabled>Buscar por</option>
									<option class="bg-white text-black"  {{ !empty($type) && $type == 'Oficina' ? 'selected' : ''}} value="Oficina">Oficina</option>
									<option class="bg-white text-black"  {{ !empty($type) && $type == 'Asesor' ? 'selected' : ''}} value="Asesor">Asesor</option>

								</select>
							</div>
						</div>
                        
						<div class="relative px-2 md:w-1/4">
							<div class="relative bg-white md:mb-0 mb-4 text-black border border-grey-200 rounded">
								<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
								<select name="state" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
									<option class="bg-white text-black" {{ empty($state) ? 'selected' : ''}} hidden disabled>Estado</option>
								@foreach ($states as $s => $state_name)

									<option class="bg-white text-black"  {{ !empty($state) && $state == $s ? 'selected' : ''}} value="{{ $s }}">{{ $state_name }}</option>
								@endforeach

								</select>
							</div>
						</div>
                        
						<div class="relative px-2 md:w-1/4">
							<div class="relative bg-white md:mb-0 mb-4 text-black border border-grey-200 rounded">
								<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
								<select name="city" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
									<option class="bg-white text-black" {{ empty($municipio) ? 'selected' : ''}} hidden disabled>Municipio</option>
								</select>
							</div>
						</div>
						<div class="relative px-2 md:w-1/4">
							<div class="relative bg-white md:mb-0 mb-4 text-black border border-grey-200 rounded">
								<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
								<select name="products" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
									<option class="bg-white text-black" {{ empty($products) ? 'selected' : ''}} hidden disabled>Asesor&iacute;a</option>
									<option class="bg-white text-black" {{ !empty($products) && $products == 'Hipotecario' ? 'selected' : ''}} value="Hipotecario">Hipotecario</option>
									<option class="bg-white text-black" {{ !empty($products) && $products == 'Empresarial' ? 'selected' : ''}} value="Empresarial">Empresarial</option>
									<option class="bg-white text-black" {{ !empty($products) && $products == 'Seguros' ? 'selected' : ''}} value="Seguros">Seguros</option>
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
						<div class="relative px-2 md:w-1/4">
							<button type="submit" class="text-white bg-tertiary px-10 py-2 w-full rounded-md" >Buscar</button>
						</div>
					</form>
        		<div class="px-2 mt-6 text-sm" id="keywords">
        			<span class="inline-block">{{-- B&uacute;squeda --}}Filtros</span>
        			<div id="search_query" class="inline-block"></div>
        		
        		    @if(!empty($search))
            		@foreach($search as $key => $query)
        			<div class="px-3 py-1 rounded relative inline-block text-white bg-secundary">
        				{{-- <div class="absolute inset-0 opacity-50 bg-secundary"></div> --}}
        				<small class="relative z-10 value-item" data-name="{{ $key }}">{{ $query }}</small>
        				<span class="click-item cursor-pointer ml-2 relative z-10"><i class="far fa-times-circle"></i></span>
        			</div>
        	        @endforeach
        	        @endif
        	        
        		</div>
			</div>
		</div>
		<div data-count="{{ count($micrositios) }}" class="container py-6 md:px-8 px-4 grid lg:grid-cols-4 md:grid-cols-2 gap-8 gap-4 mx-auto mb-6">
		@if (!empty($micrositios))
		    @if(isset($asesores) && !empty($asesores))
		    <h2 class="lg:col-span-4 md:col-span-2 lg:text-3xl md:text-2xl text-xl font-bold text-primary border-b-2 border-primary my-2">Oficinas</h2>
		    @endif
		    
			@foreach($micrositios as $m => $micrositio)
            
			<div data-i="{{ $m }}" data-item-id="{{ $micrositio['id'] }}" class="rounded-md {{ !empty($micrositio['certificacion']) && $micrositio['certificacion'] !== '0' ? 'border-2' : 'border' }} border-tertiary p-6 bg-white relative">
				@if(!empty($micrositio['certificacion']) && $micrositio['certificacion'] !== '0')
				<span class="absolute rounded-md inset-0 z-0 opacity-10 bg-tertiary"></span>
				@endif
				{{-- <h4 class="text-xl text-primary font-bold">{{ $micrositio['name'] }}</h4> --}}
				<div class="relative z-10">
                    @if(!empty($micrositio['certificacion']) && $micrositio['certificacion'] != '0')
                    <figure class="text-center mb-4">
                        <img src="{{ URL::asset('img/'.strtolower($micrositio['certificacion']).'.png') }}" alt="" class="h-4 w-auto max-w-full object-contain">
                    </figure>
                    @else
                    
                        {{--<span class="h-3 block"></span>--}}
                    @endif  
					<figure class="md:w-auto w-4/5 flex mb-4">
						<img class="h-8 w-auto max-w-full object-contain mr-1 pl-1 border-l-px border-grey-200" src="{{ url('img/SOC1@300x.png') }}" alt="{{ $micrositio['name'] }}" />
						<span class="w-px bg-gray-300 block mx-1 flex-none"></span>
						<span class="@php
							$l = strlen($micrositio['name']);
							if($l < 8){ echo 'text-2xl'; }
							elseif($l < 12){ echo 'text-xl'; }
							elseif($l < 18){ echo 'text-lg'; }
							elseif($l >= 18){ echo 'text-sm'; }
							@endphp
							self-center text-primary font-bold leading-none ml-1">
							@if($micrositio['name'] == "ACM -  Yucatán")
								<span style="font-size: 24px">ACM<span>
							@else
								{{ $micrositio['name'] }}
							@endif
							
						</span>
					</figure>

					@if(!empty($micrositio['direccion']))
					<span class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/location@2x.png') }}" class="w-4 flex-none mr-2"> <span>{{ $micrositio['direccion'] }}</span>
					</span>
					@endif
					@if(!empty($micrositio['telefono']))
					<a href="tel://{{ $micrositio['telefono'] }}" target="_blank" class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/Grupo-25@2x.png') }}" class="w-4 flex-none mr-2"> <span>{{ $micrositio['telefono'] }}</span>
					</a>
					@endif
					@if(!empty($micrositio['email']))
					<a href="mailto:{{ $micrositio['email'] }}" target="_blank" class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/vuesax-twotone-sms@2x.png') }}" class="w-4 flex-none mr-2"> <span>{{ strlen($micrositio['email']) > 27 ? implode('@ ',explode('@',strtolower($micrositio['email']))) : strtolower($micrositio['email']) }}</span>
					</a>
					@endif

					<div class="text-center">
					    @php
    					    switch(@$micrositio['linea_de_negocio']){
    					        case 'seguros':
        					        $link = config('constants.base_link_seguros');
        					        break;
    					        case 'empresarial':
        					        $link = config('constants.base_link_empresarial');
        					        break;
    					        default:
    					            $link = config('constants.base_link_oficina');
    					        break;
					        }
					        $link = config('constants.nuevo_link_oficina');
					    @endphp
					    {{--
						<a href="{{ $link.$micrositio['url'] }}" class="font-bold underline text-tertiary">Ver m&aacute;s</a>
						--}}
						<a href="{{ $link.str_replace(' ','-',strtolower($micrositio['estado'])).'/'.str_replace(' ','-',strtolower($micrositio['ciudad'])).'/'.$micrositio['url'] }}" class="font-bold underline text-tertiary">Ver m&aacute;s</a>
					</div>
				</div>
			</div>
			@endforeach
		@endif
		
		@if(isset($asesores) && !empty($asesores))
		    @if (!empty($micrositios))
		    <h2 class="lg:col-span-4 md:col-span-2 lg:text-3xl md:text-2xl text-xl font-bold text-primary border-b-2 border-primary my-2">Asesores</h2>
		    @endif
		    @foreach($asesores as $m => $micrositio)
			<div data-i="{{ $m }}" class="rounded-md {{ !empty($micrositio['level']) ? 'border-2' : 'border' }} border-tertiary p-6 bg-white relative">
				@if(!empty($micrositio['level']))
				<span class="absolute rounded-md inset-0 z-0 opacity-10 bg-tertiary"></span>
				@endif
				{{-- <h4 class="text-xl text-primary font-bold">{{ $micrositio['name'] }}</h4> --}}
				<div class="relative z-10">
                    @if(!empty($micrositio['level']))
                    <figure class="text-center -mt-4 mb-2 -mx-6">
                        <img src="{{ URL::asset('img/'.@$badge[strtolower($micrositio['level'])].($micrositio['tipo'] == 'PYME' ? '-empresarial' : '').'.png') }}" alt="" class="max-w-full w-auto max-w-full object-contain">
                    </figure>
                    @endif  
					
					<h4 class="flex items-start mb-4 lg:text-xl md:text-xl font-bold">
						<img src="{{ URL::asset('img/user.png') }}" class="w-4 flex-none mr-2 mt-1"> <span>{{ $micrositio['name'] }}</span>
					</h4>
					
					@if(!empty($micrositio['telefono']))
					<a href="tel://{{ $micrositio['telefono'] }}" target="_blank" class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/smartphone.png') }}" class="w-4 flex-none mr-2"> <span>{{ $micrositio['telefono'] }}</span>
					</a>
					@endif
					@if(!empty($micrositio['email']))
					<a href="mailto:{{ $micrositio['email'] }}" target="_blank" class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/envelope.png') }}" class="w-4 flex-none mr-2"> <span>{{ strlen($micrositio['email']) > 27 ? implode('@ ',explode('@',strtolower($micrositio['email']))) : strtolower($micrositio['email']) }}</span>
					</a>
					@endif
					@if(!empty($micrositio['direccion']))
					<span class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/office-2.png') }}" class="w-4 flex-none mr-2"> <span>{{ $micrositio['direccion'] }}</span>
					</span>
					@endif

					<div class="text-center">
						<a href="{{ 'https://socasesores.com/micrositios-asesores/'.$micrositio['url'] }}" class="font-bold underline text-tertiary">Ver m&aacute;s</a>
					</div>
				</div>
			</div>
			@endforeach
		@endif
			
		@if(empty($micrositios) && empty($asesores))
			<div class="container mx-auto">
				<h4 class="mb-4">No se encontró ningún resultado</h4>
			</div>
		@endif

		</div>
	</section>
	@endsection

	@section('scripts')
	<script type="text/javascript" src="{{ URL::asset('js/states.js?') }}"></script>

	<script type="text/javascript">
    	$('body').on('click','.click-item',function(e) {
    		e.stopPropagation();
    		var name = $(this).prev().data('name');

			$('[name="'+ name +'"]').find("option:selected").prop("selected", false);
			$('[name="'+ name +'"]').find("option:first-child").prop("selected", true);
    
    		$(this).parent().remove();
    		$('form').submit();
    	});

        $('#filtros_title').click(function(e) {
            if($(window).width() < 768){
                var sign = $(this).find('span').html();
                if(sign == '+'){
                    sign = '-';
                } else{
                    sign = '+';
                }
                $(this).find('span').html(sign);
                $('#filtros').slideToggle();
            }
        })
    	
    	$(window).on('load',function(){
    	    var city_val = $('[data-name="city"]').html();
    	    if(city_val !== '' && city_val !== null){
    	        $('[name="city"]').val(city_val).change();
    	    }
    	});
	</script>
	@endsection