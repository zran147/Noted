<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['judul_note', 'slug', 'kategori_note', 'excerpt_note', 'isi_note', 'kategorinotes_id'];
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('judul_note', 'like', '%' . $search . '%')
                    ->orWhere('isi_note', 'like', '%' . $search . '%');
        });
    }
    public function kategorinotes() {
        //Maunya 1 Note punya 1 Kategori
        return $this->belongsTo(Kategorinotes::class);
        }

    public function user()
        {
            return $this->belongsTo(User::class);
        }
        
}
