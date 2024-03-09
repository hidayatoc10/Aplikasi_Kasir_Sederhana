@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-table"></i> Data Produk Masuk
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        @if (session('delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Produk Berhasil <strong>Dihapus</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Produk Berhasil <strong>Diubah</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="/admin/produk_masuk_admin" class="btn btn-secondary">
                            <i class="bi bi-arrow-repeat"></i> Refresh</a>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Struk</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Kasir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($data_produk2 as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->no_struk }}</td>
                                    <td>Rp. {{ number_format($row->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>{{ $row->tanggal_transaksi }}</td>
                                    <td>{{ $row->cashier->nama_lengkap }}</td>
                                    <td>
                                        <a href="{{ route('delete_produk_masuk_admin', $row->created_at) }}"
                                            onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                            class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        thead,
        tbody.align-middle {
            text-align: center;
        }
    </style>
@endsection
