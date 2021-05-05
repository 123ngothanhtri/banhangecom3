<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\chitietdonhang;
use File;
class SanphamController extends Controller
{
    public function index()
    {
        $data = sanpham::join('loaisanpham', 'sanpham.id_loaisanpham', 'loaisanpham.id_loaisanpham')->get();
        return view('admin.SanPham',['data'=>$data]);
    }

    public function create()
    {
        $lsp=loaisanpham::all();
        return view('admin.ThemSanPham',['lsp'=>$lsp]);
    }

    public function store(Request $r)
    {
        $new =new sanpham;
        $new->name_sanpham = $r->ipname;
        $new->id_loaisanpham = $r['iploaisp'];
        $new->price_sanpham = $r['ipgiaban'];
        $new->discount_sanpham = $r['ipgiamgia'];
        $new->description_sanpham = $r['ipmota'];
        $new->amount_sanpham = $r['ipsl'];
        $new->image_sanpham= $r->file('ipimg')->store('','local');
        $new->save();
        return redirect()->route('sanpham.index')->with('msg_add','Thêm thành công');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=sanpham::find($id);
        $data2 = loaisanpham::all();
        return view('admin.SuaSanPham',['data'=>$data,'data2'=>$data2]);
    }

    public function update(Request $r, $id)
    {
        $new=sanpham::find($id);
        $new->name_sanpham = $r['ipname'];
        $new->id_loaisanpham = $r['iploaisp'];
        $new->price_sanpham = $r['ipgiaban'];
        $new->amount_sanpham = $r['ipsl'];
        $new->discount_sanpham = $r['ipgiamgia'];
        $new->description_sanpham = $r['ipmota'];
        $new->save();
        return redirect()->route('sanpham.index');
    }

    public function destroy($id)
    {
        $cthd=chitietdonhang::all()->where('id_sanpham','=',$id);
        if(count($cthd)==0){
            $xoa = sanpham::find($id);
            File::delete(public_path('images/'.$xoa['image_sanpham']));
            $xoa->delete();
            return back()->with('msg_add','Xóa thành công');
        }
        else{
            return back()->with('msg_not','Sản phẩm này có trong đơn hàng nên không xóa được');
        }
        
    }
}
