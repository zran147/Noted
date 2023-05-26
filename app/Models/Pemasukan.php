<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pemasukan extends Model
{
    
    protected $fillable = ['userspemasukan_id', 'slug', 'judul_pemasukan', 'kategoripemasukan_id ', 'pemasukan_nominal']; 
    protected $guarded = ['id'];

    protected $table = 'pemasukan';

    public function kategoripemasukans()
    {
        return $this->belongsTo(Kategoripemasukan::class, 'kategoripemasukan_id');
    }

    public function userspemasukan()
    {
        return $this->belongsTo(User::class, 'userspemasukan_id');
    }

    use HasFactory;
}
