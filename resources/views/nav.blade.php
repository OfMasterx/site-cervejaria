<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Cervejaria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('styles.*') ? 'active' : '' }}" href="{{ route('styles.list') }}">Estilos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#produtos">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#eventos">Eventos</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link position-relative" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
            <i class="bi bi-cart3"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-count">
              0
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
