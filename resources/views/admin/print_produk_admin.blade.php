<!DOCTYPE html>
<html>

<head>
    <title>Data Produk</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');

        :root {
            --primary: #000000;
            --secondary: #3d3d3d;
            --white: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        body {
            background: var(--secondary);
            padding: 50px;
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .bold {
            font-weight: 900;
        }

        .light {
            font-weight: 100;
        }

        .wrapper {
            background: var(--white);
            padding: 30px;
        }

        .invoice_wrapper {
            border: 3px solid var(--primary);
            width: 700px;
            max-width: 100%;
        }

        .invoice_wrapper .header .logo_invoice_wrap,
        .invoice_wrapper .header .bill_total_wrap {
            display: flex;
            justify-content: space-between;
            padding: 30px;
        }

        .invoice_wrapper .header .logo_sec {
            display: flex;
            align-items: center;
        }

        .invoice_wrapper .header .logo_sec .title_wrap {
            margin-left: 5px;
        }

        .invoice_wrapper .header .logo_sec .title_wrap .title {
            text-transform: uppercase;
            font-size: 18px;
            color: var(--primary);
        }

        .invoice_wrapper .header .logo_sec .title_wrap .sub_title {
            font-size: 12px;
        }

        .invoice_wrapper .header .invoice_sec,
        .invoice_wrapper .header .bill_total_wrap .total_wrap {
            text-align: right;
        }

        .invoice_wrapper .header .invoice_sec .invoice {
            font-size: 28px;
            color: var(--primary);
        }

        .invoice_wrapper .header .invoice_sec .invoice_no,
        .invoice_wrapper .header .invoice_sec .date {
            display: flex;
            width: 100%;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
        .invoice_wrapper .header .invoice_sec .date span:first-child {
            width: 70px;
            text-align: left;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
        .invoice_wrapper .header .invoice_sec .date span:last-child {
            width: calc(100% - 70px);
        }

        .invoice_wrapper .header .bill_total_wrap .total_wrap .price,
        .invoice_wrapper .header .bill_total_wrap .bill_sec .name {
            color: var(--primary);
            font-size: 20px;
        }

        .invoice_wrapper .body .main_table .table_header {
            background: var(--primary);
        }

        .invoice_wrapper .body .main_table .table_header .row {
            color: var(--white);
            font-size: 18px;
            border-bottom: 0px;
        }

        .invoice_wrapper .body .main_table .row {
            display: flex;
            border-bottom: 1px solid var(--secondary);
        }

        .invoice_wrapper .body .main_table .row .col {
            padding: 10px;
        }

        .invoice_wrapper .body .main_table .row .col_no {
            width: 5%;
        }

        .invoice_wrapper .body .main_table .row .col_des {
            width: 45%;
        }

        .invoice_wrapper .body .main_table .row .col_price {
            width: 20%;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_judul {
            right: 40px;
            position: relative;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_gambar {
            right: 80px;
            position: relative;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_gambar2 {
            right: 50px;
            position: relative;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_qty {
            width: 10%;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_qty2 {}

        .invoice_wrapper .body .main_table .row .col_total {
            width: 20%;
            text-align: right;
        }

        .invoice_wrapper .body .main_table .row .col_total2 {
            width: 20%;
            text-align: right;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap {
            display: flex;
            justify-content: space-between;
            padding: 5px 0 30px;
            align-items: flex-end;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .paymethod_sec {
            padding-left: 30px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec {
            width: 30%;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p {
            display: flex;
            width: 100%;
            padding-bottom: 5px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span {
            padding: 0 10px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:first-child {
            width: 60%;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:last-child {
            width: 40%;
            text-align: right;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p:last-child span {
            background: var(--primary);
            padding: 10px;
            color: #fff;
        }

        .invoice_wrapper .footer {
            padding: 30px;
        }

        .invoice_wrapper .footer>p {
            color: var(--primary);
            text-decoration: underline;
            font-size: 18px;
            padding-bottom: 5px;
        }

        .invoice_wrapper .footer .terms .tc {
            font-size: 16px;
        }
    </style>
    <div class="wrapper">
        <div class="invoice_wrapper">
            <div class="header">
                <div class="logo_invoice_wrap">
                    <div class="logo_sec">
                        @foreach ($data2 as $row)
                            <img src="{{ asset('storage/' . $row->image) }}" alt="" width="100px">
                            <div class="title_wrap">
                                <p class="title bold">{{ $row->nama_sekolah }}</p>
                                <p class="sub_title">{{ auth()->user()->nama_lengkap }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="invoice_sec">
                        <p class="invoice bold">INVOICE</p>
                        <p class="invoice_no">
                            <span class="bold">Invoice</span>
                            <span>#1</span>
                        </p>
                        <p class="date">
                            <span class="bold">Date</span>
                            <span>{{ $tanggal->toDateString() }}</span>
                        </p>
                    </div>
                </div>
                <div class="bill_total_wrap">
                    <div class="bill_sec">
                        <center>
                            <p class="bold name">
                                Daftar Produk
                            </p>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="main_table">
                    <div class="table_header">
                        <div class="row">
                            <div class="col col_no">NO.</div>
                            <div class="col col_des">NAMA BARANG</div>
                            <div class="col col_gambar">GAMBAR</div>
                            <div class="col col_judul">KODE</div>
                            <div class="col col_qty">QTY</div>
                            <div class="col col_total">TOTAL</div>
                        </div>
                    </div>
                    @foreach ($data_produk2 as $item)
                        <div class="table_body">
                            <div class="row">
                                <div class="col col_no">
                                    <p>{{ $loop->iteration }}</p>
                                </div>
                                <div class="col col_des">
                                    <p class="bold">{{ $item->nama_barang }}</p>
                                </div>
                                <div class="col col_gambar2">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="" width="100px">
                                </div>
                                <div class="col col_qty2">
                                    <p>{{ $item->kode_barang }}</p>
                                </div>
                                <div class="col col_total2">
                                    <p>{{ $item->stok_barang }}</p>
                                </div>
                                <div class="col col_total">
                                    <p> Rp. {{ number_format($item->harga_barang, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="paymethod_grandtotal_wrap">
                    <div class="paymethod_sec">
                        <p class="bold"></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>Terima Kasih Atas Pemesanannya</p>
                <div class="terms">
                    <p class="tc bold">Mudah & Cepat</p>
                    <p>Temukan solusi kasir modern untuk bisnis Anda! Kami menyediakan perangkat lunak kasir yang
                        intuitif dan mudah digunakan, dirancang untuk membantu meningkatkan efisiensi dan produktivitas.
                        Kunjungi website kami untuk informasi lebih lanjut.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>

</body>

</html>
