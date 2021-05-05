<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table='sanpham';
    protected $primaryKey = 'id_sanpham';
    public $timestamps = false;
    public function loaisanpham(){
    	return $this->belongsTo('App\Models\loaisanpham','id_loaisanpham_id','id_sanpham');
    }
    public function chitietdonhang(){
    	return $this->hasMany('App\Models\chitietdonhang','id_sanpham','id_sanpham');
    }

}
