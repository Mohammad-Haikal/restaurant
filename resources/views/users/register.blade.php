<x-template>
    <div class="h-100 d-flex align-items-center container">
        <div class="col-12 col-md-6 my-5 mx-auto rounded border bg-white p-3 shadow-sm">
            <h3 class="mb-3 pb-2">Create New Account</h3>
            <form action="/users" method="post">
                @csrf

                <div class="mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="name">Full Name</label>
                        <input class="form-control form-control" id="name" name="name" type="text" value="{{ old('name') }}" />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="emailAddress">Email</label>
                        <input class="form-control form-control" id="emailAddress" name="email" type="email" value="{{ old('email') }}" />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6 mb-3 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control form-control" id="password" name="password" type="password" value="{{ old('password') }}" />
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="cPassword">Confirm Password</label>
                            <input class="form-control form-control" id="cPassword" name="password_confirmation" type="password" />
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <input class="btn btn-danger col-12" type="submit" value="Sign up" />
                </div>
            </form>

            <hr class="mx-auto mt-5">

            <div>
                <p class="text-muted m-0 text-center">Already have an account? <a href="/login">Login</a></p>
            </div>
        </div>
    </div>
</x-template>
