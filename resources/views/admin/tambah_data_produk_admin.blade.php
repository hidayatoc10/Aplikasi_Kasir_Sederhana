@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Tambah Pengguna
                </h3>
            </div>
            <form action="/admin/tambah_data_produk_admin" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if (session('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Produk Berhasil <strong>Ditambah</strong>
                            <a href="/admin/data_produk_admin"><button type="button" class="btn-close"
                                    data-bs-dismiss="alert" aria-label="Close"></button></a>
                        </div>
                    @endif
                    @if (session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Produk Gagal <strong>Ditambah</strong>
                            <a href="/admin/data_produk_admin"><button type="button" class="btn-close"
                                    data-bs-dismiss="alert" aria-label="Close"></button></a>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-5">
                            <select name="categories_id" id="categories_id"
                                class="form-control @error('categories_id') is-invalid @enderror" autofocus required>
                                @error('categories_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <option value="" selected>- Category -</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_categories }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                value="{{ old('nama_barang') }}" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang" required>
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode Produk</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control @error('kode_barang') is-invalid @enderror"
                                value="{{ old('kode_barang') }}" id="kode_barang" name="kode_barang"
                                placeholder="Kode Barang" required>
                            @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Produk</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control @error('harga_barang') is-invalid @enderror"
                                value="{{ old('harga_barang') }}" id="harga_barang" name="harga_barang"
                                placeholder="Harga Barang" required>
                            @error('harga_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Stok Produk</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control @error('stok_barang') is-invalid @enderror"
                                value="{{ old('stok_barang') }}" id="stok_barang" name="stok_barang"
                                placeholder="Stok Barang" required>
                            @error('stok_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-5">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                id="inputGroupFile01" required>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-info">
                    <a href="/admin/data_produk_admin" title="Kembali" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    @endsection
