<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class cashfreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.paymentresponse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function redirectpage(Request $request)
    {
        $varanid = session('LoggedUser');
        // dd($varanid);
        // print_r($request->all());
        // dd($request);
        $varanid = $request->customerName;
        $orderId = $request->orderId;
        $orderAmount = $request->orderAmount;
        $referenceId = $request->referenceId;
        $txStatus = $request->txStatus;
        $paymentMode = $request->paymentMode;
        $txMsg = $request->txMsg;
        $txTime = $request->txTime;
        $signature = $request->signature;
        $secretkey = "TEST7fd0b337f70d9ad28f9dfa5b3c771012e6bde40a";
        $data = $orderId . $orderAmount . $referenceId . $txStatus . $paymentMode . $txMsg . $txTime;
        $hash_hmac = hash_hmac('sha256', $data, $secretkey, true);
        $computedSignature = base64_encode($hash_hmac);
        if ($signature == $computedSignature) {
            if ($txStatus == 'SUCCESS'){
                // success query
                     $updatepackage= DB::table('user_package')->where('payment_id',$orderId)->update(array(
                    'payment_status'=>'Success',
                ));

                $userdetails = DB::table('user_package')
                        ->select('*')
                        ->where('payment_id','=',$orderId)
                        ->first();
                $varanid = $userdetails->user_varan_id;

                $updateregister= DB::table('registers')->where('varan_id',$varanid)->update(array(
                    'member_shiptype'=>1,
                ));
                $login = DB::table('registers')
                        ->select('*')
                        ->where('varan_id','=',$varanid)
                        ->first();
                    $mblnum = $login->mobile_no;
                    $password = $login->password;

                    $usercheck = DB::table('registers')
                    ->select('*')
                    ->where('mobile_no','=',$mblnum)
                    ->where('password','=',$password)
                    ->where('status','=','1')
                    ->get();
                    // dd($usercheck);
                    if($usercheck->count() == 1)
                    {
                        $request->session()->put('LoggedUser',$varanid);
                        return redirect('/paymentresponse')->with('success','Registration Successfully');
                        // return "Approved";
                    }

            }else{
                // rejected query

            }
        }else{
            return redirect('cashfree-payment-gateway')->with('errorMessage', 'Signature not match');
        }

    }
}
