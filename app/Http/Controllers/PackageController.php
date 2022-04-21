<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $varanid = session('LoggedUser');
       $packages = DB::table('packages')
        ->select('*')
        ->get();

        $userpackagecount = DB::table('user_package')
        ->select('*')
        ->get();

        $userdetails = DB::table('registers')
        ->select('*')
        ->where('varan_id','=',$varanid)
        ->first();

        // dd($userdetails);
        return view('pages.package',compact('packages','userpackagecount','userdetails'));
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
        //
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

    public function userpaymentreq(Request $request)
    {
        $mode = "TEST";
        $secretKey = "TEST7fd0b337f70d9ad28f9dfa5b3c771012e6bde40a";
        $orderNote = $request->orderNote;
        $orderCurrency = $request->orderCurrency;
        $varanid = $request->customerName;
        $customerEmail = $request->customerEmail;
        $customerPhone = $request->customerPhone;
        $orderAmount = $request->orderAmount;
        $returnUrl = $request->returnUrl;
        $appid = $request->appId;
        $orderId = $request->orderId;
        $notifyUrl = $request->notifyUrl;
        $no_of_video = $request->no_of_video;
        $no_of_image = $request->no_of_image;
        $no_of_phno = $request->no_of_phno;
        $enable_chat = $request->enable_chat;
        $enable_horoschope = $request->enable_horoschope;
        $validity_date = $request->validity_date;

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');
        $expiredate = date('Y-m-d H:i:s',strtotime('+'.$validity_date.' days',strtotime($datetime)));

        $inserpackage = DB::table('user_package')->insert(
            array(
                   'user_varan_id'   =>   $varanid,
                   'package_name'   =>   $orderNote,
                   'package_price'   =>   $orderAmount,
                   'no_of_video'   =>   $no_of_video,
                   'no_of_image'   =>   $no_of_image,
                   'no_of_phno'   =>   $no_of_phno,
                   'enable_chat'   =>   $enable_chat,
                   'enable_horoschope'   =>   $enable_horoschope,
                   'validity_date'   =>   $expiredate,
                   'payment_status' => 'Pending',
                   'payment_id' => $orderId
            )
       );

        // dd($notifyUrl);
        $signatureData = "appId".$request->appId."customerEmail".$customerEmail."customerName".$varanid."customerPhone".$customerPhone."notifyUrl".$notifyUrl."orderAmount".$orderAmount."orderCurrency".$orderCurrency."orderId".$orderId."orderNote".$orderNote."returnUrl".$returnUrl;

        $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
        $signature = base64_encode($signature);


        // dd($signature);

        if ($mode == "PROD") {
            $url = "https://www.cashfree.com/checkout/post/submit";
          } else {
            $url = "https://test.cashfree.com/billpay/checkout/post/submit";
          }

        return view('pages.paymentredirection',compact('url','secretKey','appid','orderId','orderAmount','orderCurrency','orderNote','returnUrl','varanid','customerEmail','customerPhone','signature','notifyUrl'));

        // dd($request);

    }


}
