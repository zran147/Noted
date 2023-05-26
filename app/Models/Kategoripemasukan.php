<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoripemasukan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug'];

    protected $guarded = ['id'];
    protected $table = 'kategoripemasukan';


    public function pemasukan() {
        return $this->hasMany(Pemasukan::class);
    }
}
