<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\User;

class OrderController extends Controller
{

    public function saveorderdetail(Request $request)
    {
        $input = $request->all();
        // return explode('-', $input['currency'])[0];
        if($input['payment_type'] == 'Payfull') {
            $cardexpiry = explode("/ ", $input['cardexpiry']);
            $expirymonth = trim($cardexpiry[0]);
            $expiryyear = trim($cardexpiry[1]);
            $api_url = 'https://demo1.payfull.com/integration/api/v1';
            $merchantPassword = 'suraj123?';
            $params = array(
                "merchant" => 'suraj',
                "type" => 'Sale',
                "total" => $input['product_total_price'],
                "cc_name" => $input['cardname'],
                "cc_number" => $input['cardnumber'],
                "cc_month" => $expirymonth,
                "cc_year" => $expiryyear,
                "cc_cvc" => $input['cardcvc'],

                "currency" => 'TRY',
                "installments" => 1,
                "language" => 'en',
                "client_ip" => '192.168.1.1',
                "payment_title" => 'test payment title',
                // "bank_id"         => 'Akbank',
                // "gateway"         => '160',

                "customer_firstname" => $input['firstname'],
                "customer_lastname" => $input['lastname'],
                "customer_email" => $input['email'],
                "customer_phone" => $input['mobile'],
                // "customer_tc"        => '12590326514',

                // "passive_data"  => 'write here what you like',
            );

            ksort($params);
            $hashString = "";
            foreach ($params as $key => $val) {
                $l = mb_strlen($val);
                if ($l) {
                    $hashString .= $l . $val;
                }

            }

            $params["hash"] = hash_hmac("sha256", $hashString, $merchantPassword);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            $response = curl_exec($ch);

            $curlerrcode = curl_errno($ch);
            $curlerr = curl_error($ch);

            // print_r(json_encode($response));

            if (!curl_exec($ch)) {
                // if curl_exec() returned false and thus failed
                return curl_error($ch);
            } else {
                $json_data = json_decode($response,true);

                if($json_data['status'] == "1") {
                    $data = [
                        'user_id' => $input['user_id'],
                        'product_id' => $input['product_id'],
                        'customer_name' => $input['firstname'] . " " . $input['lastname'],
                        'customer_email' => $input['email'],
                        'address' => $input['address'],
                        'city' => $input['city'],
                        'state' => $input['state'],
                        'zip' => $input['zip'],
                        'country' => $input['country'],
                        'product_name' => $input['product_name'],
                        'price' => $input['product_price'],
                        'quantity' => $input['cart_item'],
                        'total' => $input['product_total_price'],
                        'customer_mobile' => $input['mobile'],
                        'card_number' => $input['cardnumber'],
                        'card_expiry' => $input['cardexpiry'],
                        'card_cvc' => $input['cardcvc'],
                        'card_name' => $input['cardname'],
                        'payment_type' => $input['payment_type'],
                        'currency' => $input['currency'],
                    ];
                    // return $data;
                    $request = Request::create(url('/api/order/create'), 'POST', $data);
                    $res = app()->handle($request);
                    $order_data = json_decode($res->getContent(), true);
                    // return $order_data;
                    if($order_data['status'] == "1"){
                        $email =  User::where('id', $input['user_id'])->value('email');
                        $to_seller_email = $email;
                        $to_seller_name = "New sale Ecommerce Product";

                        $data = array('customer_name' => $input['firstname'], 'address' => $input['address'], 'city' =>$input['city'].' '.$input['zip'], 'country' => $input['country'], 'item' => $input['product_name'], 'quantity' => $input['cart_item'], 'currency' => explode('-', $input['currency'])[0], 'price' => $input['product_price'], 'total' => $input['product_total_price']);
                
                        Mail::send('email.newordersaller', $data, function ($message) use ($to_seller_name, $to_seller_email) {
                            $message->to($to_seller_email, $to_seller_name)
                                ->subject('New sale Ecommerce Product');
                            $message->from('payfull@emrahduman.com', 'New sale Ecommerce Product');
                            
                        }); 
                        
                        $to_customer_email = $input['email'];
                        $to_customer_name = "New sale pending Ecommerce Product";
                        Mail::send('email.newordercustomer', $data, function ($message) use ($to_customer_name, $to_customer_email) {
                            $message->to($to_customer_email, $to_customer_name)
                                ->subject('New sale pending Ecommerce Product');
                            $message->from('payfull@emrahduman.com', 'New sale pending Ecommerce Product');
                            
                        }); 
                    }
                    return response()->json(['data' => $order_data]);
                }
                else{
                    return response()->json(['data' => $json_data]);
                }
            }
        } else {
                $data = [
                    'user_id' => $input['user_id'],
                    'product_id' => $input['product_id'],
                    'customer_name' => $input['firstname'] . " " . $input['lastname'],
                    'customer_email' => $input['email'],
                    'address' => $input['address'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'zip' => $input['zip'],
                    'country' => $input['country'],
                    'product_name' => $input['product_name'],
                    'price' => $input['product_price'],
                    'quantity' => $input['cart_item'],
                    'total' => $input['product_total_price'],
                    'customer_mobile' => $input['mobile'],
                    'payment_type' => $input['payment_type'],
                    'currency' => $input['currency'],
                ];
                // return $data;
                $request = Request::create(url('/api/order/create'), 'POST', $data);
                $res = app()->handle($request);
                $order_data = json_decode($res->getContent(), true);
                // return $order_data;
                if($order_data['status'] == "1"){
                    $email =  User::where('id', $input['user_id'])->value('email');
                    $to_seller_email = $email;
                    $to_seller_name = "New sale Ecommerce Product";

                    $data = array('customer_name' => $input['firstname'], 'address' => $input['address'], 'city' =>$input['city'].' '.$input['zip'], 'country' => $input['country'], 'item' => $input['product_name'], 'quantity' => $input['cart_item'], 'currency' => explode('-', $input['currency'])[0], 'price' => $input['product_price'], 'total' => $input['product_total_price']);
            
                    Mail::send('email.newordersaller', $data, function ($message) use ($to_seller_name, $to_seller_email) {
                        $message->to($to_seller_email, $to_seller_name)
                            ->subject('New sale Ecommerce Product');
                        $message->from('payfull@emrahduman.com', 'New sale Ecommerce Product');
                        
                    }); 
                    
                    $to_customer_email = $input['email'];
                    $to_customer_name = "New sale pending Ecommerce Product";
                    Mail::send('email.newordercustomer', $data, function ($message) use ($to_customer_name, $to_customer_email) {
                        $message->to($to_customer_email, $to_customer_name)
                            ->subject('New sale pending Ecommerce Product');
                        $message->from('payfull@emrahduman.com', 'New sale pending Ecommerce Product');
                        
                    });
                } 
                return response()->json(['data' => $order_data]);
        }
    }
}
