@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Tambah Data Categori
                </h3>
            </div>
            <form action="/admin/tambah_kategori_admin" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if (session('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Categori Berhasil <strong>Ditambah</strong>
                            <a href="/admin/data_kategori"><button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button></a>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('nama_categories') is-invalid @enderror"
                                id="nama_categories" name="nama_categories" placeholder="Nama Kategori" autofocus required>
                            @error('nama_categories')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-info">
                    <a href="/admin/data_kategori" title="Kembali" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    @endsection
