<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Absensi;

class Kode extends Model
{
    use HasFactory;

    protected $table = 'kode';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode','user_id','user_id_get'
    ];
    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function absen()
    {
        return $this->belongsTo(Absen::class);
    }
}
