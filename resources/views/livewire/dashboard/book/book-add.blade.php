<div class="container-fluid py-5">

    <div class="row justify-content-center align-content-center">
        <div class="col-12 col-lg-5">
            <div class="card rounded-0 shadow-0 mb-3">
                <div class="card-body">
                    <h5 class="card-title text-start text-uppercase text-dark">
                        Form Tambah Data Buku
                    </h5>

                    <hr />

                    <form wire:submit.prevent="saveBooks" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Judul Buku <span class="text-danger">*</span> </label>
                            <input wire:model="title" type="text" placeholder="cth: Laskar pelangi 2"
                                class="form-control @error('title')is-invalid @enderror" id="title">

                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="slug">Kategori Buku <span class="text-danger">*</span></label>
                            <select class="custom-select @error('category')is-invalid @enderror" wire:model="category">
                                <option value="">Pilih Kategori Buku</option>

                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>

                            @error('category')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug">Jumlah Halaman <span class="text-danger">*</span></label>
                            <input wire:model="total_books" type="text"
                                class="form-control @error('total_books') is-invalid @enderror" id="slug">

                            @error('total_books')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">Upload File Buku <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input wire:model="upload_pdf" type="file"
                                    class="custom-file-input  @error('upload_pdf') is-invalid @enderror "
                                    id="customFile">
                                <label class="custom-file-label" for="customFile">Silahkan pilih File PDF</label>
                                <div wire:loading wire:target="upload_pdf">Uploading...</div>

                                @error('upload_pdf')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="slug">Upload Cover Buku <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input wire:model="upload_cover" type="file"
                                    class="custom-file-input @error('upload_cover') is-invalid @enderror"
                                    id="customFileCover">
                                <label class="custom-file-label" for="customFile">Silahkan pilih File Gambar
                                    PNG/JPG</label>

                                <div wire:loading wire:target="upload_cover">Uploading...</div>

                                @error('upload_cover')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi </label>
                            <textarea wire:model="description" placeholder="Masukan deskripsi buku..."
                                class="form-control @error('description') is-invalid @enderror"
                                id="exampleFormControlTextarea1" rows="6"></textarea>

                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" {{ $status===true
                                    ? 'checked' : '' }}>
                                <label wire:model="status" class="custom-control-label" for="customSwitch1">Draft /
                                    Terbitkan</label>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-dark btn-md rounded d-block w-100 mb-2">Simpan</button>
                        <a aria-label="Kembali" href=" {{ route('dashboard.book.index') }}"
                            class="btn btn-outline-dark btn-md rounded d-block w-100">Batalkan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@prepend('javascript')
<script type="application/javascript">
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endprepend