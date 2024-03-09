@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-table"></i> View Data Produk
                </h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <div>
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" size="50" class="form-control" placeholder="Search products"
                                    id="searchInput" autofocus>
                                <div class="input-group-append">
                                    <a href="/admin/data_produk_admin" class="btn btn-success">
                                        <i class="bi bi-arrow-repeat"></i> Kembali</a>
                                    <a href="/admin/data_produk_admin/view" class="btn btn-secondary">
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
                                                <td>Kode</td>
                                                <td>:</td>
                                                <td class="card-text"><b>{{ $row->kode_barang }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td>:</td>
                                                <td class="card-text">Rp.
                                                    {{ number_format($row->harga_barang, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>:</td>
                                                <td class="card-text">{{ $row->categories->nama_categories }}</td>
                                            </tr>
                                            <tr>
                                                <td>Stok</td>
                                                <td>:</td>
                                                <td class="card-text">{{ $row->stok_barang }}</td>
                                            </tr>
                                        </table>
                                        <br>
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
