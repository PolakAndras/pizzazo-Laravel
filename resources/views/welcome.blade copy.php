<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pajtesz pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css"
        integrity="sha512-ApSLB1Pd3/bZN8fWB/RG9YhN/7bd9Hkf3AGaE2mPfebjrxagjuBtx2GcgdqIlJkUzwylBo61r9Xa9NmgBI0swA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color:#E6DCC0">
    {{-- Navbar --}}
    @include('includes.navbar')

    {{-- Logo --}}
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/pictures/logo2.jpg" class="d-block w-100"
                    style="height: 500px; object-fit: cover; object-position: center 75%;" alt="Háttérkép">
            </div>
        </div>
    </div>
    {{-- Logo vége --}}


    {{-- Termékek felsorolása sor --}}

    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col py-3">
                <ul class="d-flex justify-content-center list-unstyled m-0" style="gap: 50px;">
                    <li><a href="" class="text-dark text-decoration-none fw-bold">Pizzák</a></li>
                    <li><a href="" class="text-dark text-decoration-none fw-bold">Gyrosok</a></li>
                    <li><a href="" class="text-dark text-decoration-none fw-bold">Hot-Dog</a></li>
                    <li><a href="" class="text-dark text-decoration-none fw-bold">Saláta</a></li>
                    <li><a href="" class="text-dark text-decoration-none fw-bold">Hamburger</a></li>
                    <li><a href="" class="text-dark text-decoration-none fw-bold">Üdítő</a></li>
                    <li><a href="" class="text-dark text-decoration-none fw-bold">Jégkrém</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Termékek felsorolása sor vége --}}

{{-- kategóriák és termékek kiiratása --}}
{{-- @foreach ($categories as $category)
    <ul>
        <li>{{$category->name}}</li>
            <ol>
                @foreach ($category->products as $product)
                              <li>{{$product->name . " - " . $product->price }}</li>
                @endforeach
            </ol>
    </ul> 
@endforeach --}}





    {{-- Termékek kártyák --}}
    <div class="container-fluid my-5" style="padding-left: 18rem; padding-right: 18rem;">
        <div class="row g-3">

            <!-- Termékek -->
            <div class="col-md-8">
                @foreach ($categories as $category)
                <div class="bg-white rounded p-3">
                    <h5 class="text-center mb-3">{{ $category->name }}</h5>


                    <div class="row g-3">
                         @foreach ($category->products as $product)
                        <!-- termék 1 -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center p-2">
                                    <img src=""
                                        style="width:80px; height:80px; object-fit:cover;" class="rounded">
                                    <div class="ms-3">
                                        
                                        <h6 class="mb-1">{{ $product->name }}</h6>
                                        <p class="mb-1">{{ $product->description }}</p>
                                        <p class="mb-0">{{ $product->price }}</p>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                          @endforeach
                    </div>
                </div>
                @endforeach
            </div>


                      
                            {{-- Termékek vége  --}}

            <!-- Kosár -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="py-2">Rendelésed</h2>
                        <h5 class="text-center pt-3">
                            A kosarad még üres
                        </h5>
                        <hr class="py-1" />
                        <p>Szállítási díj:</p>
                        <h5 class="pb-4">Végösszeg: </h5>

                        <button class="btn btn-warning w-100" type="button">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Rendelés leadása
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
                {{-- Kosár vége --}}
                {{-- Termékek kártyák vége --}}
    @include('includes.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
