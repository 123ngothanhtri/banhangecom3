<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function register_user(){
        return view('home.registerUser');
    }
    function xuly_register_user(Request $r){
        $this->validate($r,[
            'hoten'=>'required|min:3|max:50',
            'email'=>'required|min:5|max:90',
            'pwd'=>'required|min:5|max:50',
        ],[
            'hoten.required'=>'Phải nhập họ tên',
            'hoten.min'=>'Tên phải đủ 3 kí tự ',
            'hoten.max'=>'Tên phải ít hơn 50 kí tự',
            'email.required'=>'Phải nhập email',
            'email.min'=>'Email phải đúng định dạng',
            'email.max'=>'Email phải đúng định dạng',
            'pwd.min'=>'Phải nhập mật khẩu',
            'pwd.min'=>'Mật khẩu phải đủ 3 kí tự',
            'pwd.max'=>'Mật khẩu phải ít hơn 50 kí tự',
        ]);
        $checkEmail=User::all()->where('email','=',$r->email);
        if(count($checkEmail)>0){
            return back()->with('er','Email đã được đăng ký');
        }
        else {
            $user=new User;
            $user->name=$r['hoten'];
            $user->email=$r['email'];
            $user->sdt=$r['sdt'];
            $user->ngaysinh=$r['ngaysinh'];
            $user->gioitinh=$r['gioitinh'];
            $user->diachi=$r['diachi'];
            $user->password=bcrypt($r['pwd']);
            $user->remember_token=$r['_token'];
            $user->save();
            return redirect('login_user')->with('msg','Đăng ký thành công');
        }    
    }
    function login_user(){
        return view('home.loginUser');
    }
    function xuly_login_user(Request $r){
        if(Auth::guard('web')->attempt(['email'=>$r['em'],'password'=>$r['pw']])){
            return redirect('/profile_user');
        }
        else {
            return back()->with('er','Sai tài khoản mật khẩu');
        }
        
    }
     function profile_user(){
        $uu=Auth::guard('web')->user();
        return view('home.profileUser',['uu'=>$uu]);
    }
    function logout_user(){
        Auth::guard('web')->logout();
        return view('home.loginUser');
    }
    function change_info_user(Request $r){
        // $this->validate($r,[
        //     'hoten'=>'required|min:3|max:50',
        //     'email'=>'required|min:5|max:90',
        //     'pwd'=>'required|min:5|max:50',
        // ],[
        //     'hoten.required'=>'Phải nhập họ tên',
        //     'hoten.min'=>'Tên phải đủ 3 kí tự ',
        //     'hoten.max'=>'Tên phải ít hơn 50 kí tự',
        //     'email.required'=>'Phải nhập email',
        //     'email.min'=>'Email phải đúng định dạng',
        //     'email.max'=>'Email phải đúng định dạng',
        //     'pwd.min'=>'Phải nhập mật khẩu',
        //     'pwd.min'=>'Mật khẩu phải đủ 3 kí tự',
        //     'pwd.max'=>'Mật khẩu phải ít hơn 50 kí tự',
        // ]);
            $iduser = Auth::guard('web')->user()->id;
            $user=User::find($iduser);
            $user->name=$r['hoten'];
            $user->sdt=$r['sdt'];
            $user->ngaysinh=$r['ngaysinh'];
            $user->gioitinh=$r['gioitinh'];
            $user->diachi=$r['diachi'];
            $user->save();
            return redirect('profile_user')->with('msg','Thay đổi thông tin thành công');
    }
    
}
