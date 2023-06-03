<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'judul_note', 'slug', 'kategori_note', 'isi_note', 'kategorinotes_id'];
    protected $guarded = ['id'];

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul_note'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul_note', 'like', '%' . $search . '%')
                ->orWhere('isi_note', 'like', '%' . $search . '%')
                ->orWhereHas('kategorinotes', function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%');
                });
        });
    }
    

    public function kategori()
    {
        return $this->belongsTo(Kategorinotes::class, 'kategorinotes_id');
    }
    

    public function user()
        {
            return $this->belongsTo(User::class);
        }
        
}
