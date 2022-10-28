<x-template>
    <div class="h-100 d-flex align-items-center container">
        <div class="col-12 col-md-8 mx-auto my-5 rounded border bg-white p-3 shadow-sm">
            <h3 class="mb-3 pb-2">Log In</h3>
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
                    <input class="btn btn-danger col-5" type="submit" value="Log In" />
                </div>

                <div>
                    <p class="text-muted m-0">Don't have an account? <a href="/register">Create new one</a></p>
                </div>
            </form>
        </div>
    </div>
</x-template>
