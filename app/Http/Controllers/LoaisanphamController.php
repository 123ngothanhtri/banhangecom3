<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loaisanpham;
use App\Models\sanpham;
class LoaisanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = loaisanpham::all();
        return view('admin.LoaiSanPham',['data'=>$data]);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $r)
    {
        $new =new loaisanpham;
        $new->name_loaisanpham = $r['ipname'];
        $new->save();
        return back();
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=loaisanpham::find($id);
        return view('admin.SuaLoaiSanPham',['data'=>$data]);
    }

    
    public function update(Request $r, $id)
    {
        $data=loaisanpham::find($id);
        $data->name_loaisanpham=$r['ipname'];
        $data->save();
        return redirect()->route('loaisanpham.index');
    }

    
    public function destroy($id)
    {
        $sp=sanpham::all()->where('id_loaisanpham',$id);
        if(count($sp)==0){
            $data = loaisanpham::destroy($id);
            return back();
        }
        else{
            return back()->with('msg_delete','Còn sản phẩm thuộc loại này nên không xóa được');
        }
    }
}
