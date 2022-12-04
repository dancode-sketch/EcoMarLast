<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                        
                            @php
                                $settings=DB::table('settings')->get();
                                $number="";
								foreach($settings as $data) {
									$number=$data->phone;
								}
                            @endphp
                        
                            <li><a href="https://wa.me/51{{$number}}"><i class="ti-headphone-alt"></i>+51 @foreach($settings as $data) {{$data->phone}} @endforeach</a></li>
                            <li><a href="mailto:@foreach($settings as $data) {{$data->email}} @endforeach"><i class="ti-email" ></i> @foreach($settings as $data) {{$data->email}} @endforeach</a></li>
                            <li>
										<a style="margin-right:10px;" href="https://facebook.com/tiendala39motors" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
										<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
										</svg></a>

										<a style="margin-right:10px;"  href="https://instagram.com/la39motors" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
										<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
										</svg></a>

										<a style="margin-right:10px;"  href="https://www.tiktok.com/@la39.motors" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
										<path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
										</svg></a>
							</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
  
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <!-- Logo -->
                    <div class="logo">
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp                    
                        <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div style="display:none;">
                        <div><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div >
                            <form >
                                <input type="text" placeholder="Search here..." name="search" >
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    
                </div>
           

            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-xs-12 col-md-3">

                </div>
                <div class="col-xs-12 col-md-6" style=" margin:10px;">
                        
                        <div  id="remote" style="border-color: black;" >
                     
                            <form method="GET" action="{{route('product.search')}}" style="margin: 0 auto; vertical-align: initial !important">
                            
                                <input  id="search" name="search" placeholder="Busque los productos..." class="typeahead" type="search" style=" height: 52px; border-color: transparent; width: 270px; vertical-align: initial !important;">
                                <button class="btnn" style="height: 48px; font-size: 20px; width: 48px; background-color: black; color: white;" type="submit"><i class="ti-search"></i></button>
                                {{-- @csrf --}}
                            </form>
                        </div>
                    
                </div>
                <div class="col-xs-12 col-md-3">

                </div>
 
        </div>
        
            <nav style="text-align: center;">
                <label for="drop" class="toggle">&#8801;  Categorías</label>
                <input type="checkbox" id="drop" />

                <ul class="menu">
                    @php
                    // $category = new Category();
                    $menu=App\Models\Category::getAllParentWithChild();
                    $nu=0;
                    @endphp
                    @if($menu)
                    
                        @foreach($menu as $cat_info)
                        @php
                        ++$nu;
                        @endphp
                        @if($cat_info->child_cat->count()>0)
                        <li>
                            
                        <label for="drop-{{$nu}}" class="toggle">{{$cat_info->title}} +</label>
                        <a onclick="CargaCategoria('product-cat','{{$cat_info->slug}}')">{{$cat_info->title}}</a>
                        <input type="checkbox" id="drop-{{$nu}}"/>
											
							<ul>
                    <li><a onclick="CargaCategoria('product-cat','{{$cat_info->slug}}')" >Todos</a></li>
								@foreach($cat_info->child_cat as $sub_menu)
									<li><a onclick="CargaCategoria('product-sub-cat','{{$cat_info->slug}}'+'/'+'{{$sub_menu->slug}}')" >{{$sub_menu->title}}</a></li>
								@endforeach
                                
							</ul>
                        </li>
						@else
                            <li><a onclick="CargaCategoria('product-cat','{{$cat_info->slug}}')">{{$cat_info->title}}</a></li>
										
						@endif
						@endforeach
					
					@endif
                     
                </ul>
                
                </nav>

        
        </div>
    
    </div>

    @push('styles')
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

<script type="text/javascript">

function CargaCategoria(ruta,slug){
  event.preventDefault();
alert(ruta);
alert(slug);
};

window.addEventListener('load', function() {
    // console.log('La página ha terminado de cargarse!!');
  //  alert(document.domain);
  //  console.log(document);
  CargarCategorias();

var areglo =function(requets, response){
    $.ajax({
        url:"{{route('product.auto')}}",
        dataType:json,   
        data:{
            term: requets.term
        },
        success:function(data){
            response(data)
        }
    });
  };

  var bestPictures = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: "{{route('product.auto')}}",
  remote: {
    url: "{{route('product.auto')}}"+'?term='+'%QUERY',
    wildcard: '%QUERY'
  }
});

$('#remote .typeahead').typeahead(null, {
  name: 'best-pictures',
  hint: true,
  display: 'value',
  highlight: true,
  minLength: 3,
  limit: 20,
  source: bestPictures
});


});
function CargarCategorias() {
$.ajax({
    type: 'GET', 
    dataType: 'json',
    headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }, 
    url: "{{route('category.allCategoryChill')}}",
    success: function (response) {
        // console.log(response);
        
        // var response = JSON.parse(response);
        // console.log(response);
        
        if (response.length == 0) {
            // $('.causes_div').append('No Data Found');
        } else {
            $.each(response, function(index) {
              // console.log(response[index].title);
              if (response[index].is_parent==1){
                // console.log(response[index].title);
                var childs = response[index].child_cat
                // console.log(childs);
                if(childs.length>0){
                  childs.forEach(element => {
                    // console.log(element.title);
                  });
                  
                };
              };
              // console.log(response[index].title);
            // alert(response[index].title);
            // var arrayDeCadenas = response[index].photo.split(',');
            // var after_discount=(response[index].price-(response[index].price*response[index].discount)/100);
            
            // var m = 'https://la39motors.com/product-detail/';
            // var url2= m+response[index].slug;
            // var url=new URL(response[index].slug, m);
            // console.log(url);
            // console.log(url2);
            // var name=response[index].title.replace(/['"]+/g, '');
            // console.log(name);
            // $('.causes_div').append(`<div class="col-lg-3 col-md-4 col-6">
            //                             <div class="single-product">
            //                                 <div class="product-img">
            //                                     <a href="${url}">
            //                                         <img class="default-img"  src="${arrayDeCadenas[0]}" loading="lazy" onerror="${arrayDeCadenas[0]}"/>`
                                                    
            //                                         +(response[index].discount>0?`<span class="price-dec">${response[index].discount} % Off</span>`
            //                                         :``)+
                                                   
            //                                         `</a>
            //                                 </div>
            //                                 <div class="product-content">
            //                                     <h3><a href="{{ url('product-detail/${response[index].slug}') }}">${response[index].title}</a></h3>
						// 							<span>S/. ${after_discount}</span>`
            //                                         +(response[index].discount>0?`<del>S/. ${response[index].price}</del>`
            //                                         :``)+
            //                                         `</div>
            //                                 <div>
            //                                     <a href="https://wa.me/51943406540/?text=Estoy%20interesado%20en%20este%20producto%0A*${name}*%0A${url2}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon">Me interesa</i></a>
            //                                 </div>
            //                             </div>
            //                         </div>`);
        });
        }
    }
});
};
</script>


<style>

.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #face0d; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.tt-input{
    margin-top: -15px;
}
.tt-menu{
background: white;
border-radius: 4px;
border: 1px solid gray;
margin-top: 10px;
max-height: 200px;
overflow-y: auto;
width: 100%;
text-align: left;

}
.tt-hint{
    margin-top: -14px;
}

.tt-suggestion{
    padding: 10px 10px;

}

.tt-selectable:hover {
    color: white;
    font-size: 15px;
    /* font-family: Georgia, 'Times New Roman', Times, serif; */
    background:black; 
}
.nice-select{
    visibility: hidden;
    display: none;
}

#container {
  margin: 0 auto;
  max-width: 890px;
}
p { text-align: center; }
 .toggle, [id^=drop] {
 display: none;
}
nav {
  margin: 0;
  padding: 0;
  background-color: #face0d;
  color:black !important;
}

#logo {
  display: block;
  padding: 0 30px;
  float: left;
  font-size: 20px;
  line-height: 60px;
}

nav:after {
  content: "";
  display: table;
  clear: both;
}

nav ul {
  float: left;
  padding: 0;
  margin: 0;
  list-style: none;
  position: relative;
}

nav ul li {
  margin: 0px;
  display: inline-block;
  background-color: #face0d;
}

nav a {
  display: block;
  padding: 0 20px;
  font-size: 20px;
  line-height: 60px;
  text-decoration: none;
}

nav ul li ul li:hover { background: black; 
color: #ffffff;
z-index: 100;}

nav a:hover { background-color: black; color: #ffffff; z-index: 100;}

nav ul ul {
  display: none;
  position: absolute;
  top: 60px;
  border: solid 3px black;
}

nav ul li:hover > ul { display: inherit; z-index: 100;}

nav ul ul li {
  width: 170px;
  float: none;
  display: list-item;
  position: relative;
}

nav ul ul ul li {
  position: relative;
  top: -60px;
  left: 170px;
}

li > a:after { content: ' +'; }

.topbar li > a:after { content: ' '; }

.footer li > a:after { content: ' '; }

li > a:only-child:after { content: ''; }

a:not([href]):not([tabindex]):hover {
  background-color: black; 
  color: #ffffff;
}
/* Media Queries
--------------------------------------------- */

@media all and (max-width : 768px) {

#logo {
  display: block;
  padding: 0;
  width: 100%;
  text-align: center;
  float: none;
}

nav { margin: 0; }

.toggle + a,
 .menu { display: none; }

.toggle {
  display: block !important;
  background-color:black;
  padding: 0 20px;
  color: white;
  font-size: 22px;
  font-weight:bold;
  line-height: 60px;
  text-decoration: none;
  border: none;
  width: 100% !important;
}

.toggle:hover { background-color: #000000; }

[id^=drop]:checked + ul { display: block; }

nav ul li {
  display: block;
  width: 100%;
}

nav ul ul .toggle,
 nav ul ul a { padding: 0 40px; width: 100% !important;}

nav ul ul ul a { padding: 0 80px; width: 100% !important;}

nav a:hover,
 nav ul ul ul a { background-color: #000000; }

nav ul li ul li .toggle,
 nav ul ul a { background-color: #212121; }

nav ul ul {
  float: none;
  position: static !important;
  color: #ffffff;
}

nav ul ul li:hover > ul,
nav ul li:hover > ul { display: none; }

nav ul ul li {
  display: block !important;
  width: 100% !important;
}

nav ul ul ul li { position: static !important;

}
}

@media all and (max-width : 330px) {

nav ul li {
  display: block !important;
  width: 100% !important;
}

}
</style>

</header>
<!-- product-cat/{slug} -->