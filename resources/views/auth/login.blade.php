@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center align-content-center g-2 py-5">
        <div class="col-12 col-lg-4 col-md-6 px-3">
            <div class="card rounded bg-white text-dark shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <h3 class="text-dark text-capitalize mb-0">Digital Perpustakaan - Login</h3>
                    </div>
                    <hr />

                    <div class="d-flex justify-content-start flex-column">
                        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">{{ __('Email Address')
                                    }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" required autocomplete="email"
                                    placeholder="cth:example@mail.com" value="{{ old('email') }}" style="height: 40px;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="password" class="mb-2">{{ __('Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" required placeholder="Password"
                                    autocomplete="current-password" style="height: 40px;">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="py-3">
                                <button type="submit"
                                    class="btn btn-dark btn-md rounded-pill d-block w-100 mb-3 text-center">Masuk</button>
                                <a href="{{ url('register') }}" aria-label="Daftarkan akun"
                                    class="btn btn-outline-dark btn-md rounded-pill d-block w-100 text-center">Daftarkan
                                    Akun</a>
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
</div>
@endsection