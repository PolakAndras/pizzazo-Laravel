<nav class="navbar navbar-dark bg-dark py-2">
    <div class="container-fluid d-flex justify-content-between">
        <span class="text-white ms-2">HU / EN</span>

        <div class="d-flex">
          
                    

            @auth
          
          //profil
        
          
            <a href="{{ route('profile') }}"><button class="btn btn-light">{{Auth::user()->name}}</button></a>
         

          
          //kilépés
          <form action="{{ route('logout-post') }}" method="POST" class="d-flex gap-1 me-2">
            @csrf
            <button type="submit" class="btn btn-dark">Kijelentkezés</button>
          </form>
          
          @else

            <form action="{{ route('login-post') }}" method="POST" class="d-flex gap-1">
            @csrf
            <input type="email" class="form-control" name="email" placeholder="Email">
            <input type="password" class="form-control" name="password" placeholder="Jelszó">
            <button type="submit" class="btn btn-dark">Bejelentkezés</button>
          </form>

          <button class="btn btn-dark">
          <a href="{{route('register')}}" 
            class="text-white text-decoration-none"
            >Regisztráció</a>
          </button>  
        </div>
                @endauth
    </div>
</nav>
      

     {{-- Aktivvá jelölés --}}
{{-- {{ Route::currentRouteName() == 'register' ? 'active' : '' }}" --}}

    {{-- ---------------------------------------- --}}

    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('index')}}">Rendelés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile') }}">Korábbi rendeléseim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Kosár</a>
        </li>
      </ul>
        </div>

        <div class="col text-center">
            <h1 class="text-center h4">
                {{ Route::currentRouteName() == 'profile' ? 'Pajtesz pizza profilom' : 'Pajtesz pizza' }}
            </h1>
        </div>
  
      
      <div class="col d-flex align-items-center">
          @if (session('error'))
              <p class="text-danger mb-0">
                  {{ session('error') }}
              </p>
          @endif
           @if (session('success'))
              <p class="text-success mb-0">
                  {{ session('success') }}
              </p>
          @endif

          @if (!Request::routeIs('register')) 
              <button type="button" class="btn btn-warning ms-auto">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <b>0 Ft</b>
                  <i class="fa-solid fa-arrow-right-long"></i>
              </button>
          @endif
      </div>      

      {{-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> --}}
    </div>
  </div>
</nav>