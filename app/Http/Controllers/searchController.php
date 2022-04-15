<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
->select('registers.id','registers.Name', 'registers.age', 'registers.varan_id', 'regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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


   $search = $query->inRandomOrder()->get();


  $maritalstatus = DB::table('matrial_tb')
    ->select('*')
    ->get();

    $religions = DB::table('regli_tb')
    ->select('*')
    ->get();

    $caste = DB::table('castes')
    ->select('*')
    ->get();

    $subcaste = DB::table('subcastes')
    ->select('*')
    ->get();

    $country = DB::table('countries')
    ->select('*')
    ->get();

    $states = DB::table('states')
    ->select('*')
    ->get();

    $cities = DB::table('cities')
    ->select('*')
    ->get();

    $height = DB::table('height_tb')
    ->select('*')
    ->get();

   return view('pages.search',compact('search','maritalstatus','religions','caste','subcaste','country','states','cities','height'));


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

    public function searchresult(Request $request)
    {
        $gender = $request->gender;
        $agefrom = $request->agefrom;
        $ageto = $request->ageto;
        $maritalstatus = $request->maritalstatus;
        $religion = $request->religion;
        $caste = $request->caste;
        $subcaste = $request->subcaste;
        $country = $request->country;
        $state = $request->state;
        $district = $request->district;
        $heightfrom = $request->heightfrom;
        $heightto = $request->heightto;
        $membershiptype = $request->membershiptype;
        $varanid = $request->varanid;

        $filter = DB::table('registers')

        ->select('registers.Name','registers.id', 'registers.age','registers.varan_id','registers.dob','registers.Gender','regli_tb.religion_name','registers.email_id','registers.mobile_no','registers.varan_id', 'registers.no_of_children','registers.no_of_children','registers.whatsapp_no','registers.com_address','registers.municipality_panchayat','registers.other_countryaddress','registers.residential_address','subcastes.subcategory_name','subcastes.Category_name','registers.eduction_detail','registers.job_detail','jobdescription_tb.name', 'castes.Caste_name','matrial_tb.matrial_name','countries.country_name','states.state_name','cities.city_name','eductiondetails_tb.name as eduname','registers.annual_income','registers.father_name','registers.father_occuption','registers.mother_name','registers.mother_occuption','registers.total_sibblings','registers.elder_sister','registers.younger_sister','registers.elder_brother','registers.younger_brother','registers.about_myself','registers.laknam','registers.dosam','registers.birth_time','registers.blood_group',DB::raw('(CASE

        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

        ELSE 0

        END) AS fav'), DB::raw('(CASE

        WHEN images.privacy_type = "All" THEN 0


        ELSE null

        END) AS imageview'))

        ->whereBetween('age', [$agefrom, $ageto])
        ->WhereBetween('height', [$heightfrom, $heightto])
        ->WhereIn('marital_status', $maritalstatus)
        ->WhereIn('Religion', $religion)
        ->WhereIn('Caste', $caste)
        ->WhereIn('sub_caste', $subcaste)
        ->WhereIn('country', $country)
        ->WhereIn('state', $state)
        ->WhereIn('district', $district)
        ->Where('gender', $gender)
        ->Where('member_shiptype', $membershiptype)
        ->where('varan_id','!=',$varanid)


        ->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
        ->leftJoin('matrial_tb','registers.marital_status','=','matrial_tb.id')
        ->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
        ->leftJoin('castes','registers.Caste','=','castes.id')
        ->leftJoin('countries','registers.country','=','countries.country_id')
        ->leftJoin('states','registers.state','=','states.state_id')
        ->leftJoin('cities','registers.district','=','cities.city_id')
        ->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
        ->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
        ->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
        ->leftJoin('images',function($query) {
            $query->on('registers.varan_id','=','images.varanid')
            ->where('images.approve_status','<>','0')
            ->where('images.image_status','=','Main');
        })

        ->get();
        // dd($filter);
        $maritalstatus = DB::table('matrial_tb')
    ->select('*')
    ->get();

    $religions = DB::table('regli_tb')
    ->select('*')
    ->get();

    $caste = DB::table('castes')
    ->select('*')
    ->get();

    $subcaste = DB::table('subcastes')
    ->select('*')
    ->get();

    $country = DB::table('countries')
    ->select('*')
    ->get();

    $states = DB::table('states')
    ->select('*')
    ->get();

    $cities = DB::table('cities')
    ->select('*')
    ->get();

    $height = DB::table('height_tb')
    ->select('*')
    ->get();

        return view('pages.searchResult',compact('filter','maritalstatus','religions','caste','subcaste','country','states','cities','height'));

    }

    public function searchvaranid(Request $request)
    {
        $varanid = $request->varanid;

        $filter = DB::table('registers')

        ->select('registers.Name','registers.id', 'registers.age','registers.varan_id','registers.dob','registers.Gender','regli_tb.religion_name','registers.email_id','registers.mobile_no','registers.varan_id', 'registers.no_of_children','registers.no_of_children','registers.whatsapp_no','registers.com_address','registers.municipality_panchayat','registers.other_countryaddress','registers.residential_address','subcastes.subcategory_name','subcastes.Category_name','registers.eduction_detail','registers.job_detail','jobdescription_tb.name', 'castes.Caste_name','matrial_tb.matrial_name','countries.country_name','states.state_name','cities.city_name','eductiondetails_tb.name as eduname','registers.annual_income','registers.father_name','registers.father_occuption','registers.mother_name','registers.mother_occuption','registers.total_sibblings','registers.elder_sister','registers.younger_sister','registers.elder_brother','registers.younger_brother','registers.about_myself','registers.laknam','registers.dosam','registers.birth_time','registers.blood_group',DB::raw('(CASE

        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

        ELSE 0

        END) AS fav'), DB::raw('(CASE

        WHEN images.privacy_type = "All" THEN 0


        ELSE null

        END) AS imageview'))


        ->where('varan_id','=',$varanid)


        ->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
        ->leftJoin('matrial_tb','registers.marital_status','=','matrial_tb.id')
        ->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
        ->leftJoin('castes','registers.Caste','=','castes.id')
        ->leftJoin('countries','registers.country','=','countries.country_id')
        ->leftJoin('states','registers.state','=','states.state_id')
        ->leftJoin('cities','registers.district','=','cities.city_id')
        ->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
        ->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
        ->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
        ->leftJoin('images',function($query) {
            $query->on('registers.varan_id','=','images.varanid')
            ->where('images.approve_status','<>','0')
            ->where('images.image_status','=','Main');
        })

        ->get();

        $maritalstatus = DB::table('matrial_tb')
        ->select('*')
        ->get();

        $religions = DB::table('regli_tb')
        ->select('*')
        ->get();

        $caste = DB::table('castes')
        ->select('*')
        ->get();

        $subcaste = DB::table('subcastes')
        ->select('*')
        ->get();

        $country = DB::table('countries')
        ->select('*')
        ->get();

        $states = DB::table('states')
        ->select('*')
        ->get();

        $cities = DB::table('cities')
        ->select('*')
        ->get();

        $height = DB::table('height_tb')
        ->select('*')
        ->get();
        // dd($filter);

            return view('pages.searchResult',compact('filter','maritalstatus','religions','caste','subcaste','country','states','cities','height'));

    }
}
