<?php

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function makePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => 1000, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Example Charge',
            ]);

            // Handle successful payment
            return redirect()->back()->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            // Handle payment failure
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}