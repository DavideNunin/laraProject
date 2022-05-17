<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand" href="{{ route('homelocatore') }}">Techweb</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item button-navbar">
            <a href="{{ route('offerte') }}" class="link-navbar">Le tue offerte </a>
        </li>
        <li class="nav-item link-navbar-item">
            <a href="{{ route('homeUser1') }}" class="navbar-icon">  <i class="fa-solid fa-arrow-right-from-bracket"></i> </a></li>
        </li> 
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Registrati</a>
        </li> -->
      </ul>
    </div>
    </div>
  </nav>
  
  <!-- NAVBAR UTENTE DI TIPO 0 (PUBBLICO) -->