<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\company;
use App\Models\order;
use App\Models\pricing;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
     public function dashboard(){
       if(Auth::guard('company')->user()->status == 1){
         return redirect()->back()->with('error' , 'your email address has not been verified');
       }else{
        return view('company.dashboard');
       }

     }



     public function orders(){
        $orders = order::with('rPricing')->orderBy('id' , 'desc')->where('company_id' , Auth::guard('company')->user()->id)->get();
        return view('company.orders',compact('orders'));
     }


     public function make_payment(){

        $currently_plan = order::with('rPricing')->where('company_id' , Auth::guard('company')->user()->id)->where('currently_active' , 1)->first();

        $packages = pricing::get();

        return view('company.make_payment',compact('currently_plan','packages'));
     }


     public function paypal(Request $request)
    {

        $package_data = pricing::where('id' , $request->package_id)->first();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $package_data->package_price
                    ]
                ]
            ]
        ]);

        //dd($response);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    session()->put('package_id' , $package_data->id);
                    session()->put('package_price' , $package_data->package_price);
                    session()->put('package_days' , $package_data->package_days);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        //dd($response);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Save Data To Order DB
            $data['currently_active'] = 0;
            order::where('company_id',Auth::guard()->user()->id)->update($data);
            $days = session()->get('package_days');
            order::create([
                'company_id'=>Auth::guard()->user()->id,
                'packeage_id'=> session()->get('package_id'),
                'order_no'=>time(),
                'paid_amount'=>session()->get('package_price'),
                'payment_method'=>'PayPal',
                'start_date'=>date('Y-m-d'),
                'expire_date'=>date('Y-m-d' , strtotime("+$days days")),
                'currently_active'=>1

            ]);

            return redirect()->route('company_make_payment')->with('succes','Payment is successful!');
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error','Payment is cancelled!');
    }
}
