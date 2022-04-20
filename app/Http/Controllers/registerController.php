<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\register;





class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mor_ton = DB::table('mor_ton')
        ->get();


        return view('pages.register',compact('mor_ton'));
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
        $lookingfor = $request -> lookingfor;
        $createdby = $request -> createdby;
        $gender = $request -> gender;
        $name = $request -> name;
        $dob = $request -> dob;
        $email = $request -> email;
        $countrycode = $request->countrycode;
        $mblnum = $request -> mblnum;
        $montongue = $request -> montongue;
        $religion = $request-> religion;
        $caste = $request-> caste;
        $subcaste = $request -> subcaste;
        $pass = $request->password;

        $code=rand(1000,10000);
        $token="87c13d427e12b47a9f6535878483d96a";
        $credit="2";
        $sender="STSCBE";
        $mobile_number=$mblnum;

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
$mobile_number=$mblnum;

date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');
        $datetime = date('Y-m-d H:i:s',strtotime('+30 second',strtotime($datetime)));

//Don't change below code use as it is
//  $url="http://app.msgpedia.com/http-api.php?authentic-key=36347065707a6f703635371643438399&username=".urlencode($username)."&password=".urlencode($password)."&senderid=".urlencode($sender)."&route=2&number=".urlencode($mobile_number)."&message=".urlencode($message)."&templateid=1207164265907030288";


// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $curl_scraped_page = curl_exec($ch);
// curl_close($ch);

DB::table('otp_db')->insert(
    array(
           'otp'     =>   $code,
           'mobile_no'   =>   $mobile_number,
           'date_time'   =>   $datetime
    )
);
        return view('pages.otp',
        [
            "lookingfor"=>$lookingfor,
            "createdby"=>$createdby,
            "gender"=>$gender,
            "name"=>$name,
            "dob"=>$dob,
            "email"=>$email,
            "mblnum"=>$mblnum,
            "montongue"=>$montongue,
            "religion"=>$religion,
            "caste"=>$caste,
            "subcaste"=>$subcaste,
            "countrycode"=>$countrycode,
            "password"=>$pass,
        ]);
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

    public function passData(Request $request)
    {
        $name = $request->name;
        $gender = $request->gender;
        $pnumber = $request->pnumber;

        $mor_ton = DB::table('mor_ton')
        ->get();
        $regli_tb = DB::table('regli_tb')
        ->get();
        $castes = DB::table('castes')
        ->get();
        $subcastes = DB::table('subcastes')
        ->get();
        return view('pages.register',compact('mor_ton','regli_tb','castes','subcastes','name','gender','pnumber'));
    }


    public function otpcheck(Request $request)
    {

        $lookingfor = $request -> lookingfor;
        $createdby = $request -> createdby;
        $gender = $request -> gender;
        $name = $request -> name;
        $dob = $request -> dob;
        $email = $request -> email;
        $countrycode = $request->countrycode;
        $mblnum = $request -> mblnum;
        $montongue = $request -> montongue;
        $religion = $request-> religion;
        $caste = $request-> caste;
        $subcaste = $request -> subcaste;
        $pass = $request -> password;

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
            $defaulttvalue = 1000;
            $invID =0;
            $maxValue = DB::table('registers')->max('id');
            $invID=($defaulttvalue)+($maxValue+1);
            // $defaulttvalue = ($defaulttvalue)+($maxValue);
            $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

            $MatId="VV".$invID;
            // print($MatId);
            // exit;

            // $dob=$request -> dob;

            $age= date("Y") - date("Y", strtotime($dob));

            $storedata = DB::table('registers')->insert(
                array(
                       'created_for'     =>   $createdby,
                       'looking_for'   =>   $lookingfor,
                       'Name'   =>   $name,
                       'Gender'   =>   $gender,
                       'dob'   =>   $dob,
                       'age'   =>   $age,
                       'Monther_tongue'   =>   $montongue,
                       'Religion'   =>   $religion,
                       'Caste'   =>   $caste,
                       'sub_caste'   =>   $subcaste,
                       'mobileno_code'   =>   $countrycode,
                       'mobile_no'   =>   $mblnum,
                       'email_id'   =>   $email,
                       'varan_id'   =>   $MatId,
                       'password'   =>   $pass,
                )
            );

             DB::table('partners')->insert(
                array(

                       'preference_religion'   =>   $religion,
                       'preference_caste'   =>   $caste,
                       'preference_subcaste'   =>   $subcaste,
                       'varan_id'   =>   $MatId,

                )
            );
            if($storedata)
            {
                return redirect('/login')->with('success','Registration Successfully');

            }

        }
    }

    public function forgottcheck(Request $request)
    {
        $mobileno = $request->mblnum;

        $mblcheck = DB::table('registers')
        ->select('*')
        ->where('mobile_no','=',$mobileno)
        ->get();

        if($mblcheck->count() == 0)
        {
            return redirect('/forgott')->with('success','Mobile Number Not Valid Please check your mobile number');
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
            return view('pages.forgott_otp',["mobilenum"=>$mobileno]);

        }


    }

    public function forgottotpcheck(Request $request)
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
            return view('pages.updatepwd',["mobilenum"=>$mblnum]);
        }
        else
        {
            return "Update Failed";
        }
    }

    public function updatepassword(Request $request)
    {
        $mbilnum = $request->mblnum;
        $pwd = $request->pwd;

        $updateabout= DB::table('registers')->where('mobile_no',$mbilnum)->update(array(
            'password'=>$pwd,
        ));

        if($updateabout)
        {
            return redirect('/login')->with('error','Password Changed Successfully');
        }

    }



}
