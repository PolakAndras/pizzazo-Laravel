<nav class="navbar navbar-dark bg-dark py-2">
    <!-- Mobilon egymás alá (flex-column), asztali gépen egymás mellé (flex-md-row) ugranak a blokkok -->
    <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <span class="text-white ms-2 text-center h4 user-select-none mx-2 d-block d-md-none">Pajtesz Pizza</span>

        <!-- JAVÍTVA: ms-md-auto osztály hozzáadva. Ez asztali gépen teljesen jobbra tolja az egész blokkot -->
        <div class="d-flex flex-column flex-md-row align-items-center gap-2 gap-md-0 ms-md-auto">
          
            @auth
                <!-- profil -->
                <a href="{{ route('profile') }}"><button class="btn btn-light">{{Auth::user()->name}}</button></a>
             
                <!-- kilépés -->
                <form action="{{ route('logout-post') }}" method="POST" class="d-flex gap-1 me-2">
                    @csrf
                    <button type="submit" class="btn btn-dark">Kijelentkezés</button>
                </form>
          
            @else

                <!-- Mobilon az inputok egymás alá kerülnek (flex-column), PC-n egymás mellé az eredeti kompakt méretükben (flex-md-row) -->
                <form action="{{ route('login-post') }}" method="POST" class="d-flex flex-column flex-md-row gap-2 gap-md-1 m-0 align-items-center text-center">
                    @csrf
                    <!-- A w-auto és max-width megvédi az asztali méretet, a text-center és mx-auto pedig középre teszi mobilon -->
                    <input type="email" class="form-control w-auto text-center text-md-start mx-auto mx-md-0" style="max-width: 280px;" name="email" placeholder="Email">
                    <input type="password" class="form-control w-auto text-center text-md-start mx-auto mx-md-0" style="max-width: 280px;" name="password" placeholder="Jelszó">
                    <button type="submit" class="btn btn-dark w-100 w-md-auto">Bejelentkezés</button>
                </form>

                <button class="btn btn-dark w-100 w-md-auto">
                    <a href="{{route('register')}}" class="text-white text-decoration-none">Regisztráció</a>
                </button>  
            @endauth {{-- JAVÍTVA: A záró @endauth a megfelelő helyre került --}}
        </div>
    </div>
</nav>
      

     {{-- Aktivvá jelölés --}}
{{-- {{ Route::currentRouteName() == 'register' ? 'active' : '' }}" --}}

    {{-- ---------------------------------------- --}}

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">

    <!-- Kivettem az összecsukó collapse osztályt, helyette reszponzív flexbox (flex-column flex-lg-row) irányítja a sávot -->
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center w-100 row-gap-3" id="navbarSupportedContent">
        
        <!-- col-lg: asztali gépen visszaáll az eredeti col szélességre, mobilon teljes szélességű (col-12) -->
        <div class="col-12 col-lg text-center text-lg-start">
                  <!-- A linkek mobilon egymás alá (flex-column), PC-n egymás mellé (flex-md-row) kerülnek -->
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-column flex-md-row gap-2 gap-md-0 justify-content-center justify-content-lg-start">
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" aria-current="page" href="{{route('index')}}">Rendelés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">Korábbi rendeléseim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('checkout-view') }}">Kosár</a>
        </li>
      </ul>
        </div>

        <!-- col-lg: asztali gépen középső oszlop, order-first osztály miatt mobilon legfelülre ugrik a cím -->
        <div class="col-12 col-lg text-center order-first order-lg-0">
            <h1 class="text-center h4 user-select-none m-0 d-none d-md-block">
                {{ Route::currentRouteName() == 'profile' ? 'Pajtesz pizza profilom' : 'Pajtesz pizza' }}
            </h1>
        </div>
  
      
        <div class="col-12 col-lg d-flex flex-column flex-lg-row-reverse align-items-center justify-content-center justify-content-lg-end gap-2">
  

        @if (!Request::routeIs('register') && !Request::routeIs('profile') && !Request::routeIs('checkout-view')) 
                <a href="{{ route('checkout-view') }}" class="text-decoration-none d-block d-md-none w-100">
                    <button type="button" class="btn btn-warning ms-auto w-100 m-0">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <b>0 Ft</b> 
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </button>
                </a>
            @endif

              <!-- Az üzenetek a gomb alá kerültek, így mobilon alatta lesznek, PC-n viszont a flex-lg-row-reverse miatt a gomb elé ugranak -->
              @if (session('error'))
                  <p class="text-danger mb-0 text-center text-lg-end">
                      {{ session('error') }}
                  </p>
              @endif
              @if (session('success'))
                  <p class="text-success mb-0 text-center text-lg-end">
                      {{ session('success') }}
                  </p>
              @endif

            </div>  

    </div>
  </div>
</nav>
