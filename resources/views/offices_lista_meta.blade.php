<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Oficinas SOC</title>
  </head>
  <body>
    <header>
      <div class="container mt-4 mb-4">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-2">
            <img src="https://marketing.socasesores.com/img/SOC1@300x.png" class="img-fluid" style="max-width: 250px" alt="">
          </div>
          <div class="col-md-10 text-center">
            <h2 style="color: #0D725E">Oficinas SOC</h2>
          </div>
          <div class="col-md-5 mt-4 text-center">
            <form action="{{ route('searchAll') }}" method="post">
              @csrf
              <input type="text" class="form-control" name="busqueda" aria-label="Small" placeholder="Busca por nombre de oficina" aria-describedby="inputGroup-sizing-sm">
              
            </form>
          </div>
        </div>
      </div>
    </header>
    @if(isset($oficinas_busqueda))
      <div class="container">
        <div class="row">
          <div class="col-12">
            @foreach($oficinas_busqueda as $hipoteca)
              @php
                $ciudad_seo = "";
                if(isset($hipoteca->ciudad)){
                  $rest = substr($hipoteca->ciudad, -1);
                  if($rest === " "){
                      $ciudad_seo = rtrim($hipoteca->ciudad, " ");
                  }else{
                      $ciudad_seo = $hipoteca->ciudad;
                  }
                }else{
                  
                }
            @endphp
              @if($ciudad_seo != "")
                 {{ $hipoteca->name }}
              @endif
            @endforeach
          </div>
        </div>
      </div>


    @else
      <div class="container">
     <div class="row">
       <div class="col-12">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hipotecario</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Empresarial</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Seguros</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
       @foreach($hipotecario as $hipoteca)
      @php
        $ciudad_seo = "";
        if(isset($hipoteca->ciudad)){
          $rest = substr($hipoteca->ciudad, -1);
          if($rest === " "){
              $ciudad_seo = rtrim($hipoteca->ciudad, " ");
          }else{
              $ciudad_seo = $hipoteca->ciudad;
          }
        }else{

        }
    @endphp
      @if($ciudad_seo != "")
          @php
                                     $split_name = explode("-", $hipoteca->name);
                                     $productos_seo = str_replace(",",", ",$hipoteca->productos)
                                    @endphp
         {{ $hipoteca->name }}<br>
      @endif
    @endforeach
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        

    @foreach($empresas as $empresa)
      @php
        $ciudad_seo = "";
        if(isset($empresa->ciudad)){
          $rest = substr($empresa->ciudad, -1);
          if($rest === " "){
              $ciudad_seo = rtrim($empresa->ciudad, " ");
          }else{
              $ciudad_seo = $empresa->ciudad;
          }
        }else{

        }
    @endphp
      @if($ciudad_seo != "")
         @php
                                     $split_name = explode("-", $empresa->name);
                                     $productos_seo = str_replace(",",", ",$empresa->productos)
                                    @endphp
         Visita nuestra oficina SOC Asesores y recibe atención en {{$productos_seo}} ubicada en {{ $empresa->ciudad }}, {{$empresa->estado}} en la colonia {{$empresa->colonia}}.<br>
         
      @endif
    @endforeach
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
       @foreach($seguros as $seguro)
      @php
        $ciudad_seo = "";
        if(isset($seguro->ciudad)){
          $rest = substr($seguro->ciudad, -1);
          if($rest === " "){
              $ciudad_seo = rtrim($seguro->ciudad, " ");
          }else{
              $ciudad_seo = $seguro->ciudad;
          }
        }else{

        }
    @endphp
      @if($ciudad_seo != "")
         @php
                                     $split_name = explode("-", $seguro->name);
                                     $productos_seo = str_replace(",",", ",$seguro->productos)
                                    @endphp
         Visita nuestra oficina SOC Asesores y recibe atención en {{$productos_seo}} ubicada en {{ $seguro->ciudad }}, {{$seguro->estado}} en la colonia {{$seguro->colonia}}.<br>
      @endif
    @endforeach
    </div>
  </div> 
       </div>
     </div>
   </div>
   
    @endif
   

  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>