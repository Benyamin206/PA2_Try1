<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    protected $table = 'supirs';

    protected $fillable = [
        'name',
        'nomor_hp',
        'jenis_kelamin',
        'alamat',
        'aktif'
    ];


    public function jadwals(){
        return $this->hasMany(Jadwal::class);
    }
}
