<x-template>
    <div class="container mt-3">
        <h2 class="mb-3">Account Settings</h2>

        <div class="accordion" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-bold" data-bs-toggle="collapse" data-bs-target="#collapseOne" type="button" aria-expanded="true" aria-controls="collapseOne">
                        {{--  --}}
                        Change User Information
                    </button>
                </h2>
                <div class="accordion-collapse collapse show" id="collapseOne" data-bs-parent="#accordion" aria-labelledby="headingOne">
                    {{--  --}}
                    <div class="accordion-body  p-0">
                        <div class="bg-white p-3">
                            <form class="mb-4" action="/updateInfo/{{ $user['id'] }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <div class="form-outline">
                                        <label class="form-label" for="name">Full Name</label>
                                        <input class="form-control form-control" id="name" name="name" type="text" value="{{ $user['name'] }}" />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-outline">
                                        <label class="form-label" for="emailAddress">Email</label>
                                        <input class="form-control form-control" id="emailAddress" name="email" type="email" value="{{ $user['email'] }}" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input class="btn btn-danger" type="submit" value="Save" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button fw-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" type="button" aria-expanded="false" aria-controls="collapseTwo">
                        {{--  --}}
                        Change User Password
                    </button>
                </h2>
                <div class="accordion-collapse collapse" id="collapseTwo" data-bs-parent="#accordion" aria-labelledby="headingTwo">
                    <div class="accordion-body p-0">
                        {{--  --}}
                        <div class="bg-white p-3">
                            <form action="/updatePassword/{{ $user['id'] }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="current_password">Current Password</label>
                                            <input class="form-control form-control" id="current_password" name="current_password" type="password" />
                                            @if ($errors->has('current_password'))
                                                <small class="text-danger">{{ $errors->first('current_password') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input class="form-control form-control" id="password" name="password" type="password" />
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="cPassword">Confirm Password</label>
                                            <input class="form-control form-control" id="cPassword" name="password_confirmation" type="password" />
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input class="btn btn-danger" type="submit" value="Save" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-sm btn-secondary my-3" href="/">&#8249; Back</a>

    </div>
</x-template>
