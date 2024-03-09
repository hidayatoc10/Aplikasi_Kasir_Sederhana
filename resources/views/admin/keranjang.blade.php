@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-table"></i> Data Keranajng
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
                        <a href="/admin/keranjang" class="btn btn-secondary">
                            <i class="bi bi-arrow-repeat"></i> Refresh</a>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Nama Kasir</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($keranjang as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->product->nama_barang }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>Rp. {{ number_format($row->subtotal, 0, ',', '.') }}</td>
                                    <td>{{ $row->cashier->nama_lengkap }}</td>
                                    <td>{{ $row->created_at }}</td>
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
