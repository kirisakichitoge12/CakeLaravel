@extends('admin/layouts/master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Sản phẩm
          <small>
            Sửa
          </small>
        </h1>
      </div>
      @if (Session::has('loi'))
      <p class="alert alert-warning">
        {{Session::get('loi')}}
      </p>
      @endif @if (Session::has('thongbao'))
      <p class="alert alert-success">
        {{Session::get('thongbao')}}
      </p>
      @endif
      <!-- /.col-lg-12 -->
      <div class="col-lg-7" style="padding-bottom:120px">
        <form action="admin/sanpham/suasanpham/{{$product->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>
              Tên sản phẩm
            </label>
            <input class="form-control" name="name" value="{{$product->name}}"
            />
            @if ($errors->has('name'))
            <span class="text-danger">
              {{$errors->first('name')}}
            </span>
            @endif
          </div>
          <div class="form-group">
            <label>
              Loại sản phẩm
            </label>
            <select name="loaisp" id="loaisp">
              @foreach ($type_pro as $type)
              <option value="{{$type->id}}" {{$product->id_type ==$type->id ? "selected":""}}>{{$type->name}}
              </option>
              @endforeach
            </select>
            @if ($errors->has('loaisp'))
            <span class="text-danger">
              {{$errors->first('loaisp')}}
            </span>
            @endif
          </div>
          <div class="form-group">
            <label>
              Giá sản phẩm
            </label>
            <input class="form-control" name="price" value="{{$product->unit_price}}"
            />
            @if ($errors->has('price'))
            <span class="text-danger">
              {{$errors->first('price')}}
            </span>
            @endif
          </div>
          <div class="form-group">
            <label>
              Giá khuyến mãi (nếu có)
            </label>
            <input class="form-control" name="pro_price" value="{{$product->promotion_price}}"
            />
            @if ($errors->has('pro_price'))
            <span class="text-danger">
              {{$errors->first('pro_price')}}
            </span>
            @endif
          </div>
          <div class="form-group">
            <label>
              Đơn vị tính
            </label>
            <select name="unit" id="unit">
              <option value="hộp">
                Hộp
              </option>
              <option value="cái">
                Cái
              </option>
            </select>
            @if ($errors->has('unit'))
            <span class="text-danger">
              {{$errors->first('unit')}}
            </span>
            @endif
          </div>
          <div class="form-group">
            <label>
              Mô tả sản phẩm
            </label>
            <textarea class="form-control" rows="3" name="des">
              {{$product->description}}
            </textarea>
          </div>
          <div class="form-group">
            <label>
              Hình sản phẩm
            </label>
            <input type="file" name="image">
            <img src="resources/assets/dest/product/{{$product->image}}" width="150"
            alt="">
          </div>
          <div class="form-group">
            <label>
              Tình trạng sản phẩm
            </label>
            <label class="radio-inline">
              <input name="rdoStatus" type="radio"  value="1" {{$product->new == 1? "checked": ""}}>Mới
            </label>
            <label class="radio-inline">
              <input name="rdoStatus" type="radio" value="0" {{$product-> new == 0 ? "checked": ""}} >none
            </label>
            @if ($errors->has('rdoStatus'))
            <span class="text-danger">
              {{$errors->first('rdoStatus')}}
            </span>
            @endif
          </div>
          <button type="submit" class="btn btn-default">
            Sửa sản phẩm
          </button>
          <button type="reset" class="btn btn-default">
            Reset
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

