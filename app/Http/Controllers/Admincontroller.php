<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Type_product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class Admincontroller extends Controller
{
    //
    public function getdangnhapadmin()
    {
       return view("admin/pages/dangnhap");
    }
    // public function postdangnhapadmin(Request $req)
    // {
    //     $validate=$req->validate([
    //     'email'=>'required|email',
    //     'password'=>'required|min:3|max:20'
    //     ],[
    //         'email.required'=>'Bạn chưa  nhập email',
    //         'email.email'=>'Bạn nhập sai định dạng email',
    //         'password.required'=>'Bạn chưa nhập password',
    //         'password.min'=>'Vui lòng nhập mật khẩu ít nhất 3 kí tự',
    //         'password.max'=>'Vui lòng nhập mật khẩu không quá 20 kí tự'
    //     ]);
    //     $chungthuc=array('email'=>$req->email,'password'=>$req->password);
    //     $user= User::where('email',$req->email)->first();
    //     if($user->quyen==1){
    //         if(Auth::attempt($chungthuc)){
    //             // return redirect('admin/pages/trangchu');
    //             return redirect('frontend/pages/trangchu');
    //         }
    //         else
    //         {
    //             return redirect()->back()->with(['matb'=>'0','nodung'=>'Đăng nhập thất bại']);
    //         }
    //     }
    //     else
    //     {
    //      return redirect()->back()->with(['matb'=>'0','noidung'=>'Bạn không  phải admin ']);
    //     }
      
    // }
   
    public function postdangnhapadmin(Request $req)
    {
        $validate = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:20'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn nhập sai định dạng email',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Vui lòng nhập mật khẩu ít nhất 3 kí tự',
            'password.max' => 'Vui lòng nhập mật khẩu không quá 20 kí tự'
        ]);
    
        $chungthuc = array('email' => $req->email, 'password' => $req->password);
    
        // Cố gắng đăng nhập người dùng
        if(Auth::attempt(['email'=>$validate['email'],'password'=>$validate['password']])){
           
            return redirect('admin/loaisanpham/danh-sach-phan-loai');
            
            }
            else{
                return redirect('dang-nhap-admin')->with(['matb'=>'0','noidung'=>'Đăng nhập thất bại']);
            }
    }
    //producttype
    public function productstype(){
        if(Auth::check())
        {
            $loaisanpham = Type_product::orderBy('id', 'desc')->paginate(5);
            return view('admin/pages/danhsachloai',compact('loaisanpham'));
        }
        else
        {
          return redirect('dang-nhap-admin');
        }
    }
    // public function addtypeproduct(Request $req){
    //     $validate=$req->validate([
    //         'name'=>'required',
    //         'description'=>'required',
    //         'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

    //     ],[
    //         'name.required'=>'Bạn chưa nhập tên loại sản phẩm ',
    //         'description'=>'Bạn chưa nhập mô tả',
    //         'image.required'=>'Bạn chưa chọn hình ảnh',
    //         'image.mimes'=>'Chọn tập tin :jpg,png,jpeg'
    //     ]);
    //     if($req->has('image'))
    //     {
    //          $file=$req->image;
    //          $ext=$req->imag->extension();
    //          $file_name=time().'-'.'productstype.'.$ext;
    //          $file->move(public_path('resources/assets/dest/product'),$file_name);
    //     }
    // }
    public function getproducttypes(){
        return view('admin/pages/themloaisanpham');
    }
    public function addtypeproduct(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'name.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'description' => 'Bạn chưa nhập mô tả',
            'image.required' => 'Bạn chưa chọn hình ảnh',
            'image.mimes' => 'Chọn tập tin :jpg,png,jpeg'
        ]);

        if ($req->hasFile('image')) {
            $file = $req->image;
            $ext = $req->image->extension();
            $file_name = time() . '-' . 'productstype.' . $ext;
            $file->move('resources/assets/dest/product', $file_name);
        }
        $products=new Type_product;
        $products->name=$validate['name'];
        $products->description=$validate['description'];
        $products->image= $file_name;
        $products->save();
        return redirect()->back()->with('thongbao','Thêm sản phẩm thành công');
    }

    public function geteditproducttype($id){
        if(Auth::check()){
            $products=Type_product::find($id);
            return view('admin/pages/sualoaisanpham',compact('products'));
        }
        else
        {
            return view('admin/pages/dangnhap');
        }
    }
    public function editproducttype(Request $req , $id){
      
        $validate = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'name.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'description' => 'Bạn chưa nhập mô tả',
            'image.required' => 'Bạn chưa chọn hình ảnh',
            'image.mimes' => 'Chọn tập tin :jpg,png,jpeg'
        ]);

        if ($req->hasFile('image')) {
            $file = $req->image;
            $ext = $req->image->extension();
            $file_name = time() . '-' . 'productstype.' . $ext;
            $file->move('resources/assets/dest/product', $file_name);
        }
        $products=Type_product::find($id);
        $products->name=$validate['name'];
        $products->description=$validate['description'];
        $products->image= $file_name;
        $products->save();
        return redirect('admin/loaisanpham/danh-sach-phan-loai')->with('thongbao','Cập nhật sản phẩm thành công');
    }
    public function deleteproducttype($id)
    {
        // Tìm bản ghi với ID tương ứng
        $products = Type_product::find($id);
        $sanpham=Product::where('id_type',$id)->count();
        // Kiểm tra xem bản ghi có tồn tại không
        if($sanpham==0)
        {
            $products->delete();
            return redirect('admin/loaisanpham/danh-sach-phan-loai')->with('thongbao', 'Xóa sản phẩm thành công');
        }
         else {
            // Nếu không tồn tại, chuyển hướng với thông báo lỗi
            return redirect('admin/loaisanpham/danh-sach-phan-loai')->with('thongbao', 'Không thể xóa ');
        }
    }
    public function gettong(){
        $total = Bill::all();
        $tong = $total->sum('total');
        return view('admin/layouts/master',compact('tong'));
    }
    public function getbills()
    {
        if(Auth::check())
        {
            $donhang = Bill::join('customer', 'customer.id', '=', 'bills.id_customer')
            ->select('bills.id as bill_id', 'customer.id as customer_id','bills.*', 'customer.*')
            ->get();
            return view('admin/pages/dsdonhang/danhsachdonhang',compact('donhang'));
        }
        else       
        {
            return view('admin/pages/dangnhap');
        }
    }
    public function geteditbill($id)
    {
        $dhg=Bill::find($id);//lấy ra hóa đơn
        $cus=Customer::find($dhg->id_customer);//lấy ra khách hàng có hóa đơn
        $ct_hd=Bill_detail::where('id_bill',$dhg->id)
                                ->join('products','products.id','=','bill_detail.id_product')
                                ->get(['products.name','bill_detail.quantity','bill_detail.unit_price']);
        return view('admin/pages/dsdonhang/chitietdonhang',compact('dhg','cus','ct_hd'));
    }
    public function posteditbill(Request $req,$id)
    {
      $dhg=Bill::find($id);
      $dhg->state=$req->state;
      $dhg->save();
      return redirect()->back()->with('thongbao','Đã cập nhật đơn');
    }
    public function getproducts(){
        if(Auth::check()){
            $products=Product::orderBy('id', 'desc')->paginate(10);
            return view('admin/pages/dssanpham/product',compact('products'));
        }
        else
        {
            return view('admin/pages/dangnhap');
        }
    }

    public function getthemsanpham()
    {
      if(Auth::check())
      {
        $type_pro=Type_product::all();
        return view('admin/pages/dssanpham/themsanpham',compact('type_pro'));
      }
      else
      {
          return view('admin/pages/dangnhap');
      }
    }
    public function addproducts(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required',
            'loaisp'=>'required',
            'price'=>'required',
            'pro_price'=>'required',
            'unit'=>'required',
            'des'=>'required',
            'rdoStatus'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'loaisp.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'price.required' => 'Bạn chưa nhập giá',
            'pro_price.required' => 'Bạn chưa nhập giá khuyến mãi của sản phẩm ',
            'des.required' => 'Bạn chưa nhập mô tả',
            'unit.required' => 'Bạn chưa nhập số lượng sản phẩm ',
            'rdoStatus.products' => 'Bạn chưa nhập mô tả',
            'image.required' => 'Bạn chưa chọn trang thái sản phẩm ',
            'image.mimes' => 'Chọn tập tin :jpg,png,jpeg'
        ]);

        if ($req->hasFile('image')) {
            $file = $req->image;
            $ext = $req->image->extension();
            if($ext!='jpg'&& $ext!='png' && $ext!='jpeg'&&$ext!='gif')
            {
                return redirect()->back()->with('thongbao','Tệp hình phải là file jpg , png , jpeg ,gif');
            }
            $file_name = time() . '-' . 'productstype.' . $ext;
            $file->move('resources/assets/dest/product', $file_name);
        }
        $products=new Product;
        $products->name=$validate['name'];
        $products->id_type=$validate['loaisp'];
        $products->unit_price=$validate['price'];
        $products->promotion_price=$validate['pro_price']!=null?$validate['pro_price']:0;
        $products->description=$validate['des'];
        $products->unit=$validate['unit'];
        $products->new=$validate['rdoStatus'];
        $products->image= $file_name;
        $products->save();
        return redirect()->back()->with('thongbao','Thêm sản phẩm thành công');
    }
    public function geteditproducts($id)
    {
      $product=Product::find($id);
      $type_pro=Type_product::all();
      return view('admin/pages/dssanpham/suasanpham',compact('product','type_pro'));
    }
    public function posteditproducts(Request $req ,$id)
    {
        $validate = $req->validate([
            'name' => 'required',
            'loaisp'=>'required',
            'price'=>'required',
            'pro_price'=>'required',
            'unit'=>'required',
            'des'=>'required',
            'rdoStatus'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'loaisp.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'price.required' => 'Bạn chưa nhập giá',
            'pro_price.required' => 'Bạn chưa nhập giá khuyến mãi của sản phẩm ',
            'des.required' => 'Bạn chưa nhập mô tả',
            'unit.required' => 'Bạn chưa nhập số lượng sản phẩm ',
            'rdoStatus.products' => 'Bạn chưa nhập mô tả',
            'image.required' => 'Bạn chưa chọn trang thái sản phẩm ',
            'image.mimes' => 'Chọn tập tin :jpg,png,jpeg'
        ]);
        if ($req->hasFile('image')) {
            $file = $req->image;
            $ext = $req->image->extension();
            $file_name = time() . '-' . 'products.' . $ext;
            $file->move('resources/assets/dest/product', $file_name);
        }
        $products=Product::find($id);
        $products->name=$validate['name'];
        $products->id_type=$validate['loaisp'];
        $products->unit_price=$validate['price'];
        $products->promotion_price=$validate['pro_price']!=null?$validate['pro_price']:0;
        $products->description=$validate['des'];
        $products->unit=$validate['unit'];
        $products->new=$validate['rdoStatus'];
        $products->image= $file_name;
        $products->save();
        return redirect()->back()->with('thongbao','Cập nhật sản phẩm thành công');
    }
    public function deleteproducts($id)
    {
       $pro=Product::find($id);
       $pro->delete();
       return redirect()->back()->with('thongbao','Xóa sản phẩm thành công');
    }
    public function getkhachhang()
    {
        if(Auth::check())
        {
            $customer=Customer::all();
            return view('admin/pages/customers/danhsach',compact('customer'));
        }
        else
        {
            return view('admin/pages/dangnhap');
        }
       
    }
    public function xoakhachhang($id)
    {
        $cus=Bill::where('id_customer',$id)->count();
        if($cus==0)
        {
            $customer=Customer::find($id);
            $customer->delete();
        }
        else
        {
            return redirect()->back()->with('thongbao','Không thể xóa khách hàng');
        }
    }

    public function getuser(){
        if(Auth::check()){
            $user=User::orderBy('id', 'desc')->paginate(5);
            return view('admin/pages/user/danhsach',compact('user'));
        }
        else
        {
            return view('admin/pages/dangnhap');
        }
    }
    public function getadduser()
    {

        if(Auth::check()){
            return view('admin/pages/user/them');
        }
        else
        {
            return view('admin/pages/dangnhap');
        }
    }
    public function postadduser(Request $req)
    {
        $validate = $req->validate([
            'fullname' => 'required',
            'email'=>'required',
            'pass1'=>'required',
            'pass2'=>'same:pass1',
            'phone'=>'required',
            'address'=>'required',
            'quyen'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'fullname.required' => 'Bạn chưa nhập tên user',
            'email.required' => 'Bạn chưa nhập email',
            'pass1.required' => 'Bạn chưa password',
            'pass2.same' => 'Password không trùng khớp ',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'quyen.required' => 'Bạn chưa quyền truy cập',
            'image.required' => 'Bạn chưa chọn hình sản phẩm ',
            'image.mimes' => 'Chọn tập tin :jpg,png,jpeg'
        ]);
        if ($req->hasFile('image')) {
            $file = $req->image;
            $ext = $req->image->extension();
            if($ext!='jpg'&& $ext!='png' && $ext!='jpeg'&&$ext!='gif')
            {
                return redirect()->back()->with('thongbao','Tệp hình phải là file jpg , png , jpeg ,gif');
            }
            $file_name = time() . '-' . 'user.' . $ext;
            $file->move('resources/assets/dest/product', $file_name);
        }
        $us=new User;
        $us->full_name=$validate['fullname'];
        $us->email=$validate['email'];
        $us->password=Hash::make($validate['pass2']);
        $us->phone=$validate['phone'];
        $us->address=$validate['address'];
        $us->quyen=$validate['quyen'];
        $us->image= $file_name;
        $us->save();
        return redirect()->back()->with('thongbao','Thêm thành công');
    }
    public function getedituser($id)
    {

        if(Auth::check()){
            $user=User::find($id);
            return view('admin/pages/user/sua',compact('user'));
        }
        else
        {
            return view('admin/pages/dangnhap');
        }
    }
    public function postedituser(Request $req,$id)
    {
        $validate = $req->validate([
            'fullname' => 'required',
            'email'=>'required',
            'pass1'=>'required',
            'pass2'=>'same:pass1',
            'phone'=>'required',
            'address'=>'required',
            'quyen'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'fullname.required' => 'Bạn chưa nhập tên user',
            'email.required' => 'Bạn chưa nhập email',
            'pass1.required' => 'Bạn chưa password',
            'pass2.same' => 'Password không trùng khớp ',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'quyen.required' => 'Bạn chưa quyền truy cập',
            'image.required' => 'Bạn chưa chọn hình sản phẩm ',
            'image.mimes' => 'Chọn tập tin :jpg,png,jpeg'
        ]);
        if ($req->hasFile('image')) {
            $file = $req->image;
            $ext = $req->image->extension();
            if($ext!='jpg'&& $ext!='png' && $ext!='jpeg'&&$ext!='gif')
            {
                return redirect()->back()->with('thongbao','Tệp hình phải là file jpg , png , jpeg ,gif');
            }
            $file_name = time() . '-' . 'user.' . $ext;
            $file->move('resources/assets/dest/product', $file_name);
        }
            $us=User::find($id) ;
            $us->full_name=$validate['fullname'];
            $us->email=$validate['email'];
            $us->password=Hash::make($validate['pass2']);
            $us->phone=$validate['phone'];
            $us->address=$validate['address'];
            $us->quyen=$validate['quyen'];
            $us->image= $file_name;
            $us->save();
            return redirect()->back()->with('thongbao','Sửa thành công');
    }
    public function deleteuser($id)
    {        
            $user=User::find($id);
            $user->delete();
            return redirect('admin/user/danh-sach-nguoi-dung')->with('thongbao','Xóa thành công');
            
    }
    public function getdangxuat(){
        Auth::logout();
        return redirect('dang-nhap-admin')->with(['matb'=>'0','noidung'=>'Đăng xuất thành công']);
    }
    public function getthongtin(){
        if(Auth::check())
        {
            return view('admin/pages/thongtin');
        }
        else
        {
            return view('admin/pages/dangnhap');
        }
    }


    

}
