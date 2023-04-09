<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Exception;
use Razorpay\Api\Errors\SignatureVerificationError;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // $amount = 10;
        // $receipt = Str::random(5);
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // $order  = $api->order->create(array('receipt' => $receipt, 'amount' => $amount * 100 , 'currency' => 'INR')); // Creates order
        // $orderId = $order['id']; 

        // $user_pay = new Payment();
    
        // $user_pay->amount = $amount;
        // $user_pay->payment_id = $orderId;
        // $user_pay->save();

        // $data = array(
        //     'order_id' => $orderId,
        //     'amount' => $amount
        // );
        // dd($data);

        
        // Session::put('order_id', $orderId);
        // Session::put('amount' , $amount);
            // session(['order_id' => $orderId,'amount' => $amount]);
          
        // return view('auth.register')->with('data', $data);
        return view('auth.register1');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $input = $request->all();
        

        // $pay = Payment::where('payment_id', $input['razorpay_order_id'])->first();
        // // $pay = new Payment();
        
        // $pay->name = $input['name'];
        // $pay->payment_id = $input['razorpay_order_id'];
        // $pay->payment_done = true;
        // $pay->razorpay_id = $input['razorpay_payment_id'];
        // $pay->amount = session('amount');


        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
             
        // // $payment = $api->payment->fetch($input['razorpay_payment_id']);

        // try{
        //     $attributes = array(
        //          'razorpay_signature' => $input['razorpay_signature'],
        //          'razorpay_payment_id' => $input['razorpay_payment_id'],
        //          'razorpay_order_id' => $input['razorpay_order_id']
        //     );
        //     $order = $api->utility->verifyPaymentSignature($attributes);
        //     $success = true;

        // }catch(SignatureVerificationError $e){
    
        //     $succes = false;
        // }

        // if($success){
        //     $pay->save();
        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //     ]);
              
        //     session()->forget(['amount','order_id']);
    
        //     event(new Registered($user));
    
        //     Auth::login($user);
    
    
        //     return redirect(RouteServiceProvider::HOME);
        // } else {
        //     $pay->delete();
        //     return redirect()->back()->with('msg','Something went wrong! Try Again');
        // }

  
        // if(count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {

              
        //      $user = Payment::where('name', $input['name'])->first();
           
        //      $user->razorpay_id = $input['razorpay_payment_id'];
        //      $user->payment_done = true;
        //      $user->save();
        //      $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
            
               
        //     } catch (Exception $e) {
        //         return  $e->getMessage();
        //         Session::put('error',$e->getMessage());
        //         return redirect()->back();
        //     }
        // }
          
        // Session::put('success', 'Payment successful');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'phone' => $request->phone
        ]);
          

        event(new Registered($user));

        Auth::login($user);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name
        ];

        // return redirect()->route('pay');
         return redirect(RouteServiceProvider::HOME);
    }
}
