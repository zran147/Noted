<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoritransaksi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug'];

    protected $guarded = ['id'];
    protected $table = 'kategoritransaksi';


    public function transaksi() {
        return $this->hasMany(Transaksi::class);
    }
}
