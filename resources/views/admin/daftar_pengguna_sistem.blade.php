@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper" style="height: 80vh; overflow-y: auto;">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-table"></i> Data Pengguna Sistem
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        @if (session('delete_pengguna'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Berhasil <strong>Dihapus</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('berhasil'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Berhasil <strong>Diubah</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="/admin/tambah_pengguna_sistem" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Tambah Pengguna</a>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Keterangan</th>
                                <th>Foto</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user2 as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_lengkap }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $row->image) }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $row->created_at }}</td>

                                    <td>
                                        <a href="/admin/view_pengguna_sistem/{{ $row->created_at }}" title="Detail"
                                            class="btn btn-info btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        </a>
                                        <a href="/admin/edit_pengguna_sistem/{{ $row->created_at }}" title="Ubah"
                                            class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="/admin/delete_pengguna_sistem/{{ $row->created_at }}"
                                            onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                            class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash-fill"></i>
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
