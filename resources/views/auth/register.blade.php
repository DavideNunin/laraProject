@extends('layouts.signin')

@section('title', 'registration')


<!-- Inizio sezione form di registrazione-->
@section('content')
<div class="container">
    <div class= "text-center mt-3">
    <h3> REGISTRATI </h3>
</div>
{{ Form::open(array('route' => 'register', 'class' => 'registration-form')) }}
<div class="container">
    <div class ="row justify-content-center">
        <div class="col-lg-5 mb-3">
            {{ Form::label('nome', 'Nome', ['class' => 'form-label']) }}
            {{ Form::text('nome', '', ['class' => 'form-control', 'id' => 'nome']) }} 
            <ul class="errors">
                @foreach ($errors->get('nome') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>  
        </div>
        
        <div class="col-lg-5 mb-3">
            {{ Form::label('cognome', 'Cognome', ['class' => 'form-label']) }}
            {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'cognome']) }} 
            <ul class="errors">
                @foreach ($errors->get('cognome') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-5 mb-3">
            {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }} 
            <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>

        <div class="col-lg-5 mb-3">
            {{ Form::label('password-confirm', 'Conferma password', ['class' => 'form-label']) }}
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm']) }}
            <ul class="errors">
                @foreach ($errors->get('password_confirmation') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-5 mb-3">
            {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
            {{ Form::text('username', '', ['class' => 'form-control', 'id' => 'username']) }}
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-lg-5 mb-3">
            {{ Form::label('phonenumber', 'Recapito telefonico', ['class' => 'form-label']) }}
            {{ Form::text('phonenumber', '', ['class' => 'form-control', 'id' => 'phonenumber']) }}
            <ul class="errors">
                @foreach ($errors->get('phonenumber') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-10 row mb-3">
            <div class="col-lg-4">
                <label for="coajf" class="form-label">Ti vuoi iscrivere come:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('locatore', 'Locatore', ['class' => 'form-label']) }}
                    {{ Form::radio('type_user', 'Locatore', false) }}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('locatario', 'Locatario', ['class' => 'form-label']) }}
                    {{ Form::radio('type_user', 'Locatario', false) }}
                </div>
                <ul class="errors">
                    @foreach ($errors->get('type_user') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4">
                <label for="fsdfs" class="form-label">Genere:</label>
                
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('uomo', 'Uomo', ['class' => 'form-label']) }}
                    {{ Form::radio('gender', 'Uomo', false) }}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('donna', 'Donna', ['class' => 'form-label']) }}
                    {{ Form::radio('gender', 'Donna', false) }}
                </div>

                <ul class="errors">
                    @foreach ($errors->get('gender') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
            
            <div class="col-lg-4">
                
                {{ Form::label('data_nascita', 'Data Nascita', ['class' => 'form-label']) }}
                {{ Form::date('data_nascita', \Carbon\Carbon::now()) }}
                <ul class="errors">
                    @foreach ($errors->get('data_nascita') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-5 register-button text-center">
            {{ Form::submit('Registrati', ['class' => 'login-button mb-4']) }}
        </div>
    </div>
</div>
{{ Form::close() }}

@endsection