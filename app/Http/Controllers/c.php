<?php
namespace App\Http\Controllers;
use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\slider;
use App\Models\khachhang;
use App\Models\donhang;
use App\Models\chitietdonhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use File;
use Cart;
class c extends Controller
{


    function tangsoluong($rowid){
        $ww=Cart::get($rowid);
        $quantity=$ww->qty;
        Cart::update($rowid,$quantity+=1);
        return back();
    }
    function giamsoluong($rowid){
        $ww=Cart::get($rowid);
        $quantity=$ww->qty;
        Cart::update($rowid,$quantity-=1);
        return back();
    }
    public function cart()
    {
        return view('home.giohang');
    }
    public function addToCart($id)
    {
        $p = sanpham::find($id);
        Cart::add($p->id_sanpham,$p->name_sanpham,1,$p->price_sanpham,0,['photo'=>$p->image_sanpham]);
        return redirect('/')->with('msg','Thêm vào giỏ hàng thành công!');
    }
    function xoahang($id){
        Cart::remove($id);
        return back();
    }



    function paypal_thanhtoan(){
        $user=Auth::guard('web')->user();
    
        
        $dh=new donhang;
        $dh->total_donhang=Cart::total();
        $dh->id_users=$user->id;
        $dh->save();
        
        foreach(Cart::content() as $c){
            $cthd = new chitietdonhang;
            $cthd->id_donhang=$dh->id_donhang;
            $cthd->id_sanpham=$c->id;
            $cthd->quantity=$c->qty;
            $cthd->id_users=$user->id;
            $cthd->save();
        }
        Cart::destroy();
        return view('home.paypal_thanhcong');
    }


    function xulydonhang(Request $r){
        // $this->validate($r,[
        //     'ipname'=>'required|min:3|max:90',
        //     'ipdiachi'=>'required|min:10|max:200',
        //     'ipsdt'=>'required|min:10|max:20',
        //     'ipemail'=>'min:15|max:90',
        // ],[
        //     'ipname.min'=>'Tên phải từ 3 đến 10 kí tự ',
        //     'ipname.max'=>'Tên phải từ 3 đến 10 kí tự',
        //     'ipdiachi.min'=>'Địa chỉ phải nhiều hơn 10 ký tự',
        //     'ipsdt.min'=>'Số điện thoại phải đủ 10 số',
        //     'ipemail.min'=>'Email phải đúng định dạng',
        // ]);
        $ff=Cart::total();
        if($ff==0){
            return back()->with('msg_not','Không có sản phẩm để đặt hàng');
        }


        // $kh=new khachhang;
        // $kh->name_khachhang=$r['ipname'];
        // $kh->phone_khachhang=$r['ipsdt'];
        // $kh->email_khachhang=$r['ipemail'];
        // $kh->address_khachhang=$r['ipdiachi'];
        // $kh->save();
        $user=Auth::guard('web')->user();

        $dh=new donhang;
        $dh->total_donhang=Cart::total();
        $dh->id_users=$user->id;
        $dh->save();
        
        foreach(Cart::content() as $c){
            $cthd = new chitietdonhang;
            $cthd->id_donhang=$dh->id_donhang;
            $cthd->id_sanpham=$c->id;
            $cthd->quantity=$c->qty;
            $cthd->id_users=$user->id;
            $cthd->save();
        }
        Cart::destroy();
        return view('home.dathangthanhcong');
    }

    function trangchu(){
        $sp=sanpham::all();//paginate(10);
        $spgg=sanpham::where('discount_sanpham','>','0')->get();
        $lsp=loaisanpham::all();
        $slider=slider::all();
        return view('home.trangchu',compact('slider','sp','spgg','lsp'));
    }


    function donhang(){
        $ctdh=chitietdonhang::join('donhang','chitietdonhang.id_donhang','donhang.id_donhang')
        ->join('sanpham','chitietdonhang.id_sanpham','sanpham.id_sanpham')
        ->join('users','chitietdonhang.id_users','users.id')
                        ->get();
        return view('admin.DonHang',['ctdh'=>$ctdh]);
    }

   
    function chitietsanpham($id,$maloai){
        $ctsp=sanpham::find($id);
        $sp=sanpham::all()->where('id_loaisanpham',$maloai);//paginate(10);
        $spgg=sanpham::where('discount_sanpham','>','0')->get();
        $lsp=loaisanpham::all();
        return view('home.chitietsanpham',compact('ctsp','sp','spgg','lsp'));
    }
    function xoachitietdonhang($iddh,$idkh){
        $xoa = chitietdonhang::where('id_donhang','=',$iddh);
        $xoa->delete();
        donhang::destroy($iddh);
        khachhang::destroy($idkh);
        return back();
    }

//==================================================================================
    function khachhang(){
        $kh = User::all();
        return view('admin.KhachHang',compact('kh'));
    }
//==========================================================================================
function thongke(){
    $sp = sanpham::all();
    $dhcxn = donhang::where('status_donhang','0')->get();
    $dh = donhang::all();
    $users = User::all();
    $lsp = loaisanpham::all();
    return view('admin.ThongKe',compact('sp','dhcxn','lsp','users','dh'));
}

//========================================================================================
function xacnhanstatus($id){
    $xn=donhang::find($id);
    $xn->status_donhang=1;
    $xn->save();
    return back();
}
//===========================================================================================
    
    function timkiem(Request $r){
        $tukhoa=$r['timkiem'];
        $data=sanpham::join('loaisanpham', 'sanpham.id_loaisanpham', 'loaisanpham.id_loaisanpham')
                    ->where('name_sanpham','like',"%$tukhoa%")
                    ->orWhere('id_sanpham','like',"%$tukhoa%")
                    ->orWhere('name_loaisanpham','like',"%$tukhoa%")
                    ->get();//->stake(30)->paginate(5);
        return view('admin.TimKiemSanPham',compact('data','tukhoa'));
    }
    
     function xulylogindathang(Request $r){
        if(Auth::guard('web')->attempt(['name'=>$r['em'],'password'=>$r['pw']]))
        {
            return redirect('/dathang');
        }
        // else if(Auth::guard('web')->attempt([
        //                             'name'=>$r['em'],
        //                             'password'=>$r['pw']
        // )){
        //     return redirect('/')->with('msg','dang nhap thanh cong');
           
        // }
        else {
             return back()->with('er','Sai tài khoản mật khẩu');
        }
    }
    function loc(Request $r){
        if($r->iploaisp==0){
            $sp=sanpham::all();
        }
        else {
            $sp=sanpham::all()->where('id_loaisanpham',$r->iploaisp);
        }
        $spgg=sanpham::where('discount_sanpham','>','0')->get();
        $lsp=loaisanpham::all();
        $slider=slider::all();
        return view('home.trangchu',compact('slider','sp','spgg','lsp'));

    }
    
    
    function dathang(){
        return view('home.dathang');
    }
    

}