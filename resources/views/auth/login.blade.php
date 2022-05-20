@extends('layouts.signin')
@section('title', 'Login')
<!-- inizio sezione prodotti -->
@section('content')
<!-- Username input -->

  <!-- Email input -->
<div class="container">
  <div class="text-center mt-3">
    <h3>LOGIN </h3>
  </div>
</div>
<div>
<!-- Form::open(array('route' => 'newproduct.store', 'id' => 'addproduct', 'files' => true, 'class' => 'contact-form')) }} -->
  {{ Form::open(array('id' => 'form-login', 'class' => 'login-form')) }}
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="form-outline mb-4">
        {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
        {{ Form::text('username', '', ['class' => 'form-control', 'id' => 'username']) }}
      <!--<label class="form-label" for="form2Example1" >Username</label>
        <input type="email" id="form2Example1" placeholder="inserisci il tuo username" class="form-control" />-->
      </div>
    </div>
  </div>

    <!-- Password input -->
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="form-outline mb-4">
          {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
          {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
        <!--<label class="form-label" for="form2Example2">Password</label>
          <input type="password" id="form2Example2" class="form-control" placeholder="inserisci la tua password"/>-->
        </div>
      </div>   
    </div>
    {{ Form::close() }}
  <!-- Submit button -->
  <div class ="row justify-content-center">
    <div class="col-lg-5 register-button text-center">
        <a type="button" class="login-button mb-4" href="{{ route('homelocatore')}}">Accedi</a>
    </div>
</div>


  <!-- Register buttons -->
  <div class="text-center">
    <p>Non sei registrato? <a href="{{ route('register')}}" class="link-website">Registrati</a></p>
  </div>
  </div>
</div>
</div>





@endsection

