@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p>Cookie guardada por tener el rol 1: {{ request()->cookie('origin_sesion') ?? 'N/a' }}</p>
                        <p>ID del rol: {{ auth()->user()->role[0]->id }}</p>
                        <p>IP: {{ Request::ip() }}</p>
                        
                    {{ __('You are logged in!') }}
                    <hr>
                    <form action="/user/two-factor-authentication" method="POST">
                        @csrf
                        @if (auth()->user()->two_factor_secret)
                            @method('DELETE')
                            <strong>2FA está Activo</strong><br>
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            <button class="btn btn-danger">Desactivar</button>
                        @else
                            No está activa la autenticación de 2FA
                            <br>
                            <button class="btn btn-primary">Activar</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
