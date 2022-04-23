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
->select('registers.id','registers.Name', 'registers.age', 'registers.varan_id','registers.member_shiptype','regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','subcastes.subcategory_name', 'jobdescription_tb.name','images.image_name',DB::raw('(CASE

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
});



$premium = $query->inRandomOrder()->get();

    // dd($premium);

        return view('pages.premium',compact('premium'));
    }

    public function newmatches()
    {
        $id = session('LoggedUser');
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

        // DB::raw('(CASE

        //                     WHEN images.privacy_type = "All" THEN images.image_name

        //                     WHEN images.privacy_type = "'.$privacystatus.'" THEN images.image_name

        //                     WHEN privacyphotolist.partner_id = "'.$varanid.'" THEN images.image_name

        //                     END) AS image_name')

    $query=DB::table('registers')
    ->select('registers.id','registers.Name','registers.member_shiptype', 'registers.age','regli_tb.religion_name', 'registers.varan_id', 'eductiondetails_tb.name as eduname','states.state_name','subcastes.subcategory_name','images.image_name',DB::raw('(CASE

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
    ->leftJoin('states','registers.state','=','states.state_id')
    ->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
    ->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
    ->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
    ->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
    ->leftJoin('trackings',function($query) {
    $query->on('registers.varan_id','=','trackings.partner_varan_id')
    ->where('trackings.purpose','=','Profile_Viewed');
    })
    // ->leftJoin('privacyphotolist','registers.varan_id','=','privacyphotolist.photoid')
    // ->leftJoin('images','registers.varan_id','=','images.varanid')
    ->where('registers.Gender', '<>', $gender)
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
    });

    // $favourite = DB::table('favourites')
    // ->select('*')
    // ->where('user_varan_id','=',$id)
    // ->where('status','=','liked')
    // ->get();

    $newmatches = $query->orderBy('registers.id', 'DESC')->groupBy('registers.id','registers.Name', 'registers.age', 'registers.varan_id', 'subcastes.subcategory_name','images.image_name','favourites.liked_varan_id','trackings.partner_varan_id','images.privacy_type','jobdescription_tb.name')->get();

    return view('pages.newmatches',compact('newmatches'));
    }


    public function mutualmatches()
    {

        $id = session('LoggedUser');

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
->select('registers.id','registers.Name', 'registers.member_shiptype','registers.age', 'registers.varan_id', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

                        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                        ELSE 0

                        END) AS fav'), DB::raw('(CASE

                        WHEN images.privacy_type = "All" THEN 0

                        WHEN images.privacy_type = "'.$privacystatus.'" THEN 0

                        ELSE null

                        END) AS imageview'))
->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
->leftJoin('states','registers.state','=','states.state_id')
->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
// ->leftJoin('images','registers.varan_id','=','images.varanid')
->where('registers.Gender', '<>', $gender)
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
});


   $mutualmatches = $query->inRandomOrder()->get();

   return view('pages.mutualmatches',compact('mutualmatches'));

    }

    public function locationmatches()
    {

        $id = session('LoggedUser');

        $reg  = DB::table('registers')->where('varan_id', $id)->first();


    // GetGender
    $gender=$reg->Gender;
    $location=$reg->district;
    $varanid=$reg->varan_id;
    $privacystatus=$reg->member_shiptype;
    if($privacystatus=="0"){
        $privacystatus="Regular";
    }else{
       $privacystatus="Premium";

    }

$query=DB::table('registers')
->select('registers.Name', 'registers.age','registers.member_shiptype','registers.id', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

                        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                        ELSE 0

                        END) AS fav'), DB::raw('(CASE

                        WHEN images.privacy_type = "All" THEN 0

                        WHEN images.privacy_type = "'.$privacystatus.'" THEN 0

                        ELSE null

                        END) AS imageview'))
->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
->leftJoin('states','registers.state','=','states.state_id')
->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
// ->leftJoin('images','registers.varan_id','=','images.varanid')
->where('registers.Gender', '<>', $gender)
->where('registers.status', '<>', '0')
->where('registers.district', '=', $location)
->leftJoin('images',function($query) {
	$query->on('registers.varan_id','=','images.varanid')
	->where('images.approve_status','<>','0')
	->where('images.image_status','=','Main');
});


 $locationmatches = $query->inRandomOrder()->get();

 return view('pages.locationmatches',compact('locationmatches'));
    }

    public function professionalmatches()
    {

        $id = session('LoggedUser');

        $reg  = DB::table('registers')->where('varan_id', $id)->first();


        // GetGender
        $gender=$reg->Gender;
        $location=$reg->job_category;

        $varanid=$reg->varan_id;
        $privacystatus=$reg->member_shiptype;
        if($privacystatus=="0"){
            $privacystatus="Regular";
        }else{
           $privacystatus="Premium";

        }

    $query=DB::table('registers')
    ->select('registers.Name', 'registers.age','registers.member_shiptype', 'registers.id', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

                            WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                            ELSE 0

                            END) AS fav'), DB::raw('(CASE

                            WHEN images.privacy_type = "All" THEN 0

                            WHEN images.privacy_type = "'.$privacystatus.'" THEN 0

                            ELSE null

                            END) AS imageview'))
    ->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
    ->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
    ->leftJoin('states','registers.state','=','states.state_id')
->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
    ->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
    // ->leftJoin('images','registers.varan_id','=','images.varanid')
    ->where('registers.Gender', '<>', $gender)
    ->where('registers.status', '<>', '0')
    ->where('registers.job_category', '=', $location)
    ->leftJoin('images',function($query) {
        $query->on('registers.varan_id','=','images.varanid')
        ->where('images.approve_status','<>','0')
        ->where('images.image_status','=','Main');

    });



        $professionalmatches = $query->inRandomOrder()->get();

        return view('pages.professionalmatches',compact('professionalmatches'));
    }

    public function starmatches()
    {
        $id = session('LoggedUser');

        $reg  = DB::table('registers')->where('varan_id', $id)->first();


        // GetGender
        $gender=$reg->Gender;
        $location=$reg->stars;
        $varanid=$reg->varan_id;
        $privacystatus=$reg->member_shiptype;
        if($privacystatus=="0"){
            $privacystatus="Regular";
        }else{
           $privacystatus="Premium";

        }
    $query=DB::table('registers')
    ->select('registers.Name', 'registers.age','registers.member_shiptype','registers.id', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name', 'registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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
    ->where('registers.status', '<>', '0')
    ->where('registers.stars', '=', $location)
    ->leftJoin('images',function($query) {
        $query->on('registers.varan_id','=','images.varanid')
        ->where('images.approve_status','<>','0')
        ->where('images.image_status','=','Main');
    });




        $starmatches = $query->inRandomOrder()->get();

        return view('pages.starmatches',compact('starmatches'));

    }

    public function educationmatches()
    {
        $id = session('LoggedUser');

        $reg  = DB::table('registers')->where('varan_id', $id)->first();


        // GetGender
        $gender=$reg->Gender;
        $location=$reg->eduction;
        $varanid=$reg->varan_id;
        $privacystatus=$reg->member_shiptype;
        if($privacystatus=="0"){
            $privacystatus="Regular";
        }else{
           $privacystatus="Premium";

        }

    $query=DB::table('registers')
    ->select('registers.Name', 'registers.age', 'registers.member_shiptype','registers.id', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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
    ->where('registers.status', '<>', '0')
    ->where('registers.eduction', '=', $location)
    ->leftJoin('images',function($query) {
        $query->on('registers.varan_id','=','images.varanid')
        ->where('images.approve_status','<>','0')
        ->where('images.image_status','=','Main');
    });



     $educationmatches = $query->inRandomOrder()->get();

     return view('pages.educationmatches',compact('educationmatches'));


    }

    public function whoviewprofiles()
    {
        $id = session('LoggedUser');
        $reg  = DB::table('registers')->where('varan_id', $id)->first();


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
  ->select('registers.Name', 'registers.age','registers.member_shiptype','registers.id', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name', 'registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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
->where('registers.status', '<>', '0')
            ->leftJoin('images',function($query) {
                $query->on('registers.varan_id','=','images.varanid')
                ->where('images.approve_status','<>','0')
                ->where('images.image_status','=','Main');
            })
            ->Join('trackings',function($query) use ($id){
                $query->on('registers.varan_id','=','trackings.user_varan_id')
                ->where('trackings.partner_varan_id','=',$id)
                ->where('trackings.purpose','=','Profile_Viewed')
                ->orderBy('trackings.id', 'DESC');
            });



            $whoviewedprofile = $query->distinct()->get();

            return view('pages.whoviewprofiles',compact('whoviewedprofile'));

            }

            public function myviewedhistory()
            {

                $id = session('LoggedUser');
                $reg  = DB::table('registers')->where('varan_id', $id)->first();


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
->select('registers.Name', 'registers.age','registers.id','registers.member_shiptype', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name', 'registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

                        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                        ELSE 0

                        END) AS fav'),DB::raw('(CASE

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
->where('registers.status', '<>', '0')
->leftJoin('images',function($query) {
	$query->on('registers.varan_id','=','images.varanid')
	->where('images.approve_status','<>','0')
	->where('images.image_status','=','Main');
})
->Join('trackings',function($query) use ($id){
	$query->on('registers.varan_id','=','trackings.partner_varan_id')
	->where('trackings.user_varan_id','=',$id)
	->where('trackings.purpose','=','Profile_Viewed')
	->orderBy('trackings.id', 'DESC');
});

$myviewedhistory = $query->distinct()->get();

return view('pages.myviewedhistory',compact('myviewedhistory'));
            }

        // For New Macths

}
