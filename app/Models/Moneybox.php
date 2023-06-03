<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Moneybox extends Model
{
    use HasFactory;

    protected $fillable = ['usersmoneybox_id', 'slug', 'judul_moneybox', 'target_moneybox', 'nominal_moneybox', 'tanggal_selesai']; 
    protected $guarded = ['id'];

    protected $table = 'moneybox';

    public function usersmoneybox()
    {
        return $this->belongsTo(User::class, 'usersmoneybox_id');
    }
}
