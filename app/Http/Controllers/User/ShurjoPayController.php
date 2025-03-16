<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Profile;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use App\Models\User;

class ShurjoPayController extends Controller
{
    protected $client;
    protected $username;
    protected $password;
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('SHURJOPAY_BASE_URL', 'https://sandbox.shurjopayment.com'); // Change to production URL later
        $this->client = new Client(['base_uri' => $this->baseUrl]);
        $this->username = env('SHURJOPAY_USERNAME', 'sp_test'); // Replace with your username
        $this->password = env('SHURJOPAY_PASSWORD', 'sp_test'); // Replace with your password
        
    }

    /**
     * Step 1: Get Authentication Token
     */
    public function getToken()
    {
        try {
            $response = $this->client->post('/api/get_token', [
                'json' => [
                    'username' => $this->username,
                    'password' => $this->password,
                ]
            ]);

            $body = json_decode($response->getBody(), true);
            
            return $body ?? null;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function pay_event(Request $request)
    {
        return $this->initiatePayment($request,Auth::user());
        return $request;
        return Auth::user()->profile;
        return Auth::user();
    }

    public function pay_membership(Request $request)
    {
        return $this->initiatePayment($request,Auth::user());
        return Auth::user()->profile;
        return Auth::user();
        return $request;
    }

    /**
     * Step 2: Initiate Payment
     */
    public function initiatePayment($request,$user)
    {
        $body = $this->getToken();

        $token = $body['token'];
        $storeId = $body['store_id'];
        

        if (!$token) {
            return response()->json(['error' => 'Failed to retrieve token']);
        }

        $txnId = uniqid(); // Unique transaction ID

        $paymentData = [
            'token' => $token,
            'store_id' => $storeId, // Provided by ShurjoPay
            'prefix' => env('SHURJOPAY_PREFIX','INV'),
            'currency' => 'BDT',
            'return_url' => route('shurjopay.callback'),
            'cancel_url' => route('shurjopay.cancel'),
            'amount' => $request->amount,
            'order_id' => $txnId,
            'customer_name' => $user->name,
            'customer_phone' => $user->profile->phone,
            'customer_email' => $user->email,
            // 'client_ip' => $request->ip(),
            'client_ip' => '12345',
            'customer_address' => $user->profile->address,
            'customer_city' => 'Dhaka',
            'value1' => $request->type,
            'value2' => $request->type_id,
            'value3' => $user->id,
            'value4' => '',
        ];

        $update_product = Order::where('transaction_id', $paymentData['order_id'])
        ->updateOrInsert([
            'name' => $paymentData['customer_name'],
            'email' => $paymentData['customer_email'],
            'phone' => $paymentData['customer_phone'],
            'amount' => $paymentData['amount'],
            'status' => 'Pending',
            'address' => $paymentData['customer_address'],
            'transaction_id' => $paymentData['order_id'],
            'currency' => $paymentData['currency'],
            'type' => $paymentData['value1'],
            'type_id' => $paymentData['value2'],
            'user_id' => $paymentData['value3'],
            'note' => json_encode($paymentData),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        try {

            $response = $this->client->post('/api/secret-pay', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'json' => $paymentData
            ]);

            $data = json_decode($response->getBody(), true);
            
            return redirect()->away($data['checkout_url']); // Redirect to ShurjoPay Gateway
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Payment Callback (return or cancel URL)
     */

     public function paymentCallback(Request $request)
     {
        $response = $this->verifyTransaction($request->order_id);
        
        $data = $response->getData();
        // dd($data);
        if($data[0]->bank_status == 'Success'){
            $this->success($data[0]);
            if($data[0]->value1 == 'membership'){
                return redirect()->route('user.dashboard')->with('success', 'Payment successful!');
            }

            if($data[0]->value1 == 'event'){
                return redirect()->route('seminar',['id'=>$data[0]->value2])->with('success', 'Order placed successfully!');
            }
           
        }
        if($data[0]->bank_status == 'Failed'){
            if($data[0]->value1 == 'membership'){
                return redirect()->route('user.dashboard')->with('error', 'Payment Failed, Please Try Again!');
            }
            if($data[0]->value1 == 'event'){
                return redirect()->route('seminar',['id'=>$data[0]->value2])->with('error', 'Transection faild please try again');
            }
           
        }
        
     }

    /**
     * Step 3: Payment Verification (after redirect)
     */
    public function verifyTransaction($order_id)
    {
        $body = $this->getToken();
        $token = $body['token'];
        

        if (!$token) {
            return response()->json(['error' => 'Failed to retrieve token']);
        }

        try {
            // $order_id = $request->order_id;

            $response = $this->client->post('/api/verification', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'json' => [
                    'order_id' => $order_id,
                    'token' => $token,
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function success($data)
    {
        // dd($data);
        
        $update_product = Order::where('transaction_id', $data->customer_order_id)
        ->update(['status' => 'Complete']);
        $order_details = Order::where('transaction_id', $data->customer_order_id)->get()->first();
        $this->completePayTask($order_details);
        return "Payment Success. Verifying now...";
    }

    public function cancel()
    {
        
        return "Payment Canceled!";
    }


    public function completePayTask($order_details)
    {

        // return $order_details;
        if($order_details->type=='membership'){
            $user = User::find($order_details->type_id);
            $user->paid='paid';
            $user->last_paid_on=date('Y-m-d H:i:s');
            $user->last_paid_order=$order_details->id;
            $user->validity=date('Y-m-d H:i:s', strtotime('+1 year'));
            $user->save();

            $profile = Profile::where('user_id',$user->id)->first();
            $profile->paid='paid';
            $profile->last_paid_on=date('Y-m-d H:i:s');
            $profile->last_paid_order=$order_details->id;
            $profile->validity=date('Y-m-d H:i:s', strtotime('+1 year'));
            $profile->save();

        }
        if($order_details->type=='event'){
            $user = User::find($order_details->user_id);
            $seminar = Seminar::find($order_details->type_id);
            if($user){
                if($seminar){
                    $seminar_registration = new SeminarRegistration();
                    $seminar_registration->user_id = $user->id;
                    $seminar_registration->seminar_id = $seminar->id;
                    $seminar_registration->order_id = $order_details->id;
                    $seminar_registration->payment_amount = $order_details->amount;
                    $seminar_registration->payment_date = date('Y-m-d H:i:s');
                    $seminar_registration->transaction_id = $order_details->transaction_id;
                    $seminar_registration->status = 'paid';
                    $seminar_registration->save();
                }
            }

        }
        return 'update success';
    }
}
