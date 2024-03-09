@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-grid"></i>
                    Data Kategori
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        @if (session('delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Kategori Berhasil <strong>Dihapus</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Kategori Berhasil <strong>Diubah</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="/admin/tambah_kategori_admin" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Tambah Kategori</a>
                        <a href="/admin/data_kategori" class="btn btn-secondary">
                            <i class="bi bi-arrow-repeat"></i> Refresh</a>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Tanggal Tambah</th>
                                <th>Tanggal Update</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_categories }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td>
                                        <a href="/admin/ubah_kategori_admin/{{ $row->created_at }}" title="Ubah"
                                            class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="/admin/delete_kategori_admin/{{ $row->created_at }}"
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
