@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-content-center g-2 py-5">
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card rounded bg-white text-dark shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <h3 class="text-dark text-capitalize mb-0">{{ __('Digital Perpustakaan - Register') }} </h3>
                    </div>
                    <hr />
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="first_name" class="mb-2">{{ __('Nama Depan') }} <span
                                    class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" id="first_name" placeholder="Nama Depan" autocomplete="name"
                                value="{{ old('first_name') }}" required style="height: 40px;">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name" class="mb-2">{{ __("Nama Belakang") }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" id="last_name" placeholder="Nama Belakang" required autocomplete="name"
                                value="{{ old('last_name') }}" style="height: 40px;">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="mb-2">{{ __('Alamat Email') }} <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="cth: example@mail.com" required autocomplete="email"
                                value="{{ old('email') }}" style="height: 40px;">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="mb-2">{{ __('Password ')}} <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Password Anda" required
                                autocomplete="current-password" style="height: 40px;">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password2" class="mb-2">{{ __('Konfirmasi Password') }}</label>
                            <input type="password" class="form-control  @error('password2') is-invalid @enderror"
                                name="password2" id="password2" placeholder="Konfirmasi password" style="height: 40px;">

                            @error('password2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="py-3">
                            <button type="submit"
                                class="btn btn-dark btn-md rounded-pill d-block w-100 mb-3 text-center">Mendaftar</button>
                            <a href="{{ url('/login') }}" aria-label="Masuk ke aplikasi"
                                class="btn btn-outline-dark btn-md rounded-pill d-block w-100 text-center">Masuk</a>
                        </div>

                        <div class="py-3">
                            <div class="d-flex justify-content-center">
                                <p class="text-start">Digital Perpustakaan 2023</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection