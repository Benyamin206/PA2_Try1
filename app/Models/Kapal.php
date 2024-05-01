<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    use HasFactory;

    protected $table = 'kapals';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'user_id',
        'aktif',
        'kapasitas',
        'available_booking',
        'booking'
    ];


    public function user(){

        return $this->belongsTo(User::class);

    }

    public function jadwals(){
        return $this->hasMany(Jadwal::class);
    }

}
