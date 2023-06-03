<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorinotes extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug'];

    protected $guarded = ['id'];

    public function notes() {
        return $this->hasMany(Note::class);
    }

    
}
