@extends('frontend.layouts.master')

@section('title','La 39 Motors || Producto')

@section('main-content')
								@php
								$childs=App\Models\Category::getAllParentWithChild()->where('slug',$category);
								$allCat=App\Models\Category::getAllCategory()->where('slug',$category);

								@endphp
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{route('home')}}">Inicio<i class="ti-arrow-right"></i></a></li>

								
								
								
								@foreach($allCat as $child)
								@if($child->is_parent=0)
								<h2>Hijo</h2>
								@endif
								


								@endforeach

								<li class="active"><a href="javascript:void(0);">
								@foreach($allCat as $cati)
								{{$cati->title}}
								@endforeach
								</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		<form action="{{route('shop.filter')}}" method="POST">
		@csrf
			<!-- Product Style 1 -->
			<section class="product-area shop-sidebar shop-list shop section">
				<div class="container">
					<div class="row">
		
						<div class="col-lg-9 col-md-8 col-12">

					        <div class="row">
							
								@if($childs->count()<=0)
								
								@foreach($allCat as $cati)
								<div class="row" style="margin-bottom: 20px; margin-left: 20px; margin-right:20px;">
									<h2><a href="javascript:void(0);">{{$cati->title}}</a></h2>
								</div>
								@endforeach
								
								<div class="row">
												@if(count($products)>0)
														
															@foreach($products as $product)
																
													
																<div class="col-lg-4 col-md-6 col-6">
																		<div class="single-product">
																			<div class="product-img">
																				<a href="{{route('product-detail',$product->slug)}}">
																					@php
																						$photo=explode(',',$product->photo);
																					@endphp
																					<img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
																					<img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
																					@if($product->discount)
																								<span class="price-dec">{{$product->discount}} % Off</span>
																					@endif
																				</a>
																	
																			</div>
																			<div class="product-content">
																				<h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
																				
																				
																				@php
																					$after_discount=($product->price-($product->price*$product->discount)/100);
																				@endphp
																					<span>S/. {{number_format($after_discount,2)}}</span>
																					@if(($product->discount)>0)
																				
																					<del>S/. {{number_format($product->price,2)}}</del>
																				@endif
																				
																			</div>
																			<div>
																			<a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*{{$product->title}}*%0A{{route('product-detail',$product->slug)}}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon">Me interesa</i></a>
																			</div>
																		</div>
																	</div>
																
															@endforeach
														

												@else
												<h4 class="text-warning" style="margin:100px auto;">No se encontraron productos.</h4>
												@endif
										</div>
								@endif
								@foreach($childs as $child)
								<div class="row" style="margin-bottom: 20px; margin-left: 20px; margin-right:20px;">
									<h2><a href="javascript:void(0);">{{$child->title}}</a></h2>
								</div>
								
								@endforeach
								<div id="accordion" style="width: 100%;">
								@foreach($childs as $child)
								
									@if($child->child_cat->count()>0)
										@foreach($child->child_cat as $sub_child)
											<div class="card" >
												<div class="card-header" id="{{$sub_child['slug']}}">
												<h5 class="mb-0">
													<a href="javascript:void(0);" class="btn btn-link" data-toggle="collapse" data-target="#{{$sub_child['id']}}" aria-expanded="true" aria-controls="{{$sub_child['slug']}}">
													{{$sub_child['title']}}	
													</a>
												</h5>
												</div>

												<div id="{{$sub_child['id']}}" class="collapse" aria-labelledby="{{$sub_child['slug']}}" data-parent="#accordion">
												<div class="card-body">
												<div class="row">
												@foreach($products as $product)
																@if($product->child_cat_id==$sub_child['id'])
																<div class="col-lg-4 col-md-6 col-6">
																		<div class="single-product">
																			<div class="product-img">
																				<a href="{{route('product-detail',$product->slug)}}">
																					@php
																						$photo=explode(',',$product->photo);
																					@endphp
																					<img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
																					<img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
																					@if($product->discount)
																								<span class="price-dec">{{$product->discount}} % Off</span>
																					@endif
																				</a>
																		
																			</div>
																			<div class="product-content">
																				<h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
																				
																				
																				@php
																					$after_discount=($product->price-($product->price*$product->discount)/100);
																				@endphp
																					<span>S/. {{number_format($after_discount,2)}}</span>
																					@if(($product->discount)>0)
																				
																					<del>S/. {{number_format($product->price,2)}}</del>
																				@endif
																				
																			</div>
																			<div>
																			<a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*{{$product->title}}*%0A{{route('product-detail',$product->slug)}}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon">Me interesa</i></a>
																			</div>
																</div>
															</div>
															@endif
												@endforeach

												</div>
												</div>
												</div>
											</div>
					
										@endforeach
									
										
										
									@else
												
										<div class="row">
												@if(count($products)>0)
														
															@foreach($products as $product)
																
													
																<div class="col-lg-4 col-md-6 col-6">
																		<div class="single-product">
																			<div class="product-img">
																				<a href="{{route('product-detail',$product->slug)}}">
																					@php
																						$photo=explode(',',$product->photo);
																					@endphp
																					<img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
																					<img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
																					@if($product->discount)
																								<span class="price-dec">{{$product->discount}} % Off</span>
																					@endif
																				</a>
																	
																			</div>
																			<div class="product-content">
																				<h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
																				
																				
																				@php
																					$after_discount=($product->price-($product->price*$product->discount)/100);
																				@endphp
																					<span>S/. {{number_format($after_discount,2)}}</span>
																					@if(($product->discount)>0)
																				
																					<del>S/. {{number_format($product->price,2)}}</del>
																				@endif
																				
																			</div>
																			<div>
																			<a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*{{$product->title}}*%0A{{route('product-detail',$product->slug)}}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon">Me interesa</i></a>
																			</div>
																		</div>
																	</div>
																
															@endforeach
														

												@else
												<h4 class="text-warning" style="margin:100px auto;">No se encontraron productos.</h4>
												@endif
										</div>

									@endif
									
								@endforeach
								
							</div>	

                            
             



                        </div>
							 <div class="row">
                            <div class="col-md-12 justify-content-center d-flex">
                                {{-- {{$products->appends($_GET)->links()}}  --}}
                            </div>
                          </div>
						</div>
						<div class="col-lg-3 col-md-4 col-12">
							<div class="shop-sidebar">
                                <!-- Single Widget -->
                                <div class="single-widget category">
                                    <h3 class="title">Categoría</h3>
                                    <ul class="categor-list">
										@php
											// $category = new Category();
											$menu=App\Models\Category::getAllParentWithChild();
											
											
										@endphp
										@if($menu)
										<li>
											@foreach($menu as $cat_info)
													@if($cat_info->child_cat->count()>0)
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
															<ul>
																@foreach($cat_info->child_cat as $sub_menu)
																	<li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
																@endforeach
															</ul>
														</li>
													@else
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
													@endif
											@endforeach
										</li>
										@endif
                                        {{-- @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
												<li><a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a></li>
											@endif
                                        @endforeach --}}
										<li>Todas las categorías</li>
                                    </ul>
                                </div>
                                <!--/ End Single Widget -->
                                <!-- Shop By Price -->
								<!-- <div class="single-widget range">
									<h3 class="title">Ordenar por Precio</h3>
									<div class="price-filter">
										<div class="price-filter-inner">
											{{-- <div id="slider-range" data-min="10" data-max="2000" data-currency="%"></div>
												<div class="price_slider_amount">
												<div class="label-input">
													<span>Rango:</span>
													<input type="text" id="amount" name="price_range" value='@if(!empty($_GET['price'])) {{$_GET['price']}} @endif' placeholder="Add Your Price"/>
												</div>
											</div> --}}
											@php
												$max=DB::table('products')->max('price');
												// dd($max);
											@endphp
											<div id="slider-range" data-min="0" data-max="{{$max}}"></div>
											<div class="product_filter">
											<button type="submit" class="filter_button">Filtrar</button>
											<div class="label-input">
												<span>Rango:</span>
												<input  type="text" id="amount" readonly/>
												<input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif"/>
											</div>
											</div>
										</div>
									</div>
									{{-- <ul class="check-box-list">
										<li>
											<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
										</li>
										<li>
											<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
										</li>
										<li>
											<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
										</li>
									</ul> --}}
								</div> -->
								<!--/ End Shop By Price -->
                                <!-- Single Widget -->
                                <!-- <div class="single-widget recent-post">
                                    <h3 class="title">Recien Agregados</h3>
                                    {{-- {{dd($recent_products)}} --}}
                                    @foreach($recent_products as $product)
                                        
                                        @php 
                                            $photo=explode(',',$product->photo);
                                        @endphp
                                        <div class="single-post first">
                                            <div class="image">
                                                <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                            </div>
                                            <div class="content">
                                                <h5><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h5>
                                                @php
                                                    $org=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <p class="price"><del class="text-muted">S/. {{number_format($product->price,2)}}</del> S/. {{number_format($org,2)}}  </p>                                                
                                            </div>
                                        </div>
                                        
                                    @endforeach
                                </div> -->
                                <!--/ End Single Widget -->
                                <!-- Single Widget -->
                                <div class="single-widget category">
                                    <h3 class="title">Marcas</h3>
                                    <ul class="categor-list">
                                        @php
                                            $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                        @endphp
                                        @foreach($brands as $brand)
                                            <li><a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--/ End Single Widget -->
                        	</div>
						</div>
					</div>
				</div>
			</section>
			<!--/ End Product Style 1  -->	
		</form>
		<!-- Modal -->
		@if($products)
			@foreach($products as $key=>$product)
				<div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
								</div>
								<div class="modal-body">
									<div class="row no-gutters">
										<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<!-- Product Slider -->
												<div class="product-gallery">
													<div class="quickview-slider-active">
														@php 
															$photo=explode(',',$product->photo);
														// dd($photo);
														@endphp
														@foreach($photo as $data)
															<div class="single-slider">
																<img src="{{$data}}" alt="{{$data}}">
															</div>
														@endforeach
													</div>
												</div>
											<!-- End Product slider -->
										</div>
										<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<div class="quickview-content">
												<h2>{{$product->title}}</h2>
												<div class="quickview-ratting-review">
													<div class="quickview-ratting-wrap">
														<div class="quickview-ratting">
															{{-- <i class="yellow fa fa-star"></i>
															<i class="yellow fa fa-star"></i>
															<i class="yellow fa fa-star"></i>
															<i class="yellow fa fa-star"></i>
															<i class="fa fa-star"></i> --}}
															@php
																$rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
																$rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
															@endphp
															@for($i=1; $i<=5; $i++)
																@if($rate>=$i)
																	<i class="yellow fa fa-star"></i>
																@else 
																<i class="fa fa-star"></i>
																@endif
															@endfor
														</div>
														<a href="#"> ({{$rate_count}} customer review)</a>
													</div>
													<div class="quickview-stock">
														@if($product->stock >0)
														<span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
														@else 
														<span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
														@endif
													</div>
												</div>
												@php
													$after_discount=($product->price-($product->price*$product->discount)/100);
												@endphp
												<h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>    ${{number_format($after_discount,2)}}  </h3>
												<div class="quickview-peragraph">
													<p>{!! html_entity_decode($product->summary) !!}</p>
												</div>
												@if($product->size)
													<div class="size">
														<h4>Size</h4>
														<ul>
															@php 
																$sizes=explode(',',$product->size);
																// dd($sizes);
															@endphp
															@foreach($sizes as $size)
															<li><a href="#" class="one">{{$size}}</a></li>
															@endforeach
														</ul>
													</div>
												@endif
												<form action="{{route('single-add-to-cart')}}" method="POST">
													@csrf 
													<div class="quantity">
														<!-- Input Order -->
														<div class="input-group">
															<div class="button minus">
																<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																	<i class="ti-minus"></i>
																</button>
															</div>
															<input type="hidden" name="slug" value="{{$product->slug}}">
															<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
															<div class="button plus">
																<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
																	<i class="ti-plus"></i>
																</button>
															</div>
														</div>
														<!--/ End Input Order -->
													</div>
													<div class="add-to-cart">
														<button type="submit" class="btn">Add to cart</button>
														<a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
													</div>
												</form>
												<div class="default-social">
												<!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			@endforeach
		@endif
			<!-- Modal end -->
@endsection
@push ('styles')
<style>
	       .whatsapp {
			
			width:200px;
			height:60px;
			background-color:#25d366;
			color:white;
			border-radius:10px;
			text-align:center;
			font-size:25px;
			z-index:100;
			padding: 4px;
			}

		.whatsapp-icon {
			margin-top:13px;
			}
	 .pagination{
        display:inline-flex;
    }
	.filter_button{
        /* height:20px; */
        text-align: center;
        background:#face0d;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						}); 
                    }
                }
            })
        });
	</script> --}}
	<script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>

@endpush