@extends('front.layout.main')
@section('content')
    <!-- Checkout MultiStep Form -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 checkout_header">
                <h2 class="checkout_title">Raxit</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="out_progressbar" id="">
                    <li class="active"><span>Customer Details</span></li>
                    <li><span>Address</span></li>
                    <li><span>Overview</span></li>
                </ul>
                <div class="top-corner-nav">
                    <div class="cart_button_right">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="cart_item"></span>
                    </div>
                    <div class="cart_button_right2">
                        <i class="far fa-edit"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row checkout_form_box">
            <!-- checkout part 1 -->
            <div class="col-lg-7 checkout_part_1">
                <!-- right corner -->
                <div class="corner-nav">
                    <div class="cart_button_right">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="cart_item"></span>
                    </div>
                    <div class="cart_button_right2">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                </div>
                <!-- product detail area -->
                <div class="product_title">
                    <h2 class="title">test <span>(<span id="variation_1"></span>/<span id="variation_2"></span>)</span></h2>
                    <p class="short_desc">test product short descripation</p>
                    <h2 id="p_price">₹<span>100.00</span></h2>
                    <div class="row variations_option">
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
                    <div>
                        <span><i id="p-quantity-minus"
                                class="fas fa-minus-circle quantity_btn quantity_btn_disable"></i></span>
                        <span><input type="text" id="p_quantity" name="p_quantity" max="18" value="1" disabled /></span>
                        <span><i id="p-quantity-plus" class="fas fa-plus-circle  quantity_btn"></i></span>
                    </div>
                    <button class="add_to_cart">Add to Cart <i class="fas fa-chevron-right"></i></button>
                    <div class="product-info">
                        <div class="product-info-switch">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="product-info-switch2">
                            <i class="far fa-image"></i>
                        </div>
                    </div>
                    <div class="image_area">
                        <div id="p_image" class="carousel slide" data-interval="false" data-ride="carousel" >
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="admin/assets/img/checkout/1.jpg" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="admin/assets/img/checkout/2.jpg" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="admin/assets/img/checkout/3.jpg" alt="">
                              </div>
                            </div>
                            
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#p_image" data-slide="prev">
                              <span class="prev-icon"><i class="fas fa-chevron-left"></i></span>
                            </a>
                            <a class="carousel-control-next" href="#p_image" data-slide="next">
                              <span class="next-icon"><i class="fas fa-chevron-right"></i></span>
                            </a>
                          </div>
                    </div>
                    <div class="product-description">
                        <p>In this article, we will learn how to implement sweetalert in laravel 5 application. Here i am going to use uxweb/sweet-alert package for Sweet Alert Messages in laravel 5 application. we can simply use with laravel 5 all version like 5.1, 5.2, 5.3, 5.4 and next upcoming 5.5 too.</p>
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
                                        <img src="admin/assets/img/checkout/placeholder.png" alt="" class="itme_img">
                                        <span class="item_name">test</span>
                                    </td>
                                    <td>₹100.00</td>
                                    <td class="text-right pr-0">
                                        <span><i id="minus1"
                                                class="fas fa-minus-square quantity_btn quantity_btn_disable"></i></span>
                                        <span><input type="text" id="o_quantity" name="p_quantity" max="18" value="1"
                                                disabled /></span>
                                        <span><i id="plus1" class="fas fa-plus-square  quantity_btn"></i></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <span class="close_btn"><i class="fas fa-times"></i></span>
                        <div class="total_area">
                            <span class="total_left">Subtotal</span>
                            <span id="total_price" class="total_right">₹<span>100.00</span></span>
                        </div>
                        <div class="sub_total text-right">
                            <span class="total_txt">Total:</span> <span id="sub_total_price">₹<span>100.00</span></span>
                        </div>
                    </div>
                    <span class="empty_cart">Your basket is empty</span>
                </div>
                <div class="overview_area next_overview">
                    <h2 class="overview_title">Overview</h2>
                    <div class="overview_cart">
                        <table class="table table-borderless mb-0 overview_table">
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="admin/assets/img/checkout/placeholder.png" alt="" class="itme_img">
                                        <span class="item_name">test</span>
                                    </td>
                                    <td>₹100.00</td>
                                    <td>x<span class="cart_item"></span></td>
                                    <td class="text-right pr-0">
                                        <span id="total_price">₹<span>100.00</span></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="total_area">
                            <span class="total_left">Subtotal</span>
                            <span id="total_price" class="total_right">₹<span>100.00</span></span>
                        </div>
                        <div class="sub_total text-right">
                            <span class="total_txt">Total:</span> <span id="sub_total_price">₹<span>100.00</span></span>
                        </div>
                    </div>
                    <span class="empty_cart">Your basket is empty</span>
                </div>
            </div>
            <!-- checkout part 2 -->
            <div class="col-lg-5 checkout_part_2">
                <form id="msform">
                    <!-- progressbar -->
                    <ul class="in_progressbar" id="progressbar">
                        <li class="active"><span>Customer Details</span></li>
                        <li><span>Address</span></li>
                        <li><span>Overview</span></li>
                    </ul>
                    <!-- form 1 fieldsets -->
                    <fieldset id="check_form_1">
                        <h2 class="fs-title">Customer Details</h2>
                        <div class="form-group">
                            <label for="email">Email address<span> *</span></label>
                            <input type="email" class="form-control" placeholder="Email address" id="email"
                                name="email">
                        </div>
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
                                <option data-dest="India" selected="selected" value="India">India</option>
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
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Vietnam">Vietnam</option>
                            </select>
                        </div>
                        <input type="button" name="next" class="next1 action-button" value="Next" />
                        <div class="payment_options_desc">
                            <p>Payment Options</p>
                            <img src="admin/assets/img/checkout/cash.svg" alt="cash">
                        </div>
                    </fieldset>
                    <!-- form 2 fieldsets -->
                    <fieldset id="check_form_2">
                        <h2 class="fs-title">Billing Information</h2>
                        <div class="form-group">
                            <label for="name">Name<span> *</span></label>
                            <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address<span> *</span></label>
                            <input type="text" class="form-control" placeholder="Address" id="address" name="address">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="city">City<span> *</span></label>
                                    <input type="text" class="form-control" placeholder="City" id="city" name="city">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="zip">Zip/Postal Code<span> *</span></label>
                                    <input type="text" class="form-control" placeholder="Zip/Postal Code" id="zip"
                                        name="zip">
                                </div>
                            </div>
                        </div>
                        <div class="form-group stategroup">
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
                        <input type="button" name="next" class="next2 action-button" value="Next" />
                    </fieldset>
                    <!-- form 3 fieldsets -->
                    <fieldset id="check_form_3">
                        <h2 class="fs-title">Bill to</h2>
                        <div id="formdata"></div>
                        <input type="text" name="submit" class="submit action-button" value="Place Order" />
                    </fieldset>
                    <fieldset id="check_form_4">
                        <div class="success_order">
                            <i class="far fa-check-circle"></i>
                            <h2>Congratulations</h2>
                            <p>Thank you for your purchase. Your payment is being processed and you will receive an
                                email as soon as it’s confirmed.</p>
                        </div>
                    </fieldset>
                    <div class="row form_footer">
                        <div class="col-md-6 form-left-detail">
                        <svg class="pnp-svg" viewBox="0 0 16.222 19.049"><g class="pnp-c1-fill"><path d="M15.865 12.721a9.61 9.61 0 0 1-2.3 3.586 12.049 12.049 0 0 1-4.5 2.665 1.376 1.376 0 0 1-.437.077h-.017a1.4 1.4 0 0 1-.268-.026 1.45 1.45 0 0 1-.184-.05 12.048 12.048 0 0 1-4.5-2.664 9.592 9.592 0 0 1-2.3-3.585 20.648 20.648 0 0 1-.84-7.536v-.034c.009-.184.014-.378.017-.592a2.019 2.019 0 0 1 1.9-1.978A7.835 7.835 0 0 0 7.77.336l.013-.011a1.22 1.22 0 0 1 1.657 0l.012.012a7.836 7.836 0 0 0 5.333 2.248 2.019 2.019 0 0 1 1.9 1.978c0 .215.009.409.017.592v.015a20.683 20.683 0 0 1-.837 7.551zm0 0" transform="translate(-.5)" fill-opacity="0.7"></path><path d="M226.187 12.725a9.61 9.61 0 0 1-2.3 3.586 12.048 12.048 0 0 1-4.5 2.665 1.376 1.376 0 0 1-.437.077V0a1.222 1.222 0 0 1 .812.324l.012.012a7.836 7.836 0 0 0 5.333 2.248 2.019 2.019 0 0 1 1.9 1.978c0 .215.009.409.017.592v.015a20.683 20.683 0 0 1-.837 7.556zm0 0" transform="translate(-210.822 -.004)"></path><path d="M100.39 133.146a4.753 4.753 0 0 1-4.731 4.748h-.017a4.748 4.748 0 1 1 0-9.5h.017a4.753 4.753 0 0 1 4.731 4.752zm0 0" class="cls-3" transform="translate(-87.531 -123.621)" style="fill:#fff"></path><path d="M223.68 133.146a4.753 4.753 0 0 1-4.731 4.748v-9.5a4.753 4.753 0 0 1 4.731 4.752zm0 0" class="cls-4" transform="translate(-210.822 -123.621)" style="fill:#e1e1e1"></path><path d="M158.726 212.934l-2.138 2.138-.462.462a.559.559 0 0 1-.791 0l-.993-.994a.559.559 0 1 1 .79-.79l.6.6 2.205-2.205a.559.559 0 0 1 .79.79zm0 0" transform="translate(-148.46 -204.093)" fill-opacity="0.7"></path><path d="M221.087 212.934l-2.138 2.138v-1.581l1.348-1.348a.559.559 0 0 1 .79.79zm0 0" transform="translate(-210.822 -204.093)"></path></g></svg>
                            <span>Secure Shopping</span>
                        </div>
                        <div class="col-md-6 form-right-detail">
                            <p>Raxit</p>
                            <p>India</p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Checkout MultiStep Form -->

@endsection
</body>

</html>