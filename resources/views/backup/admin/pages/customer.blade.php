@extends('admin.layout.main')
@section('content')
<?php //print_r($customers); ?>
<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-lg-4 topbar_left pr-0">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="{{ asset('admin/assets/img/customer/contacts.svg') }}" alt=""><span>Contacts</span></h3>
            </div>
            <div class="col-lg-8 topbar_right">
                <div class="search_form">
                    <div class="input-group">
                        <div class="input-group-prepend"> <span class="input-group-text"><i
                                    class='fas fa-search'></i></span> </div>
                        <input class="form-control search_field" id="search" name="search" placeholder="Search"
                            type="text">
                    </div>
                </div>
                <!-- <div class="topbar_btn">
                    <button class="theme_btn ripple_btn left_topbar_btn dark_btn" data-toggle="modal"
                        data-target="#">Add a Customer</button>
                   
                </div> -->
            </div>
        </div>
    </div>
    <div class="recommend_box">
        <p class="big">How likely are you to recommend this platform to other merchants?</p>
        <div id="starrate" class="starrate " data-val="" data-max="5" data-toggle="tooltip" data-placement="top"
            title=""> <span class="ctrl"></span> <span class="cont m-1">

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
        <table class="products_table pending_order_table table customers_list_table">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th class="text-center">Purchases</th>
                    <th class="text-center">Subscriptions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="all_customers_data">
                @if($customers['status'] == "1")
                @foreach ($customers['data'] as $customer)
                <tr class="customer_{{$customer['id']}} all_customers_list">
                    <td class="customer_list_name_imag_text">
                        <div class="customer_list_name_imag_text_inner"><img class="customer_list_img"
                                src="{{ asset('admin/assets/img/orders/person-icon.svg') }}" alt=""> <span
                                class="customer_list_name">{{$customer['customer_name']}}</span></div>
                    </td>
                    <td class="customer_list_email_text">{{$customer['customer_email']}}</td>
                    <td class="customer_list_country_text">{{$customer['country']}}</td>
                    <td class="customer_list_purchase_text text-center">1</td>
                    <td class="customer_list_subscription_text text-center">0</td>

                    <td class="customer_list_action_droupdown">
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="toggle_droupdown"
                                    src="{{ asset('admin/assets/img/orders/menu-icon.svg') }}"></a>
                            <div class="dropdown-menu pending_order_droupdown" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item" data-toggle="modal" data-target="#customerDetailModal"
                                    onClick="customerDetail({{$customer['id']}})" id="approve_order_option">View
                                    Page</a>
                                <a class="dropdown-item" data-toggle="modal" id="decline_order_option"
                                    data-target="#requestDataModal"
                                    onClick="customerrequestData({{$customer['id']}})">Request Data</a>

                                <a class="dropdown-item text-danger" data-toggle="modal"
                                    data-target="#removeCustomerModal" onClick="customerDelete({{$customer['id']}})"
                                    id="markpaid_order_option">Remove</a>

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
        <p class="big">You will soon be able to retarget your filtered customers with adhoc emails.</p>
    </div>
</div>



@endsection
@section('scripts')
<script>
$("#search").keyup(function() {
    var data = $("#search").val();
    console.log(data.length);
    if(data.length >0){
        $(".all_customers_list").hide();
   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('customer_serach_data') }}" ,
            type: "POST",
            data: {
                    search: data
            },
            success: function(res) {
                $(".all_customers_list").hide();
                $(".search_customer_list").hide()
                console.log(res);
                if (res['data']['message'] == "success") {
                    var res = res['data']['data'];
                    for(var i=0; i<res.length; i++ ){
                    $("#all_customers_data").append('<tr class="customer_'+res[i]['id']+' all_customers_list search_customer_list"> <td class="customer_list_name_imag_text"><div class="customer_list_name_imag_text_inner"><img class="customer_list_img" src="http://127.0.0.1:8000/admin/assets/img/orders/person-icon.svg" alt=""> <span class="customer_list_name">'+res[i]['customer_name']+'</span></div></td><td class="customer_list_email_text">'+res[i]['customer_email']+'</td><td class="customer_list_country_text">'+res[i]['country']+'</td><td class="customer_list_purchase_text text-center">1</td><td class="customer_list_subscription_text text-center">0</td><td class="customer_list_action_droupdown"><div class="dropdown"><a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false"><img class="toggle_droupdown"src="{{ asset("admin/assets/img/orders/menu-icon.svg") }}"></a><div class="dropdown-menu pending_order_droupdown" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" data-toggle="modal" data-target="#customerDetailModal" onClick="customerDetail("'+res[i]['id']+'")" id="approve_order_option">View Page</a> <a class="dropdown-item" data-toggle="modal" id="decline_order_option" data-target="#requestDataModal" onClick="customerrequestData("'+res[i]['id']+'")">Request Data</a> <a class="dropdown-item text-danger" data-toggle="modal" data-target="#removeCustomerModal" onClick="customerDelete("'+res[i]['id']+'")" id="markpaid_order_option">Remove</a></div></div></td></tr>')
                }
                }
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            }
        
        });
    }
    else{
        $(".all_customers_list").show();
        $(".search_customer_list").hide()
    }
});
</script>
@endsection