<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ecommerce Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&display=swap') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/ripple.css') }} " type="text/css">
    <link href="{{ asset('admin/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/cropper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/selectize.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/sidebar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/media.css') }}" />
</head>

<body>

    <div class="page-wrapper chiller-theme toggled">

        @include('admin.include.sidebar')
        <main class="page-content">

            @yield('content')

        </main>


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
                            <!--<button type="submit" class="theme_btn ripple_btn dark_btn"-->
                            <!--    id="">Save</button>-->
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
                                                    name="long_description" class="tinymce_editor"></textarea>
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
                    <p class="whitelabel_txt" id="superbolt_text" data-toggle="modal" data-target="#superboltsModal">
                        <img class="white_label_img" src="admin/assets/img/main/spb-logo-square-white.svg"><span>NEW!
                            Superbolts: re-sell sanalpos.co whitelabel</span></p>
                    <img class="profile_setting_close_btn" src="admin/assets/img/main/icon-close.svg" alt="">
                </div>
                <div class="profile_setting_inner_btm">

                    <div id="edit_profile" class="edit_profile_text" data-toggle="modal"
                        data-target="#editProfileModal">
                        <img class="edit_profile_img" src="admin/assets/img/main/no-avatar.svg" alt="">
                        <div class="edit_profile_inner">
                            <p class="ellipsis_text profile-name mb-0"><b>
                                    @if(Session::has('user'))
                                    {{ Session::get('user')['first_name'] }} {{ Session::get('user')['last_name'] }}
                                    @endif
                                </b></p>
                            <p class="mb-0">Edit Profile</p>
                        </div>
                    </div>

                    <a class="logout_profile_text ripple_btn" href="{{ url('logout') }}">
                        <img src="admin/assets/img/main/logout.svg" alt="">
                        <p class="mb-0" p>Logout</p>
                    </a>
                    <div id="support_profile" class="support_profile_text ripple_btn" data-toggle="modal"
                        data-target="#supportModal">
                        <img src="admin/assets/img/main/live-help.svg" alt="">
                        <p class="mb-0">Support</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- edit profile model -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog"
            aria-labelledby="editProfileModalLabel">
            <div class="modal-dialog modal_width_500" role="document">
                <div class="modal-content">
                    <div class="modal-body editProfileModal_body">
                        <div class="row">
                            <div class="col-md-12 back_btn_txt">
                                <a class="back_btn_link" href=" data-dismiss=" modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                    <span>Back</span></a>

                                <!-- <div class="dropdown product_view_droupdown"> -->
                                <a class="dropdown-toggle droupdown_menu_toggleicon" id="productDropdownMenu"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="droupdown_menu_img" src="admin/assets/img/main/menu-icon.svg"
                                        alt=""></a>
                                <div class="dropdown-menu" aria-labelledby="productDropdownMenu">
                                    <a class="dropdown-item" href="">Duplicate</a>
                                    <a class="dropdown-item text-danger" data-toggle="modal"
                                        data-target="#deleteAccountModal">Remove</a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="editProfilet_details text-center">
                            <h3 class="modal_title">Edit Profile</h3>
                            <p class="modal_subtitle mb-4">One profile, multiple business accounts.</p>
                            <div class="editProfilet_img">
                                <img src="admin/assets/img/main/no-avatar.png" alt="">
                            </div>
                        </div>
                        <form class="editProfil_form" id="editProfil_form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Login Email Address<span>*</span></label>
                                        <input type="text" class="form-control form_field"
                                            placeholder="Enter Email Address" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name<span>*</span></label>
                                        <input type="text" class="form-control form_field" name="first_name"
                                            id="first_name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Order Limit</label>
                                        <input type="text" class="form-control form_field" name="last_name"
                                            id="last_name" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="profile_save_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">save</button>
                            </div>
                        </form>
                        <div class="consents_table_text">
                            <p class="consents_table_title">consents</p>
                            <table class="table variations_table consents_table" id=consents_table">
                                <thead>
                                    <tr>
                                        <th>Consent Description</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            I consent and agree on how my data is handled according to the Data Privacy
                                            Addendum
                                        </td>
                                        <td>Tue May 05 2020 17:15:56 GMT+0530 (India Standard Time)</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            I consent and agree to sanalpos.co's Terms of Use
                                        </td>
                                        <td>Tue May 05 2020 17:15:56 GMT+0530 (India Standard Time)</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            I want to receive platform updates and occasional promotional emails.
                                        </td>
                                        <td>Tue May 05 2020 17:15:56 GMT+0530 (India Standard Time)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- edit profile model end-->

        <!-- Delete Account Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteAccountModalLabel">
            <div class="modal-dialog modal_width_500" role="document">
                <div class="modal-content">
                    <div class="modal-body deleteAccountModal_body">
                        <div class="row">
                            <div class="col-md-12 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                    <span>Back</span></a>
                            </div>
                        </div>
                        <div class="delete_product_details approve_order_details ">
                            <div class="text-center">
                                <div class="approve_order_img request_data_img">
                                    <img src="admin/assets/img/main/moreicon.svg" alt="">
                                </div>
                                <h3>Delete Account</h3>
                                <p class="big">Are you sure you want us to remove your account? All your plugs, clients,
                                    products and attached payment methods will be permanetly erased.</p>
                            </div>

                            <div class="mark_paid_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Yes, delete account</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- Delete Account Modal end-->

        <!-- support Modal -->
        <div class="modal fade" id="supportModal" tabindex="-1" role="dialog" aria-labelledby="supportModalLabel">
            <div class="modal-dialog modal_width_1155" role="document">
                <div class="modal-content">
                    <div class="modal-body supportModal_body">
                        <div class="row">
                            <div class="col-md-2 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                    <span>Back</span></a>
                            </div>
                            <div class="col-md-8">
                                <div class="text-center">
                                    <h3 class="modal_title mb-5">Helpdesk</h3>
                                </div>
                                <div class="add_product_form">
                                    <form class="support_form" id="support_form">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="subject">Subject</label>
                                                    <input type="text" class="form-control form_field"
                                                        placeholder="What is this about?" id="subject" name="subject">
                                                </div>

                                                <div class="form-group">
                                                    <label for="Details">Details</label>
                                                    <textarea class="form-control form_field" name="details" rows="10"
                                                        id="details"
                                                        plceholser="Detailed explanation of your issue. If it's about a bug, please tell us the steps you followed before it happened. Uploading screenshots helps."></textarea>
                                                </div>

                                                <label class="">Screenshot(s)</label>
                                                <div class="form_images_upload">
                                                    <p class="big">In most cases, uploading a screenshot helps us solve
                                                        your
                                                        ticket faster.</p>
                                                </div>
                                                <span class="upload_image_area"></span>
                                                
                                            </div>
                                        </div>
                                        <div class="text-center mt-5">

                                            <button
                                                class="theme_btn ripple_btn dark_btn product_submit_btn w-100 ml-0">Submit
                                                Ticket</button>
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
        <!-- support Modal end-->

        <!-- superbolts Modal -->
        <div class="modal fade" id="superboltsModal" tabindex="-1" role="dialog" aria-labelledby="superboltsModalLabel">
            <div class="modal-dialog modal_width_1155" role="document">
                <div class="modal-content">
                    <div class="modal-body superboltsModal_body">
                        <div class="superbolts_top_txt back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                <span>Back</span></a>

                            <img class="superbolts_logo text-center" src="admin/assets/img/main/spb-logo-wide.svg"
                                alt="">
                        </div>
                        <div class="superbolts_text">
                            <div class="translation_missing_txt">
                                <h2 class="translation_missing_title">Whitelabel Reseller Solution</h2>
                                <p>Superbolts is a system that allows you to increase your recurring revenue by branding
                                    sanalpos.co as yours and selling it to your clients and visitors. Everything except
                                    support is managed automatically by our system. You just need to worry about helping
                                    your clients set up their checkout flows.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 superbolts_list_left">
                                <h5>Get started right now, and get:</h5>
                                <ul class="superbolts_list pl-0">
                                    <li><i class="fa fa-check"></i>Client seats in bulk</li>
                                    <li><i class="fa fa-check"></i>Hosted Signup Page</li>
                                    <li><i class="fa fa-check"></i>Automated Billing Plans (Stripe required)</li>
                                    <li><i class="fa fa-check"></i>Clients Management</li>
                                    <li><i class="fa fa-check"></i>Embed your own support widget or URL</li>
                                    <li><i class="fa fa-check"></i>Completely Whitelabel, clients log into their admin
                                        panel on your domain</li>
                                    <li><i class="fa fa-check"></i>Use Webhooks to integrate your other systems</li>
                                    <li><i class="fa fa-check"></i>Use client seats for your other businesses</li>
                                    <li><i class="fa fa-check"></i>Manage multiple accounts with a single login</li>
                                </ul>
                            </div>
                            <div class="col-md-4 superbolt_setting">
                                <div class="text-center">
                                    <h5>Just click the button below to start setting up your
                                        Superbolt!</h5>
                                    <div class="superbolt_setting_box">
                                        <img src="admin/assets/img/main/spb-logo-square-blue.svg" alt="">
                                        <h5 class="mb-1">Superbolts</h5>
                                        <p>10 seats for 50</p>
                                        <p>50 seats for 199</p>
                                        <p>100 seats for 299</p>
                                        <p>1000 seats for 1999</p>
                                        <div class="superbolt_get_started_btn">
                                            <button class="theme_btn dark_btn">Get Started</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="superbolt_note_txt">
                            <h5 class="mb-0">Notes:</h5>
                            <p>translation missing: en.whitelabel-note</p>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- superbolts Modal end-->
    </div>

    <p id="status"></p>

    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js') }}"></script>
    <script
        src="{{ asset('https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js') }}">
    </script>
    <script src="{{ asset('admin/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/js/dropzone.js') }}" />
    </script>
    <script src="{{ asset('admin/js/cropper.js') }}" />
    </script>
    <script src="{{ asset('admin/js/jqueryui.js') }}"></script>
    <script src="{{ asset('admin/js/selectize.js') }}"></script>
    <script src="{{ asset('admin/js/jqueryui.js') }}"></script>
    <script src="{{ asset('admin/js/ripple.js') }}"></script>

    <script src="{{ asset('admin/assets/js/sidebar.js') }}" />
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>

    <!-- <script src="{{ asset('admin/assets/js/imgecroper.js') }}" />
    </script> -->

    <script type="text/javascript">
    tinymce.init({
        selector: "textarea.tinymce_editor",
        height: 300,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

    tinymce.init({
        selector: "textarea.tinymce_editor",
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
                console.log(response);
                if(response["success"] != ""){
                $('.upload_image_area').append('<span class="product_selected_img" id="image_preview'+i+'" name="'+response["success"]+'"><img id="theImg" src="products/image/'+response["success"]+'" /><i class="fas fa-trash-alt remove_product_img" id="remove_img" data-toggle="modal" data-target="#deleteImageModal"   onClick="deleteImage('+i+')"></i></span>')
                product_image_arr.push(response["success"]);
                console.log("add image", product_image_arr);
                }
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
    @yield('scripts')
    <script>
    $("#profile_setting").click(function() {
        $(".profile_setting_box").show();
        $("#profile_setting").hide();
    })

    $(".profile_setting_close_btn, #edit_profile, #support_profile, #superbolt_text").click(function() {
        $(".profile_setting_box").hide();
        $("#profile_setting").show();
    })
    </script>
    <script>
    $(document).on('click', '[href="#"]', function(e) {
        e.preventDefault();
    })
    window.rippler = $.ripple('.ripple_btn', {
        debug: true,
        multi: true
    });
    </script>
    <script>
    setTimeout(function() {
        $(".alert").hide();
    }, 8000);
    </script>
     <script>
    $(document).ready(function(){
        console.log("hello");
        $.ajax({
            // headers: {

            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            // },
            url: "{{ url('ordercount') }}",
            type: "GET",
            success: function(res) {
                console.log(res);
                if(res['data']['status']== "1"){
                    var count = res['data']['data'].length;
                    $("#pending_order_count").show();
                    $("#pending_order_count").text(count);
                    console.log(count);
                }
                else{
                    $("#pending_order_count").hide();
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
        console.log("imag array---", product_image_arr.length);
        if(product_image_arr.length > 0){
            product_iamge = product_image_arr ;
        }
        else{
            product_iamge = [] ;
        }
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
            data: data + "&variation_one=" + variation_one+ "&variation_two=" + variation_two + "&product_image=" + product_iamge,
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
</body>

</html>