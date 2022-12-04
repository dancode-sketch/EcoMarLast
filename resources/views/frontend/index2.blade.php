@extends('frontend.layouts.master')
@section('title','La 39 Motors || Inicio')
@section('main-content')

<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-lg-12">
                <div class="section-title">
                    <h2>Productos destacados</h2>
                    
                </div>
            </div>
        </div>
        <div class="row centrador" id="loaderCent">
            
                <div class="loader" >
                
            </div>
        </div>
        <div class="row causes_div">
        
        </div>
  </div>

</div>
@endsection
@push('styles')
<style>

    .centrador{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 20vh;
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
<script type="text/javascript">
$(window).load(function() {
    // alert("hola");
    fetchCauseAgainstCategory();
});
function fetchCauseAgainstCategory() {

$('.causes_div').empty();
// $('.loader').style.display = 'block';


$.ajax({
    type: 'GET', 
    dataType: 'json',
    headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }, 
    url: "{{route('product.featured')}}",
    success: function (response) {
        // console.log(response);
        
        // var response = JSON.parse(response);
        // console.log(response);
        
        if (response.length == 0) {
            $('.causes_div').append('Sin información para mostrar');
        } else {
            $.each(response, function(index) {
            // alert(response[index].title);
            var arrayDeCadenas = response[index].photo.split(',');
            var img= arrayDeCadenas[0];
            var prueba= img.split('/');
            var number =prueba.length;
            var nombre1=prueba[prueba.length-1];
            var nombre2='thumbs/'+nombre1;
            img=img.replace(nombre1,nombre2);
            // console.log(prueba);
            // console.log(number);
            // console.log(nombre2);
            // console.log(img);
            var after_discount=(response[index].price-(response[index].price*response[index].discount)/100);
            
            var m = 'https://la39motors.com/product-detail/';
            var url2= m+response[index].slug;
            var url=new URL(response[index].slug, m);
            // console.log(url);
            // console.log(url2);
            var name=response[index].title.replace(/['"]+/g, '');
            // console.log(name);
            $('.causes_div').append(`<div class="col-lg-3 col-md-4 col-6">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="${url}">
                                                    <img class="default-img"  src="${img}" loading="lazy" onerror="${img}"/>`
                                                    
                                                    +(response[index].discount>0?`<span class="price-dec">${response[index].discount} % Off</span>`
                                                    :``)+
                                                   
                                                    `</a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="{{ url('product-detail/${response[index].slug}') }}">${response[index].title}</a></h3>
													<span>S/. ${after_discount}</span>`
                                                    +(response[index].discount>0?`<del>S/. ${response[index].price}</del>`
                                                    :``)+
                                                    `</div>
                                            <div>
                                                <a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*${name}*%0A${url2}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon">Me interesa</i></a>
                                            </div>
                                        </div>
                                    </div>`);
                                    
        });
        var x = document.getElementById("loaderCent");
        x.style.display = "none";
        // $('.loader').style.visibility = "hidden";
        }
    }
});
};
</script>


@endpush


                   

