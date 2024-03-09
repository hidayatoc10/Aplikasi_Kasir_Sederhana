@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Ubah Akun {{ auth()->user()->username }}
                </h3>
            </div>
            <form action="{{ route('ubah_akun_admin', $user->created_at) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="created_at" value="{{ $user->created_at }}">
                <div class="card-body">

                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                id="nama_lengkap" name="nama_lengkap" value="{{ auth()->user()->nama_lengkap }}" />
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ auth()->user()->username }}" />
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ auth()->user()->email }}" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" value="{{ auth()->user()->password }}" />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-5">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                id="inputGroupFile01" required>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-success">
                    <a href="/admin/akun_admin" title="Kembali" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    @endsection
