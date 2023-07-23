<div class="container-fluid">

    <div class="row justify-content-arround py-5">
        <div class="col-12 col-lg-3">
            <div class="card shadow-0 rounded-0 bg-white text-dark mb-3">
                <div class="card-body">
                    <h3 class="text-dark text-start mb-4 text-gray-800 text-capitalize">Filter Daftar Buku</h3>
                    <hr />

                    <div class="row justify-content-end g-2 py-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="mb-2">Kategori Buku</label>
                                <select wire:model.debounce.500ms="category" class="custom-select text-capitalize"
                                    style="height: 50px; border-radius: 0;">
                                    <option selected value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                    <option class="text-capitalize" value="{{ $category->category_name }}">{{
                                        $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Diterbitkan</label>
                                <input wire:model.debounce.300ms="inserted" type="date" class="form-control"
                                    id="exampleInputEmail1" style="height: 50px; border-radius: 0;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Diperbarui</label>
                                <input wire:model.debounce.300ms="updated" type="date" class="form-control"
                                    id="exampleInputEmail1" style="height: 50px; border-radius: 0;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-9">
            <div class="card shadow-0 rounded-0 bg-white text-dark">
                <div class="card-body">
                    <h3 class="text-dark text-start mb-4 text-gray-800 text-capitalize">Daftar Buku</h3>
                    <hr />

                    <div class="row justify-content-end g-2 py-3">
                        <div class="col-12 col-lg-4">
                            <div class="input-group mb-3">
                                <input wire:model="search" style="height: 50px;" type="text"
                                    class="form-control rounded-0 shadow-0" placeholder="Cari..." aria-label="Cari...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive" style="position: relative;">

                        @if(!$items->count())
                        <tr class="d-flex justify-content-center">
                            <p class="text-center py-3">Daftar Buku Belum Tersedia.</p>
                        </tr>
                        @else

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Kategori Buku</th>
                                    <th scope="col">Diterbitkan</th>
                                    <th scope="col">Diperbarui</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach($items as $item)
                                <tr>
                                    <td class="col-1 align-middle">{{$items->currentPage() * $items->perPage() -
                                        $items->perPage() + 1 +$loop->index}}</td>
                                    <td class="col-4 text-start align-middle">
                                        <a aria-label="Lihat detail buku"
                                            href="{{ route('user.book.show', $item->slug) }}"
                                            class="text-dark text-start text-capitalize">
                                            {{$item->title}}
                                        </a>
                                    </td>
                                    <td class="col-2 align-middle text-dark text-start">{{
                                        $item->isbn }}</td>
                                    <td class="col-2 align-middle text-dark text-start">{{
                                        $item->category['category_name'] }}</td>
                                    <td class="col-2 align-middle text-dark text-start">{{ date('d M Y',
                                        strtotime($item->created_at)) }} </td>
                                    <td class="col-2 align-middle text-dark text-start">{{ date('d M Y',
                                        strtotime($item->updated_at)) }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>