@extends('site.layouts.app')

@section('content-site')
<div class="container">
    <div class="col-lg-6 col-lg-offset-6 container">
        <h1 class="title">Resetar senha</h1>
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Endereço de e-mail</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="E-mail" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Senha" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Resetar senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
