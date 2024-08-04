<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
						<li><a href="{{route('dangxuat')}}"><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a></li>
						<li><a href="{{route('dangxuat')}}"><i class="fa fa-user"></i>Đăng xuất</a></li>
                        @else
						<li><a href="{{route('dangky')}}">Đăng kí</a></li>
						<li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="resources/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="tim-kiem">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng 
							  <!-- (@if(Session::has('cart')) {{Session('cart')->totalQty}}@else <span>Trống</span> @endif) -->
							  @if(Session::has('cart') && Session::get('cart')->totalQty > 0)
										{{ Session::get('cart')->totalQty }}
									@else
										<span>Trống</span>
									@endif

							<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							  @if(Session::has('cart')) 
							  @foreach($product_cart as $pro)
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="chi-tiet-san-pham/{{$pro['item']['id']}}"><img src="resources/assets/dest/product/{{$pro['item']['image']}}" alt="{{$pro['item']['image']}}"></a>
										<div class="media-body">
											<span class="cart-item-title">{{$pro['item']['name']}}</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">
												@if($pro['item']['promotion_price']==0)
												<span class="flash-sale">{{number_format($pro['item']['unit_price'])}}</span>
												@elseif($pro['item']['promotion_price']!=0)
												<span class="flash-del">{{number_format($pro['item']['unit_price'])}}</span>
												 &nbsp
												<span class="flash-sale">{{number_format($pro['item']['promotion_price'])}}</span>
												@endif
												&nbsp
												Số lượng :{{$pro['qty']}}
										    </span>
											<a class="pull-left" href="increase/{{$pro['item']['id']}}">+</a>
											<a class="pull-left" href="decrease/{{$pro['item']['id']}}">-</a>
											<!-- <a class="pull-left" href="xoa-khoi-gio-hang/{{$pro['item']['id']}}">x</a> -->
											<a class="pull-left" href="#" data-toggle="modal" data-target="#confirmDelete{{$pro['item']['id']}}">x</a>
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">
									{{number_format(Session('cart')->totalPrice)}}
									</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('thanhtoan')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								@else
										<span>The shopping cart has no products</span>
									@endif
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($type_product as $type_product)
								<li><a href="loai-san-pham/{{$type_product->id}}">{{$type_product->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> 
	<!-- Modal xác nhận xóa -->
@if(Session::has('cart')) 
@foreach($product_cart as $pro)
<div class="modal fade" id="confirmDelete{{$pro['item']['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a href="xoa-khoi-gio-hang/{{$pro['item']['id']}}" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
