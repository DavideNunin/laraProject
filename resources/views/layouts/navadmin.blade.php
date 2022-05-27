<nav class="navbar navbar-expand-lg">
    <div class="container">
    <a class="navbar-brand" href="{{ route('homeadmin') }}">Techweb</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item link-navbar-item">
          <a href="{{ route('stats') }}" class="link-navbar"> Offerte & Stats </a>
        </li>
        <li class="nav-item link-navbar-item">
          <!--  route('faqmanager')  -->
            <a href="{{route('faqmanager')}}" class="link-navbar"> FaQ </a>
        </li>
        <li class="nav-item link-navbar-item">
          <a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li> 
      </ul>
    </div>
    </div>
  </nav>
  
  <!-- NAVBAR UTENTE DI TIPO 4 (ADMIN) -->