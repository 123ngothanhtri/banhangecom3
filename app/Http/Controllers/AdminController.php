<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    function login_admin(){
        return view('admin.loginAdmin');
    }
    function xuly_login_admin(Request $r){
        if(Auth::guard('admin')->attempt(['email'=>$r['em'],'password'=>$r['pw']]))
        {
            return redirect()->route('thongke');
        }
        else {
            return back()->with('er','Sai tài khoản mật khẩu');
        }
        
     }
    function logout_admin(){
        Auth::guard('admin')->logout();
        return view('admin.loginAdmin');
    }
    function admin(){
        $ad=Auth::guard('admin')->user();
        return view('admin.Admin',compact('ad'));
    }
    function doimatkhau(Request $r){
        $dmk=Admin::find($r->ipid);
        // if($dmk->password==$r->ipmkc){
        //      $dmk->password= bcrypt($r->ipmkm);
        //      $dmk->save();
        //      return back()->with('ss','Đổi mật khẩu thành công');
        // }
        // else{
        //     return back()->with('ss','Đổi mật khẩu thất bại');
        // }
        $dmk->password=bcrypt($r->ipmkm);
        $dmk->save();
        return back()->with('ss','Đổi mật khẩu thành công');
    }
    function doiten(Request $r){
        $dt=Admin::find($r->ipid);
        $dt->name=$r->ipname;
        $dt->save();
        return back()->with('dt','Đổi tên đăng nhập thành công');
    }
}
