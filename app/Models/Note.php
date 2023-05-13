<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['judul_note', 'slug', 'kategori_note', 'excerpt_note', 'isi_note', 'kategorinotes_id'];
    protected $guarded = ['id'];

    public function kategorinotes() {
        //Maunya 1 Note punya 1 Kategori
        return $this->belongsTo(Kategorinotes::class);
        }
}
