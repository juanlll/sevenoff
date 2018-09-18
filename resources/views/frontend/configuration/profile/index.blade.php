@extends('layouts.app')
@section('nav-breadcrumbs')
 <nav>
    <div class="nav-wrapper">
      <div class="col s12 center">
        <a href="/settings" class="breadcrumb">Configuracion</a>
        <a href="/config-profile" class="breadcrumb">Editar perfil</a>
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
<div id="vcp" class="container white center z-depth-5" style=" border-radius: 15px; overflow:hidden; padding-bottom: 0px;">
  <div class="row blue darken-3 z-depth-6" style="margin:0px;" >
        <h2 style="margin-bottom:0px; margin-top:0px; color: white;">Perfil</h2>
        <p style="margin-top: 0px; color: white;" v-text="profile.name"></p>
         <a class="btn pink" href="/profile/{{Auth::user()->id}}">Ver perfil</a>
    <br>
    <br>
    </div>



  <!-- Modal Structure -->
  <div id="mo1" class="modal" style="border-radius: 15px;">
    <div class="modal-content">
  
      <upload-logo></upload-logo>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
  </div>
          
  

 
<edit-information :categories="categories" :profile="profile" :appe="appearance"></edit-information>
 <div class="row blue darken-3 z-depth-6" style="margin:0px;" >
      <br>
        
    <br>
    <br>
    </div>
</div>
@include('footer')
 <script src="{{asset('js/viewconfigprofile.js')}}"></script>

@endsection





