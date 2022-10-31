@if (session()->has('message'))
    <div class="bg-dark position-fixed fixed-bottom bottom-0 p-2 text-center text-white" id="flash-message" role="alert">
        <small class="m-0 text-light">
            {{ session('message') }}
        </small>
    </div>
@endif
