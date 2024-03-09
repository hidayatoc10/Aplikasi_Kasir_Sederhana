@extends('../layouts/navbar/navbar_petugas')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Akun Saya
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (session('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Akun <strong>Berhasil</strong> Diubah
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    {{ auth()->user()->nama_lengkap }}
                                </td>
                                <td>
                                    {{ auth()->user()->username }}
                                </td>
                                <td>
                                    {{ auth()->user()->email }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt=""
                                        width="80px">
                                </td>
                                <td>
                                    {{ auth()->user()->created_at }}
                                </td>
                                <td>
                                    <a href="/petugas/ubah_akun_petugas/{{ auth()->user()->created_at }}"
                                        class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @endsection
