<div class="container-fluid">

    <div class="row justify-content-start">
        <div class="col-12">
            <div class="card rounded-0 shadow-0 mb-3">
                <div class="card-body">
                    <div class="border-bottom">
                        <h5 class="card-title">
                            Kelola Data Anggota
                        </h5>
                    </div>


                    <div class="d-flex justify-content-end py-3">
                        <a aria-label="Tambah Data Buku" href="{{ route('dashboard.user.add') }}"
                            class="btn btn-danger btn-md rounded"><i class="fas fa-fw fa-plus"></i>
                            Tambah Anggota Buku</a>
                    </div>


                    <div class="row justify-content-start g-2 py-3">
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cari berdasarkan nama / ID Pengguna</label>
                                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="Cari..."
                                    style="height: 50px; border-radius: 0;">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cari berdasarkan Status</label>
                                <select wire:model.debounce.500ms="status" class="custom-select"
                                    style="height: 50px; border-radius: 0;">
                                    <option selected value="">Pilih Status</option>
                                    <option value="active">Aktif</option>
                                    <option value="unactive">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cari berdasarkan waktu bergabung</label>
                                <input wire:model.debounce.500ms="joined" type="date" class="form-control"
                                    id="exampleInputEmail1" placeholder="Cari..."
                                    style="height: 50px; border-radius: 0;">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive my-3" style="position: relative">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Anggota</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Bergabung</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th>
                                        {{$users->currentPage() * $users->perPage() -
                                        $users->perPage() + 1 +$loop->index}}
                                    </th>
                                    <td class="text-dark">
                                        <a href="{{ route('dashboard.user.preview',  $user->uuid) }}" class="text-dark
                                            text-decoration-none">
                                            {{ $user->uuid }}
                                        </a>
                                    </td>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->is_status=== 'active')
                                        <p class="text-success">Aktif</p>
                                        @else
                                        <p class="text-danger">Tidak Aktif</p>
                                        @endif
                                    </td>
                                    <td>{{ date('d M Y', strtotime($user->created_at)) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button "
                                            onclick=" return confirm('Apakah kamu yakin menghapus anggota ini?')"
                                                wire:click="deleteUsers({{ $user->id }})" type="button" title="hapus"
                                                class="btn btn-danger btn-md"><i
                                                    class="fas fa-fw fa-trash"></i></button>
                                            <a href="" title="perbarui" class="btn btn-danger btn-md ml-2"><i
                                                    class="fas fa-fw fa-edit"></i></a>

                                        </div>
                                    </td>

                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    {{ $users->links('vendor.livewire.bootstrap') }}

                </div>
            </div>
        </div>
    </div>
</div>