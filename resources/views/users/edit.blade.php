@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Pengguna</h2>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           value="{{ old('name', $user->name) }}"
                           required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           value="{{ old('email', $user->email) }}"
                           required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password Baru
                    </label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control">
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengubah password.
                    </small>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role Pengguna</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="admin"
                            {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="petugas"
                            {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>
                            Petugas
                        </option>
                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>
</div>
@endsection
