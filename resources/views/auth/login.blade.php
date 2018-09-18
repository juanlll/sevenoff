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

<div class="container" id="conta">
<br>
<br>
<br>



<div class="card-panel"  id="triangle-topleft" >
  <center><h3 id="h3" class="white-text">SevenOff.com</h3></center>

    <form   class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" style="color: white;">Correo electronico</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label" style="color: white;">Contraseña</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div  class="form-group">
            <div class="col-md-6 col-md-offset-4">
                 <p>
  <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" name="remember" {{ old('remember') ? 'checked' : '' }}/>
  <label for="filled-in-box" class="white-text">Recuerdame</label>
</p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn green">
                   Entrar
                </button>
<br>
                <a  href="{{ route('password.request') }}">
                   ¿Olvidaste tu contraseña?
                </a>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
