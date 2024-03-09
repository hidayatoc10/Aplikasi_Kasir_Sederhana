@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Profil
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (session('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Profil <strong>Berhasil</strong> Diubah
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Profil</th>
                                <th>Alamat</th>
                                <th>Tahun Ajaran</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data2 as $item)
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        {{ $item->nama_sekolah }}
                                    </td>
                                    <td>
                                        {{ $item->alamat }}
                                    </td>
                                    <td>
                                        {{ $item->tahun_ajaran }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="" width="80px">
                                    </td>
                                    <td>
                                        <a href="/admin/edit_profil_put/{{ $item->created_at }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @endsection
