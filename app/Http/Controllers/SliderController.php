<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use File;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = slider::all();
        return view('admin.Slider',['data'=>$data]);
    }
    public function create()
    {
        //
    }
    public function store(Request $r)
    {
        $new =new slider;
        $new->name_slider = $r['ipname'];
        $new->image_slider = $r->file('ipimg')->store('','slider');
        $new->save();
        return back()->with('msg_add','Thêm thành công');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        $data = slider::find($id);
        File::delete(public_path('slider/'.$data['image_slider']));
        $data->delete();
        return back()->with('msg_delete','Xóa thành công');
    }
}
