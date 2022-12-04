@extends('frontend.layouts.master')

@section('title')
{{strtoupper($category)}} || La 39 Motors 
@endsection

@section('main-content')

<div class="sharethis-sticky-share-buttons"></div>
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
									@if($child->is_parent==0)
									<li><a href="{{route('product-cat',$child->parent_info['slug'])}}">
									{{$child->parent_info['title']}}
									<i class="ti-arrow-right"></i></a></li>
									<li class="active"><a href="{{route('product-sub-cat',[$child->parent_info['slug'],$child->slug])}}">
										{{$child->title}}
									</a></li>
									
									@else
									<li class="active"><a href="{{route('product-cat',$child->slug)}}">
										{{$child->title}}
									</a></li>
									@endif
								@endforeach

								
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
				<div class="container" >
					<div class="row">
		
						<div class="col-lg-9 col-md-8 col-12">

					        <div class="row" >
							
								@if($childs->count()<=0)
								
								@foreach($allCat as $cati)
								<div class="row" style="margin-bottom: 20px; margin-left: 20px; margin-right:20px;">
									<h2><a href="javascript:void(0);">{{$cati->title}}</a></h2>
								</div>
								@endforeach
								
								<div class="row" style="margin-bottom: 5px; margin-left: 5px; margin-right:5px;">
												@if(count($products)>0)
														
															@foreach($products as $product)
																
													
																<div class="col-lg-4 col-md-6 col-6">
																		<div class="single-product">
																			<div class="product-img">
																				<a href="{{route('product-detail',$product->slug)}}">
																					@php
																						$photo=explode(',',$product->photo);
																						$Img=$photo[0];
																						$prueba=explode('/',$Img);
																						$nombre1=$prueba[count($prueba)-1];
																						$nombre2='thumbs/'.$nombre1;
            																			$Img=str_replace($nombre1, $nombre2, $Img);
																						
																					@endphp
																					<img class="default-img" src="{{$Img}}" loading="lazy" onerror="this.onerror=null;this.src='{{asset('backend/img/thumbnail-default.jpg')}}';" >
																					
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
								<div id="accordion"  style="width: 100%; margin-bottom: 5px; margin-left: 5px; margin-right:5px;">
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
																						$Img=$photo[0];
																						$prueba=explode('/',$Img);
																						$nombre1=$prueba[count($prueba)-1];
																						$nombre2='thumbs/'.$nombre1;
            																			$Img=str_replace($nombre1, $nombre2, $Img);
																						
																						
																					@endphp
																					<img class="default-img" src="{{$Img}}" loading="lazy" onerror="this.onerror=null;this.src='{{asset('backend/img/thumbnail-default.jpg')}}';">
																					
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
												
										<div class="row"  style=" margin-bottom: 5px; margin-left: 5px; margin-right:5px;">
												@if(count($products)>0)
														
															@foreach($products as $product)
																
													
																<div class="col-lg-4 col-md-6 col-6">
																		<div class="single-product">
																			<div class="product-img">
																				<a href="{{route('product-detail',$product->slug)}}">
																					@php
																						$photo=explode(',',$product->photo);
																						$Img=$photo[0];
																						$prueba=explode('/',$Img);
																						$nombre1=$prueba[count($prueba)-1];
																						$nombre2='thumbs/'.$nombre1;
            																			$Img=str_replace($nombre1, $nombre2, $Img);
																					@endphp
																					<img class="default-img" src="{{$Img}}" loading="lazy" onerror="this.onerror=null;this.src='{{asset('backend/img/thumbnail-default.jpg')}}';" >
																					
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
						<div class="col-lg-3 col-md-4 col-12" style="margin-top: 20px;">
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
                                     
										<li>Todas las categorías</li>
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

   
	<script>

		var acco=new Array();
		// var nuevoArray = new Array();
		// acco[0].offsetHeight=0;
		 $('#accordion').on('shown.bs.collapse', function (e) {
            var offset = $(this).find('.collapse.show');
			if(acco!== $(this)){
            if(offset) {
                $('html,body').animate({
                    scrollTop: $(offset).offset().top - 60
                }, 1500);
            }
			acco=$(this);
			}
        });

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