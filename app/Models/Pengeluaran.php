<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = ['userspengeluaran_id', 'judul_pengeluaran', 'kategoripengeluaran_id ', 'pengeluaran_nominal']; 
    protected $guarded = ['id'];
    use HasFactory;
}
