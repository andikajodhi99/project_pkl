<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
   
    protected $fillable = [
         'id_siswa', 'spp_bulan', 'jumlah_bayar', 'status', 'keterangan'
    ];
   
 /**
   * Has Many tagihan -> Siswa
   *
   * @return void
   */
    public function siswa()
    {
         return $this->belongsTo(Siswa::class,'id_siswa','id','nisn');
    }
   
}
