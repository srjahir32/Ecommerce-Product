@extends('admin.layout.main')
@section('content')

<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-lg-4 topbar_left pr-0">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="{{ asset('admin/assets/img/products/icon-products.svg') }}" alt=""><span>Products &
                        Services</span></h3>
            </div>
            <div class="col-lg-8 topbar_right">
                <div class="search_form">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-search'></i></span>
                        </div>
                        <input class="form-control search_field" id="search" name="search" placeholder="Search"
                            type="text">
                    </div>
                </div>
                <div class="topbar_btn">
                    <button class="theme_btn ripple_btn left_topbar_btn" data-toggle="modal"
                        data-target="#productTypeModal">Add a Product</button>
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
    <div class="products_table_content">
        <table class="products_table table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>Date Created</th>
                    <th>Stock</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="add_product_list">
                @foreach ($products['data'] as $product)
                @php
                $image_path = DB::table('product_image')->where('product_id', $product['id'])->pluck('image_path')->first();
                @endphp
                
              
                <tr class="product{{$product['id']}}">
                    <td>
                    @if($image_path == '')         
                    <img src="{{ asset('admin/assets/img/products/placeholder-person.jpg')}}" alt=""
                            class="product_img">       
                    @else
                    <img src="{{ asset('products/image/').'/'.$image_path }}" alt=""
                            class="product_img"> 
                    @endif
                            <span class="product_name">{{$product['product_name']}}</span></td>
                    <td><span class="currency_symbol">₹</span><span class="product_price">{{$product['price']}}</span></td>
                    <td>0</td>
                    <td>
                        <div class="datetime_layout">
                            <div class="datetime_txt">
                                <p class="month_txt">{{ date('F', strtotime($product['created_at'])) }}</p>
                                <p class="day_txt">{{ date('d', strtotime($product['created_at'])) }}</p>
                            </div>
                            <p class="datetime_separator"><span>at</span></p>
                            <div class="time_layout">
                                <p><span class="hour_txt">{{ date('h', strtotime($product['created_at'])) }}</span> :
                                    <span class="hour_txt">{{ date('i', strtotime($product['created_at'])) }}<span></p>
                            </div>
                        </div>
                    </td>
                    <td>Instock</td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="toggle_droupdown"
                                    src="{{ asset('admin/assets/img/products/menu-icon.svg') }}"></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" data-toggle="modal" data-target=" #viewProductModal" onclick="viewProduct({{$product['id']}})">View
                                    Product</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#editProductModal"
                                    data-id="{{$product['id']}}" onclick="editProduct({{$product['id']}})">Edit</a>
                                <a class=" dropdown-item" href="#"
                                    >Duplicate</a>
                                <a class=" dropdown-item text-danger deleteproduct" data-toggle="modal"
                                    data-target="#deleteProductModal" onclick="deleteProduct({{$product['id']}})" ">Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class=" products_table_btm_txt">
        <p class="big">
        Got something to sell? Add more products and get way more sales!
        </p>
        <a href="" class="big" data-toggle="modal" data-target="#productTypeModal">Add a
        Product</a>
    </div>



    <!-- product Type Modal -->
    <div class="modal fade" id="productTypeModal" tabindex="-1" role="dialog"
        aria-labelledby="productTypeModalLabel">
        <div class="modal-dialog modal_width_1000" role="document">
            <div class="modal-content">
                <div class="modal-body productTypeModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link text-left" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>

                        </div>
                        <div class="col-md-10 text-center">
                            <h3 class="modal_title">Choose Product Type</h3>
                            <p class="modal_subtitle mb-5">Select the type of product that you
                                wish to add
                            </p>
                        </div>
                    </div>
                    <div class="row product_type_list">
                        <div class="col-md-4 product_type" data-toggle="modal"
                            data-target="#addProductModal">
                            <div class="product_type_inner text-center">
                                <img class="product_type_img"
                                    src="{{ asset('admin/assets/img/products/phyprod.svg') }}">
                                <p class="product_type_title">Add a Physical Product</p>
                                <p class="product_type_txt">You are selling physical products
                                    and getting
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
    <!-- product Type Modal end -->

    <!-- Cerate plug Modal -->
    <div class="modal fade" id="plugModal" tabindex="-1" role="dialog"
        aria-labelledby="plugModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body plugModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-10 text-center">
                            <h3 class="modal_title">What are you selling?</h3>
                            <p class="modal_subtitle mb-5">Select the type of product or service
                                that you
                                wish to sell
                            </p>
                        </div>
                    </div>
                    <div class="row product_type_list">
                        <div class="col-md-4 product_type" id="choosephysiacalproduct" data-toggle="modal"
                            data-target="#ChooseProductModal">
                            <div class="product_type_inner text-center">
                                <img class="product_type_img"
                                    src="{{ asset('admin/assets/img/products/phyprod.svg') }}">
                                <p class="product_type_title">Add a Physical Product</p>
                                <p class="product_type_txt">You are selling physical products
                                    and getting
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

     <!-- Choose Products Modal -->
     <div class="modal fade" id="ChooseProductModal" tabindex="-1" role="dialog"
        aria-labelledby="ChooseProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body ChooseProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8 text-center">
                            <h3 class="modal_title">Choose Products</h3>
                            <p class="modal_subtitle mb-5">The products you choose will appear during checkout. You can add as many as you like.</p>
                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                          <input type="button" class="theme_btn ripple_btn dark_btn" id="choose_product_submit" value="Continue">
                        </div>
                    </div>
                    <div class="row product_type_list align-items-center">
                       
                        <span class="choose_product_data"></span>
                       
                        <div class="col-md-3 product_type  add_choose_product_box" data-toggle="modal"
                            data-target="#addProductModal">
                            <div class="choose_product_inner text-center w-100">
                            <i class="fa fa-plus-square themecolor add_product_icon"></i>
                                <div class="add_choose_product_link">
                                <a class="themecolor">Add a Product</a>
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
    <!-- Choose Products Modal end -->

    <!-- Add New product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog"
        aria-labelledby="addProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body addProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">Add a Physical Product</h3>
                                <p class="modal_subtitle ">Add your physical product by filling
                                    the fields
                                    below.
                                </p>
                            </div>

                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                            <button type="submit" class="theme_btn ripple_btn dark_btn"
                                id="">Save</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="add_product_form mt-3">
                                <form class="addproduct" id="add_product">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Title<span>*</span></label>
                                                <input type="text"
                                                    class="form-control form_field"
                                                    placeholder="Enter your product title"
                                                    id="title" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Category">Category</label>
                                                <select type="text"
                                                    class="form-control form_field"
                                                    name="category" id="category">
                                                    @foreach ($productcategory['data'] as $cat)
                                                    <option value="{{$cat['id']}}">
                                                        {{$cat['category_name']}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Price<span>*</span></label>
                                            <div class="input-group mb-3" id="price_error">
                                                <div class="input-group-prepend">
                                                    <select class="form-control form_field"
                                                        id="product_currency"
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
                                                        <option value="INR" selected="selected">
                                                            INR</option>
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
                                                <input type="text"
                                                    class="form-control form_field"
                                                    id="product_price" name="product_price"
                                                    placeholder="Enter a price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Order Limit</label>
                                                <input type="text"
                                                    class="form-control form_field"
                                                    name="order_limit" id="order_limit"
                                                    placeholder="Enter a limit (optional)">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Stock<span>*</span></label>
                                            <input type="text" class="form-control form_field"
                                                name="product_stock" id="product_stock"
                                                placeholder="Enter Stock"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Short Description</label>
                                                <input type="text"
                                                    class="form-control form_field"
                                                    placeholder="Short Description"
                                                    id="short_description"
                                                    name="short_description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Long Description</label>
                                                <textarea id="long_description"
                                                    name="long_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label class="form_inner_label">Images</label>
                                                <p class="big">Product images are really
                                                    important for
                                                    customers to
                                                    make
                                                    a decision whether to buy or not. So pick
                                                    photos that
                                                    make your
                                                    product shine.</p>
                                            </div>
                                            <span class="upload_image_area"></span>
                                            <div class="dropzone" id="myDropzone"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 d-none">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label
                                                    class="form_inner_label">Variations</label>
                                                <p class="big">You can use variations if you
                                                    have multiple
                                                    types of
                                                    the
                                                    same product. Let’s say you have a T-Shirt,
                                                    which is in
                                                    S and M
                                                    but
                                                    also blue or red, you can create a variation
                                                    for each of
                                                    them.
                                                </p>
                                                <p class="big">Please note that the first option
                                                    in the
                                                    table will
                                                    be
                                                    automatically added in the cart at the
                                                    Checkout.</p>
                                                <a class="big themecolor" id="add_variation">Add
                                                    variations</a>
                                            </div>
                                            <div class="product_variations_form">
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="usr">Option 1</label>
                                                            <input type="text"
                                                                class="form-control form_field"
                                                                id="option1" name="option1"
                                                                placeholder="Enter a label">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="control-group form-group">
                                                            <label for="variation_one">Press
                                                                enter to add an
                                                                option
                                                                and
                                                                backspace to remove
                                                            </label>
                                                            <input type="text"
                                                                id="variation_one"
                                                                class="variation_one demo-default "
                                                                placeholder="Enter variations options">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="usr">Option 2</label>
                                                            <input type="text"
                                                                class="form-control form_field"
                                                                id="option2"
                                                                placeholder="Enter a label"
                                                                name="option2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="control-group form-group">
                                                            <label for="variation_two">Press
                                                                enter to add an
                                                                option
                                                                and
                                                                backspace to remove
                                                            </label>
                                                            <input type="text"
                                                                id="variation_two"
                                                                class="variation_two demo-default"
                                                                placeholder="Enter variations options">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="variation_table_data">
                                                    <table class="table variations_table"
                                                        id="variations_table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th scope="col" id="opt_label1">
                                                                    Option 1
                                                                </th>
                                                                <th scope="col" id="opt_label2">
                                                                    Option 2
                                                                </th>
                                                                <th scope="col"
                                                                    class="price_filed">Price
                                                                </th>
                                                                <th scope="col"
                                                                    class="quantity_filed">
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
                                   
                                    <div class="form_images_upload text-center mt-4">
                                        <p class="big">Once you are done, click save button
                                            below.</p>
                                        <!-- <button type="submit" class="theme_btn  dark_btn product_submit_btn" id="product_submit">Save</button> -->
                                        <input type="submit"
                                            class="theme_btn ripple_btn dark_btn product_submit_btn"
                                            id="product_submit" value="Save">
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

    <!-- View product Modal -->
    <div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog"
        aria-labelledby="viewProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body viewProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-7">
                            <div class="text-center">
                                <h3 class="modal_title">Product Details</h3>
                            </div>

                        </div>
                        <div class="col-md-3 save_btn_txt text-right">
                            <div class="product_view_edit_btn"><button
                                    class="theme_btn ripple_btn" data-toggle="modal"
                                    data-target="#editProductModal"><i class="fa fa-pencil"></i>
                                    Edit</button></div>
                            <div class="dropdown product_view_droupdown">
                                <a class="dropdown-toggle" id="productDropdownMenu"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu"
                                    aria-labelledby="productDropdownMenu">
                                    <a class="dropdown-item" href="#">Duplicate</a>
                                    <a class="dropdown-item text-danger" data-toggle="modal"
                                        data-target="#deleteProductModal">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view_product_details">
                        <div class="view_product_name">
                            <p class="big"><img
                                    src="{{ asset('admin/assets/img/products/icon-products-side.svg') }}"
                                    alt=""><span id="product_name"></span></p>
                        </div>
                        <div class="row view_product_detail_inner">
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>Category</label>
                                    <p id="product_category"></p>
                                </div>
                                <div class="view_product_detail_txt">
                                    <label>Price</label>
                                    <p><span
                                            class="view_product_currency_symbol"><b>₹</b></span ><b id="product_price"></b>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>Variations</label>
                                    <p id="product_variation">0 variants</p>
                                </div>
                                <div class="view_product_detail_txt">
                                    <label>Availability</label>
                                    <p id="product_avalibility">In Stock</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>Brand</label>
                                    <p id="product_brand">N/A</p>
                                </div>
                                <div class="view_product_detail_txt">
                                    <label>Model</label>
                                    <p id="product_model">N/A</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>SKU</label>
                                    <p id="product_sku">N/A</p>
                                </div>
                                <div class="view_product_date_detail_txt">
                                    <label>Date Created</label>
                                    <div class="datetime_layout mt-2">
                                        <div class="datetime_txt">
                                            <p class="month_txt" id="product_month">
                                            </p>
                                            <p class="day_txt" id="product_day">
                                            </p>
                                        </div>
                                        <p class="datetime_separator"><span>at</span></p>
                                        <div class="time_layout">
                                            <p><span class="hour_txt" id="product_hour"></span>
                                                :
                                                <span class="hour_txt" id="product_miniute"><span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view_product_tab">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab"
                                    data-toggle="tab" href="#nav-home" role="tab"
                                    aria-controls="nav-home" aria-selected="true"><svg
                                        height="16" viewBox="0 0 20 16" width="20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20,4H4A1.985,1.985,0,0,0,2.01,6L2,18a1.993,1.993,0,0,0,2,2H20a1.993,1.993,0,0,0,2-2V6A1.993,1.993,0,0,0,20,4Zm0,14H4V12H20ZM20,8H4V6H20Z"
                                            transform="translate(-2 -4)"></path>
                                    </svg> Plugs</a>
                                <a class="nav-item nav-link" id="nav-profile-tab"
                                    data-toggle="tab" href="#nav-profile" role="tab"
                                    aria-controls="nav-profile" aria-selected="false"><svg
                                        height="24" viewBox="0 0 24 24" width="24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z">
                                        </path>
                                    </svg> Discounts</a>
                                <a class="nav-item nav-link" id="nav-contact-tab"
                                    data-toggle="tab" href="#nav-contact" role="tab"
                                    aria-controls="nav-contact" aria-selected="false"><svg
                                        height="18" viewBox="0 0 10.18 18" width="10.18"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.8,10.9c-2.27-.59-3-1.2-3-2.15,0-1.09,1.01-1.85,2.7-1.85,1.78,0,2.44.85,2.5,2.1h2.21A3.986,3.986,0,0,0,13,5.19V3H10V5.16c-1.94.42-3.5,1.68-3.5,3.61,0,2.31,1.91,3.46,4.7,4.13,2.5.6,3,1.48,3,2.41,0,.69-.49,1.79-2.7,1.79-2.06,0-2.87-.92-2.98-2.1H6.32c.12,2.19,1.76,3.42,3.68,3.83V21h3V18.85c1.95-.37,3.5-1.5,3.5-3.55C16.5,12.46,14.07,11.49,11.8,10.9Z"
                                            transform="translate(-6.32 -3)"></path>
                                    </svg> Sales</a>
                                <a class="nav-item nav-link" id="nav-about-tab"
                                    data-toggle="tab" href="#nav-about" role="tab"
                                    aria-controls="nav-about" aria-selected="false"><svg
                                        height="20" viewBox="0 0 18 20" width="18"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.53,11.06,15.47,10l-4.88,4.88L8.47,12.76,7.41,13.82,10.59,17ZM19,3H18V1H16V3H8V1H6V3H5A1.991,1.991,0,0,0,3.01,5L3,19a2,2,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V5A2.006,2.006,0,0,0,19,3Zm0,16H5V8H19Z"
                                            transform="translate(-3 -1)"></path>
                                    </svg> Events</a>
                            </div>
                        </nav>
                        <div class="tab-content view_product_content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <p class="big">Got something to sell? Add some sales channels to
                                    your
                                    business!</p>
                                <a href="" class="big themecolor">Create</a>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <p class="big">Create discounts, coupons and vouchers for your
                                    products.</p>
                                <a href="" class="big themecolor">Add Discount</a>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <p class="big">Got something to sell? Add some sales channels to
                                    your
                                    business!</p>
                                <a href="" class="big themecolor">Add a Product</a>
                            </div>
                            <div class="tab-pane event_tab_content fade" id="nav-about"
                                role="tabpanel" aria-labelledby="nav-about-tab">
                                <table class="table variations_table event_tab_table text-left"
                                    id="variations_table">
                                    <thead>
                                        <tr>
                                            <th scope="col" id="opt_label1">Event</th>
                                            <th scope="col" id="opt_label2">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col" id="opt_label1"><span id="product_name">test</span> has been
                                                created</td>
                                            <td scope="col" id="opt_label2">                                          
                                                <div class="datetime_layout">
                                                    <div class="datetime_txt">
                                                        <p class="month_txt" id="product_month">
                                                        </p>
                                                        <p class="day_txt" id="product_day">
                                                        </p>
                                                    </div>
                                                    <p class="datetime_separator"><span>at</span></p>
                                                    <div class="time_layout">
                                                        <p><span class="hour_txt" id="product_hour"></span>
                                                            :
                                                            <span class="hour_txt" id="product_miniute"><span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="event_tab_btm_content">
                                    <p class="big">Got something to sell? Add a product!</p>
                                    <a href="" class="big themecolor">Add a Product</a>
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
    <!-- View product Modal end-->

    <!-- Edit New product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog"
        aria-labelledby="editProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body editProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">Edit Physical Product</h3>
                                <p class="modal_subtitle">Update your physical product by
                                    filling the fields
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
                                <form class="addproduct" id="editproduct">
                                    <div class="row">
                                        <input type="hidden" id="product_edit_id"
                                            name="product_edit_id">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Title<span>*</span></label>
                                                <input type="text"
                                                    class="form-control form_field"
                                                    placeholder="Enter your product title"
                                                    id="title" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Category">Category</label>
                                                <select type="text"
                                                    class="form-control form_field"
                                                    name="category" id="category">
                                                    @foreach ($productcategory['data'] as $cat)
                                                    <option value="{{$cat['id']}}">
                                                        {{$cat['category_name']}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Price<span>*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <select class="form-control form_field"
                                                        id="product_currency"
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
                                                        <option value="INR" selected="selected">
                                                            INR</option>
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
                                                <input type="text"
                                                    class="form-control form_field"
                                                    id="product_price" name="product_price"
                                                    placeholder="Enter a price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Order Limit</label>
                                                <input type="text"
                                                    class="form-control form_field"
                                                    name="order_limit" id="order_limit"
                                                    placeholder="Enter a limit (optional)">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Stock<span>*</span></label>
                                            <input type="text" class="form-control form_field"
                                                name="product_stock" id="product_stock"
                                                placeholder="Enter Stock"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Short Description</label>
                                                <input type="text"
                                                    class="form-control form_field"
                                                    placeholder="Short Description"
                                                    id="short_description"
                                                    name="short_description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Long Description</label>
                                                <textarea id="long_description"
                                                    name="long_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label class="form_inner_label">Images</label>
                                                <p class="big">Product images are really
                                                    important for
                                                    customers to
                                                    make
                                                    a decision whether to buy or not. So pick
                                                    photos that
                                                    make your
                                                    product shine.</p>
                                            </div>
                                            <span class="upload_image_area"></span>
                                            <div class="dropzone" id="myDropzone"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 d-none">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label
                                                    class="form_inner_label">Variations</label>
                                                <p class="big">You can use variations if you
                                                    have multiple
                                                    types of
                                                    the
                                                    same product. Let’s say you have a T-Shirt,
                                                    which is in
                                                    S and M
                                                    but
                                                    also blue or red, you can create a variation
                                                    for each of
                                                    them.
                                                </p>
                                                <p class="big">Please note that the first option
                                                    in the
                                                    table will
                                                    be
                                                    automatically added in the cart at the
                                                    Checkout.</p>
                                                <a class="big themecolor" id="edit_add_variation">Add
                                                    variations</a>
                                            </div>
                                            <div class="product_variations_form">
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="usr">Option 1</label>
                                                            <input type="text"
                                                                class="form-control form_field"
                                                                id="option1" name="option1"
                                                                placeholder="Enter a label">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="control-group form-group">
                                                            <label for="variation_one">Press
                                                                enter to add an
                                                                option
                                                                and
                                                                backspace to remove
                                                            </label>
                                                            <input type="text"
                                                                id="edit_variation1"
                                                                class="edit_variation1 test_demo"
                                                                placeholder="Enter variations options">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="usr">Option 2</label>
                                                            <input type="text"
                                                                class="form-control form_field"
                                                                id="option2"
                                                                placeholder="Enter a label"
                                                                name="option2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="control-group form-group">
                                                            <label for="variation_two">Press
                                                                enter to add an
                                                                option
                                                                and
                                                                backspace to remove
                                                            </label>
                                                            <input type="text"
                                                                id="edit_variation2"
                                                                class="edit_variation2 test_demo"
                                                                placeholder="Enter variations options">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="variation_table_data">
                                                    <table class="table variations_table"
                                                        id="edit_variations_table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th scope="col" id="opt_label1">
                                                                    Option 1
                                                                </th>
                                                                <th scope="col" id="opt_label2">
                                                                    Option 2
                                                                </th>
                                                                <th scope="col"
                                                                    class="price_filed">Price
                                                                </th>
                                                                <th scope="col"
                                                                    class="quantity_filed">
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
                                    <div class="form_images_upload text-center mt-4">
                                        <p class="big">Once you are done, click save button
                                            below.</p>
                                        <input type="submit" id="update_product"
                                            class="theme_btn ripple_btn dark_btn product_submit_btn"
                                            value="Save">
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
    <!-- Edit New product Modal end-->

    <!-- Delete product Modal -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteProductModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body deleteProductModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details text-center">
                        <div class="delete_product_img">
                            <img src="{{ asset('admin/assets/img/products/remove-icon.svg') }}"
                                alt="">
                        </div>
                        <h3>Remove Product</h3>
                        <p class="big">Are you sure you want to remove this product ?</p>
                        <p class="text-danger">(This action cannot be reverted)</p>
                        <input type="hidden" id="delet_id" name="delet_id">
                        <div class="product_remove_btn">
                            <button class="theme_btn ripple_btn dark_btn w-100 ml-0"
                                id="delet_product">Yes, remove
                                it</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Delete product Modal end-->

    <!--Image CropModal Modal -->
    <div class="modal" id="imageCropModal">
        <div class="modal-dialog modal_width_1155">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="testimg"></div>
                    <div id="testbtn"></div>
                </div>

            </div>
        </div>
    </div>    
    <!--Image CropModal Modal end-->

    <!-- payment option Modal -->
    <div class="modal fade" id="paymentoptionModal" tabindex="-1" role="dialog" aria-labelledby="paymentoptionModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body paymentoptionModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
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
                            <input type="button" class="theme_btn ripple_btn dark_btn" id="select_payment_submit" value="Finish">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <label class="paymnet_type_label"><input type="radio" id="paymnet_type" name="paymnet_type" value="Cash on delivery" />
                            <div class="payment_option_box text-center">
                                <img src="{{ asset('admin/assets/img/dashboard/cashondelivery.svg') }}" alt="">
                                <p>with Cash on delivery</p>
                                <a href="" class="themecolor" id="payment_select">select</a>
                            </div>
                        </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- paymentoption Modal end-->

    <!-- selling product Modal -->
    <div class="modal fade" id="sellingProductModal" tabindex="-1" role="dialog"
        aria-labelledby="sellingProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body sellingProductModal_body">
                    <div class="row">
                        <div class="col-md-6 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                       
                        <div class="col-md-6 save_btn_txt text-right">
                            <div class="product_view_edit_btn"><p class="text-success">Active</p></div>
                            <div class="dropdown product_view_droupdown">
                                <a class="dropdown-toggle" id="productDropdownMenu"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu"
                                    aria-labelledby="productDropdownMenu">
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item text-danger" data-toggle="modal"
                                        data-target="#">Archive</a>
                                </div>
                            </div>
                        </div>
                    </div>          
                   
                   <div class="checkout_details text-center">
                   <h3 class="modal_title">Selling <span id="selling_product_name"></span> with <span id="selling_payment"></span></h3>
                    <p class="checkout_page_txt">Checkout Page</p>
                    <p class="checkout_link_txt mb-0" ><a href="" id="product_checkout_link" target="_blank"></p>
                    <p class="checkout_clipboard_txt" data-clipboard-target="#product_checkout_link">Copy to Clipboard</p>
                   </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- selling product Modal end-->

      <!-- Delete Image Modal -->
      <div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteImageModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body deleteImageModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal"
                                aria-label="Close"><img class="back_btn_img"
                                    src="{{ asset('admin/assets/img/products/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details text-center">
                        <div class="delete_product_img">
                            <img src="{{ asset('admin/assets/img/products/remove-icon.svg') }}"
                                alt="">
                        </div>
                        <h3>Remove Image</h3>
                        <p class="big">Are you sure you want to remove the image?</p>
                        <p class="text-danger">(This action cannot be reverted)</p>
                        <input type="hidden" id="delet_id" name="delet_id">
                        <div class="product_remove_btn">
                            <button class="theme_btn ripple_btn dark_btn w-100 ml-0"
                                id="delet_image">Yes, remove
                                it</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Delete Image Modal end-->

    <div class="profile_setting_txt">
        <div class=""><a class="profile_setting_button ripple_btn" id="profile_setting"><img
                    src="admin/assets/img/main/apps-icon.svg"></a></div>
        <div class="profile_setting_box">

            <div class="profile_setting_inner_top">
                <p class="whitelabel_txt" id="superbolt_text" data-toggle="modal"
                    data-target="#superboltsModal">
                    <img class="white_label_img"
                        src="admin/assets/img/main/spb-logo-square-white.svg"><span>NEW!
                        Superbolts: re-sell sanalpos.co whitelabel</span></p>
                <img class="profile_setting_close_btn"
                    src="admin/assets/img/main/icon-close.svg" alt="">
            </div>
            <div class="profile_setting_inner_btm">
                @foreach ($userdetail as $data)
                <div id="edit_profile" class="edit_profile_text" data-toggle="modal"
                    data-target="#editProfileModal">
                    <img class="edit_profile_img" src="admin/assets/img/main/no-avatar.svg"
                        alt="">
                    <div class="edit_profile_inner">
                        <p class="ellipsis_text profile-name mb-0"><b> {{ $data->first_name }}
                                {{ $data->last_name }}</b></p>
                        <p class="mb-0">Edit Profile</p>
                    </div>
                </div>
                @endforeach
                <a class="logout_profile_text ripple_btn" href="{{ url('logout') }}">
                    <img src="admin/assets/img/main/logout.svg" alt="">
                    <p class="mb-0" p>Logout</p>
                </a>
                <div id="support_profile" class="support_profile_text ripple_btn"
                    data-toggle="modal" data-target="#supportModal">
                    <img src="admin/assets/img/main/live-help.svg" alt="">
                    <p class="mb-0">Support</p>
                </div>
            </div>

        </div>
    </div>
    @endsection

@section('scripts')
<script>
    $("#starrate").click(function() {
        $(".rating_area_inner").show();
    })

    var valueHover = 0;

    function calcSliderPos(e, maxV) {
        return (e.offsetX / e.target.clientWidth) * parseInt(maxV, 10);
    }

    $(".starrate").on("click", function() {
        $(this).data('val', valueHover);
        $(this).addClass('saved')
    });

    $(".starrate").on("mouseout", function() {
        upStars($(this).data('val'));
    });


    $(".starrate span.ctrl").on("mousemove", function(e) {
        var maxV = parseInt($(this).parent("div").data('max'))
        valueHover = Math.ceil(calcSliderPos(e, maxV) * 2) / 2;
        upStars(valueHover);
    });


    function upStars(val) {

        var val = parseFloat(val);
        $("#starrate").attr('title', val.toFixed(1));

        var full = Number.isInteger(val);
        val = parseInt(val);
        var stars = $("#starrate i");

        stars.slice(0, val).attr("class", "fas fa-fw fa-star");
        if (!full) {
            stars.slice(val, val + 1).attr("class", "fas fa-fw fa-star-half-alt");
            val++
        }
        stars.slice(val, 5).attr("class", "far fa-fw fa-star");




    }


    $(document).ready(function() {
        $(".starrate span.ctrl").width($(".starrate span.cont").width());
        $(".starrate span.ctrl").height($(".starrate span.cont").height());
    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea#long_description",
        height: 300,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

    tinymce.init({
        selector: "textarea#edit_long_description",
        height: 300,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
<script>
    var product_image_arr = [];
    console.log(product_image_arr);
    var i = 0;

    Dropzone.options.myDropzone = {
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: 'saveproductimage',
        acceptedFiles: 'image/jpeg,image/png',
        dictDefaultMessage: '',
        maxfilesexceeded: function(file) {
            this.removeAllFiles();
            this.addFile(file);
        },
        transformFile: function (file, done) {
            var myDropZone = this;
            $('#imageCropModal').modal('show');
            $(".dz-preview").remove();

            // Create the image editor overlay
            var editor = document.createElement('div'); 
            editor.setAttribute("id", "editor_area");
            editor.style.zIndex = 9999;
            editor.style.backgroundColor = '#000';

            // Create the confirm button
            var confirm = document.createElement('button');
            confirm.setAttribute("id", "confirm_btn");
            confirm.style.zIndex = 9999;
            confirm.textContent = 'Confirm';
            confirm.addEventListener('click', function () {

                // Get the canvas with image data from Cropper.js
                var canvas = cropper.getCroppedCanvas({
                    width: 256,
                    height: 256
                });

                // Turn the canvas into a Blob (file object without a name)
                canvas.toBlob(function (blob) {
                    
                    // Update the image thumbnail with the new image data
                    myDropZone.createThumbnail(
                        blob,
                        myDropZone.options.thumbnailWidth,
                        myDropZone.options.thumbnailHeight,
                        myDropZone.options.thumbnailMethod,
                        false,
                        function (dataURL) {

                            // Update the Dropzone file thumbnail
                            myDropZone.emit('thumbnail', file, dataURL);
                            
                            // Return modified file to dropzone
                            done(blob);
                        }
                    );
                });

                // Remove the editor from view
                editor.parentNode.removeChild(editor);
                $("#confirm_btn").remove();
                $('#imageCropModal').modal('hide');
                $(".dz-preview").remove();
        });

        $('#testbtn').empty().append(confirm);
            
            // Load the image
            var image = new Image();
            image.src = URL.createObjectURL(file);
            editor.appendChild(image);

            // Append the editor to the page
            // document.body.appendChild(editor);
            $('#testimg').empty().append(editor);

            // Create Cropper.js and pass image
            var cropper = new Cropper(image, {
                // aspectRatio: 1,
            });

        },
        success: function (file, response) {
                i++;
                $('.upload_image_area').append('<span class="product_selected_img" id="image_preview'+i+'" name="'+response["success"]+'"><img id="theImg" src="products/image/'+response["success"]+'" /><i class="fas fa-trash-alt remove_product_img" id="remove_img" data-toggle="modal" data-target="#deleteImageModal"   onClick="deleteImage('+i+')"></i></span>')
                product_image_arr.push(response["success"]);
                console.log("add image", product_image_arr);
        },
    };   
    
    function deleteImage(id) {      
        $("#delet_image").click(function (){
            // product_image_arr.remove($("#image_preview"+id).attr('name'));
            
            // alert($("#image_preview"+id).remove());
            $("#image_preview"+id).remove()
            $("span #image_preview"+id).css("display", "none");
            $("#deleteImageModal").modal('hide');
            product_image_arr = $.grep(product_image_arr, function(value) {
                return value != $("#image_preview"+id).attr('name');
            });
            console.log("del image", product_image_arr);
        });
    }
</script>
<script>
    $("#choosephysiacalproduct").click( function(){
        console.log("inside model");
        $.ajax({
            url: "{{ url('product_list') }}",
            type: "GET",
           success: function(res) {
                console.log(res);
                res = res['success']['data'];
                for (var j = 0; j < res.length; j++) {
                $(".product_type_list").prepend('<div class="col-md-3 product_type choose_product_box mb-4"> <label class="choose_product_box_label w-100"><input type="radio" id="choose_product_name" name="choose_product_name" value="'+res[j]['id']+'" /><div class="choose_product_inner text-center"><div class="choose_product_type_image"><i class="fa fa-star"></i></div><p class="choose_product_type_title">'+res[j]['product_name']+'</p><p class="choose_product_type_price"><span class="currency_symbol">₹</span><span class="product_price">'+res[j]['price']+'</span></p><a class="product_type_link themecolor">Select</a></div></label></div>');
                }
                
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    });
    var choose_product_id;
    $("#choose_product_submit").click(function(){
        var radioValue = $("input[name='choose_product_name']:checked");
    
        if (radioValue.length == 0) {
            $("#status").html(
                '<div class="alert alert-danger"><strong> Select a product</strong></div>'
            );
           
         return false;
      }
      else{
        choose_product_id = $("input[name='choose_product_name']:checked").val();
        $("#paymentoptionModal").modal('show');
      }
          
    });
    var paymnet_type;
    $("#select_payment_submit").click(function(){
        var radioValue = $("input[name='paymnet_type']:checked");
    
        if (radioValue.length == 0) {
            $("#status").html(
                '<div class="alert alert-danger"><strong> Select a Paymnet</strong></div>'
            );
           
         return false;
      }
      else{
        paymnet_type = $("input[name='paymnet_type']:checked").val();
        $("#plugModal, #ChooseProductModal, #paymentoptionModal").modal('hide');
        $("#sellingProductModal").modal('show');
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('checkout_link') }}",
            type: "POST",
            data: "choose_product_id=" + choose_product_id+ "&paymnet_type=" + paymnet_type,
            success: function(res) {
                console.log(res);
                if(res['payment_type']== "Cash on delivery"){
                    var payment = "Cash";
                }
                $("#selling_product_name").text(res['product_name']);
                $("#product_checkout_link").text(res['checkout_link']);
                $("#selling_payment").text(payment);
                $("#product_checkout_link").attr("href", res['checkout_link']);
                                
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
        
      }
          
    });
    
</script>
<script>
    $("#add_variation").click(function() {
        $(".product_variations_form").show();
        $("#add_variation").hide();

    })
    $("#option1").on('input', function() {
        var opt1 = $("#option1").val();
        $("#opt_label1").html(opt1);
        console.log(opt1);
    });
    $("#option2").on('input', function() {
        var opt2 = $("#option2").val();
        $("#opt_label2").html(opt2);
        console.log(opt2);
    });

    variation1_arr = [];
    variation2_arr = [];
    $('.demo-default').selectize({
        plugins: ['drag_drop'],
        delimiter: ',',
        persist: false,
        create: true,
        onChange: function(value) {
            var str1 = $("#variation_one").val();
            var str2 = $("#variation_two").val();
            variation1_arr = str1.split(",");
            variation2_arr = str2.split(",");

            // console.log("combos", variation1_arr);
            // console.log("combos", variation2_arr);
            variation_array = []

            for (var i = 0; i < variation1_arr.length; i++) {
                for (var j = 0; j < variation2_arr.length; j++) {
                    variation_array.push([variation1_arr[i], variation2_arr[j]]);
                    console.log(variation_array.length + " " + variation_array);
                    $("#variations_table > tbody").empty();
                    for (var k = 0; k < variation_array.length; k++) {
                        $("#variations_table > tbody").append(
                            "<tr class='variation_row_"+k+"'><td><div class='dropzone' id='tableDropzone'></div></td><td>" +
                            variation_array[k][0] + "</td><td>" +
                            variation_array[k][1] +
                            "</td><td><input type='number' name='price"+k+"' id='price"+k+"' class='form-control price_width' placeholder='Enter a price'></td><td><input type='number' name='stock"+k+"' id='stock"+k+"' class='form-control stock_width stock_field' placeholder='Enter stock'></td></tr>"
                        );
                        console.log(variation_array[k]);
                    }
                }
            }
        }

    });
</script>


<script>
    function viewProduct(id) {
        console.log("id--", id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('getproduct') }}/" + id,
            type: "POST",
            data: id,
            success: function(response) {
                console.log(response);
                var res = response['data']['product']['data'][0];
                var date = moment.utc(res['created_at']);
                
                $("#viewProductModal #product_name").text(res['product_name']);
                $("#viewProductModal #product_category").text(res['category_name']);
                $("#viewProductModal #product_price").text(res['price']);
                $("#viewProductModal #product_month").text(date.format('MMMM'));
                $("#viewProductModal #product_day").text(date.format('DD'));
                $("#viewProductModal #product_hour").text(date.format('h'));
                $("#viewProductModal #product_miniute").text(date.format('mm'));  
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }

        });
    }
    // <!-- edit product -->       
    function editProduct(id) {
        $('.upload_image_area').empty();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('getproduct') }}/" + id,
            type: "POST",
            data: id,
            success: function(response) {
                console.log(response);
                if( response['data']['product']['status'] == "1"){
                    var res = response['data']['product']['data'][0];
                    $("#editproduct #product_edit_id").val(res['id']);
                    $("#editproduct #title").val(res['product_name']);
                    $("#editproduct #category option[value=" + res['category_id'] + "]")
                        .attr('selected', 'selected');
                    $("#editproduct #product_price").val(res['price']);
                    $("#editproduct #order_limit").val(res['order_limit']);
                    $("#editproduct #product_stock").val(res['stock']);
                    $("#editproduct #short_description").val(res['short_desc']);
                    $("#editproduct #long_description").val(res['long_desc']);
                }
                
                if(response['data']['productimage']['status'] == "1"){
                    var res = response['data']['productimage']['data'];
                    
                    for(var i=0; i<res.length; i++){
                        $('.upload_image_area').append('<span class="product_selected_img" id="image_preview'+res[i]["id"]+'"><img id="theImg" src="products/image/'+res[i]["image_path"]+'" /><i class="fas fa-trash-alt remove_product_img" id="remove_img" data-toggle="modal" data-target="#deleteImageModal"  onClick="deletepProductImage('+res[i]["id"]+')"></i></span>');                
                    }
               
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }

        });
       
    }

    $('#update_product').on('click', function(event) {
        event.preventDefault();
        var data = $("#editproduct").serialize();
        var edit_id = $("#product_edit_id").val();
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('editproduct') }}/" + edit_id,
            type: "POST",
            data: data + "&product_image=" + product_image_arr,
            success: function(res) {
                console.log(res);
                if ($.isEmptyObject(res.data.error)) {
                    if (res['data']['message'] == "success") {
                        $("#editproduct")[0].reset();
                            var res = res['data']['data'][0];
                        $(".product"+edit_id+" .product_name").text(res['product_name']);
                        $(".product"+edit_id+" .product_price").text(res['price']);
                        $("#editProductModal").modal('hide');
                        $("#status").html(
                            '<div class="alert alert-success"><strong>Success!</strong>Product Update Successfully</div>'
                        );
                    }
                } else {
                    printErrorMsg(res.data.error);
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    });

    function printErrorMsg(msg) {
        $(".error").remove();
        if (msg.product_name) {
            $("#title").after('<span class="error">' + msg.product_name + '</span>');
        }
        if (msg.price) {
            $("#price_error").after('<span class="error">' + msg.price + '</span>');
        }
        if (msg.stock) {
            $("#product_stock").after('<span class="error">' + msg.stock + '</span>');
        }

    }

    // delete edit modal product image
    var delete_img_id;
    function deletepProductImage(id) {   
        $("#delet_image").click(function (){
            console.log(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('delete_product_image') }}/" + id,
                type: "POST",
                data: id,
                success: function(res) {
                    console.log(res);
                    if (res['data']['message'] == "success") {
                        $("span #image_preview"+id).hide();
                        $("span #image_preview"+id).css("display", "none");
                        $("#deleteImageModal").modal('hide');
                        $("#status").html(
                        '<div class="alert alert-success"><strong>Success!</strong></div>'
                    );
                    }
                },
                error: function(jqXHR, textStatus, errorMessage) {
                    console.log(errorMessage); // Optional
                }
            });
            
        });
    }


    // <!-- delete product -->
    var delete_product_id;
    function deleteProduct(id) {
        delete_product_id = id
        console.log(delete_product_id);
    }
    $('#delet_product').on('click', function(event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('deleteproduct') }}/" + delete_product_id,
            type: "POST",
            data: delete_product_id,
            success: function(res) {
                console.log(res);
                if (res['data']['message'] == "success") {

                    $("#status").html(
                        '<div class="alert alert-success"><strong>Success!</strong>Product Delete Successfully</div>'
                    );
                    $(".product" + delete_product_id).remove();
                    $("#deleteProductModal").modal('hide');
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    });
</script>
<script>
    $('#product_submit').on('click', function(event) {
        console.log("click working");
        console.log($("#variation_one").val());
        event.preventDefault();
        var data = $("#add_product").serialize();
        console.log(data);      
        var variation_one = $('#variation_one').val();
        var variation_two = $('#variation_two').val();
        
        if($('#variation_one').val() != "" || $('#variation_two').val() != "" ){
            $(".error1").remove();
            if($("input.stock_field").val() == ""){
            console.log(" inner stock");
            var id = $(this).attr('id');
            console.log("aaaaaid", $(this).attr('id'));
              $(".stock_field").after("<span class='error1'> field is required</span>")
          }
        }
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('product_data') }}",
            type: "POST",
            data: data + "&variation_one=" + variation_one+ "&variation_two=" + variation_two + "&product_image=" + product_image_arr,
            success: function(res) {
                console.log(res);

                if ($.isEmptyObject(res.data.error)) {
                    if (res['data']['message'] == "success") {

                        var data = res['data']['data'][0];
                        var date = moment.utc(data['created_at']);
        

                        $("#add_product_list").append('<tr class="product' +
                            data.id +
                            '"><td><img src="{{ asset("admin/assets/img/products/placeholder-person.jpg") }}" alt=""class="product_img"><span class="product_name">' +
                            data.product_name +
                            '</span></td><td><span class="currency_symbol">₹</span>' +
                            data.price +
                            '</td><td>0</td><td><div class="datetime_layout"><div class="datetime_txt"><p class="month_txt">' +
                            date.format('MMMM') +
                            '</p><p class="day_txt">' + date.format('DD') +
                            '</p></div><p class="datetime_separator"><span>at</span></p><div class="time_layout"><p><span class="hour_txt">' +
                            date.format('h') +
                            '</span>:<span class="hour_txt">' + date.format('mm') +
                            '<span></p></div></div></td><td>Instock</td><td><div class="dropdown"><a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="toggle_droupdown"src="{{ asset("admin/assets/img/products/menu-icon.svg") }}"></a><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" data-toggle="modal" data-target=" #viewProductModal" onclick="viewProduct(' + data
                            .id +
                            ')">View Product</a><a class="dropdown-item" data-toggle="modal" data-target="#editProductModal" data-id="' +
                            data.id + '" onclick="editProduct(' + data
                            .id +')">Edit</a> <a class=" dropdown-item" href="#" ">Duplicate</a> <a class=" dropdown-item text-danger deleteproduct" data-toggle="modal" data-target="#deleteProductModal" onclick="deleteProduct(' +
                            data.id +
                            ')" ">Remove</a></div></div></td></tr>');
                        
                        $("#add_product")[0].reset();

                        $("#addProductModal, #productTypeModal").modal(
                            'hide');
                        $("#status").html(
                            '<div class="alert alert-success"><strong>Success!</strong>Product Add Successfully</div>'
                        );
                    } 
                }else {
                        console.log(res.data.error.price);
                        printErrorMsg(res.data.error);
                    
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    });

    function printErrorMsg(msg) {
        $(".error").remove();
        if (msg.product_name) {
            $("#title").after('<span class="error">' + msg.product_name + '</span>');
        }
        if (msg.price) {
            $("#price_error").after('<span class="error">' + msg.price + '</span>');
        }
        if (msg.stock) {
            $("#product_stock").after('<span class="error">' + msg.stock + '</span>');
        }

    }
    $(function(){
    new Clipboard('.checkout_clipboard_txt');
    });
    
</script>
@endsection