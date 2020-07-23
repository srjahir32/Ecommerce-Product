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
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <p class="big">Got something to sell? Add some sales channels to your
                                        business!</p>
                                    <a href="" class="big themecolor" data-toggle="modal"
                                        data-target="#addProductModal">Add a Product</a>
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
                                        <a class="big themecolor" data-toggle="modal" data-target="#addProductModal">Add
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

                                                    <input type="text" class="form-control form_field"
                                                        id="product_price" name="product_price"
                                                        placeholder="Enter a price">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-sm-6">

                                                <div class="form-group">

                                                    <label for="title">Order Limit</label>

                                                    <input type="text" class="form-control form_field"
                                                        name="order_limit" id="order_limit"
                                                        placeholder="Enter a limit (optional)">

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <label for="title">Stock<span>*</span></label>

                                                <input type="text" class="form-control form_field" name="product_stock"
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

                                        <div class="row mt-4 ">

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
                                            <div class="col-md-4 col-sm-6 product_type">
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
                                            <div class="col-md-4 col-sm-6 product_type">
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

                                <div class="col-md-3 col-sm-6 ">

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

                                <div class="col-md-3 col-sm-6 ">

                                    <div class="view_product_detail_txt">

                                        <label>Variations</label>

                                        <p id="product_variation">0 variants</p>

                                    </div>

                                    <div class="view_product_detail_txt">

                                        <label>Availability</label>

                                        <p id="product_avalibility"></p>

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

                        <div class="checkout_details text-center">



                            <p class="checkout_page_txt">Checkout Page</p>

                            <p class="checkout_link_txt mb-0"><a href="" id="product_link"
                                    target="_blank">{{ url('/') }}/l/<span id="product_checkout_link"></span></p>



                        </div>

                        <div class="view_product_tab">

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
                                            value="{{ Session::get('user')['merchant_name'] }}" id="merchant_name"
                                            name="merchant_name"> </div>

                                    <div class="form-group">
                                        <label for="password">Merchant Password<span>*</span></label>
                                        <!-- <input type="password" class="form-control form_field"
                                            placeholder="Enter Password" id="merchant_password"
                                            name="merchant_password"> -->
                                        <div class="input-group" id="mrechant_password_error">
                                            <input type="password" name="merchant_password" id="merchant_password"
                                                value="{{ Session::get('user')['merchant_password'] }}"
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
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Yes, remove it</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!--Remove Customer Modal end-->

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

                                    @if(Session::has('user'))

                                    {{ Session::get('user')['first_name'] }}
                                    {{ Session::get('user')['last_name'] }}

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
                                            value="{{ Session::get('user')['email'] }}" disabled="disabled">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="first_name">First Name<span>*</span></label>

                                        <input type="text" class="form-control form_field" name="first_name"
                                            id="user_first_name" placeholder=""
                                            value="{{ Session::get('user')['first_name'] }}">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="title">Last Name<span>*</span></label>

                                        <input type="text" class="form-control form_field" name="last_name"
                                            id="user_last_name" placeholder=""
                                            value="{{ Session::get('user')['last_name'] }}">

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
    </div>



    <p id="status"></p>



    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') }}">
    </script>

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js') }}">
    </script>

    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js') }}">
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

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent|"

    });
    </script>



    <script>
    var product_image_arr = [];

    console.log(product_image_arr);

    var i = 0;



    Dropzone.options.myDropzone = {

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        url: 'saveproductimage',

        acceptedFiles: 'image/jpeg,image/png',

        dictDefaultMessage: '',

        maxfilesexceeded: function(file) {

            this.removeAllFiles();

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
                    '<div class="alert alert-success image_upload_status">Image Uplodaing...</div>'
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

            // document.body.appendChild(editor);

            $('#testimg').empty().append(editor);



            // Create Cropper.js and pass image

            var cropper = new Cropper(image, {

                // aspectRatio: 1,

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

                product_image_arr.push(response["success"]);

                console.log("add image", product_image_arr);

            }

        },

    };



    function deleteImage(id) {

        $("#delet_image").click(function() {

            // product_image_arr.remove($("#image_preview"+id).attr('name'));



            // alert($("#image_preview"+id).remove());

            $("#image_preview" + id).remove()

            $("span #image_preview" + id).css("display", "none");

            $("#deleteImageModal").modal('hide');

            product_image_arr = $.grep(product_image_arr, function(value) {

                return value != $("#image_preview" + id).attr('name');

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
    $("#add_variation").click(function() {
        $(".product_variations_form").show();
        $("#add_variation").hide();
    })
    $("#option1").on('input', function() {
        var opt1 = $("#option1").val();
        $("#variation_opt_label1").html(opt1);
        console.log(opt1);
    });
    $("#option2").on('input', function() {
        var opt2 = $("#option2").val();
        $("#variation_opt_label2").html(opt2);
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
            for(var i = 0; i < variation1_arr.length; i++) {
                for(var j = 0; j < variation2_arr.length; j++) {
                    variation_array.push([variation1_arr[i], variation2_arr[j]]);
                    console.log(variation_array.length + " " + variation_array);
                    $("#variations_table > tbody").empty();
                    for(var k = 0; k < variation_array.length; k++) {
                        $("#variations_table > tbody").append("<tr class='variation_row_" + k + "'><td><div class='dropzone' id='tableDropzone'></div></td><td>" + variation_array[k][0] + "</td><td>" + variation_array[k][1] + "</td><td><input type='number' name='price" + k + "' id='price" + k + "' class='form-control price_width' placeholder='Enter a price'></td><td><input type='number' name='stock" + k + "' id='stock" + k + "' class='form-control stock_width stock_field' placeholder='Enter stock'></td></tr>");
                        console.log(variation_array[k]);
                    }
                }
            }
        }
    });
    </script>
    <script>
    $(document).ready(function() {

        console.log("hello");

        $.ajax({

            url: "{{ url('ordercount') }}",

            type: "GET",

            success: function(res) {

                // console.log(res);

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

    });
    </script>

    <script>
    function customerDetail(id) {
        console.log("customer", id);
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('vieworderdetail') }}/" + id,
            type: "POST",
            success: function(res) {
                console.log(res);
                if (res['data']['status'] == "1") {
                    var res = res['data']['data'][0];
                    $("#customerDetailModal #customer_name").text(res['customer_name']);
                    $("#customerDetailModal #customer_email").text(res['customer_email']);
                    $("#customerDetailModal #customer_country").text(res['country']);
                    $("#customerDetailModal #customer_address").text(res['address']);
                    $("#customerDetailModal #currency_lifeline").text(res['currency'].split('-')[0]);

                    $("#customerDetailModal #customer_lifetime").text(res['total']);

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
                    var product_avalibility = "In Stock";
                } else {
                    var product_avalibility = "Out of Stock";

                }
                $("#viewProductModal #product_avalibility").text(product_avalibility);




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
                    console.log(res);
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
    $(document).ready(function() {


        $.ajax({

            url: "{{ url('userdetail') }}",

            type: "GET",

            success: function(res) {

                // console.log(res);
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
    </script>
    <script>
    $('#product_submit').on('click', function(event) {

        $("#product_submit").val("Processing....");

        var long_desc = tinymce.get("long_description").getContent();
        console.log($("#variation_one").val());

        event.preventDefault();

        var data = $("#add_product").serialize();

        console.log("product_data", data);

        var variation_one = $('#variation_one').val();

        var variation_two = $('#variation_two').val();

        console.log("imag array---", product_image_arr.length);

        if (product_image_arr.length > 0) {

            product_iamge = product_image_arr;

        } else {
            product_iamge = [];
        }
        if ($('#variation_one').val() != "" || $('#variation_two').val() != "") {
            $(".error1").remove();
            if ($("input.stock_field").val() == "") {
                var id = $(this).attr('id');
                $(".stock_field").after("<span class='error1'> field is required</span>")
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
                console.log(res);
                $("#product_submit").val("Save");
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
                            var product_avalibility = "In Stock";
                        } else {
                            var product_avalibility = "Out of Stock";

                        }
                        var date = moment.utc(data['created_at']);
                        $("#add_product_list").append('<tr class="product' + data.id +
                            '"><td class="product_list_img_name"><div class="product_list_img_name_inner"><img src="' +
                            img_path +
                            '" alt=""class="product_img"><span class="product_name">' + data
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

                console.log(res);



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

</body>



</html>