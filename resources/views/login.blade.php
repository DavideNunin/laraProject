@extends('layouts.signin')

@section('title', 'Login')

<!-- inizio sezione prodotti -->
@section('content')
<!-- Username input -->

  <!-- Email input -->
<div class= row>  
<div class="container">
  <div class="text-center">
    <h3>LOGIN </h3>
  </div>
</div>
<form>
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example1" >Username</label>
    <input type="email" id="form2Example1" placeholder="inserisci il tuo username" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example2">Password</label>
    <input type="password" id="form2Example2" class="form-control" placeholder="inserisci la tua password"/>
  </div>

  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-6">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Non sei registrato? <a href="{{ route('register')}}">Registrati</a></p>
  </div>
  </div>
</form>
</div>





@endsection

