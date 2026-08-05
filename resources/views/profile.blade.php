<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - Pajtesz Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body style="background-color:#E6DCC0">
    @include('includes.navbar')

<div class="container my-5" style="max-width: 900px; ">

    <div class="row g-3">
        <div class="col-md-3">
            <div class="list-group">
              <a href="{{ route('profile') }}" class="list-group-item list-group-item-action ">
                  Korábbi rendeléseim
              </a>
              <a href="{{ route('profile-details') }}" class="list-group-item list-group-item-action">
                  Adataim módosítása
              </a>
          </div>
        </div>

          {{-- 1. lap : Korábbi rendeléseim --}}

        <div class="col-md-9">
            <div class="bg-light rounded p-3">
                <h5>Aktív rendelés</h5>

                <div class="shadow-lg p-3 mb-5 rounded mx-2">
                    <div class="d-flex justify-content-between">
                        <p>$Termék mennyiség : $Termék</p>
                        <p>$Ár</p>
                    </div>
                      <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Rendelés azonosító</p>
                            <p>54545454545</p>
                        </div>

                        <div>
                            <p>Rendelés ideje</p>
                            <p>2026.01.01</p>
                        </div>

                        <div>
                            <p>Fizetési mód</p>
                            <p>Készpénz</p>
                        </div>
                    </div>
                
                </div>
                 <h5 class="text-center">Rendeld újra</h5>
                    <div>
                      <p>Itt lesz a korábbi rendelések
                        <p>Rendelések 4 db</p>
                      </p>
                    </div>
                    <hr>
                    <h5 class="text-center my-5">Összes korábbi rendelés</h5>
                    <div>
                    <i class="text-secondary">
                      $dátum || $idő || ár
                    </i>
                      <hr>
                    </div>
            </div>
        </div>
          {{-- 1. lap : Korábbi rendeléseim  vége--}}
    </div>
</div>

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
