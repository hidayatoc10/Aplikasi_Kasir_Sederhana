@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Detail Pengguna</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 150px">
                                        <b>No ID</b>
                                    </td>
                                    <td>:
                                        {{ $view2->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Nama Lengkap</b>
                                    </td>
                                    <td>:
                                        {{ $view2->nama_lengkap }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Username</b>
                                    </td>
                                    <td>:
                                        {{ $view2->username }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Email</b>
                                    </td>
                                    <td>:
                                        {{ $view2->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Password</b>
                                    </td>
                                    <td>:
                                        **********
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Keterangan</b>
                                    </td>
                                    <td>:
                                        {{ $view2->keterangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Tanggal Daftar</b>
                                    </td>
                                    <td>:
                                        {{ $view2->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Update Data</b>
                                    </td>
                                    <td>:
                                        {{ $view2->updated_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card-footer exclude-from-print">
                            <a href="/admin/daftar_pengguna_sistem" class="btn btn-warning">Kembali</a>
                            <button target="_blank" title="Cetak Data mahasiswa" onclick="cetak()"
                                class="btn btn-primary">Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card card-success">
                    <div class="card-header">
                        <center>
                            <h3 class="card-title">
                                Foto Profil
                            </h3>
                        </center>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $view2->image) }}" width="280px" />
                        </div>
                        <h3 class="profile-username text-center mt-2">
                            {{ $view2->nama_lengkap }}
                            -
                            {{ $view2->keterangan }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .exclude-from-print {
                display: none;
            }
        }
    </style>

    <script>
        function cetak() {
            window.print();
        }
    </script>
@endsection
