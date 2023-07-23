<div class="container-fluid">
    <div class="row justify-content-center py-5">
        <div class="col-lg-8">
            <div class="card shadow-0 rounded-0 bg-white text-dark mb-3">
                <div class="card-body">
                    <h5 class="text-dark text-start mb-4 text-gray-800 text-capitalize">Profile Saya
                    </h5>
                    <hr />

                    <div>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Nama</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->fullname ? Auth::user()->fullname:
                                            '-' }}</td>

                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Email</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->email ? Auth::user()->email: '-'
                                            }}</td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Jenis Kelamin</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->gender ? Auth::user()->gender ===
                                            'L'? 'Laki Laki' :
                                            'Perempuan' : '-'
                                            }}
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Usia</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->age ? Auth::user()->age : '-'}}
                                            tahun</td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Asal Kota</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->city }} , {{
                                            Auth::user()->province
                                            }}</td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Alamat</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->address ? Auth::user()->address :
                                            '-'}} </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">No.telpone</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->telephone ?
                                            Auth::user()->telephone : '-'}} </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Kode Anggota</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->uuid}} </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Status keAnggotaan</td>
                                        <td class="col-6 col-md-8">: {{ Auth::user()->is_status === 'active' ? 'Aktif' :
                                            'Tidak
                                            Aktif'}} </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-2">Bergabung</td>
                                        <td class="col-8">: {{ Auth::user()->created_at ? date('d M Y',
                                            strtotime(Auth::user()->created_at)) : '-'}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <hr />

                        <div class="d-flex justify-content-end py-2 ">
                            <a aria-label="perbarui profile saya" href="{{ route('profile.edit') }}"
                                class="btn btn-danger btn-md rounded mx-2">Perbarui
                                Profile</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>