<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
	protected $table = 'petugas';
    protected $guarded = [];

    public $timestamps = false;
    
    public function getImageAttribute($value)
    {
    	return url('storage/'.$value);
    }

}
