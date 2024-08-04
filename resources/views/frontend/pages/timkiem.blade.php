@extends('frontend/layouts/master')
@section('content')
<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach($products as $new)
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
						</div> <!-- .beta-products-list -->
                @endsection