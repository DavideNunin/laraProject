@extends('layouts.signin')

@section('title', 'Login')

<!-- inizio sezione prodotti -->
@section('content')
<!-- Username input -->
<form action="">
<div class="row justify-content-center">
<h1 class="login-title"> LOGIN </h1>
    <div class="col-lg-12 d-flex justify-content-center m-2">
            <label for="username" class="form-label"> Username </label>
            <input type="username" id="username" placeholder="inserisci il tuo username" require>
    </div>
  <!-- Password input -->
  <div class="col-lg-12 d-flex justify-content-center m-2">
            <label for="password" class="form-label"> Password </label>
            <input type="password" id="password" placeholder="inserisci la tua password" require>
    </div>
  <!-- Submit button -->
  <div class="col-lg-12 ">
  <button type="button" class="btn d-flex justify-content-center login-button btn-primary btn-block m-3" >Login</button>
</div>
<div class="col-lg-12 ">
    <h7 class ="Link-registrati"><a href="{{ route('register') }}">Non sei registrato?</a></h7>
</div>
</div>
</form>
</div>





@endsection

