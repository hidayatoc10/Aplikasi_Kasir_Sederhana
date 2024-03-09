@extends('../layouts/navbar/navbar_petugas')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Keranjang Saya
                </h3>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table id="cart" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 50%">Product</th>
                            <th style="width: 20%">Harga</th>
                            <th style="width: 8%">Quantity</th>
                            <th style="width: 22%" class="text-center">Subtotal</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach ($keranjangs as $keranjang)
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            <img src="{{ asset('storage/' . $keranjang->product->image) }}"
                                                alt="Product Image" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>{{ $keranjang->product->nama_barang }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Harga">Rp. {{ number_format($keranjang->product->harga_barang, 0, ',', '.') }}
                                </td>
                                <td data-th="Quantity">
                                    <center>{{ $keranjang->quantity }}</center>
                                </td>
                                <td data-th="Subtotal" class="text-center">Rp.
                                    {{ number_format($keranjang->subtotal, 0, ',', '.') }}</td>
                                <td class="actions" data-th="">
                                    <form action="{{ route('delete.cart.product') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $keranjang->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $total += $keranjang->subtotal;
                            @endphp
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: right">
                                <h3><strong>Total Rp. {{ number_format($total, 0, ',', '.') }}</strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href="{{ url('/petugas/data_produk_petugas') }}" class="btn btn-primary"><i
                                        class="fa fa-angle-left"></i>
                                    Kembali</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#checkoutModal">
                                    Checkout
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="payment_amount" class="form-label">Jumlah Pembayaran</label>
                                        <input type="number" class="form-control" id="payment_amount" name="payment_amount"
                                            placeholder="Jumlah pembayaran dalam Rp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_status" class="form-label">Keterangan Pembayaran</label>
                                        <select class="form-select" id="payment_status" name="payment_status">
                                            <option value="Belum Bayar">Belum Bayar</option>
                                            <option value="Sudah Bayar">Sudah Bayar</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="total_payment" value="{{ $total }}">
                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            body {
                background-color: #f6f6f6;
            }

            .img_thumbnail {
                position: relative;
                padding: 0px;
                margin-bottom: 20px;
            }

            .img_thumbnail img {
                width: 100%;
            }

            .img_thumbnail .caption {
                margin: 7px;
                text-align: center;
            }

            .dropdown {
                float: right;
                padding-right: 30px;
            }

            .btn {
                border: 0px;
                margin: 10px 0px;
                box-shadow: none !important;
            }

            .dropdown .dropdown-menu {
                padding: 10px;
                top: 10px !important;
                width: 350px !important;
                left: -110px !important;
                box-shadow: 0px 5px 30px black;
            }

            .total-header-section {
                border-bottom: 1px solid #d2d2d2;
            }

            .total-section p {
                margin-bottom: 20px;
            }

            .cart-detail {
                padding: 15px 0px;
            }

            .cart-detail-img img {
                width: 100%;
                height: 100%;
                padding-left: 15px;
            }

            .cart-detail-product p {
                margin: 0px;
                color: #000;
                font-weight: 500;
            }

            .cart-detail .price {
                font-size: 12px;
                margin-right: 10px;
                font-weight: 500;
            }

            .cart-detail .count {
                color: #000;
            }

            .checkout {
                border-top: 1px solid #d2d2d2;
                padding-top: 15px;
            }

            .checkout .btn-primary {
                border-radius: 50px;

            }

            .dropdown-menu:before {
                content: " ";
                position: absolute;
                top: -20px;
                right: 150px;
                border: 10px solid transparent;
                border-bottom-color: #fff;
            }

            .productlist {
                box-shadow: 0px 10px 30px rgb(0 0 0 / 10%);
                border-radius: 10px;
                height: 100%;
                overflow: hidden;
            }
        </style>
    @endsection
