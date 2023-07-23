<div class="container-fluid">

    <div class="row justify-content-start">
        <div class="col-12">
            <div class="card rounded-0 shadow-0 mb-3">
                <div class="card-body">
                    <div class="border-bottom">
                        <h5 class="card-title">
                            Kelola Data Kategori Buku
                        </h5>
                    </div>


                    <div class="d-flex justify-content-end py-3">
                        <a aria-label="Tambah Data Buku" href="{{ route('dashboard.book.category.add') }}"
                            class="btn btn-danger btn-md rounded"><i class="fas fa-fw fa-plus"></i>
                            Tambah Data Kategori Buku</a>
                    </div>

                    <div class="table-responsive my-3" style="position: relative">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <th>{{$items->currentPage() * $items->perPage() -
                                        $items->perPage() + 1 +$loop->index}}
                                    </th>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ date('d-m-y, H:i:s', strtotime($item->created_at)) }}</td>
                                    <td>{{ date('d-m-y, H:i:s', strtotime($item->updated_at)) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="delete({{ $item->id }})"
                                                onclick="return confirm('Apakah kamu yakin menghapus data kategori buku ini?')"
                                                type="button" title="hapus" class="btn btn-danger btn-md"><i
                                                    class="fas fa-fw fa-trash"></i></button>
                                            <a href="{{ route('dashboard.book.category.edit', $item->category_slug) }}"
                                                title="perbarui" class="btn btn-danger btn-md ml-2"><i
                                                    class="fas fa-fw fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $items->links('vendor.livewire.bootstrap') }}

                </div>
            </div>
        </div>
    </div>
</div>