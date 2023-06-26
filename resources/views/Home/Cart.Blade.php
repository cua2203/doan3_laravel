<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro </title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="/assets/Home/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/assets/Home/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="/assets/Home/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="/assets/Home/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="/assets/Home/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="/assets/Home/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
    <body>
		<!-- HEADER -->
		<header >
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{route('Home')}}"class="logo">
									<img src="/assets/Home//img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<div>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</div>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu thích</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a href="{{route('ViewCart')}}">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
										<div class="qty">{{$total}}</div>
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation" >
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						@foreach($brand as $item)
						<li><a href="#">{{Str::upper($item->brand_name)}}</a></li>
					 @endforeach
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        <div class="container" style="min-height:400px">
            @if(Session::has('msg'))
                <script>
                    alert('{{ Session::get('msg') }}');
                </script>
            @endif

			@if(Session::has('cart'))
				<table class="table table-bordered table-striped ">
					<thead>
						<tr>
							
							<td style="width:25%">Tên SP</td>
							<td style="width:25%">Ảnh SP</td>
							<td style="width:10%">Số lượng</td>
							<td style="width:10%">Đơn giá</td>
							<td style="width:10%">Thành tiền</td>
							<td style="width:10%"></td>
						</tr>
					</thead>
					<tbody>
						@foreach($cart as $key => $item)

							<tr >
							
								<td> {{$item['name']}}</td>
								<td><img src="uploads/Product/{{$item['image']}}" width="100"/></td>
								<td style="display:flex"> <a class="btn btn-default" href="{{route('Decrease').'/'.$item['id']}}"> < </a>
									<input style="width:40%"type="text" value="{{$item['quantity']}}">
									<a class="btn btn-default" href="{{route('Increase').'/'.$item['id']}}"> > </a>
								</td>
								<td>{{number_format($item['price'])}}đ</td>
								<td>{{number_format($item['price']*$item['quantity'])}}đ</td>
								<td><a href="{{route('RemoveItem').'/'.$item['id']}}"  class="btn btn-danger">Xoá</a></td>
							</tr>  
						@endforeach
					</tbody>
                </table>
			@endif

			@if(!Session::has('cart'))
			    <br><br><br><br><br><br>

			    <h2 style="margin-left:230px"> Không có sản phẩm nào trong giỏ hàng !</h2>
			@endif
            
        </div>
        @if(Session::has('cart'))
			    
				<div>
					@include('Home.Checkout')
				</div>
		@endif
		


        <!-- FOOTER -->
		@include('Footer')
        <!-- /FOOTER -->

        <!-- jQuery Plugins -->
        <script src="/assets/Home/js/jquery.min.js"></script>
        <script src="/assets/Home/js/bootstrap.min.js"></script>
        <script src="/assets/Home/js/slick.min.js"></script>
        <script src="/assets/Home/js/nouislider.min.js"></script>
        <script src="/assets/Home/js/jquery.zoom.min.js"></script>
        <script src="/assets/Home/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        

    </body>
</html>