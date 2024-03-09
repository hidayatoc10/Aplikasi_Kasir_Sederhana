@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Ubah Profil
                </h3>
            </div>
            @foreach ($data2 as $item)
                <form action="{{ route('edit_profil', $item->created_at) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="created_at" value="{{ $item->created_at }}">

                    <div class="card-body">
                        <input type='hidden' class="form-control" name="id" value="{{ $item->id }}" readonly />
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror"
                                    id="nama_sekolah" name="nama_sekolah" value="{{ $item->nama_sekolah }}" />
                                @error('nama_sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" value="{{ $item->alamat }}" />
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('nama_ajaran') is-invalid @enderror"
                                    id="Tahun_Ajaran" name="tahun_ajaran" value="{{ $item->tahun_ajaran }}" />
                                @error('tahun_ajaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-5">
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="inputGroupFile01"
                                    required>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
            @endforeach
        </div>
        <div class="card-footer">
            <input type="submit" value="Simpan" class="btn btn-success">
            <a href="/admin/profil" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
        </form>
    </div>
    </div>
@endsection
