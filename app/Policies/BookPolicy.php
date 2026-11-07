<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    // Memeriksa izin melihat daftar buku
    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Memeriksa izin melihat detail buku
    public function view(User $user, Book $book)
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Memeriksa izin menambahkan buku
    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Memeriksa izin mengubah buku
    public function update(User $user, Book $book)
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Memeriksa izin menghapus buku
    public function delete(User $user, Book $book)
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Tidak menggunakan fitur restore
    public function restore(User $user, Book $book)
    {
        return false;
    }

    // Tidak menggunakan fitur force delete
    public function forceDelete(User $user, Book $book)
    {
        return false;
    }
}
