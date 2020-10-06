<?php
namespace App\Lib\Stripe;

use App\Lib\Customer\Customer;
use App\Lib\Orders\Order;
use App\User;
use Laravel\Cashier\Invoice;

class StripeInvoiceHandler
{

    /**
     * @param User $user
     * @param Order $order
     * @return Invoice
     * @throws \Laravel\Cashier\Exceptions\PaymentActionRequired
     * @throws \Laravel\Cashier\Exceptions\PaymentFailure
     */
    public function create(User $user, Order $order): Invoice
    {
        $user->invoiceFor($order->order_job_name, $order->order_price);
    }
}
