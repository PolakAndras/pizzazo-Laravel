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



    {{-- Termékek felsorolása sor vége --}}


{{-- TODO: formba rakni hogy változzonn az ár  --}} 
    {{-- Termékek kártyák --}}
    <div class="container-fluid my-5" style="padding-left: 18rem; padding-right: 18rem;">
        <div class="row g-3">

            <!-- Termékek -->
            <div class="col-md-8">
                <div class="bg-white rounded p-3 ">
                    <div class="mx-3">
                        <div class="d-flex justify-content-between">
                            {{-- TODO Itt majd az árat meg kell csinálni mutatorba mert így csak simán kivonom --}}
                            <h4>{{ $product->name }}</h4>
                            <h4>{{ $product->formatted_price }} </h4>

                        </div>
                        <i>{{ $product->description }}</i>
                        <br>

                        <div class="btn-group my-2" role="group">
                            <!-- 1. gomb (Alapértelmezett: checked) -->

                            @if ($product->options !== null)

                                @foreach (json_decode($product->options, true) as $jsonOptions => $options)
                                    @if ($jsonOptions === 'sizes')
                                        @foreach ($options as $size => $sizePrice)
                                            <input type="radio" class="btn-check" name="pizza_size"
                                                id="size-{{ $size }}" value="{{ $size }}"
                                                {{ $size === 'normal' ? 'checked' : '' }}>
                                            {{-- TODO: Ezt valahogy kiváltani a  --}}
                                            <label class="btn btn-outline-warning text-dark fw-bold"
                                                for="size-{{ $size }}">
                                                @switch($size)
                                                    @case('kicsi')
                                                        Kicsi
                                                        <hr> {{ formattedPrice($sizePrice) }}
                                                    @break

                                                    @case('normal')
                                                        Normál
                                                        <hr> {{ formattedPrice($sizePrice) }}
                                                    @break

                                                    @case('csaladi')
                                                        Családi
                                                        <hr> +{{ formattedPrice($sizePrice) }}
                                                    @break

                                                    @case('party')
                                                        Party
                                                        <hr> +{{ formattedPrice($sizePrice) }}
                                                    @break
                                                @endswitch
                                            </label>
                                        @endforeach
                                    @endif
                                @endforeach

                            @endif


                        </div>
                        <hr>
                        <p class="h5">Extra feltétek</p>
                        <small>Minimum: 0 - Maximum: 10 választható</small>
                        <hr>
                        {{-- Csempék --}}

                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-2">

                            @foreach (json_decode($product->options, true) as $jsonOptions => $extras)
                                @if ($jsonOptions === 'extras')
                                    @foreach ($extras as $extra => $extraPrice)
                                        <div class="col">
                                            <div class="border rounded p-2 bg-light">
                                                <div class="d-flex justify-content-evenly align-items-center">
                                                    <label for="topping-1"
                                                        class="form-label fw-bold cursor-pointer small">
                                                        {{ $extra }}
                                                    </label>

                                                    <small class="text-muted" style="font-size: 0.75rem;">
                                                        {{ formattedPrice($extraPrice) }}
                                                    </small>

                                                    <input type="checkbox" class="form-check-input position-static"
                                                        id="topping-1"
                                                        style="cursor: pointer; width: 1.15rem; height: 1.15rem;">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach

                        </div>

                        {{-- csempék vége --}}

                        {{-- Megjegyzés --}}
                        <label for="note"
                            class="form-label fw-bold cursor-pointer small text-secondary mt-3">Megjegyzés</label>
                        <input class="form-control form-control-lg mb-3" id="note" type="text"
                            aria-label="note">
                        {{-- Megjegyzés vége --}}

                        {{-- Mennyiség --}}
                        <div class="d-flex justify-content-end gap-3 mb-4">

                            <div class="input-group" style="width: 130px;">
                                <button type="button" class="btn btn-outline-secondary bg-warning minus">
                                    <i class="fa-solid fa-minus"></i>
                                </button>

                                <input type="text" class="form-control text-center fw-semibold jsQuantity" value="1"
                                    readonly>

                                <button type="button" class="btn btn-outline-secondary bg-warning plus">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>

                            <button class="btn btn-warning " type="button">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Rendelés leadása
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                        </div>
                        {{-- Mennyiség vége --}}





                    </div>
                    <div class="row g-3">
                    </div>
                </div>
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
    
<script>
    const minusButton = document.querySelector(".minus");
    const plusButton = document.querySelector(".plus");
    const quantityInput = document.querySelector(".jsQuantity");

    plusButton.onclick = () => {
        quantityInput.value++;
    };

    minusButton.onclick = () =>  {
        if (quantityInput.value > 1) {
            quantityInput.value--;
        }
    };
</script>
    

</body>

</html>
