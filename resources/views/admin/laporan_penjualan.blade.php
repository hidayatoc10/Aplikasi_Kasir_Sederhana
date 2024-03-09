@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-calendar-plus-fill"></i> Laporan Penjualan
                </h3>
            </div>
            <div class="card">
                <div class="card-body" id="printBtn">
                    <form action="{{ route('laporan_penjualann') }}" method="GET" class="form-inline">
                        <div class="form-group mr-2">
                            <label for="from_date">Dari Tanggal</label>
                            <input type="date" class="form-control mx-sm-2" name="from_date" id="from_date"
                                value="{{ $from_date }}">
                        </div>
                        <div class="form-group mr-2">
                            <label for="to_date">Hingga Tanggal</label>
                            <input type="date" class="form-control mx-sm-2" name="to_date" id="to_date"
                                value="{{ $to_date }}">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="form-group mr-2" id="printBtn">
                            <a href="javascript:void(0)" class="btn btn-success" onclick="printTable()">
                                <i class="bi bi-clipboard2-data"></i> Print</a>
                        </div>
                        <a href="/admin/laporan_penjualan" id="printBtn" class="btn btn-secondary">
                            <i class="bi bi-arrow-repeat"></i> Refresh</a>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="printTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah Transaksi</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penjualan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->jumlah_transaksi }}</td>
                                    <td>Rp. {{ number_format($item->total_penjualan, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <h3>Tidak ada data penjualan</h3>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>Rp. {{ number_format($total_penjualan, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        tr td {
            text-align: center;
        }

        th {
            text-align: center;
        }

        @media print {
            #printBtn {
                display: none;
            }
        }
    </style>
    <script>
        function printTable() {
            window.print();
        }
    </script>
@endsection
