  @extends('layouts.app')

  @section('nav-breadcrumbs')
  <nav>
    <div class="nav-wrapper">
      <div class="col s12 center">
        <a href="/" class="breadcrumb">Inicio</a>
        <a href="/profile/{{Auth::user()->id}}" class="breadcrumb">Perfil</a>
        <a href="/config-profile" class="breadcrumb">Configuraciones</a>
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
  <br>
  <br>
  <div id="vc" class="container white center z-depth-5" style=" border-radius: 15px; overflow:hidden; padding-bottom: 0px;">

<div class="row blue darken-3 z-depth-6" style="margin:0px;" >
  <br>
        <h3 style="margin-bottom:0px; margin-top:0px; color: white;">Configuraciones</h3>
       <br>
    </div>


   <ul class="collection left-align" style="margin-bottom: 0px; margin-top: 0px;">

    <li class="collection-item" style="font-weight: bold;">
      <img style="vertical-align: middle;" 
      src="https://image.flaticon.com/icons/svg/125/125296.svg" 
      width="32" height="32"> Perfil 
      <a href="/config-profile" class="btn blue darken-1 right">ir</a>
  </li>

  <li class="collection-item" 
  style="font-weight: bold;">
  <img style="vertical-align: middle;" 
  src="https://www.flaticon.com/premium-icon/icons/svg/125/125286.svg"
  width="32" height="32">
  Cuenta<a href="/config-user" class="btn blue darken-1 right">ir</a>
  </li> 

  <li class="collection-item" style="font-weight: bold;">
    <img style="vertical-align: middle;" 
    src="https://www.flaticon.com/premium-icon/icons/svg/125/125281.svg" 
    width="32" height="32">
    Informacion Personal<a href="/config-userinfo" 
    class="btn blue darken-1 right">ir</a>
  </li>

   <li class="collection-item" style="font-weight: bold;">
    <img style="vertical-align: middle;" 
    src="https://www.flaticon.com/premium-icon/icons/svg/125/125288.svg" 
    width="32" height="32">
    Plan<a href="/config-plan" 
    class="btn blue darken-1 right">ir</a>
  </li>

  </ul>
<div class="row blue darken-3 z-depth-6" style="margin:0px;" >
       <br>
      
       <br>
         <br>

    </div>

  </div>
  @include('footer')
  <!--  <script src="{{asset('js/ViewProfile.js')}}"></script> -->
  <script src="{{asset('js/viewconfiguration.js')}}"></script> 
  @endsection

























































