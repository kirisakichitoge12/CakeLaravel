@extends("admin/layouts/master")
@section("content")
   <!-- Page Content -->
<!-- <div id="page-wrapper">
   <div class="container-fluid"> -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Sửa Thông Tin
               <small>Loại {{$products->name}}</small>
            </h1>
         </div>
         <!-- /.col-lg-12 -->
         <div class="col-lg-3"></div>
         <div class="col-lg-6" style="padding-bottom:120px">
            @if($errors->any())
            <div class="alert alert-danger">
               @foreach($errors->all() as $error)
               {{$error}} <br />
               @endforeach
            </div>
            @endif
            @if(Session::has("thongbao"))
            <div class="alert alert-success">{{Session::get("thongbao")}}</div>
            @endif
            <form action="admin/loaisanpham/sualoaisanpham/{{$products->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
               <label>Tên Loại Sản Phẩm</label>
               <input class="form-control" name="name" value="{{$products->name}}" />
            </div>
            <div class="form-group">
               <label>Mô Tả</label>
               <textarea class="form-control" rows="4" name="description">{{$products->description}}</textarea>
            </div>
            <div class="form-group">
               <label>Hình ảnh</label>
               <p>
                  <img src="resources/assets/dest/product/{{$products->image}}" height="100px" alt="{{$products->image}}" />
               </p>
               <input type="file" class="form-control" name="image" />
            </div>
            <button type="submit" class="btn btn-default">Cập nhật</button>
            <button type="reset" class="btn btn-default">Nhập lại</button>
            <form>
         </div>
         <div class="col-lg-3"></div>
      </div>
      <!-- /.row -->
   <!-- </div>
 
</div> -->
@endsection