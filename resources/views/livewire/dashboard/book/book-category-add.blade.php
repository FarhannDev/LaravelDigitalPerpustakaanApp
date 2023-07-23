<div class="container-fluid py-3">

    <div class="row justify-content-center align-content-center">
        <div class="col-12 col-lg-5">
            <div class="card rounded-0 shadow-0 mb-3">
                <div class="card-body">
                    <h5 class="card-title text-start text-uppercase text-dark">
                        Form Tambah Kategori Buku
                    </h5>
                    <hr />
                    <form wire:submit.prevent="saveCategory">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="slug">Kategori</label>
                            <input wire:model="category_name" type="text"
                                class="form-control @error('category_name')is-invalid @enderror">

                            @error('category_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug">Generate Slug Kategori</label>
                            <input readonly value="{{ \Str::slug($category_name, '-') }}" type="text"
                                class="form-control">
                        </div>

                        <button type="submit" class="btn btn-dark btn-md rounded d-block w-100 mb-2">Simpan</button>
                        <a aria-label="Kembali" href=" {{ route('dashboard.book.category.index') }}"
                            class="btn btn-outline-dark btn-md rounded d-block w-100">Batalkan</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>