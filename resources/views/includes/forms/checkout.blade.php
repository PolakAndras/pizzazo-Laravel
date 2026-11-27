<!-- <form class="row g-3"> -->
<div class="col-md-6">
    <!-- Ez most nem kell, mert mindegyikhez van label, de itt hagyom: -->
     <!-- @if (isset($label) && $label) -->
    <label class="form-label text-muted small" 
        for="{{$name}}">
        {{$label}}
    </label>
    <!-- @endif -->
    <input type="{{isset($type) ? $type : 'text'}}" 
        class="form-value form-control" 
        name="{{$name}}"
        value="{{ old($name, $loggedValue) }}" 
        id="{{$name}}" 
        placeholder = "{{$placeholder ?? '' }}">
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<!-- </form> -->


<!-- Behívás: -->

{{-- 

@include('includes/forms/checkout', [
    'name' => '',
    'type' => '' !! Csak ha nem text!,
    'label' => 'Név / Email / Cím stb..',
    'placeholder' => 'Add meg a neved / kiszállítási címet stb..',
    'loggedValue' => auth()->user()->name/email ?? '',
    ])

    --}}



