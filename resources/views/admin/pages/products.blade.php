@extends('admin.layout.main')
@section('content')
<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-lg-4 topbar_left pr-0">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="https://www.plugnpaid.com/css-5.4.3/img/icon-products.svg" alt=""><span>Products &
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
                    <button class="theme_btn left_topbar_btn" data-toggle="modal" data-target="#productTypeModal">Add a Product</button>
                    <button class="theme_btn dark_btn" data-toggle="modal" data-target="#plugModal">Create Plug</button>
                </div>
            </div>
        </div>

        <div class="recommend_box">
            <p class="big">How likely are you to recommend this platform to other merchants?</p>
            <div id="starrate" class="starrate " data-val="" data-max="5" data-toggle="tooltip"
                data-placement="top" title="">
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
                <button class="theme_btn dark_btn">Submit</button>
            </div>
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
            <tbody>
                <tr>
                    <td><img src="https://journeypurebowlinggreen.com/wp-content/uploads/2018/05/placeholder-person.jpg"
                            alt="" class="product_img"><span class="product_name">Product1</span></td>
                    <td><span class="currency_symbol">₹</span>1230</td>
                    <td>0</td>
                    <td>clarkkent@mail.com</td>
                    <td>Instock</td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" data-toggle="modal" data-target="#viewProductModal">View
                                    Product</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#editProductModal">Edit</a>
                                <a class="dropdown-item" href="#">Duplicate</a>
                                <a class="dropdown-item text-danger" data-toggle="modal"
                                    data-target="#deleteProductModal">Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><img src="https://journeypurebowlinggreen.com/wp-content/uploads/2018/05/placeholder-person.jpg"
                            alt="" class="product_img"><span class="product_name">Product1</span></td>
                    <td><span class="currency_symbol">₹</span>1230</td>
                    <td>0</td>
                    <td>clarkkent@mail.com</td>
                    <td>Instock</td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" data-toggle="modal" data-target="#viewProductModal">View
                                    Product</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#editProductModal">Edit</a>
                                <a class="dropdown-item" href="#">Duplicate</a>
                                <a class="dropdown-item text-danger" data-toggle="modal"
                                    data-target="#deleteProductModal">Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="products_table_btm_txt">
        <p class="big">
            Got something to sell? Add more products and get way more sales!
        </p>
        <a href="" class="big" data-toggle="modal" data-target="#productTypeModal">Add a Product</a>
    </div>



    <!-- product Type Modal -->
    <div class="modal fade" id="productTypeModal" tabindex="-1" role="dialog" aria-labelledby="productTypeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body productTypeModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="https://www.plugnpaid.com/img/back-arrow.svg" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-10 text-center">
                            <h3 class="modal_title">Choose Product Type</h3>
                            <p class="modal_subtitle mb-5">Select the type of product that you wish to add</p>
                        </div>
                    </div>
                    <div class="row product_type_list">
                        <div class="col-md-4 product_type" data-toggle="modal" data-target="#addProductModal">
                            <div class="product_type_inner text-center">
                                <img class="product_type_img" src="https://www.plugnpaid.com/img/phyprod.svg">
                                <p class="product_type_title">Add a Physical Product</p>
                                <p class="product_type_txt">You are selling physical products and getting paid with
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
    <div class="modal fade" id="plugModal" tabindex="-1" role="dialog" aria-labelledby="plugModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body plugModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="https://www.plugnpaid.com/img/back-arrow.svg" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-10 text-center">
                            <h3 class="modal_title">What are you selling?</h3>
                            <p class="modal_subtitle mb-5">Select the type of product or service that you wish to sell
                            </p>
                        </div>
                    </div>
                    <div class="row product_type_list">
                        <div class="col-md-4 product_type" data-toggle="modal" data-target="#addProductModal">
                            <div class="product_type_inner text-center">
                                <img class="product_type_img" src="https://www.plugnpaid.com/img/phyprod.svg">
                                <p class="product_type_title">Add a Physical Product</p>
                                <p class="product_type_txt">You are selling physical products and getting paid with
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body addProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="https://www.plugnpaid.com/img/back-arrow.svg" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">Add a Physical Product</h3>
                                <p class="modal_subtitle mb-5">Add your physical product by filling the fields below.
                                </p>
                            </div>
                            <div class="add_product_form">
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
                                                <p class="big">Product images are really important for customers to make
                                                    a decision whether to buy or not. So pick photos that make your
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
                                                <p class="big">You can use variations if you have multiple types of the
                                                    same product. Let’s say you have a T-Shirt, which is in S and M but
                                                    also blue or red, you can create a variation for each of them.</p>
                                                <p class="big">Please note that the first option in the table will be
                                                    automatically added in the cart at the Checkout.</p>
                                                <a class="big themecolor" id="add_variation">Add variations</a>
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
                                                            <label for="variation_one">Press enter to add an option and
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
                                                            <label for="variation_two">Press enter to add an option and
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
                                                                <th scope="col" id="opt_label1">Option 1</th>
                                                                <th scope="col" id="opt_label2">Option 2</th>
                                                                <th scope="col" class="price_filed">Price</th>
                                                                <th scope="col" class="quantity_filed">Quantity</th>
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
                                                <p class="big">Product dimensions are important when calculating
                                                    shipping rates, since rates different from package size to package
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
                                        <button class="theme_btn dark_btn product_submit_btn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                            <button class="theme_btn dark_btn ">Save</button>
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
    <div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="viewProductModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body viewProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="https://www.plugnpaid.com/img/back-arrow.svg" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-7">
                            <div class="text-center">
                                <h3 class="modal_title">Product Details</h3>
                            </div>

                        </div>
                        <div class="col-md-3 save_btn_txt text-right">
                            <div class="product_view_edit_btn"><button class="theme_btn" data-toggle="modal"
                                    data-target="#editProductModal"><i class="fa fa-pencil"></i>
                                    Edit</button></div>
                            <div class="dropdown product_view_droupdown">
                                <a class="dropdown-toggle" id="productDropdownMenu" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu" aria-labelledby="productDropdownMenu">
                                    <a class="dropdown-item" href="#">Duplicate</a>
                                    <a class="dropdown-item text-danger" data-toggle="modal"
                                        data-target="#deleteProductModal">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view_product_details">
                        <div class="view_product_name">
                            <p class="big"><img src="https://www.plugnpaid.com/css/img/icon-products-side.svg"
                                    alt="">test</p class="big">
                        </div>
                        <div class="row view_product_detail_inner">
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>Category</label>
                                    <p>Antiques</p>
                                </div>
                                <div class="view_product_detail_txt">
                                    <label>Price</label>
                                    <p><span class="view_product_currency_symbol">₹</span> <b>1000.0</b></p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>Variations</label>
                                    <p>0 variants</p>
                                </div>
                                <div class="view_product_detail_txt">
                                    <label>Availability</label>
                                    <p>In Stock</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>Brand</label>
                                    <p>N/A</p>
                                </div>
                                <div class="view_product_detail_txt">
                                    <label>Model</label>
                                    <p>N/A</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 ">
                                <div class="view_product_detail_txt">
                                    <label>SKU</label>
                                    <p>N/A</p>
                                </div>
                                <div class="view_product_detail_txt">
                                    <label>Date Created</label>
                                    <p>N/A</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view_product_tab">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true"><svg height="16"
                                        viewBox="0 0 20 16" width="20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20,4H4A1.985,1.985,0,0,0,2.01,6L2,18a1.993,1.993,0,0,0,2,2H20a1.993,1.993,0,0,0,2-2V6A1.993,1.993,0,0,0,20,4Zm0,14H4V12H20ZM20,8H4V6H20Z"
                                            transform="translate(-2 -4)"></path>
                                    </svg> Plugs</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false"><svg height="24"
                                        viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z">
                                        </path>
                                    </svg> Discounts</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false"><svg height="18"
                                        viewBox="0 0 10.18 18" width="10.18" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.8,10.9c-2.27-.59-3-1.2-3-2.15,0-1.09,1.01-1.85,2.7-1.85,1.78,0,2.44.85,2.5,2.1h2.21A3.986,3.986,0,0,0,13,5.19V3H10V5.16c-1.94.42-3.5,1.68-3.5,3.61,0,2.31,1.91,3.46,4.7,4.13,2.5.6,3,1.48,3,2.41,0,.69-.49,1.79-2.7,1.79-2.06,0-2.87-.92-2.98-2.1H6.32c.12,2.19,1.76,3.42,3.68,3.83V21h3V18.85c1.95-.37,3.5-1.5,3.5-3.55C16.5,12.46,14.07,11.49,11.8,10.9Z"
                                            transform="translate(-6.32 -3)"></path>
                                    </svg> Sales</a>
                                <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about"
                                    role="tab" aria-controls="nav-about" aria-selected="false"><svg height="20"
                                        viewBox="0 0 18 20" width="18" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.53,11.06,15.47,10l-4.88,4.88L8.47,12.76,7.41,13.82,10.59,17ZM19,3H18V1H16V3H8V1H6V3H5A1.991,1.991,0,0,0,3.01,5L3,19a2,2,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V5A2.006,2.006,0,0,0,19,3Zm0,16H5V8H19Z"
                                            transform="translate(-3 -1)"></path>
                                    </svg> Events</a>
                            </div>
                        </nav>
                        <div class="tab-content view_product_content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <p class="big">Got something to sell? Add some sales channels to your business!</p>
                                <a href="" class="big themecolor">Create</a>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <p class="big">Create discounts, coupons and vouchers for your products.</p>
                                <a href="" class="big themecolor">Add Discount</a>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <p class="big">Got something to sell? Add some sales channels to your business!</p>
                                <a href="" class="big themecolor">Add a Product</a>
                            </div>
                            <div class="tab-pane event_tab_content fade" id="nav-about" role="tabpanel"
                                aria-labelledby="nav-about-tab">
                                <table class="table variations_table event_tab_table text-left" id="variations_table">
                                    <thead>
                                        <tr>
                                            <th scope="col" id="opt_label1">Event</th>
                                            <th scope="col" id="opt_label2">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col" id="opt_label1">test has been created</td>
                                            <td scope="col" id="opt_label2">MAY 11 at 15:26</th>
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
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body editProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="https://www.plugnpaid.com/img/back-arrow.svg" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">Edit Physical Product</h3>
                                <p class="modal_subtitle mb-5">Update your physical product by filling the fields below.
                                </p>
                            </div>
                            <div class="add_product_form">
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
                                                <textarea id="edit_long_description" name="long_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label class="form_inner_label">Images</label>
                                                <p class="big">Product images are really important for customers to make
                                                    a decision whether to buy or not. So pick photos that make your
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
                                                <p class="big">You can use variations if you have multiple types of the
                                                    same product. Let’s say you have a T-Shirt, which is in S and M but
                                                    also blue or red, you can create a variation for each of them.</p>
                                                <p class="big">Please note that the first option in the table will be
                                                    automatically added in the cart at the Checkout.</p>
                                                <a class="big themecolor" id="add_variation">Add variations</a>
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
                                                            <label for="variation_one">Press enter to add an option and
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
                                                            <label for="variation_two">Press enter to add an option and
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
                                                                <th scope="col" id="opt_label1">Option 1</th>
                                                                <th scope="col" id="opt_label2">Option 2</th>
                                                                <th scope="col" class="price_filed">Price</th>
                                                                <th scope="col" class="quantity_filed">Quantity</th>
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
                                                <p class="big">Product dimensions are important when calculating
                                                    shipping rates, since rates different from package size to package
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
                                    <div class="row mt-4">
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
                                    </div>
                                    <div class="form_images_upload text-center mt-4">
                                        <p class="big">Once you are done, click save button below.</p>
                                        <button class="theme_btn dark_btn product_submit_btn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                            <button class="theme_btn dark_btn ">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Edit New product Modal end-->

    <!-- View product Modal -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteProductModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body deleteProductModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="https://www.plugnpaid.com/img/back-arrow.svg" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details text-center">
                        <div class="delete_product_img">
                            <img src="https://www.plugnpaid.com/css-5.4.5/img/remove-icon.svg" alt="">
                        </div>
                        <h3>Remove Product</h3>
                        <p class="big">Are you sure you want to remove this product ?</p>
                        <p class="text-danger">(This action cannot be reverted)</p>
                        <div class="product_remove_btn">
                            <button class="theme_btn dark_btn w-100 ml-0">Yes, remove it</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- View product Modal end-->

    <!--Image CropModal Modal -->
    <div class="modal" id="imageCropModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="cropimg"></div>
                    <div id="cropbtn"></div>
                </div>

            </div>
        </div>
    </div>
    <!--Image CropModal Modal end-->




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
                            "<tr><td><div class='dropzone' id='tableDropzone'></div></td><td>" +
                            variation_array[k][0] + "</td><td>" + variation_array[k][1] +
                            "</td><td><input type='number' name='price' id='price' class='form-control price_width' placeholder='Enter a price'></td><td><input type='number' name='stock' id='stock' class='form-control stock_width' placeholder='Enter stock'></td></tr>"
                        );
                        console.log(variation_array[k]);
                    }
                }
            }
        }

    });
    </script>
    
    @endsection