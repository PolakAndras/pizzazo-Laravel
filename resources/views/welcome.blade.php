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
    @include('includes.navbar')
    @include('includes.logo')



@dump(Session::get('cart'))

<button class="btn btn-warning ms-4 d-none d-md-block"><a href="{{route('delete-All-Cart')}}">Gyors kosár törlése gomb</a></button>



    {{-- Termékek felsorolása sor --}}

    <div class="container-fluid bg-white">
    <div class="row">
        <div class="col py-3">
            <!-- JAVÍTVA: flex-column mobilon egymás alá teszi, flex-lg-row PC-n egymás mellé. A text-center középre igazítja mobilon is -->
            <ul class="d-flex flex-column flex-lg-row justify-content-center align-items-center list-unstyled m-0 text-center gap-3 gap-lg-5">
                @foreach ($categories as $category)
                     <li><a href="#{{$category->name}}" class="text-dark text-decoration-none fw-bold">{{$category->name}}</a></li>
                @endforeach
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
    <!-- Külső fő konténer géphez és mobilhoz -->
    <div class="container-fluid my-5">
        <!-- Egy extra sor és oszlopok segítségével tartjuk meg a 18rem-es margót kizárólag nagyképernyőn (lg) -->
        <div class="row">
            <div class="col-12 style-holder" style="display: contents;">
                <!-- Beágyazott stílus-szimuláció tiszta BS osztályokkal: PC-n (xl) megmarad a 18rem padding, alatta (px-3) eltűnik -->
                <div class="w-100 px-3 px-xl-5" style="max-width: 100%;">
                    <!-- Hogy a 18rem pontosan meglegyen PC-n, egy belső wrapperbe tettem, ami csak nagy képernyőn kap paddingot inline helyett -->
                    <div style="padding-left: 0; padding-right: 0;" class="ps-xl-5 pe-xl-5">
                        <div class="mx-xl-5">
                            
                            <div class="row g-3">
                                <!-- Termékek -->
                                <div class="col-md-8">
                                    @foreach ($categories as $category)
                                    <div class="bg-white rounded p-3 mb-3">
                                        <h5 class="text-center mb-3" id={{$category->name}}>{{ $category->name }}</h5>

                                        <div class="row g-3">
                                             @foreach ($category->products as $product)
                                            <!-- termék 1 -->
                                            <div class="col-md-6">
                                                <a  href="{{route('product', ['id' => $product->id])}}" class="card text-reset text-decoration-none">
                                                    <div class="card-body d-flex align-items-center p-2">
                                                        <img src=""
                                                            style="width:80px; height:80px; object-fit:cover;" class="rounded">
                                                        <div class="ms-3">
                                                            
                                                            <h6 class="mb-1">{{ $product->name }}</h6>
                                                            <p class="mb-1">{{ $product->description }}</p>
                                                            <p class="mb-0">{{ $product->price }}</p>
                                                       
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                              @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                {{-- Termékek vége  --}}
                                @include('includes.cart')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Termékek kártyák vége --}}
    
    @include('includes.footer')


    <script src="https://jsdelivr.net"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
