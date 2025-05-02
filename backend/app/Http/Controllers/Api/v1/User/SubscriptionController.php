<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\StripeService;
use Stripe\Stripe;
use Stripe\Webhook;
use Illuminate\Support\Facades\Log;


class SubscriptionController extends Controller
{
    public function subscribe(Request $request, StripeService $stripe)
    {
        $user = Auth::user();
        $plan = env('STRIPE_BASIC_PRODUCT_PRICE_ID'); //$request->get('plan'); // expects Stripe Price ID

        $session = $stripe->createCheckoutSession($user, $plan);

        if (!$session) {
            return response()->json([
                'message' => 'Could not create stripe session.',
            ], 422);
        }

        return response()->json(['url' => $session->url], 201);
    }

    public function success(Request $request)
    {
        return response()->json([
            'message' => 'Subscription Successful!'
        ], 200);
    }

    public function cancel(Request $request)
    {
        return response()->json([
            'message' => 'Subscription Canceled.'
        ], 200);
    }

    public function getUserSubscription(Request $request, $subscriptionId)
    {
        Stripe::setApiKey(env('STRIPE_SECRETE_KEY'));

        $subscription = \Stripe\Subscription::retrieve($subscriptionId);
        $endsAt = \Carbon\Carbon::createFromTimestamp($subscription->items['data'][0]['current_period_end']);

        return response()->json([
            'account_ends_at' => $endsAt,
        ], 200);
    }

    public function webhook(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRETE_KEY'));

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = env('STRIPE_WEBHOOK_SECRETE');

        $event = Webhook::constructEvent($payload, $sigHeader, $secret);

        if ($event->type === 'customer.subscription.created' || $event->type === 'customer.subscription.updated') {
            $subscription = $event->data->object;
            $user = Subscription::where('stripe_customer_id', $subscription->customer)->first()->user;

            if ($user) {
                $user->subscription->stripe_subscription_id = $subscription->id;
                $user->subscription->subscription_ends_at = date('Y-m-d H:i:s', $subscription->items->data[0]->current_period_end);
                $user->subscription->trial_ends_at = $subscription->trial_end
                    ? date('Y-m-d H:i:s', $subscription->trial_end)
                    : null;
                $user->subscription->save();

                Log::info('Subscription successfully updated.');
            }
        }

        return response()->json(['status' => 'success']);
    }

}
