<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoripengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug'];

    protected $guarded = ['id'];
    protected $table = 'kategoripengeluaran';


    public function pengeluaran() {
        return $this->hasMany(Pengeluaran::class);
    }
}
