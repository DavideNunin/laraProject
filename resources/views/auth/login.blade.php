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
  {{ Form::open(array('route' => 'login', 'id' => 'form-login', 'class' => 'login-form')) }}
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="form-outline mb-4">
        {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
        {{ Form::text('username', '', ['class' => 'form-control', 'id' => 'username']) }}
        @if ($errors->first('username'))
        <ul class="errors">
            @foreach ($errors->get('username') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>

    <!-- Password input -->
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="form-outline mb-4">
          {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
          {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
          @if ($errors->first('password'))
          <ul class="errors">
              @foreach ($errors->get('password') as $message)
              <li>{{ $message }}</li>
              @endforeach
          </ul>
          @endif
        </div>
      </div>   
    </div>
   
  <!-- Submit button -->
    <div class ="row justify-content-center">
        <div class="col-lg-5 register-button text-center">
            {{ Form::submit('Login', ['class' => 'login-button mb-4']) }}
        </div>
    </div>
    {{ Form::close() }}


  <!-- Register buttons -->
  <div class="text-center">
    <p>Non sei registrato? <a href="{{ route('register')}}" class="link-website">Registrati</a></p>
  </div>
</div>

@endsection
