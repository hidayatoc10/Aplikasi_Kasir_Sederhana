@extends('../layouts/navbar/navbar_petugas')

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
                        @if (session('berhasil'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Produk Berhasil Dimasukkan<strong> Keranjang</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" size="50" class="form-control" placeholder="Search products"
                                    id="searchInput" autofocus>
                                <div class="input-group-append">
                                    <a href="/petugas/cart" class="btn btn-success">
                                        <i class="bi bi-cart-check-fill"></i> Keranjang <span
                                            class="badge bg-danger m-1 mt-1">{{ $keranjangCount }}</span></a>
                                    <a href="/petugas/data_produk_petugas" class="btn btn-secondary">
                                        <i class="bi bi-arrow-repeat"></i> Refresh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                    <div class="row" id="productsTable">
                        @foreach ($data_produk2 as $row)
                            <div class="col-sm-4 mx-auto m-2 product-card" data-name="{{ strtolower($row->nama_barang) }}"
                                data-price="{{ $row->harga_barang }}"
                                data-category="{{ strtolower($row->categories->nama_categories) }}"
                                data-stock="{{ $row->stok_barang }}" data-kode="{{ $row->kode_barang }}">
                                <div class="card">
                                    <h5 class="card-header bg-info">{{ $row->nama_barang }}</h5>
                                    <div class="card-body">
                                        <p><img class="rounded" src="{{ asset('storage/' . $row->image) }}" width="150"
                                                alt="{{ $row->nama_barang }}">
                                        </p>
                                        <table class="table table-striped table-responsive-sm">
                                            <tr>
                                                <td><b>Kode</b></td>
                                                <td>:</td>
                                                <td>{{ $row->kode_barang }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Harga</b></td>
                                                <td>:</td>
                                                <td>Rp.{{ number_format($row->harga_barang, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Kategori</b></td>
                                                <td>:</td>
                                                <td>{{ $row->categories->nama_categories }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Stok</b></td>
                                                <td>:</td>
                                                <td>{{ $row->stok_barang }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Qty</b></td>
                                                <td>:</td>
                                                <td>
                                                    <form action="{{ route('add_to_cart', $row->id) }}" method="POST">
                                                        @csrf
                                                        <input type="number" class="form-control" placeholder="Quantity"
                                                            aria-label="Quantity" aria-describedby="basic-addon1"
                                                            name="quantity" value="1" min="1">
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bi bi-cart-plus-fill"></i></button>
                                        </form>
                                        @if (session('error'))
                                            <div class="alert alert-danger mt-2" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <p id="noDataMessage"
                    style="display: none; text-align: center; font-weight: bold; font-size: 28px; margin-top: 20px">DATA
                    TIDAK DITEMUKAN</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');
            const noDataMessage = document.getElementById('noDataMessage');

            let found = false;
            productCards.forEach(card => {
                const productName = card.getAttribute('data-name');
                const productPrice = card.getAttribute('data-price');
                const productCategory = card.getAttribute('data-category');
                const productStock = card.getAttribute('data-stock');
                const productKode = card.getAttribute('data-kode');

                if (
                    productName.includes(searchQuery) ||
                    productPrice.includes(searchQuery) ||
                    productCategory.includes(searchQuery) ||
                    productStock.includes(searchQuery) ||
                    productKode.includes(searchQuery)
                ) {
                    card.style.display = '';
                    found = true;
                } else {
                    card.style.display = 'none';
                }
            });

            if (!found) {
                noDataMessage.style.display = 'block';
            } else {
                noDataMessage.style.display = 'none';
            }
        });
    </script>
@endsection
