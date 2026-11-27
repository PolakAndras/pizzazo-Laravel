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

    <div class="container mb-5">
        <h1 class="h3 mb-4 fw-bold text-secondary text-center my-4">Rendelés véglegesítése</h1>
        @dump(Session::get('datas'))
        @dump(Session::get('cart'))
        @dump(Session::get('shippingPrice'))


        <form action="{{route('checkout-post')}}" method="POST" class="row g-4">
            @csrf

            <!-- BAL OLDAL: Adatok és Űrlapok -->
            <div class="col-lg-8">
                
                <!-- 1. Átvétel módja -->
                <div class="card p-4 mb-3">
                    <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-truck me-2"></i>Átvétel módja</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="radio" class="btn-check" name="deliveryMethod" id="methodDelivery" checked   value="házhoz szallítás">
                            <label class="btn btn-outline-secondary w-100 p-3 " for="methodDelivery">
                                <span class="d-block fw-bold">Házhozszállítást kérek</span>
                                <small class="text-warning">Az ételt a megadott címre szállítjuk ki.</small>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" class="btn-check" name="deliveryMethod" id="methodTakeaway"  value="személyesen" >
                            <label class="btn btn-outline-secondary w-100 p-3 " for="methodTakeaway">
                                <span class="d-block fw-bold">Személyesen veszem át</span>
                                <small class="text-warning">Én megyek érte az étterembe.</small>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-3">
                    <small class="text-secondary">A házhozszállítás Nagykálló, Biri, Balkány, Nagyhalász és Napkor esetében ingyenes!</small>
                    <small class="text-secondary">A házhozszállítás Nyíregyháza és Újfehértó esetében + 1450 Ft </small>
                    <small class="text-secondary">A fent említett településeken kívül máshova nem áll módunkban szállítani!</small>
                </div>

                @if (Session::has('error'))
                    <div class="text-center">
                            <p class="fw-bold text-danger">{{Session::get('error')}}</p>
                    </div>
                @endif

                <!-- 2. Szállítási cím -->
                <div class="card p-4 mb-3">
                    <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-geo-alt me-2"></i>Adatatok</h5>
                    <div class="row g-3">

                        @include('includes/forms/checkout', [
                            'name'        => 'name',
                            'label'       => 'Név',
                            'placeholder' => 'Add meg a neved...',
                            'loggedValue' => auth()->user()->name ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'email',
                            'type'        => 'email',
                            'label'       => 'Email',
                            'placeholder' => 'Add meg az email címed',
                            'loggedValue' => auth()->user()->email ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'phone',
                            'type'        => 'tel',
                            'label'       => 'Telefonszám',
                            'placeholder' => 'Pl. +36301234567',
                            'loggedValue' => auth()->user()->phone ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'zip',
                            'label'       => 'Irányítószám',
                            'placeholder' => 'Pl. 4552',
                            'loggedValue' => auth()->user()->zip ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'city',
                            'label'       => 'Település',
                            'placeholder' => 'Pl. Napkor',
                            'loggedValue' => auth()->user()->city ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'street',
                            'label'       => 'Utca *',
                            'placeholder' => 'Pl. Kossuth utca',
                            'loggedValue' => auth()->user()->street ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'houseNumber',
                            'label'       => 'Házszám *',
                            'placeholder' => 'Pl. 12/A',
                            'loggedValue' => auth()->user()->houseNumber ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'floor',
                            'label'       => 'Emelet/Ajtó',
                            'placeholder' => 'Add meg az emeletet és ajtót',
                            'loggedValue' => auth()->user()->floor_door ?? ''
                        ])

                        @include('includes/forms/checkout', [
                            'name'        => 'doorbell',
                            'label'       => 'Kapucsengő',
                            'placeholder' => 'Add meg a kapucsengőt / Nem kötelező',
                            'loggedValue' => auth()->user()->doorbell ?? ''
                        ])

                        <div class="col-12">
                            <label class="form-label small">Cím megjegyzés (kapukód, egyéb info)</label>
                            <textarea name="elseData" class="form-control" rows="2">{{ auth()->user()->elseData ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                @error('payment')
                <div class="text-center">
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror


                <!-- 3. Fizetési módok -->
                <div class="card p-4">
                    <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-credit-card me-2"></i>Fizetési mód</h5>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="form-check p-3 border rounded">
                                <input class="form-check-input ms-0 me-2" type="radio" name="payment" id="payCash" value="Készpénz"  {{ old('payment') == 'Készpénz' ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="payCash">Készpénz (futárnál)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 border rounded">
                                <input class="form-check-input ms-0 me-2" type="radio" name="payment" id="payCard" value="Bankkártya"  {{ old('payment') == 'Bankkártya' ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="payCard">Bankkártya (futárnál)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 border rounded">
                                <input class="form-check-input ms-0 me-2" type="radio" name="payment" id="payOtp" value="OTP SZÉP" {{ old('payment') == 'OTP SZÉP' ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="payOtp">OTP SZÉP kártya (futárnál)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 border rounded">
                                <input class="form-check-input ms-0 me-2" type="radio" name="payment" id="payKh" value="K&H SZÉP"  {{ old('payment') == 'K&H SZÉP' ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="payKh">K&H SZÉP kártya (futárnál)</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- RENDELÉS GOMB -->
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-warning btn-lg px-5 fw-bold {{ ( !Session::has('cart') || empty(Session::get('cart')) ) ? 'disabled' : '' }}">
                        Rendelés leadása  <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                </div>
            </div>

            <!-- JOBB OLDAL: Kosár közvetlenül (col burkoló nélkül) -->
            @include('includes.cart')

        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/zip-lookup.js') }}"></script>


<script>

const ingyenesVarosok = ['Nagykálló', 'Biri', 'Balkány', 'Nagyhalász', 'Napkor'];
const fizetosVarosok  = ['Nyíregyháza', 'Újfehértó'];
let cityInput = document.querySelector("input[name=city]");
let shippingPrice = document.querySelector('.js-shippingPrice');

//Trimmelés és nagybetüssé tétel
// let city = cityInput.value.trim().charAt(0).toUpperCase() + cityInput.value.trim().slice(1);

const dataZip = document.querySelector("input[name=zip]");
    
cityInput.onchange = function(){
    let city = cityInput.value.trim().charAt(0).toUpperCase() + cityInput.value.trim().slice(1);
    //console.log(`valami ${city}`)
      if (ingyenesVarosok.includes(city)) {
     console.log(`ingyenes és ${city}`);
     shippingPrice.innerText = 0;
     } else if (fizetosVarosok.includes(city)) {
        console.log(`fizetős és ${city}`)
        shippingPrice.innerText = 1450;
     } else {
        shippingPrice.innerHTML = `<div class="text-danger"> Sajnos ide nem tudunk szállítani .  </div>`;
     }
}



// ///////////////////////////////////////////////



// dataZip.onchange = function(){
    
//     console.log(cityInput)
//     console.log(`valami ${cityInput.value}`)
//       if (ingyenesVarosok.includes(city)) {
//      console.log(`ingyenes és ${city}`);
//      shippingPrice.innerText = 0;
//      } else if (fizetosVarosok.includes(city)) {
//         console.log(`fizetős és ${city}`)
//         shippingPrice.innerText = 1450;
//      } else {
//         shippingPrice.innerHTML = `<div class="text-danger"> Sajnos ide nem tudunk szállítani .  </div>`;
//      }
// }


// function cityChange() {
//         let city = cityInput.value.trim().charAt(0).toUpperCase() + cityInput.value.trim().slice(1);
//     //console.log(`valami ${city}`)
//       if (ingyenesVarosok.includes(city)) {
//      console.log(`ingyenes és ${city}`);
//      shippingPrice.innerText = 0;
//      } else if (fizetosVarosok.includes(city)) {
//         console.log(`fizetős és ${city}`)
//         shippingPrice.innerText = 1450;
//      } else {
//         shippingPrice.innerHTML = `<div class="text-danger"> Sajnos ide nem tudunk szállítani .  </div>`;
//      }
// }


</script>

</body>

</html>
