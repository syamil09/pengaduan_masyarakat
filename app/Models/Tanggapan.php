<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
	protected $table = 'tanggapan';
    protected $guarded = [];

    public $timestamps = false;

    public function pengaduan()
    {
    	return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

    public function petugas()
    {
    	return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
