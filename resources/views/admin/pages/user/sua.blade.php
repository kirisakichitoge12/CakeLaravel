@extends('admin/layouts/master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Người dùng
          <small>
            Sửa
          </small>
        </h1>
      </div>
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
      <form action="admin/user/suanguoidung/{{$user->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>
            Họ và Tên
          </label>
          <input class="form-control" name="fullname" value="{{$user->full_name}}"
          />
          @if ($errors->has('fullname'))
          <span class="text-danger">
            {{$errors->first('fullname')}}
          </span>
          @endif
        </div>
        <div class="form-group">
          <label>
            Email
          </label>
          <input class="form-control" name="email" value="{{$user->email}}" />
          @if ($errors->has('email'))
          <span class="text-danger">
            {{$errors->first('email')}}
          </span>
          @endif
        </div>
        <div class="form-group">
          <label>
            Password mới
          </label>
          <input class="form-control" type="password" name="pass1" placeholder="Sửa password"
          />
          @if ($errors->has('pass1'))
          <span class="text-danger">
            {{$errors->first('pass1')}}
          </span>
          @endif
        </div>
        <div class="form-group">
          <label>
            Nhập lại Password mới
          </label>
          <input class="form-control" type="password" name="pass2" placeholder="Nhập lại password"
          />
          @if ($errors->has('pass2'))
          <span class="text-danger">
            {{$errors->first('pass2')}}
          </span>
          @endif
        </div>
        <div class="form-group">
          <label>
            Số điện thoại
          </label>
          <input class="form-control" name="phone" value="{{$user->phone}}" />
          @if ($errors->has('phone'))
          <span class="text-danger">
            {{$errors->first('phone')}}
          </span>
          @endif
        </div>
        <div class="form-group">
          <label>
            Địa chỉ
          </label>
          <input class="form-control" name="address" value="{{$user->address}}"
          />
          @if ($errors->has('address'))
          <span class="text-danger">
            {{$errors->first('address')}}
          </span>
          @endif
        </div>
        <div class="form-group">
            <label>
              Quyền(Nhập 0 nếu là user nhập 1 nếu là admin)
            </label>
            <label class="radio-inline">
              <input name="quyen" type="radio"  value="1" {{$user->quyen == 1? "checked": ""}}>Admin
            </label>
            <label class="radio-inline">
              <input name="quyen" type="radio" value="0" {{$user->quyen == 0 ? "checked": ""}} >User
            </label>
            @if ($errors->has('quyen'))
            <span class="text-danger">
              {{$errors->first('quyen')}}
            </span>
            @endif
          </div>
          <div class="form-group">
          <label>
            Hình sản phẩm
          </label>
          <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-default">
          Sửa Người dùng
        </button>
        <button type="reset" class="btn btn-default">
          Reset
        </button>
        <form>
    </div>
  </div>
</div>
@endsection