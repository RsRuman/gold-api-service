<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Checkout\Session;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRETE_KEY'));
    }

    public function createCustomer($user)
    {
        if ($user->subscription && $user->subscription->stripe_customer_id) {
            return $user->subscription->stripe_customer_id;
        }

        $customer = Customer::create([
            'email' => $user->email,
            'name' => $user->name,
        ]);

        $subscription = $user->subscription()->create([
            'stripe_customer_id' => $customer->id,
        ]);

        if (!$subscription) {
            return false;
        }

        return $customer->id;
    }

    public function createCheckoutSession($user, $priceId)
    {
        $customerId = $this->createCustomer($user);

        if (!$customerId) {
            return false;
        }

        $session = Session::create([
            'customer' => $customerId,
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $priceId,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
//            'subscription_data' => [
//                'trial_period_days' => 14,
//            ],
            'success_url' => route('subscription.success'),
            'cancel_url' => route('subscription.cancel'),
        ]);

        return $session;
    }

    public function getSubscriptionStatus($subscriptionId)
    {
        return Subscription::retrieve($subscriptionId);
    }
}
