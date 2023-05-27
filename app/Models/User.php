<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'namalengkap',
        'username',
        'email',
        'password',
        'saldo'
    ];

    // Attributes that should be guarded
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'userstransaksi_id');
    }

    public function updateSaldo()
{
    $totalPemasukan = $this->transaksi()->where('jenis_transaksi', 'pemasukan')->sum('nominal_transaksi');
    $totalPengeluaran = $this->transaksi()->where('jenis_transaksi', 'pengeluaran')->sum('nominal_transaksi');
    $this->saldo = $totalPemasukan - $totalPengeluaran;
    $this->save();
}
}
