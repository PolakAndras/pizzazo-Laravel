<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regisztráció - Pajtesz Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    @include('includes.navbar')

         @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class='text-danger'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
    <div class="container">
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <h3 class="text-center my-5">Regisztráció</h3>

            <div class="row">
                <!-- Első oszlop -->
                <div class="col-md-6 alert alert-warning shadow-lg">
                    <h4 class="text-center">Alapadatok</h4>

                    <div class="mb-3">
                        <label for="name" class="form-label">Név</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email cím</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email_confirm" class="form-label">Email cím ismét</label>
                        <input type="email" class="form-control" id="email_confirm" name="email_confirm" value="{{ old('email_confirmation')}}">
                        @error('email_confrimation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Jelszó</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Jelszó megerősítés</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefonszám</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone')}}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Második oszlop -->
                <div class="col-md-6 alert alert-info shadow-lg">
                    <h4 class="text-center">Szállítási Adatok</h4>

                    <div class="mb-3">
                        <label for="zip" class="form-label">Irányítószám</label>
                        <input type="text" class="form-control" id="zip" name="zip" maxlength="4" pattern="\d{4}" inputmode="numeric" value="{{ old('zip')}}">
                        @error('zip')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Település</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city')}}">
                        @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="street" class="form-label">Utca</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ old('street')}}">
                        @error('street')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="houseNumber" class="form-label">Házszám</label>
                        <input type="text" class="form-control" id="houseNumber" name="houseNumber" value="{{ old('houseNumber')}}">
                        @error('houseNumber')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="floor" class="form-label">Emelet, ajtó</label>
                        <input type="text" class="form-control" id="floor" name="floor_door" value="{{ old('floor')}}">
                        @error('floor')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bell" class="form-label">Kapucsengő</label>
                        <input type="text" class="form-control" id="bell" name="doorbell" value="{{ old('bell')}}">
                        @error('bell')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="elseData" class="form-label">Egyéb Adat</label>
                        <textarea class="form-control" id="elseData" name="elseData" maxlength="200" rows="3" style="max-height: 5rem"></textarea>
                        @error('elseData')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3 form-check mt-3 d-flex justify-content-center gap-2">
                <input type="checkbox" class="form-check-input" id="accepted_terms" name="accepted_terms" value="1">
                <label class="form-check-label fw-bold" for="accepted_terms">Mindent elfogadok</label>
                @error('accepted_terms')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary my-3 d-block mx-auto" style="max-width: 10rem">Regisztráció</button>
        </form>
    </div>

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
