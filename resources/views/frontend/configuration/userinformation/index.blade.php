@extends('layouts.app')
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
<div 
id="vcip" 
class="container white center z-depth-5" 
style="
border-radius: 15px;
overflow:hidden;
padding-bottom: 0px;">

<div class="row blue darken-3 z-depth-6" style="margin:0px;">
      <br>
        <h3 
        style="
        margin-bottom:0px; 
        margin-top:0px; 
        color: white;">Información Personal</h3>
      <br>
</div>

<edit-personal :user_info="user_info"></edit-personal>
<div class="row blue darken-3 z-depth-6" style="margin:0px;" >
       <br>
      
       <br>
         <br>

    </div>
</div>
@include('footer')
<script src="{{asset('js/viewconfiginfopersonal.js')}}"></script>

@endsection



