<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use App\Models\order;
use App\Models\pricing;
use Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CompanyController extends Controller
{
     public function dashboard(){
       if(Auth::guard('company')->user()->status == 1){
         return redirect()->back()->with('error' , 'your email address has not been verified');
       }else{
        return view('company.dashboard');
       }

     }


     public function make_payment(){

        $currently_plan = order::where('company_id' , Auth::guard('company')->user()->id)->where('currently_active' , 1)->first();

        $packages = pricing::get();

        return view('company.make_payment',compact('currently_plan','packages'));
     }


     public function paypal(Request $request)
    {

        $package_data = pricing::where('id' , $request->package_id)->first();
        dd($package_data);

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
                        "value" => $request->price
                    ]
                ]
            ]
        ]);

        //dd($response);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
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
            return "Payment is successful!";
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return "Payment is cancelled!";
    }
}
