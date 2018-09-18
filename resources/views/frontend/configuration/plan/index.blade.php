@extends('layouts.app')

  @section('nav-breadcrumbs')
  <nav>
    <div class="nav-wrapper">
      <div class="col s12 center">
        <a href="/settings" class="breadcrumb">Configuraciones</a>
        <a href="/config-plan" class="breadcrumb">Plan</a>
      </div>
    </div>
  </nav>
  @endsection
@section('main-contenido')
 <div class="fixed-action-btn horizontal click-to-toggle ">
    <a class="btn-floating btn-large red hide-on-med-and-up">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>

    <div class="container">
      
      <div class="row">
    <div class="col s12 m6 l4">
      <div class="card" style="border-radius: 15px;">
        <div class="card-image" style="height: 200px; background-color: #9c27b0;">
          <h5 class="white-text center" style="background-color: rgba(0, 0, 0, 0.19); padding-bottom: 15px; padding-top: 15px;">BASICO</h5>
            <h2 class="white-text center">$20.000</h2>
            <h6 class="white-text center" style="font-weight: bold;">1 mes</h6>

          
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
          <hr>
           <center><button class="btn pink">Comprar</button></center>
        </div>
      </div>
    </div>

      <div class="col s12 m6 l4">
      <div class="card" style="border-radius: 15px;">
        <div class="card-image" style="height: 200px; background-color: #00bcd4;">
          <h5 class="white-text center" style="background-color: rgba(0, 0, 0, 0.19); padding-bottom: 15px; padding-top: 15px;">PROFESIONAL</h5>
          <h2 class="white-text center">$58.000</h2>
          <h6 class="white-text center" style="font-weight: bold;">3 mes</h6>
          
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
          <hr>
           <center><button class="btn pink">Comprar</button></center>
        </div>
      </div>
    </div>

      <div class="col s12 m6 l4">
      <div class="card" style="border-radius: 15px;">
        <div class="card-image" style="height: 200px; background-color: #4caf50;">
          <h5 class="white-text center" style="background-color: rgba(0, 0, 0, 0.19); padding-bottom: 15px; padding-top: 15px;">PREMIUM</h5>
            <h2 class="white-text center">$119.000</h2>
            <h6 class="white-text center" style="font-weight: bold;">6 mes</h6>
          
        </div>
        <div class="card-content">
           <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
           <hr>
           <center><button class="btn pink">Comprar</button></center>
        </div>
      </div>
    </div>
  </div>

    </div>

@include('footer')
 <script src="{{asset('js/viewconfigplan.js')}}"></script>

@endsection





