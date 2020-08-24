<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
  <style>
    .pending_order_table .table td {
        padding: 5px;
        border-top: 0;
    }

    table.table.top_table td {
        text-align: right;
    }

    .pending_order_table p.order_title, .pending_order_table .total td {
        font-size: 22px;
    }
    .pending_order_table td p {
        margin-bottom: 0;
    }
    .pending_order_table td.right_table_txt {
        text-align: right;
    }

    .pending_order_table tr.center_table td {
        padding: 20px 0;
    }

    .pending_order_table tr.heading.bottom_table td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        padding: 5px;
    }

    .pending_order_table table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .pending_order_table tr.total {
        border-top: 3px solid #eee;
    }
    #invoice_productcurrency {
        font-family: DejaVu Sans; sans-serif;
    }
  </style>
</head>
<body>
@php
    date_default_timezone_set('Turkey');
@endphp
@if($orderdetail['status'] == "1")

<div class="pending_order_table">
    <table class="table " cellpadding="0" cellspacing="0">
        <tbody>
            <tr class="">
                <td colspan="2">
                    <table class="table top_table">
                        <tbody>
                            <tr>
                                <td></td>
                                <td class="invoice_details">
                                    @if($orderdetail['data'][0]['order_status'] == 0)
                                        <p class="order_title"><b>Order</b></p>
                                        <p id="invoice_date">{{ date('d/m/Y', strtotime($orderdetail['data'][0]['created_at'])) }}</p>
                                        <p>Payment Method: <span id="invoice_paymentmethod">
                                            @if($orderdetail['data'][0]['payment_type'] == 'Cash')
                                                Cash on Delivery
                                            @else
                                                Payfull
                                            @endif
                                        </span></p>
                                        <p>Status: <span id="invoice_status">Unpaid<span></p>
                                    @else
                                        
                                        @if($orderdetail['data'][0]['order_status'] == 3)
                                            <p class="order_title"><b>Order</b></p>
                                            <p id="invoice_date">{{ date('d/m/Y', strtotime($orderdetail['data'][0]['created_at'])) }}</p>
                                        @else
                                            <p class="order_title"><b>Invoice</b></p>
                                            <p id="invoice_number">Invoice Number: {{$orderdetail['data'][0]['id']}}</p>
                                            <p id="invoice_date">Date of Invoice: {{ date('d/m/Y', strtotime($orderdetail['data'][0]['created_at'])) }}</p>
                                        @endif
                                        <p>Payment Method: <span id="invoice_paymentmethod">
                                            @if($orderdetail['data'][0]['payment_type'] == 'Cash')
                                                Cash on Delivery
                                            @else
                                                Payfull
                                            @endif
                                        </span></p>

                                        <p>Status: <span id="invoice_status">
                                        @if($orderdetail['data'][0]['order_status'] == 3)
                                            Decline
                                        @elseif($orderdetail['data'][0]['order_status'] == 2)
                                            Paid
                                        @else
                                            Unpaid
                                        @endif    
                                        <span></p>
                                    @endif
                                    
                                </td>
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
                                @if($businessdata['status'] == 1)
                                    <p id="invoice_username"><b>{{$businessdata['data'][0]['business_name']}}</b></p>
                                    <p>{{$businessdata['data'][0]['email']}}<p>
                                    <p>{{$businessdata['data'][0]['address']}}<p>
                                    <p>{{$businessdata['data'][0]['city']}} {{$businessdata['data'][0]['state']}} {{$businessdata['data'][0]['postal_code']}}</p>
                                    <p>{{$businessdata['data'][0]['country']}}<p>
                                @else
                                    <p id="invoice_username"><b>{{$userdetail['success']['first_name']}}</b></p>
                                    <p id="invoice_useremail">{{$userdetail['success']['email']}}</p>
                                    <p>Turkey</p>
                                @endif
                                </td>
                                <td class="right_table_txt">
                                    <p id="invoice_customername"><b>{{$orderdetail['data'][0]['customer_name']}}</b></p>
                                    <p id="invoice_customeremail">{{$orderdetail['data'][0]['customer_email']}}</p>
                                    <p id="invoice_customeraddress">{{$orderdetail['data'][0]['address']}}</p>
                                    <p><span id="invoice_customercity">{{$orderdetail['data'][0]['city']}}</span> <span
                                            id="invoice_customerstate">{{$orderdetail['data'][0]['state']}}</span> <span
                                            id="invoice_customerzip">{{$orderdetail['data'][0]['zip']}}</span></p>
                                    <p id="invoice_customercountry">{{$orderdetail['data'][0]['country']}}</p>
                                </td>
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
                <td><span id="invoice_productqty">{{$orderdetail['data'][0]['quantity']}}</span> x <span id="invoice_productname">{{$orderdetail['data'][0]['product_name']}}</span></td>
                <td class="text-right"><span id="invoice_productcurrency">{{explode('-', $orderdetail['data'][0]['currency'])[0]}}</span><span
                        id="invoice_producttotal">{{$orderdetail['data'][0]['total']}}</span></td>
            </tr>
            <tr class="item last">
                <td colspan="2" class="text-right">Subtotal: <span id="invoice_productcurrency">{{explode('-', $orderdetail['data'][0]['currency'])[0]}}</span><span
                        id="invoice_producttotal">{{$orderdetail['data'][0]['total']}}</span></td>
            </tr>
            <tr class="item last">
                <td colspan="2" class="text-right">Total: <span id="invoice_productcurrency">{{explode('-', $orderdetail['data'][0]['currency'])[0]}}</span><span
                        id="invoice_producttotal">{{$orderdetail['data'][0]['total']}}</span></td>
            </tr>
            <tr class="total">
                <td colspan="2" class="text-right"><b>Amount Due: <span id="invoice_productcurrency">{{explode('-', $orderdetail['data'][0]['currency'])[0]}}</span><span
                            id="invoice_producttotal">{{$orderdetail['data'][0]['total']}}</span></b></td>
            </tr>
        </tbody>
    </table>
</div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>