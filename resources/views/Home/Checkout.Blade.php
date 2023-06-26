<div class="section">
	<form action="{{route('PlayOrder')}}" method="post" >
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Thông tin người nhận</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="firstname" placeholder="First Name">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="lastname" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address">
						</div>
					
						
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Telephone">
						</div>
						<div class="form-group">
							<div class="input-checkbox">
								<input type="checkbox" id="create-account">
								<label for="create-account">
									<span></span>
									Tạo tài khoản ?
								</label>
								<div class="caption">
									<p></p>
									<input class="input" type="password" name="password" placeholder="Enter Your Password">
								</div>
							</div>
						</div>
					</div>
					<!-- /Billing Details -->

					
					<!-- Order notes -->
					{{-- <div class="order-notes">
						<textarea class="input" placeholder="Order Notes"></textarea>
					</div> --}}
					<!-- /Order notes -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Đơn hàng</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>Sản phẩm</strong></div>
							<div><strong>Tạm tính</strong></div>
						</div>
						<div class="order-products">
							@foreach($cart as $item)
								<div class="order-col">
									<div>{{$item['quantity']}}x {{$item['name']}}</div>
									<div>{{number_format($item['quantity']*$item['price'])}}đ</div>
								</div>

							@endforeach
							
							
						</div>
						<div class="order-col">
							<div>Phí vận chuyển</div>
							<div><strong>Miễn phí</strong></div>
						</div>
						<div class="order-col">
							<div><strong>Tổng </strong></div>
							<div><strong class="order-total">{{number_format($total)}}Đ</strong></div>
						</div>
					</div>
					<div class="payment-method">
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-1" value="Thanh toán tiền mặt khi nhận hàng">
							<label for="payment-1">
								<span></span>
								Tiền mặt
							</label>
							<div class="caption">
								<p>Khách hàng thanh toán khi nhận được đơn hàng</p>
							</div>
						</div>
						
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-3" value="Thanh toán chuyển khoản">
							<label for="payment-3">
								<span></span>
								Chuyển khoản
							</label>
							<div class="caption">
								<p>Thanh toán bằng phương thức chuyển khoản</p>
							</div>
						</div>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="terms">
						<label for="terms">
							<span></span>
							Tôi đã đọc và chấp nhận các  <a href="#">điều khoản</a>
						</label>
					</div>
					@csrf
					<button type="submit" class="primary-btn order-submit"> Đặt hàng</button>
				</div>
				<!-- /Order Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</form>
</div>
<!-- /SECTION -->