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

<div class="container" style="padding: 0px;">
 <h1>CAJA DE MENSAJES</h1>
</div>
@include('footer')
<!--  <script src="{{asset('js/viewconfigplan.js')}}"></script> -->

@endsection



