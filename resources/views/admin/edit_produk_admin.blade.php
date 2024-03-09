@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> <i class="bi bi-pencil-square"></i> Form Edit Produk</h3>
                            </div>
                            <form role="form" method="POST"
                                action="{{ route('edit_produk_admin_put', $produk->created_at) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">

                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="categories_id" name="categories_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($category->id == $produk->categories_id) selected @endif>
                                                            {{ $category->nama_categories }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-5">
                                                <input type="text"
                                                    class="form-control @error('nama_barang') is-invalid @enderror"
                                                    value="{{ $produk->nama_barang }}" id="nama_barang" name="nama_barang"
                                                    placeholder="Nama Barang" required>
                                                @error('nama_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-5">
                                                <input type="number"
                                                    class="form-control @error('kode_barang') is-invalid @enderror"
                                                    value="{{ $produk->kode_barang }}" id="kode_barang" name="kode_barang"
                                                    placeholder="Kode Barang" required>
                                                @error('kode_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Barang</label>
                                            <div class="col-sm-5">
                                                <input type="number"
                                                    class="form-control @error('harga_barang') is-invalid @enderror"
                                                    value="{{ $produk->harga_barang }}" id="harga_barang"
                                                    name="harga_barang" placeholder="Harga Barang" required>
                                                @error('harga_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok Barang</label>
                                            <div class="col-sm-5">
                                                <input type="text"
                                                    class="form-control @error('stok_barang') is-invalid @enderror"
                                                    value="{{ $produk->stok_barang }}" id="stok_barang" name="stok_barang"
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
                                                <input type="file" name="image"
                                                    class="form-control @error('image') is-invalid @enderror"
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
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <a href="/admin/data_produk_admin" title="Kembali"
                                            class="btn btn-secondary">Batal</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
