@extends('frontend.layouts.master')
@section('content')
 <div class="row " style="padding:0 20px;" >
 	<div class="col-md-6">
 			<div class="bnr" id="home" style="width: 100%; margin-top:16px;">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			@foreach($slide as $nb)
			<li>
					<img src="img/sanphamnoibat/{{$nb->AnhDaiDien}}" alt=""/>
				</li>
			@endforeach
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
 	</div>
 	<div class="col-md-6" style=>
 		<div class="row" style="border-bottom: 1px solid #81bbf4"> 
 		 <div class="col-md-9"><h4 class="mylabel">Tin tức mới</h4> </div>
 		 <div class="col-md-3"><a href="#" class="btn btn-black pull-right">Xem thêm</a></div>
 		 </div>
 				<div class="news"></div>
 				@foreach($news as $nb)
 				<div class="row news" style="margin-top:10">
 					<div class="col-md-9">
						<a href="#">{{$nb->tieude}}</a><br>
							{{$nb->mota}}<br>
							Thời gian đăng: {{$nb->ngaydang}}
					</div>
 					<div class="col-md-3">
 					<img src="img/sanphamnoibat/{{$nb->AnhDaiDien}}"  class="img-news thumbnail"/>
 				    </div>
					</div>
					@endforeach
					
		</div>
		</div>

	<!--banner-ends--> 

	<!--about-starts-->
	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				@foreach($noibatthang as $nb)
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="img/sanphamnoibat/{{$nb->AnhDaiDien}}" alt=""/>
						<figcaption>
							<h2>{{$nb->tieude}}</h2>
							<p>{{$nb->mota}}</p>	
						</figcaption>	
					</figure>
				</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--about-end-->
	<!--product-starts-->
	<div class="product"> 
		<div class="container">
			<div class="product-top">
				<div class="product-one">
				@foreach($sanpham as $vl)
					<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
							<a href="home/chitietsp/{{$vl->id}}" class="mask">
							@if($vl->AnhDaiDien != null)
							<img class="img-responsive zoom-img" src="img/sanpham/anhdaidien/{{$vl->AnhDaiDien}}" alt="" />
							@else 
							<img class="img-responsive zoom-img" src="img/sanpham/anhdaidien/samsungc.jpg" alt="" />
							@endif
							</a>
							<div class="product-bottom">
								<h3>{{$vl->TenSanPham}}</h3>
								<p><?php
			                      $ten_nuoc = App\quocgia::find($vl->id_nuocsx);
			                      echo $ten_nuoc->tennuoc; ?></p>
								<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ {{$vl->GiaBan}}</span></h4>
							</div>
							<div class="srch">
								<span>-50%</span>
							</div>
						</div>
					</div>
				@endforeach
				
				</div>	
				<div class="clearfix"></div>
			  {!! $sanpham-> links()!!}				
			</div>

		</div>
	</div>
	<!--product-end-->

@endsection
@section('script')
	<!--Slider-Starts-Here-->
				<script src="customer_asset/js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
@endsection