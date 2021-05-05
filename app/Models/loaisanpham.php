<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    use HasFactory;
    protected $table='loaisanpham';
    protected $primaryKey = 'id_loaisanpham';
    public $timestamps = false;
    public function sanpham(){
    	return $this->hasMany('App\Models\sanpham','id_loaisanpham','id_loaisanpham');
    }
}
