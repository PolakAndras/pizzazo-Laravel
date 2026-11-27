   <!-- Kosár -->
   <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center py-2">Kosarad</h2>
                         @if ( !Session::has('cart') || empty(Session::get('cart')) )
                        <h5 class="text-center pt-3">
                           A kosarad még üres <i class="fa-regular fa-face-frown"></i>
                        </h5>
                        @else
                            @foreach (Session::get('cart') as $id =>$item)
                            <div class="d-flex justify-content-between">
                                <p>{{$item['product_name']}} | {{$item['pizza_size']}} | {{$item['quantity']}} db</p>
                                <p>{{$item['subtotal']}} Ft <a href="{{ route('delete-Item', ['id' => $item['product_id']]) }}"><i class="fa-solid fa-trash"></i></a></p>
                                </div> 
                            <ul class="list-unstyled ms-2">
                                @if(!empty($item['extras']))
                                    @foreach ($item['extras'] as $extraName => $extra) 
                                        <li>{{ $extraName }} - {{ $extra }} Ft.</li>
                                    @endforeach
                                @endif
                                <hr class="py-1">
                            </ul>
                            @endforeach

                        @endif  
                        <!-- /> -->
                         <div class="d-flex"> 
                         <p>Szállítási díj: </p>
                         <p class="js-shippingPrice"></p>
                            <input type="hidden" name="shippingPrice" class="proba" value="{{Session::get('shippingPrice')}} Ft">
                        </div>
                       
                        <h5 class="pb-4">Végösszeg: </h5>
                    @if ( Route::currentRouteName() === 'checkout-view') 
                        
                    @else
                        <a href="{{ route('checkout-view') }}" 
                        class="btn btn-warning w-100 {{ ( !Session::has('cart') || empty(Session::get('cart')) ) ? 'disabled' : '' }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Rendelés leadása
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
                {{-- Kosár vége --}}


