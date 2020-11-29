<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
	protected $table = 'pengaduan';
    protected $guarded = [];

    public $timestamps = false;

    public function masyarakat()
    {
    	return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }

    public function getTglPengaduanAttribute($value) 
    {
    	return date('d M Y', strtotime($value));
    }

    public function getFotoAttribute($value)
    {
    	return url('foto_pengaduan/'.$value);
    }

    // if (str_word_count($text, 0) > $limit) {
    //     $words = str_word_count($text, 2);
    //     $pos   = array_keys($words);
    //     $text  = substr($text, 0, $pos[$limit]) . '...';
    // }
    // return $text;
}
