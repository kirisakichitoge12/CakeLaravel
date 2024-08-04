@extends('frontend/layouts/master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach($new_product as $new)
								<div class="col-sm-3">
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
							<div class="row">{{$new_product->appends(["page_promotion"=>$pro_product->currentPage()])}}</div><!--giữ phân trang dưới nếu phân trang-->
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->
                       <!--sản phẩm pro-->
			   <div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm sale</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($pro_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach($pro_product as $new)
								<div class="col-sm-3">
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
							<div class="row">{{$pro_product->appends(["page_new"=>$new_product->currentPage()])}}</div>
						</div> <!-- .beta-products-list -->
						<div class="space50">&nbsp;</div>

					</div>
				</div>
          <!--endcontent-->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
@endsection
