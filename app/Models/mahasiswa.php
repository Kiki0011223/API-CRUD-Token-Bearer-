<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
       'name',
       'nim',
       'fakultas',
       'email',
   ];
}