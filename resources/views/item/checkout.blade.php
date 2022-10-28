<x-template>
    <main class="container mt-3">
        <h2 class="mb-3">Checkout</h2>
        <div class="mb-3">
            <h4 class="bg-danger text-light p-1 rounded-1">Summary</h4>
            <div class="d-flex flex-row justify-content-between">
                <p class="fw-bold">Total Price: </p>
                <p class="px-1">{{ session()->get('totalPrice', 0) }} JD</p>
            </div>
            {{-- <div class=" rounded p-3 shadow-sm mb-5 col-md-6">
                <form class="row g-0 py-2" method="POST" action="/">
                    <label for="" class="form-label">Promo Code <span class="text-muted">(optional)</span></label>
                    <input class="form-control form-control-sm me-2 col w-auto" name="promoCode" type="text" value="{{ request('promoCode') }}" placeholder="Enter Code" disabled>
                    <button class="btn btn-sm btn-danger col-2 w-auto" type="submit" disabled>Apply</button>
                </form>
            </div> --}}
        </div>
        <h4 class="bg-danger text-light p-1 rounded-1">Order Informaion</h4>
        <form action="/setOrder" method="post" autocomplete="on">
            @csrf
            <div class="row g-2">
                <div class="col-md-6 mb-2">
                    <div class="form-outline">
                        <label class="form-label" for="name">Full Name</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{old('input') ? old('input') : Auth::user()['name']}}" autocomplete="name" required />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-outline">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input class="form-control" id="phone" name="phone" type="tel" autocomplete="tel"  value="{{ old('phone') }}" required  />
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-outline">
                        <label class="form-label" for="address">City</label>
                        <input class="form-control" id="address" name="address" type="text" autocomplete="address-level1" value="{{ old('address') }}" required />
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-outline">
                        <label class="form-label" for="street">Street Name</label>
                        <input class="form-control" id="street" name="street" type="text" value="{{ old('street') }}" required />
                        @error('street')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-outline">
                        <label class="form-label" for="building">Building Number</label>
                        <input class="form-control" id="building" name="building" type="text" value="{{ old('building') }}" required />
                        @error('building')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-outline">
                        <label class="form-label" for="floor">Floor</label>
                        <input class="form-control" id="floor" name="floor" type="text" value="{{ old('floor') }}" required />
                        @error('floor')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="notes">Additional Notes (optional)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                        @error('notes')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="my-3">
                <a class="btn btn-outline-secondary" href="/cart">Back to Cart</a>
                <input class="btn btn-danger" type="submit" value="Set Order" />
            </div>
        </form>
    </main>
</x-template>
