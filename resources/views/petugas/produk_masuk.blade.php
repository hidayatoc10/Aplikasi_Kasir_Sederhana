@extends('../layouts/navbar/navbar_petugas')

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
                        <!-- Alerts -->
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
                        <!-- Refresh Button -->
                        <a href="/petugas/produk_masuk" class="btn btn-secondary">
                            <i class="bi bi-arrow-repeat"></i> Refresh</a>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Struk</th>
                                <th>Total</th>
                                <th>Tanggal Transaksi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($data_produk2 as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->no_struk }}</td>
                                    <td>Rp. {{ number_format($row->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $row->tanggal_transaksi }}</td>
                                    <td>{{ $row->keterangan }}</td>

                                    <td>
                                        <a href="/petugas/view_produk_masuk/{{ $row->created_at }}" title="Detail"
                                            class="btn btn-info btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="/petugas/print_produk_masuk/{{ $row->created_at }}"
                                            class="btn btn-success btn-sm">
                                            <i class="bi bi-clipboard2-data"></i></a>
                                        <a href="{{ route('delete_produk_masuk', $row->created_at) }}"
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

    <script>
        function validateForm(total) {
            var jumlah_bayar = document.getElementById("jumlah_bayar_input").value;
            if (parseInt(jumlah_bayar) < parseInt(total)) {
                document.getElementById("warningAlert").style.display = "block";
                return false;
            } else {
                document.getElementById("warningAlert").style.display = "none";
            }
            return true;
        }
    </script>
@endsection
