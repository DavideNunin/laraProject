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
        {{ Form::open(array('route' => 'myprofile', 'class' => 'modify-form')) }}
<div class="container">
    <div class="row">
        <div class="col-lg-4 ">
        {{ Form::label('nome', 'Nome', ['class' => 'form-label']) }}
        {{ Form::text('nome',"" ,['class' => 'form-control', 'id' => 'nome-input','placeholder' => $user_info->nome, 'disabled' => '']) }} 
        </div>
        <div class="col-lg-4 ">
        {{ Form::label('cognome', 'Cognome', ['class' => 'form-label']) }}
        {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'cognome-input','placeholder' => $user_info->cognome, 'disabled' => '']) }} 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        {{ Form::label('data di nascita', 'Data di nascita', ['class' => 'form-label']) }}
        {{ Form::text('data di nascita', '', ['class' => 'form-control', 'id' => 'datadinascita-input','placeholder' => $user_info->data_nascita, 'disabled' => '']) }} 
        </div>
        <div class="col-lg-4 ">
        {{ Form::label('sesso', 'Sesso', ['class' => 'form-label']) }}
            <div class="row">
                <div class="col-lg-4">
                    <div class="custom-control custom-radio custom-control-inline">

                    Maschio
                    {{ Form::radio('gender', 'maschio', ['class' => 'form-control', 'id' => 'button-maschio', 'disabled' => '']) }}  

</div>
                    <div class="custom-control custom-radio custom-control-inline">

                    Femmina
                    {{ Form::radio('gender', 'femmina', ['class' => 'form-control', 'id' => 'button-femmina', 'disabled' => '']) }}        
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
        {{ Form::text('telefono', '', ['class' => 'form-control', 'id' => 'telefono-input','placeholder' => $user_info->telefono , 'disabled' => '']) }} 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 ">
        {{ Form::label('username', 'Username', ['class' => 'form-lbel']) }}
        {{ Form::text('username', '', ['class' => 'form-control', 'id' => 'username','placeholder' => $user_info->nome, 'disabled' => '']) }} 
        </div>



    <div class="row">
        <div class="col-lg-4 ">
        {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
        {{ Form::text('password', '', ['class' => 'form-control', 'id' => 'password-input', 'disabled' => '']) }} 
        </div>
        <div class="col-lg-4 ">
        {{ Form::label('conferma-password', 'Conferma Password', ['class' => 'form-label']) }}
        {{ Form::text('conferma-password', '', ['class' => 'form-control', 'id' => 'conferma-password-input', 'disabled' => '']) }} 
    </div>
</div>
<div class="row">
<br>
</div>




    </div>
</div>

@endsection
