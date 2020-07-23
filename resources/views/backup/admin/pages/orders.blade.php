@extends('admin.layout.main')
@section('content')

<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="{{ asset('admin/assets/img/orders/icon-sales-side.svg') }}" alt=""><span>Orders</span></h3>
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
                @if($orderlist['status'] == "1")
                @php
                $i = 0;
                @endphp
                @foreach ($orderlist['data'] as $order)
                @php
                $i ++;
                @endphp
                <tr class="order_{{$order['id']}}">
                    <td>{{$i}}</td>
                    <td>{{$order['customer_name']}}</td>
                    <td><span class="currency_symbol">{{explode('-', $order['currency'])[0]}}</span>{{$order['total']}}</td>
                    <td>{{$order['payment_type']}}</td>
                    <td>
                        <div class="datetime_layout">
                            <div class="datetime_txt">
                                <p class="month_txt">{{ date('F', strtotime($order['created_at'])) }}</p>
                                <p class="day_txt">{{ date('d', strtotime($order['created_at'])) }}</p>
                            </div>
                            <p class="datetime_separator"><span>at</span></p>
                            <div class="time_layout">
                                <p><span class="hour_txt">{{ date('h', strtotime($order['created_at'])) }}</span> :
                                    <span class="hour_txt">{{ date('i', strtotime($order['created_at'])) }}<span></p>
                            </div>
                        </div>
                    </td>
                    @if($order['order_status'] == "0")
                    <td class="warning_txt" id="order_status">Pending (unpaid)</td>
                    @elseif($order['order_status'] == "1")
                    <td class="" id="order_status">New (unpaid)</td>
                    @elseif($order['order_status'] == "2")
                    <td class="text-success" id="order_status">Paid</td>
                    @elseif($order['order_status'] == "3")
                    <td class="warning_txt" id="order_status">Decline</td>
                    @endif
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="toggle_droupdown"
                                    src="{{ asset('admin/assets/img/orders/menu-icon.svg') }}"></a>
                            <div class="dropdown-menu pending_order_droupdown" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" data-toggle="modal" data-target="#viewOrderModal"
                                    id="viewpage_order_option" onClick="viewOrder({{$order['id']}})">View Page</a>
                                <a class="dropdown-item text-danger" data-toggle="modal" id="remove_order_option"
                                    data-target="#removeSaleModal" onClick="removeOrder({{$order['id']}})">Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="products_table_btm_txt">
        <p class="big">This self-updating page is where you can find and manage all of your orders.
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
                                    class="back_btn_img" src="{{ asset('admin/assets/img/orders/back-arrow.svg') }}"
                                    alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-5">
                            <div class="text-center">
                                <h3 class="modal_title">Order</h3>
                            </div>

                        </div>
                        <div class="col-md-5 save_btn_txt text-right">
                            <span id="pendingorder_viewmodal_btn">
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
                                <p id="product_name"></p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Customer</label>
                                <p id="customer_name"></p>
                            </div>

                            <div class="view_product_detail_txt">
                                <label>Bought from</label>
                                <p id="product_link_txt"><a href="" class="themecolor" id="product_link"></a></p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Plug</label>
                                <p id="order_plug"></p>
                            </div>

                            <div class="view_product_detail_txt">
                                <label>Payment Gateway</label>
                                <p id="payment_type">Cash on delivery</p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Checkout Duration</label>
                                <p id="checkout_time">3 Minutes 48 Secon</p>
                            </div>

                            <div class="view_product_detail_txt">
                                <label>Status</label>
                                <p id="order_status">Pending (Unpaid)</p>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Date</label>
                                <div class="datetime_layout">
                                    <div class="datetime_txt mt-1">
                                        <p class="month_txt" id="order_month"></p>
                                        <p class="day_txt" id="order_day"></p>
                                    </div>
                                    <p class="datetime_separator"><span>at</span></p>
                                    <div class="time_layout">
                                        <p><span class="hour_txt" id="order_hour"></span> : <span class="hour_txt"
                                                id="order_miniute"><span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="view_product_detail_txt">
                                <label>Address</label>
                                <p id="customer_address">3 Minutes 48 Secon</p>
                            </div>
                        </div>
                    </div>
                    <div class="row view_product_name view_pending_order_detail d-none">
                        <p class="big col-sm-6"><img src="{{ asset('admin/assets/img/orders/invoice_med.svg') }}"
                                alt="">Order Details
                        </p>
                        <p class="pending_order_download_txt col-sm-6">Download</p>
                    </div>

                    <div class="col-sm-12 pending_order_table d-none">
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
                                    <td class="text-right">₺1,000.00</td>
                                </tr>
                                <tr class="item last">
                                    <td colspan="2" class="text-right">Subtotal: ₺1,000.00</td>
                                </tr>
                                <tr class="item last">
                                    <td colspan="2" class="text-right">Total: ₺1,000.00</td>
                                </tr>
                                <tr class="total">
                                    <td colspan="2" class="text-right">Amount Due: ₺1,000.00</td>
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


    <!-- Remove Sale Modal -->
    <div class="modal fade" id="removeSaleModal" tabindex="-1" role="dialog" aria-labelledby="removeSaleModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body removeSaleModal_body">
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
                        <h3>Remove Sale</h3>
                        <p class="big">Are you sure you want to remove this sale ?</p>
                        <p class="text-danger">(This action cannot be reverted)</p>
                        <div class="product_remove_btn">
                            <input type="button" id="remove_order_btn" class="theme_btn ripple_btn dark_btn w-100 ml-0"
                                value="Yes, remove it">
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!--Remove Sale Modal end-->

   

</div>
@endsection

@section('scripts')
<script>

function viewOrder(id) {
    console.log("viewOrder", id);
    var product_staus;
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
                var date = moment.utc(res['created_at']);
                if (res['order_status'] == "0") {
                    product_staus = "Pending (Unpaid)";
                } else if (res['order_status'] == "1") {
                    product_staus = "New (unpaid)";
                } else if (res['order_status'] == "3") {
                    product_staus = "Decline";
                } else {
                    product_staus = "Paid";
                }


                $("#order_plug").html('Selling <span id="product_name">' + res['product_name'] +
                    '</span> with <span id="payment_type_opt">' + res['payment_type'] + '</span>');

                $("#viewOrderModal #product_name").html(
                    '<a href="" class="themecolor" data-toggle="modal" data-target="#viewProductModal" onClick="viewProduct(' +
                    res["product_id"] + ')">' + res["product_name"] + '</a>');
                $("#viewOrderModal #customer_name").html(
                    '<a href="" class="themecolor" data-toggle="modal" data-target="#customerDetailModal" onClick="customerDetail(' +
                    res["id"] + ')">' + res["customer_name"] + '</a>');
                $("#viewOrderModal #payment_type_opt").text(res['payment_type']);
                $("#viewOrderModal #payment_type").text(res['payment_type']);
                $("#viewOrderModal #order_status").text(product_staus);
                $("#viewOrderModal #order_month").text(date.format('MMMM'));
                $("#viewOrderModal #order_day").text(date.format('DD'));
                $("#viewOrderModal #order_hour").text(date.format('h'));
                $("#viewOrderModal #order_miniute").text(date.format('mm'));
                $("#viewOrderModal #customer_address").text(res['address']+', '+res['city']+' '+res['zip']+', '+res['country']);

                var url = "{{url('/')}}/l/" + res['link'];
                console.log(url);
                $("#viewOrderModal #product_link").text("{{url('/')}}");
                $("#viewOrderModal #product_link").attr("href", url);
                var plug = $("#order_plug").text();
                var plu_str = plug.substring(0, 15) + "...";
                $("#order_plug").text(plu_str);
            }
            // if(res['product']['status']== "1"){
            //     
            // }
        },
        error: function(jqXHR, textStatus, errorMessage) {
            console.log(errorMessage); // Optional
        }
    });
}

function removeOrder(id) {
    $("#remove_order_btn").click(function() {
        console.log("removeOrder", id);
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('removeorder') }}/" + id,
            type: "POST",
            success: function(res) {
                console.log(res);
                if (res['data']['status'] == "1") {
                    $(".order_" + id + "").remove();
                    $("#removeSaleModal, #viewOrderModal").modal('hide');
                    $("#status").html('<div class="alert alert-success"><strong>Success!</strong> Order Remove successfully.</div>');
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
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        });
    })

}

</script>
@endsection