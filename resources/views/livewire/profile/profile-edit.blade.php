<div class="container-fluid">
    <div class="row justify-content-center py-5">
        <div class="col-lg-8">
            <div class="card shadow-0 rounded-0 bg-white text-dark mb-3">
                <div class="card-body">
                    <h5 class="text-dark text-start mb-4 text-gray-800 text-capitalize">Edit Profile Saya
                    </h5>
                    <hr />

                    <div>
                        <form method="POST" enctype="multipart/form-data" wire:submit.prevent="saveProfile">
                            @csrf
                            <div class="form-row">
                                <div class="form-group mb-3 col-md-4">
                                    <label for="fullname">Nama Lengkap <span class="text-danger">*</span> </label>
                                    <input wire:model="fullname" type="text" placeholder="Nama Lengkap"
                                        class="form-control @error('fullname')is-invalid @enderror" id="fullname">

                                    @error('fullname')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-lg-4">
                                    <label for="gender">Jenis Kelamin <span class="text-danger">*</span> </label>
                                    <select class="custom-select @error('gender')is-invalid @enderror"
                                        wire:model="gender">
                                        <option selected value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="age">Usia <span class="text-danger">*</span> </label>
                                    <input wire:model="age" type="number"
                                        class="form-control @error('age')is-invalid @enderror" id="age"
                                        placeholder="Berapa usia saat ini">

                                    @error('age')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="telephone">NO.Telephone <span class="text-danger">*</span> </label>
                                    <input wire:model="telephone" type="tel"
                                        class="form-control @error('telephone')is-invalid @enderror" id="telephone"
                                        placeholder="No. Telpon">

                                    @error('telephone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="city">Kota Saat Ini <span class="text-danger">*</span> </label>
                                    <input wire:model="city" type="text"
                                        class="form-control @error('city')is-invalid @enderror" id="city"
                                        placeholder="Kota saat ini">

                                    @error('city')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="province">Provinsi Saat Ini <span class="text-danger">*</span> </label>
                                    <input wire:model="province" type="text"
                                        class="form-control @error('province')is-invalid @enderror" id="province"
                                        placeholder="Provinsi saat init">

                                    @error('province')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1">Alamat </label>
                                <textarea wire:model="address" placeholder="Masukan alamat"
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