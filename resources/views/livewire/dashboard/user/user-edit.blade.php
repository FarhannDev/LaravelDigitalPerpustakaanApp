<div class="container-fluid py-3">

    <div class="row justify-content-center align-content-center">
        <div class="col-12 col-lg-6">
            <div class="card rounded-0 shadow-0 mb-3">
                <div class="card-body">
                    <h5 class="card-title text-start text-uppercase text-dark">
                        Form Edit Data Anggota
                    </h5>

                    <hr />

                    <form wire:submit.prevent="saveUsers" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="first_name">Nama Depan <span class="text-danger">*</span> </label>
                                <input wire:model="first_name" type="text" placeholder="Nama Depan"
                                    class="form-control @error('first_name')is-invalid @enderror" id="first_name">

                                @error('first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="last_name">Nama Belakang <span class="text-danger">*</span> </label>
                                <input wire:model="last_name" type="text" placeholder="Nama Belakang"
                                    class="form-control @error('last_name')is-invalid @enderror" id="last_name">

                                @error('last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="email">Alamat Email <span class="text-danger">*</span> </label>
                                <input wire:model="email" type="text" placeholder="Alamat Email"
                                    class="form-control @error('email')is-invalid @enderror" id="email">

                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-2">
                                <label for="age">Usia <span class="text-danger">*</span> </label>
                                <input wire:model="age" type="number"
                                    class="form-control @error('age')is-invalid @enderror" id="age">

                                @error('age')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-lg-4">
                                <label for="gender">Jenis Kelamin <span class="text-danger">*</span> </label>
                                <select class="custom-select @error('gender')is-invalid @enderror" wire:model="gender">
                                    <option selected value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label for="telephone">NO.Telephone <span class="text-danger">*</span> </label>
                                <input wire:model="telephone" type="tel"
                                    class="form-control @error('telephone')is-invalid @enderror" id="telephone">

                                @error('telephone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label for="city">Kota Saat Ini <span class="text-danger">*</span> </label>
                                <input wire:model="city" type="text"
                                    class="form-control @error('city')is-invalid @enderror" id="city">

                                @error('city')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label for="province">Provinsi Saat Ini <span class="text-danger">*</span> </label>
                                <input wire:model="province" type="text"
                                    class="form-control @error('province')is-invalid @enderror" id="province">

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
                        <div class="custom-control custom-switch">
                            <input wire:model="isstatus" type="checkbox" name="is_status" class="custom-control-input"
                                id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Nonaktifkan / Aktifkan</label>
                        </div>


                        <div class="py-3">
                            <button type="submit" class="btn btn-dark btn-md rounded d-block w-100 mb-2">Simpan</button>
                            <a aria-label="Kembali" href=" {{ route('dashboard.user.index') }}"
                                class="btn btn-outline-dark btn-md rounded d-block w-100">Batalkan</a>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>