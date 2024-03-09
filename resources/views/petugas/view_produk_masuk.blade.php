@extends('../layouts/navbar/navbar_petugas')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-table"></i> Detail Pembelian
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p>No Struk: <b>{{ $transaksi->no_struk }}</b></p>
                    <p>Total Harga: <b>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</b></p>
                    <p>Total Bayar: <b>Rp. {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</b></p>
                    <p>Kembalian: <b>Rp. {{ number_format($transaksi->kembalian, 0, ',', '.') }}</b></p>
                    <p>Tanggal Transaksi: <b>{{ $transaksi->tanggal_transaksi }}</b></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Nama Produk</center>
                                </th>
                                <th>
                                    <center>Jumlah Produk</center>
                                </th>
                                <th>
                                    <center>Sub Total</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailTransaksi as $detail)
                                <tr>
                                    <td>
                                        <center>{{ $loop->iteration }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $detail->product->nama_barang }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $detail->jumlah_produk }}</center>
                                    </td>
                                    <td>
                                        <center>Rp. {{ number_format($detail->subtotal, 0, ',', '.') }}</center>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" align="right"><b>
                                        <center>Total Harga</center>
                                    </b></td>
                                <td><b>
                                        <center>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</center>
                                    </b></td>
                            </tr>
                        </tbody>
                    </table>
                    <tr>
                        <td colspan="4">
                            <a href="/petugas/produk_masuk" class="btn btn-primary">Kembali</a>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
@endsection
