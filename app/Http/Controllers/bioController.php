<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use Illuminate\Support\Facades\DB;

class bioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
        $register = register::find($id);
        $userid = session('LoggedUser');
        $varanid = $register->varan_id;
        $reg  = DB::table('registers')->where('varan_id', $userid)->first();

        $approvedstatus  = DB::table('privacyphotolist')
     ->where('partner_id', $varanid)
     ->where('photoid', $userid)
     ->where('status', 1)
     ->get()->count();
    // GetGender

    $gender=$reg->Gender;
    $privacystatus=$reg->member_shiptype;
    if($privacystatus=="0"){
        $privacystatus="Regular";
    }else{
       $privacystatus="Premium";

    }
    // dd($privacystatus);

        date_default_timezone_set("Asia/Kolkata");
       $datetime = date('Y-m-d h:i:s');


        $viewid=DB::table('registers')
        ->select('registers.Name', 'registers.age','registers.varan_id','registers.cprivacy_setting','registers.bprivacy_setting','registers.dob','registers.Gender','regli_tb.religion_name','registers.email_id','registers.mobile_no','registers.varan_id', 'registers.no_of_children','registers.no_of_children','registers.whatsapp_no','registers.com_address','registers.municipality_panchayat','registers.other_countryaddress','registers.residential_address','subcastes.subcategory_name','subcastes.Category_name','registers.eduction_detail as edudetails','registers.job_detail','jobdescription_tb.name', 'castes.Caste_name','phy_tb.phy_name','btype_tb.btype','complexion_tb.com_name','height_tb.height_name','matrial_tb.matrial_name','countries.country_name','states.state_name','cities.city_name','eductiondetails_tb.name as eduname','registers.annual_income','registers.father_name','registers.father_occuption','registers.mother_name','registers.mother_occuption','registers.total_sibblings','registers.elder_sister','registers.younger_sister','registers.elder_brother','registers.younger_brother','registers.about_myself','rasi_tb.name as rasi','registers.laknam','Star.name as star','registers.dosam','registers.birth_time','registers.blood_group','job_country.country_name as jobcountry','job_state.state_name as jobstate','job_city.job_city_name as jobcity','images.image_name',DB::raw('(CASE

        WHEN images.privacy_type = "All" THEN "0"

        WHEN images.privacy_type = "'.$privacystatus.'" THEN "0"

        WHEN "'.$approvedstatus.'" = 1 THEN "0"

        ELSE null

        END) AS imageview'),
        DB::raw('(CASE

                        WHEN horoscopes.privacy_setting = "All" THEN "0"

                        WHEN horoscopes.privacy_setting = "'.$privacystatus.'" THEN "0"

                        ELSE null

                        END) AS Himageview'),
        DB::raw('(CASE

        WHEN registers.cprivacy_setting = "All" THEN "0"

        WHEN registers.cprivacy_setting = "'.$privacystatus.'" THEN "0"
        WHEN "'.$approvedstatus.'" = 1 THEN "0"
        ELSE null

        END) AS contactview'),
        DB::raw('(CASE

        WHEN registers.bprivacy_setting = "All" THEN "0"

        WHEN registers.bprivacy_setting = "'.$privacystatus.'" THEN "0"

        ELSE null

        END) AS bioview'))
        ->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
        ->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
        // ->leftJoin('images','registers.varan_id','=','images.varanid')
        ->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
        ->leftJoin('castes','registers.Caste','=','castes.id')
        ->leftJoin('phy_tb','registers.physical_status','=','phy_tb.id')
        ->leftJoin('btype_tb','registers.body_type','=','btype_tb.id')
        ->leftJoin('complexion_tb','registers.complexion','=','complexion_tb.id')
        ->leftJoin('height_tb','registers.height','=','height_tb.id')
        ->leftJoin('matrial_tb','registers.marital_status','=','matrial_tb.id')
        ->leftJoin('countries','registers.country','=','countries.country_id')
        ->leftJoin('states','registers.state','=','states.state_id')
        ->leftJoin('cities','registers.district','=','cities.city_id')
        ->leftJoin('rasi_tb','registers.rasi','=','rasi_tb.id')
        ->leftJoin('Star','registers.stars','=','Star.id')
        ->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
        ->leftJoin('job_country','registers.job_country','=','job_country.country_id')
        ->leftJoin('job_state','registers.job_state','=','job_state.state_id')
        ->leftJoin('job_city','registers.job_city','=','job_city.job_city_id')

        ->leftJoin('images',function($query) {
            $query->on('registers.varan_id','=','images.varanid')
            ->where('images.approve_status','<>','0')
            ->where('images.image_status','=','Main');
        })

        ->leftJoin('horoscopes',function($query) {
            $query->on('registers.varan_id','=','horoscopes.varan_id')
            ->where('horoscopes.approval_status','<>','0');
        })
        ->where('registers.varan_id', '=', $varanid)->first();

        $partners=DB::table('partners')
        ->select('partners.age_from', 'partners.age_to','subcastes.subcategory_name','partners.preference_height','regli_tb.religion_name','partners.preference_heightto','partners.preference_bodytype','partners.preference_bodytypetext','partners.preference_complexion','partners.preference_complexiontext','partners.marital_status', 'partners.preference_educat','partners.preference_educattext','partners.preference_edudetails','partners.preference_jobcat','partners.preference_jobcattext','partners.preference_jobdetails','partners.preference_religion','partners.preference_religiontext','partners.preference_caste','partners.preference_castetext','partners.preference_subcaste','partners.preference_subcastetext', 'partners.preference_country','partners.preference_countrytext','partners.preference_state','partners.preference_statetext','partners.preference_district','partners.preference_districttext','partners.preference_location','partners.varan_id','jobdescription_tb.name', 'castes.Caste_name','btype_tb.btype','complexion_tb.com_name','height_tb.height_name','matrial_tb.matrial_name','countries.country_name','states.state_name','cities.city_name','eductiondetails_tb.name as eduname')
        ->leftJoin('subcastes','partners.preference_subcaste','=','subcastes.id')
        ->leftJoin('jobdescription_tb','partners.preference_jobcat','=','jobdescription_tb.id')
        // ->leftJoin('images','registers.varan_id','=','images.varanid')
        ->leftJoin('regli_tb','partners.preference_religion','=','regli_tb.id')
        ->leftJoin('castes','partners.preference_caste','=','castes.id')
        // ->leftJoin('phy_tb','partners.physical_status','=','phy_tb.id')
        ->leftJoin('btype_tb','partners.preference_bodytype','=','btype_tb.id')
        ->leftJoin('complexion_tb','partners.preference_complexion','=','complexion_tb.id')
        ->leftJoin('height_tb','partners.preference_heightto','=','height_tb.id')
        ->leftJoin('matrial_tb','partners.marital_status','=','matrial_tb.id')
        ->leftJoin('countries','partners.preference_country','=','countries.country_id')
        ->leftJoin('states','partners.preference_state','=','states.state_id')
        ->leftJoin('cities','partners.preference_district','=','cities.city_id')
        // ->leftJoin('rasi_tb','partners.rasi','=','rasi_tb.id')
        // ->leftJoin('Star','partners.stars','=','Star.id')
        ->leftJoin('eductiondetails_tb','partners.preference_educat','=','eductiondetails_tb.id')
        // ->leftJoin('job_country','partners.job_country','=','job_country.country_id')
        // ->leftJoin('job_state','partners.job_state','=','job_state.state_id')
        // ->leftJoin('job_city','partners.job_city','=','job_city.job_city_id')
        ->where('partners.varan_id', '=', $varanid)->first();
        // $currentURL = Request::url();

        $viewedprofile = DB::table('trackings')->insert(
            array(
                   'user_varan_id'     =>   $userid,
                   'partner_varan_id'   =>   $varanid,
                   'purpose'   =>   "Profile_Viewed",
                   'created_at' => $datetime
            )
        );
            $allinterest = DB::table('interests')
            ->select('*')
            ->where('user_varan_id','=',$userid)
            ->where('liked_varan_id','=',$varanid)
            ->get();

            $favourite = DB::table('favourites')
            ->select('*')
            ->where('user_varan_id','=',$userid)
            ->where('liked_varan_id','=',$varanid)
            ->where('status','=','liked')
            ->get();
        // dd($viewid);

            $images = DB::table('images')
            ->select('*')
            ->where('varanid','=',$varanid)
            ->get();

            $horoscopeimages = DB::table('horoscopes')
            ->select('*')
            ->where('varan_id','=',$varanid)
            ->where('title','=','Horoscope')
            ->first();

        $female_rasi="";
        $female_star="";
        $male_rasi="";
        $male_star="";
        $reg  = DB::table('registers')->where('varan_id', $userid)->first();
        // GetGender
        $varanid1=$reg->varan_id;
        $gender=$reg->Gender;
        if($gender=='Male'){
        $male_rasi=$reg->rasi;
        $male_star=$reg->stars;
        }else{
        $female_rasi=$reg->rasi;
        $female_star=$reg->stars;
        }

        $reg  = DB::table('registers')->where('varan_id', $varanid)->first();
        // GetGender
        $varanid1=$reg->varan_id;
        $gender=$reg->Gender;
        if($gender=='Male'){
        $male_rasi=$reg->rasi;
        $male_star=$reg->stars;
        }else{
        $female_rasi=$reg->rasi;
        $female_star=$reg->stars;
        }


        if($male_rasi!="" && $male_star!="" && $female_rasi!="" && $female_star!=""){
        $horocount=DB::table('horomacth_tb')
        ->select('no_macths', 'Status')
        ->where('female_rasi','=',$female_rasi)
        ->where('female_star','=',$female_star)
        ->where('male_rasi','=',$male_rasi)
        ->where('male_star','=',$male_star)
        ->first();
        }
        else
        {
            $horocount = 0;
        }

        //Preference Percentage

        $reg  = DB::table('registers')->where('varan_id', $varanid)->first();
        $count=0;
        // for age
      $age=$reg->age;
      if($age!=""){
          $page = DB::table('partners')
        ->where('age_from','<=',$age)
        ->where('age_to','>=',$age)
        ->where('varan_id', $userid)->count();
        if($page=="1"){

            $count=$count+1;
        }
      }


        // for height
       $height=$reg->height;
       if($height!=""){
         $pheight  = DB::table('partners')
        ->where('preference_height','<=',$height)
        ->where('preference_heightto','>=',$height)
        ->where('varan_id', $userid)->count();
        if($pheight=="1"){
              $count=$count+1;
        }
       }


          // for btype
        $body_type=$reg->body_type;
        if($body_type!=""){
            $pbtype  = DB::table('partners')
        ->where('preference_bodytype','LIKE', '%'.$body_type.'%')
        ->where('varan_id', $userid)->count();
        if($pbtype=="1"){
              $count=$count+1;
        }
        }


          // for complexion
        $complexion=$reg->complexion;
        if($complexion!=""){
        $pcomplexion  = DB::table('partners')
        ->where('preference_complexion','LIKE', '%'.$complexion.'%')
        ->where('varan_id', $userid)->count();

        if($pcomplexion=="1"){
              $count=$count+1;
        }
        }

            // for mstatus
        $mstatus=$reg->marital_status;
        if($mstatus!=""){
        $pmstatus  = DB::table('partners')
        ->where('marital_status','LIKE', '%'.$mstatus.'%')
        ->where('varan_id', $userid)->count();

        if($pmstatus=="1"){

              $count=$count+1;
        }
        }

        // for educat
        $educat=$reg->eduction;
        if($educat!=""){
        $peducat  = DB::table('partners')
        ->where('preference_educat','LIKE', '%'.$educat.'%')
        ->where('varan_id', $userid)->count();

        if($peducat=="1"){

              $count=$count+1;
        }
        }

          // for job
        $jobcat=$reg->job_category;
        if($jobcat!=""){
        $pjobcat  = DB::table('partners')
        ->where('preference_jobcat','LIKE', '%'.$jobcat.'%')
        ->where('varan_id', $userid)->count();

        if($pjobcat=="1"){

              $count=$count+1;
        }
        }


         // for religion
        $religion=$reg->Religion;
        if($religion!="")
        {
        $preligion  = DB::table('partners')
        ->where('preference_religion','LIKE', '%'.$religion.'%')
        ->where('varan_id', $userid)->count();

        if($preligion=="1"){

              $count=$count+1;
        }
        }


            // for Caste
        $Caste=$reg->Caste;
        if($Caste!=""){
        $pCaste  = DB::table('partners')
        ->where('preference_caste','LIKE', '%'.$Caste.'%')
        ->where('varan_id', $userid)->count();

        if($pCaste=="1"){

              $count=$count+1;
        }
        }


            // for subCaste
        $sub_caste=$reg->sub_caste;
        if($sub_caste!=""){
        $psub_caste  = DB::table('partners')
        ->where('preference_subcaste','LIKE', '%'.$sub_caste.'%')
        ->where('varan_id', $userid)->count();

        if($psub_caste=="1"){

              $count=$count+1;
        }
        }


               // for country
        $country=$reg->country;
        if($country!=""){
        $pcountry  = DB::table('partners')
        ->where('preference_country','LIKE', '%'.$country.'%')
        ->where('varan_id', $userid)->count();

        if($pcountry=="1"){

              $count=$count+1;
        }
        }


              // for state
        $state=$reg->state;
        if($state!=""){
        $pstate  = DB::table('partners')
        ->where('preference_state','LIKE', '%'.$state.'%')
        ->where('varan_id', $userid)->count();

        if($pstate=="1"){

              $count=$count+1;
        }
        }


              // for city
        $district=$reg->district;
        if($district!=""){
        $pdistrict  = DB::table('partners')
        ->where('preference_district','LIKE', '%'.$district.'%')
        ->where('varan_id', $userid)->count();

        if($pdistrict=="1"){

              $count=$count+1;
        }
        }



       $tcount=$count;
       $count =round($count * 7.7);
       $count1=$count/100;
       $count1=number_format( (float)$count1, 2, '.', '');

       $num = $count;
$int = (int)$num;

        $chatbox = DB::table('chat_box')
        ->select('*')
        ->whereIn('send_by',[$userid, $varanid])
        ->get();

        $enablechat="";

     date_default_timezone_set("Asia/Kolkata");
     $datetime = date('Y-m-d h:i:s');
       $chatoption = DB::table('user_package')
            ->select('enable_chat')
             ->where('user_varan_id',$userid)
             ->where('validity_date', '>=', $datetime)
             ->where('status','=','0')
            ->first();

            date_default_timezone_set("Asia/Kolkata");
     $datetime = date('Y-m-d h:i:s');
        $enablehoro = DB::table('user_package')
            ->select('enable_horoschope')
            ->where('user_varan_id',$userid)
             ->where('validity_date', '>=', $datetime)
             ->where('status','=','0')
            ->first();

            $register = DB::table('registers')
            ->select('*')
            ->where('varan_id','=',$varanid)
            ->first();
            $membership = $register->member_shiptype;

            if($membership == 0)
            {

            }
            else
            {
                $noofphoneno=0;
                $viewedphoneno=0;

            date_default_timezone_set("Asia/Kolkata");
            $datetime = date('Y-m-d h:i:s');

                $phoneno = DB::table('user_package')
                ->select('no_of_phno','no_of_phno_viewed')
                ->where('user_varan_id', '=', $userid)
                ->where('status', '=', '0')
                ->where('validity_date', '>=', $datetime)
                ->first();

                if($phoneno)
                {
                $noofphoneno= $phoneno->no_of_phno;
                $viewedphoneno= $phoneno->no_of_phno_viewed;
                $viewed = DB::table('vieweds')
                ->select('uservaran_id')
                ->where('uservaran_id', '=', $id)
                ->where('partner_varan_id', '=', $varanid)
                ->where('phn_num_view_status', '=','1')
                ->get()->count();
                }
            }

            $insertviewds = DB::table('vieweds')
            ->select('uservaran_id')
            ->where('uservaran_id', '=', $userid)
            ->where('partner_varan_id', '=', $varanid)
            ->get()->count();

            date_default_timezone_set("Asia/Kolkata");
                          $datetime = date('Y-m-d h:i:s');
            if($insertviewds == 0)
            {
                $insert = DB::table('vieweds')->insert(
                    array(
                        'uservaran_id'     =>   $userid,
                        'partner_varan_id'   =>   $varanid,
                        'created_at'   =>   $datetime,
                    )
                );
            }

            $privactphoto = DB::table('privacyphotolist')
            ->select('*')
            ->where('photoid', '=', $userid)
            ->where('partner_id', '=', $varanid)
            ->where('status', '=', '1')
            ->get()->count();

        return view('pages.bio',compact('viewid','partners','allinterest','favourite','images','horoscopeimages','horocount','int','chatbox','chatoption','enablehoro','noofphoneno','viewedphoneno','viewed','privactphoto'));
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

    public function sendproposal(Request $request)
    {
        $uservaranid = $request->uservaranid;
        $partnervaranid = $request->partnervaranid;
        $status = $request->status;

        $saveinterest = DB::table('interests')->insert(
            array(
                   'user_varan_id'     =>   $uservaranid,
                   'liked_varan_id'   =>   $partnervaranid,
                   'Status'   =>   "Interest",
            )
        );
        date_default_timezone_set("Asia/Kolkata");
       $datetime = date('Y-m-d h:i:s');
       $datetime = date('Y-m-d H:i:s',strtotime('+30 second',strtotime($datetime)));
            $saveinterest = DB::table('trackings')->insert(
                array(
                    'user_varan_id'     =>   $uservaranid,
                    'partner_varan_id'   =>   $partnervaranid,
                    'purpose'   =>   "Send_Interest",
                    'created_at' => $datetime
                )
            );

        if($saveinterest)
        {
            return back()->with('success','Interest Send');
        }
    }

    public function updatenumuserpackage(Request $request)
    {
        $userid = session('LoggedUser');
        $partnerid = $request->partnerid;

        date_default_timezone_set("Asia/Kolkata");
      $datetime = date('Y-m-d h:i:s');
      $viewed = DB::table('vieweds')
            ->select('uservaran_id')
            ->where('uservaran_id', '=', $userid)
            ->where('partner_varan_id', '=', $partnerid)
            ->where('phn_num_view_status', '=', 0)
            ->get()->count();
            // dd($viewed);
            if($viewed!=0){

        $updatedata= DB::table('vieweds')->where('uservaran_id',$userid)
        ->where('partner_varan_id',$partnerid)->update(array(
                                 'phn_num_view_status'=> 1,
        ));
        $updateuserpackage= DB::table('user_package')->where('user_varan_id',$userid)
        ->where('validity_date', '>=', $datetime)
        ->where('status','=','0')
        ->update(array(
                                 'no_of_phno_viewed'=>DB::raw('no_of_phno_viewed+1'),
        ));

        }


        return back();
    }

    public function insertrequest(Request $request)
    {
        $userid = session('LoggedUser');
        $varanid = $request -> partnerid;

        $register = DB::table('privacyphotolist')
            ->select('photoid')
            ->where('photoid', '=', $userid)
            ->where('partner_id', '=', $varanid)
            ->where('status', '=', 0)
            ->get()->count();

            if($register==0){

                $savedata= DB::table('privacyphotolist')->insert(
        ['photoid' => $userid, 'partner_id' => $varanid]);
                }

                return back();
    }
}
