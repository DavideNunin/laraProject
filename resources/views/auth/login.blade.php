@extends('layouts.signin')
@section('title', 'Login')
<!-- inizio sezione prodotti -->
@section('content')
<!-- Username input -->

  <!-- Email input -->
<div class="container">
  <div class="text-center">
    <h3>LOGIN </h3>
  </div>
</div>
<div>
<form>
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="form-outline mb-4">
      <label class="form-label" for="form2Example1" >Username</label>
        <input type="email" id="form2Example1" placeholder="inserisci il tuo username" class="form-control" />
      </div>
    </div>
  </div>

    <!-- Password input -->
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
          <input type="password" id="form2Example2" class="form-control" placeholder="inserisci la tua password"/>
        </div>
      </div>
    </div>

  <!-- Submit button -->
  <div class ="row justify-content-center">
    <div class="col-lg-5 register-button text-center">
        <button type="button" class="login-button mb-4" >Accedi</button>
    </div>
</div>


  <!-- Register buttons -->
  <div class="text-center">
    <p>Non sei registrato? <a href="{{ route('register')}}" class="link-website">Registrati</a></p>
  </div>
  </div>
</form>
<a class="btn btn-primary btn-block mb-6" href="{{ route('homelocatore')}}">slkfdsfksdlk</a>
</div>
</div>





@endsection

