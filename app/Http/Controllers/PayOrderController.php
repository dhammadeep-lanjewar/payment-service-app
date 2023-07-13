<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;

class PayOrderController extends Controller
{
    //
    public function store(OrderDetails $orderDetails,PaymentGatewayContract $paymentGatewayContract){
        $order = $orderDetails->all();
        dd($paymentGatewayContract->charge(2500));
    }
    // public function store(){
    //     $paymentGateway = new PaymentGateway('usd');
    //     dd($paymentGateway->charge(2500));
    // }
}
