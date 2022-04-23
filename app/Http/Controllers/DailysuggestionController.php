<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailysuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('LoggedUser');
        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d');
        $dailycount = DB::table('dailysuggestions')
                ->select('id')
                ->where('user_varanid', '=', $id)
                ->where('viewed_date', '=', $datetime)
                ->get()->count();

        if($dailycount<1){

        $reg  = DB::table('registers')->where('varan_id', $id)->first();
        $user = DB::table('partners')->where('varan_id', $id)->first();

        // GetGender
        $varanid=$reg->varan_id;
        $gender=$reg->Gender;
        $privacystatus=$reg->member_shiptype;
        if($privacystatus=="0"){
            $privacystatus="Regular";
        }else{
           $privacystatus="Premium";
        }



        $query=DB::table('registers')
        ->select('registers.gender AS gender','registers.member_shiptype','registers.id','registers.Name', 'registers.age', 'registers.varan_id', 'subcastes.subcategory_name','images.image_name',DB::raw('(CASE

                            WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                            ELSE 0

                            END) AS fav'),DB::raw('(CASE

                            WHEN trackings.partner_varan_id = registers.varan_id THEN 1

                            ELSE 0

                            END) AS view'), DB::raw('(CASE

                            WHEN images.privacy_type = "All" THEN 0

                            WHEN images.privacy_type = "'.$privacystatus.'" THEN 0

                            ELSE null

                            END) AS imageview'), 'jobdescription_tb.name')
        ->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
        ->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
        ->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
        ->leftJoin('trackings',function($query) {
        $query->on('registers.varan_id','=','trackings.partner_varan_id')
        ->where('trackings.purpose','=','Profile_Viewed');
        })

        ->where('registers.member_shiptype', '<>', '1')
        ->where('registers.status', '<>', '0')


        ->leftJoin('images',function($query) {
            $query->on('registers.varan_id','=','images.varanid')
            ->where('images.approve_status','<>','0')
            ->where('images.image_status','=','Main');
        })

        ->where(function ($query) use ($user){
            // Parameters
            $agefrom=$user->age_from;
            $ageto=$user->age_to;
            $hfrom=$user->preference_height;
            $hto=$user->preference_heightto;
            $btype=$user->preference_bodytype;
            $complexion=$user->preference_complexion;
            $mstatus=$user->marital_status;
            $educat=$user->preference_educat;
            $subcast=$user->preference_subcaste;
            $religion=$user->preference_religion;
            $caste=$user->preference_caste;
            $country=$user->preference_country;
            $state=$user->preference_state;
            $district=$user->preference_district;
            $jobdetails=$user->preference_jobdetails;

            // Explode Array
            $btypee=explode(",",$btype);
            $complexionn=explode(",",$complexion);
            $educatt=explode(",",$educat);
            $jobdetailss=explode(",",$jobdetails);
            $religionn=explode(",",$religion);
            $subcastt=explode(",",$subcast);
            $castee=explode(",",$subcast);
            $countryy=explode(",",$country);
            $statee=explode(",",$state);
            $districtt=explode(",",$district);


        if ($subcast!="") {
            $query->WhereIn('registers.sub_caste', $subcastt);

        }
        if ($religion!="") {
            $query->orWhereIn('registers.Religion', $religionn);
        }
        if ($caste!="") {
            $query->orWhereIn('registers.Caste', $castee);
        }
        if ($btype!="") {
            $query->orWhereIn('registers.body_type', $btypee);
        }
        if ($complexion!="") {
            $query->orWhereIn('registers.complexion', $complexionn);
        }
        if ($educat!="") {
            $query->orWhereIn('registers.eduction', $educatt);
        }
        if ($jobdetails!="") {
            $query->orWhereIn('registers.job_category', $jobdetailss);
        }
        if ($country!="") {
            $query->orWhereIn('registers.job_country', $countryy);
        }
        if ($state!="") {
            $query->orWhereIn('registers.job_state', $statee);
        }
        if ($district!="") {
            $query->orWhereIn('registers.job_city', $districtt);
        }
        if($agefrom!="" && $ageto!=""){
        $query->orwhereBetween('age', [$agefrom, $ageto]);
        }
        if($hfrom!="" && $hto!=""){

            $query->orWhereBetween('height', [$hfrom, $hto]);
        }
        })
        // ->whereNotIn('registers.varan_id', function($q) use ($id){
        //     $q->select('vieweds.partner_varan_id')->from('vieweds')
        //     ->where('vieweds.uservaran_id','=',$id);
        // });

        ->whereNotIn('registers.varan_id', function($q) use ($id,$datetime){
            $q->select('partner_varanid')->from('dailysuggestions')
            ->where('dailysuggestions.user_varanid','=',$id)
            ->where('dailysuggestions.status','=','1');


        })

        // ->whereNotIn('registers.varan_id', function($q) use ($id,$datetime){
        //     $q->select('partner_varanid')->from('dailysuggestions')
        //     ->where('dailysuggestions.user_varanid','=',$id)
        //     ->where('dailysuggestions.status','=','0')
        //     ->orwhere('viewed_date','=',$datetime);

        // })
        // ->whereNotIn('registers.varan_id', function($q) use ($id,$datetime,$gender){
        //     $q->select('dailysuggestions.partner_varanid')->from('dailysuggestions')
        //     ->where('dailysuggestions.user_varanid','=',$id)
        //     ->where('viewed_date', '=', $datetime);
        // })
        ->where('registers.Gender', '<>', $gender);
            $result=$query->orderBy('registers.id', 'DESC')->groupBy('registers.id','registers.Name', 'registers.age', 'registers.varan_id', 'subcastes.subcategory_name','images.image_name','favourites.liked_varan_id','trackings.partner_varan_id','images.privacy_type','jobdescription_tb.name')->limit(1)->get();

        foreach ($result as $key => $subscriber) {
        $iid=  $subscriber->varan_id;
            // dd($iid);
            $updatedata= DB::table('dailysuggestions')->insert(
                ['user_varanid' =>$id, 'partner_varanid' => $iid, 'viewed_date' => $datetime]);


            }


        }

        date_default_timezone_set("Asia/Kolkata");
    $datetime = date('Y-m-d');
    // $dailycount = DB::table('dailysuggestions')
    //         ->select('id')
    //         ->where('user_varanid', '=', $id)
    //         ->where('viewed_date', '=', $datetime)
    //         ->get()->count();

    // if($dailycount<5){

    $reg  = DB::table('registers')->where('varan_id', $id)->first();
    $user = DB::table('partners')->where('varan_id', $id)->first();

    // GetGender
    $varanid=$reg->varan_id;
    $gender=$reg->Gender;
    $privacystatus=$reg->member_shiptype;
    if($privacystatus=="0"){
        $privacystatus="Regular";
    }else{
       $privacystatus="Premium";
    }



$query=DB::table('registers')
->select('registers.gender','registers.member_shiptype','registers.id','regli_tb.religion_name','registers.Name', 'registers.age', 'registers.varan_id', 'eductiondetails_tb.name as eduname','states.state_name','subcastes.subcategory_name','images.image_name',DB::raw('(CASE

                        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                        ELSE 0

                        END) AS fav'),DB::raw('(CASE

                        WHEN trackings.partner_varan_id = registers.varan_id THEN 1

                        ELSE 0

                        END) AS view'), DB::raw('(CASE

                        WHEN images.privacy_type = "All" THEN 0

                        WHEN images.privacy_type = "'.$privacystatus.'" THEN 0

                        ELSE null

                        END) AS imageview'), 'jobdescription_tb.name')
->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
->leftJoin('states','registers.state','=','states.state_id')
->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
->leftJoin('trackings',function($query) {
$query->on('registers.varan_id','=','trackings.partner_varan_id')
->where('trackings.purpose','=','Profile_Viewed');
})

->where('registers.member_shiptype', '<>', '1')
->where('registers.status', '<>', '0')


->leftJoin('images',function($query) {
	$query->on('registers.varan_id','=','images.varanid')
	->where('images.approve_status','<>','0')
	->where('images.image_status','=','Main');
})

->where(function ($query) use ($user){
       // Parameters
    $agefrom=$user->age_from;
    $ageto=$user->age_to;
    $hfrom=$user->preference_height;
    $hto=$user->preference_heightto;
    $btype=$user->preference_bodytype;
    $complexion=$user->preference_complexion;
    $mstatus=$user->marital_status;
    $educat=$user->preference_educat;
    $subcast=$user->preference_subcaste;
    $religion=$user->preference_religion;
    $caste=$user->preference_caste;
    $country=$user->preference_country;
    $state=$user->preference_state;
    $district=$user->preference_district;
    $jobdetails=$user->preference_jobdetails;

    // Explode Array
    $btypee=explode(",",$btype);
    $complexionn=explode(",",$complexion);
    $educatt=explode(",",$educat);
    $jobdetailss=explode(",",$jobdetails);
    $religionn=explode(",",$religion);
    $subcastt=explode(",",$subcast);
    $castee=explode(",",$subcast);
    $countryy=explode(",",$country);
    $statee=explode(",",$state);
    $districtt=explode(",",$district);


if ($subcast!="") {
     $query->WhereIn('registers.sub_caste', $subcastt);

}
if ($religion!="") {
    $query->orWhereIn('registers.Religion', $religionn);
}
if ($caste!="") {
    $query->orWhereIn('registers.Caste', $castee);
}
if ($btype!="") {
    $query->orWhereIn('registers.body_type', $btypee);
}
if ($complexion!="") {
    $query->orWhereIn('registers.complexion', $complexionn);
}
if ($educat!="") {
    $query->orWhereIn('registers.eduction', $educatt);
}
if ($jobdetails!="") {
    $query->orWhereIn('registers.job_category', $jobdetailss);
}
if ($country!="") {
    $query->orWhereIn('registers.job_country', $countryy);
}
if ($state!="") {
    $query->orWhereIn('registers.job_state', $statee);
}
if ($district!="") {
    $query->orWhereIn('registers.job_city', $districtt);
}
if($agefrom!="" && $ageto!=""){
  $query->orwhereBetween('age', [$agefrom, $ageto]);
}
if($hfrom!="" && $hto!=""){

    $query->orWhereBetween('height', [$hfrom, $hto]);
}
})
// ->whereNotIn('registers.varan_id', function($q) use ($id){
//     $q->select('vieweds.partner_varan_id')->from('vieweds')
//     ->where('vieweds.uservaran_id','=',$id);
// });

->whereIn('registers.varan_id', function($q) use ($id,$datetime){
    $q->select('partner_varanid')->from('dailysuggestions')
    ->where('dailysuggestions.user_varanid','=',$id)
    ->where('viewed_date','=',$datetime);
})

// ->whereNotIn('registers.varan_id', function($q) use ($id,$datetime){
//     $q->select('partner_varanid')->from('dailysuggestions')
//     ->where('dailysuggestions.user_varanid','=',$id)
//     ->where('dailysuggestions.status','=','0')
//     ->orwhere('viewed_date','=',$datetime);

// })
// ->whereNotIn('registers.varan_id', function($q) use ($id,$datetime,$gender){
//     $q->select('dailysuggestions.partner_varanid')->from('dailysuggestions')
//     ->where('dailysuggestions.user_varanid','=',$id)
//     ->where('viewed_date', '=', $datetime);
// })
->where('registers.Gender', '<>', $gender);
$dailysugestions = $query->orderBy('registers.id', 'DESC')->groupBy('registers.id','registers.Name', 'registers.age', 'registers.varan_id', 'subcastes.subcategory_name','images.image_name','favourites.liked_varan_id','trackings.partner_varan_id','images.privacy_type','jobdescription_tb.name')->get();

// dd($dailysugestions);
return view('pages.dailymatches',compact('dailysugestions'));
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
}
