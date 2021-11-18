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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
