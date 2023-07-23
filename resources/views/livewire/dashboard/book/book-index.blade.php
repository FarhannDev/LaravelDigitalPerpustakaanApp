<div class="container-fluid">

    <div class="row justify-content-start">
        <div class="col-12">
            <div class="card rounded-0 shadow-0 mb-3">
                <div class="card-body">
                    <div class="border-bottom">
                        <h5 class="card-title">
                            Kelola Data Buku
                        </h5>
                    </div>


                    <div class="d-flex justify-content-start py-3">
                        <a aria-label="Tambah Data Buku" href="{{ route('dashboard.book.add') }}"
                            class="btn btn-danger btn-md rounded">
                            Tambah Data Buku Baru <i class="fas fa-fw fa-plus"></i></a>
                    </div>


                    <div class="row justify-content-start g-2 py-3">
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cari berdasarkan judul / ISBN</label>
                                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="Cari..."
                                    style="height: 50px; border-radius: 0;">
                            </div>

                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cari berdasarkan Kategori</label>
                                <select wire:model.debounce.500ms="category" class="custom-select text-capitalize"
                                    style="height: 50px; border-radius: 0;">
                                    <option selected value="">Pilih Semua Kategori</option>
                                    @foreach($categories as $category)
                                    <option class="text-capitalize" value="{{ $category->category_name }}">{{
                                        $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cari berdasarkan Status</label>
                                <select wire:model.debounce.500ms="status" class="custom-select"
                                    style="height: 50px; border-radius: 0;">
                                    <option selected value="">Pilih Semua Status</option>
                                    <option value="publish">Diterbitkan</option>
                                    <option value="unpublish">Tidak Diterbitkan</option>
                                    <option value="draft">Disimpan</option>
                                </select>
                            </div>


                        </div>

                    </div>


                    <div class="d-flex justify-content-end py-3">
                        <a aria-label="Export Data Ke PDF" href="{{ url('/generate-pdf')}}"
                            class="btn btn-danger btn-md rounded">
                            Export Data <i class="fas fa-fw fa-file-pdf"></i></a>
                    </div>

                    @if(is_null($items->count()))
                    <div class="d-flex justify-content-center py-3">Tidak ada daftar buku </div>

                    @else
                    <div class="table-responsive my-3" style="position: relative">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                <tr>
                                    <!-- <th class="col-1">{{ $loop->index + 1 }}</th> -->
                                    <th class="col-1 text-dark text-start">{{$items->currentPage() * $items->perPage() -
                                        $items->perPage() + 1 +$loop->index}}
                                    </th>
                                    <td class="col-3 text-dark text-start">
                                        {{ $item->title }}
                                    </td>
                                    <td class="col-2 text-dark text-start">{{ $item->category['category_name'] }}</td>
                                    <td class="col-2 text-dark text-start">{{ $item->isbn }}</td>
                                    <td class="col-2 text-dark text-start">{{ $item->total_books }} Buku</td>
                                    <td class="col-2 text-dark text-start">
                                        @if ($item->is_status === 'publish')
                                        <p class="text-success text-capitalize text-start">Diterbitkan</p>
                                        @elseif($item->is_status === 'unpublish')
                                        <p class="text-danger text-capitalize text-start">
                                            Tidak Diterbitkan

                                        </p>
                                        @else
                                        <p class="text-danger text-capitalize text-start">Disimpan</p>

                                        @endif
                                    </td>
                                    <td class="col">
                                        <div class="d-flex">
                                            <button wire:click="delete({{ $item->id }})" type="button" title="hapus"
                                                class="btn btn-danger btn-md"><i
                                                    class="fas fa-fw fa-trash"></i></button>
                                            <a aria-label="perbarui"
                                                href="{{ route('dashboard.book.edit', $item->slug) }}" title="perbarui"
                                                class="btn btn-danger btn-md ml-2"><i class="fas fa-fw fa-edit"></i></a>
                                            <a aria-label="Unduh Buku Ini"
                                                href="{{ asset('/storage/upload/file/'. $item->upload_pdf) }}"
                                                title="download" class="btn btn-danger btn-md ml-2"><i
                                                    class="fas fa-fw fa-download"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                    {{ $items->links('vendor.livewire.bootstrap') }}

                    @endif



                </div>
            </div>
        </div>
    </div>
</div>