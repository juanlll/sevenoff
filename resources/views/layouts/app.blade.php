<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SevenOFF</title>
</head>
<body>
  <style type="text/css">
  .badge1 {
    position:relative;
  }
  .badge1[data-badge]:after {
    content:attr(data-badge);
    position:absolute;
    top:2px;
    right:10px;
    font-size:.7em;
    background:orange;
    color:white;
    width:18px;height:18px;
    text-align:center;
    line-height:18px;
    border-radius:50%;
    box-shadow:1 1 10px #333;
  }

  .brand-logo{
    font-weight:900;
  }

  .dropdown-content {
    background-color: #FFFFFF;
    margin: 0;
    display: none;
    min-width: 300px; /* Changed this to accomodate content width */
    max-height: auto;
    margin-left: -1px; /* Add this to keep dropdown in line with edge of navbar */
    overflow: hidden; /* Changed this from overflow-y:auto; to overflow:hidden; */
    opacity: 0;
    position: absolute;
    white-space: nowrap;
    z-index: 1;
    will-change: width, height;
    border-radius: 15px;
border-width: 0px;
  }


</style>
<nav  class="z-depth-5" id="nav-header">
  <div class="nav-wrapper white">

  <a href="#!" 
    class="brand-logo">
    <img src="{{asset('/icons/png/isop.png')}}" id="icon-logo" height="64px" width="64px">
  </a>
  <a href="#" 
    data-activates="mobile-demo" 
    class="button-collapse" 
    style="color: #aa1b46;" >
    <i id="icon-menu" class="material-icons">menu</i>
  </a>


    <ul class="right hide-on-med-and-down"  >


      <!-- Dropdown Trigger #f37f1f -->
      @if (!Auth::guest())

      <li 
      class="tooltipped" 
      data-position="bottom" 
      data-delay="50" 
      data-tooltip="Inicio">
      <a href="/" 
      style=" color: black; height: 40px; color: black;" >
      <i class="material-icons" style="line-height: 40px; color: black;">home</i>
    </a>
  </li>

  <li 
  class="tooltipped" 
  data-position="bottom" 
  data-delay="50" 
  data-tooltip="Mi tienda">
  <a href="/profile/{{ Auth::user()->id }}" 
   style=" color: black; height: 40px; color: black;">
   <i class="material-icons" 
   style="line-height: 40px; color: black;">store_mall_directory
 </i>
</a>
</li>

<!-- <li 
class="tooltipped badge1" 
data-badge="27" 
data-position="bottom" 
data-delay="50" 
data-tooltip="Buzon de mensajes"> 
<a href="/messages" style=" color: black; height: 40px; color: black;">
  <i class="material-icons" style="line-height: 40px; color: black;">email</i>
</a>
</li> -->

<!-- <li
class="dropdown-button tooltipped badge1" 
data-activates="dropdown_notification" 
data-beloworigin="true"
data-badge="27"  
data-position="bottom" 
data-delay="50" 
data-tooltip="Notificaciones">
<a style=" color: black; height: 40px; color: black;">
  <i class="material-icons" style="line-height: 40px; color: black;">notifications_active</i>
</a>
</li> -->

<li 
class="tooltipped" 
data-position="bottom" 
data-delay="50" 
data-tooltip="Configuraciones"> 
<a href="/settings" style=" color: black; height: 40px; color: black;">
  <i class="material-icons" style="line-height: 40px; color: black;">settings</i>
</a>
</li>

<li>
  <a 
  class='dropdown-button'  
  data-activates='dropdown_exit' 
  style="color: black; font-weight: bold;">{{ Auth::user()->email }}</a>
</li>

<ul id="dropdown_notification" class="dropdown-content collection">
  <li class="blue darken-3 z-depth-6">
    <h5 class="center" style="color: white;">Notificaciones</h5>
  </li>
<li class="collection-item">
<a><img  class="circle" width="32"  src="https://image.flaticon.com/icons/svg/262/262815.svg" style="vertical-align: middle;">Like de harold</a>
</li>
<li class="collection-item">
<a><img  class="circle" width="32" src="https://image.flaticon.com/icons/svg/262/262815.svg" style="vertical-align: middle;">Like de harold</a>
</li>
<li class="collection-item">
<a><img  class="circle" width="32" src="https://image.flaticon.com/icons/svg/262/262815.svg" style="vertical-align: middle;">Like de harold</a>
</li>
<li class="collection-item">
<a><img  class="circle" width="32" src="https://image.flaticon.com/icons/svg/262/262815.svg" style="vertical-align: middle;">Like de harold</a>
<label class="right">Ayer a las 12 horas</label>
</li>

  <li class="blue darken-3 z-depth-6">
   <a href="/notifications" class="center" style="font-weight: bold; color: white;">Ver todas</a>
  </li>


</ul>
@else

<li 
class="tooltipped" 
data-position="bottom" 
data-delay="50" 
data-tooltip="Inicio">
  <a 
  href="/" 
  style="height: 40px; color: #616161; 
  display: line; font-weight: bold;">Inicio</a>
</li>

  <li 
  class="tooltipped" 
  data-position="bottom" 
  data-delay="50" 
  data-tooltip="Inicio">
    <a 
    href="/login" 
    style=" height: 40px; color: #616161; 
    display: line; font-weight: bold;"> Iniciar sesion</a>
  </li>

    <li 
    class="tooltipped" 
    data-position="bottom" 
    data-delay="50" 
    data-tooltip="Inicio">
      <a 
      href="/register" 
      class="btn orange white-text" 
      style=" color: #616161; height: 40px;
      display: line; font-weight: bold;">Registrarse</a>
    </li>


      @endif
      <!-- Dropdown Structure -->
      <ul id='dropdown_exit' class='dropdown-content ' >
        @if (!Auth::guest())

        <li><a 
          href="/settings" 
          style="color: #aa1b46; 
          font-weight: bold;">{{ Auth::user()->email }}</a>
        </li>

        <li class="divider"></li>

        <li>
          <a 
          class=" red-text darken-4" 
          href="{{ route('logout') }}" 
          onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
          <i class="material-icons">exit_to_app</i>Salir
        </a>
          <form 
          id="logout-form" 
          action="{{ route('logout') }}" 
          method="POST" 
          style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>

        @else
        <li><a 
          class=" modal-trigger" 
          href="/login">
          <i class="material-icons">account_circle</i>Informacion
           </a>
        </li>

        <li class="divider"></li>

        <li>
          <a 
          class="modal-trigger" 
          href="/login">
          <i class="material-icons">account_circle</i>
          Ingresar
        </a>
      </li>

        <li>
          <a 
          class="modal-trigger" 
          href="/register">
          <i class="material-icons">account_circle</i>
          Registrar
        </a>
      </li>

        @endif
      </ul>
      
    </ul>
    <ul class="side-nav collection" id="mobile-demo" >
      @if (Auth::guest())

      <li class="waves-effect collection-item" style="width: 100%;">
        <a href="/login"><i class="material-icons" >account_circle</i>Ingresar</a>
      </li>

      <li class="waves-effect collection-item" style="width: 100%;">
        <a href="/register"><i class="material-icons right">account_circle</i>Registrarse</a>
      </li>

      @else
      <li class="waves-effect collection-item" style="width: 100%;">
        <a href=""><i class="material-icons">account_circle</i>{{ Auth::user()->email }}</a>
      </li>

      <li class="waves-effect collection-item" style="width: 100%;">
        <a href="/profile/{{ Auth::user()->id }}"><i class="material-icons" >store</i>Mi tienda</a>
      </li>

      <li class="waves-effect collection-item" style="width: 100%;">
        <a href="/settings"><i class="material-icons">build</i>Cuenta</a>
      </li>

      <li class="waves-effect collection-item" style="width: 100%;" >
        <a style="width: 100%;"
        href="{{ route('logout') }}" 
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="material-icons">exit_to_app</i>
      Salir</a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}

      </form>
    </li>

    @endif
  </ul>
</div>
</nav>

@yield('nav-breadcrumbs')

<div class="row">
  <script  src="{{asset('js/app.js')}}"> </script> 
 


  @yield('recuperar')
  <!-- container -->
  @yield('main-contenido')

</div>




<!--Import jQuery before materialize.js-->



@if (count($errors)>0)

<ul>
  @foreach ($errors->all() as $error)
  <li> <script > var errores = '{{$error}}'; toastr.error(errores); </script>  </li>

  @endforeach
</ul>



@endif




@if(Session::has('flash_message'))
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script > 

  swal({
    title: "{{Session::get('flash_message')}}",
    text: `Esta fue tu ultima conexión \n
    Fecha y hora: {{Session::get('flash_connection')}}
    \nIp:{{Session::get('flash_ip')}}
    `,
    icon: "{{asset('icons/png/colombia1.png')}}",
    button: "Listo",
  });


</script> 
@endif






<script type="text/javascript">


 $( document ).ready(function(){
  $(".button-collapse").sideNav();

  $('.fixed-action-btn').openFAB();
  $('.fixed-action-btn').closeFAB();



  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    duration:300
  });
  $('.carousel').carousel({
    padding: 200    
  });
  autoplay()   
  function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
  }

  $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });


  $(document).ready(function(){
    $('.slider').slider();
  });

  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });

  $('.tap-target').tapTarget('open');
  $('.tap-target').tapTarget('close');


  $('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year,
  today: 'Hoy',
  clear: 'limpiar',
  close: 'Listo',
  closeOnSelect: true // Close upon selecting a date,
});

})

 $('.modal').modal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    opacity: .5, // Opacity of modal background
    inDuration: 300, // Transition in duration
    outDuration: 200, // Transition out duration
    startingTop: '4%', // Starting top style attribute
    endingTop: '10%', // Ending top style attribute
    ready: function(modal, trigger) {},
    complete: function() { } 
  }
  );



</script>


<footer class="page-footer grey darken-4">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">SevenOFF</h5>
        <p class="grey-text text-lighten-4">Puedes postear tus ofertas e informcion personal de tu tienda,empresa,local y etc...</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Patrocinadores</h5>
        <ul>
         <!--  <li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons" style="vertical-align: bottom;">home</i>SmartGeeks</a></li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons" style="vertical-align: bottom;">home</i>Shadaipapers</a></li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons" style="vertical-align: bottom;">home</i>Cjshop</a></li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons" style="vertical-align: bottom;">home</i>Hidrotec</a></li> -->
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright grey darken-4">
    <div class="container">
      © 2017 Copyright Juanvargasva.ml
      <a class="grey-text text-lighten-4 right" href="#!">Mas informacion...</a>
    </div>
  </div>
</footer>   
</body>
</html>