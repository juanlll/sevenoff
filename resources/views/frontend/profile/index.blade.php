  @extends('layouts.app')

@section('nav-breadcrumbs')
 <nav id="bread">
    <div class="nav-wrapper" :style="{backgroundColor: color1}">
      <div class="col s12 center">
        <a href="/" class="breadcrumb">Inicio</a>
        <a href="../profile/{{$profile->id}}" class="breadcrumb">{{$profile->name}}</a>
      </div>
    </div>
  </nav>
@endsection

  @section('main-contenido')
  @if (!Auth::guest() && Auth::user()->id == $profile->id)
<div class="fixed-action-btn horizontal click-to-toggle ">
    <a class="btn-floating btn-large red hide-on-med-and-up">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">local_offer</i></a></li>
      <li><a class="btn-floating yellow darken-1 modal-trigger" href="#modal_apariencia"><i class="material-icons">format_paint</i></a></li>
      <li><a class="btn-floating green modal-trigger" href="/settings"><i class="material-icons">settings</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">map</i></a></li>
    </ul>
  </div>
  @else
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
  @endif

<div id="div_container" class="container z-depth-5">


@if (!Auth::guest() && Auth::user()->id == $profile->id)
<panel-body :name="profile.name" :appearance="appearance" btn="true">
</panel-body>
 @include('frontend.profile.editbg')
@else
<panel-body name="{{$profile->name}}" :appearance="appearance">
</panel-body>
@endif


<panel-prefooter
color1="white"
:profile="profile"
icon_address="{{asset('icons/svg/target.svg')}}"
icon_phone="{{asset('icons/svg/smartphone.svg')}}"
icon_category="{{asset('icons/svg/briefcase.svg')}}"
icon_web="{{asset('icons/svg/earth-globe.svg')}}"
icon_fb="{{asset('icons/social/svg/facebook.svg')}}"
icon_ins="{{asset('icons/social/svg/instagram.svg')}}"
icon_tw="{{asset('icons/social/svg/twitter.svg')}}">
</panel-prefooter>



@include('frontend.profile.footer') 

@include('frontend.profile.pager')

@include('frontend.profile.modals')

  </div>

  @include('footer')
 <!--  <script src="{{asset('js/ViewProfile.js')}}"></script> -->
 <script src="{{asset('js/viewprofile.js')}}"></script> 
  @endsection