<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;
    protected $table='chitietdonhang';
    protected $primaryKey = 'id_ctdh';
    public $timestamps = false;
    public function donhang(){
    	return $this->belongsTo('App\Models\donhang','id_donhang','id_ctdh');
    }
    public function sanpham(){
    	return $this->belongsTo('App\Models\sanpham','id_sanpham','id_ctdh');
    }
}
