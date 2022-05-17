@extends('layouts.signin')

@section('title', 'registration')


<!-- Inizio sezione form di registrazione-->
@section('content')
<div class="container">
    <div class= "text-center mt-3">
    <h3> REGISTRATI </h3>
</div>
<form action="">
    <div class="container">
    <div class ="row justify-content-center">
        <div class="col-lg-5 mb-3">
        <label for="nome" class="form-label"> Nome:</label>
        <input type="nome" id="nome" placeholder="Inserisci il tuo nome" class="form-control" require>
        </div>
        
        <div class="col-lg-5 mb-3">
        <label for="cognome" class="form-label"> Cognome:</label>
        <input type="cognome" id="cognome" placeholder="Inserisci il tuo cognome" class="form-control" require>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-5 mb-3">
        <label for="cognome" class="form-label"> Password:</label>
        <input type="password" id="password" placeholder="Inserisci la tua password" class="form-control" require>
        </div>

        <div class="col-lg-5 mb-3">
        <label for="cognome" class="form-label"> Conferma Password:</label>
        <input type="cPassword" id="cPassword" placeholder="Conferma la tua password" class="form-control" require>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-5 mb-3">
        <label for="cognome" class="form-label"> Username:</label>
        <input type="cognome" id="cognome" placeholder="Inserisci il tuo username" class="form-control" require>
        <small id="usernameHelp" class="form-text text-muted"> Il tuo username è unico, sceglilo con cura </small>
        </div>

        <div class="col-lg-5 mb-3">
        <label for="cognome" class="form-label"> Recapito telefonico:</label>
        <input type="phonenumber" id="phone" placeholder="Inserisci il tuo telefono" class="form-control" require>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-10 row mb-3">
            <div class="col-lg-4">
                <label for="coajf" class="form-label">Ti vuoi iscrivere come:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline1" name="tipo">
                    <label class="custom-control-label" for="defaultInline1">Locatore</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline2" name="tipo">
                    <label class="custom-control-label" for="defaultInline1">Locatario</label>
                </div>
        
            </div>

            <div class="col-lg-4">
                <label for="fsdfs" class="form-label">Genere:</label>
                
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genereline1" name="genere">
                    <label class="custom-control-label" for="defaultInline1">Uomo</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genereline2" name="genere">
                    <label class="custom-control-label" for="defaultInline1">Donna</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genereline3" name="genere">
                    <label class="custom-control-label" for="defaultInline1">Altro</label>
                </div>
            </div>

            
            <div class="col-lg-4">
                <label for="cognome" class="form-label"> Data di Nascita:</label>
                <input type="date" id="date" placeholder="Inserisci la tua data di nascita" class="form-control" require>
            </div>
        </div>
    </div>

    <div class ="row justify-content-center">
        <div class="col-lg-5 register-button text-center">
            <button type="button" class="login-button mb-4" >Registrati</button>
        </div>
    </div>
</div>
</form>

@endsection