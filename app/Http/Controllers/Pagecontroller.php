<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Type_product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;



class Pagecontroller extends Controller
{
    //
    public function getIndex(){
         $slide =Slide::all();
         $new_product=Product::where("new","=",1)->paginate(4,['*'],'page_new');
         $pro_product=Product::where("promotion_price","!=",0)->paginate(8,['*'],'page_promotion');
        return view('frontend/pages/trangchu',compact('slide','new_product','pro_product'));
    }
    public function getloaisanpham($type){
        $loai=Type_product::where('id','=',$type)->first();
        $listloai=Type_product::all();
        $sanpham_theoloai=Product::where('id_type','=',$type)->get();
        $sanpham_khac=Product::where('id_type','=',$type)->paginate(6);
        return view('frontend/pages/loai_sanpham',compact('loai','listloai','sanpham_theoloai','sanpham_khac'));
    }
    public function getchitietsanpham($id){
        $sanpham= Product::where('id','=',$id)->first();
        $sanpham_tuongtu=Product::where('id_type','=',$sanpham->id_type)->paginate(3);
        $new_product=Product::where('new','=',1)->take(4)->get();
        $sp_banchay=Bill_detail::selectRaw('id_product,sum(quantity) as total')->groupBy('id_product')->orderByDesc('total')->take(4)->get();
        return view('frontend/pages/chitiet_sanpham',compact('sanpham','sanpham_tuongtu','new_product','sp_banchay'));
    }
    public function getthemgiohang(Request $req ,$id){
        $sanpham=Product::find($id);
        $oldcart=Session('cart') ? Session::get('cart') :null;
        $cart= new Cart($oldcart);
        $cart->add($sanpham,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getxoagiohang($id){
        $oldcart=Session('cart') ? Session::get('cart') :null;
        $cart= new Cart($oldcart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function increase($id){
        $oldcart=Session('cart') ? Session::get('cart') :null;
        $cart= new Cart($oldcart);
        $cart->increaseQuantity($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function decrease($id){
        $oldcart=Session('cart') ? Session::get('cart') :null;
        $cart= new Cart($oldcart);
        $cart->decreaseQuantity($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getdathang(){
        return view('frontend/pages/dathang');
    }
    public function postdathang(Request $req){
        $cart =Session::get('cart');
        // if ($cart) {
        //     dd($cart->totalPrice); // In giá trị của totalPrice để kiểm tra
        // } else {
        //     echo "Cart is null";
        // }
        $cus = new Customer;
        $cus->name=$req->name;
        $cus->gender=$req->gender;
        $cus->email=$req->email;
        $cus->address=$req->address;
        $cus->phone_number=$req->phone;
        $cus->note=$req->notes;
        $cus->save();

        $bill = new Bill;
        $bill->id_customer=$cus->id;
        $bill->date_order = date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill->note=$req->notes;
        $bill->save();
        
        foreach($cart->items as $key=>$value)
        {
           $bd=new Bill_detail;
           $bd->id_bill=$bill->id;
           $bd->id_product=$key;
           $bd->quantity=$value['qty'];
           $bd->unit_price=($value['price'] / $value['qty']);
           $bd->save();
        }
        Session::forget('cart');
        return view('frontend/pages/thongbao');
    }
    public function Postdangky(Request $req){
        $validate=$req->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:20',
            'repassword'=>'required|same:password',
            'address'=>'required',
            'fullname'=>'required',
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng',
            'email.unique'=>'Email đã được dùng ',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Bạn vui lòng nhập ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không được vượt quá 20 kí tự ',
            'repassword.required'=>'Bạn chưa nhập repassword',
            'repassword.same'=>'Mật khẩu và password không trùng với nhau',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'address.fullname'=>'Bạn chưa nhập họ tên',
        ]);
        $user = new User;
        $user->full_name=$req->fullname;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect()->back()->with("thongbao","Đăng kí thành công");

    }
    public function postdangnhap(Request $req){
        $validate=$req->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:20',
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Bạn vui lòng nhập ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không được vượt quá 20 kí tự ',
        ]);
        $chungthuc=array('email'=>$req->email,'password'=>$req->password);
            if(Auth::attempt($chungthuc))
            {
                return redirect('trangchu');
            }
            else
            {
                return redirect()->back()->with(['matb'=>'0','noidung'=>'Đăng nhập thất bại']);
            }
    }
    public function gettimkiem(Request $req){
        $products = Product::where("name", "like", "%" . $req->key . "%")
            ->orWhere("unit_price", $req->key)
            ->get();
    
        return view('frontend/pages/timkiem', compact('products'));
    }
    
    public function getdangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    public function getgioithieu(){
        return view('frontend/pages/gioithieu');
    }
    public function getlienhe(){
        return  view('frontend/pages/lienhe');
    }
    public function getdangnhap(){
        return view('frontend/pages/dangnhap');
    }
    public function getdangky(){
        return view('frontend/pages/dangky');
    }
}
