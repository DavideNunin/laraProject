@extends('layouts/public')

@section('content')

<div class="container">
  <div class="jumbotron">
    <h1>Il tuo Profilo</h1>
    <p>Qui puoi modificare e visualizzare le informazioni riguardanti il tuo profilo utente</p>
  </div>
  <p>This is some text.</p>
  <p>This is another text.</p>
</div>
        {{ Form::open(array('route' => 'modify_user_data', 'class' => 'modify-form')) }}
<div class="container">
    <div class="row">
        <div class="col-lg-4 ">
        {{ Form::label('nome', 'Nome', ['class' => 'form-label']) }}
        {{ Form::text('nome',isset($user_info->nome) ? $user_info->nome : '' ,['class' => 'form-control', 'id' => 'nome' ]) }} 
        @if ($errors->first('nome'))
         <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                    </ul>
        @endif
        </div>
        <div class="col-lg-4 ">
        {{ Form::label('cognome', 'Cognome', ['class' => 'form-label']) }}
        {{ Form::text('cognome', isset($user_info->cognome) ? $user_info->cognome : '' , ['class' => 'form-control', 'id' => 'cognome']) }} 
        @if ($errors->first('cognome'))
         <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                    </ul>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        {{ Form::label('data di nascita', 'Data di nascita', ['class' => 'form-label']) }}
        {{ Form::text('data_nascita' , isset($user_info->data_nascita) ? $user_info->data_nascita : '' , ['class' => 'form-control', 'id' => 'data_nascita']) }} 
        @if ($errors->first('data_nascita'))
         <ul class="errors">
                    @foreach ($errors->get('data_nascita') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                    </ul>
        @endif
        </div>
        <div class="col-lg-4 ">
        {{ Form::label('gender', 'Sesso', ['class' => 'form-label']) }}
            <div class="row">
                <div class="col-lg-4">
                    <div class="custom-control custom-radio custom-control-inline">

                    Maschio
                    {{ Form::radio('gender', 'maschio', ['class' => 'form-control', 'id' => 'button-maschio']) }}  

</div>
                    <div class="custom-control custom-radio custom-control-inline">

                    Femmina
                    {{ Form::radio('gender', 'femmina', ['class' => 'form-control', 'id' => 'button-femmina']) }}        
</div>
            </div>
<div class="row">
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 ">
        {{ Form::label('telefono', 'Numero di telefono', ['class' => 'form-label']) }}
        {{ Form::text('telefono', isset($user_info->telefono) ? $user_info->telefono : '' , ['class' => 'form-control', 'id' => 'telefono-input' ]) }} 
        @if ($errors->first('telefono'))
         <ul class="errors">
                    @foreach ($errors->get('telefono') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                    </ul>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 ">
        {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
        {{ Form::text('username', isset($user_info->username) ? $user_info->username : '', ['class' => 'form-control', 'id' => 'username']) }} 
        @if ($errors->first('username'))
         <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                    </ul>
        @endif
        </div>



    <div class="row">
        <div class="col-lg-4 ">
        {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
        {{ Form::password('password' , ['class' => 'form-control', 'id' => 'password']) }} 
        @if ($errors->first('password'))
         <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                    </ul>
        @endif
        </div>
        <div class="col-lg-4 ">
        {{ Form::label('conferma_password', 'Conferma Password', ['class' => 'form-label']) }}
        {{ Form::password('conferma_password', ['class' => 'form-control', 'id' => 'conferma_password']) }} 
        @if ($errors->first('conferma_password'))
         <ul class="errors">
                    @foreach ($errors->get('conferma_password') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                    </ul>
        @endif
    </div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
                {{ Form::submit('Conferma', ['class' => 'form-label', 'onclick' => "return confirm('sei sicuroooooooooooooo????')"]) }}
    </div>
    <div class="col-lg-4"></div>
</div>
</div>
<div class="row">
<br>
</div>




    </div>
</div>

@endsection
