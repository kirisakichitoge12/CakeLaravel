@extends('frontend/layouts/master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Trang chủ </a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="dang-nhap" method="post" class="beta-form-checkout">
                {{csrf_field()}}
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
                        @if($errors->any())
                        <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                    {{$err}} </br>
                                    @endforeach
                        </div>
						@endif
                        @if(Session::has('matb'))
                        @if(Session::get('matb')=='1')
                                <div class="alert alert-success">
                                   {{Session::get('noidung')}}
                                </div>
                                   @elseif(Session::get('matb')=='0')
                                <div class="alert alert-danger">
                                   {{Session::get('noidung')}}
                                </div>
                                @endif
                        @endif
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="text" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
    @endsection
