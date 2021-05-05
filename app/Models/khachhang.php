<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $table='khachhang';
    protected $primaryKey = 'id_khachhang';
    public $timestamps = false;
    public function donhang(){
    	return $this->hasOne('App\Models\donhang','id_khachhang','id_khachhang');
    }
}
