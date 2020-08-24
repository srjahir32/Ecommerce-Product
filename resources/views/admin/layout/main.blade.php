<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <title>Ecommerce Product</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{url('admin/assets/img/fav.png')}}">

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

    <style>

    </style>

</head>



<body>



    <div class="page-wrapper chiller-theme toggled">



        @include('admin.include.sidebar')

        <main class="page-content">
            


            @yield('content')



        </main>




        <!-- Customer Details Modal -->
        <div class="modal fade" id="customerDetailModal" tabindex="-1" role="dialog"
            aria-labelledby="customerDetailModalLabel">
            <div class="modal-dialog modal_width_1155" role="document">
                <div class="modal-content">
                    <div class="modal-body customerDetailModal_body">
                        <div class="row">
                            <div class="col-md-2 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="{{ asset('admin/assets/img/orders/back-arrow.svg') }}"
                                        alt="">
                                    <span>Back</span></a>
                            </div>
                            <div class="col-md-8">
                                <div class="text-center">
                                    <h3 class="modal_title">Customer Details</h3>
                                </div>

                            </div>
                            <div class="col-md-2 save_btn_txt text-right">
                                <div class="dropdown product_view_droupdown">
                                    <a class="dropdown-toggle" id="productDropdownMenu" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="productDropdownMenu">
                                        <a class="dropdown-item " data-toggle="modal"
                                            data-target="#requestDataModal">Request Data</a>
                                        <a class="dropdown-item text-danger" data-toggle="modal"
                                            data-target="#removeCustomerModal">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row customer_details_content">
                            <div class="col-md-6">
                                <img class="customer_image" src="{{ asset('admin/assets/img/orders/person-icon.svg') }}"
                                    alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-6 customer_details_inner">
                                        <div class="customer_details_txt">
                                            <label>Name</label>
                                            <p id="customer_name">testing</p>
                                        </div>
                                        <div class="customer_details_txt">
                                            <label>Email</label>
                                            <p id="customer_email">puja</b></p>
                                        </div>

                                        <div class="customer_details_txt">
                                            <label>Country</label>
                                            <p id="customer_country">test@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 customer_details_inner">
                                        <div class="customer_details_txt">
                                            <label>Address</label>
                                            <p id="customer_address">testing</p>
                                        </div>
                                        <div class="customer_details_txt">
                                            <label>Lifetime Value</label>
                                            <p><span class="currency_symbol" id="currency_lifeline"></span><span
                                                    id="customer_lifetime"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="view_product_tab">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><svg
                                            height="18" viewBox="0 0 10.18 18" width="10.18"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8,10.9c-2.27-.59-3-1.2-3-2.15,0-1.09,1.01-1.85,2.7-1.85,1.78,0,2.44.85,2.5,2.1h2.21A3.986,3.986,0,0,0,13,5.19V3H10V5.16c-1.94.42-3.5,1.68-3.5,3.61,0,2.31,1.91,3.46,4.7,4.13,2.5.6,3,1.48,3,2.41,0,.69-.49,1.79-2.7,1.79-2.06,0-2.87-.92-2.98-2.1H6.32c.12,2.19,1.76,3.42,3.68,3.83V21h3V18.85c1.95-.37,3.5-1.5,3.5-3.55C16.5,12.46,14.07,11.49,11.8,10.9Z"
                                                transform="translate(-6.32 -3)"></path>
                                        </svg> Purchases</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false"><svg height="24" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z">
                                            </path>
                                        </svg> Subscriptions</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact"
                                        aria-selected="false"><svg height="16" viewBox="0 0 20 16" width="20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20,4H4A1.985,1.985,0,0,0,2.01,6L2,18a1.993,1.993,0,0,0,2,2H20a1.993,1.993,0,0,0,2-2V6A1.993,1.993,0,0,0,20,4Zm0,14H4V12H20ZM20,8H4V6H20Z"
                                                transform="translate(-2 -4)"></path>
                                        </svg> Trials</a>
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
                                <div class="tab-pane fade show active p-0 " id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <table class="products_table pending_order_table table text-left">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Total Amount</th>
                                                <th>Payment Method</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="customerorder_detail"><tbody>
                                    </table>
                                    <div class="pt-5 event_tab_btm_content">
                                        <p class="big">Got something to sell? Add some sales channels to your
                                            business!</p>
                                        <a href="" class="big themecolor create_product_type" id="add_product_btn" data-toggle="modal"
                                            data-target="#addProductModal">Add a Product</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <p class="big">Create discounts, coupons and vouchers for your products.</p>
                                    <a href="" class="big themecolor">Add Discount</a>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <p class="big">Got something to sell? Add some sales channels to your
                                        business!</p>
                                    <a href="" class="big themecolor">Add a Product</a>
                                </div>
                                <div class="tab-pane event_tab_content fade" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
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
                                                <td scope="col" id="opt_label1">Order 5841y has been placed</td>
                                                <td scope="col" id="opt_label2">
                                                <td>
                                                    <div class="datetime_layout">
                                                        <div class="datetime_txt">
                                                            <p class="month_txt">MAY</p>
                                                            <p class="day_txt">16</p>
                                                        </div>
                                                        <p class="datetime_separator"><span>at</span></p>
                                                        <div class="time_layout">
                                                            <p><span class="hour_txt">10</span> : <span
                                                                    class="hour_txt">10<span></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="event_tab_btm_content">
                                        <p class="big">Got something to sell? Add a product!</p>
                                        <a class="big themecolor create_product_type" id="add_product_btn" data-toggle="modal" data-target="#addProductModal">Add
                                            a Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal-content -->
                </div>
                <!-- modal-dialog -->
            </div>
        </div>
        <!-- Customer Details Modal end-->
        <!-- Add New product Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel">

            <div class="modal-dialog modal_width_1155" role="document">

                <div class="modal-content">

                    <div class="modal-body addProductModal_body">

                        <div class="row">

                            <div class="col-md-2 back_btn_txt">

                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img"
                                        src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt="">

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

                                                        <select class="form-control form_field" id="product_currency"
                                                            name="product_currency">
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
                                                            <option value="₺-TRY" selected="selected">TRY</option>
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

                                                    <input type="number" class="form-control form_field"
                                                        id="product_price" name="product_price"
                                                        placeholder="Enter a price">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-sm-6">

                                                <div class="form-group">

                                                    <label for="title">Order Limit</label>

                                                    <input type="number" class="form-control form_field"
                                                        name="order_limit" id="order_limit"
                                                        placeholder="Enter a limit (optional)">

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <label for="title">Stock<span>*</span></label>

                                                <input type="number" class="form-control form_field" name="product_stock"
                                                    id="product_stock" placeholder="Enter Stock"></div>

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

                                                    <textarea id="long_description" name="long_description"
                                                        class="tinymce_editor"></textarea>

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

                                        <div class="row mt-4">

                                            <div class="col-sm-12">

                                                <div class="form_images_upload">

                                                    <label class="form_inner_label">Variations</label>

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

                                                                <input type="text" class="form-control form_field"
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
                                                                    id="option2" placeholder="Enter a label"
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

                                                                    <th scope="col" id="variation_opt_label1">

                                                                        Option 1

                                                                    </th>

                                                                    <th scope="col" id="variation_opt_label2">

                                                                        Option 2

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

                                        <div class="row mt-4 product_payment_option">
                                            <div class="col-sm-12 form_images_upload"">
                                                <label class=" form_inner_label">Select payment options </label>
                                                <p class="big pb-3">Payment options important for customers to purchase
                                                    product.</p>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label class="paymnet_type_label w-100">
                                                    <input type="radio" id="paymnet_type1" name="paymnet_type"
                                                        value="Cash" checked="checked" />
                                                    <div class="payment_option_box text-center">
                                                        <div class="payment_option_box_img"><img
                                                                class="product_cash_img"
                                                                src="{{ asset('admin/assets/img/dashboard/cashondelivery.svg') }}"
                                                                alt="Cash on delivery"> </div>
                                                        <p>Cash on delivery</p>
                                                        <p href="" class="themecolor pt-0" id="payment_select">select
                                                        </p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label class="paymnet_type_label w-100">
                                                    <input type="radio" id="paymnet_type2" name="paymnet_type"
                                                        value="Payfull" />
                                                    <div
                                                        class="payment_option_box text-center payment_payfull_option_box">
                                                        <div class="payment_option_box_img"><img
                                                                class="product_payfull_img"
                                                                src="{{ asset('admin/assets/img/paymnetgetway/payfull.png')}}"
                                                                alt="Payfull"></div>
                                                        <p>Payfull</p>
                                                        <p href="" class="themecolor pt-0" id="payment_select">select
                                                        </p>
                                                    </div>
                                                </label>
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

                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img"
                                        src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt="">

                                    <span>Back</span></a>

                            </div>

                            <div class="col-md-7">

                                <div class="text-center">

                                    <h3 class="modal_title">Product Details</h3>

                                </div>



                            </div>

                            <!--<div class="col-md-3 save_btn_txt text-right">-->

                            <!--    <div class="product_view_edit_btn"><button-->

                            <!--            class="theme_btn ripple_btn" data-toggle="modal"-->

                            <!--            data-target="#editProductModal"><i class="fa fa-pencil"></i>-->

                            <!--            Edit</button></div>-->

                            <!--    <div class="dropdown product_view_droupdown">-->

                            <!--        <a class="dropdown-toggle" id="productDropdownMenu"-->

                            <!--            data-toggle="dropdown" aria-haspopup="true"-->

                            <!--            aria-expanded="false">-->

                            <!--            <i class="fas fa-ellipsis-v"></i></a>-->

                            <!--        <div class="dropdown-menu"-->

                            <!--            aria-labelledby="productDropdownMenu">-->

                            <!--            <a class="dropdown-item text-danger" data-toggle="modal"-->

                            <!--                data-target="#deleteProductModal">Remove</a>-->

                            <!--        </div>-->

                            <!--    </div>-->

                            <!--</div>-->

                        </div>

                        <div class="view_product_details">

                            <div class="view_product_name">

                                <p class="big"><img
                                        src="{{ asset('admin/assets/img/products/icon-products-side.svg') }}"
                                        alt=""><span id="product_name"></span></p>

                            </div>

                            <div class="row view_product_detail_inner">

                                <div class="col-md-4 col-sm-6 ">

                                    <div class="view_product_detail_txt">

                                        <label>Category</label>

                                        <p id="product_category"></p>

                                    </div>

                                    <div class="view_product_detail_txt">

                                        <label>Price</label>

                                        <p><span class="view_product_currency_symbol"><b
                                                    id="view_product_currency"></b></span><b id="product_price"></b>

                                        </p>

                                    </div>

                                </div>

                                <div class="col-md-4 col-sm-6 ">

                                    <div class="view_product_detail_txt">

                                        <label>Variations</label>

                                        <p id="product_variation">0 variants</p>

                                    </div>

                                    <div class="view_product_detail_txt">

                                        <label>Availability</label>

                                        <p id="product_avalibility"></p>

                                    </div>

                                </div>

                                <!-- <div class="col-md-4 col-sm-6 ">

                                    <div class="view_product_detail_txt">

                                        <label>Brand</label>

                                        <p id="product_brand">N/A</p>

                                    </div>

                                    <div class="view_product_detail_txt">

                                        <label>Model</label>

                                        <p id="product_model">N/A</p>

                                    </div>

                                </div> -->

                                <div class="col-md-4 col-sm-6 ">

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

                        <div class="checkout_details text-center">



                            <p class="checkout_page_txt">Checkout Page</p>

                            <p class="checkout_link_txt mb-0"><a href="" id="product_link"
                                    target="_blank">{{ url('/') }}/l/<span id="product_checkout_link"></span></p>



                        </div>

                        <div class="view_product_tab d-none">

                            <nav>

                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><svg
                                            height="16" viewBox="0 0 20 16" width="20"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path
                                                d="M20,4H4A1.985,1.985,0,0,0,2.01,6L2,18a1.993,1.993,0,0,0,2,2H20a1.993,1.993,0,0,0,2-2V6A1.993,1.993,0,0,0,20,4Zm0,14H4V12H20ZM20,8H4V6H20Z"
                                                transform="translate(-2 -4)"></path>

                                        </svg> Plugs</a>

                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false"><svg height="24" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path
                                                d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z">

                                            </path>

                                        </svg> Discounts</a>

                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact"
                                        aria-selected="false"><svg height="18" viewBox="0 0 10.18 18" width="10.18"
                                            xmlns="http://www.w3.org/2000/svg">

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

                                <div class="tab-pane event_tab_content fade" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">

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

                                                <td scope="col" id="opt_label1"><span id="product_name">test</span> has
                                                    been

                                                    created</td>

                                                <td scope="col" id="opt_label2">

                                                    <div class="datetime_layout">

                                                        <div class="datetime_txt">

                                                            <p class="month_txt" id="product_month">

                                                            </p>

                                                            <p class="day_txt" id="product_day">

                                                            </p>

                                                        </div>

                                                        <p class="datetime_separator">
                                                            <span>at</span></p>

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

                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img"
                                        src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt="">

                                    <span>Back</span></a>

                            </div>

                        </div>

                        <div class="delete_product_details text-center">

                            <div class="delete_product_img">

                                <img src="{{ asset('admin/assets/img/products/remove-icon.svg') }}" alt="">

                            </div>

                            <h3>Remove Image</h3>

                            <p class="big">Are you sure you want to remove the image?</p>

                            <p class="text-danger">(This action cannot be reverted)</p>

                            <input type="hidden" id="delet_id" name="delet_id">

                            <div class="product_remove_btn">

                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0" id="delet_image">Yes, remove

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


        <!-- Variation Product Image Modal -->
        <div class="modal fade" id="variationimageModal" tabindex="-1" role="dialog"
            aria-labelledby="variationimageModalLabel">
            <div class="modal-dialog modal_width_1155" role="document">
                <div class="modal-content">
                    <div class="modal-body variationimageModal_body">
                        <div class="row">
                            <div class="col-md-2 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="{{ asset('admin/assets/img/orders/back-arrow.svg') }}"
                                        alt="">
                                    <span>Back</span></a>
                            </div>
                            <div class="col-md-8">
                                <div class="text-center">
                                    <h3 class="modal_title">Select an Image</h3>
                                    <p class="modal_subtitle ">Select an image for your product</p>
                                </div>
                            </div>                            
                        </div>
                        <div class="row customer_details_content">
                            <div class="col-md-12">
                            <span class="variation_image_area"></span>
                            <span class="edit_variation_upload_image_area"></span>
                           <div class="variaation_remove_image"><i class="fas fa-minus-circle" id="remove_variation_preview_img"></i></div> 
                            </div>
                        </div>
                    </div>
                    <!-- modal-content -->
                </div>
                <!-- modal-dialog -->
            </div>
        </div>
        <!--  Variation Product Image Modal end-->

        <!--payfull payment model -->
        <div class="modal fade" id="payfullmethodModal" tabindex="-1" role="dialog"
            aria-labelledby="payfullmethodModalLabel">
            <div class="modal-dialog modal_width_500" role="document">
                <div class="modal-content">
                    <div class="modal-body payfullmethodModal_body">
                        <div class="row">
                            <div class="col-md-12 back_btn_txt">
                                <a class="back_btn_link" href data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="back">
                                    <span>Back</span></a>
                            </div>
                        </div>
                        <div class="editProfilet_details text-center">
                            <img class="payfull_form_img" src="{{ asset('admin/assets/img/paymnetgetway/payfull.png')}}"
                                alt="payfull">


                            <p class="modal_subtitle mb-4">Enter your credentials below which you can
                                find in your
                                payfull.
                            </p>
                        </div>
                        <form class="editProfil_form" id="payfull_form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="merchant_name">Merchant name<span>*</span></label>
                                        <input type="text" class="form-control form_field" placeholder="Enter Name"
                                             id="merchant_name"
                                            name="merchant_name"> </div>

                                    <div class="form-group">
                                        <label for="password">Merchant Password<span>*</span></label>
                                        <!-- <input type="password" class="form-control form_field"
                                            placeholder="Enter Password" id="merchant_password"
                                            name="merchant_password"> -->
                                        <div class="input-group" id="mrechant_password_error">
                                            <input type="password" name="merchant_password" id="merchant_password"
                                                class="form-control form_field" placeholder="Enter New Password">
                                            <div class="input-group-append">
                                                <span class="btn password_hide_show_icon calender_icon"><i
                                                        class="fa fa-eye" aria-hidden="true" id="show_password"></i>
                                                    <i class="fa fa-eye-slash" aria-hidden="true" id="hide_password"
                                                        style="display:none;"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product_remove_btn">
                                <input type="button" class="theme_btn ripple_btn dark_btn w-100 ml-0" value="save"
                                    id="payfull_save_btn"> </div>
                        </form>


                    </div>

                </div>

            </div>

            <!-- modal-content -->

        </div>
        <!--payfull payment model end-->




        <!-- Request Data Modal -->
        <div class="modal fade" id="requestDataModal" tabindex="-1" role="dialog"
            aria-labelledby="requestDataModalLabel">
            <div class="modal-dialog modal_width_500" role="document">
                <div class="modal-content">
                    <div class="modal-body requestDataModal_body">
                        <div class="row">
                            <div class="col-md-12 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="{{ asset('admin/assets/img/orders/back-arrow.svg') }}"
                                        alt="">
                                    <span>Back</span></a>
                            </div>
                        </div>
                        <div class="delete_product_details approve_order_details ">
                            <div class="text-center">
                                <div class="approve_order_img request_data_img">
                                    <img src="{{ asset('admin/assets/img/orders/usericon.svg') }}" alt="">
                                </div>
                                <h3>Request Data</h3>
                                <p class="big">Are you sure you want to request the data for the customer ?</p>
                            </div>

                            <div class="mark_paid_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Request Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- Request Data Modal end-->

        <!-- Remove Customer Modal -->
        <div class="modal fade" id="removeCustomerModal" tabindex="-1" role="dialog"
            aria-labelledby="removeCustomerModalLabel">
            <div class="modal-dialog modal_width_500" role="document">
                <div class="modal-content">
                    <div class="modal-body removeCustomerModal_body">
                        <div class="row">
                            <div class="col-md-12 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="{{ asset('admin/assets/img/orders/back-arrow.svg') }}"
                                        alt="">
                                    <span>Back</span></a>
                            </div>
                        </div>
                        <div class="delete_product_details text-center">
                            <div class="delete_product_img">
                                <img src="{{ asset('admin/assets/img/orders/remove-icon.svg') }}" alt="">
                            </div>
                            <h3>Remove Customer</h3>
                            <p class="big">Are you sure you want to remove the customer?</p>
                            <p class="text-danger">(This action cannot be reverted)</p>
                            <div class="product_remove_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0" id="delete_customer">Yes, remove it</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!--Remove Customer Modal end-->

        <!-- edit Shop Settings Modal -->
        <div class="modal fade" id="editshopSettingsModal" tabindex="-1" role="dialog" aria-labelledby="shopSettingsModalLabel">
            <div class="modal-dialog modal_width_1155" role="document">
                <div class="modal-content">
                    <div class="modal-body shopSettingsModal_body">
                        <div class="row">
                            <div class="col-md-2 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                    <span>Back</span></a>
                            </div>
                            <div class="col-md-7">
                                <h3 class="modal_title text-center">Shop Settings</h3>
                            </div>
                            <div class="col-md-3 save_btn_txt text-right">
                                <input type="button" class="theme_btn ripple_btn dark_btn" value="Save Settings" id="edit_business_setting">
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
                                    <form class="addproduct" id="edit_business_setting_form" autocomplete="off">
                                
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="Shop Name">Shop Name</label>
                                                    <input type="text" class="form-control form_field" placeholder=""
                                                        id="edit_shop_name" name="shop_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="Address">Address</label>
                                                    <input type="text" class="form-control form_field" name="address"
                                                        id="edit_address" placeholder="Enter your address">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="Postcode">Postcode</label>
                                                    <input type="text" class="form-control form_field" name="postcode"
                                                        id="edit_postcode" placeholder="Enter your postcode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control form_field" name="city" id="edit_city"
                                                        placeholder="Enter your state/city">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="country">Country</label>    
                                                    <select class="form-control form_field country" name="country"
                                                        id="edit_country_name">
                                                        <option value="Afghanistan" data-prefix="+93">Afghanistan</option>
                                                        <option value="Albania" data-prefix="+355">Albania</option>
                                                        <option value="Algeria" data-prefix="+213">Algeria</option>
                                                        <option value="American Samoa" data-prefix="+1 684">American Samoa</option>
                                                        <option value="Andorra" data-prefix="+376">Andorra</option>
                                                        <option value="Angola" data-prefix="+244">Angola</option>
                                                        <option value="Anguilla" data-prefix="+1 264">Anguilla</option>
                                                        <option value="Antarctica (Australian bases)" data-prefix="+6721">Antarctica (Australian bases)</option>
                                                        <option value="Antigua and Barbuda" data-prefix="+1 268">Antigua and Barbuda</option>
                                                        <option value="Argentina" data-prefix="+54">Argentina</option>
                                                        <option value="Armenia" data-prefix="+374">Armenia</option>
                                                        <option value="Aruba" data-prefix="+297">Aruba</option>
                                                        <option value="Ascension" data-prefix="+247">Ascension</option>
                                                        <option value="Australia" data-prefix="+61">Australia</option>
                                                        <option value="Austria" data-prefix="+43">Austria</option>
                                                        <option value="Azerbaijan" data-prefix="+994">Azerbaijan</option>
                                                        <option value="Bahamas" data-prefix="+1 242">Bahamas</option>
                                                        <option value="Bahrain" data-prefix="+973">Bahrain</option>
                                                        <option value="Bangladesh" data-prefix="+880">Bangladesh</option>
                                                        <option value="Barbados" data-prefix="+1 246">Barbados</option>
                                                        <option value="Belarus" data-prefix="+375">Belarus</option>
                                                        <option value="Belgium" data-prefix="+32">Belgium</option>
                                                        <option value="Belize" data-prefix="+501">Belize</option>
                                                        <option value="Benin" data-prefix="+229">Benin</option>
                                                        <option value="Bermuda" data-prefix="+1 441">Bermuda</option>
                                                        <option value="Bhutan" data-prefix="+975">Bhutan</option>
                                                        <option value="Bolivia" data-prefix="+591">Bolivia</option>
                                                        <option value="Bosnia and Herzegovina" data-prefix="+387">Bosnia and Herzegovina</option>
                                                        <option value="Botswana" data-prefix="+267">Botswana</option>
                                                        <option value="Brazil" data-prefix="+55">Brazil</option>
                                                        <option value="British Indian Ocean Territory" data-prefix="+246">British Indian Ocean Territory</option>
                                                        <option value="British Virgin Islands" data-prefix="+1 284">British Virgin Islands</option>
                                                        <option value="Brunei" data-prefix="+673">Brunei</option>
                                                        <option value="Bulgaria" data-prefix="+359">Bulgaria</option>
                                                        <option value="Burkina Faso" data-prefix="+226">Burkina Faso</option>
                                                        <option value="Burundi" data-prefix="+257">Burundi</option>
                                                        <option value="Cambodia" data-prefix="+855">Cambodia</option>
                                                        <option value="Cameroon" data-prefix="+237">Cameroon</option>
                                                        <option value="Canada" data-prefix="+1">Canada</option>
                                                        <option value="Cape Verde" data-prefix="+238">Cape Verde</option>
                                                        <option value="Cayman Islands" data-prefix="+1 345">Cayman Islands</option>
                                                        <option value="Central African Republic" data-prefix="+236">Central African Republic</option>
                                                        <option value="Chad" data-prefix="+235">Chad</option>
                                                        <option value="Chile" data-prefix="+56">Chile</option>
                                                        <option value="China" data-prefix="+86">China</option>
                                                        <option value="Colombia" data-prefix="+57">Colombia</option>
                                                        <option value="Comoros" data-prefix="+269">Comoros</option>
                                                        <option value="Congo, Democratic Republic of the" data-prefix="+243">Congo, Democratic Republic of the</option>
                                                        <option value="Congo, Republic of the" data-prefix="+242">Congo, Republic of the</option>
                                                        <option value="Cook Islands" data-prefix="+682">Cook Islands</option>
                                                        <option value="Costa Rica" data-prefix="+506">Costa Rica</option>
                                                        <option value="Cote d'Ivoire" data-prefix="+225">Cote d'Ivoire</option>
                                                        <option value="Croatia" data-prefix="+385">Croatia</option>
                                                        <option value="Cuba" data-prefix="+53">Cuba</option>
                                                        <option value="Curaçao" data-prefix="+599">Curaçao</option>
                                                        <option value="Cyprus" data-prefix="+357">Cyprus</option>
                                                        <option value="Czech Republic" data-prefix="+420">Czech Republic</option>
                                                        <option value="Denmark" data-prefix="+45">Denmark</option>
                                                        <option value="Djibouti" data-prefix="+253">Djibouti</option>
                                                        <option value="Dominica" data-prefix="+1 767">Dominica</option>
                                                        <option value="Dominican Republic" data-prefix="+1 809">Dominican Republic</option>
                                                        <option value="Ecuador" data-prefix="+593">Ecuador</option>
                                                        <option value="Egypt" data-prefix="+20">Egypt</option>
                                                        <option value="El Salvador" data-prefix="+503">El Salvador</option>
                                                        <option value="Equatorial Guinea" data-prefix="+240">Equatorial Guinea</option>
                                                        <option value="Eritrea" data-prefix="+291">Eritrea</option>
                                                        <option value="Estonia" data-prefix="+372">Estonia</option>
                                                        <option value="Eswatini" data-prefix="+268">Eswatini</option>
                                                        <option value="Ethiopia" data-prefix="+251">Ethiopia</option>
                                                        <option value="Falkland Islands" data-prefix="+500">Falkland Islands</option>
                                                        <option value="Faroe Islands" data-prefix="+298">Faroe Islands</option>
                                                        <option value="Fiji" data-prefix="+679">Fiji</option>
                                                        <option value="Finland" data-prefix="+358">Finland</option>
                                                        <option value="France" data-prefix="+33">France</option>
                                                        <option value="French Guiana" data-prefix="+594">French Guiana</option>
                                                        <option value="French Polynesia" data-prefix="+689">French Polynesia</option>
                                                        <option value="Gabon" data-prefix="+241">Gabon</option>
                                                        <option value="Gambia" data-prefix="+220">Gambia</option>
                                                        <option value="Gaza Strip" data-prefix="+970">Gaza Strip</option>
                                                        <option value="Georgia (and parts of breakaway regions Abkhazia as well as South Ossetia)" data-prefix="+995">Georgia (and parts of breakaway regions Abkhazia as well as South Ossetia)</option>
                                                        <option value="Germany" data-prefix="+49">Germany</option>
                                                        <option value="Ghana" data-prefix="+233">Ghana</option>
                                                        <option value="Gibraltar" data-prefix="+350">Gibraltar</option>
                                                        <option value="Greece" data-prefix="+30">Greece</option>
                                                        <option value="Greenland" data-prefix="+299">Greenland</option>
                                                        <option value="Grenada" data-prefix="+1 473">Grenada</option>
                                                        <option value="Guadeloupe" data-prefix="+590">Guadeloupe</option>
                                                        <option value="Guam" data-prefix="+1 671">Guam</option>
                                                        <option value="Guatemala" data-prefix="+502">Guatemala</option>
                                                        <option value="Guinea" data-prefix="+224">Guinea</option>
                                                        <option value="Guinea-Bissau" data-prefix="+245">Guinea-Bissau</option>
                                                        <option value="Guyana" data-prefix="+592">Guyana</option>
                                                        <option value="Haiti" data-prefix="+509">Haiti</option>
                                                        <option value="Honduras" data-prefix="+504">Honduras</option>
                                                        <option value="Hong Kong" data-prefix="+852">Hong Kong</option>
                                                        <option value="Hungary" data-prefix="+36">Hungary</option>
                                                        <option value="Iceland" data-prefix="+354">Iceland</option>
                                                        <option value="India" data-prefix="+91">India</option>
                                                        <option value="Indonesia" data-prefix="+62">Indonesia</option>
                                                        <option value="Iraq" data-prefix="+964">Iraq</option>
                                                        <option value="Iran" data-prefix="+98">Iran</option>
                                                        <option value="Ireland (Eire)" data-prefix="+353">Ireland (Eire)</option>
                                                        <option value="Israel" data-prefix="+972">Israel</option>
                                                        <option value="Italy" data-prefix="+39">Italy</option>
                                                        <option value="Jamaica 1 876," data-prefix="+1 658">Jamaica 1 876,</option>
                                                        <option value="Japan" data-prefix="+81">Japan</option>
                                                        <option value="Jordan" data-prefix="+962">Jordan</option>
                                                        <option value="Kazakhstan" data-prefix="+7">Kazakhstan</option>
                                                        <option value="Kenya" data-prefix="+254">Kenya</option>
                                                        <option value="Kiribati" data-prefix="+686">Kiribati</option>
                                                        <option value="Kosovo" data-prefix="+383">Kosovo</option>
                                                        <option value="Kuwait" data-prefix="+965">Kuwait</option>
                                                        <option value="Kyrgyzstan" data-prefix="+996">Kyrgyzstan</option>
                                                        <option value="Laos" data-prefix="+856">Laos</option>
                                                        <option value="Latvia" data-prefix="+371">Latvia</option>
                                                        <option value="Lebanon" data-prefix="+961">Lebanon</option>
                                                        <option value="Lesotho" data-prefix="+266">Lesotho</option>
                                                        <option value="Liberia" data-prefix="+231">Liberia</option>
                                                        <option value="Libya" data-prefix="+218">Libya</option>
                                                        <option value="Liechtenstein" data-prefix="+423">Liechtenstein</option>
                                                        <option value="Lithuania" data-prefix="+370">Lithuania</option>
                                                        <option value="Luxembourg" data-prefix="+352">Luxembourg</option>
                                                        <option value="Macau" data-prefix="+853">Macau</option>
                                                        <option value="Madagascar" data-prefix="+261">Madagascar</option>
                                                        <option value="Malawi" data-prefix="+265">Malawi</option>
                                                        <option value="Malaysia" data-prefix="+60">Malaysia</option>
                                                        <option value="Maldives" data-prefix="+960">Maldives</option>
                                                        <option value="Mali" data-prefix="+223">Mali</option>
                                                        <option value="Malta" data-prefix="+356">Malta</option>
                                                        <option value="Marshall Islands" data-prefix="+692">Marshall Islands</option>
                                                        <option value="Martinique" data-prefix="+596">Martinique</option>
                                                        <option value="Mauritania" data-prefix="+222">Mauritania</option>
                                                        <option value="Mauritius" data-prefix="+230">Mauritius</option>
                                                        <option value="Mayotte" data-prefix="+262">Mayotte</option>
                                                        <option value="Mexico" data-prefix="+52">Mexico</option>
                                                        <option value="Micronesia, Federated States of" data-prefix="+691">Micronesia, Federated States of</option>
                                                        <option value="Moldova (plus breakaway Pridnestrovie)" data-prefix="+373">Moldova (plus breakaway Pridnestrovie)</option>
                                                        <option value="Monaco" data-prefix="+377">Monaco</option>
                                                        <option value="Mongolia" data-prefix="+976">Mongolia</option>
                                                        <option value="Montenegro" data-prefix="+382">Montenegro</option>
                                                        <option value="Montserrat" data-prefix="+1 664">Montserrat</option>
                                                        <option value="Morocco" data-prefix="+212">Morocco</option>
                                                        <option value="Mozambique" data-prefix="+258">Mozambique</option>
                                                        <option value="Myanmar" data-prefix="+95">Myanmar</option>
                                                        <option value="Namibia" data-prefix="+264">Namibia</option>
                                                        <option value="Nauru" data-prefix="+674">Nauru</option>
                                                        <option value="Netherlands" data-prefix="+31">Netherlands</option>
                                                        <option value="Netherlands Antilles" data-prefix="+599">Netherlands Antilles</option>
                                                        <option value="Nepal" data-prefix="+977">Nepal</option>
                                                        <option value="New Caledonia" data-prefix="+687">New Caledonia</option>
                                                        <option value="New Zealand" data-prefix="+64">New Zealand</option>
                                                        <option value="Nicaragua" data-prefix="+505">Nicaragua</option>
                                                        <option value="Niger" data-prefix="+227">Niger</option>
                                                        <option value="Nigeria" data-prefix="+234">Nigeria</option>
                                                        <option value="Niue" data-prefix="+683">Niue</option>
                                                        <option value="Norfolk Island" data-prefix="+6723">Norfolk Island</option>
                                                        <option value="North Korea" data-prefix="+850">North Korea</option>
                                                        <option value="North Macedonia" data-prefix="+389">North Macedonia</option>
                                                        <option value="Northern Ireland 44" data-prefix="+28">Northern Ireland 44</option>
                                                        <option value="Northern Mariana Islands" data-prefix="+1 670">Northern Mariana Islands</option>
                                                        <option value="Norway" data-prefix="+47">Norway</option>
                                                        <option value="Oman" data-prefix="+968">Oman</option>
                                                        <option value="Pakistan" data-prefix="+92">Pakistan</option>
                                                        <option value="Palau" data-prefix="+680">Palau</option>
                                                        <option value="Panama" data-prefix="+507">Panama</option>
                                                        <option value="Papua New Guinea" data-prefix="+675">Papua New Guinea</option>
                                                        <option value="Paraguay" data-prefix="+595">Paraguay</option>
                                                        <option value="Peru" data-prefix="+51">Peru</option>
                                                        <option value="Philippines" data-prefix="+63">Philippines</option>
                                                        <option value="Poland" data-prefix="+48">Poland</option>
                                                        <option value="Portugal" data-prefix="+351">Portugal</option>
                                                        <option value="Puerto Rico 1 787 and" data-prefix="+1 939">Puerto Rico 1 787 and</option>
                                                        <option value="Qatar" data-prefix="+974">Qatar</option>
                                                        <option value="Reunion" data-prefix="+262">Reunion</option>
                                                        <option value="Romania" data-prefix="+40">Romania</option>
                                                        <option value="Russia" data-prefix="+7">Russia</option>
                                                        <option value="Rwanda" data-prefix="+250">Rwanda</option>
                                                        <option value="Saint-Barthélemy" data-prefix="+590">Saint-Barthélemy</option>
                                                        <option value="Saint Helena and Tristan da Cunha" data-prefix="+290">Saint Helena and Tristan da Cunha</option>
                                                        <option value="Saint Kitts and Nevis" data-prefix="+1 869">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia" data-prefix="+1 758">Saint Lucia</option>
                                                        <option value="Saint Martin (French side)" data-prefix="+590">Saint Martin (French side)</option>
                                                        <option value="Saint Pierre and Miquelon" data-prefix="+508">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and the Grenadines" data-prefix="+1 784">Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa" data-prefix="+685">Samoa</option>
                                                        <option value="Sao Tome and Principe" data-prefix="+239">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia" data-prefix="+966">Saudi Arabia</option>
                                                        <option value="Senegal" data-prefix="+221">Senegal</option>
                                                        <option value="Serbia" data-prefix="+381">Serbia</option>
                                                        <option value="Seychelles" data-prefix="+248">Seychelles</option>
                                                        <option value="Sierra Leone" data-prefix="+232">Sierra Leone</option>
                                                        <option value="Sint Maarten (Dutch side)" data-prefix="+1 721">Sint Maarten (Dutch side)</option>
                                                        <option value="Singapore" data-prefix="+65">Singapore</option>
                                                        <option value="Slovakia" data-prefix="+421">Slovakia</option>
                                                        <option value="Slovenia" data-prefix="+386">Slovenia</option>
                                                        <option value="Solomon Islands" data-prefix="+677">Solomon Islands</option>
                                                        <option value="Somalia" data-prefix="+252">Somalia</option>
                                                        <option value="South Africa" data-prefix="+27">South Africa</option>
                                                        <option value="South Korea" data-prefix="+82">South Korea</option>
                                                        <option value="South Sudan" data-prefix="+211">South Sudan</option>
                                                        <option value="Spain" data-prefix="+34">Spain</option>
                                                        <option value="Sri Lanka" data-prefix="+94">Sri Lanka</option>
                                                        <option value="Sudan" data-prefix="+249">Sudan</option>
                                                        <option value="Suriname" data-prefix="+597">Suriname</option>
                                                        <option value="Sweden" data-prefix="+46">Sweden</option>
                                                        <option value="Switzerland" data-prefix="+41">Switzerland</option>
                                                        <option value="Syria" data-prefix="+963">Syria</option>
                                                        <option value="Taiwan" data-prefix="+886">Taiwan</option>
                                                        <option value="Tajikistan" data-prefix="+992">Tajikistan</option>
                                                        <option value="Tanzania" data-prefix="+255">Tanzania</option>
                                                        <option value="Thailand" data-prefix="+66">Thailand</option>
                                                        <option value="Timor-Leste" data-prefix="+670">Timor-Leste</option>
                                                        <option value="Togo" data-prefix="+228">Togo</option>
                                                        <option value="Tokelau" data-prefix="+690">Tokelau</option>
                                                        <option value="Tonga" data-prefix="+676">Tonga</option>
                                                        <option value="Trinidad and Tobago" data-prefix="+1 868">Trinidad and Tobago</option>
                                                        <option value="Tunisia" data-prefix="+216">Tunisia</option>
                                                        <option value="Turkey" data-prefix="+90" selected="selected">Turkey</option>
                                                        <option value="Turkmenistan" data-prefix="+993">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands" data-prefix="+1 649">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu" data-prefix="+688">Tuvalu</option>
                                                        <option value="Uganda" data-prefix="+256">Uganda</option>
                                                        <option value="Ukraine" data-prefix="+380">Ukraine</option>
                                                        <option value="United Arab Emirates" data-prefix="+971">United Arab Emirates</option>
                                                        <option value="United Kingdom" data-prefix="+44">United Kingdom</option>
                                                        <option value="United States of America" data-prefix="+1">United States of America</option>
                                                        <option value="Uruguay" data-prefix="+598">Uruguay</option>
                                                        <option value="Uzbekistan" data-prefix="+998">Uzbekistan</option>
                                                        <option value="Vanuatu" data-prefix="+678">Vanuatu</option>
                                                        <option value="Venezuela" data-prefix="+58">Venezuela</option>
                                                        <option value="Vietnam" data-prefix="+84">Vietnam</option>
                                                        <option value="U.S. Virgin Islands" data-prefix="+1 340">U.S. Virgin Islands</option>
                                                        <option value="Wallis and Futuna" data-prefix="+681">Wallis and Futuna</option>
                                                        <option value="West Bank" data-prefix="+970">West Bank</option>
                                                        <option value="Yemen" data-prefix="+967">Yemen</option>
                                                        <option value="Zambia" data-prefix="+260">Zambia</option>
                                                        <option value="Zimbabwe" data-prefix="+263">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control form_field" name="state"
                                                        id="edit_state">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Email address">Email address</label>
                                                    <input type="text" class="form-control form_field" name="email"
                                                        id="edit_email" placeholder="Enter your email">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="title">Telephone</label>
                                                    <div class="input-group input_group_field" id="edit_telephone_number">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="edit_prefix_number">
                                                                +90</span>
                                                        </div>
                                                        <input type="text" name="telephone" id="edit_telephone"
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
                                                    id="edit_timezone">
                                                        <option value="">Select Timezone</option>
                                                        <option value="Pacific/Midway">Midway Island, Samoa (GMT-11:00)</option>
                                                        <option value="America/Adak">Hawaii-Aleutian (GMT-10:00)</option>
                                                        <option value="Etc/GMT+10">Hawaii (GMT-10:00)</option>
                                                        <option value="Pacific/Marquesas">Marquesas Islands (GMT-09:30)</option>
                                                        <option value="Pacific/Gambier">Gambier Islands (GMT-09:00)</option>
                                                        <option value="America/Anchorage">Alaska (GMT-09:00)</option>
                                                        <option value="America/Ensenada">Tijuana, Baja California (GMT-08:00)</option>
                                                        <option value="Etc/GMT+8">Pitcairn Islands (GMT-08:00)</option>
                                                        <option value="America/Los_Angeles">Pacific Time (US & Canada) (GMT-08:00)</option>
                                                        <option value="America/Denver">Mountain Time (US & Canada) (GMT-07:00)</option>
                                                        <option value="America/Chihuahua">Chihuahua, La Paz, Mazatlan (GMT-07:00)</option>
                                                        <option value="America/Dawson_Creek">Arizona (GMT-07:00)</option>
                                                        <option value="America/Belize">Saskatchewan, Central America (GMT-06:00)</option>
                                                        <option value="America/Cancun">Guadalajara, Mexico City, Monterrey (GMT-06:00)</option>
                                                        <option value="Chile/EasterIsland">Easter Island (GMT-06:00)</option>
                                                        <option value="America/Chicago">Central Time (US & Canada) (GMT-06:00)</option>
                                                        <option value="America/New_York">Eastern Time (US & Canada) (GMT-05:00)</option>
                                                        <option value="America/Havana">Cuba (GMT-05:00)</option>
                                                        <option value="America/Bogota">Bogota, Lima, Quito, Rio Branco (GMT-05:00)</option>
                                                        <option value="America/Caracas">Caracas (GMT-04:30)</option>
                                                        <option value="America/Santiago">Santiago (GMT-04:00)</option>
                                                        <option value="America/La_Paz">La Paz (GMT-04:00)</option>
                                                        <option value="Atlantic/Stanley">Faukland Islands (GMT-04:00)</option>
                                                        <option value="America/Campo_Grande">Brazil (GMT-04:00)</option>
                                                        <option value="America/Goose_Bay">Atlantic Time (Goose Bay) (GMT-04:00)</option>
                                                        <option value="America/Glace_Bay">Atlantic Time (Canada) (GMT-04:00)</option>
                                                        <option value="America/St_Johns">Newfoundland (GMT-03:30)</option>
                                                        <option value="America/Araguaina">UTC-3 (GMT-03:00)</option>
                                                        <option value="America/Montevideo">Montevideo (GMT-03:00)</option>
                                                        <option value="America/Miquelon">Miquelon, St. Pierre (GMT-03:00)</option>
                                                        <option value="America/Godthab">Greenland (GMT-03:00)</option>
                                                        <option value="America/Argentina/Buenos_Aires">Buenos Aires (GMT-03:00)</option>
                                                        <option value="America/Sao_Paulo">Brasilia (GMT-03:00)</option>
                                                        <option value="America/Noronha">Mid-Atlantic (GMT-02:00)</option>
                                                        <option value="Atlantic/Cape_Verde">Cape Verde Is. (GMT-01:00)</option>
                                                        <option value="Atlantic/Azores">Azores (GMT-01:00)</option>
                                                        <option value="Europe/Belfast">Greenwich Mean Time : Belfast (GMT)</option>
                                                        <option value="Europe/Dublin">Greenwich Mean Time : Dublin (GMT)</option>
                                                        <option value="Europe/Lisbon">Greenwich Mean Time : Lisbon (GMT)</option>
                                                        <option value="Europe/London">Greenwich Mean Time : London (GMT)</option>
                                                        <option value="Africa/Abidjan">Monrovia, Reykjavik (GMT)</option>
                                                        <option value="Europe/Amsterdam">Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna (GMT+01:00)</option>
                                                        <option value="Europe/Belgrade">Belgrade, Bratislava, Budapest, Ljubljana, Prague (GMT+01:00)</option>
                                                        <option value="Europe/Brussels">Brussels, Copenhagen, Madrid, Paris (GMT+01:00)</option>
                                                        <option value="Africa/Algiers">West Central Africa (GMT+01:00)</option>
                                                        <option value="Africa/Windhoek">Windhoek (GMT+01:00)</option>
                                                        <option value="Asia/Beirut">Beirut (GMT+02:00)</option>
                                                        <option value="Africa/Cairo">Cairo (GMT+02:00)</option>
                                                        <option value="Asia/Gaza">Gaza (GMT+02:00)</option>
                                                        <option value="Africa/Blantyre">Harare, Pretoria (GMT+02:00)</option>
                                                        <option value="Asia/Jerusalem">Jerusalem (GMT+02:00)</option>
                                                        <option value="Europe/Minsk">Minsk (GMT+02:00)</option>
                                                        <option value="Asia/Damascus">Syria (GMT+02:00)</option>
                                                        <option value="Europe/Moscow">Moscow, St. Petersburg, Volgograd (GMT+03:00)</option>
                                                        <option value="Africa/Addis_Ababa">Nairobi (GMT+03:00)</option>
                                                        <option value="Asia/Tehran">Tehran (GMT+03:30)</option>
                                                        <option value="Asia/Dubai">Abu Dhabi, Muscat (GMT+04:00)</option>
                                                        <option value="Asia/Yerevan">Yerevan (GMT+04:00)</option>
                                                        <option value="Asia/Kabul">Kabul (GMT+04:30)</option>
                                                        <option value="Asia/Yekaterinburg">Ekaterinburg (GMT+05:00)</option>
                                                        <option value="Asia/Tashkent">Tashkent (GMT+05:00)</option>
                                                        <option value="Asia/Kolkata">Chennai, Kolkata, Mumbai, New Delhi (GMT+05:30)</option>
                                                        <option value="Asia/Katmandu">Kathmandu (GMT+05:45)</option>
                                                        <option value="Asia/Dhaka">Astana, Dhaka (GMT+06:00)</option>
                                                        <option value="Asia/Novosibirsk">Novosibirsk (GMT+06:00)</option>
                                                        <option value="Asia/Rangoon">Yangon (Rangoon) (GMT+06:30)</option>
                                                        <option value="Asia/Bangkok">Bangkok, Hanoi, Jakarta (GMT+07:00)</option>
                                                        <option value="Asia/Krasnoyarsk">Krasnoyarsk (GMT+07:00)</option>
                                                        <option value="Asia/Hong_Kong">Beijing, Chongqing, Hong Kong, Urumqi (GMT+08:00)</option>
                                                        <option value="Asia/Irkutsk">Irkutsk, Ulaan Bataar (GMT+08:00)</option>
                                                        <option value="Australia/Perth">Perth (GMT+08:00)</option>
                                                        <option value="Australia/Eucla">Eucla (GMT+08:45)</option>
                                                        <option value="Asia/Tokyo">Osaka, Sapporo, Tokyo (GMT+09:00)</option>
                                                        <option value="Asia/Seoul">Seoul (GMT+09:00)</option>
                                                        <option value="Asia/Yakutsk">Yakutsk (GMT+09:00)</option>
                                                        <option value="Australia/Adelaide">Adelaide (GMT+09:30)</option>
                                                        <option value="Australia/Darwin">Darwin (GMT+09:30)</option>
                                                        <option value="Australia/Brisbane">Brisbane (GMT+10:00)</option>
                                                        <option value="Australia/Hobart">Hobart (GMT+10:00)</option>
                                                        <option value="Asia/Vladivostok">Vladivostok (GMT+10:00)</option>
                                                        <option value="Australia/Lord_Howe">Lord Howe Island (GMT+10:30)</option>
                                                        <option value="Etc/GMT-11">Solomon Is., New Caledonia (GMT+11:00)</option>
                                                        <option value="Asia/Magadan">Magadan (GMT+11:00)</option>
                                                        <option value="Pacific/Norfolk">Norfolk Island (GMT+11:30)</option>
                                                        <option value="Asia/Anadyr">Anadyr, Kamchatka (GMT+12:00)</option>
                                                        <option value="Pacific/Auckland">Auckland, Wellington (GMT+12:00)</option>
                                                        <option value="Etc/GMT-12">Fiji, Kamchatka, Marshall Is. (GMT+12:00)</option>
                                                        <option value="Pacific/Chatham">Chatham Islands (GMT+12:45)</option>
                                                        <option value="Pacific/Tongatapu">Nuku'alofa (GMT+13:00)</option>
                                                        <option value="Pacific/Kiritimati">Kiritimati (GMT+14:00)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="state">Hide address from checkout</label>
                                                    <select type="text" class="form-control form_field" name=""
                                                        id="">
                                                        <option selected="selected" value="Show">Show
                                                        </option>
                                                        <option value="Hide">Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="shopshetting_billinginformation d-none">
                                    <h4 class="mb-3">Other Shop Settings</h4>
                                    <div class="row other_shop_settings">
                                        <div class="col-sm-5 equal_row">
                                            <div class="other_shop_setting_box" data-toggle="modal"
                                                data-target="#stockmanagementModal">
                                                <div class="other_shop_setting_title">
                                                    <h5>Stock Management</h5>
                                                    <img class="other_shop_setting_icon"
                                                        src="{{ asset('admin/assets/img/dashboard/stockmanagement.svg') }}" alt="">
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
                                                        src="{{ asset('admin/assets/img/dashboard/currencywhitelist.svg') }}" alt="">
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
        <!-- edit Shop Settings Modal end-->

        <!-- seeting button -->
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
        <!-- seeting button end-->


        <!-- edit profile model -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog"
            aria-labelledby="editProfileModalLabel">

            <div class="modal-dialog modal_width_500" role="document">

                <div class="modal-content">

                    <div class="modal-body editProfileModal_body">

                        <div class="row">

                            <div class="col-md-12 back_btn_txt">

                                <a class="back_btn_link" href data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">

                                    <span>Back</span></a>



                                <!-- <div class="dropdown product_view_droupdown"> -->

                                <!-- <a class="dropdown-toggle droupdown_menu_toggleicon" id="productDropdownMenu"

                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img class="droupdown_menu_img" src="admin/assets/img/main/menu-icon.svg"

                                    alt=""></a>

                            <div class="dropdown-menu" aria-labelledby="productDropdownMenu">

                                <a class="dropdown-item" href="">Export Data</a>

                                <a class="dropdown-item text-danger" data-toggle="modal"

                                    data-target="#deleteAccountModal">Delete Account</a>

                            </div> -->

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

                        <form class="editProfil_form" id="editProfile_form">

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="email">Login Email Address<span>*</span></label>

                                        <input type="text" class="form-control form_field"
                                            placeholder="Enter Email Address" id="user_email" name="email"
                                             disabled="disabled">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="first_name">First Name<span>*</span></label>

                                        <input type="text" class="form-control form_field" name="first_name"
                                            id="user_first_name" placeholder=""
                                            >

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="title">Last Name<span>*</span></label>

                                        <input type="text" class="form-control form_field" name="last_name"
                                            id="user_last_name" placeholder=""
                                            >

                                    </div>

                                </div>

                            </div>

                            <div class="profile_save_btn">

                                <input type="button" class="theme_btn ripple_btn dark_btn w-100 ml-0" value="save"
                                    id="edit_user_btn">

                            </div>

                        </form>

                        <div class="consents_table_text">

                            <p class="consents_table_title">consents</p>

                            <table class="table variations_table consents_table" id="consents_table">

                                <thead>

                                    <tr>

                                        <th>Consent Description</th>

                                        <th>Timestamp</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>

                                        <td>

                                            I consent and agree on how my data is handled according to
                                            the Data Privacy

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

                                            I want to receive platform updates and occasional
                                            promotional emails.

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

                                <p class="big">Are you sure you want us to remove your account? All your
                                    plugs, clients,

                                    products and attached payment methods will be permanetly erased.</p>

                            </div>



                            <div class="mark_paid_btn">

                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Yes, delete
                                    account</button>

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

                                                    <p class="big">In most cases, uploading a screenshot
                                                        helps us solve

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

                                <p>Superbolts is a system that allows you to increase your recurring
                                    revenue by branding

                                    sanalpos.co as yours and selling it to your clients and visitors.
                                    Everything except

                                    support is managed automatically by our system. You just need to
                                    worry about helping

                                    your clients set up their checkout flows.</p>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-8 superbolts_list_left">

                                <h5>Get started right now, and get:</h5>

                                <ul class="superbolts_list pl-0">

                                    <li><i class="fa fa-check"></i>Client seats in bulk</li>

                                    <li><i class="fa fa-check"></i>Hosted Signup Page</li>

                                    <li><i class="fa fa-check"></i>Automated Billing Plans (Stripe
                                        required)</li>

                                    <li><i class="fa fa-check"></i>Clients Management</li>

                                    <li><i class="fa fa-check"></i>Embed your own support widget or URL
                                    </li>

                                    <li><i class="fa fa-check"></i>Completely Whitelabel, clients log
                                        into their admin

                                        panel on your domain</li>

                                    <li><i class="fa fa-check"></i>Use Webhooks to integrate your other
                                        systems</li>

                                    <li><i class="fa fa-check"></i>Use client seats for your other
                                        businesses</li>

                                    <li><i class="fa fa-check"></i>Manage multiple accounts with a
                                        single login</li>

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

        <!-- Generate Invoice Modal -->
        <div class="modal fade" id="generateInvoiceModal" tabindex="-1" role="dialog"
            aria-labelledby="generateInvoiceModalLabel">

            <div class="modal-dialog modal_width_1155" role="document">

                <div class="modal-content">

                    <div class="modal-body generateInvoiceModal_body">

                        <div class="row">

                            <div class="col-md-2 back_btn_txt">

                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img"
                                        src="{{ asset('admin/assets/img/products/back-arrow.svg') }}" alt="">

                                    <span>Back</span></a>

                            </div>

                            <div class="col-md-8">

                                <div class="text-center">
                                    <h3 class="modal_title">New Invoice</h3>
                                </div>



                            </div>

                            <div class="col-md-2 save_btn_txt text-right">

                                <!--<button type="submit" class="theme_btn ripple_btn dark_btn"-->

                                <!--    id="">Save</button>-->

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-11 m-auto">

                                <div class="generate_invoice_form mt-3">

                                    <form class="generateinvoice" id="generate_invoice">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="title">Title<span>*</span></label>
                                                    <input type="text" class="form-control form_field"
                                                        placeholder="Enter your product title" id="title" name="title">
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
        <!-- Generate Invoice Modal end-->

    </div>




    <p id="status"></p>



    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') }}">
    </script>

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js') }}">
    </script>

    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js') }}">
    </script>


    </script>

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

    <script src="{{ asset('https://momentjs.com/downloads/moment-timezone-with-data.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>



    <!-- <script src="{{ asset('admin/assets/js/imgecroper.js') }}" />

    </script> -->



    <script type="text/javascript">
    tinymce.init({

        selector: "textarea.tinymce_editor",
        // max_chars: 5000,
        // charLimit : 5000,
        height: 300,
        entity_encoding : 'raw', 
        force_br_newlines : true, 
        force_p_newlines : false, 
        forced_root_block : false,


        plugins: [

            "advlist autolink lists charmap print preview anchor",

            "searchreplace visualblocks code fullscreen",

            "table paste"
        ],

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent|"

    });
    </script>
    <script>
        $(".product_type, .create_product_type").click(function() {
        $('.upload_image_area, .edit_variation_upload_image_area, .variation_image_area').empty();
        product_image_arr = [];
        $('#variation_one').selectize()[0].selectize.clear();
        $('#variation_two').selectize()[0].selectize.clear(); 
        $("#variations_table > tbody").empty();
        $("#option1").val('');
        $("#option2").val(''); 
        $("#variation_opt_label1").text("Option1");
        $("#variation_opt_label2").text("Option2");   
        $(".product_variations_form").hide();
        $("#add_variation").show();
    });
    </script>
    <script>

        var product_image_arr = [];
        var i = 0;
        var image_div_name, variation_img_id;
        Dropzone.options.myDropzone = {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'saveproductimage',
            acceptedFiles: 'image/jpeg,image/png',
            dictDefaultMessage: '',
            maxFiles: 1,
            maxfilesexceeded: function(file) {
                this.removeAllFiles(file);
                this.addFile(file);
            },
            transformFile: function(file, done) {
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
                confirm.addEventListener('click', function() {


                // Get the canvas with image data from Cropper.js
                var canvas = cropper.getCroppedCanvas();

                // Turn the canvas into a Blob (file object without a name)
                canvas.toBlob(function(blob) {

                // Update the image thumbnail with the new image data
                    myDropZone.createThumbnail(

                        blob,

                        myDropZone.options.thumbnailWidth,

                        myDropZone.options.thumbnailHeight,

                        myDropZone.options.thumbnailMethod,

                        false,

                        function(dataURL) {



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
                $("#status").html(
                    '<div class="alert alert-success image_upload_status">Image Uploading...</div>'
                );
                $('#imageCropModal').modal('hide');
                $(".dz-preview").remove();
            });

            $('#testbtn').empty().append(confirm);
                // Load the image
            var image = new Image();
            image.src = URL.createObjectURL(file);
            editor.appendChild(image);

            // Append the editor to the page
            $('#testimg').empty().append(editor);

            // Create Cropper.js and pass image
            var cropper = new Cropper(image, {
                zoomOnTouch: false,
                zoomOnWheel: false,
                autoCropArea: true,
            });
            },
            success: function(file, response) {
               
                $(".image_upload_status").css("display", "none");
                i++;

                console.log(response);

                if (response["success"] != "") {

                    $('.upload_image_area').append(
                        '<span class="product_selected_img" id="image_preview' + i +
                        '" name="' + response["success"] +
                        '"><img id="theImg" src="products/image/' + response[
                            "success"] +
                        '" /><i class="fas fa-trash-alt remove_product_img" id="remove_img" data-toggle="modal" data-target="#deleteImageModal"   onClick="deleteImage(' +
                        i + ')"></i></span>')
                        
                    $('.variation_image_area').append(
                    '<span class="product_selected_img" id="image_preview' + i +
                    '" name="' + response["success"] +
                    '" onClick = "imagename('+i+')"><img id="theImg" src="products/image/' + response[
                        "success"] +
                    '" /></span>');



                    product_image_arr.push(response["success"]);

                    console.log("add image", product_image_arr);

                }            
               
            },
        };
        
        function deleteImage(id) {
            $("#delet_image").click(function() {
                var remove_image_src = $("#image_preview" + id+" #theImg").attr('src');
                var remove_image_name = $("#image_preview" + id).attr('name');
                console.log("remove_image_name", remove_image_name, remove_image_src);
                if(remove_image_src){                    
                    $(".variation_image img[src='"+remove_image_src+"']").attr("src", "admin/assets/img/products/addimg.svg");
                    $(".variation_image #variation_image_path[value='"+remove_image_name+"']").val("");
                    $(".upload_image_area #image_preview1").hide();
                    $("span #image_preview"+id).css("display", "none");
                    $("#deleteImageModal").modal('hide');
                    product_image_arr = $.grep(product_image_arr, function(value) {
                        return value != $("#image_preview" + id).attr('name');
                    });
                }
            });
        }

        variation_final_array = [];
        var variation_data;
        function variation_image_id(id){
            variation_img_id = id;
            image_div_name = $("#tableDropzone_"+id).attr('id');
            variation_image_name = $("#tableDropzone_"+id+" img").attr('src');
            console.log(image_div_name);
        }

        function imagename(id){
            console.log("id", id);
            
            
            image_name_path = $("#image_preview"+id+" #theImg").attr('src');
            var image_name = image_name_path.replace("products/image/", "");
            console.log(image_name);
            $("#variationimageModal").modal('hide');
            $("#"+image_div_name+" #variation_image_path").val(image_name);
            $("#"+image_div_name+" img").attr("src", image_name_path);
            variation_final_array[variation_img_id].image_path = image_name;
            variation_final_array[variation_img_id].image = "{{url('products/image')}}/" + image_name;
        }
        $("#remove_variation_preview_img").click(function(){
            $("#variationimageModal").modal('hide');            
            $("#tableDropzone_"+variation_img_id+" img").attr('src', "admin/assets/img/products/addimg.svg");
            $("#tableDropzone_"+variation_img_id+" #variation_image_path").val("");
            variation_final_array[variation_img_id].image_path = "";
            variation_final_array[variation_img_id].image = "{{url('admin/assets/img/products/addimg.svg')}}";
        })
        
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
        
        $("#add_variation").click(function() {
            $(".product_variations_form").show();
            $("#add_variation").hide();
        })
        $("#option1").on('input', function() {
            var opt1 = $("#option1").val();
            $("#variation_opt_label1").html(opt1);            
        });
        $("#option2").on('input', function() {
            var opt2 = $("#option2").val();
            $("#variation_opt_label2").html(opt2);            
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
                variation_array = [];
                variation_temp_array = [];
                for(var i = 0; i < variation1_arr.length; i++) {
                    for(var j = 0; j < variation2_arr.length; j++) {
                        variation_array.push([variation1_arr[i], variation2_arr[j]]);
                        console.log(variation_array.length + " " + variation_array);
                        $("#variations_table > tbody").empty();
                                            
                    }
                }     
                console.log("variation_array---", variation_array);
                variation_temp_array = variation_final_array;
                console.log("variation_temp_array---", variation_temp_array);
                variation_final_array = [];
                for (var k = 0; k < variation_array.length; k++) {
                    variation_data = variation_temp_array.find((o) => {
                        return o["option1"] === variation_array[k][0] && o["option2"] ===
                            variation_array[k][1]
                    })
                    console.log("ans---", !($.isEmptyObject(variation_data)));
                    // var img_path = "admin/assets/img/products/addimg.svg";
                    if (!($.isEmptyObject(variation_data))) {
                        variation_final_array.push(variation_data); // variation_temp_array object
                        console.log(variation_temp_array);

                    } else {
                        var obj1 = {
                            "image": "{{url('admin/assets/img/products/addimg.svg')}}",
                            "image_path": "",
                            "option1": variation_array[k][0],
                            "option2": variation_array[k][1],
                            "price": "",
                            "stock": "",
                        };
                        variation_final_array.push(obj1); // create new object and 
                        console.log("variation_final_array--", variation_final_array);
                    }
                }
                $("#variations_table > tbody").empty();
                for (var l = 0; l < variation_final_array.length; l++) {
                    variationTable(l);
                }
                        
            }
        });  
        function variationTable(l) {
            $("#variations_table > tbody").append("<tr class='variation_row_" + l +
                "'><td><div class='variation_image' id='tableDropzone_" + l +
                "' data-toggle='modal' data-target=' #variationimageModal'  onClick = 'variation_image_id(" +
                l +
                ")'><input type='hidden' id='variation_image_path' name='variation_image_path" +
                l + "' value='" + variation_final_array[l].image_path + "'><img src='" + variation_final_array[l]
                .image + "' id='img" + l +
                "'></div></td><td>" + variation_final_array[l].option1 + "</td><td>" +
                variation_final_array[l].option2 + "</td><td><input type='number' name='price" +
                l + "' id='price" + l +
                "' value='"+variation_final_array[l].price+"' class='form-control price_width price" + l +
                "' placeholder='Enter a price'></td><td><input type='number' name='stock" +
                l + "' id='stock" + l +
                "' value='" + variation_final_array[l].stock +
                "' class='form-control stock_width add_stock_field stock" + l +"' placeholder='Enter stock' value=''></td></tr>"
            );
            
            $(".price"+ l).on("input", function () {    
                variation_final_array[l].price = $(this).val();
                console.log("price", variation_final_array[l].price, $(this).val());
            });
            $(".stock" + l).on("input", function () {
                variation_final_array[l].stock = $(this).val();
                console.log("stock", variation_final_array[l].price, $(this).val());
            });
            
            
        }  
        function stockValidation(){
        // var valid = true;
        $(".error").remove();
        if ($('#variation_one').val() != "" || $('#variation_two').val() != "") {            
            $("input.add_stock_field").each(function(index){
                var value1 = $("#stock"+index).val();
                var val = $(this).val();
                console.log("stock_index", val)
                console.log("stock_outside", val);
                if(val == "" || val == undefined || val == null){
                    console.log("stock_inside", val);
                    $("#status").html('<div class="alert alert-danger"><strong>Error!</strong> Product Stock is required.</div>');
                            setTimeout(function() {
                                $(".alert").css("display", "none");
                            }, 3000);
                // valid = false; 
                return false;
                }    
                
            });     
            // return valid;  
        }      
    }    
    </script>
    <script>
    $(document).ready(function() {

        $.ajax({

            url: "{{ url('ordercount') }}",

            type: "GET",

            success: function(res) {

                console.log("total pending order--",res);

                var count = res['data'].length;

                if (count >= 1) {

                    $("#pending_order_count").show();

                    $("#pending_order_count").text(count);

                } else {

                    $("#pending_order_count").hide();

                }

            },

            error: function(jqXHR, textStatus, errorMessage) {

                console.log(errorMessage); // Optional

            }

        });

        $.ajax({
            url: "{{ url('paidinvoiceslict') }}",
            type: "GET",
            success: function(res) {
                console.log("total paid order--",res);
                var count = res['totalpaidinvoices']['data'].length;

                if (count > 0) {
                    $("#paid_invoices").show();
                } else {
                    $("#paid_invoices").hide();
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });

    });
    </script>

    <script>
    function customerDetail(id) {
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('vieworderdetail') }}/" + id,
            type: "POST",
            success: function(response) {
                console.log("view customer Detail--",response);
                // console.log("check", res);
                if (response['data']['orderdetail']['status'] == "1") {
                    var res = response['data']['orderdetail']['data'][0];
                    
                    $("#customerDetailModal #customer_name").text(res['customer_name']);
                    $("#customerDetailModal #customer_email").text(res['customer_email']);
                    $("#customerDetailModal #customer_country").text(res['country']);
                    $("#customerDetailModal #customer_address").text(res['address']);
                    $("#customerDetailModal #currency_lifeline").text(res['currency'].split('-')[0]);
                    $("#customerDetailModal #customer_lifetime").text(res['total']);

                }

                $("#customerorder_detail").empty();
                if (response['data']['customerorder'].length > 0) {
                    
                    var res = response['data']['customerorder'];
                    var i = 0;
                    console.log(res)
                        for(var k = 0; k < res.length; k++) {
                            i++;
                            if(res[k]['order_status'] == 0) {
                                product_status = "<span class='warning_txt'>Pending (unpaid)</span>";
                            } else if(res[k]['order_status'] == 1) {
                                product_status = "<span class='warning_txt'>New (unpaid)</span>";
                            } else if(res[k]['order_status'] == 2) {
                                product_status = "<span class='text-success'>Paid</span>";
                            } else {
                                product_status = "<span class='warning_txt'>Decline</span>";
                            }


                            var date1 = moment.utc(res[k]['created_at']);
                            var date = date1.clone().tz("Turkey");
                            $("#customerorder_detail").append("<tr class='customerorder_row_" + k + "'><td>"+i+"</td><td>"+res[k]['product_name']+"</td><td><span class='currency_symbol'>"+res[k]['currency'].split('-')[0]+"</span>"+res[k]['total']+"</td><td>"+res[k]['payment_type']+"</td><td><div class='datetime_layout'><div class='datetime_txt'><p class='month_txt' id='customerorder_month'>"+date.format('MMMM')+"</p><p class='day_txt' id='customerorder_day'>"+date.format('DD')+"</p></div><p class='datetime_separator'><span>at</span></p><div class='time_layout'><p><span class='hour_txt' id='customerorder_hour'>"+date.format('h')+"</span>:<span class='hour_txt' id='customerorder_miniute'>"+date.format('mm')+"<span></p></div></div></td><td>"+product_status+"</td></tr>"); 
                            
                        }      
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    }
    </script>

    <script>
    function viewProduct(id) {

        console.log("view Product id--", id);

        $.ajax({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },

            url: "{{ url('getproduct') }}/" + id,

            type: "POST",

            data: id,

            success: function(response) {

                console.log("view Product Data--", response);

                var res = response['data']['product']['data'][0];

                var date1 = moment.utc(res['created_at']);
                var date = date1.clone().tz("Turkey");


                var url = "{{url('/')}}/l/" + res['link'];

                console.log(url);

                $("#viewProductModal #product_name").text(res['product_name']);

                $("#viewProductModal #product_category").text(res['category_name']);

                $("#viewProductModal #view_product_currency").text(res['currency'].split('-')[0]);
                $("#viewProductModal #product_price").text(res['price']);

                $("#viewProductModal #product_month").text(date.format('MMMM'));

                $("#viewProductModal #product_day").text(date.format('DD'));

                $("#viewProductModal #product_hour").text(date.format('h'));

                $("#viewProductModal #product_miniute").text(date.format('mm'));

                $("#viewProductModal #selling_product_name").text(res['product_name']);

                $("#viewProductModal #product_checkout_link").text(res['link']);

                $("#viewProductModal #product_link").attr("href", url);
                if (res['stock'] > 0) {
                    var product_avalibility = "<span class=''>"+res['stock']+"</span>";
                } else {
                    var product_avalibility = "<span class='text-danger'>Out of Stock</span>";

                }
                $("#viewProductModal #product_avalibility").html(product_avalibility);




            },

            error: function(jqXHR, textStatus, errorMessage) {

                console.log(errorMessage); // Optional

            }



        });

    }
    </script>
    <script>
    $("#show_password").click(function() {
        $("#merchant_password").attr("type", "text");
        $("#show_password").hide();
        $("#hide_password").show();
    });
    $("#hide_password").click(function() {
        $("#merchant_password").attr("type", "password");
        $("#hide_password").hide();
        $("#show_password").show();
    });
    $("#payfull_save_btn").click(function() {
        //save Merachant detail
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('merchant_data') }}",
                data: $("#payfull_form").serialize(),
                type: "POST",
                success: function(res) {
                    console.log("Merachant detail--",res);
                    if ($.isEmptyObject(res.success.error)) {
                        if (res['success']['message'] == "success") {

                            $("#payfull_form")[0].reset();
                            $("#payfullmethodModal, #checkoutModal").modal(
                                'hide');
                            $("#status").html(
                                '<div class="alert alert-success"><strong>Success!</strong> Merchant Detail Add Successfully.</div>'
                            );
                            setTimeout(function() {
                                $(".alert").css("display", "none");
                            }, 3000);
                        } else {
                            $("#status").html(
                                '<div class="alert alert-danger"><strong>Fail!</strong> Something is wrong.</div>'
                            );
                            setTimeout(function() {
                                $(".alert").css("display", "none");
                            }, 3000);
                        }
                    } else {
                        // console.log(res.success.error.merchant_name);
                        $(".error").remove();
                        if (res.success.error.merchant_name) {
                            $("#merchant_name").after(
                                '<span class="error">' + res.success
                                .error.merchant_name + '</span>');
                        }
                        if (res.success.error.merchant_password) {
                            $("#mrechant_password_error").after(
                                '<span class="error">' + res
                                .success.error.merchant_password +
                                '</span>');
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorMessage) {
                    console.log(errorMessage); // Optional
                }
            });
        });
    });
    </script>
    <script>
    $("#payfull_modal, #add_product_btn, .not_done_setup_box, #profile_setting").click(function() {
        

        $.ajax({

            url: "{{ url('userdetail') }}",

            type: "GET",

            success: function(response) {

                var res = response['data']['success'];
                console.log("click payfull modal", res['merchant_name']);
                if ((res['merchant_name'] == null || res['merchant_name'] == '') && (res[
                        'merchant_password'] == null || res['merchant_password'] == '')) {
                    $('#paymnet_type2').attr("disabled", "disabled");
                    $('.payment_payfull_option_box').css("cursor", "no-drop");
                   
                        
                } else {
                    $('#merchant_name').val(res['merchant_name']);
                    $('#merchant_password').val(res['merchant_password']);
                }
                // edit_profile
                $('.profile-name b').text(res['first_name']+' '+res['last_name']);
                
                $('#user_email').val(res['email']);
                $('#user_first_name').val(res['first_name']);
                $('#user_last_name').val(res['last_name']);
            },

            error: function(jqXHR, textStatus, errorMessage) {

                console.log(errorMessage); // Optional

            }

        });

    });
    </script>
    <!-- <script>
    $(document).ready(function() {


        $.ajax({

            url: "{{ url('userdetail') }}",

            type: "GET",

            success: function(res) {

                var res = res['data']['success'];
                if ((res['merchant_name'] == null || res['merchant_name'] == '') && (res[
                        'merchant_password'] == null || res['merchant_password'] == '')) {
                    $('#paymnet_type2').attr("disabled", "disabled");
                    $('.payment_payfull_option_box').css("cursor", "no-drop");

                }

            },

            error: function(jqXHR, textStatus, errorMessage) {

                console.log(errorMessage); // Optional

            }

        });

    });
    </script> -->
    <script>
    $('#product_submit').on('click', function(event) {

        $("#product_submit").val("Processing....");
        $("#product_submit").attr("disabled", true);

        var long_desc = tinymce.get("long_description").getContent();
       

        event.preventDefault();

        var data = $("#add_product").serialize();

        console.log("product_data", data);

        var variation_one = $('#variation_one').val();

        var variation_two = $('#variation_two').val();

        console.log("poduct imag array---", product_image_arr.length);

        if (product_image_arr.length > 0) {

            product_iamge = product_image_arr;

        } else {
            product_iamge = [];
        }
        if ($('#variation_one').val() != "" || $('#variation_two').val() != "") {
            $(".error1").remove();
            if ($("input.stock_field").val() == "") {
                $(".stock_field").after("<span class='error1'> field is required</span>");
            }
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('product_data') }}",

            type: "POST",

            data: data + "&variation_one=" + variation_one + "&variation_two=" +
                variation_two +
                "&product_image=" + product_iamge + "&long_desc=" + long_desc,
            success: function(res) {
                console.log("product save data--", res);
                $("#product_submit").val("Save");
                $('#product_submit').removeAttr("disabled");
                if ($.isEmptyObject(res.data.error)) {
                    if (res['data']['message'] == "success") {
                        var data = res['data']['data'][0];
                        if ((data['product_image'].length > 0) && (data['product_image'][0] !=
                            "")) {
                            var img_path = '{{ asset("products/image")}}/' + data['product_image'][
                                0];
                        } else {
                            var img_path =
                                '{{ asset("admin/assets/img/products/placeholder-person.jpg")}}';
                        }
                        if (data['stock'] > 0) {
                            var product_avalibility = data['stock'];
                        } else {
                            var product_avalibility = "Out of Stock";

                        }
                        var date1 = moment.utc(data['created_at']);
                        var date = date1.clone().tz("Turkey");
                        $("#add_product_list").append('<tr class="product' + data.id +
                            '"><td class="product_list_img_name"><div class="product_list_img_name_inner"><img src="' +
                            img_path +
                            '" alt=""class="product_img"><span class="product_name" data-toggle="modal" data-target=" #viewProductModal" onclick="viewProduct('+data.id+')">' + data
                            .product_name +
                            '</span></div></td><td class="product_list_price"><span class="currency_symbol">' +
                            data['currency'].split('-')[0] +
                            '</span><span class="product_price">' + data.price +
                            '</span></td><td class="product_list_sale">0</td><td class="product_list_date"><div class="datetime_layout"><div class="datetime_txt"><p class="month_txt">' +
                            date.format('MMMM') + '</p><p class="day_txt">' + date.format(
                            'DD') +
                            '</p></div><p class="datetime_separator"><span>at</span></p><div class="time_layout"><p><span class="hour_txt">' +
                            date.format('h') + '</span>:<span class="hour_txt">' + date.format(
                                'mm') +
                            '<span></p></div></div></td><td class="product_list_stock">' +
                            product_avalibility +
                            '</td><td class="product_list_toggle"><div class="dropdown"><a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="toggle_droupdown"src="{{ asset("admin/assets/img/products/menu-icon.svg") }}"></a><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" data-toggle="modal" data-target=" #viewProductModal" onclick="viewProduct(' +
                            data.id +
                            ')">View Product</a><a class="dropdown-item" data-toggle="modal" data-target="#editProductModal" data-id="' +
                            data.id + '" onclick="editProduct(' + data.id +
                            ')">Edit</a><a class=" dropdown-item text-danger deleteproduct" data-toggle="modal" data-target="#deleteProductModal" onclick="deleteProduct(' +
                            data.id + ')" ">Remove</a></div></div></td></tr>');
                        $("#add_product")[0].reset();
                        $("#addProductModal, #productTypeModal").modal('hide');
                        $("#status").html(
                            '<div class="alert alert-success"><strong>Success!</strong> Product Add Successfully.</div>'
                            );
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
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

        if (msg.short_desc) {

            $("#short_description").after('<span class="error">' + msg.short_desc + '</span>');

        }


    }

    $(function() {

        new Clipboard('.checkout_clipboard_txt');

    });
    </script>

    <script>
    $("#edit_user_btn").click(function() {



        $.ajax({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },

            url: "{{ url('edituserprofile') }}",

            type: "POST",

            data: $("#editProfile_form").serialize(),

            success: function(res) {

                console.log("User update res--",res);



                if (res['data']['status'] == "1") {

                    $("#editProfile_form")[0].reset();

                    $("#status").html(
                        '<div class="alert alert-success"><strong>Success!</strong> User update Successfully.</div>'
                    );

                    setTimeout(function() {

                        $(".alert").css("display", "none");

                    }, 3000);

                    $("#editProfileModal").modal('hide');

                } else {
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
    </script>
    <script>
    $("#starrate").click(function() {
        $(".rating_area_inner").show();
    })
    $("#country_name").change(function(){
    var prefix =$(this).find(":selected").attr("data-prefix");
        $("#prefix_number").text(prefix);
    })
</script>
<script>
    //get dashboard data detail
    $(document).ready(function() {

        $.ajax({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },

            url: "{{ url('getdashboarddata') }}/" + {{Session::get('user')['id']}},
            type: "POST",

            success: function(res) {

                console.log(res);

                if (res['data']['businessdata']['status'] == "1") {
                    $("#done_business_settings_box").show();
                    $("#notdone_business_settings_box").hide();
                    $("#edit_shop_settings").show();
                    
                } else {

                    $("#done_business_settings_box").hide();
                    $("#notdone_business_settings_box").show();
                }

                if (res['data']['productdata']['data'].length > 0) {
                    $("#done_add_product_box").show();
                    $("#notdone_add_product_box").hide();

                } else {
                    $("#done_add_product_box").hide();
                    $("#notdone_add_product_box").show();
                }

                if (res['data']['weekrevenue'].length > 0) {
                    var week_data = res['data']['weekrevenue'][0];
                    if(week_data['total_revenue'] != null) {
                        $("#week_total_revenue").text(week_data['total_revenue']);
                    }
                    if(week_data['active_customers'] != null) {
                        $("#week_active_customers").text(week_data['active_customers']);
                    }
                    if(week_data['products_sold'] != null) {
                        $("#week_products_sold").text(week_data['products_sold']);
                    }
                }

                if (res['data']['monthrevenue'].length > 0) {
                    var month_data = res['data']['monthrevenue'][0];
                    if(month_data['total_revenue'] != null) {
                        $("#month_total_revenue").text(month_data['total_revenue']);
                    }
                    if(month_data['active_customers'] != null) {
                        $("#month_active_customers").text(month_data['active_customers']);
                    }
                    if(month_data['products_sold'] != null) {
                        $("#month_products_sold").text(month_data['products_sold']);
                    }
                }

                var res = res['data']['userdata']['success'];
                if ((res['merchant_name'] == null || res['merchant_name']=='') && (res['merchant_password'] == null || res['merchant_password']=='')) {
                    $("#done_checkout_flow_box").hide();
                    $("#not_done_checkout_flow_box").show();                    

                } else {
                    $("#done_checkout_flow_box").show();
                    $("#not_done_checkout_flow_box").hide();
                }

                
            },

            error: function(jqXHR, textStatus, errorMessage) {

                console.log(errorMessage); // Optional

            }

        });
    });
    //save business setting detail

    //save business setting detail field validation
    function validbusinessdetail() {

        var valid = true;

        $(".error").remove();
        if($("#telephone").val() != ""){
            if($("#telephone").val().length > 13 || $("#telephone").val().length < 13) {
                $("#telephone_number").after("<span class='error'> telephone must be 10 digits</span>");
                valid = false;
            } 
        }
        if($("#postcode").val() != ""){
            if($("#postcode").val().length > 5 || $("#postcode").val().length < 5) {
                $("#postcode").after("<span class='error'> postcode must be 5 digits</span>");
                valid = false;
            }
        }
        return valid;
    }

    $('#city, #state').on('input', function(){
        $(this).val($(this).val().replace(/[0-9]/, ''));
    });

    $('#postcode').on('input', function(){
        $(this).val($(this).val().replace(/[^\d]/g, ''));
        if ($(this).val().length >= 5) { 
            $(this).val($(this).val().substr(0, 5));
        }
    });

    $('#telephone').on('input', function () {
		$(this).val($(this).val().replace(/^0+/, ''));
		$(this).val($(this).val().replace(/[^\d]/g, ''));
		if ($(this).val().length >= 10) { 
			$(this).val($(this).val().substr(0, 10));
		}
		if ($(this).val().length == 10) {
			$(this).val($(this).val().replace(/(\d{3})(\d{3})(\d{2})(\d{2})/, "$1 $2 $3 $4"));
		}
	});

    $("#save_business_setting").click(function() {
        if(validbusinessdetail()) {
            $.ajax({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },

                url: "{{ url('bussiness_data') }}",

                type: "POST",

                data: $("#business_setting_form").serialize(),

                success: function(res) {

                    console.log(res);



                    if (res['data']['status'] == "1") {
                        $("#business_setting_form")[0].reset();
                        $("#status").html(
                            '<div class="alert alert-success"><strong>Success!</strong> Business Setting create Successfully.</div>'
                        );
                        setTimeout(function() {

                            $(".alert").css("display", "none");

                        }, 3000);
                        $("#shopSettingsModal").modal('hide');
                        $("#done_business_settings_box").show();
                        $("#notdone_business_settings_box").hide();
                        $("#edit_shop_settings").show();

                    } else {
                        $("#status").html(
                            '<div class="alert alert-danger"><strong>Fail!</strong> Something Wrong.</div>'
                        );
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
                        $("#done_business_settings_box").hide();
                        $("#notdone_business_settings_box").show();
                    }



                },

                error: function(jqXHR, textStatus, errorMessage) {

                    console.log(errorMessage); // Optional

                }

            });
        }
    });
</script>
    <script>
    $("#editshopSettingsModal #edit_country_name").change(function(){
        var prefix =$(this).find(":selected").attr("data-prefix");
        $("#editshopSettingsModal #edit_prefix_number").text(prefix);
    })

    $("#edit_shop_settings").click(function() {

        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('get_bussiness_data') }}",

            type: "POST",

            success: function(res) {

                console.log("shop settings--",res);
                if (res['data']['status'] == "1") {
                    var res = res['data']['data'][0]
                    $('#editshopSettingsModal #edit_shop_name').val(res['business_name']);
                    $('#editshopSettingsModal #edit_address').val(res['address']);
                    $('#editshopSettingsModal #edit_postcode').val(res['postal_code']);
                    $('#editshopSettingsModal #edit_city').val(res['city']);
                    $('#editshopSettingsModal #edit_country_name option[value="' + res['country'] + '"]').attr('selected', 'selected');
                    var prefix =$('#editshopSettingsModal #edit_country_name').find(":selected").attr("data-prefix");
                    $("#editshopSettingsModal #edit_prefix_number").text(prefix);
                    $('#editshopSettingsModal #edit_state').val(res['state']);
                    $('#editshopSettingsModal #edit_email').val(res['email']);
                    $('#editshopSettingsModal #edit_telephone').val(res['phone']);
                    $('#editshopSettingsModal #edit_timezone option[value="' + res['timezone'] + '"]').attr('selected', 'selected');
                }

            },

            error: function(jqXHR, textStatus, errorMessage) {

                console.log(errorMessage); // Optional

            }

        });

    });


    //edit business setting detail

    //edit business setting detail field validation
    function valideditbusinessdetail() {

        var valid = true;

        $(".error").remove();
        if($("#edit_telephone").val() != ""){
            if($("#edit_telephone").val().length > 13 || $("#edit_telephone").val().length < 13) {
                $("#edit_telephone_number").after("<span class='error'> telephone must be 10 digits</span>");
                valid = false;
            } 
        }
        if($("#edit_postcode").val() != ""){
            if($("#edit_postcode").val().length > 5 || $("#edit_postcode").val().length < 5) {
                $("#edit_postcode").after("<span class='error'> postcode must be 5 digits</span>");
                valid = false;
            }
        }
        return valid;
    }

    $('#edit_city, #edit_state').on('input', function(){
        $(this).val($(this).val().replace(/[0-9]/, ''));
    });

    $('#edit_postcode').on('input', function(){
        $(this).val($(this).val().replace(/[^\d]/g, ''));
        if ($(this).val().length >= 5) { 
            $(this).val($(this).val().substr(0, 5));
        }
    });

    $('#edit_telephone').on('input', function () {
		$(this).val($(this).val().replace(/^0+/, ''));
		$(this).val($(this).val().replace(/[^\d]/g, ''));
		if ($(this).val().length >= 10) { 
			$(this).val($(this).val().substr(0, 10));
		}
		if ($(this).val().length == 10) {
			$(this).val($(this).val().replace(/(\d{3})(\d{3})(\d{2})(\d{2})/, "$1 $2 $3 $4"));
		}
	});


    $("#edit_business_setting").click(function() {
        if(valideditbusinessdetail()) {
            $.ajax({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },

                url: "{{ url('edit_bussiness_data') }}",

                type: "POST",

                data: $("#edit_business_setting_form").serialize(),

                success: function(res) {

                    console.log(res);



                    if (res['data']['status'] == "1") {
                        // $("#edit_business_setting_form")[0].reset();
                        $("#status").html(
                            '<div class="alert alert-success"><strong>Success!</strong> Business Setting update Successfully.</div>'
                        );
                        setTimeout(function() {

                            $(".alert").css("display", "none");

                        }, 3000);
                        $("#editshopSettingsModal").modal('hide');
                        $("#done_business_settings_box").show();
                        $("#notdone_business_settings_box").hide();

                    } else {
                        $("#status").html(
                            '<div class="alert alert-danger"><strong>Fail!</strong> Something Wrong.</div>'
                        );
                        setTimeout(function() {
                            $(".alert").css("display", "none");
                        }, 3000);
                        $("#done_business_settings_box").hide();
                        $("#notdone_business_settings_box").show();
                    }



                },

                error: function(jqXHR, textStatus, errorMessage) {

                    console.log(errorMessage); // Optional

                }

            });
        }
    });
    </script>
</body>



</html>