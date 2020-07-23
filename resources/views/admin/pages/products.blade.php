@extends('admin.layout.main') 
@section('content')

    <div class="container-fluid">
        <div class="top-bar">
            <div class="row align-items-center">
                <div class="col-lg-4 topbar_left pr-0">
                    <h3 class="topbar_title mb-0"><img class="topbar_title_icon"

                            src="{{ asset('admin/assets/img/products/icon-products.svg') }}" alt=""><span>Products &

                            Services</span></h3> </div>
                <div class="col-lg-8 topbar_right">
                    <div class="search_form">
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"><i class='fas fa-search'></i></span> </div>
                            <input class="form-control search_field" id="search" name="search" placeholder="Search" type="text"> </div>
                    </div>
                    <div class="topbar_btn">
                        <button class="theme_btn ripple_btn left_topbar_btn dark_btn product_type" id="add_product_btn" data-toggle="modal" data-target="#addProductModal">Add a Product</button>
                        <!-- <button class="theme_btn ripple_btn dark_btn" data-toggle="modal" data-target="#plugModal">Create

                            Plug</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="recommend_box d-none">
            <p class="big">How likely are you to recommend this platform to other merchants?</p>
            <div id="starrate" class="starrate " data-val="" data-max="5" data-toggle="tooltip" data-placement="top" title=""> <span class="ctrl"></span> <span class="cont m-1">

                    <i class="far fa-fw fa-star"></i>

                    <i class="far fa-fw fa-star"></i>

                    <i class="far fa-fw fa-star"></i>

                    <i class="far fa-fw fa-star"></i>

                    <i class="far fa-fw fa-star"></i>

                </span> </div>
            <div id="test"> </div>
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
                @php
                    date_default_timezone_set('Turkey');
                @endphp
                @if($products['status'] == "1") 

                @foreach ($products['data'] as $product)             
                
              
                    <tr class="product{{$product['id']}} add_all_product_list">
                        <td class="product_list_img_name">
                            <div class="product_list_img_name_inner"> @if((count( $product['product_image']) >0) && ( $product['product_image'][0] !="")) <img src="{{ asset('products/image/').'/'.$product['product_image'][0] }}" alt="" class="product_img">@else  <img src="{{ asset('admin/assets/img/products/placeholder-person.jpg')}}" alt="" class="product_img"> @endif <span class="product_name" data-toggle="modal" data-target=" #viewProductModal" onclick="viewProduct({{$product['id']}})">{{$product['product_name']}}</span> </div>
                        </td>
                        <td class="product_list_price"><span class="currency_symbol" id="product_currency">{{explode('-', $product['currency'])[0]}}</span><span class="product_price">{{$product['price']}}</span></td>
                        @if($product['total_order']>0)<td class="product_list_sale">{{$product['total_order']}}</td> @else <td class="product_list_sale">0</td> @endif
                        <td class="product_list_date">
                            <div class="datetime_layout">
                                <div class="datetime_txt">
                                    <p class="month_txt">{{ date('F', strtotime($product['created_at'])) }}</p>
                                    <p class="day_txt">{{ date('d', strtotime($product['created_at'])) }}</p>
                                </div>
                                <p class="datetime_separator"><span>at</span></p>
                                <div class="time_layout">
                                    <p><span class="hour_txt">{{ date('h', strtotime($product['created_at'])) }}</span> : <span class="hour_txt">{{ date('i', strtotime($product['created_at'])) }}<span></p>

                                </div>

                            </div>

                        </td>

                        @if($product['stock'] > 0)     

                            <td class="product_list_stock"><span class=''>{{$product['stock']}}</span></td>

                        @else    

                            <td class="product_list_stock "><span class='text-danger'>Out of Stock</span></td>

                        @endif

                        <td class="product_list_toggle">

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

                                   

                                    <a class=" dropdown-item text-danger deleteproduct" data-toggle="modal"

                                        data-target="#deleteProductModal" onclick="deleteProduct({{$product['id']}})" ">Remove</a>

                                </div>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                    @endif

                </tbody>

            </table>

        </div>

        <div class=" products_table_btm_txt">

            <p class="big">

            Got something to sell? Add more products and get way more sales!

            </p>

            <a href="" class="big create_product_type" id="add_product_btn" data-toggle="modal" data-target="#addProductModal">Add a

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
                                    <p class="modal_subtitle mb-5">Select the type of product that you wish to add </p>
                                </div>
                            </div>
                            <div class="row product_type_list">
                                <div class="col-md-4 product_type"  id="add_product_btn" data-toggle="modal" data-target="#addProductModal">
                                    <div class="product_type_inner text-center"> <img class="product_type_img" src="{{ asset('admin/assets/img/products/phyprod.svg') }}">
                                        <p class="product_type_title">Add a Physical Product</p>
                                        <p class="product_type_txt">You are selling physical products and getting paid with online and offline payment methods</p> <a class="product_type_link themecolor">Select</a> </div>
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
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body plugModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img class="back_btn_img" src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt=""> <span>Back</span></a>
                        </div>
                        <div class="col-md-10 text-center">
                            <h3 class="modal_title">What are you selling?</h3>
                            <p class="modal_subtitle mb-5">Select the type of product or service that you wish to sell </p>
                        </div>
                    </div>
                    <div class="row product_type_list">
                        <div class="col-md-4 product_type" id="choosephysiacalproduct" data-toggle="modal" data-target="#ChooseProductModal">
                            <div class="product_type_inner text-center"> <img class="product_type_img" src="{{ asset('admin/assets/img/products/phyprod.svg') }}">
                                <p class="product_type_title">Add a Physical Product</p>
                                <p class="product_type_txt">You are selling physical products and getting paid with online and offline payment methods</p> <a class="product_type_link themecolor">Select</a> </div>
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
    <div class="modal fade" id="ChooseProductModal" tabindex="-1" role="dialog" aria-labelledby="ChooseProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body ChooseProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img class="back_btn_img" src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt=""> <span>Back</span></a>
                        </div>
                        <div class="col-md-8 text-center">
                            <h3 class="modal_title">Choose Products</h3>
                            <p class="modal_subtitle mb-5">The products you choose will appear during checkout. You can add as many as you like.</p>
                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                            <input type="button" class="theme_btn ripple_btn dark_btn" id="choose_product_submit" value="Continue"> </div>
                    </div>
                    <div class="row product_type_list align-items-center"> <span class="choose_product_data"></span>
                        <div class="col-md-3 product_type  add_choose_product_box "
                        id="add_product_btn" data-toggle="modal" data-target="#addProductModal">
                            <div class="choose_product_inner text-center w-100"> <i class="fa fa-plus-square themecolor add_product_icon"></i>
                                <div class="add_choose_product_link"> <a class="themecolor">Add a Product</a> </div>
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
    <!-- Edit New product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body editProductModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img class="back_btn_img" src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt=""> <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">Edit Physical Product</h3>
                                <p class="modal_subtitle">Update your physical product by filling the fields below. </p>
                            </div>
                        </div>
                        <!--<div class="col-md-2 save_btn_txt text-right">-->
                        <!--    <button class="theme_btn ripple_btn dark_btn ">Save</button>-->
                        <!--</div>-->
                    </div>
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="add_product_form mt-3">
                                <form class="addproduct" id="editproduct" autocomplete="off">
                                    <div class="row">
                                        <input type="hidden" id="product_edit_id" name="product_edit_id">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Title<span>*</span></label>
                                                <input type="text" class="form-control form_field" placeholder="Enter your product title" id="edit_title" name="title"> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Category">Category</label>
                                                <select type="text" class="form-control form_field" name="category" id="edit_category"> @foreach ($productcategory['data'] as $cat)
                                                    <option value="{{$cat['id']}}"> {{$cat['category_name']}} </option> @endforeach </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Price<span>*</span></label>
                                            <div class="input-group mb-3" id="edit_product_price_error">
                                                <div class="input-group-prepend">
                                                    <select class="form-control form_field" id="edit_product_currency" name="product_currency">
                                                    <option value="د.إ-AED">AED</option>
                                                    <option value="Af-AFN">AFN</option>
                                                    <option value="L-ALL">ALL</option>
                                                    <option value="Դ-AMD">AMD</option>
                                                    <option value="Kz-AOA">AOA</option>
                                                    <option value="$-ARS">ARS</option>
                                                    <option value="$-AUD">AUD</option>
                                                    <option value="ƒ-AWG">AWG</option>
                                                    <option value="ман-AZN">AZN</option>
                                                    <option value="КМ-BAM">BAM</option>
                                                    <option value="$-BBD">BBD</option>
                                                    <option value="৳-BDT">BDT</option>
                                                    <option value="лв-BGN">BGN</option>
                                                    <option value="ب.د-BHD">BHD</option>
                                                    <option value="₣-BIF">BIF</option>
                                                    <option value="$-BMD">BMD</option>
                                                    <option value="$-BND">BND</option>
                                                    <option value="Bs.-BOB">BOB</option>
                                                    <option value="R$-BRL">BRL</option>
                                                    <option value="$-BSD">BSD</option>
                                                    <option value="P-BWP">BWP</option>
                                                    <option value="Br-BYN">BYN</option>
                                                    <option value="$-BZD">BZD</option>
                                                    <option value="$-CAD">CAD</option>
                                                    <option value="₣-CDF">CDF</option>
                                                    <option value="₣-CHF">CHF</option>
                                                    <option value="$-CLP">CLP</option>
                                                    <option value="¥-CNY">CNY</option>
                                                    <option value="$-COP">COP</option>
                                                    <option value="₡-CRC">CRC</option>
                                                    <option value="$-CUP">CUP</option>
                                                    <option value="$-CVE">CVE</option>
                                                    <option value="Kč-CZK">CZK</option>
                                                    <option value="₣-DJF">DJF</option>
                                                    <option value="kr-DKK">DKK</option>
                                                    <option value="$-DOP">DOP</option>
                                                    <option value="د.ج-DZD">DZD</option>
                                                    <option value="£-EGP">EGP</option>
                                                    <option value="Nfk-ERN">ERN</option>
                                                    <option value="€-EUR">EUR</option>
                                                    <option value="$-FJD">FJD</option>
                                                    <option value="£-FKP">FKP</option>
                                                    <option value="£-GBP">GBP</option>
                                                    <option value="ლ-GEL">GEL</option>
                                                    <option value="₵-GHS">GHS</option>
                                                    <option value="£-GIP">GIP</option>
                                                    <option value="D-GMD">GMD</option>
                                                    <option value="₣-GNF">GNF</option>
                                                    <option value="Q-GTQ">GTQ</option>
                                                    <option value="$-GYD">GYD</option>
                                                    <option value="$-HKD">HKD</option>
                                                    <option value="L-HNL">HNL</option>
                                                    <option value="Kn-HRK">HRK</option>
                                                    <option value="G-HTG">HTG</option>
                                                    <option value="Ft-HUF">HUF</option>
                                                    <option value="Rp-IDR">IDR</option>
                                                    <option value="₪-ILS">ILS</option>
                                                    <option value="₹-INR">INR</option>
                                                    <option value="ع.د-IQD">IQD</option>
                                                    <option value="﷼-IRR">IRR</option>
                                                    <option value="Kr-ISK">ISK</option>
                                                    <option value="$-JMD">JMD</option>
                                                    <option value="د.ا-JOD">JOD</option>
                                                    <option value="¥-JPY">JPY</option>
                                                    <option value="Sh-KES">KES</option>
                                                    <option value="៛-KHR">KHR</option>
                                                    <option value="₩-KPW">KPW</option>
                                                    <option value="₩-KRW">KRW</option>
                                                    <option value="د.ك-KWD">KWD</option>
                                                    <option value="$-KYD">KYD</option>
                                                    <option value="〒-KZT">KZT</option>
                                                    <option value="₭-LAK">LAK</option>
                                                    <option value="ل.ل-LBP">LBP</option>
                                                    <option value="Rs-LKR">LKR</option>
                                                    <option value="$-LRD">LRD</option>
                                                    <option value="L-LSL">LSL</option>
                                                    <option value="ل.د-LYD">LYD</option>
                                                    <option value="د.م.-MAD">MAD</option>
                                                    <option value="L-MDL">MDL</option>
                                                    <option value="ден-MKD">MKD</option>
                                                    <option value="K-MMK">MMK</option>
                                                    <option value="₮-MNT">MNT</option>
                                                    <option value="P-MOP">MOP</option>
                                                    <option value="UM-MRU">MRU</option>
                                                    <option value="₨-MUR">MUR</option>
                                                    <option value="ރ.-MVR">MVR</option>
                                                    <option value="MK-MWK">MWK</option>
                                                    <option value="$-MXN">MXN</option>
                                                    <option value="RM-MYR">MYR</option>
                                                    <option value="MTn-MZN">MZN</option>
                                                    <option value="$-NAD">NAD</option>
                                                    <option value="₦-NGN">NGN</option>
                                                    <option value="C$-NIO">NIO</option>
                                                    <option value="kr-NOK">NOK</option>
                                                    <option value="₨-NPR">NPR</option>
                                                    <option value="$-NZD">NZD</option>
                                                    <option value="ر.ع.-OMR">OMR</option>
                                                    <option value="B/.-PAB">PAB</option>
                                                    <option value="S/.-PEN">PEN</option>
                                                    <option value="K-PGK">PGK</option>
                                                    <option value="₱-PHP">PHP</option>
                                                    <option value="₨-PKR">PKR</option>
                                                    <option value="zł-PLN">PLN</option>
                                                    <option value="₲-PYG">PYG</option>
                                                    <option value="ر.ق-QAR">QAR</option>
                                                    <option value="L-RON">RON</option>
                                                    <option value="din-RSD">RSD</option>
                                                    <option value="р.-RUB">RUB</option>
                                                    <option value="₣-RWF">RWF</option>
                                                    <option value="ر.س-SAR">SAR</option>
                                                    <option value="$-SBD">SBD</option>
                                                    <option value="₨-SCR">SCR</option>
                                                    <option value="£-SDG">SDG</option>
                                                    <option value="kr-SEK">SEK</option>
                                                    <option value="$-SGD">SGD</option>
                                                    <option value="£-SHP">SHP</option>
                                                    <option value="Le-SLL">SLL</option>
                                                    <option value="Sh-SOS">SOS</option>
                                                    <option value="$-SRD">SRD</option>
                                                    <option value="Db-STN">STN</option>
                                                    <option value="ل.س-SYP">SYP</option>
                                                    <option value="L-SZL">SZL</option>
                                                    <option value="฿-THB">THB</option>
                                                    <option value="ЅМ-TJS">TJS</option>
                                                    <option value="m-TMT">TMT</option>
                                                    <option value="د.ت-TND">TND</option>
                                                    <option value="T$-TOP">TOP</option>
                                                    <option value="₺-TRY" >TRY</option>
                                                    <option value="$-TTD">TTD</option>
                                                    <option value="$-TWD">TWD</option>
                                                    <option value="Sh-TZS">TZS</option>
                                                    <option value="₴-UAH">UAH</option>
                                                    <option value="Sh-UGX">UGX</option>
                                                    <option value="$-USD">USD</option>
                                                    <option value="$-UYU">UYU</option>
                                                    <option value="Bs-VEF">VEF</option>
                                                    <option value="₫-VND">VND</option>
                                                    <option value="Vt-VUV">VUV</option>
                                                    <option value="T-WST">WST</option>
                                                    <option value="₣-XAF">XAF</option>
                                                    <option value="$-XCD">XCD</option>
                                                    <option value="₣-XPF">XPF</option>
                                                    <option value="﷼-YER">YER</option>
                                                    <option value="R-ZAR">ZAR</option>
                                                    <option value="ZK-ZMW">ZMW</option>
                                                    <option value="$-ZWL">ZWL</option>
                                                    </select>
                                                </div>
                                                <input type="number" class="form-control form_field" id="edit_product_price" name="product_price" placeholder="Enter a price"> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Order Limit</label>
                                                <input type="number" class="form-control form_field" name="order_limit" id="edit_order_limit" placeholder="Enter a limit (optional)"> </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="title">Stock<span>*</span></label>
                                            <input type="number" class="form-control form_field" name="product_stock" id="edit_product_stock" placeholder="Enter Stock">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Short Description</label>
                                                <input type="text" class="form-control form_field" placeholder="Short Description" id="edit_short_description" name="short_description"> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Long Description</label>
                                                <textarea id="edit_long_description" name="long_description" class="tinymce_editor"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form_images_upload">
                                                <label class="form_inner_label">Images</label>
                                                <p class="big">Product images are really important for customers to make a decision whether to buy or not. So pick photos that make your product shine.</p>
                                            </div> <span class="upload_image_area"></span>
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
                                                                id="edit_variation_option1" name="option1"
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
                                                                class="edit_variation1 edit_variation_select"
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
                                                                id="edit_variation_option2"
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
                                                                class="edit_variation2 edit_variation_select"
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
                                    <div class="row mt-4 product_payment_option">
                                            <div class="col-sm-12 form_images_upload"">
                                                <label class="form_inner_label">Select payment options </label>
                                                <p class="big pb-3">Payment options important for customers to purchase product.</p>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label class="paymnet_type_label w-100">
                                                    <input type="radio"  id="edit_paymnet_type1" name="paymnet_type"
                                                        value="Cash" />
                                                    <div class="payment_option_box text-center"> <div class="payment_option_box_img"><img class="product_cash_img"
                                                            src="{{ asset('admin/assets/img/dashboard/cashondelivery.svg') }}"
                                                            alt="Cash on delivery"> </div>
                                                        <p>Cash on delivery</p> <p href="" class="themecolor pt-0"
                                                            id="payment_select">select</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label class="paymnet_type_label w-100">
                                                    <input type="radio" id="edit_paymnet_type2" name="paymnet_type"
                                                        value="Payfull" />
                                                    <div class="payment_option_box text-center edit_payment_payfull_option_box"> 
                                                        <div class="payment_option_box_img"><img class="product_payfull_img" src="{{ asset('admin/assets/img/paymnetgetway/payfull.png')}}"
                                                            alt="Payfull"></div>
                                                        <p>Payfull</p> <p href="" class="themecolor pt-0"
                                                            id="payment_select">select</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    <div class="form_images_upload text-center mt-4">
                                        <p class="big">Once you are done, click save button below.</p>
                                        <input type="submit" id="update_product" class="theme_btn ripple_btn dark_btn product_submit_btn" value="Save"> </div>
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
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body deleteProductModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img class="back_btn_img" src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt=""> <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details text-center">
                        <div class="delete_product_img"> <img src="{{ asset('admin/assets/img/products/remove-icon.svg') }}" alt=""> </div>
                        <h3>Remove Product</h3>
                        <p class="big">Are you sure you want to remove this product ?</p>
                        <p class="text-danger">(This action cannot be reverted)</p>
                        <input type="hidden" id="delet_id" name="delet_id">
                        <div class="product_remove_btn">
                            <button class="theme_btn ripple_btn dark_btn w-100 ml-0" id="delet_product">Yes, remove it</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Delete product Modal end-->
    <!-- payment option Modal -->
    <div class="modal fade" id="paymentoptionModal" tabindex="-1" role="dialog" aria-labelledby="paymentoptionModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body paymentoptionModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt=""> <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">How will customers pay?</h3>
                                <p class="modal_subtitle mb-5">Select payment options </p>
                            </div>
                        </div>
                        <div class="col-md-2 save_btn_txt text-right">
                            <input type="button" class="theme_btn ripple_btn dark_btn" id="select_payment_submit" value="Finish"> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="paymnet_type_label">
                                <input type="radio" id="paymnet_type" name="paymnet_type" value="Cash on delivery" />
                                <div class="payment_option_box text-center"> <img src="{{ asset('admin/assets/img/dashboard/cashondelivery.svg') }}" alt="">
                                    <p>with Cash on delivery</p> <a href="" class="themecolor" id="payment_select">select</a> </div>
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
    <div class="modal fade" id="sellingProductModal" tabindex="-1" role="dialog" aria-labelledby="sellingProductModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body sellingProductModal_body">
                    <div class="row">
                        <div class="col-md-6 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img class="back_btn_img" src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt=""> <span>Back</span></a>
                        </div>
                        <div class="col-md-6 save_btn_txt text-right">
                            <div class="product_view_edit_btn">
                                <p class="text-success">Active</p>
                            </div>
                            <div class="dropdown product_view_droupdown">
                                <a class="dropdown-toggle" id="productDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu" aria-labelledby="productDropdownMenu"> <a class="dropdown-item" href="#">Delete</a> <a class="dropdown-item text-danger" data-toggle="modal" data-target="#">Archive</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout_details text-center">
                        <h3 class="modal_title">Selling <span id="selling_product_name"></span> with <span id="selling_payment"></span></h3>
                        <p class="checkout_page_txt">Checkout Page</p>
                        <p class="checkout_link_txt mb-0">
                            <a href="" id="checkout_link" target="_blank"></p>
                        <p class="checkout_clipboard_txt" data-clipboard-target="#checkout_link">Copy to Clipboard</p>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- selling product Modal end-->
@endsection 
@section('scripts')
    <script>
    $("#starrate").click(function() {
        $(".rating_area_inner").show();
    })
    var valueHover = 0;

    function calcSliderPos(e, maxV) {
        return(e.offsetX / e.target.clientWidth) * parseInt(maxV, 10);
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
        if(!full) {
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
    <script>
    $(".product_type, .create_product_type").click(function() {
        $('.upload_image_area, .edit_variation_upload_image_area, .variation_image_area').empty();
        product_image_arr = [];
    });
    $("#choosephysiacalproduct").click(function() {
        $.ajax({
            url: "{{ url('product_list') }}",
            type: "GET",
            success: function(res) {
                // console.log(res);
                res = res['success']['data'];
                for(var j = 0; j < res.length; j++) {
                    $(".product_type_list").prepend('<div class="col-md-3 product_type choose_product_box mb-4"> <label class="choose_product_box_label w-100"><input type="radio" id="choose_product_name" name="choose_product_name" value="' + res[j]['id'] + '" /><div class="choose_product_inner text-center"><div class="choose_product_type_image"><i class="fa fa-star"></i></div><p class="choose_product_type_title">' + res[j]['product_name'] + '</p><p class="choose_product_type_price"><span class="currency_symbol">'+res[j]['currency'].split('-')[0]+'</span><span class="product_price">' + res[j]['price'] + '</span></p><a class="product_type_link themecolor">Select</a></div></label></div>');
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    });
    var choose_product_id;
    $("#choose_product_submit").click(function() {
        var radioValue = $("input[name='choose_product_name']:checked");
        if(radioValue.length == 0) {
            $("#status").html('<div class="alert alert-danger"><strong> Select a product</strong></div>');
            setTimeout(function() {
                $(".alert").css("display", "none");
            }, 3000);
            return false;
        } else {
            choose_product_id = $("input[name='choose_product_name']:checked").val();
            $("#paymentoptionModal").modal('show');
        }
    });
    var paymnet_type;
    $("#select_payment_submit").click(function() {
        var radioValue = $("input[name='paymnet_type']:checked");
        if(radioValue.length == 0) {
            $("#status").html('<div class="alert alert-danger"><strong> Select a Paymnet</strong></div>');
            setTimeout(function() {
                $(".alert").css("display", "none");
            }, 3000);
            return false;
        } else {
            paymnet_type = $("input[name='paymnet_type']:checked").val();
            $("#plugModal, #ChooseProductModal, #paymentoptionModal").modal('hide');
            // $("#sellingProductModal").modal('show');
            // $.ajax({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     url: "{{ url('checkout_link') }}",
            //     type: "POST",
            //     data: "choose_product_id=" + choose_product_id+ "&paymnet_type=" + paymnet_type,
            //     success: function(res) {
            //         console.log(res);
            //         if(res['payment_type']== "Cash on delivery"){
            //             var payment = "Cash";
            //         }
            //         $("#sellingProductModal #selling_product_name").text(res['product_name']);
            //         $("#checkout_link").text(res['checkout_link']);
            //         $("#selling_payment").text(payment);
            //         $("#checkout_link").attr("href", res['checkout_link']);
            //     },
            //     error: function(jqXHR, textStatus, errorMessage) {
            //         console.log(errorMessage); // Optional
            //     }
            // });
        }
    });
    </script>

    <script>
    // <!-- edit product -->       
    function editProduct(id) {
        console.log("EditProduct Id", id);
        $.ajax({
            url: "{{ url('userdetail') }}",
            type: "GET",
            success: function(res) {
                var res = res['data']['success'];
                if ((res['merchant_name'] == null || res['merchant_name']=='') && (res['merchant_password'] == null || res['merchant_password']=='')) {
                    $('#edit_paymnet_type2').attr( "disabled", "disabled" );
                    $('.edit_payment_payfull_option_box').css( "cursor", "no-drop" );
                    $('.edit_payment_payfull_option_box').click(function() {
                        $("#status").html(
                            '<div class="alert alert-danger"><strong>Fail!</strong> Please Add Merchant Details.</div>'
                        );
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
                    });
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
        $("#editproduct")[0].reset();
        $("#editproduct input[name='paymnet_type']").removeAttr("class");
        tinymce.get("edit_long_description").setContent("");
        $('.upload_image_area, .edit_variation_upload_image_area, .variation_image_area').empty();
        $("#edit_variations_table > tbody").empty();
        $('#edit_variation1').selectize()[0].selectize.destroy();
        $('#edit_variation2').selectize()[0].selectize.destroy();
        $("#editproduct #opt_label1").text("Option1");
        $("#editproduct #opt_label2").text("Option2");        

        $("#edit_add_variation").click(function() {
            $(".product_variations_form").show();
            $("#edit_add_variation").hide();
        })
        $(".product_variations_form #edit_variation_option1").on('input', function() {          
            var opt1 = $(this).val();
            $(".product_variations_form #opt_label1").html(opt1);          
        });
        $(".product_variations_form #edit_variation_option2").on('input', function() {
            var opt2 = $(this).val();
            $(".product_variations_form #opt_label2").html(opt2);            
        });
        variation1_arr = [];
        variation2_arr = [];
        variation_id = id;
        $('.edit_variation_select').selectize({
            plugins: ['drag_drop'],
            delimiter: ',',
            persist: false,
            create: true,
            onChange: function(value) {               
                var str1= $('#edit_variation1').val();
                var str2 = $('#edit_variation2').val();
                // console.log("combos1", str1);
                // console.log("combos2", str2);
                variation1_arr = str1.split(",");
                variation2_arr = str2.split(",");
                
                variation_array = []

                for (var i = 0; i < variation1_arr.length; i++) {
                    for (var j = 0; j < variation2_arr.length; j++) {
                        variation_array.push([variation1_arr[i], variation2_arr[j]]);
                        $("#edit_variations_table > tbody").empty();
                        for (var k = 0; k < variation_array.length; k++) {                           
                            $("#edit_variations_table > tbody").append(
                                "<tr class='variation_row_"+k+"'><td><div class='variation_image' id='tableDropzone_"+k+"'  data-toggle='modal' data-target=' #variationimageModal'  onClick = 'variation_image_id("+k+")'><input type='hidden' id='variation_image_path' name='variation_image_path" + k + "'><img src='{{url('admin/assets/img/products/addimg.svg')}}' id='"+k+"'></div></td><td>" +
                                variation_array[k][0] + "</td><td>" +
                                variation_array[k][1] +
                                "</td><td><input type='number' name='price"+k+"' id='price"+k+"' class='form-control price_width' placeholder='Enter a price'></td><td><input type='number' name='stock"+k+"' id='stock"+k+"' class='form-control stock_width stock_field' placeholder='Enter stock'></td></tr>"
                            );
                            // console.log(variation_array[k]);
                        }
                    }
                }              

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('getvariationtable') }}/" + variation_id,
                    type: "POST",
                    data: id,
                    success: function(response) {
                        console.log("Get variation table---",response);
                        // dispaly product variation table
                        if(response['data']['status'] == "1"){   
                            var res = response['data']['data'];
                            $("#editproduct .price_width").val(null);

                            for (var i = 0; i < res.length; i++) {
                                $("#editproduct #price"+i).val(res[i]['price']);
                                $("#editproduct #stock"+i).val(res[i]['stock']);  

                                if(res[i]['image_path'] == "" || res[i]['image_path'] == null){
                                $("#editproduct #tableDropzone_"+i+" img").attr("src","{{url('admin/assets/img/products/addimg.svg')}}");         
                                }
                                else {
                                    $("#editproduct #tableDropzone_"+i+" img").attr("src","{{url('products/image')}}/"+res[i]['image_path']); 
                                    $("#editproduct #tableDropzone_"+i+" #variation_image_path").val(res[i]['image_path']); 
                                }        
                            }
                        }
                    },
                    error: function(jqXHR, textStatus, errorMessage) {
                        console.log(errorMessage); // Optional
                    }
                });
            }
        });
        

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('getproduct') }}/" + id,
            type: "POST",
            data: id,
            success: function(response) {
                console.log("Get Edit product data---",response);
                if(response['data']['product']['status'] == "1") {
                   
                    var res = response['data']['product']['data'][0];
                    $("#editproduct input[name='paymnet_type']").addClass("payment_type_"+res['id']);
                    $("#editproduct #product_edit_id").val(res['id']);
                    $("#editproduct #edit_title").val(res['product_name']);
                    $("#editproduct #edit_category option[value=" + res['category_id'] + "]").attr('selected', 'selected');
                    $("#editproduct #edit_product_price").val(res['price']);
                    $("#editproduct #edit_order_limit").val(res['order_limit']);
                    $("#editproduct #edit_product_stock").val(res['stock']);
                    $("#editproduct #edit_short_description").val(res['short_desc']);
                    $("#editproduct .payment_type_"+ res['id'] +"[value="+res['payment_type']+"]").attr("checked", "checked");

                    $('#editproduct #edit_product_currency').val(res['currency']).attr("selected", "selected");
                    if(res['long_desc'] != null && res['long_desc'].length > 0) {
                        tinymce.get("edit_long_description").setContent(res['long_desc']);
                    }
                }
                if(response['data']['productimage']['status'] == "1") {
                    var res = response['data']['productimage']['data'];
                    for(var i = 0; i < res.length; i++) {
                        
                        if(res[i]["image_path"] != "") {
                            $('.upload_image_area').append('<span class="product_selected_img" id="image_preview' + res[i]["id"] + '" name="'+res[i]["image_path"]+'"><img id="theImg" src="products/image/' + res[i]["image_path"] + '" /><i class="fas fa-trash-alt remove_product_img" id="remove_img" data-toggle="modal" data-target="#deleteImageModal"  onClick="deletepProductImage(' + res[i]["id"] + ')"></i></span>');

                            $('.edit_variation_upload_image_area').append('<span class="product_selected_img" id="image_preview' + res[i]["id"] + '" name="'+res[i]["image_path"]+'"  onClick = "imagename('+res[i]["id"]+')"><img id="theImg" src="products/image/' + res[i]["image_path"] + '" /></span>');
                        }
                    }
                }
                
                
                // dispaly product variation option 
                if(response['data']['viewoption']['status'] == "1"){                                     
                    $("#edit_add_variation").hide();
                    $(".product_variations_form").show();
                    var res = response['data']['viewoption']['data'];                   
                    $("#editproduct #edit_variation_option1").val(res[0]['variation_option_name']);
                    $("#editproduct #edit_variation_option2").val(res[1]['variation_option_name']);
                    $("#editproduct #opt_label1").text(res[0]['variation_option_name']);
                    $("#editproduct #opt_label2").text(res[1]['variation_option_name']);                  

                    //  set value of option 1
                    var variation_option1_arr = res[0]['variation_option_value'];
                    var $select = $('#edit_variation1').selectize();
                    var selectize = $select[0].selectize;
                    var variation_option1_data= [];
                    var variation_option1_val= [];
                        for(var j = 0; j < variation_option1_arr.length; j++){
                            variation_option1_data.push({text:variation_option1_arr[j], value: variation_option1_arr[j]});
                            variation_option1_val.push(variation_option1_arr[j]);                            
                        }                
                        selectize.addOption(variation_option1_data);
                        selectize.setValue(variation_option1_val); 
                    
                    //  set value of option 2
                    var variation_option2_arr = res[1]['variation_option_value'];
                    var $select = $('#edit_variation2').selectize();
                    var selectize = $select[0].selectize;
                    var variation_option2_data= [];
                    var variation_option2_val= [];
                        for(var k = 0; k < variation_option2_arr.length; k++){
                            variation_option2_data.push({text:variation_option2_arr[k], value: variation_option2_arr[k]});
                            variation_option2_val.push(variation_option2_arr[k]);                            
                        }
                        selectize.addOption(variation_option2_data);
                        selectize.setValue(variation_option2_val); 
                }
                else{
                    $("#edit_add_variation").show();
                    $(".product_variations_form").hide(); 
                    $('#edit_variation1').selectize()[0].selectize.clear();
                    $('#edit_variation2').selectize()[0].selectize.clear(); 
                    $("#edit_variations_table > tbody").empty();
                    
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
        var long_desc = tinymce.get("edit_long_description").getContent();
        var paymnet_type = $("input[name='paymnet_type']:checked").val();
        var variation_one = $('#edit_variation1').val();
        var variation_two = $('#edit_variation2').val();
        console.log("variation", variation_one, variation_two);
        if(product_image_arr.length > 0) {
            product_iamge = product_image_arr;
        } else {
            product_iamge = [];
        }
        if ($('#edit_variation1').val() != "" || $('#edit_variation2').val() != "") {
            $(".error").remove();
            if ($("input.stock_field").val() == "") { 
                console.log("field is required");             
                $(".stock_field").after("<span class='error'> field is required</span>");       
                // $("#status").html('<div class="alert alert-danger"><strong>Error!</strong> Product Stock is required.</div>');
                //         setTimeout(function() {
                //             $(".alert").css("display", "none");
                //         }, 3000);
                return false;        
            }           
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('editproduct') }}/" + edit_id,
            type: "POST",
            data: data + "&product_image=" + product_iamge + "&long_desc=" + long_desc+ "&paymnettype=" + paymnet_type+ "&variation_one=" + variation_one + "&variation_two=" +
                variation_two,
            success: function(res) {
                console.log("upadte product res---", res);
                if($.isEmptyObject(res.data.error)) {
                    if(res['data']['message'] == "success") {
                        $("#editproduct")[0].reset();
                        var res = res['data']['data'][0];
                        $(".product" + edit_id + " .product_name").text(res['product_name']);
                        $(".product" + edit_id + " .product_price").text(res['price']);
                        $(".product" + edit_id + " #product_currency").text(res['currency'].split('-')[0]);
                        console.log("product_image", res['product_image'].length);
                        if((res['product_image'].length >0) && (res['product_image'][0] !="")){
                                var img_path = '{{ asset("products/image")}}/'+res['product_image'][0];
                        }
                        else{
                            var img_path = '{{ asset("admin/assets/img/products/placeholder-person.jpg")}}';
                        }
                        if(res['stock']>0){
                            var stock = "<span class=''>"+res['stock']+"</span>";
                        }
                        else{
                            var stock = "<span class='text-danger'>Out of Stock</span>";
                        }
                        $(".product" + edit_id + " .product_list_stock").html(stock);

                        $(".product" + edit_id + " .product_img").attr("src", img_path);
                        $("#editProductModal").modal('hide');
                        $("#status").html('<div class="alert alert-success"><strong>Success!</strong> Product Updated Successfully.</div>');
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
                        $(".error").remove();
                        product_image_arr = [];
                    } else {
                        $("#status").html(
                            '<div class="alert alert-danger"><strong>Fail!</strong> Something is wrong.</div>'
                        );
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
                    }
                    
                } else {
                    $(".error").remove();
                    if(res.data.error.product_name) {
                        $("#edit_title").after('<span class="error">' + res.data.error.product_name + '</span>');
                    }
                    if(res.data.error.price) {
                        $("#edit_product_price_error").after('<span class="error">' + res.data.error.price + '</span>');
                    }
                    if(res.data.error.stock) {
                        $("#edit_product_stock").after('<span class="error">' + res.data.error.stock + '</span>');
                    }
                    if(res.data.error.short_desc) {
                        $("#edit_short_description").after('<span class="error">' + res.data.error.short_desc + '</span>');
                    }
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    });

    // delete edit modal product image
    var delete_img_id;

    function deletepProductImage(id) {
        $("#delet_image").click(function() {
            console.log(id);
            var image_name = $("#image_preview"+id).attr('name')
            var image_url = "{{url('/products/image')}}/"+image_name;
            console.log(image_name);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('delete_product_image') }}/" + id,
                type: "POST",
                data: {
                    id: id,
                    image_name: image_name,
                },
                success: function(res) {
                    console.log("Delete Product Image---", res);
                    if(res['data']['message'] == "success") {
                        $("span #image_preview" + id).hide();
                        $("span #image_preview" + id).css("display", "none");
                        $(".variation_image img[src='"+image_url+"']").attr("src", "admin/assets/img/products/addimg.svg");
                        $(".variation_image #variation_image_path[value='"+image_name+"']").val("");
                        $("#deleteImageModal").modal('hide');
                        $("#status").html('<div class="alert alert-success"><strong>Success! </strong>Image delete Successfully.</div>');
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
                    }
                    else {
                    $("#status").html(
                            '<div class="alert alert-danger"><strong>Fail!</strong> Something is wrong.</div>'
                        );
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
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
                console.log("Delete Product---",res);
                if(res['data']['message'] == "success") {
                    $("#status").html('<div class="alert alert-success"><strong>Success!</strong> Product Delete Successfully.</div>');
                    setTimeout(function() {
                        $(".alert").css("display", "none");
                    }, 3000);
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
$("#search").keyup(function() {
    var data = $("#search").val();
    console.log(data.length);
    if(data.length >0){
        $(".add_all_product_list").hide();
   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('product_serach_data') }}" ,
            type: "POST",
            data: {
                    search: data
            },
            success: function(res) {
                console.log("Serach Product res---",res);
                $(".add_all_product_list").hide();
                $(".search_product_list").hide()
                if (res['data']['message'] == "success") {
                    var res = res['data']['data'];
                    for(var i=0; i<res.length; i++ ){
                        // var date = moment.utc(res[i]['created_at']);
                        var date1 = moment.utc(res[i]['created_at']);
                        var date = date1.clone().tz("Turkey");
                        // console.log((res[i]['product_image'].split(","))[0]);
                        if(res[i]['stock']>0){
                            var stock = "<span class=''>"+res[i]['stock']+"</span>";
                        }
                        else{
                            var stock = "<span class='text-danger'>Out of Stock</span>";
                        }
                        if((res[i]['product_image'].length >0) && (res[i]['product_image'][0] !="")){
                            var img_path = '{{ asset("products/image")}}/'+res[i]['product_image'][0];
                        }
                        else{
                            var img_path = '{{ asset("admin/assets/img/products/placeholder-person.jpg")}}';
                        }
                        $("#add_product_list").append('<tr class="product'+res[i]['id']+' add_all_product_list search_product_list"><td class="product_list_img_name"><div class="product_list_img_name_inner"><img src="'+img_path+'" alt="" class="product_img"><span class="product_name" data-toggle="modal" data-target=" #viewProductModal" onclick="viewProduct('+res[i]['id']+')">'+res[i]['product_name']+'</span> </div></td> <td class="product_list_price"><span class="currency_symbol">'+res[i]['currency'].split('-')[0]+'</span><span class="product_price">'+res[i]['price']+'</span></td><td class="product_list_sale">'+res[i]['total_order']+'</td><td class="product_list_date"><div class="datetime_layout"><div class="datetime_txt"><p class="month_txt">'+date.format('MMMM')+'</p><p class="day_txt">'+date.format('DD')+'</p></div><p class="datetime_separator"><span>at</span></p><div class="time_layout"><p><span class="hour_txt">'+date.format('h')+'</span> : <span class="hour_txt">'+date.format('mm')+'<span></p></div></div></td><td class="product_list_stock">'+stock+'</td><td class="product_list_toggle"><div class="dropdown"><a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="toggle_droupdown" src="{{ asset("admin/assets/img/products/menu-icon.svg") }}"></a><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" data-toggle="modal" data-target=" #viewProductModal" onclick="viewProduct('+res[i]['id']+')">View Product</a><a class="dropdown-item" data-toggle="modal" data-target="#editProductModal" data-id="'+res[i]['id']+'" onclick="editProduct('+res[i]['id']+')">Edit</a><a class=" dropdown-item text-danger deleteproduct" data-toggle="modal" data-target="#deleteProductModal" onclick="deleteProduct('+res[i]['id']+')" ">Remove</a></div></div></td></tr>');
                    }
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        
        });
    }
    else{
        $(".add_all_product_list").show();
        $(".search_product_list").hide()
    }
});
</script>
@endsection