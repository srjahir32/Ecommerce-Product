@extends('admin.layout.main') 
@section('content')
<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-lg-12 topbar_left pr-0">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="{{ asset('admin/assets/img/paymnetgetway/payments.svg') }}" alt=""><span>Payment
                        Methods</span></h3>
            </div>
        </div>
    </div>
    <div class="paymnet_getway_box mb-5">
        <div class="row product_type_list">
            <div class="col-md-3 product_type" id="payfull_modal" data-toggle="modal" data-target="#payfullmethodModal">
                <div class="product_type_inner text-center"> <img class="paymnet_getway_img"
                        src="{{ asset('admin/assets/img/paymnetgetway/payfull.png')}}">
                    <p class="product_type_title">Payfull</p>
                    <p class="product_type_txt">Your bank account information is shown in the invoices for successful
                        orders.</p> <a class="product_type_link themecolor">Active</a>
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection
@section('scripts')

@endsection