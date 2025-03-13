<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment as PayPalPayment;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        // PayPal API context
        // $this->apiContext = new ApiContext(
        //     new OAuthTokenCredential(
        //         config('services.paypal.client_id'),
        //         config('services.paypal.client_secret')
        //     )
        // );
        // $this->apiContext->setConfig([
        //     'mode' => config('services.paypal.mode'),
        // ]);
    }

    public function createTransaction()
    {
        $data = Page::all();
        return view('pages.org.form', ['data' => $data]);
    }

    // public function processPayment(Request $request)
    // {
    //     if ($request->payment_method === 'stripe') {
    //         return $this->processStripePayment($request);
    //     } elseif ($request->payment_method === 'paypal') {
    //         return $this->processPayPalPayment($request);
    //     }

    //     return redirect()->back()->with('error', 'Invalid payment method.');
    // }

    // private function processStripePayment(Request $request)
    // {
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     try {
    //         $charge = Charge::create([
    //             'amount' => $request->amount * 100, // Amount in cents
    //             'currency' => 'usd',
    //             'source' => $request->stripeToken,
    //             'description' => 'Test Payment',
    //         ]);

    //         // Save payment details to the database
    //         Payment::create([
    //             'payment_id' => $charge->id,
    //             'amount' => $request->amount,
    //             'currency' => 'usd',
    //             'status' => $charge->status,
    //             'payment_method' => 'stripe',
    //         ]);

    //         return redirect()->route('payment.success')->with('success', 'Payment successful!');
    //     } catch (\Exception $e) {
    //         return redirect()->route('payment.form')->with('error', $e->getMessage());
    //     }
    // }

    // private function processPayPalPayment(Request $request)
    // {
    //     $payer = new Payer();
    //     $payer->setPaymentMethod('paypal');

    //     $amount = new Amount();
    //     $amount->setCurrency('USD')
    //         ->setTotal($request->amount);

    //     $transaction = new Transaction();
    //     $transaction->setAmount($amount)
    //         ->setDescription('Test Payment');

    //     $redirectUrls = new RedirectUrls();
    //     $redirectUrls->setReturnUrl(route('payment.paypal.success'))
    //         ->setCancelUrl(route('payment.form'));

    //     $payment = new PayPalPayment();
    //     $payment->setIntent('sale')
    //         ->setPayer($payer)
    //         ->setTransactions([$transaction])
    //         ->setRedirectUrls($redirectUrls);

    //     try {
    //         $payment->create($this->apiContext);
    //         return redirect($payment->getApprovalLink());
    //     } catch (\Exception $e) {
    //         return redirect()->route('payment.form')->with('error', $e->getMessage());
    //     }
    // }

    // public function paypalSuccess(Request $request)
    // {
    //     $paymentId = $request->input('paymentId');
    //     $payerId = $request->input('PayerID');

    //     if (empty($paymentId) || empty($payerId)) {
    //         return redirect()->route('payment.form')->with('error', 'Payment failed.');
    //     }

    //     $payment = PayPalPayment::get($paymentId, $this->apiContext);
    //     $execution = new PaymentExecution();
    //     $execution->setPayerId($payerId);

    //     try {
    //         $payment->execute($execution, $this->apiContext);

    //         // Save payment details to the database
    //         Payment::create([
    //             'payment_id' => $paymentId,
    //             'amount' => $payment->transactions[0]->amount->total,
    //             'currency' => $payment->transactions[0]->amount->currency,
    //             'status' => $payment->getState(),
    //             'payment_method' => 'paypal',
    //         ]);

    //         return redirect()->route('payment.success')->with('success', 'Payment successful!');
    //     } catch (\Exception $e) {
    //         return redirect()->route('payment.form')->with('error', $e->getMessage());
    //     }
    // }


    // public function paypalSuccess(Request $request)
    // {
    //     $paymentId = $request->input('paymentId');
    //     $payerId = $request->input('PayerID');

    //     if (empty($paymentId) || empty($payerId)) {
    //         return redirect()->route('payment.form')->with('error', 'Payment failed.');
    //     }

    //     try {
    //         $payment = PayPalPayment::get($paymentId, $this->apiContext);
    //         $execution = new PaymentExecution();
    //         $execution->setPayerId($payerId);
    //         $payment->execute($execution, $this->apiContext);

    //         // ✅ Ensure transactions exist before accessing them
    //         $transactions = $payment->getTransactions();
    //         if (empty($transactions) || !isset($transactions[0])) {
    //             return redirect()->route('payment.form')->with('error', 'Transaction data is missing.');
    //         }

    //         $amountDetails = $transactions[0]->getAmount();
    //         if (!$amountDetails) {
    //             return redirect()->route('payment.form')->with('error', 'Invalid payment amount.');
    //         }

    //         // Save payment details to the database
    //         Payment::create([
    //             'payment_id' => $paymentId,
    //             'amount' => $amountDetails->getTotal(),  // Ensure correct value
    //             'currency' => $amountDetails->getCurrency(),
    //             'status' => $payment->getState(),
    //             'payment_method' => 'paypal',
    //         ]);

    //         return redirect()->route('payment.success')->with('success', 'Payment successful!');
    //     } catch (\Exception $e) {
    //         return redirect()->route('payment.form')->with('error', $e->getMessage());
    //     }
    // }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        dd($paypalToken);
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "1000.00"
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction');
            // ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction');
            // ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()->route('createTransaction');
            // ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction');
            // ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction');
        // ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess()
    {
        return view('pages.org.success');
    }
}
