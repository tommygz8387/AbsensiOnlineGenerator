<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Kode;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kelas_id','materi_id','asisten_id','teaching_role','date','start','end','duration','kode_id',
    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function kode()
    {
        return $this->hasOne(Kode::class);
    }
}
