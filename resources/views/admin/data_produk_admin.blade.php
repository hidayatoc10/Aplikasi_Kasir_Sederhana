@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-table"></i> Data Produk
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        @if (session('delete_pengguna'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Produk Berhasil <strong>Dihapus</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Produk Berhasil <strong>Diubah</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="/admin/tambah_data_produk_admin" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Tambah Produk</a>
                        <a href="/admin/print_produk_admin" class="btn btn-success">
                            <i class="bi bi-clipboard2-data"></i> Print</a>
                        <a href="/admin/data_produk_admin" class="btn btn-secondary">
                            <i class="bi bi-arrow-repeat"></i> Refresh</a>
                        <a href="/admin/data_produk_admin/view" class="btn btn-info">
                            <i class="bi bi-eye-fill"></i> View</a>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Category</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_produk2 as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kode_barang }}</td>
                                    <td>{{ $row->categories->nama_categories }}</td>
                                    <td>{{ $row->nama_barang }}</td>
                                    <td> Rp. {{ number_format($row->harga_barang, 0, ',', '.') }}</td>
                                    <td>{{ $row->stok_barang }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $row->image) }}" alt="" width="80px">
                                    </td>
                                    <td>
                                        <a href="/admin/edit_produk_admin/{{ $row->created_at }}" title="Ubah"
                                            class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="/admin/delete_produk_admin/{{ $row->created_at }}"
                                            onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                            class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </tfoot>
                    </table>
                </div>
            </div>
            </section>
        </div>
    @endsection
