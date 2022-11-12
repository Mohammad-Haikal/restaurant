<x-template>
    <div class="h-100 d-flex align-items-center container">
        <div class="col-12 col-md-6 mx-auto my-5 rounded border bg-white p-3 shadow-sm">
            <h3 class="mb-3 pb-2 text-center">Log In</h3>
            <form action="/users/auth" method="post">
                @csrf
                <div class="mb-2 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="emailAddress">Email</label>
                        <input class="form-control form-control" id="emailAddress" name="email" type="email" value="{{ old('email') }}" />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-2 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control form-control" id="password" name="password" type="password" value="{{ old('password') }}" />
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <input class="btn btn-danger col-12" type="submit" value="Log In" />
                </div>
            </form>


            <a class="text-decoration-none" href="/redirect">
                <button class="btn btn-outline-primary col-12 text-center">
                    <img src="{{ asset('imgs/icons/google.svg') }}" alt="google" width="25" height="25">
                    <span>Continue with Google</span>
                </button>
            </a>

            <hr class="mx-auto mt-5">

            <div>
                <p class="text-muted text-center m-0">Don't have an account? <a href="/register">Create new one</a></p>
            </div>




        </div>
    </div>
</x-template>
