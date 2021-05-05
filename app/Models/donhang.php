<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    protected $table='donhang';
    protected $primaryKey = 'id_donhang';
    public function khachhang(){
    	return $this->belongsTo('App\Models\khachhang','id_khachhang','id_donghang');
    }
    public function sanpham(){
    	return $this->hasTo('App\Models\sanpham','id_sanpham','id_donghang');
    }

}
