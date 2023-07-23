<div class="container-fluid">

    <div class="row justify-content-start py-5">
        <div class="col">
            <div class="card shadow-0 rounded-0 bg-white text-dark">
                <div class="card-body">
                    <h3 class="h3 text-dark text-start mb-4 text-gray-800 text-capitalize">Selamat datang</h3>
                    <hr />

                    <div class="row justify-content-start g-3 py-3">

                        <div class="col-12 col-lg-3">
                            <div class="card shadow-0 rounded-0 mb-3">
                                <div class="card-body">
                                    <div class="text-center  mx-auto">
                                        <div class="mb-3">
                                            <p class="text-start text-dark h5">
                                                Total Semua Buku
                                            </p>
                                        </div>
                                        <hr />
                                        <div class="mb-3">
                                            <i class="fas fa-fw fa-3x fa-book-open"></i>
                                        </div>
                                        <h5 class="card-title text-start text-dark">
                                            {{ $total_books }} buku
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card shadow-0 rounded-0 mb-3">
                                <div class="card-body">
                                    <div class="text-center  mx-auto">
                                        <div class="mb-3">
                                            <p class="text-start text-dark h5">
                                                Total Semua Kategori Buku
                                            </p>
                                        </div>
                                        <hr />
                                        <div class="mb-3">
                                            <i class="fas fa-fw fa-3x fa-bookmark"></i>
                                        </div>
                                        <h5 class="card-title text-start text-dark">
                                            {{ $total_category_books }} Kategori buku
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="card shadow-0 rounded-0 mb-3">
                                <div class="card-body">
                                    <div class="text-center  mx-auto">
                                        <div class="mb-3">
                                            <p class="text-start text-dark h5">
                                                Total Semua Anggota
                                            </p>
                                        </div>
                                        <hr />
                                        <div class="mb-3">
                                            <i class="fas fa-fw fa-3x fa-users"></i>
                                        </div>
                                        <h5 class="card-title text-start text-dark">
                                            {{ $total_users }} Anggota
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card shadow-0 rounded-0 mb-3">
                                <div class="card-body">
                                    <div class="text-center  mx-auto">
                                        <div class="mb-3">
                                            <p class="text-start text-dark h5">
                                                Total Semua Petugas
                                            </p>
                                        </div>
                                        <hr />
                                        <div class="mb-3">
                                            <i class="fas fa-fw fa-3x fa-user"></i>
                                        </div>
                                        <h5 class="card-title text-start text-dark">
                                            {{ $total_petugas }} Petugas
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>