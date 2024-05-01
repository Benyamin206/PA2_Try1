<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanJadwal extends Model
{
    use HasFactory;

    protected $table = 'detail_pesan_jadwal';

    protected $fillable = [
        'pemesanan_jadwal_id',
        'muatan_id',
        'jumlah'
    ];

    public function pemesanan_jadwal(){
        return $this->belongsTo(PemesananJadwal::class);
    }

    public function muatan(){
        return $this->belongsTo(Muatan::class);
    }


}
