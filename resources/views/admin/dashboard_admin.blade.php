@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        @foreach ($data2 as $item)
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-flag-fill"></i> WEBSITE KASIR {{ $item->nama_sekolah }}
                    </h3>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_profil" name="nama_profil"
                                    value="{{ $item->nama_sekolah }}" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $item->alamat }}" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Tahun_Ajaran" name="Tahun_Ajaran"
                                    value="{{ $item->tahun_ajaran }}" readonly />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach

        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h4>
                            Rp. {{ number_format($jumlah_saldo, 0, ',', '.') }}
                        </h4>

                        <p>Jumlah Saldo</p>
                    </div>
                    <div class="icon" style="padding-bottom: 15px">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <a href="/daftar_data_admin" class="small-box-footer">Informasi
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4>
                            {{ $jumlah_produk }}
                        </h4>

                        <p>Jumlah Produk</p>
                    </div>
                    <div class="icon" style="padding-bottom: 15px">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <a href="/admin/data_produk_admin" class="small-box-footer">Informasi
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4>{{ $produk_terjual }}</h4>

                        <p>Produk Terjual</p>
                    </div>
                    <div class="icon" style="padding-bottom: 15px">
                        <i class="bi bi-basket2-fill"></i>
                    </div>
                    <a href="/daftar_data_admin" class="small-box-footer">Informasi
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4>{{ $jumlah_pengguna }}</h4>
                        <p>Pengguna Sistem</p>
                    </div>
                    <div class="icon" style="padding-bottom: 15px">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <a href="/admin/daftar_pengguna_sistem" class="small-box-footer">Informasi
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                </div>
            </div>


        </div>
        </section>
    </div>
@endsection
