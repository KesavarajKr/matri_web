<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = session('LoggedUser');
        $interestcount= DB::table('interests')
        ->where('interests.liked_varan_id','=',$id)
        ->where('interests.partner_status','=','0')
        ->distinct('user_varan_id')->count('user_varan_id');

        $sendinterest = $query= DB::table('interests')
->where('interests.user_varan_id','=',$id)
->where('interests.partner_status','=','0')
->where('interests.Status','=','Interest')
->distinct('liked_varan_id')->count('liked_varan_id');



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
->select('registers.Name', 'registers.id','registers.age', 'regli_tb.religion_name', 'eductiondetails_tb.name as eduname','states.state_name','registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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
->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
->leftJoin('states','registers.state','=','states.state_id')
->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
->leftJoin('images',function($query) {
	$query->on('registers.varan_id','=','images.varanid')
	->where('images.approve_status','<>','0')
	->where('images.image_status','=','Main');
})
->Join('interests',function($query) use ($id){
	$query->on('registers.varan_id','=','interests.user_varan_id')
	->where('interests.liked_varan_id','=',$id)
	->where('interests.partner_status','=','1')
	->orderBy('interests.id', 'DESC');
});

    $acceptedinterest = $query->distinct()->get();

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
->select('registers.Name', 'registers.id','registers.age', 'regli_tb.religion_name', 'eductiondetails_tb.name as eduname','states.state_name','registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

                        WHEN favourites.liked_varan_id = registers.varan_id THEN 1

                        ELSE 0

                        END) AS fav'), DB::raw('(CASE

                        WHEN images.privacy_type = "All" THEN 0

                        WHEN images.privacy_type = "'.$privacystatus.'" THEN 0

                        ELSE null

                        END) AS imageview'))
->leftJoin('subcastes','registers.sub_caste','=','subcastes.id')
->leftJoin('jobdescription_tb','registers.job_category','=','jobdescription_tb.id')
->leftJoin('regli_tb','registers.Religion','=','regli_tb.id')
->leftJoin('states','registers.state','=','states.state_id')
->leftJoin('eductiondetails_tb','registers.eduction','=','eductiondetails_tb.id')
->leftJoin('favourites','registers.varan_id','=','favourites.liked_varan_id')
->leftJoin('images',function($query) {
	$query->on('registers.varan_id','=','images.varanid')
	->where('images.approve_status','<>','0')
	->where('images.image_status','=','Main');
})
->Join('interests',function($query) use ($id){
	$query->on('registers.varan_id','=','interests.user_varan_id')
	->where('interests.liked_varan_id','=',$id)
	->where('interests.partner_status','=','2')
	->orderBy('interests.id', 'DESC');
});

$rejectinterest = $query->distinct()->get();
        // dd($interestcount);
        return view('pages.mailbox',compact('interestcount','acceptedinterest','rejectinterest','sendinterest'));

        // return view('pages.mailbox');
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

    public function receivedinterest(Request $request)
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
->select('registers.Name','registers.id', 'registers.age','regli_tb.religion_name', 'eductiondetails_tb.name as eduname','states.state_name','registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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
->leftJoin('images',function($query) {
	$query->on('registers.varan_id','=','images.varanid')
	->where('images.approve_status','<>','0')
	->where('images.image_status','=','Main');
})
->Join('interests',function($query) use ($id){
	$query->on('registers.varan_id','=','interests.user_varan_id')
	->where('interests.liked_varan_id','=',$id)
	->where('interests.partner_status','=','0')
	->orderBy('interests.id', 'DESC');
});

 $receivedinterest = $query->get();

//  dd($receivedinterest);

 return view('pages.receivedinterest',compact('receivedinterest'));
    }

    public function acceptinterest(Request $request)
    {

        $userid = $request->userid;
        $varanid = session('LoggedUser');

        $updatedata= DB::table('interests')->where('liked_varan_id',$varanid)
        ->where('user_varan_id',$userid)
        ->update(array(
            'partner_status'=>1,
        ));
        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');
        DB::table('trackings')->insert(
            [
                'user_varan_id' => $varanid,
                'partner_varan_id' => $userid,
                'purpose' => 'Interest_Accepted',
                'created_at' => $datetime
            ]);


        if($updatedata)
        {
            return redirect('/mailbox')->with('success',' Updated Successfully');
        }

    }

    public function rejectinterest(Request $request)
    {
        $userid = $request->userid;
        $varanid = session('LoggedUser');

        $updatedata= DB::table('interests')->where('liked_varan_id',$varanid)
        ->where('user_varan_id',$userid)
        ->update(array(
            'partner_status'=>2,
        ));

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');
        DB::table('trackings')->insert(
            [
                'user_varan_id' => $varanid,
                'partner_varan_id' => $userid,
                'purpose' => 'Interest_Rejected',
                'created_at' => $datetime
            ]);

        if($updatedata)
        {
            return redirect('/mailbox')->with('success',' Updated Successfully');
        }
    }

    public function sendinterest(Request $request)
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
  ->select('registers.Name','registers.id','regli_tb.religion_name','eductiondetails_tb.name as eduname','states.state_name','registers.age', 'registers.varan_id', 'subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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
  ->leftJoin('images',function($query) {
      $query->on('registers.varan_id','=','images.varanid')
      ->where('images.approve_status','<>','0')
      ->where('images.image_status','=','Main');
  })
  ->Join('interests',function($query) use ($id){
      $query->on('registers.varan_id','=','interests.liked_varan_id')
      ->where('interests.user_varan_id','=',$id)
      ->where('interests.status','=','Interest')
      ->orderBy('interests.id', 'DESC');
  });

  $sentinterest = $query->get();


  return view('pages.sendinterest',compact('sentinterest'));

    }

    public function cancelinterest(Request $request)
    {
        $userid = $request->userid;
        $varanid = session('LoggedUser');

        $updatedata= DB::table('interests')->where('user_varan_id',$varanid)
        ->where('liked_varan_id',$userid)
        ->update(array(
            'Status'=>'Canceled',
        ));
        $delete=DB::table('interests')
        ->where('user_varan_id', $varanid)
        ->where('liked_varan_id', $userid)
        ->delete();

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');
        DB::table('trackings')->insert(
            [
                'user_varan_id' => $varanid,
                'partner_varan_id' => $userid,
                'purpose' => 'Canceled_interest',
                'created_at' => $datetime
            ]);
        if($updatedata)
        {
            return redirect('/mailbox')->with('success',' Interest Canceled');
        }
    }
}
