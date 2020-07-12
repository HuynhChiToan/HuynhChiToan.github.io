<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Sanpham;
use App\Loaisanpham;
use App\Cart;
use App\Customer;
use App\Gia;
use App\chitiethoadon;
use Session;
use Hash;
use App\User;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Sanpham::where('new',1)->paginate(4);
        $sanphamkhuyenmai = Sanpham::where('promotion_price','<>',0)->paginate(8);
    	return view('page.Trangchu',compact('slide','new_product','sanphamkhuyenmai'));
    }
    public function getLoaisanpham($type){
        $sptheoloai = Sanpham::where('id_type',$type)->get();
        $sp_khac = Sanpham::where('id_type','<>',$type)->paginate(3);
        $loai = Loaisanpham::all();
        $loap_sp = Loaisanpham::where('id',$type)->first();
    	return view('page.loaisanpham',compact('sptheoloai','sp_khac','loai','loap_sp'));
    }
    public function getchitietsanpham(Request $req){
        $sanpham = Sanpham::where('id',$req->id)->first();
        $sp_tuongtu = Sanpham::where('id_type',$sanpham->id_type)->paginate(6);
    	return view('page.chitietsanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getlienhe(){
    	return view('page.lienhe');
    }
    public function getgioithieu(){
    	return view('page.gioithieu');
    }
    public function getdangnhap(){
        return view('page.dangnhap');
    }
    public function getdangki(){
        return view('page.dangki');
    }
    public function postdangki(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:5|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'vui lòng nhập lại email!',
                'email.email'=>'không đúng định dạng!',
                'email.unique'=>'Email đã sử dụng!',
                'password.required'=>' vui lòng nhập lại!',
                're_password.same'=>'mật khẩu k giống nhau!',
                'password.min'=>'mật khẩu phải có ít nhất 5 kí tự và tối đa 20 kí tự!'
            ]
        );

        $user = new User();
        $user->full_name = $req->fullname;
        $user->email=$req->email;
        $user->password= Hash::make($req->password);
        $user->phone= $req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postdangnhap(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:5|max:20',
            ],
            [
                'email.required'=>'vui lòng nhập lại email!',
                'email.email'=>'không đúng định dạng!',
                'password.required'=>' vui lòng nhập lại!',
                'password.max'=>'mật khẩu phải tối đa 20 kí tự ',
                'password.min'=>'mật khẩu phải có ít nhất 5 kí tự '
            ]
        );
        $scedentials  = array('email' =>$req->email ,'password'=>$req->password );
        if(Auth::attempt($scedentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập k thành công']);
        }
    }

    public function postdangxuat(){
        Auth::logout();
        return redirect()->route('Trang-chu');

    }
    public function gettimkiem(Request $req){
        $product = Sanpham::where('name','like','%'.$req->key.'%')
                            ->orwhere('unit_price',$req->key)
                            ->get();
         return view('page.timkiem',compact('product'));                   
    }
    public function getAddtoCart(Request $req,$id){
        $product = Sanpham::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart -> add($product,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();

    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart ->removeItem($id);     
        Session::put('cart',$cart);     
        return redirect()->back();
    }
    public function getdathang(){
        return view('page.dat_hang');
    }
    public function postdathang(Request $req){
        $cart =Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->name;
        $customer->email = $req->email;
        $customer->addres = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment=$req->payment;
        $bill->note =$req->notes;
        $bill->save();

        foreach ($cart['items'] as $key => $value){
        $bill_detail = new chitiethoadon;
        $bill_detail->id_bill=$bill->id;
        $bill_detail->id_product=$key;
        $bill_detail->quantity=$value['qty'];
        $bill_detail->unit_price=($value['price']/$value['qty']);
        $bill_detail->save();
        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

}
