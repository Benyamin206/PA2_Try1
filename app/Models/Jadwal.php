<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $fillable = [
        'waktu_berangkat',
        'rute_id',
        'kapal_id',
        'supir_id'
    ];  

    public function rute(){
        return $this->belongsTo(Rute::class);
    }

    public function kapal(){
        return $this->belongsTo(Kapal::class);
    }

    public function supir(){
        return $this->belongsTo(Supir::class);
    }

    public function pemesanan_jadwals(){
        return $this->hasMany(PemesananJadwal::class);
    }

}
