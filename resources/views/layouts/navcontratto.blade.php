<nav class="navbar navbar-expand-lg">
    <div class="container">
    <a class="navbar-brand" href="{{ url()->previous() }}"><i class="fa-solid fa-circle-arrow-left"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item link-navbar-item">
          <a href="{{ route('homeadmin') }}" class="link-navbar button-navbar"> <i class="fa-solid fa-house"></i> </a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  
  <!-- NAVBAR CONTRATTO -->