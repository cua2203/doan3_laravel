<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

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
		<style>
			.pagination {
				display: flex;
				justify-content: center;
				margin-top: 20px;
			}

			.pagination .page-item {
				margin: 0 5px;
			}

			.pagination .page-link {
				color: #000;
				background-color: #fff;
				padding: 5px 10px;
				border: 1px solid #ddd;
			}

			.pagination .page-link:hover {
				background-color: #f0f0f0;
			}
		</style>

    </head>
	<body>
		<form action="{{route('Get_Product_Sorting')}} " >
		
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Vân Nghệ</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> Tài khoản</a></li>
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
								<a  href="{{route('Home')}}" class="logo">
									<img src="/assets/Home/img/logo.png" alt="">
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
									<input class="input" value="{{request('search')}}" name="search" placeholder="Search here">	
									<button type="submit" class="search-btn">Search</button>
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
										{{-- <div class="qty"></div> --}}
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
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">HOME</a></li>
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

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							{{-- <li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li> --}}
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						{{-- <div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
                                @foreach($category as $key=>$item)

                                    <div class="input-checkbox">
                                        <input type="checkbox" id="category-1">
                                        <label for="category-1">
                                            <span></span>
                                            {{Str::upper($item->category_name)}}
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                @endforeach

								
							</div>
						</div> --}}
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
                                @foreach($brand as $key =>$item)
                                    <div class="input-checkbox">
                                        <input onchange="this.form.submit()" type="checkbox" id="brand-{{$key+1}}" name="brand[{{$key+1}}]"  {{(request('brand')[$key+1] ?? '') == 'on' ? 'checked' : ''}}>
                                        <label for="brand-{{$key+1}}">
                                            <span></span>
                                            {{Str::upper($item->brand_name)}}
                                            <small></small>
                                        </label>
                                    </div>
                                @endforeach
							
							</div>
						</div>
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
								@foreach($category as $key =>$item)

									<div class="input-checkbox">
										
										<label >
											<a href="{{route('Get_Product_By_Category').'/'.$item->id}}">{{Str::upper($item->category_name)}}</a>
											{{-- <small>(120)</small> --}}
										</label>
									</div>
								@endforeach
	
							</div>
						</div>
						<!-- /aside Widget -->
						<!-- /aside Widget -->
							<!-- aside Widget -->
							{{-- <div class="aside">
								<h3 class="aside-title">Price</h3>
								<div class="price-filter">
									<div id="price-slider"></div>
									<div class="input-number price-min">
										<input id="price-min" type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									<span>-</span>
									<div class="input-number price-max">
										<input id="price-max" type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
							</div> --}}
							<!-- /aside Widget -->

						<!-- aside Widget -->
						{{-- <div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="/assets/Home/img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="/assets/Home/img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="/assets/Home/img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>
						</div> --}}
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
					
							
							<div class="store-filter clearfix">
								<div class="store-sort">
									<label>
										Sort By:
										<select class="input-select" name="sortby" onchange="this.form.submit()">
											<option {{request('sortby')=='latest'?'selected':''}}  value="latest">Latest</option>
											<option  {{request('sortby')=='oldest'?'selected':''}} value="oldest">Oldest</option>
											<option {{request('sortby')=='name-ascending'?'selected':''}} value="name-ascending">Name A-Z</option>
											<option {{request('sortby')=='name-descending'?'selected':''}} value="name-descending">Name Z-A</option>
											<option {{request('sortby')=='price-ascending'?'selected':''}} value="price-ascending">Price Ascending</option>
											<option {{request('sortby')=='price-descending'?'selected':''}} value="price-descending">Price Decrease</option>
	
										</select>
									</label>
									<label>
										Show:
										<select class="input-select" name="show" onchange="this.form.submit()">
											<option {{request('show')=='3'?'selected':''}} value="3">3</option>
											<option {{request('show')=='6'?'selected':''}} value="6">6</option>
											<option {{request('show')=='9'?'selected':''}} value="9">9</option>
										</select>
									</label>
								</div>
								<ul class="store-grid">
									<li class="active"><i class="fa fa-th"></i></li>
									<li><a href="#"><i class="fa fa-th-list"></i></a></li>
								</ul>
							</div>

						
					
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<div class="row">
								@foreach($data as $key =>$item)
									@if($key % 3 === 0)
										</div> <!-- Đóng hàng hiện tại -->
										<div class="row"> <!-- Tạo hàng mới -->
									@endif
									<div class="col-sm-4">
										<div class="product  ">
											<a href="{{route('Detail').'/'.$item->id}}">
												<div class="product-img">
													<img style="width:80%,margin:0 auto" src="/uploads/Product/{{$item->image_url}}" alt="">
													<div class="product-label">
														<span class="sale">-5%</span>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">{{$item->category->category_name}}</p>
													<h3 class="product-name"><a href="#">{{Str::limit($item->product_name ,$limit = 50, $end = '...')}}</a></h3>
													<h4 class="product-price">{{number_format($item->price)}}<del class="product-old-price">{{number_format($item->price -$item->price*5/100)}}</del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<a href="{{route('AddToCart').'/'.$item->id}}"><button type="button" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
												</div>
											</a>
										</div>
									</div>
								@endforeach
							</div>
				
						</div>
					
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="pagination">
							{{-- {{ $data->appends(['search' => request()->input('search')])->links() }} --}}
							{{ $data->render('Paginate') }}
						
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		{{-- <div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div> --}}
		<!-- /NEWSLETTER -->

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
	</form>
	</body>
</html>
