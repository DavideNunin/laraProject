  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand" href="{{ route('homeUser1') }}">Techweb</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
            <a href="{{ route('login') }}" class="link-navbar">Accedi </a></li>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Registrati</a>
        </li> -->
      </ul>
    </div>
    </div>
  </nav>
  
  <!-- NAVBAR UTENTE DI TIPO 0 (PUBBLICO) -->