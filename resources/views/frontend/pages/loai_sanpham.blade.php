@extends('frontend/layouts/master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm :{{$loai->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>{{$loai->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
                            @foreach($listloai as $list)
							<li><a href="loai-san-pham/{{$list->id}}">{{$list->name}}</a></li>
                            @endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh sách sản phẩm :{{$loai->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sanpham_theoloai)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">                   
                            @foreach($sanpham_theoloai as $new)
								<div class="col-lg-4 col-4">
									<div class="single-item">
                                        @if($new->promotion_price!=0)
                                          <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/{{$new->id}}"><img class='image-fluid' height="250" src="resources/assets/dest/product/{{$new->image}}" alt=""></a>
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
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
							<h4>Danh sách sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sanpham_khac)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">                   
                            @foreach($sanpham_khac as $new)
								<div class="col-lg-4 col-4">
									<div class="single-item">
                                        @if($new->promotion_price!=0)
                                          <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/{{$new->id}}"><img class='image-fluid' height="250" src="resources/assets/dest/product/{{$new->image}}" alt=""></a>
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
                            <div class="row">{{$sanpham_khac->links()}}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection