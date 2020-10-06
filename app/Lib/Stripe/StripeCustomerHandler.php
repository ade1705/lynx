<?php
namespace App\Lib\Stripe;

use App\User;
use Stripe\Customer;

class StripeCustomerHandler
{
    /**
     * @param User $user
     * @return Customer
     */
    public function getCustomerStripeCustomerId(User $user): Customer
    {
        return $user->createOrGetStripeCustomer();
    }
}
