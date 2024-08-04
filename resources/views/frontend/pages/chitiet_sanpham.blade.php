@extends('frontend/layouts/master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"> Tên sản phẩm : {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Chi tiết sản phẩm </span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="resources/assets/dest/product/{{$sanpham->image}}" alt="{{$sanpham->image}}">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sanpham->name}}</p>
								<p class="single-item-price">
								@if($sanpham->promotion_price==0)
												<span class="flash-sale">{{$sanpham->unit_price}}</span>
                                            @else
                                            <span class="flash-del">{{$sanpham->unit_price}}</span>
                                            <span class="flash-sale">{{$sanpham->promotion_price}}</span>
                                            @endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="them-vao-gio-hang/{{$sanpham->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự </h4>

						<div class="row">
						@foreach($sanpham_tuongtu as $new)
								<div class="col-sm-4">
									<div class="single-item">
                                        @if($new->promotion_price!=0)
                                          <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/{{$new->id}}"><img class='image-fluid' height="250" src="resources/assets/dest/product/{{$new->image}}" alt="{{$new->image}}"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
                                            @if($new->promotion_price==0)
												<span class="flash-sale">{{$new->unit_price}}</span>
                                            @else
                                            <span class="flash-del">{{$new->unit_price}}</span>
                                            <span class="flash-sale">{{$new->promotion_price}}</span>
                                            @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="them-vao-gio-hang/{{$new->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/{{$new->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                                @endforeach
						</div>
						<div class="row">{{$sanpham_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_banchay as $sp)
								<div class="media beta-sales-item">
									<a class="pull-left" href="chi-tiet-san-pham/{{$sp->id_product}}"><img src="resources/assets/dest/product/{{$sp->products->image}}" alt="{{$sp->products->image}}"></a>
									<div class="media-body">
										{{$sp->products->name}}
										@if($sp->products->promotion_price==0)
												<span class="flash-sale">{{$sp->products->unit_price}}</span>
                                            @else
                                            <span class="flash-del">{{$sp->products->unit_price}}</span>
                                            <span class="flash-sale">{{$sp->products->promotion_price}}</span>
                                            @endif
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới </h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_product as $sp)
								<div class="media beta-sales-item">
									<a class="pull-left" href="chi-tiet-san-pham/{{$sp->id}}"><img src="resources/assets/dest/product/{{$sp->image}}" alt="{{$sp->image}}"></a>
									<div class="media-body">
										{{$sp->name}}
										<span class="flash-sale">{{$sp->unit_price}}</span>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection