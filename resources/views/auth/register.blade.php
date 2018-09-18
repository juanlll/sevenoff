@extends('layouts.app')

@section('recuperar')
<style type="text/css">
  body {
background: rgba(123,150,239,1);
background: -moz-linear-gradient(left, rgba(123,150,239,1) 0%, rgba(25,63,230,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(123,150,239,1)), color-stop(100%, rgba(25,63,230,1)));
background: -webkit-linear-gradient(left, rgba(123,150,239,1) 0%, rgba(25,63,230,1) 100%);
background: -o-linear-gradient(left, rgba(123,150,239,1) 0%, rgba(25,63,230,1) 100%);
background: -ms-linear-gradient(left, rgba(123,150,239,1) 0%, rgba(25,63,230,1) 100%);
background: linear-gradient(to right, rgba(123,150,239,1) 0%, rgba(25,63,230,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7b96ef', endColorstr='#193fe6', GradientType=1 );
}



</style>
<br>
<br>
<div class="card-panel"  id="triangle-topleft" >

<form  method="POST" action="{{ route('register') }}" style=" padding: 0px; ">
{{ csrf_field() }}
<div class="row center">

<div class="col m4 l4 s12">
<label class="white-text" for="name">Nombre</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    @if ($errors->has('name'))
        <span class="red-text">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="col l4 m4 s12">
    <label class="white-text" for="email" >Correo electronico</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    @if ($errors->has('email'))
        <span class="red-text">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>


<div class="col l4 m4 s12">
    <label class="white-text" for="password">Password</label>
    <input id="password" type="password" name="password" required>
    @if ($errors->has('password'))
        <span class="red-text">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="col m4 l4 s12">
    <label class="white-text" for="password-confirm">Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation" required>
</div>



<div class="col m4 l4 s12">
    <button type="submit" class="btn btn-primary">
        Register
    </button>
</div>
</div>
</form>
</div>


@endsection

<!-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> -->