<div class="container-fluid py-3">

    <div class="row justify-content-center align-content-center">
        <div class="col-12 col-lg-5">
            <div class="card rounded-0 shadow-0 mb-3">
                <div class="card-body">
                    <h5 class="card-title text-start text-uppercase text-dark">
                        Form Tambah Anggota Baru
                    </h5>

                    <hr />

                    <form wire:submit.prevent="saveBooks" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="title">Nama Lengkap <span class="text-danger">*</span> </label>
                            <input wire:model="name" type="text" placeholder="cth: Laskar pelangi 2"
                                class="form-control @error('title')is-invalid @enderror" id="title">

                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Alamat Email <span class="text-danger">*</span> </label>
                            <input wire:model="name" type="text" placeholder="cth: Laskar pelangi 2"
                                class="form-control @error('title')is-invalid @enderror" id="title">

                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">Password <span class="text-danger">*</span> </label>
                            <input wire:model="name" type="text" placeholder="cth: Laskar pelangi 2"
                                class="form-control @error('title')is-invalid @enderror" id="title">

                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">konfirmasi Password <span class="text-danger">*</span> </label>
                            <input wire:model="name" type="text" placeholder="cth: Laskar pelangi 2"
                                class="form-control @error('title')is-invalid @enderror" id="title">

                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">Jenis Kelamin <span class="text-danger">*</span> </label>
                            <select class="custom-select">
                                <option selected value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Alamat </label>
                            <textarea placeholder="Masukan alamat"
                                class="form-control @error('description') is-invalid @enderror"
                                id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>


                        <button type="submit" class="btn btn-dark btn-md rounded d-block w-100 mb-2">Simpan</button>
                        <a aria-label="Kembali" href=" {{ route('dashboard.user.index') }}"
                            class="btn btn-outline-dark btn-md rounded d-block w-100">Batalkan</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>