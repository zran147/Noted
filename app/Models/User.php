<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    //Yg engga boleh diisi
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

    public function notes() {
        return $this->hasMany(Note::class);
    }

    public function pemasukan(): HasMany
    {
        return $this->hasMany(Pemasukan::class, 'userspemasukan_id');
    }


    public function updateSaldo()
    {
        $totalPemasukan = $this->pemasukan()->sum('pemasukan_nominal');
        // $totalPengeluaran = $this->pengeluaran()->sum('pengeluaran_nominal');
        // $this->saldo = $totalPemasukan - $totalPengeluaran;
        $this->save();
    }

    
    
    
}
