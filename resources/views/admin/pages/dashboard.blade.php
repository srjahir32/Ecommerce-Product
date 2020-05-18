@extends('admin.layout.main')
@section('content')


<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-sm-6 topbar_left pr-0">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="{{ url('admin/assets/img/dashboard/icon-dashboard.svg') }}" alt=""><span>Dashboard</span>
                </h3>
            </div>
            <div class="col-sm-6 topbar_right">
                <div class="topbar_btn">
                    <button class="theme_btn ripple_btn dark_btn" data-toggle="modal" data-target="#plugModal">Create
                        Plug</button>
                </div>
            </div>
        </div>
    </div>
    <div class="recommend_box">
        <p class="big">How likely are you to recommend this platform to other merchants?</p>
        <div id="starrate" class="starrate " data-val="" data-max="5" data-toggle="tooltip" data-placement="top"
            title="">
            <span class="ctrl"></span>
            <span class="cont m-1">
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
            </span>

        </div>
        <div id="test">
        </div>
        <div class="rating_area_inner">
            <p class="big">What changes should we make to receive a higher rating?</p>
            <div class="col-md-6 m-auto rating_area_box">
                <textarea name="rating_area" id="rating_area" class="rating_area" rows="4"></textarea>
            </div>
            <button class="theme_btn ripple_btn dark_btn">Submit</button>
        </div>
    </div>
    <div class="follow_setup_steps">
        <p class="follow_setup_step_title">Follow these easy steps to complete your setup</p>
        <div class="row ">
            <div class="col-sm-12 dashboard_setup_step equal_row">
                <div class="dashboard_setup_box ml-0">
                    <div class="dashboard_setup_done_icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block product_service_icon"
                        src="{{ url('admin/assets/img/dashboard/Add_Product_done.svg') }}">
                    <p class="dashboard_setup_box_txt">Add Product or Service</p>
                </div>
                <div class="dashboard_setup_box checkout_flow_box not_done_setup_box" data-toggle="modal"
                    data-target="#checkoutModal">
                    <div class="dashboard_setup_done_icon">
                        <i class="far fa-stop"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block checkout_flow_icon"
                        src="{{ url('admin/assets/img/dashboard/Create_Checkout_Flow.svg') }}">
                    <p class="dashboard_setup_box_txt theme_color">Create Checkout Flow</p>
                </div>
                <div class="dashboard_setup_box business_settings_box not_done_setup_box" data-toggle="modal"
                    data-target="#shopSettingsModal">
                    <div class="dashboard_setup_done_icon">
                        <i class="far fa-stop"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block business_settings_icon"
                        src="{{ url('admin/assets/img/dashboard/Setup_Business_Settings.svg') }}">
                    <p class="dashboard_setup_box_txt theme_color">Setup Business Settings</p>
                </div>
                <div class="dashboard_setup_box mr-0">
                    <div class="dashboard_setup_done_icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block publish_sale_icon"
                        src="{{ url('admin/assets/img/dashboard/publish_sale_icon_done.svg') }}">
                    <p class="dashboard_setup_box_txt">Publish and Make a sale</p>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard_graph_tab">
        <!-- Start Tabs -->
        <div class="nav-tabs-wrapper">
            <ul class="nav nav-tabs dashboard_graph_list horizontal">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#day_tab">Last 7
                        days</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#month_tab">This month</a>
                </li>

            </ul>
        </div>
        <div class="dashboard_graph_tab_top_txt">
            <div class="row">
                <div class="col-sm-4 total_revenue_txt">
                    <p class="graph_tab_top_title_txt">Total Revenue</p>
                    <p class="graph_tab_icon_txt"><span>₹</span>0</p>
                    <p class="graph_tab_btm_title_txt">Newe</p>
                </div>
                <div class="col-sm-4 active_customers_txt">
                    <p class="graph_tab_top_title_txt">Active Customers</p>
                    <p class="graph_tab_icon_txt"><i class="fa fa-user pnp-text-color5"></i>0</p>
                    <p class="graph_tab_btm_title_txt">Newe</p>
                </div>
                <div class="col-sm-4 products_sold_txt">
                    <p class="graph_tab_top_title_txt">Products Sold</p>
                    <p class="graph_tab_icon_txt"><img class="updown_arrow_img"
                            src="{{ url('admin/assets/img/dashboard/products_sold.svg') }}">0</p>
                    <p class="graph_tab_btm_title_txt">Newe</p>
                </div>
            </div>
        </div>
        <div class="tab-content chart_container ">
            <div class="tab-pane fade show active" id="day_tab">
                <div id="chart"></div>
            </div>
            <div class="tab-pane fade" id="month_tab">
                <div id="chart"></div>
            </div>
        </div>
        <!-- End Tabs -->
    </div>




    <!-- Cerate plug Modal -->
    <div class="modal fade" id="plugModal" tabindex="-1" role="dialog" aria-labelledby="plugModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body plugModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-10 text-center">
                            <h3 class="modal_title">What are you selling?</h3>
                            <p class="modal_subtitle mb-5">Select the type of product or service that you
                                wish to sell
                            </p>
                        </div>
                    </div>
                    <div class="row product_type_list">
                        <div class="col-md-4 product_type" data-toggle="modal" data-target="#addProductModal">
                            <div class="product_type_inner text-center">
                                <img class="product_type_img" src="{{ url('admin/assets/img/dashboard/phyprod.svg') }}">
                                <p class="product_type_title">Add a Physical Product</p>
                                <p class="product_type_txt">You are selling physical products and getting
                                    paid with
                                    online and offline payment methods</p>
                                <a class="product_type_link themecolor">Select</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Cerate plug Modal end -->

    <!-- Add New product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body addProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">Add a Physical Product</h3>
                                <p class="modal_subtitle ">Add your physical product by filling the fields
                                    below.
                                </p>
                            </div>

                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                            <button class="theme_btn ripple_btn dark_btn ">Save</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="add_product_form mt-3">
                                <form class="addproduct" id="addproduct">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Title<span>*</span></label>
                                                <input type="text" class="form-control form_field"
                                                    placeholder="Enter your product title" id="title" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Category">Category</label>
                                                <select type="text" class="form-control form_field" name="category"
                                                    id="category">
                                                    <option value="General">General</option>
                                                    <option value="Advertising">Advertising</option>
                                                    <option value="Antiques">Antiques</option>
                                                    <option value="Art">Art</option>
                                                    <option value="Baby">Baby</option>
                                                    <option value="Books">Books</option>
                                                    <option value="Business &amp; Industrial">Business &amp;
                                                        Industrial
                                                    </option>
                                                    <option value="Cameras &amp; Photo">Cameras &amp; Photo
                                                    </option>
                                                    <option value="Cell Phones &amp; Accessories">Cell
                                                        Phones &amp;
                                                        Accessories</option>
                                                    <option value="Clothing, Shoes &amp; Accessories">
                                                        Clothing, Shoes
                                                        &amp; Accessories</option>
                                                    <option value="Coins &amp; Paper Money">Coins &amp;
                                                        Paper Money
                                                    </option>
                                                    <option value="Collectibles">Collectibles</option>
                                                    <option value="Computing">Computing</option>
                                                    <option value="Consumer Electronics">Consumer
                                                        Electronics</option>
                                                    <option value="Crafts">Crafts</option>
                                                    <option value="Children Clothing">Children Clothing
                                                    </option>
                                                    <option value="Dolls &amp; Bears">Dolls &amp; Bears
                                                    </option>
                                                    <option value="DVDs &amp; Movies">DVDs &amp; Movies
                                                    </option>
                                                    <option value="Entertainment Memorabilia">Entertainment
                                                        Memorabilia
                                                    </option>
                                                    <option value="Food &amp; Beverages">Food &amp;
                                                        Beverages</option>
                                                    <option value="Gift Cards &amp; Coupons">Gift Cards
                                                        &amp; Coupons
                                                    </option>
                                                    <option value="Health &amp; Beauty">Health &amp; Beauty
                                                    </option>
                                                    <option value="Home &amp; Garden">Home &amp; Garden
                                                    </option>
                                                    <option value="Jewelry &amp; Watches">Jewelry &amp;
                                                        Watches</option>
                                                    <option value="Music">Music</option>
                                                    <option value="Musical Gear">Musical Gear</option>
                                                    <option value="Motors">Motors</option>
                                                    <option value="Pets">Pets</option>
                                                    <option value="Pottery &amp; Glass">Pottery &amp; Glass
                                                    </option>
                                                    <option value="Sporting Goods">Sporting Goods</option>
                                                    <option value="Sports Memorabilia">Sports Memorabilia
                                                    </option>
                                                    <option value="Stamps">Stamps</option>
                                                    <option value="Toys &amp; Hobbies">Toys &amp; Hobbies
                                                    </option>
                                                    <option value="Video Games &amp; Consoles">Video Games
                                                        &amp;
                                                        Consoles</option>
                                                    <option value="Restaurants">Restaurants</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Price<span>*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <select class="form-control form_field" id="product_currency"
                                                        name="product_currency">
                                                        <option value="EUR">EUR</option>
                                                        <option value="GBP">GBP</option>
                                                        <option value="USD">USD</option>
                                                        <option value="AUD">AUD</option>
                                                        <option value="CAD">CAD</option>
                                                        <option value="SEK">SEK</option>
                                                        <option value="BRL">BRL</option>
                                                        <option value="CZK">CZK</option>
                                                        <option value="DKK">DKK</option>
                                                        <option value="HKD">HKD</option>
                                                        <option value="ILS">ILS</option>
                                                        <option value="MYR">MYR</option>
                                                        <option value="MXN">MXN</option>
                                                        <option value="NOK">NOK</option>
                                                        <option value="NZD">NZD</option>
                                                        <option value="PHP">PHP</option>
                                                        <option value="PLN">PLN</option>
                                                        <option value="RUB">RUB</option>
                                                        <option value="SGD">SGD</option>
                                                        <option value="CHF">CHF</option>
                                                        <option value="CNY">CNY</option>
                                                        <option value="ISK">ISK</option>
                                                        <option value="THB">THB</option>
                                                        <option value="HUF">HUF</option>
                                                        <option value="BGN">BGN</option>
                                                        <option value="RON">RON</option>
                                                        <option value="HRK">HRK</option>
                                                        <option value="KRW">KRW</option>
                                                        <option value="ZAR">ZAR</option>
                                                        <option value="PKR">PKR</option>
                                                        <option value="XCD">XCD</option>
                                                        <option value="IDR">IDR</option>
                                                        <option value="INR" selected="selected">INR</option>
                                                        <option value="TRY">TRY</option>
                                                        <option value="JPY">JPY</option>
                                                        <option value="VND">VND</option>
                                                        <option value="TWD">TWD</option>
                                                        <option value="COP">COP</option>
                                                        <option value="PEN">PEN</option>
                                                        <option value="AED">AED</option>
                                                        <option value="SAR">SAR</option>
                                                        <option value="BHD">BHD</option>
                                                        <option value="NGN">NGN</option>
                                                        <option value="TZS">TZS</option>
                                                        <option value="GHS">GHS</option>
                                                        <option value="NAD">NAD</option>
                                                        <option value="BWP">BWP</option>
                                                        <option value="QAR">QAR</option>
                                                        <option value="BDT">BDT</option>
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control form_field" id="product_price"
                                                    name="product_price" placeholder="Enter a price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Order Limit</label>
                                                <input type="text" class="form-control form_field" name="order_limit"
                                                    id="order_limit" placeholder="Enter a limit (optional)">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Stock<span>*</span></label>
                                            <input type="text" class="form-control form_field" name="order_limit"
                                                id="order_limit" placeholder="Enter Stock"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Short Description</label>
                                                <input type="text" class="form-control form_field"
                                                    placeholder="Short Description" id="short_description"
                                                    name="short_description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Long Description</label>
                                                <textarea id="long_description" name="long_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label class="form_inner_label">Images</label>
                                                <p class="big">Product images are really important for
                                                    customers to
                                                    make
                                                    a decision whether to buy or not. So pick photos that
                                                    make your
                                                    product shine.</p>
                                            </div>
                                            <span class="upload_image_area"></span>
                                            <div class="dropzone" id="myDropzone"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label class="form_inner_label">Variations</label>
                                                <p class="big">You can use variations if you have multiple
                                                    types of
                                                    the
                                                    same product. Let’s say you have a T-Shirt, which is in
                                                    S and M
                                                    but
                                                    also blue or red, you can create a variation for each of
                                                    them.
                                                </p>
                                                <p class="big">Please note that the first option in the
                                                    table will
                                                    be
                                                    automatically added in the cart at the Checkout.</p>
                                                <a class="big themecolor" id="add_variation">Add
                                                    variations</a>
                                            </div>
                                            <div class="product_variations_form">
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="usr">Option 1</label>
                                                            <input type="text" class="form-control form_field"
                                                                id="option1" name="option1" placeholder="Enter a label">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="control-group form-group">
                                                            <label for="variation_one">Press enter to add an
                                                                option
                                                                and
                                                                backspace to remove
                                                            </label>
                                                            <input type="text" id="variation_one"
                                                                class="variation_one demo-default "
                                                                placeholder="Enter variations options">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="usr">Option 2</label>
                                                            <input type="text" class="form-control form_field"
                                                                id="option2" placeholder="Enter a label" name="option2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="control-group form-group">
                                                            <label for="variation_two">Press enter to add an
                                                                option
                                                                and
                                                                backspace to remove
                                                            </label>
                                                            <input type="text" id="variation_two"
                                                                class="variation_two demo-default"
                                                                placeholder="Enter variations options">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="variation_table_data">
                                                    <table class="table variations_table" id="variations_table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th scope="col" id="opt_label1">Option 1
                                                                </th>
                                                                <th scope="col" id="opt_label2">Option 2
                                                                </th>
                                                                <th scope="col" class="price_filed">Price
                                                                </th>
                                                                <th scope="col" class="quantity_filed">
                                                                    Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <p class="variation_row"></p>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label class="form_inner_label">Product Dimensions</label>
                                                <p class="big">Product dimensions are important when
                                                    calculating
                                                    shipping rates, since rates different from package size
                                                    to
                                                    package
                                                    size.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="title">Weight (kg)*</label>
                                                <input type="text" class="form-control form_field" placeholder="in kgs"
                                                    id="short_description" name="short_description">
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="product_dimension">
                                                    <label for="title">Height (cm)</label>
                                                    <input type="text" class="height_field form-control form_field"
                                                        placeholder="in cm">
                                                </div>
                                                <div class="product_dimension">
                                                    <label for="title">Length (cm)</label>
                                                    <input type="text" class="length_field form-control form_field"
                                                        placeholder="in cm">
                                                </div>
                                                <div class="product_dimension">
                                                    <label for="title">Width (cm)</label>
                                                    <input type="text" class="width_field form-control form_field"
                                                        placeholder="in cm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-4">
                            <div class="col-sm-12">
                                <div class="form_images_upload">
                                    <label class="form_inner_label">Product Specifications</label>
                                    <p class="big">Product specifications are optional. They are shown in
                                        the customer's invoices and during checkout.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" class="form-control form_field" placeholder="Apple"
                                        id="brand" name="brand">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="SKU">SKU</label>
                                    <input type="text" class="form-control form_field" placeholder="010000"
                                        id="SKU" name="SKU">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Model">Model</label>
                                    <input type="text" class="form-control form_field"
                                        placeholder="iPhone X" id="model" name="model">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ISBN">ISBN</label>
                                    <input type="text" class="form-control form_field"
                                        placeholder="978-3-16-148410-0" id="ISBN" name="ISBN">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="UPC">UPC</label>
                                    <input type="text" class="form-control form_field"
                                        placeholder="065100004327 X" id="UPC" name="UPC">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="EAN">EAN</label>
                                    <input type="text" class="form-control form_field"
                                        placeholder="0075678164125" id="EAN" name="EAN">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="GTIN">GTIN</label>
                                    <input type="text" class="form-control form_field"
                                        placeholder="065100004327 X" id="GTIN" name="GTIN">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="MPN">MPN</label>
                                    <input type="text" class="form-control form_field"
                                        placeholder="0075678164125" id="MPN" name="MPN">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ASIN">ASIN</label>
                                    <input type="text" class="form-control form_field"
                                        placeholder="B0006GQ8RW X" id="ASIN" name="ASIN">
                                </div>
                            </div>
                        </div> -->
                                    <div class="form_images_upload text-center mt-4">
                                        <p class="big">Once you are done, click save button below.</p>
                                        <button class="theme_btn ripple_btn dark_btn product_submit_btn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Add New product Modal end-->

    <!-- Shop Settings Modal -->
    <div class="modal fade" id="shopSettingsModal" tabindex="-1" role="dialog" aria-labelledby="shopSettingsModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body shopSettingsModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-7">
                            <h3 class="modal_title text-center">Shop Settings</h3>
                        </div>
                        <div class="col-md-3 save_btn_txt text-right">
                            <button class="theme_btn ripple_btn dark_btn ">Save Settings</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="shopshetting_billinginformation">
                                <h4 class="mb-3">Billing Information</h4>
                                <p><b>Notes::</b> Your shop’s billing information is visible in the hosted
                                    page and
                                    invoices.</p>
                            </div>
                            <div class="add_product_form">
                                <form class="addproduct" id="addproduct">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="Shop Name">Shop Name</label>
                                                <input type="text" class="form-control form_field" placeholder=""
                                                    id="shop_name" name="shop_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <input type="text" class="form-control form_field" name="address"
                                                    id="address" placeholder="Enter your address">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="Postcode">Postcode</label>
                                                <input type="text" class="form-control form_field" name="postcode"
                                                    id="postcode" placeholder="Enter your postcode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control form_field" name="city" id="city"
                                                    placeholder="Enter your state/city">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select type="text" class="form-control form_field" name="country"
                                                    id="country">
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp;
                                                        Herzegovina</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Canary Islands">Canary Islands
                                                    </option>
                                                    <option value="Czech Republic">Czech Republic
                                                    </option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option selected="selectedvalue=" India">India
                                                    </option>
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
                                                    <option value="Malta">Malta</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Pakistan">Pakistan</option>
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
                                                    <option value="St. Vincent &amp; Grenadines">St.
                                                        Vincent &amp; Grenadines</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab
                                                        Emirates</option>
                                                    <option value="United Kingdom">United Kingdom
                                                    </option>
                                                    <option value="United States">United States</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <select type="text" class="form-control form_field" name="state"
                                                    id="state">
                                                    <option selected="selected" value="Andhra Pradesh">
                                                        Andhra Pradesh
                                                    </option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh
                                                    </option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh
                                                    </option>
                                                    <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir
                                                    </option>
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
                                                    <option value="Andaman and Nicobar Islands">Andaman and
                                                        Nicobar
                                                        Islands</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar
                                                        Haveli
                                                    </option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Email address">Email address</label>
                                                <input type="text" class="form-control form_field" name="postcode"
                                                    id="postcode" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Telephone</label>
                                                <div class="input-group input_group_field">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><img class="country_map"
                                                                src="{{ url('admin/assets/img/dashboard/india.svg') }}" alt="">
                                                            +91</span>
                                                    </div>
                                                    <input type="text" name="telephone" id="telephone"
                                                        class="form-control form_field"
                                                        placeholder="Enter your phone number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="country">Timezone</label>
                                                <select type="text" class="form-control form_field" name="timezone"
                                                    id="timezone">
                                                    <option value="Europe/Andorra">Europe - Andorra</option>
                                                    <option value="Asia/Dubai">Asia - Dubai</option>
                                                    <option value="Asia/Kabul">Asia - Kabul</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Europe/Tirane">Europe - Tirane</option>
                                                    <option value="Asia/Yerevan">Asia - Yerevan</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Antarctica/Casey">Antarctica - Casey
                                                    </option>
                                                    <option value="Antarctica/Davis">Antarctica - Davis
                                                    </option>
                                                    <option value="Antarctica/DumontDUrville">Antarctica -
                                                        Dumont
                                                        D'Urville
                                                    </option>
                                                    <option value="Antarctica/Mawson">Antarctica - Mawson
                                                    </option>
                                                    <option value="Antarctica/Palmer">Antarctica - Palmer
                                                    </option>
                                                    <option value="Antarctica/Rothera">Antarctica - Rothera
                                                    </option>
                                                    <option value="Antarctica/Syowa">Antarctica - Syowa
                                                    </option>
                                                    <option value="Antarctica/Troll">Antarctica - Troll
                                                    </option>
                                                    <option value="Antarctica/Vostok">Antarctica - Vostok
                                                    </option>
                                                    <option value="Pacific/Auckland">Pacific - Auckland
                                                    </option>
                                                    <option value="America/Argentina/Buenos_Aires">America -
                                                        Buenos
                                                        Aires,
                                                        Argentina</option>
                                                    <option value="America/Argentina/Cordoba">America -
                                                        Cordoba,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/Salta">America - Salta,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/Jujuy">America - Jujuy,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/Tucuman">America -
                                                        Tucuman,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/Catamarca">America -
                                                        Catamarca,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/La_Rioja">America - La
                                                        Rioja,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/San_Juan">America - San
                                                        Juan,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/Mendoza">America -
                                                        Mendoza,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/San_Luis">America - San
                                                        Luis,
                                                        Argentina
                                                    </option>
                                                    <option value="America/Argentina/Rio_Gallegos">America -
                                                        Rio
                                                        Gallegos,
                                                        Argentina</option>
                                                    <option value="America/Argentina/Ushuaia">America -
                                                        Ushuaia,
                                                        Argentina
                                                    </option>
                                                    <option value="Pacific/Pago_Pago">Pacific - Pago Pago
                                                    </option>
                                                    <option value="Europe/Vienna">Europe - Vienna</option>
                                                    <option value="Australia/Lord_Howe">Australia - Lord
                                                        Howe</option>
                                                    <option value="Antarctica/Macquarie">Antarctica -
                                                        Macquarie</option>
                                                    <option value="Australia/Hobart">Australia - Hobart
                                                    </option>
                                                    <option value="Australia/Currie">Australia - Currie
                                                    </option>
                                                    <option value="Australia/Melbourne">Australia -
                                                        Melbourne</option>
                                                    <option value="Australia/Sydney">Australia - Sydney
                                                    </option>
                                                    <option value="Australia/Broken_Hill">Australia - Broken
                                                        Hill
                                                    </option>
                                                    <option value="Australia/Brisbane">Australia - Brisbane
                                                    </option>
                                                    <option value="Australia/Lindeman">Australia - Lindeman
                                                    </option>
                                                    <option value="Australia/Adelaide">Australia - Adelaide
                                                    </option>
                                                    <option value="Australia/Darwin">Australia - Darwin
                                                    </option>
                                                    <option value="Australia/Perth">Australia - Perth
                                                    </option>
                                                    <option value="Australia/Eucla">Australia - Eucla
                                                    </option>
                                                    <option value="America/Curacao">America - Curacao
                                                    </option>
                                                    <option value="Europe/Helsinki">Europe - Helsinki
                                                    </option>
                                                    <option value="Asia/Baku">Asia - Baku</option>
                                                    <option value="Europe/Belgrade">Europe - Belgrade
                                                    </option>
                                                    <option value="America/Barbados">America - Barbados
                                                    </option>
                                                    <option value="Asia/Dhaka">Asia - Dhaka</option>
                                                    <option value="Europe/Brussels">Europe - Brussels
                                                    </option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Europe/Sofia">Europe - Sofia</option>
                                                    <option value="Asia/Qatar">Asia - Qatar</option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Atlantic/Bermuda">Atlantic - Bermuda
                                                    </option>
                                                    <option value="Asia/Brunei">Asia - Brunei</option>
                                                    <option value="America/La_Paz">America - La Paz</option>
                                                    <option value="America/Curacao">America - Curacao
                                                    </option>
                                                    <option value="America/Noronha">America - Noronha
                                                    </option>
                                                    <option value="America/Belem">America - Belem</option>
                                                    <option value="America/Fortaleza">America - Fortaleza
                                                    </option>
                                                    <option value="America/Recife">America - Recife</option>
                                                    <option value="America/Araguaina">America - Araguaina
                                                    </option>
                                                    <option value="America/Maceio">America - Maceio</option>
                                                    <option value="America/Bahia">America - Bahia</option>
                                                    <option value="America/Sao_Paulo">America - Sao Paulo
                                                    </option>
                                                    <option value="America/Campo_Grande">America - Campo
                                                        Grande</option>
                                                    <option value="America/Cuiaba">America - Cuiaba</option>
                                                    <option value="America/Santarem">America - Santarem
                                                    </option>
                                                    <option value="America/Porto_Velho">America - Porto
                                                        Velho</option>
                                                    <option value="America/Boa_Vista">America - Boa Vista
                                                    </option>
                                                    <option value="America/Manaus">America - Manaus</option>
                                                    <option value="America/Eirunepe">America - Eirunepe
                                                    </option>
                                                    <option value="America/Rio_Branco">America - Rio Branco
                                                    </option>
                                                    <option value="America/Nassau">America - Nassau</option>
                                                    <option value="Asia/Thimphu">Asia - Thimphu</option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                    <option value="Europe/Minsk">Europe - Minsk</option>
                                                    <option value="America/Belize">America - Belize</option>
                                                    <option value="America/St_Johns">America - St Johns
                                                    </option>
                                                    <option value="America/Halifax">America - Halifax
                                                    </option>
                                                    <option value="America/Glace_Bay">America - Glace Bay
                                                    </option>
                                                    <option value="America/Moncton">America - Moncton
                                                    </option>
                                                    <option value="America/Goose_Bay">America - Goose Bay
                                                    </option>
                                                    <option value="America/Blanc-Sablon">America -
                                                        Blanc-Sablon</option>
                                                    <option value="America/Toronto">America - Toronto
                                                    </option>
                                                    <option value="America/Nipigon">America - Nipigon
                                                    </option>
                                                    <option value="America/Thunder_Bay">America - Thunder
                                                        Bay</option>
                                                    <option value="America/Iqaluit">America - Iqaluit
                                                    </option>
                                                    <option value="America/Pangnirtung">America -
                                                        Pangnirtung</option>
                                                    <option value="America/Atikokan">America - Atikokan
                                                    </option>
                                                    <option value="America/Winnipeg">America - Winnipeg
                                                    </option>
                                                    <option value="America/Rainy_River">America - Rainy
                                                        River</option>
                                                    <option value="America/Resolute">America - Resolute
                                                    </option>
                                                    <option value="America/Rankin_Inlet">America - Rankin
                                                        Inlet</option>
                                                    <option value="America/Regina">America - Regina</option>
                                                    <option value="America/Swift_Current">America - Swift
                                                        Current
                                                    </option>
                                                    <option value="America/Edmonton">America - Edmonton
                                                    </option>
                                                    <option value="America/Cambridge_Bay">America -
                                                        Cambridge Bay
                                                    </option>
                                                    <option value="America/Yellowknife">America -
                                                        Yellowknife</option>
                                                    <option value="America/Inuvik">America - Inuvik</option>
                                                    <option value="America/Creston">America - Creston
                                                    </option>
                                                    <option value="America/Dawson_Creek">America - Dawson
                                                        Creek</option>
                                                    <option value="America/Fort_Nelson">America - Fort
                                                        Nelson</option>
                                                    <option value="America/Vancouver">America - Vancouver
                                                    </option>
                                                    <option value="America/Whitehorse">America - Whitehorse
                                                    </option>
                                                    <option value="America/Dawson">America - Dawson</option>
                                                    <option value="Indian/Cocos">Indian - Cocos</option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Europe/Zurich">Europe - Zurich</option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Pacific/Rarotonga">Pacific - Rarotonga
                                                    </option>
                                                    <option value="America/Santiago">America - Santiago
                                                    </option>
                                                    <option value="America/Punta_Arenas">America - Punta
                                                        Arenas</option>
                                                    <option value="Pacific/Easter">Pacific - Easter</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Asia/Shanghai">Asia - Shanghai</option>
                                                    <option value="Asia/Urumqi">Asia - Urumqi</option>
                                                    <option value="America/Bogota">America - Bogota</option>
                                                    <option value="America/Costa_Rica">America - Costa Rica
                                                    </option>
                                                    <option value="America/Havana">America - Havana</option>
                                                    <option value="Atlantic/Cape_Verde">Atlantic - Cape
                                                        Verde</option>
                                                    <option value="America/Curacao">America - Curacao
                                                    </option>
                                                    <option value="Indian/Christmas">Indian - Christmas
                                                    </option>
                                                    <option value="Asia/Nicosia">Asia - Nicosia</option>
                                                    <option value="Asia/Famagusta">Asia - Famagusta</option>
                                                    <option value="Europe/Prague">Europe - Prague</option>
                                                    <option value="Europe/Berlin">Europe - Berlin</option>
                                                    <option value="Europe/Zurich">Europe - Zurich</option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Europe/Copenhagen">Europe - Copenhagen
                                                    </option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="America/Santo_Domingo">America - Santo
                                                        Domingo
                                                    </option>
                                                    <option value="Africa/Algiers">Africa - Algiers</option>
                                                    <option value="America/Guayaquil">America - Guayaquil
                                                    </option>
                                                    <option value="Pacific/Galapagos">Pacific - Galapagos
                                                    </option>
                                                    <option value="Europe/Tallinn">Europe - Tallinn</option>
                                                    <option value="Africa/Cairo">Africa - Cairo</option>
                                                    <option value="Africa/El_Aaiun">Africa - El Aaiun
                                                    </option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Europe/Madrid">Europe - Madrid</option>
                                                    <option value="Africa/Ceuta">Africa - Ceuta</option>
                                                    <option value="Atlantic/Canary">Atlantic - Canary
                                                    </option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Europe/Helsinki">Europe - Helsinki
                                                    </option>
                                                    <option value="Pacific/Fiji">Pacific - Fiji</option>
                                                    <option value="Atlantic/Stanley">Atlantic - Stanley
                                                    </option>
                                                    <option value="Pacific/Chuuk">Pacific - Chuuk</option>
                                                    <option value="Pacific/Pohnpei">Pacific - Pohnpei
                                                    </option>
                                                    <option value="Pacific/Kosrae">Pacific - Kosrae</option>
                                                    <option value="Atlantic/Faroe">Atlantic - Faroe</option>
                                                    <option value="Europe/Paris">Europe - Paris</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Europe/London">Europe - London</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Asia/Tbilisi">Asia - Tbilisi</option>
                                                    <option value="America/Cayenne">America - Cayenne
                                                    </option>
                                                    <option value="Europe/London">Europe - London</option>
                                                    <option value="Africa/Accra">Africa - Accra</option>
                                                    <option value="Europe/Gibraltar">Europe - Gibraltar
                                                    </option>
                                                    <option value="America/Godthab">America - Godthab
                                                    </option>
                                                    <option value="America/Danmarkshavn">America -
                                                        Danmarkshavn</option>
                                                    <option value="America/Scoresbysund">America -
                                                        Scoresbysund</option>
                                                    <option value="America/Thule">America - Thule</option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Europe/Athens">Europe - Athens</option>
                                                    <option value="Atlantic/South_Georgia">Atlantic - South
                                                        Georgia
                                                    </option>
                                                    <option value="America/Guatemala">America - Guatemala
                                                    </option>
                                                    <option value="Pacific/Guam">Pacific - Guam</option>
                                                    <option value="Africa/Bissau">Africa - Bissau</option>
                                                    <option value="America/Guyana">America - Guyana</option>
                                                    <option value="Asia/Hong_Kong">Asia - Hong Kong</option>
                                                    <option value="America/Tegucigalpa">America -
                                                        Tegucigalpa</option>
                                                    <option value="Europe/Belgrade">Europe - Belgrade
                                                    </option>
                                                    <option value="America/Port-au-Prince">America -
                                                        Port-au-Prince
                                                    </option>
                                                    <option value="Europe/Budapest">Europe - Budapest
                                                    </option>
                                                    <option value="Asia/Jakarta">Asia - Jakarta</option>
                                                    <option value="Asia/Pontianak">Asia - Pontianak</option>
                                                    <option value="Asia/Makassar">Asia - Makassar</option>
                                                    <option value="Asia/Jayapura">Asia - Jayapura</option>
                                                    <option value="Europe/Dublin">Europe - Dublin</option>
                                                    <option value="Asia/Jerusalem">Asia - Jerusalem</option>
                                                    <option value="Europe/London">Europe - London</option>
                                                    <option data-country="IN" selected="selected" value="Asia/Kolkata">
                                                        Asia - Kolkata</option>
                                                    <option value="Indian/Chagos">Indian - Chagos</option>
                                                    <option value="Asia/Baghdad">Asia - Baghdad</option>
                                                    <option value="Asia/Tehran">Asia - Tehran</option>
                                                    <option value="Atlantic/Reykjavik">Atlantic - Reykjavik
                                                    </option>
                                                    <option value="Europe/Rome">Europe - Rome</option>
                                                    <option value="Europe/London">Europe - London</option>
                                                    <option value="America/Jamaica">America - Jamaica
                                                    </option>
                                                    <option value="Asia/Amman">Asia - Amman</option>
                                                    <option value="Asia/Tokyo">Asia - Tokyo</option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Asia/Bishkek">Asia - Bishkek</option>
                                                    <option value="Asia/Bangkok">Asia - Bangkok</option>
                                                    <option value="Pacific/Tarawa">Pacific - Tarawa</option>
                                                    <option value="Pacific/Enderbury">Pacific - Enderbury
                                                    </option>
                                                    <option value="Pacific/Kiritimati">Pacific - Kiritimati
                                                    </option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Asia/Pyongyang">Asia - Pyongyang</option>
                                                    <option value="Asia/Seoul">Asia - Seoul</option>
                                                    <option value="Asia/Riyadh">Asia - Riyadh</option>
                                                    <option value="America/Panama">America - Panama</option>
                                                    <option value="Asia/Almaty">Asia - Almaty</option>
                                                    <option value="Asia/Qyzylorda">Asia - Qyzylorda</option>
                                                    <option value="Asia/Qostanay">Asia - Qostanay</option>
                                                    <option value="Asia/Aqtobe">Asia - Aqtobe</option>
                                                    <option value="Asia/Aqtau">Asia - Aqtau</option>
                                                    <option value="Asia/Atyrau">Asia - Atyrau</option>
                                                    <option value="Asia/Oral">Asia - Oral</option>
                                                    <option value="Asia/Bangkok">Asia - Bangkok</option>
                                                    <option value="Asia/Beirut">Asia - Beirut</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Europe/Zurich">Europe - Zurich</option>
                                                    <option value="Asia/Colombo">Asia - Colombo</option>
                                                    <option value="Africa/Monrovia">Africa - Monrovia
                                                    </option>
                                                    <option value="Africa/Johannesburg">Africa -
                                                        Johannesburg</option>
                                                    <option value="Europe/Vilnius">Europe - Vilnius</option>
                                                    <option value="Europe/Luxembourg">Europe - Luxembourg
                                                    </option>
                                                    <option value="Europe/Riga">Europe - Riga</option>
                                                    <option value="Africa/Tripoli">Africa - Tripoli</option>
                                                    <option value="Africa/Casablanca">Africa - Casablanca
                                                    </option>
                                                    <option value="Europe/Monaco">Europe - Monaco</option>
                                                    <option value="Europe/Chisinau">Europe - Chisinau
                                                    </option>
                                                    <option value="Europe/Belgrade">Europe - Belgrade
                                                    </option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Pacific/Majuro">Pacific - Majuro</option>
                                                    <option value="Pacific/Kwajalein">Pacific - Kwajalein
                                                    </option>
                                                    <option value="Europe/Belgrade">Europe - Belgrade
                                                    </option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Asia/Yangon">Asia - Yangon</option>
                                                    <option value="Asia/Ulaanbaatar">Asia - Ulaanbaatar
                                                    </option>
                                                    <option value="Asia/Hovd">Asia - Hovd</option>
                                                    <option value="Asia/Choibalsan">Asia - Choibalsan
                                                    </option>
                                                    <option value="Asia/Macau">Asia - Macau</option>
                                                    <option value="Pacific/Guam">Pacific - Guam</option>
                                                    <option value="America/Martinique">America - Martinique
                                                    </option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Europe/Malta">Europe - Malta</option>
                                                    <option value="Indian/Mauritius">Indian - Mauritius
                                                    </option>
                                                    <option value="Indian/Maldives">Indian - Maldives
                                                    </option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                    <option value="America/Mexico_City">America - Mexico
                                                        City</option>
                                                    <option value="America/Cancun">America - Cancun</option>
                                                    <option value="America/Merida">America - Merida</option>
                                                    <option value="America/Monterrey">America - Monterrey
                                                    </option>
                                                    <option value="America/Matamoros">America - Matamoros
                                                    </option>
                                                    <option value="America/Mazatlan">America - Mazatlan
                                                    </option>
                                                    <option value="America/Chihuahua">America - Chihuahua
                                                    </option>
                                                    <option value="America/Ojinaga">America - Ojinaga
                                                    </option>
                                                    <option value="America/Hermosillo">America - Hermosillo
                                                    </option>
                                                    <option value="America/Tijuana">America - Tijuana
                                                    </option>
                                                    <option value="America/Bahia_Banderas">America - Bahia
                                                        Banderas
                                                    </option>
                                                    <option value="Asia/Kuala_Lumpur">Asia - Kuala Lumpur
                                                    </option>
                                                    <option value="Asia/Kuching">Asia - Kuching</option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                    <option value="Africa/Windhoek">Africa - Windhoek
                                                    </option>
                                                    <option value="Pacific/Noumea">Pacific - Noumea</option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="Pacific/Norfolk">Pacific - Norfolk
                                                    </option>
                                                    <option value="Africa/Lagos">Africa - Lagos</option>
                                                    <option value="America/Managua">America - Managua
                                                    </option>
                                                    <option value="Europe/Amsterdam">Europe - Amsterdam
                                                    </option>
                                                    <option value="Europe/Oslo">Europe - Oslo</option>
                                                    <option value="Asia/Kathmandu">Asia - Kathmandu</option>
                                                    <option value="Pacific/Nauru">Pacific - Nauru</option>
                                                    <option value="Pacific/Niue">Pacific - Niue</option>
                                                    <option value="Pacific/Auckland">Pacific - Auckland
                                                    </option>
                                                    <option value="Pacific/Chatham">Pacific - Chatham
                                                    </option>
                                                    <option value="Asia/Dubai">Asia - Dubai</option>
                                                    <option value="America/Panama">America - Panama</option>
                                                    <option value="America/Lima">America - Lima</option>
                                                    <option value="Pacific/Tahiti">Pacific - Tahiti</option>
                                                    <option value="Pacific/Marquesas">Pacific - Marquesas
                                                    </option>
                                                    <option value="Pacific/Gambier">Pacific - Gambier
                                                    </option>
                                                    <option value="Pacific/Port_Moresby">Pacific - Port
                                                        Moresby</option>
                                                    <option value="Pacific/Bougainville">Pacific -
                                                        Bougainville</option>
                                                    <option value="Asia/Manila">Asia - Manila</option>
                                                    <option value="Asia/Karachi">Asia - Karachi</option>
                                                    <option value="Europe/Warsaw">Europe - Warsaw</option>
                                                    <option value="America/Miquelon">America - Miquelon
                                                    </option>
                                                    <option value="Pacific/Pitcairn">Pacific - Pitcairn
                                                    </option>
                                                    <option value="America/Puerto_Rico">America - Puerto
                                                        Rico</option>
                                                    <option value="Asia/Gaza">Asia - Gaza</option>
                                                    <option value="Asia/Hebron">Asia - Hebron</option>
                                                    <option value="Europe/Lisbon">Europe - Lisbon</option>
                                                    <option value="Atlantic/Madeira">Atlantic - Madeira
                                                    </option>
                                                    <option value="Atlantic/Azores">Atlantic - Azores
                                                    </option>
                                                    <option value="Pacific/Palau">Pacific - Palau</option>
                                                    <option value="America/Asuncion">America - Asuncion
                                                    </option>
                                                    <option value="Asia/Qatar">Asia - Qatar</option>
                                                    <option value="Indian/Reunion">Indian - Reunion</option>
                                                    <option value="Europe/Bucharest">Europe - Bucharest
                                                    </option>
                                                    <option value="Europe/Belgrade">Europe - Belgrade
                                                    </option>
                                                    <option value="Europe/Kaliningrad">Europe - Kaliningrad
                                                    </option>
                                                    <option value="Europe/Moscow">Europe - Moscow</option>
                                                    <option value="Europe/Simferopol">Europe - Simferopol
                                                    </option>
                                                    <option value="Europe/Kirov">Europe - Kirov</option>
                                                    <option value="Europe/Astrakhan">Europe - Astrakhan
                                                    </option>
                                                    <option value="Europe/Volgograd">Europe - Volgograd
                                                    </option>
                                                    <option value="Europe/Saratov">Europe - Saratov</option>
                                                    <option value="Europe/Ulyanovsk">Europe - Ulyanovsk
                                                    </option>
                                                    <option value="Europe/Samara">Europe - Samara</option>
                                                    <option value="Asia/Yekaterinburg">Asia - Yekaterinburg
                                                    </option>
                                                    <option value="Asia/Omsk">Asia - Omsk</option>
                                                    <option value="Asia/Novosibirsk">Asia - Novosibirsk
                                                    </option>
                                                    <option value="Asia/Barnaul">Asia - Barnaul</option>
                                                    <option value="Asia/Tomsk">Asia - Tomsk</option>
                                                    <option value="Asia/Novokuznetsk">Asia - Novokuznetsk
                                                    </option>
                                                    <option value="Asia/Krasnoyarsk">Asia - Krasnoyarsk
                                                    </option>
                                                    <option value="Asia/Irkutsk">Asia - Irkutsk</option>
                                                    <option value="Asia/Chita">Asia - Chita</option>
                                                    <option value="Asia/Yakutsk">Asia - Yakutsk</option>
                                                    <option value="Asia/Khandyga">Asia - Khandyga</option>
                                                    <option value="Asia/Vladivostok">Asia - Vladivostok
                                                    </option>
                                                    <option value="Asia/Ust-Nera">Asia - Ust-Nera</option>
                                                    <option value="Asia/Magadan">Asia - Magadan</option>
                                                    <option value="Asia/Sakhalin">Asia - Sakhalin</option>
                                                    <option value="Asia/Srednekolymsk">Asia - Srednekolymsk
                                                    </option>
                                                    <option value="Asia/Kamchatka">Asia - Kamchatka</option>
                                                    <option value="Asia/Anadyr">Asia - Anadyr</option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                    <option value="Asia/Riyadh">Asia - Riyadh</option>
                                                    <option value="Pacific/Guadalcanal">Pacific -
                                                        Guadalcanal</option>
                                                    <option value="Indian/Mahe">Indian - Mahe</option>
                                                    <option value="Africa/Khartoum">Africa - Khartoum
                                                    </option>
                                                    <option value="Europe/Stockholm">Europe - Stockholm
                                                    </option>
                                                    <option value="Asia/Singapore">Asia - Singapore</option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Europe/Belgrade">Europe - Belgrade
                                                    </option>
                                                    <option value="Europe/Oslo">Europe - Oslo</option>
                                                    <option value="Europe/Prague">Europe - Prague</option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Europe/Rome">Europe - Rome</option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="America/Paramaribo">America - Paramaribo
                                                    </option>
                                                    <option value="Africa/Juba">Africa - Juba</option>
                                                    <option value="Africa/Sao_Tome">Africa - Sao Tome
                                                    </option>
                                                    <option value="America/El_Salvador">America - El
                                                        Salvador</option>
                                                    <option value="America/Curacao">America - Curacao
                                                    </option>
                                                    <option value="Asia/Damascus">Asia - Damascus</option>
                                                    <option value="Africa/Johannesburg">Africa -
                                                        Johannesburg</option>
                                                    <option value="America/Grand_Turk">America - Grand Turk
                                                    </option>
                                                    <option value="Africa/Ndjamena">Africa - Ndjamena
                                                    </option>
                                                    <option value="Indian/Kerguelen">Indian - Kerguelen
                                                    </option>
                                                    <option value="Indian/Reunion">Indian - Reunion</option>
                                                    <option value="Africa/Abidjan">Africa - Abidjan</option>
                                                    <option value="Asia/Bangkok">Asia - Bangkok</option>
                                                    <option value="Asia/Dushanbe">Asia - Dushanbe</option>
                                                    <option value="Pacific/Fakaofo">Pacific - Fakaofo
                                                    </option>
                                                    <option value="Asia/Dili">Asia - Dili</option>
                                                    <option value="Asia/Ashgabat">Asia - Ashgabat</option>
                                                    <option value="Africa/Tunis">Africa - Tunis</option>
                                                    <option value="Pacific/Tongatapu">Pacific - Tongatapu
                                                    </option>
                                                    <option value="Europe/Istanbul">Europe - Istanbul
                                                    </option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Pacific/Funafuti">Pacific - Funafuti
                                                    </option>
                                                    <option value="Asia/Taipei">Asia - Taipei</option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Europe/Kiev">Europe - Kiev</option>
                                                    <option value="Europe/Uzhgorod">Europe - Uzhgorod
                                                    </option>
                                                    <option value="Europe/Zaporozhye">Europe - Zaporozhye
                                                    </option>
                                                    <option value="Europe/Simferopol">Europe - Simferopol
                                                    </option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Pacific/Wake">Pacific - Wake</option>
                                                    <option value="Pacific/Pago_Pago">Pacific - Pago Pago
                                                    </option>
                                                    <option value="Pacific/Honolulu">Pacific - Honolulu
                                                    </option>
                                                    <option value="America/New_York">America - New York
                                                    </option>
                                                    <option value="America/Detroit">America - Detroit
                                                    </option>
                                                    <option value="America/Kentucky/Louisville">America -
                                                        Louisville,
                                                        Kentucky
                                                    </option>
                                                    <option value="America/Kentucky/Monticello">America -
                                                        Monticello,
                                                        Kentucky
                                                    </option>
                                                    <option value="America/Indiana/Indianapolis">America -
                                                        Indianapolis,
                                                        Indiana
                                                    </option>
                                                    <option value="America/Indiana/Vincennes">America -
                                                        Vincennes,
                                                        Indiana
                                                    </option>
                                                    <option value="America/Indiana/Winamac">America -
                                                        Winamac, Indiana
                                                    </option>
                                                    <option value="America/Indiana/Marengo">America -
                                                        Marengo, Indiana
                                                    </option>
                                                    <option value="America/Indiana/Petersburg">America -
                                                        Petersburg,
                                                        Indiana
                                                    </option>
                                                    <option value="America/Indiana/Vevay">America - Vevay,
                                                        Indiana
                                                    </option>
                                                    <option value="America/Chicago">America - Chicago
                                                    </option>
                                                    <option value="America/Indiana/Tell_City">America - Tell
                                                        City,
                                                        Indiana
                                                    </option>
                                                    <option value="America/Indiana/Knox">America - Knox,
                                                        Indiana
                                                    </option>
                                                    <option value="America/Menominee">America - Menominee
                                                    </option>
                                                    <option value="America/North_Dakota/Center">America -
                                                        Center, North
                                                        Dakota
                                                    </option>
                                                    <option value="America/North_Dakota/New_Salem">America -
                                                        New Salem,
                                                        North
                                                        Dakota</option>
                                                    <option value="America/North_Dakota/Beulah">America -
                                                        Beulah, North
                                                        Dakota
                                                    </option>
                                                    <option value="America/Denver">America - Denver</option>
                                                    <option value="America/Boise">America - Boise</option>
                                                    <option value="America/Phoenix">America - Phoenix
                                                    </option>
                                                    <option value="America/Los_Angeles">America - Los
                                                        Angeles</option>
                                                    <option value="America/Anchorage">America - Anchorage
                                                    </option>
                                                    <option value="America/Juneau">America - Juneau</option>
                                                    <option value="America/Sitka">America - Sitka</option>
                                                    <option value="America/Metlakatla">America - Metlakatla
                                                    </option>
                                                    <option value="America/Yakutat">America - Yakutat
                                                    </option>
                                                    <option value="America/Nome">America - Nome</option>
                                                    <option value="America/Adak">America - Adak</option>
                                                    <option value="Pacific/Honolulu">Pacific - Honolulu
                                                    </option>
                                                    <option value="America/Montevideo">America - Montevideo
                                                    </option>
                                                    <option value="Asia/Samarkand">Asia - Samarkand</option>
                                                    <option value="Asia/Tashkent">Asia - Tashkent</option>
                                                    <option value="Europe/Rome">Europe - Rome</option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="America/Caracas">America - Caracas
                                                    </option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="America/Port_of_Spain">America - Port of
                                                        Spain
                                                    </option>
                                                    <option value="Asia/Ho_Chi_Minh">Asia - Ho Chi Minh
                                                    </option>
                                                    <option value="Asia/Bangkok">Asia - Bangkok</option>
                                                    <option value="Pacific/Efate">Pacific - Efate</option>
                                                    <option value="Pacific/Wallis">Pacific - Wallis</option>
                                                    <option value="Pacific/Apia">Pacific - Apia</option>
                                                    <option value="Asia/Riyadh">Asia - Riyadh</option>
                                                    <option value="Africa/Nairobi">Africa - Nairobi</option>
                                                    <option value="Africa/Johannesburg">Africa -
                                                        Johannesburg</option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                    <option value="Africa/Maputo">Africa - Maputo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="state">Hide address from checkout</label>
                                                <select type="text" class="form-control form_field" name="state"
                                                    id="state">
                                                    <option selected="selected" value="Show">Show
                                                    </option>
                                                    <option value="Hide">Hide</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="shopshetting_billinginformation">
                                <h4 class="mb-3">Other Shop Settings</h4>
                                <div class="row other_shop_settings">
                                    <div class="col-sm-5 equal_row">
                                        <div class="other_shop_setting_box" data-toggle="modal"
                                            data-target="#stockmanagementModal">
                                            <div class="other_shop_setting_title">
                                                <h5>Stock Management</h5>
                                                <img class="other_shop_setting_icon"
                                                    src="{{ url('admin/assets/img/dashboard/stockmanagement.svg') }}" alt="">
                                            </div>
                                            <p>Setup stock management for your tangible goods and services
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 equal_row">
                                        <div class="other_shop_setting_box" data-toggle="modal"
                                            data-target="#currencyWhitelisttModal">
                                            <div class="other_shop_setting_title">
                                                <h5>Currency & Whitelist</h5>
                                                <img class="other_shop_setting_icon"
                                                    src="{{ url('admin/assets/img/dashboard/currencywhitelist.svg') }}" alt="">
                                            </div>
                                            <p>Setup your currency, country whitelist and default rounding
                                                method</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Shop Settings Modal end-->

    <!-- Stock Management model -->
    <div class="modal fade" id="stockmanagementModal" tabindex="-1" role="dialog"
        aria-labelledby="stockmanagementModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body stockmanagementModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt mb-3">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="editProfilet_details text-center">
                        <h3 class="modal_title">Stock Management</h3>
                        <p class="modal_subtitle mb-4 stock_management_modal_subtitle">Setup stock
                            management for your
                            tangible goods and services</p>

                    </div>
                    <form class="stockmanagement_form" id="stockmanagement_form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Inventory Stock Tracking</label>
                                    <select type="text" class="form-control form_field" id="stock_tracking"
                                        name="stock_tracking">
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p class="stock_management_form_txt">Reserved stock is not relisted. Once a product
                            runs out of
                            stock, it will not be available for purchase.</p>
                        <div class="">
                            <button class="theme_btn ripple_btn dark_btn w-100 ml-0">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal-content -->
    </div>
    <!-- Stock Management model end-->

    <!-- Currency & Whitelist model -->
    <div class="modal fade" id="currencyWhitelisttModal" tabindex="-1" role="dialog"
        aria-labelledby="currencyWhitelisttModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body currencyWhitelisttModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt mb-3">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="editProfilet_details text-center">
                        <h3 class="modal_title">Currency & Whitelist</h3>
                        <p class="modal_subtitle mb-4 stock_management_modal_subtitle">Setup your currency,
                            country
                            whitelist and default rounding method</p>

                    </div>
                    <form class="currency_whitelist_form" id="currency_whitelist_form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Currency">Currency</label>
                                    <select type="text" class="form-control form_field" id="currency" name="currency">
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                        <option value="USD">USD</option>
                                        <option value="AUD">AUD</option>
                                        <option value="CAD">CAD</option>
                                        <option value="SEK">SEK</option>
                                        <option value="BRL">BRL</option>
                                        <option value="CZK">CZK</option>
                                        <option value="DKK">DKK</option>
                                        <option value="HKD">HKD</option>
                                        <option value="ILS">ILS</option>
                                        <option value="MYR">MYR</option>
                                        <option value="MXN">MXN</option>
                                        <option value="NOK">NOK</option>
                                        <option value="NZD">NZD</option>
                                        <option value="PHP">PHP</option>
                                        <option value="PLN">PLN</option>
                                        <option value="RUB">RUB</option>
                                        <option value="SGD">SGD</option>
                                        <option value="CHF">CHF</option>
                                        <option value="CNY">CNY</option>
                                        <option value="ISK">ISK</option>
                                        <option value="THB">THB</option>
                                        <option value="HUF">HUF</option>
                                        <option value="BGN">BGN</option>
                                        <option value="RON">RON</option>
                                        <option value="HRK">HRK</option>
                                        <option value="KRW">KRW</option>
                                        <option value="ZAR">ZAR</option>
                                        <option value="PKR">PKR</option>
                                        <option value="XCD">XCD</option>
                                        <option value="IDR">IDR</option>
                                        <option value="INR" selected="selected">INR</option>
                                        <option value="TRY">TRY</option>
                                        <option value="JPY">JPY</option>
                                        <option value="VND">VND</option>
                                        <option value="TWD">TWD</option>
                                        <option value="COP">COP</option>
                                        <option value="PEN">PEN</option>
                                        <option value="AED">AED</option>
                                        <option value="SAR">SAR</option>
                                        <option value="BHD">BHD</option>
                                        <option value="NGN">NGN</option>
                                        <option value="TZS">TZS</option>
                                        <option value="GHS">GHS</option>
                                        <option value="NAD">NAD</option>
                                        <option value="BWP">BWP</option>
                                        <option value="QAR">QAR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Rounding Method">Rounding Method</label>
                                    <select type="text" class="form-control form_field" id="rounding_method"
                                        name="rounding_method">
                                        <option value="Default">Default</option>
                                        <option value="Up">Up</option>
                                        <option value="Down">Down</option>
                                        <option value="Nearest">Nearest</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Country Whitelist">Country Whitelist</label>
                                    <select type="text" class="form-control form_field" id="country_whitelist"
                                        name="country_whitelist">
                                        <option value="North America">North America</option>
                                        <option value="Europe">Europe</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina
                                        </option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Honduras">Honduras</option>
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
                                        <option value="Malta">Malta</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Pakistan">Pakistan</option>
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
                                        <option value="St. Vincent &amp; Grenadines">St. Vincent &amp;
                                            Grenadines
                                        </option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Vietnam">Vietnam</option>
                                    </select>
                                </div>
                                <div class="custom_checkbox_field">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="restrict_customers"
                                            id="restrict_customers">
                                        <label class="custom-control-label" for="restrict_customers">Restrict Customers
                                        </label> <i class="fal fa-question-circle" data-toggle="modal"
                                            data-target="#addingRestrictionModal"></i>
                                    </div>
                                </div>
                                <div class="custom_checkbox_field">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="blockpage"
                                            name="blockpage">
                                        <label class="custom-control-label" for="blockpage">Block Hosted
                                            Page </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="currency_whitelist_btn">
                            <button class="theme_btn ripple_btn dark_btn w-100 ml-0">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal-content -->
    </div>
    <!-- Currency & Whitelist model end-->


    <!-- Add Restrictions Modal -->
    <div class="modal fade" id="addingRestrictionModal" tabindex="-1" role="dialog"
        aria-labelledby="addingRestrictionModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body addingRestrictionModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="adding_restriction_title">Adding Restrictions on All your
                                    Shopping Carts</h3>
                            </div>

                        </div>
                    </div>
                    <div class="adding_restriction_content_inner">
                        <div class="adding_restriction_title_txt">
                            <h6><b>Automatically block your cart for visitors to whom you do not ship to</b>
                            </h6>
                            <p>If this option is selected, then your visitors will be able to access your
                                shopping cart(s) only if the products can be shipped to their country. The
                                country is determined by their IP location. This rule is available for
                                Physical
                                products that have shipping conditions specified (calculated or custom).</p>
                        </div>
                        <div class="adding_restriction_title_txt">
                            <h6><b>How to Enable It</b></h6>
                            <p>This option can be enabled for all your active shopping carts automatically
                                by visiting
                                your Settings page- Shop Settings and checking the "Restrict Buyers" option.
                                So, if you
                                cannot ship worldwide than you should check the field Restrict customers and
                                then add
                                all your countries where you can ship on your Whitelist. </p>
                        </div>
                        <img class="adding_restriction_top_img" src="{{ url('admin/assets/img/dashboard/restrictions1.png') }}"
                            alt="">
                        <div class="adding_restriction_title_txt">
                            <p>Restricting buyers is also available for individual shopping carts and can be
                                activated
                                in the Dashboard while you create your shopping cart. </p>
                        </div>
                        <div class="adding_restriction_title_txt">
                            <h6><b>Checkout Country Whitelist</b></h6>
                            <p>This option allows you to specify a list of countries from which visitors are
                                allowed to
                                access your shopping cart(s). The visitor's country is determined by their
                                IP location.
                                This rule is available for all products.</p>
                        </div>
                        <div class="adding_restriction_title_txt">
                            <h6><b>How to Enable It</b></h6>
                            <p>This option can be enabled for all your active shopping carts automatically
                                by visiting
                                your Settings page by ticking the Checkout Country Whitelist option box
                                under the
                                General Settings section. Choose the countries you wish to include and hit
                                Save. </p>
                        </div>
                        <img class="adding_restriction_center_img" src="{{ url('admin/assets/img/dashboard/restrictions2.png') }}"
                            alt="">
                        <div class="adding_restriction_title_txt">
                            <p>In those countries that aren't on your whitelist, this message will show up:
                            </p>
                        </div>
                        <img class="adding_restriction_btm_img" src="{{ url('admin/assets/img/dashboard/restrictions3.png') }}"
                            alt="">
                        <div class="adding_restriction_title_txt">
                            <p>The Checkout Country Whitelist option is also available for individual
                                shopping carts and
                                can be activated in the Dashboard while you create your shopping cart. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Add Restrictions Modal end-->


    <!-- checkout Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body checkoutModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">How will customers pay?</h3>
                                <p class="modal_subtitle mb-5">Select payment options
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                            <button class="theme_btn ripple_btn dark_btn ">Finish</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="payment_option_box text-center">
                                <img src="{{ url('admin/assets/img/dashboard/cashondelivery.svg') }}" alt="">
                                <p>with Cash on delivery</p>
                                <a href="" class="themecolor" id="payment_select">select</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- checkout Modal end-->
</div>
@endsection
@section('scripts')
<script>
$("#starrate").click(function() {
    $(".rating_area_inner").show();
})
</script>
<script>
var options = {
    chart: {
        height: 380,
        width: 650,
        type: "line"
    },
    series: [{
            name: "Event",
            type: "column",
            data: [440, 671, 320]
        },

    ],
    stroke: {
        width: [0, 4],
        curve: 'smooth'
    },
    title: {
        text: "Products"
    },
    // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    labels: [

        "06 Jan 2001",
        "07 Jan 2001",
        "12 Jan 2001"
    ],
    xaxis: {
        type: "datetime"
    },
    yaxis: [{
            title: {
                text: "Event"
            }
        },
        {
            opposite: true,
            title: {
                text: "Sales"
            }
        }
    ]
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
@endsection