<div class="container-fluid">
    <div class="row justify-content-center py-5">
        <div class="col-lg-8">
            <div class="card shadow-0 rounded-0 bg-white text-dark mb-3">
                <div class="card-body">
                    <a aria-label="Kembali" href="{{ route('user.book.list') }}"
                        class="h5 text-dark text-start mb-4 text-gray-800 text-capitalize text-decoration-none">
                        <i class="fas fa-fw fa-arrow-left"></i> Kembali
                    </a>

                    <hr />
                    <a class="d-flex justify-content-end mb-3 text-dark text-decoration-none"
                        aria-label="Unduh Buku Ini" href="{{ asset('/storage/upload/file/'. $data->upload_pdf) }}"
                        download> Unduh Buku Ini <i class="fas fa-fw fa-download pt-1 "></i></a>
                    <div class="row justify-content-arround">

                        <div class="col-12 col-lg-3">
                            <img class="img-fluid rounded" width="250" height="250"
                                src="{{ asset('/storage/upload/cover/'. $data->upload_cover) }}"
                                alt="{{ $data->slug }}" />

                        </div>

                        <div class="col-12 col-lg-9">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="d-flex">
                                            <td class="col-6 col-md-3 text-start text-capitalize text-dark">Judul Buku
                                            </td>
                                            <td class="col-6 col-md-8 text-start text-capitalize text-dark">: {{
                                                $data->title }}</td>

                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-6 col-md-3 text-start text-capitalize text-dark">Kategori
                                                Buku
                                            </td>
                                            <td class="col-6 col-md-8 text-start text-capitalize text-dark">: {{
                                                $data->category->category_name }}</td>

                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-6 col-md-3 text-start text-capitalize text-dark">No. ISBN
                                            </td>
                                            <td class="col-6 col-md-8 text-start text-capitalize text-dark">: {{
                                                $data->isbn }}</td>

                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-6 col-md-3 text-start text-capitalize text-dark">Jumlah
                                            </td>
                                            <td class="col-6 col-md-8 text-start text-capitalize text-dark">: {{
                                                $data->total_books }} Buku</td>

                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-6 col-md-3 text-start text-capitalize text-dark">Diterbitkan
                                            </td>
                                            <td class="col-6 col-md-8 text-start text-capitalize text-dark">: {{
                                                date('d M Y',
                                                strtotime($data->created_at)) }} </td>

                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-6 col-md-3 text-start text-capitalize text-dark">Diperbarui
                                            </td>
                                            <td class="col-6 col-md-8 text-start text-capitalize text-dark">: {{
                                                date('d M Y',
                                                strtotime($data->updated_at)) }} </td>

                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-6 col-md-3 text-start text-capitalize text-dark">Deskripsi
                                            </td>
                                            <td class="col-6 col-md-8 text-start text-capitalize text-dark">: {{
                                                $data->description }} </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>




                    </div>


                </div>
            </div>
        </div>

    </div>