<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class PaymentController extends Controller
{
    public function makePayment() {
        $user = auth()->user();
       
        $amount = 10;
        $receipt = Str::random(5);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order  = $api->order->create(array('receipt' => $receipt, 'amount' => $amount * 100 , 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 
        $email = Payment::where('email',$user->email)->first();
        if($email) {
            // Auth::login($user);
            // return redirect()->route('dashboard');
        }
        $user_pay = new Payment();
    
        
        $user_pay->payment_id = $orderId;
        $user_pay->email = $user->email;
        $user_pay->name = $user->name;
        $user_pay->amount = $amount;
        $user_pay->save();
        // session()->forget(['user']);

        $data = array(
            'order_id' => $orderId,
            'amount' => $amount,
            'email' => $user->email,
            'password' => $user->email,
            'name' => $user->name
        );
        
        
        // Session::put('order_id', $orderId);
        // Session::put('amount' , $amount);
            session(['order_id' => $orderId,'amount' => $amount]);
          
        return view('payment')->with('data', $data);

    }
    public function success(Request $request) {
        // dd($email,$password);
        // dd($user);
        
        $input = $request->all();
                
        $pay = Payment::where('payment_id', $input['razorpay_order_id'])->first();
        // $pay = new Payment();
        
    
        $pay->payment_done = true;
        $pay->razorpay_id = $input['razorpay_payment_id'];
        

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

     

        try{
                $attributes = array(
                     'razorpay_signature' => $input['razorpay_signature'],
                     'razorpay_payment_id' => $input['razorpay_payment_id'],
                     'razorpay_order_id' => $input['razorpay_order_id']
                );
                $order = $api->utility->verifyPaymentSignature($attributes);
                $success = true;
                $user = User::where('email',auth()->user()->email)->first();

    
            }catch(SignatureVerificationError $e){
        
                $success = false;
            }
            if($success) {
                $user->is_subscribed = true;
                $user->save();
                
                $pay->save();
                return redirect()->route('dashboard');
                return view('success');
               
            } else {
               

                return redirect()->route('login')->with('errors','Something went wrong. Try again!');
            }
        

       

    }
}
