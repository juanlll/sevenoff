@extends('layouts.app')

@section('recuperar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card-panel" style="border-radius: 15px;">
                <div class="panel-heading">Recuperar contraseña</div>
                <div class="panel-body">
                    @if (session('status'))
                    <blockquote style="border-color:#42a5f5; color: #42a5f5; ">{{ session('status') }}</blockquote>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn orange">                                  
                                    Enviar contraseña Restablecer enlace
                                </button>
                            </div>
                            @if ($errors->has('email'))
                                <blockquote style="border-color:red; color: red; ">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </blockquote>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
