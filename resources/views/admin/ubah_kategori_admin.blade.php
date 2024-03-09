@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Edit Data Categori
                </h3>
            </div>
            <form action="{{ route('ubah_kategori_admin_put', $user->created_at) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="created_at" value="{{ $user->created_at }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('nama_categories') is-invalid @enderror"
                                value="{{ $user->nama_categories }}" id="nama_categories" name="nama_categories"
                                placeholder="Nama Kategori" autofocus required>
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
