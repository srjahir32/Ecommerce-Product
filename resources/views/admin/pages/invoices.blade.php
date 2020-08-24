@extends('admin.layout.main')
@section('content')

<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-sm-6 topbar_left pr-0">
                <h3 class="topbar_title mb-0"><img class="invoice_top_icon topbar_title_icon"
                        src="{{ asset('admin/assets/img/invoices/icon-sales.svg') }}" alt=""><span>Invoices & Orders</span>
                </h3>
            </div>
            <div class="col-sm-6 topbar_right">
                <!-- <div class="topbar_btn">
                    <button class="theme_btn ripple_btn" id="generate_invoice_btn" data-toggle="modal" data-target="#generateInvoiceModal">Create Invoice</button>
                        
                </div> -->
            </div>
        </div>
    </div>
    <div class="recommend_box d-none">
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

    <div class="dashboard_graph_tab invoice_graph_tab">
        <!-- Start Tabs -->
        <div class="tab-content chart_container">
            <div class="tab-pane fade show active" >
                <div class="dashboard_graph_tab_top_txt">
                    <div class="row invoice_counter1">
                        <div class="col-sm-4 total_revenue_txt pb-4">
                            <p class="graph_tab_top_title_txt">Total Customers</p>
                            <p class="graph_tab_icon_txt"><i class="fa fa-user pnp-text-color5"></i><span id="invoice_total_customers">{{$invoicerevenue[0]['total_customers']}}</span></p>                           
                        </div>
                        <div class="col-sm-4 active_customers_txt"></div>
                        <div class="col-sm-4 products_sold_txt">
                            <p class="graph_tab_top_title_txt">Products Sold</p>
                            <p class="graph_tab_icon_txt">
                                <img class="updown_arrow_img" src="{{ asset('admin/assets/img/dashboard/products_sold.svg') }}">
                                <span id="invoice_products_sold">
                                    @if($invoicerevenue[0]['products_sold'] != "")
                                        {{$invoicerevenue[0]['products_sold']}}
                                    @else
                                        0
                                    @endif
                                </span>
                            </p>                           
                        </div>
                    </div>
                    <div class="row invoice_counter2">
                        <div class="col-sm-4 total_revenue_txt">
                            <p class="graph_tab_top_title_txt">Average Order Value</p>
                            <p class="graph_tab_icon_txt">
                                <span class="currency_icon">₺</span>
                                <span id="invoice_average_total_revenue">
                                    @if($invoicerevenue[0]['average_total_revenue'] != "")
                                        {{$invoicerevenue[0]['average_total_revenue']}}
                                    @else
                                        0
                                    @endif 
                                </span>
                            </p>                           
                        </div>
                        <div class="col-sm-4 center_total_revenue">
                            <p class="graph_tab_top_title_txt">Total Revenue</p>
                            <p class="graph_tab_icon_txt">
                                <span class="currency_icon">₺</span>
                                <span id="invoice_total_revenue">
                                    @if($invoicerevenue[0]['total_revenue'] != "")
                                        {{$invoicerevenue[0]['total_revenue']}}
                                    @else
                                        0
                                    @endif   
                                </span>
                            </p>                           
                        </div>
                        <div class="col-sm-4 products_sold_txt">
                            <p class="graph_tab_top_title_txt">Average Products per Order</p>
                            <p class="graph_tab_icon_txt">
                                <img class="updown_arrow_img" src="{{ asset('admin/assets/img/dashboard/products_sold.svg') }}">
                                <span id="invoice_average_products_sold">
                                    @if($invoicerevenue[0]['average_products_sold'] != "")
                                        {{$invoicerevenue[0]['average_products_sold']}}
                                    @else
                                        0
                                    @endif
                                </span>
                            </p>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tabs -->
    </div>

    <div class="paymnet_getway_box invoices_box mb-5">
        <div class="row product_type_list">
            @if(count($pendingorderlist['data']) > 0)
            <a class="themecolor" href="paidinvoices">
                <div class="col-md-3" id="payfull_modal">
                    <div class="product_type_inner text-center"> 
                        <img class="paymnet_getway_img" src="{{url('admin/assets/img/invoices/multi.svg')}}">
                        <p class="product_type_title">Pending Orders</p>
                        <p class="product_type_txt"><span>{{count($pendingorderlist['data'])}}</span> pending orders</p> 
                        <p class="product_type_link themecolor mb-0">Manage</p>
                    </div>
                </div>
            </a>
            @endif
            <a href="allinvoices">
                <div class="col-md-3" id="payfull_modal">
                    <div class="product_type_inner text-center">
                        <img class="paymnet_getway_img" src="{{url('admin/assets/img/invoices/multi.svg')}}">
                        <p class="product_type_title">All Invoices</p>
                        <p class="product_type_txt"><span>{{count($allorderlist['data'])}}</span> invoices</p>
                        <p class="product_type_link themecolor mb-0">Manage</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>


@endsection
@section('scripts')

<script>
    $("#submenu1").addClass("show");
</script>
@endsection