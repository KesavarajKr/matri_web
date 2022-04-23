<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\register;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'mblnum'=>'required',
                'pwd'=>'required'
            ]
            );

            $mblnum = $request->input('mblnum');
            $pwd = $request->input('pwd');



                $user = DB::table('registers')
                ->select('*')
                ->where('mobile_no','=',$mblnum)
                ->where('password','=',$pwd)
                ->first();
                // dd($user);
                // $user = register::where('mobile_no',$mblnum)->first();
                // Auth::login($user);
                // return redirect('aboutme');

                if($user)
                {


                    $usercheck = DB::table('registers')
                    ->select('*')
                    ->where('mobile_no','=',$mblnum)
                    ->where('password','=',$pwd)
                    ->where('status','=','1')
                    ->get();
                    // dd($usercheck);
                    if($usercheck->count() == 1)
                    {
                        $request->session()->put('LoggedUser',$user->varan_id);

                        $ip = $request->ip();
                        $varanid=$user->varan_id;

                        $updatedata= DB::table('logdetails_tb')->insert(
                            ['user_id' => $varanid, 'user_ip' => $ip]);
                        return redirect('aboutme');
                        // return "Approved";

                    }
                    else
                    {
                        // return "Not Approved";
                        return back()->with('error','Your Details reviewed please wait while approvad');
                    }

                }
                else
                {
                    return back()->with('error','Incorrect Credientials');
                }

    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }

    public function loginotp(Request $request)
    {
        $mobileno = $request->mblnum;

        $mblcheck = DB::table('registers')
        ->select('*')
        ->where('mobile_no','=',$mobileno)
        ->get();
        // dd($mblcheck->count());

        if($mblcheck->count() == 0)
        {
            return redirect('/login-otp')->with('success','Mobile Number Not Valid Please check your mobile number');
        }
        else
        {

            $code=rand(1000,10000);
            $phone = $mobileno;

         //   require_once('sendsms/sendsms.php');
         $token="87c13d427e12b47a9f6535878483d96a";
         $credit="2";
         $sender="STSCBE";
         $mobile_number=$phone;

         //Enter your text message
         $message="OTP for your Sai Techno Solutions Login Verification is $code. Do Not Share this with anyone. - Sai
     Techno Solutions";

     $url="http://sms.saitechnosolutions.net/sendsms/?token=87c13d427e12b47a9f6535878483d96a&credit=3&sender=".urlencode($sender)."&message=".urlencode($message)."&number=".urlencode($mobile_number)."&templateid=1707164931307644321";




              $ch = curl_init();
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch,CURLOPT_HEADER,false);
              $response = curl_exec($ch);
              $err = curl_error($ch);
              curl_close($ch);

//Enter your receiver mobile number
$mobile_number=$mobileno;

date_default_timezone_set("Asia/Kolkata");
       $datetime = date('Y-m-d h:i:s');
       $datetime = date('Y-m-d H:i:s',strtotime('+30 second',strtotime($datetime)));

DB::table('otp_db')->insert(
   array(
          'otp'     =>   $code,
          'mobile_no'   =>   $mobileno,
          'date_time'   =>   $datetime
   )
);
            return view('pages.login_otp_page',["mobilenum"=>$mobileno]);

        }
    }

    public function logotpcheck(Request $request)
    {
        $mblnum = $request->mobilenum;
        $otp1 = $request-> otp1;
        $otp2 = $request-> otp2;
        $otp3 = $request-> otp3;
        $otp4 = $request-> otp4;
        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');

        $otp = $otp1.$otp2.$otp3.$otp4;

        $otpcheck = DB::table('otp_db')
        ->select('otp')
        ->where('otp', '=', $otp)
        ->where('mobile_no','=',$mblnum)
        ->where('date_time','>=',$datetime)
        ->get()->count();

        if($otpcheck == 1)
        {
            $user = DB::table('registers')
            ->select('*')
            ->where('mobile_no','=',$mblnum)
            ->first();
            // dd($user);
            // $user = register::where('mobile_no',$mblnum)->first();
            // Auth::login($user);
            // return redirect('aboutme');

            if($user)
            {


                $usercheck = DB::table('registers')
                ->select('*')
                ->where('mobile_no','=',$mblnum)
                ->get();
                // dd($usercheck);
                if($usercheck->count() == 1)
                {
                    $request->session()->put('LoggedUser',$user->varan_id);

                    $ip = $request->ip();
                    $varanid=$user->varan_id;

                    $updatedata= DB::table('logdetails_tb')->insert(
                        ['user_id' => $varanid, 'user_ip' => $ip]);
                    return redirect('aboutme');
                    // return "Approved";

                }
                else
                {
                    // return "Not Approved";
                    return back()->with('error','Your Details reviewed please wait while approvad');
                }
        }
        else
        {
            return "Update Failed";
        }
    }
    }
}
