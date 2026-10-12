<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Tambahkan baris ini agar fungsi create() dan update() bisa berjalan
    protected $fillable = ['title', 'author', 'year', 'stock'];
}