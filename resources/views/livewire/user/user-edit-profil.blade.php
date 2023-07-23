<div class="container-fluid">
    <div class="row justify-content-center py-5">
        <div class="col-lg-8">
            <div class="card shadow-0 rounded-0 bg-white text-dark mb-3">
                <div class="card-body">
                    <h5 class="text-dark text-start mb-4 text-gray-800 text-capitalize">Profile Saya
                    </h5>
                    <hr />

                    <div>
                        <form method="POST" enctype="multipart/form-data" wire:submit.prevent="saveProfile">
                            @csrf
                            <div class="form-row">
                                <div class="form-group mb-3 col-md-4">
                                    <label for="fullname" class="mb-3">Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input wire:model="fullname" type="text" class="form-control" id="fullname"
                                        name="fullname" placeholder="Nama lengkap" autocomplete="name"
                                        value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="fullname" class="mb-3">Jenis Kelamin <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="fullname" name="gender"
                                        placeholder="Jenis kelamin" value="{{ old('gender') }}">
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="age" class="mb-3">Usia <span class="text-danger">*</span>
                                    </label>
                                    <input wire:model="age" type="text" class="form-control" id="age" name="age"
                                        placeholder="Usia saat ini" value="{{ old('age') }}">
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="telephone" class="mb-3">No Telpon <span class="text-danger">*</span>
                                    </label>
                                    <input wire:model="telephone" type="tel" class="form-control" id="telephone"
                                        name="telephone" placeholder="isikan dengan nomor saat ini"
                                        value="{{ old('telephone') }}">
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="city" class="mb-3">Kota saat ini <span class="text-danger">*</span>
                                    </label>
                                    <input wire:model="city" type="tel" class="form-control" id="city" name="city"
                                        placeholder="Kota saat ini" value="{{ old('city') }}">
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="province" class="mb-3">Provinsi saat ini <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input wire:model="province" type="tel" class="form-control" id="province"
                                        name="province" placeholder="Provinsi kota saat ini"
                                        value="{{ old('province') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat saat ini <span
                                        class="text-danger">*</span> </label>
                                <textarea wire:model="address"
                                    placeholder="isikan sesuai alamat tempat tinggal saat ini..."
                                    class="form-control @error('address') is-invalid @enderror"
                                    id="exampleFormControlTextarea1" rows="6"></textarea>

                                @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end py-3">
                                <button type="reset" class="btn btn-transparent btn-md">Ulangi </button>
                                <button type="submit" class="btn btn-danger btn-md ml-2">Perbarui Profile</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>