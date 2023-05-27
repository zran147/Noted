<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['userstransaksi_id', 'slug', 'judul_transaksi', 'kategoritransaksi_id', 'jenis_transaksi', 'nominal_transaksi']; 
    protected $guarded = ['id'];

    protected $table = 'transaksi';

    public function kategoritransaksis()
    {
        return $this->belongsTo(Kategoritransaksi::class, 'kategoritransaksi_id');
    }

    public function userstransaksi()
    {
        return $this->belongsTo(User::class, 'userstransaksi_id');
    }

    public static function boot()
{
    parent::boot();

    // Update saldo after a transaksi is created
    static::created(function ($transaksi) {
        $transaksi->updateUserSaldo();
    });

    // Update saldo after a transaksi is updated
    static::updated(function ($transaksi) {
        $transaksi->updateUserSaldo();
    });
}

public function updateUserSaldo()
{
    $this->userstransaksi->updateSaldo();
}

}
