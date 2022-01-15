<?php
//==================================== Adaptar Pattern =====================================

interface PaymentGateway{
    function sendPayment($payment);
}
class Paypal implements PaymentGateway{
    function sendPayment($payment){
        echo "{$payment} processed";
    }
}
class Paymentprocess{
    private $pg;
    function __construct(PaymentGateway $pg){
        $this->pg = $pg;
    }
    function PurchaseProduct($amount){
       return $this->pg->sendPayment($amount);
    }
}
class Stripe{
    function makePayment($amount, $currency=null){
        echo "{$amount} processed by Stripe";
    }
}
class StripeAdaptar implements PaymentGateway{
    protected $stripe;
     function __construct($stripe){
        $this->stripe = $stripe;
     }
    function sendPayment($amount){
        $this->stripe->makePayment($amount);
    }
}

$paypal = new Paypal();
$stripe = new Stripe();
$stripeAdaptar = new StripeAdaptar($stripe);
$pp = new Paymentprocess($stripeAdaptar);
 $pp->PurchaseProduct(45);