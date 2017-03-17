@extends('frontend.layouts.master')
@section('content')
 <div class="row " style="padding:0 20px;" >
 	<div class="col-md-6">
 			<div class="bnr" id="home" style="width: 100%; margin-top:16px;">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<img src="customer_asset/images/bnr-1.jpg" alt=""/>
				</li>
				<li>
					<img src="customer_asset/images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="customer_asset/images/bnr-3.jpg" alt=""/>
				</li>
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
 				<div class="row news" style="margin-top:10">
 					<div class="col-md-9">
						<a href="#">Iphone giảm giá</a><br>
							Iphone giảm mạnh vào mùa hè này<br>
							Thời gian đăng:
					</div>
 					<div class="col-md-3">
 					<img src="customer_asset/images/ip7.jpg"  class="img-news thumbnail"/>
 				    </div>
					</div>
					<div class="row news">
 					<div class="col-md-9">
						<a href="#">Samsung tung ra sản phẩm mới</a><br>
							Samsung tung ra sản phẩm mới<br>
							Thời gian đăng:
					</div>
 					<div class="col-md-3">
 					<img src="customer_asset/images/ip7.jpg" class="img-news thumbnail"/>
 				    </div>
					</div>
					<div class="row news">
 					<div class="col-md-9">
						<a href="#">Iphone giảm giá</a><br>
							Iphone giảm mạnh vào mùa hè này<br>
							Thời gian đăng:
					</div>
 					<div class="col-md-3">
 					<img src="customer_asset/images/ip7.jpg"  class=" img-news thumbnail"/>
 				    </div>
					</div>

		</div>
		</div>

	<!--banner-ends--> 

	<!--about-starts-->
	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="customer_asset/images//abt-1.jpg" alt=""/>
						<figcaption>
							<h2>Nulla maximus nunc</h2>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="customer_asset/images//abt1.jpg" alt=""/>
						<figcaption>
							<h4>Mauris erat augue</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="customer_asset/images//abt2.jpg" alt=""/>
						<figcaption>
							<h4>Cras elit mauris</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
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
							<a href="chitietsp/{{$vl->id}}" class="mask"><img class="img-responsive zoom-img" src="img/sanpham/anhdaidien/{{$vl->AnhDaiDien}}" alt="" /></a>
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