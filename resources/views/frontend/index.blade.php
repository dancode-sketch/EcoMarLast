@extends('frontend.layouts.master')
@section('title','La 39 Motors || Inicio')
@section('main-content')
<div class="sharethis-sticky-share-buttons"></div>
<!-- Start Product Area -->
<div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-lg-12">
                    <div class="section-title">
                        <h2>Productos destacados</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                            @if($product_lists)
                                @foreach($product_lists as $key=>$product)
                                    @if (!is_null($product->cat_id))
                                    
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="single-product" >
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


                                                </a>
                                              
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                                <div class="product-price">
                                                    @php
                                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                                    @endphp
                                                    <span>S/. {{number_format($after_discount,2)}}</span>
                                                    @if(($product->discount)>0)
                                                    <del style="padding-left:4%;">S/. {{number_format($product->price,2)}}</del>
                                                    @endif
                                                    
                                                    
                                                </div>
                                                <div>
                                                <a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*{{$product->title}}*%0A{{route('product-detail',$product->slug)}}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon">Me interesa</i></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                             
                            @endif

                        <!--/ End Single Tab -->

                        
                    
                
            </div>
            <div class="row" style="margin-top: 70px;">
                <div class="col-xs-6 col-lg-12">
                    <div class="section-title">
                        <h2>Nuevos Ingresos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                            @if($product_lists)
                                @foreach($product_new as $key=>$product)
                                    @if (!is_null($product->cat_id))
                                    
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="single-product" >
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


                                                </a>
                                              
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                                <div class="product-price">
                                                    @php
                                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                                    @endphp
                                                    <span>S/. {{number_format($after_discount,2)}}</span>
                                                    @if(($product->discount)>0)
                                                    <del style="padding-left:4%;">S/. {{number_format($product->price,2)}}</del>
                                                    @endif
                                                    
                                                    
                                                </div>
                                                <div>
                                                <a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*{{$product->title}}*%0A{{route('product-detail',$product->slug)}}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon">Me interesa</i></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                             
                            @endif

                        <!--/ End Single Tab -->

                        
                    
                
            </div>
        </div>
</div>





@endsection

@push('styles')
    

    <style>
      
          .how-active2{

            background-color:black;
            color: white;
            }
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
            bottom: 2px;
			}

		.whatsapp-icon {
			margin-top:15px;
			}

            @media only screen and (max-width : 320px) {
                .whatsapp {
                    font-size:14px;
			}
        }
            @media only screen and (max-width : 600px) {
                .whatsapp {
                    font-size:20px;
			}
        }
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #face0d;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



@endpush
