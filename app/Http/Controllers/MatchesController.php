<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchesController extends Controller
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

    public function premiumMatches()
    {
        $id = session('LoggedUser');

        $reg  = DB::table('registers')->where('varan_id', $id)->first();
    $user = DB::table('partners')->where('varan_id', $id)->first();

     // GetDetails
    $varanid=$reg->varan_id;
    $gender=$reg->Gender;
    $privacystatus=$reg->member_shiptype;
    if($privacystatus=="0"){
        $privacystatus="Regular";
    }else{
       $privacystatus="Premium";

    }

$query=DB::table('registers')
->select('registers.id','registers.Name', 'registers.age', 'registers.varan_id','regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','subcastes.subcategory_name', 'jobdescription_tb.name','images.image_name',DB::raw('(CASE

                        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                        ELSE 0

                        END) AS fav'), DB::raw('(CASE

                        WHEN images.privacy_type = "All" THEN 0

                        WHEN images.privacy_type = "'.$privacystatus.'" THEN 0

                        ELSE null

                        END) AS imageview'))
->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
->leftJoin('states','registers.state','=','states.state_id')
->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
// ->leftJoin('images','registers.varan_id','=','images.varanid')
->where('registers.Gender', '<>', $gender)
->where('registers.member_shiptype', '<>', '0')
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
});



$premium = $query->inRandomOrder()->get();

    // dd($premium);

        return view('pages.premium',compact('premium'));
    }


}
