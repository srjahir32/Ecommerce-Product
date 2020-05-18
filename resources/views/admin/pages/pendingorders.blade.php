@extends('admin.layout.main')
@section('content')
<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="{{ url('admin/assets/img/orders/icon-sales-side.svg') }}" alt=""><span>Pending
                        Orders</span></h3>
            </div>

        </div>


    </div>
    <div class="products_table_content">
        <table class="products_table pending_order_table table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Puja</td>
                    <td><span class="currency_symbol">₹</span>1.0K</td>
                    <td>Cash</td>
                    <td>
                        <div class="datetime_layout">
                            <div class="datetime_txt">
                                <p class="month_txt">MAY</p>
                                <p class="day_txt">16</p>
                            </div>
                            <p class="datetime_separator"><span>at</span></p>
                            <div class="time_layout">
                                <p><span class="hour_txt">10</span> : <span class="hour_txt">10<span></p>
                            </div>
                        </div>
                    </td>
                    <td class="warning_txt">Pending (unpaid)</td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="toggle_droupdown" src="{{ url('admin/assets/img/orders/menu-icon.svg') }}"></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#approveOrderModal">Approve</a>
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#declineOrderModal">Decline</a>
                                <a class="dropdown-item text-danger" data-toggle="modal"
                                    data-target="#viewOrderModal">View Page</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="products_table_btm_txt">
        <p class="big">This self-updating page is where you can find and manage all of your pending orders.
            Mark them as
            Done and they will be archived under Invoices. This action doesn't trigger any events.</p>
    </div>

    <!-- View Order Modal -->
    <div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="viewOrderModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body viewOrderModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/orders/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-5">
                            <div class="text-center">
                                <h3 class="modal_title">Pending Order</h3>
                            </div>

                        </div>
                        <div class="col-md-5 save_btn_txt text-right">
                            <div class="product_view_edit_btn">
                                <button class="theme_btn ripple_btn dark_btn" data-toggle="modal"
                                    data-target="#approveOrderModal"></i>
                                    Approve</button>
                                <button class="theme_btn ripple_btn text-danger" data-toggle="modal"
                                    data-target="#declineOrderModal"></i>
                                    Decline</button></div>
                            <div class="dropdown product_view_droupdown">
                                <a class="dropdown-toggle" id="productDropdownMenu" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu" aria-labelledby="productDropdownMenu">

                                    <a class="dropdown-item " data-toggle="modal" data-target="#markPaidOrderModal">Mark
                                        Paid</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view_product_details">
                        <div class="view_product_name view_pending_order_name">
                            <p class="big"><svg height="20" viewBox="0 0 18 20" width="18"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.53,11.06,15.47,10l-4.88,4.88L8.47,12.76,7.41,13.82,10.59,17ZM19,3H18V1H16V3H8V1H6V3H5A1.991,1.991,0,0,0,3.01,5L3,19a2,2,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V5A2.006,2.006,0,0,0,19,3Zm0,16H5V8H19Z"
                                        transform="translate(-3 -1)"></path>
                                </svg>Summary</p>
                        </div>
                        <div class="view_pending_order_detail_inner">
                            <div class="view_product_detail_txt">
                                <label>Purchased</label>
                                <p><a href="" class="themecolor" data-toggle="modal" data-target="#">testing</a></p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Customer</label>
                                <p><a href="" class="themecolor" data-toggle="modal"
                                        data-target="#customerDetailModal">puja</a></p>
                            </div>

                            <div class="view_product_detail_txt">
                                <label>Bought from</label>
                                <p>test@gmail.com</p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Plug</label>
                                <p>Selling testing with C</p>
                            </div>

                            <div class="view_product_detail_txt">
                                <label>Payment Gateway</label>
                                <p>Cash on delivery</p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Checkout Duration</label>
                                <p>3 Minutes 48 Secon</p>
                            </div>

                            <div class="view_product_detail_txt">
                                <label>Status</label>
                                <p>Pending (Unpaid)</p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Date</label>
                                <p>MAY 07 at 11:03</p>
                            </div>
                        </div>
                    </div>
                    <div class="row view_product_name view_pending_order_detail">
                        <p class="big col-sm-6"><img src="{{ url('admin/assets/img/orders/invoice_med.svg') }}" alt="">Order Details
                        </p>
                        <p class="pending_order_download_txt col-sm-6">Download</p>
                    </div>
                    <div class="row"></div>
                    <div class="col-sm-12 pending_order_table">
                        <table class="table " cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr class="">
                                    <td colspan="2">
                                        <table class="table top_table">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td><b><span
                                                                class="order_title">Order</span></b><br>07/05/2020<br>Payment
                                                        Method: Cash on Delivery<br>Status: Unpaid</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="center_table">
                                    <td colspan="2">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="left_table_txt">
                                                        <b>test</b><br>puja.tupple@gmail.com<br>kapodra char
                                                        rasta, L.
                                                        H. road <br>surat Gujarat 395006<br>India</td>
                                                    <td class="right_table_txt">
                                                        <b>puja</b><br>puja.tupple@gmail.com<br>L. H. road
                                                        <br>surat
                                                        Gujarat 395006<br>India</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="heading bottom_table">
                                    <td>Products</td>
                                    <td class="text-right">Total</td>
                                </tr>
                                <tr class="item">
                                    <td>1 x testing</td>
                                    <td class="text-right">₹1,000.00</td>
                                </tr>
                                <tr class="item last">
                                    <td colspan="2" class="text-right">Subtotal: ₹1,000.00</td>
                                </tr>
                                <tr class="item last">
                                    <td colspan="2" class="text-right">Total: ₹1,000.00</td>
                                </tr>
                                <tr class="total">
                                    <td colspan="2" class="text-right">Amount Due: ₹1,000.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- View Order Modal end-->

    <!-- approve Order Modal -->
    <div class="modal fade" id="approveOrderModal" tabindex="-1" role="dialog" aria-labelledby="approveOrderModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body approveOrderModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/orders/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details approve_order_details ">
                        <div class="text-center">
                            <div class="approve_order_img">
                                <img src="{{ url('admin/assets/img/orders/salesicon.svg') }}" alt="">
                            </div>
                            <h3>Approve Order</h3>
                            <p class="big">The invoice will be updated and the customer will be
                                automatically informed
                                by email.</p>
                        </div>
                        <form class="approve_order_form" id="approve_order_form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Enter a message for the
                                            customer<span>*</span></label>
                                        <input type="text" class="form-control form_field"
                                            placeholder="Enter a message for the customer" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="approve_order_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Yes, Approve
                                    Order</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- approve Order Modal end-->


    <!-- Decline Order Modal -->
    <div class="modal fade" id="declineOrderModal" tabindex="-1" role="dialog" aria-labelledby="declineOrderModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body declineOrderModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/orders/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details approve_order_details ">
                        <div class="text-center">
                            <div class="approve_order_img">
                                <img src="{{ url('admin/assets/img/orders/salesicon.svg') }}" alt="">
                            </div>
                            <h3>Decline Order</h3>
                            <p class="big">Are you sure you want to decline this order? The customer will be
                                informed
                                via email.</p>
                        </div>
                        <form class="decline_order_form" id="decline_order_form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Enter a message for the
                                            customer<span>*</span></label>
                                        <input type="text" class="form-control form_field"
                                            placeholder="Enter a message for the customer" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="approve_order_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Yes, Decline
                                    Order</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Decline Order Modal end-->

    <!-- Mark Paid Modal -->
    <div class="modal fade" id="markPaidOrderModal" tabindex="-1" role="dialog"
        aria-labelledby="markPaidOrderModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body markPaidOrderModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/orders/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details approve_order_details ">
                        <div class="text-center">
                            <div class="approve_order_img">
                                <img src="{{ url('admin/assets/img/orders/salesicon.svg') }}" alt="">
                            </div>
                            <h3>Mark Paid</h3>
                            <p class="big">By marking the sale as paid, we will generate a new updated
                                invoice and
                                automatically send it to the customer (unless email block is enabled). </p>
                        </div>

                        <div class="mark_paid_btn">
                            <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Mark Paid Modal end-->


    <!-- Customer Details Modal -->
    <div class="modal fade" id="customerDetailModal" tabindex="-1" role="dialog"
        aria-labelledby="customerDetailModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body customerDetailModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/orders/back-arrow.svg') }}" alt="">
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
                            <img class="customer_image" src="{{ url('admin/assets/img/orders/person-icon.svg') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 customer_details_inner">
                                    <div class="customer_details_txt">
                                        <label>Purchased</label>
                                        <p>testing</p>
                                    </div>
                                    <div class="customer_details_txt">
                                        <label>Customer</label>
                                        <p>puja</b></p>
                                    </div>

                                    <div class="customer_details_txt">
                                        <label>Bought from</label>
                                        <p>test@gmail.com</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 customer_details_inner">
                                    <div class="customer_details_txt">
                                        <label>Purchased</label>
                                        <p>testing</p>
                                    </div>
                                    <div class="customer_details_txt">
                                        <label>Customer</label>
                                        <p>puja</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view_product_tab">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true"><svg height="18"
                                        viewBox="0 0 10.18 18" width="10.18" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.8,10.9c-2.27-.59-3-1.2-3-2.15,0-1.09,1.01-1.85,2.7-1.85,1.78,0,2.44.85,2.5,2.1h2.21A3.986,3.986,0,0,0,13,5.19V3H10V5.16c-1.94.42-3.5,1.68-3.5,3.61,0,2.31,1.91,3.46,4.7,4.13,2.5.6,3,1.48,3,2.41,0,.69-.49,1.79-2.7,1.79-2.06,0-2.87-.92-2.98-2.1H6.32c.12,2.19,1.76,3.42,3.68,3.83V21h3V18.85c1.95-.37,3.5-1.5,3.5-3.55C16.5,12.46,14.07,11.49,11.8,10.9Z"
                                            transform="translate(-6.32 -3)"></path>
                                    </svg> Purchases</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false"><svg height="24"
                                        viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z">
                                        </path>
                                    </svg> Subscriptions</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false"><svg height="16"
                                        viewBox="0 0 20 16" width="20" xmlns="http://www.w3.org/2000/svg">
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
                                <a href="" class="big themecolor">Add a Product</a>
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
                                <table class="table variations_table event_tab_table text-left" id="variations_table">
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
                                    <a href="" class="big themecolor">Add a Product</a>
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


    <!-- Request Data Modal -->
    <div class="modal fade" id="requestDataModal" tabindex="-1" role="dialog" aria-labelledby="requestDataModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body requestDataModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ url('admin/assets/img/orders/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details approve_order_details ">
                        <div class="text-center">
                            <div class="approve_order_img request_data_img">
                                <img src="{{ url('admin/assets/img/orders/usericon.svg') }}" alt="">
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
                                    class="back_btn_img" src="{{ url('admin/assets/img/orders/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="delete_product_details text-center">
                        <div class="delete_product_img">
                            <img src="{{ url('admin/assets/img/orders/remove-icon.svg') }}" alt="">
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

</div>
@endsection

@section('scripts')
<script>

</script>
@endsection