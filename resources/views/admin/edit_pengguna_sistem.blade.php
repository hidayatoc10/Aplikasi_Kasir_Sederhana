@extends('../layouts/navbar/navbar_admin')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-pencil-square"></i> Edit Data Pengguna
                </h3>
            </div>
            <form action="{{ route('edit_pengguna_sistem_put', $user->created_at) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="created_at" value="{{ $user->created_at }}">
                <div class="card-body">
                    @if (session('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Akun Pengguna Berhasil <strong>Diubah</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                value="{{ $user->nama_lengkap }}" id="nama_lengkap" name="nama_lengkap"
                                placeholder="Nama Lengkap" autofocus required>
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                value="{{ $user->username }}" id="username" name="username" placeholder="Username"
                                required>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $user->email }}" id="email" name="email" placeholder="Email" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                value="{{ $user->password }}" id="password" name="password" placeholder="Password"
                                required>
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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <select name="keterangan" id="keterangan"
                                class="form-control @error('keterangan') is-invalid @enderror" required>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <option value="Administrator"
                                    {{ $user->keterangan === 'Administrator' ? 'selected' : '' }}>
                                    Administrator</option>
                                <option value="Petugas" {{ $user->keterangan === 'Petugas' ? 'selected' : '' }}>Petugas
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-info">
                    <a href="/admin/daftar_pengguna_sistem" title="Kembali" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    @endsection
