<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    
    protected $fillable = ['userspemasukan_id', 'kategoripemasukan_id ', 'pemasukan_nominal', 'created_at ']; 
    protected $guarded = ['id'];
    use HasFactory;
}
