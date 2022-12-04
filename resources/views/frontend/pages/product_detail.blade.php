

@extends('frontend.layouts.master')

@section('meta')

	<meta name="keywords" content="La 39 Motors, accesorios, moto, motocicleta, perú, lima, repuestos">
	
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:category" content="{{$product_detail->cat_info['title']}}">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}">
	
@endsection
@section('title')
{{$product_detail->title}} || La 39 Motors
@endsection
@section('main-content')
<div class="sharethis-sticky-share-buttons"></div>
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{route('home')}}">Inicio<i class="ti-arrow-right"></i></a></li>
								<li><a href="{{route('product-cat',$product_detail->cat_info['slug'])}}">{{$product_detail->cat_info['title']}}<i class="ti-arrow-right"></i></a></li>
								@if($product_detail->sub_cat_info)
								<li><a href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}">{{$product_detail->sub_cat_info['title']}}<i class="ti-arrow-right"></i></a></li>
								@endif
								<li class="active"><a href="">{{$product_detail->title}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Single -->
		<section class="shop single section">
					<div class="container">
						<div class="row"> 
							<div class="col-12">
								<div class="row">
									<div class="col-lg-6 col-12">
										<!-- Product Slider -->
										<div class="product-gallery">
											<!-- Images slider -->
											<div class="flexslider-thumbnails">
												<ul class="slides">
													@php 
														$photo=explode(',',$product_detail->photo);
													// dd($photo);
													@endphp
													@foreach($photo as $data)
														<li data-thumb="{{$data}}" rel="adjustX:10, adjustY:">
															<img src="{{$data}}" alt="{{$data}}"  onerror="this.onerror=null;this.src='{{asset('backend/img/thumbnail-default.jpg')}}';">
														</li>
													@endforeach
												</ul>
											</div>
											<!-- End Images slider -->
										</div>
										<!-- End Product slider -->
									</div>
									<div class="col-lg-6 col-12">
										<div class="product-des">
											<!-- Description -->
											<div class="short">
												<h4>{{$product_detail->title}}</h4>
								
                                                @php 
                                                    $after_discount=($product_detail->price-(($product_detail->price*$product_detail->discount)/100));
                                                @endphp
												<p class="price"><span class="discount">S/. {{number_format($after_discount,2)}}</span>
												@if(($product_detail->discount)>0)
												
												<s>S/. {{number_format($product_detail->price,2)}}</s>
												@endif
												
												</p>
												<p class="description">{!!($product_detail->summary)!!}</p>
											</div>
											
											@if($product_detail->size)
												<div class="size mt-4">
													<h4>Talla</h4>
													<ul>
														@php 
															$sizes=explode(',',$product_detail->size);
															// dd($sizes);
														@endphp
														@foreach($sizes as $size)
														<li><a href="#" class="one">{{$size}}</a></li>
														@endforeach
													</ul>
												</div>
											@endif
											<!--/ End Size -->
											<!-- Product Buy -->
											<div class="product-buy">
												<form action="{{route('single-add-to-cart')}}" method="POST">
													@csrf 
													
												</form>

												<p class="cat">Categoría :<a href="{{route('product-cat',$product_detail->cat_info['slug'])}}">{{$product_detail->cat_info['title']}}</a></p>
												@if($product_detail->sub_cat_info)
												<p class="cat mt-1">Sub Categoría :<a href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}">{{$product_detail->sub_cat_info['title']}}</a></p>
												@endif
												
												<!-- <p class="availability">Stock : @if($product_detail->stock>0)<span class="badge badge-success">{{$product_detail->stock}}</span>@else <span class="badge badge-danger">{{$product_detail->stock}}</span>  @endif</p> -->
											</div>
											<!--/ End Product Buy -->

											
										</div>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-lg-4 col-12 mb-4"></div>
									<div class="col-lg-4 col-12"></div>
									<div class="col-lg-4 col-12 mb-4 float-right">
									<a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*{{$product_detail->title}}*%0A{{route('product-detail',$product_detail->slug)}}" class="whatsapp" target="_blank"> 
										<i class="fa fa-whatsapp whatsapp-icon"> Me interesa</i></a>
									</div>
								
								</div>
									
							</div>
								
							</div>
						</div>
					</div>
		</section>
		

@endsection
@push('styles')
	<style>
			@media only screen and (max-width : 320px) {
                .whatsapp {
                    font-size:25px;
			}
		}
		       .whatsapp {
			/* position:fixed; */
			width:200px !important;
			height:60px;
			background-color:#25d366;
			color:white;
			border-radius:10px;
			text-align:center;
			font-size:40px;
			z-index:100;
			padding: 20px;
    		margin: 30px;
			}

		.whatsapp-icon {
			margin-top:13px;
			}
		/* Rating */
		.rating_box {
		display: inline-flex;
		}

		.star-rating {
		font-size: 0;
		padding-left: 10px;
		padding-right: 10px;
		}

		.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
		}

		.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
		}

		.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #F7941D;
		font-size: 16px;
		margin-top: 5px;
		}

		.star-rating__ico:last-child {
		padding-left: 0;
		}

		.star-rating__input {
		display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover ~ .star-rating__ico:before,
		.star-rating__input:checked ~ .star-rating__ico:before {
		content: "\F005";
		}
	
	</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            // alert(quantity);
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
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}

@endpush