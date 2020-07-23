@extends('front.layout.main')
 @section('title')
<title>Ecommerce Product | {{$cartproduct[0]['product_name']}}</title> 
<meta property="og:title" content="{{$cartproduct[0]['product_name']}}"/>
@if(!empty($productimg) || count($productimg)>0)
	<meta property="og:image" content="{{ asset('products/image/').'/'.$productimg[0]['image_path'] }}"/>
@endif
<meta property="og:image:width" content="500" />
<meta property="og:image:height" content="500" />
<meta property="og:site_name" content=""/>
<meta property="fb:app_id" content="1234567890" /> 
<meta property="og:type" content="website" /> 
<meta property="og:url" content="https://plug.tuppleapps.com/" /> 
<meta property="og:description" content="{{$cartproduct[0]['short_desc']}}"/>
@endsection 
@section('content')
<!-- Checkout MultiStep Form -->
<div class="container">
	<div class="row">
		<div class="col-md-12 checkout_header">
			<h2 class="checkout_title">
				@if(!empty($businessdata[0]['business_name']))
					{{$businessdata[0]['business_name']}}
				@else
					{{$userdata[0]['first_name']}}
				@endif
			</h2> </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="out_progressbar" id="">
				<li class="active"><span>Customer Details</span></li>
				<li><span>Address</span></li>
				<li><span>Payment</span></li>
			</ul>
			<div class="top-corner-nav">
				<div class="cart_button_right"> <i class="fa fa-shopping-cart"></i> <span class="cart_item"></span> </div>
				<div class="cart_button_right2"> <i class="far fa-edit"></i> </div>
			</div>
		</div>
	</div>
	<div class="row checkout_form_box">
		<!-- checkout part 1 -->
		<div class="col-lg-7 checkout_part_1">
			<!-- right corner -->
			<div class="corner-nav">
				<div class="cart_button_right"> <i class="fa fa-shopping-cart"></i> <span class="cart_item"></span> </div>
				<div class="cart_button_right2"> <i class="fas fa-chevron-left"></i> </div>
			</div>
			<!-- product detail area -->
			<div class="product_title">
				<input type="hidden" id="product_id" name="product_id" value="{{$cartproduct[0]['id']}}">
                <input type="hidden" id="user_id" name="user_id" value="{{$cartproduct[0]['user_id']}}">
                <input type="hidden" id="merchant_name" name="merchant_name" value="{{$userdata[0]['merchant_name']}}">
                <input type="hidden" id="merchant_password" name="merchant_password" value="{{$userdata[0]['merchant_password']}}">
				<input type="hidden" id="currency" name="currency" value="{{$cartproduct[0]['currency']}}">
				<h2 class="title">{{$cartproduct[0]['product_name']}} 

                    <!-- <span>(<span id="variation_1"></span>/<span id="variation_2"></span>)</span> -->

                    </h2>
				<p class="short_desc">{{$cartproduct[0]['short_desc']}}</p>
				<h2 id="p_price">{{explode('-', $cartproduct[0]['currency'])[0]}}  <span>{{$cartproduct[0]['price']}}</span></h2>
				<div class="row variations_option d-none">
					<div class="col-md-6">
						<div class="form-group">
							<label for="variations_option1">color</label>
							<select class="form-control" id="variations_option1" name="variations_option1">
								<option value="red">red</option>
								<option value="green">green</option>
								<option value="blue">blue</option>
								<option value="pink">pink</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="variations_option2">size</label>
							<select class="form-control" id="variations_option2" name="variations_option2">
								<option value="small">small</option>
								<option value="medium">medium</option>
								<option value="large">large</option>
							</select>
						</div>
					</div>
				</div>
				<div> <span><i id="p-quantity-minus"

                                class="fas fa-minus-circle quantity_btn quantity_btn_disable"></i></span> <span><input type="text" id="p_quantity" name="p_quantity" max="{{$cartproduct[0]['order_limit']}}" value="1" disabled /></span> <span><i id="p-quantity-plus" class="fas fa-plus-circle  quantity_btn"></i></span> </div>
				<button class="add_to_cart">Add to Cart <i class="fas fa-chevron-right"></i></button>
				<div class="product-info">
					<div class="product-info-switch"> <i class="fas fa-info"></i> </div>
					<div class="product-info-switch2"> <i class="far fa-image"></i> </div>
				</div> @if(!empty($productimg) || count($productimg)>0)
				<div class="image_area">
					<div id="p_image" class="carousel slide" data-interval="false" data-ride="carousel">
						<!-- The slideshow -->
						<div class="carousel-inner"> @foreach ($productimg as $tag)
							<div class="carousel-item"> <img src="{{ asset('products/image/').'/'.$tag['image_path'] }}" alt="slider"> </div> @endforeach </div>
						<!-- Left and right controls -->@if(count($productimg)>1)
						<a class="carousel-control-prev" href="#p_image" data-slide="prev"> <span class="prev-icon"><i class="fas fa-chevron-left"></i></span> </a>
						<a class="carousel-control-next" href="#p_image" data-slide="next"> <span class="next-icon"><i class="fas fa-chevron-right"></i></span> </a> @endif </div>
				</div> @endif
				<div class="product-description">
					<p> @php $allowed = '
						<div><span><pre><p><br><hr><hgroup><h1><h2><h3><h4><h5><h6><ul><ol><li><dl><dt><dd><strong><em><b><i><u><img><a><abbr><address><blockquote><area><audio><video><form><fieldset><label><input><textarea><caption><table><tbody><td><tfoot><th><thead><tr><iframe>';

                                echo strip_tags($cartproduct[0]['long_desc'], $allowed);

                            @endphp

                        </p>

                    </div>

                </div>

                <!-- product overview area -->

                <div class="overview_area">

                    <h2 class="overview_title">Overview</h2>

                    <div class="overview_cart">

                        <table class="table table-borderless mb-0 overview_table">

                            <tbody>

                                <tr>

                                    <td>

                                    @if(empty($productimg))

                                        <img src="{{ url('front/assets/img/placeholder.png')}}" alt="" class="itme_img"> 

                                    @else

                                    <img src="{{ asset('products/image/').'/'.$productimg[0]['image_path'] }}" alt=""

                                            class="itme_img">

                                    @endif

                                        <span class="item_name">{{$cartproduct[0]['product_name']}}</span> </td>
							<td>{{explode('-', $cartproduct[0]['currency'])[0]}}  {{$cartproduct[0]['price']}}</td>
							<td class="text-right pr-0"> <span><i id="minus1"

                                                class="fas fa-minus-square quantity_btn quantity_btn_disable"></i></span> <span><input type="text" id="o_quantity" name="p_quantity" max="18" value="1"

                                                disabled /></span> <span><i id="plus1" class="fas fa-plus-square  quantity_btn"></i></span> </td>
							</tr>
							</tbody>
							</table> <span class="close_btn"><i class="fas fa-times"></i></span>
							<div class="total_area"> <span class="total_left">Subtotal</span> <span id="total_price" class="total_right">{{explode('-', $cartproduct[0]['currency'])[0]}}  <span>100.00</span></span>
							</div>
							<div class="sub_total text-right"> <span class="total_txt">Total:</span> <span id="sub_total_price">{{explode('-', $cartproduct[0]['currency'])[0]}}  <span>100.00</span></span>
							</div>
						</div> <span class="empty_cart">Your basket is empty</span> </div>
				<div class="overview_area next_overview">
					<h2 class="overview_title">Overview</h2>
					<div class="overview_cart">
						<table class="table table-borderless mb-0 overview_table">
							<tbody>
								<tr>
									<td> @if(empty($productimg)) <img src="{{ url('front/assets/img/placeholder.png')}}" alt="" class="itme_img"> @else <img src="{{ asset('products/image/').'/'.$productimg[0]['image_path'] }}" alt="" class="itme_img"> @endif <span class="item_name" id="product_name">{{$cartproduct[0]['product_name']}}</span> </td>
									<td>{{explode('-', $cartproduct[0]['currency'])[0]}}  <span id="product_price">{{$cartproduct[0]['price']}}</span></td>
									<td>x<span class="cart_item" id="cart_item"></span></td>
									<td class="text-right pr-0"> <span id="total_price">{{explode('-', $cartproduct[0]['currency'])[0]}}  <span>100.00</span></span>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="total_area"> <span class="total_left">Subtotal</span> <span id="total_price" class="total_right">{{explode('-', $cartproduct[0]['currency'])[0]}}  <span>100.00</span></span>
						</div>
						<div class="sub_total text-right"> <span class="total_txt">Total:</span> <span id="sub_total_price">{{explode('-', $cartproduct[0]['currency'])[0]}}  <span  id="product_total_price">100.00</span></span>
						</div>
					</div> <span class="empty_cart">Your basket is empty</span> </div>
			</div>
			<!-- checkout part 2 -->
			<div class="col-lg-5 checkout_part_2">
				<form id="msform">
					<!-- progressbar -->
					<ul class="in_progressbar" id="progressbar">
						<li class="active"><span>Customer Details</span></li>
						<li><span>Address</span></li>
						<li><span>Payment</span></li>
					</ul>
					<!-- form 1 fieldsets -->
					<fieldset id="check_form_1">
						<h2 class="fs-title">Customer Details</h2>
						<div class="form-group">
							<label for="email">Email address<span> *</span></label>
							<input type="email" class="form-control" placeholder="Email address" id="email" name="email"> </div>
						<div class="form-group">
							<label for="country">Country<span> *</span></label>
							<select class="form-control" id="country" name="country">
								<option value="Andorra">Andorra</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belgium">Belgium</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Canada">Canada</option>
								<option value="Canary Islands">Canary Islands</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Colombia">Colombia</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Croatia">Croatia</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Estonia">Estonia</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Greece">Greece</option>
								<option value="Grenada">Grenada</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Latvia">Latvia</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Malta">Malta</option>
								<option value="Mexico">Mexico</option>
								<option value="Monaco">Monaco</option>
								<option value="Morocco">Morocco</option>
								<option value="Namibia">Namibia</option>
								<option value="Netherlands">Netherlands</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Panama">Panama</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Qatar">Qatar</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="San Marino">San Marino</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Serbia">Serbia</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="South Africa">South Africa</option>
								<option value="South Korea">South Korea</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="St. Vincent & Grenadines">St. Vincent & Grenadines</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Tunisia">Tunisia</option>
								<option data-dest="Turkey" selected="selected" value="Turkey">Turkey</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Vietnam">Vietnam</option>
							</select>
						</div>
						<input type="button" name="next" class="next1 action-button next1-disable" value="Next" />
						<div class="payment_options_desc">
							<p>Payment Options</p> <img src="{{url('front/assets/img/cash.svg')}}" alt="cash"> </div>
					</fieldset>
					<!-- form 2 fieldsets -->
					<fieldset id="check_form_2">
						<h2 class="fs-title">Billing Information</h2>
                            <div class="row">
							<div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">First Name<span> *</span></label>
                                    <input type="text" class="form-control" placeholder="First Name" id="firstname" name="firstname"> 
                                </div>
							</div>
							<div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name<span> *</span></label>
                                    <input type="text" class="form-control" placeholder="Last Name" id="lastname" name="lastname"> 
                                </div>
							</div>
						</div>
						<div class="form-group">
							<label for="address">Address<span> *</span></label>
							<input type="text" class="form-control" placeholder="Address" id="address" name="address"> </div>
						<div class="form-group">
							<label for="mobile">Mobile Number<span> *</span></label>
							<input type="number" class="form-control" placeholder="Mobile Number" id="mobile" name="mobile"> </div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label for="city">City<span> *</span></label>
									<input type="text" class="form-control" placeholder="City" id="city" name="city"> </div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label for="zip">Zip/Postal Code<span> *</span></label>
									<input type="text" class="form-control" placeholder="Zip/Postal Code" id="zip" name="zip"> </div>
							</div>
						</div>
						<div class="form-group stategroup" class="multibtn_tab">
							<label for="state">State<span> *</span></label>
							<select class="form-control" id="state" name="state">
								<option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Arunachal Pradesh">Arunachal Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu & Kashmir">Jammu & Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Manipur">Manipur</option>
								<option value="Meghalaya">Meghalaya</option>
								<option value="Mizoram">Mizoram</option>
								<option value="Nagaland">Nagaland</option>
								<option value="Odisha">Odisha</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Sikkim">Sikkim</option>
								<option value="Tamil Nadu">Tamil Nadu</option>
								<option value="Telangana">Telangana</option>
								<option value="Tripura">Tripura</option>
								<option value="Uttarakhand">Uttarakhand</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="West Bengal">West Bengal</option>
								<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Delhi">Delhi</option>
								<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
								<option value="Daman and Diu">Daman and Diu</option>
								<option value="Lakshadweep">Lakshadweep</option>
								<option value="Puducherry">Puducherry</option>
							</select>
						</div>
						<input type="button" name="previous" class="btn previous action-button-previous" id="biling_prev" value="Previous" />
						<input type="button" name="next" class="btn next2 action-button next_btn" value="Next" /> </fieldset>
					
					<!-- form 3 fieldsets -->
					<fieldset id="check_form_3" class="multibtn_tab">
					<input type="hidden" id="payment_type" name="payment_type" value="{{$cartproduct[0]['payment_type']}}">
					@if($cartproduct[0]['payment_type'] == 'Payfull')
						<h2 class="fs-title">Pay with card</h2>
                        <div class="form-group card_info">
                            <label for="cardnumber">Card information</label>
                            <input type="text" class="form-control" id="cardnumber" placeholder="1234 1234 1234 1234"
                                name="cardnumber">
                            <div class="card_icon">
                                <img id="visa" src="{{url('front/assets/img/visa.svg')}}" alt="visa">
                                <img id="mastercard" src="{{url('front/assets/img/mastercard.svg')}}" alt="mastercard">
                                <img id="amex" src="{{url('front/assets/img/amex.svg')}}" alt="amex">
                                <img id="discover" src="{{url('front/assets/img/discover.svg')}}" alt="discover">
                            </div>
                            <div class="cardexpiry_info">
                                <input type="text" class="form-control" id="cardexpiry" placeholder="MM / YYYY"
                                    name="cardexpiry">
                                <input type="text" class="form-control" id="cardcvc" placeholder="CVC" name="cardcvc">
                                <img id="cvc_icon" src="{{url('front/assets/img/cvc.png')}}" alt="cvc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardname">Name on card</label>
                            <input type="text" class="form-control" id="cardname" placeholder="" name="cardname">
                        </div>
					@else
						<h2 class="fs-title">Bill to</h2>
						<div id="formdata"></div>
					@endif
						<input type="button" name="previous" class="btn previous action-button-previous" id="bilto_prev" value="Previous" />
						<input type="text" name="submit" class="btn submit action-button next_btn" value="Place Order" /> 
					</fieldset>
					
					<fieldset id="check_form_4">
					<p class="text-center fs-title" id="form_loader" style="display:none;">Please Wait...</p>
						<div class="success_order" style="display:none;"> <i class="far fa-check-circle"></i>
							<h2>Congratulations</h2>
							<p>Thank you for your purchase. Your payment is being processed and you will receive an email as soon as it’s confirmed.</p>
						</div>
						<div class="fail_order" style="display:none;"> <i class="far fa-times-circle text-danger"></i>
							<h2>Something is wrong.</h2>
							<!-- <p>Invalid fomm data.</p> -->
						</div>
					</fieldset>
					<div class="row form_footer">
						<div class="col-md-6 form-left-detail">
							<svg class="pnp-svg" viewBox="0 0 16.222 19.049">
								<g class="pnp-c1-fill">
									<path d="M15.865 12.721a9.61 9.61 0 0 1-2.3 3.586 12.049 12.049 0 0 1-4.5 2.665 1.376 1.376 0 0 1-.437.077h-.017a1.4 1.4 0 0 1-.268-.026 1.45 1.45 0 0 1-.184-.05 12.048 12.048 0 0 1-4.5-2.664 9.592 9.592 0 0 1-2.3-3.585 20.648 20.648 0 0 1-.84-7.536v-.034c.009-.184.014-.378.017-.592a2.019 2.019 0 0 1 1.9-1.978A7.835 7.835 0 0 0 7.77.336l.013-.011a1.22 1.22 0 0 1 1.657 0l.012.012a7.836 7.836 0 0 0 5.333 2.248 2.019 2.019 0 0 1 1.9 1.978c0 .215.009.409.017.592v.015a20.683 20.683 0 0 1-.837 7.551zm0 0" transform="translate(-.5)" fill-opacity="0.7"></path>
									<path d="M226.187 12.725a9.61 9.61 0 0 1-2.3 3.586 12.048 12.048 0 0 1-4.5 2.665 1.376 1.376 0 0 1-.437.077V0a1.222 1.222 0 0 1 .812.324l.012.012a7.836 7.836 0 0 0 5.333 2.248 2.019 2.019 0 0 1 1.9 1.978c0 .215.009.409.017.592v.015a20.683 20.683 0 0 1-.837 7.556zm0 0" transform="translate(-210.822 -.004)"></path>
									<path d="M100.39 133.146a4.753 4.753 0 0 1-4.731 4.748h-.017a4.748 4.748 0 1 1 0-9.5h.017a4.753 4.753 0 0 1 4.731 4.752zm0 0" class="cls-3" transform="translate(-87.531 -123.621)" style="fill:#fff"></path>
									<path d="M223.68 133.146a4.753 4.753 0 0 1-4.731 4.748v-9.5a4.753 4.753 0 0 1 4.731 4.752zm0 0" class="cls-4" transform="translate(-210.822 -123.621)" style="fill:#e1e1e1"></path>
									<path d="M158.726 212.934l-2.138 2.138-.462.462a.559.559 0 0 1-.791 0l-.993-.994a.559.559 0 1 1 .79-.79l.6.6 2.205-2.205a.559.559 0 0 1 .79.79zm0 0" transform="translate(-148.46 -204.093)" fill-opacity="0.7"></path>
									<path d="M221.087 212.934l-2.138 2.138v-1.581l1.348-1.348a.559.559 0 0 1 .79.79zm0 0" transform="translate(-210.822 -204.093)"></path>
								</g>
							</svg> <span>Secure Shopping</span> </div>
						<div class="col-md-6 form-right-detail">
							<p>
							@if(!empty($businessdata[0]['business_name']))
								<p>{{$businessdata[0]['business_name']}}<p>
								<p>{{$businessdata[0]['address']}}<p>
								<p>{{$businessdata[0]['city']}} {{$businessdata[0]['postal_code']}}</p>
								<p>{{$businessdata[0]['country']}}<p>
							@else
								{{$userdata[0]['first_name']}}
							</p>
							<p>Turkey</p>
							@endif
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- Checkout MultiStep Form -->
    @endsection
    @section('scripts')
	<script>
	$('.carousel-item').first().addClass('active');
	$('#p_image').carousel();
	</script>
	<script>
	$(document).ready(function() {
		$(window).resize(function() {
			if($(window).width() >= 992) {
				$(".in_progressbar").attr("id", "progressbar");
				$(".out_progressbar").attr("id", "");
				$(".corner-nav").show();
				$(".top-corner-nav").hide();
			} else {
				$(".in_progressbar").attr("id", "");
				$(".out_progressbar").attr("id", "progressbar");
				$(".corner-nav").hide();
				$(".top-corner-nav").show();
			}
		}).resize();
	});
	// cart button
	$(".cart_button_right").click(function() {
		$(".cart_button_right, .product_title").hide();
		$(".cart_button_right2, .overview_area").show();
	});
	$(".cart_button_right2").click(function() {
		$(".cart_button_right2, .overview_area").hide();
		$(".cart_button_right, .product_title").show();
	});
	//variation option
	$("#variation_1").text($("#variations_option1").val());
	$("#variations_option1").change(function() {
		$("#variation_1").text($(this).val());
	});
	$("#variation_2").text($("#variations_option2").val());
	$("#variations_option2").change(function() {
		$("#variation_2").text($(this).val());
	});
	//product info switch
	$(".product-info-switch").click(function() {
		$(".product-info-switch, .image_area").hide();
		$(".product-info-switch2, .product-description").show();
	});
	$(".product-info-switch2").click(function() {
		$(".product-info-switch2, .product-description").hide();
		$(".product-info-switch, .image_area").show();
	});
	// empty cart button
	$(".close_btn").click(function() {
		$(".overview_cart").hide();
		$(".empty_cart").show();
		$(".add_to_cart").show();
		$(".cart_item").text("0");
		$(".next1").addClass("next1-disable");
	});
	// add to cart button
	$(".add_to_cart").click(function() {
		$(".overview_cart").show();
		$(".empty_cart").hide();
		$(".add_to_cart").hide();
		$(".cart_item").text($input.val());
		$(".next1").removeClass("next1-disable");
	});
	// product detail area
	var $input = $("#p_quantity, #o_quantity");
	var $price = $("#p_price").find("span");
	var $price_value = $price.text();
	var $max_qty = $("#p_quantity").attr("max");
	$(".cart_item").text("0");
	var $sub_total = $("#sub_total_price, #total_price").find("span");
	$sub_total.text($price.text());
	$(".quantity_btn").click(function() {
		$("#p-quantity-plus, #plus1").removeClass("quantity_btn_disable");
		$("#p-quantity-minus, #minus1").removeClass("quantity_btn_disable");
		if($(this).attr("id") === "p-quantity-plus" || $(this).attr("id") === "plus1") {
			if($input.val() < parseInt($max_qty)) {
				$input.val(parseInt($input.val()) + 1);
				$price.text((parseFloat($price_value) * $input.val()).toFixed(2));
				$(".cart_item").text($input.val());
				$sub_total.text($price.text());
			}
			if($input.val() == $max_qty) {
				$("#p-quantity-plus, #plus1").addClass("quantity_btn_disable");
			}
		} else if($input.val() > 1) {
			$input.val(parseInt($input.val()) - 1);
			$price.text((parseFloat($price_value) * $input.val()).toFixed(2));
			$(".cart_item").text($input.val());
			$sub_total.text($price.text());
			if($input.val() == 1) {
				$("#p-quantity-minus, #minus1").addClass("quantity_btn_disable");
			}
		}
	});
	// checkout form 1 validation
	function validform1() {
		var valid = true;
		$(".form-control").removeClass("form-control-error");
		if($("#email").val() === "") {
			$("#email").addClass("form-control-error");
			valid = false;
		} else {
			var regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
			if(!regex.test($("#email").val())) {
				$("#email").addClass("form-control-error");
				valid = false;
			}
		}
		if($("#country").val() === "") {
			$("#country").addClass("form-control-error");
			valid = false;
		}
		return valid;
	}
	// checkout form 2 validation
	function validform2() {
		var valid = true;
		$(".form-control").removeClass("form-control-error");
		if($("#firstname").val() === "") {
			$("#firstname").addClass("form-control-error");
			valid = false;
		}
        if($("#lastname").val() === "") {
			$("#lastname").addClass("form-control-error");
			valid = false;
		}
		if($("#address").val() === "") {
			$("#address").addClass("form-control-error");
			valid = false;
		}
		if($("#mobile").val() === "" || $("#mobile").val().length > 12 || $("#mobile").val().length < 7) {
			$("#mobile").addClass("form-control-error");
			valid = false;
		} 
		if($("#city").val() === "") {
			$("#city").addClass("form-control-error");
			valid = false;
		}
		if($("#zip").val() === "" || $("#zip").val().length > 8 || $("#zip").val().length < 4) {
			$("#zip").addClass("form-control-error");
			valid = false;
		}
		if($("#country").val() == "India") {
			if($("#state").val() === "") {
				$("#state").addClass("form-control-error");
				valid = false;
			}
		}
		return valid;
	}

    if($('#payment_type').val() == 'Payfull') {
        var cardnumber = $('#cardnumber');
        var cardexpiry = $('#cardexpiry');
        var cvc = $("#cardcvc");
        var visa = $("#visa");
        var mastercard = $("#mastercard");
        var amex = $("#amex");
        var discover = $("#discover");

        cardnumber.payform('formatCardNumber');
        cardexpiry.payform('formatCardExpiry');
        cvc.payform('formatCardCVC');


        $('#cardnumber').keyup(function () {
            amex.removeAttr('style');
            visa.removeAttr('style');
            mastercard.removeAttr('style');
            discover.removeAttr('style');

            if ($.payform.parseCardType(cardnumber.val()) == 'visa') {
                visa.css({
                    'transform': 'translateX(85px) translateZ(0px)'
                });
                mastercard.css({
                    'transform': 'translateX(57px) translateZ(0px)',
                    'opacity': '0'
                });
                amex.css({
                    'transform': 'translateX(28px) translateZ(0px)',
                    'opacity': '0'
                });
                discover.css({
                    'opacity': '0'
                });
            } else if ($.payform.parseCardType(cardnumber.val()) == 'mastercard') {
                visa.css({
                    'transform': 'translateX(85px) translateZ(0px)',
                    'opacity': '0'
                });
                mastercard.css({
                    'transform': 'translateX(57px) translateZ(0px)'
                });
                amex.css({
                    'transform': 'translateX(28px) translateZ(0px)',
                    'opacity': '0'
                });
                discover.css({
                    'opacity': '0'
                });
            } else if ($.payform.parseCardType(cardnumber.val()) == 'amex') {
                visa.css({
                    'transform': 'translateX(85px) translateZ(0px)',
                    'opacity': '0'
                });
                mastercard.css({
                    'transform': 'translateX(57px) translateZ(0px)',
                    'opacity': '0'
                });
                amex.css({
                    'transform': 'translateX(28px) translateZ(0px)'
                });
                discover.css({
                    'opacity': '0'
                });
            } else if ($.payform.parseCardType(cardnumber.val()) == 'discover') {
                visa.css({
                    'transform': 'translateX(85px) translateZ(0px)',
                    'opacity': '0'
                });
                mastercard.css({
                    'transform': 'translateX(57px) translateZ(0px)',
                    'opacity': '0'
                });
                amex.css({
                    'transform': 'translateX(28px) translateZ(0px)',
                    'opacity': '0'
                });
            }

            var valid = true;
            $(".error-cardnumber").remove();
            $(".form-control-error-number").removeClass("form-control-error");

            if (cardnumber.val().replace(/ /g, '').length == 16) {
                if ($.payform.validateCardNumber(cardnumber.val()) == false) {
                    $("#cardnumber, #cardexpiry, #cardcvc").addClass("form-control-error form-control-error-number");
                    valid = false;
                }
            }
        });


        $('#cardnumber').blur(function () {
            var valid = true;
            $(".form-control-error-number").removeClass("form-control-error");
            if ($("#cardnumber").val() === "") {
                $("#cardnumber, #cardexpiry, #cardcvc").addClass("form-control-error form-control-error-number");
                valid = false;
            }
        });
        $('#cardexpiry').blur(function () {
            var valid = true;
            $(".form-control-error-number").removeClass("form-control-error");
            if ($("#cardexpiry").val() === "") {
                $("#cardnumber, #cardexpiry, #cardcvc").addClass("form-control-error form-control-error-number");
                valid = false;
            }
        });
        $('#cardcvc').blur(function () {
            var valid = true;
            $(".form-control-error-number").removeClass("form-control-error");
            if ($("#cardcvc").val() === "") {
                $("#cardnumber, #cardexpiry, #cardcvc").addClass("form-control-error form-control-error-number");
                valid = false;
            }
        });
	

        function validform3() {
            var valid = true;
            $(".form-control").removeClass("form-control-error");
            if($("#cardname").val() === "") {
                $("#cardname").addClass("form-control-error");
                valid = false;
            }
            if (cardnumber.val().replace(/ /g, '').length == 16) {
                if ($.payform.validateCardNumber(cardnumber.val()) == false) {
                    $("#cardnumber, #cardexpiry, #cardcvc").addClass("form-control-error form-control-error-number");
                    valid = false;
                }
            }
            if ($("#cardnumber").val() === "" || $("#cardexpiry").val() === "" || $("#cardcvc").val() === "") {
                $("#cardnumber, #cardexpiry, #cardcvc").addClass("form-control-error form-control-error-number");
                valid = false;
            }
            return valid;
	    }
	}


	//multistep form next button
	var current_fs, next_fs, previous_fs; //fieldsets
	$(".next1").click(function() {
		if(validform1()) {
			$(".next1").attr("value", "Please Wait...");
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();
			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
			//disable state dropudown
			if($("#country").val() !== "India") {
				$(".stategroup").css("display", "none");
				$("#state").prepend($("<option value=' '></option>"));
				$("#state option[value=' ']").attr('selected', true);
			}
			// show the next fieldset
			next_fs.show();
			current_fs.hide();
			$(".corner-nav").hide();
			$(".top-corner-nav").hide();
			$(".product_title").hide();
			$(".overview_area").hide();
			$(".next_overview").attr('style', 'display: block !important');
		}
	});
	$(".next2").click(function() {
		if(validform2()) {
			$(".next2").attr("value", "Please Wait...");
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();
			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
			// show the next fieldset
			next_fs.show();
			current_fs.hide();
			var name = $("#firstname").val()+' '+$("#lastname").val();
			var email = $("#email").val();
			var mobile = $("#mobile").val();
			var address = $("#address").val();
			var city = $("#city").val() + " " + $("#state").val() + " " + $("#zip").val();
			var country = $("#country").val();
			$('#formdata').html("<p>" + name + "</p><p>" + email + "</p><p>" + mobile + "</p><p>" + address + "</p><p>" + city + "</p><p>" + country + "</p>")
		}
	});
	$(".previous").click(function() {
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		//de-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		//show the previous fieldset
		previous_fs.show();
		current_fs.hide();
		$(".next1, .next2").val("Next");
	});
	$(".submit").click(function() {

		if($('#payment_type').val() == 'Payfull') {
			if(validform3()) {
			
				merchant_name = $("#merchant_name").val();
				merchant_password = $("#merchant_password").val();
				cardname = $("#cardname").val();
				cardnumber = $("#cardnumber").val();
				cardexpiry = $("#cardexpiry").val();
				res = cardexpiry.split("/");
				expirymonth = res[0];
				expiryyear = res[1];
				cardcvc = $("#cardcvc").val();
			
				$(".submit").attr("value", "Please Wait...");
				current_fs = $(this).parent();
				next_fs = $(this).parent().next();
				// show the next fieldset
				next_fs.show();
				current_fs.hide();
				$("#progressbar").hide();
				$("#form_loader").show();
				product_id = $("#product_id").val();
				user_id = $("#user_id").val();
				
				product_name = $("#product_name").text();
				product_price = $("#product_price").text();
				cart_item = $("#cart_item").text();
				product_total_price = $("#product_total_price").text();
				payment_type = $('#payment_type').val();
				currency = $('#currency').val();

				console.log(product_name, product_price, cart_item, product_total_price);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'POST',
					url: "{{ url('orderdata') }}",
					data: $('#msform').serialize() + "&product_name=" + product_name + "&product_price=" + product_price + "&cart_item=" + cart_item + "&product_total_price=" + product_total_price + "&product_id=" + product_id + "&user_id=" + user_id+ "&merchant_name=" + merchant_name+ "&merchant_password=" + merchant_password+ "&payment_type=" + payment_type+ "&currency=" + currency,
					contentType: "application/x-www-form-urlencoded",
					success: function(response) {
						$("#form_loader").hide();

						console.log(response);
						if(response['data']['status'] == '1') {
							$("#msform")[0].reset();
							$('.success_order').show()
						} else {
							$('.fail_order').show();
							$('.success_order').hide()
						}
					}
				});
			}
		} else {
			
				merchant_name = $("#merchant_name").val();
				merchant_password = $("#merchant_password").val();
			
				$(".submit").attr("value", "Please Wait...");
				current_fs = $(this).parent();
				next_fs = $(this).parent().next();
				// show the next fieldset
				next_fs.show();
				current_fs.hide();
				$("#progressbar").hide();
				$("#form_loader").show();
				product_id = $("#product_id").val();
				user_id = $("#user_id").val();
				
				product_name = $("#product_name").text();
				product_price = $("#product_price").text();
				cart_item = $("#cart_item").text();
				product_total_price = $("#product_total_price").text();
				payment_type = $('#payment_type').val();
				currency = $('#currency').val();

				console.log(product_name, product_price, cart_item, product_total_price);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'POST',
					url: "{{ url('orderdata') }}",
					data: $('#msform').serialize() + "&product_name=" + product_name + "&product_price=" + product_price + "&cart_item=" + cart_item + "&product_total_price=" + product_total_price + "&product_id=" + product_id + "&user_id=" + user_id+ "&merchant_name=" + merchant_name+ "&merchant_password=" + merchant_password+ "&payment_type=" + payment_type+ "&currency=" + currency,
					contentType: "application/x-www-form-urlencoded",
					success: function(response) {
						$("#form_loader").hide();

						console.log(response);
						if(response['data']['status'] == '1') {
							$("#msform")[0].reset();
							$('.success_order').show()
						} else {
							$('.fail_order').show();
							$('.success_order').hide()
						}
					}
				});
		}
	})
    </script> 
    @endsection 
    </body>

</html>