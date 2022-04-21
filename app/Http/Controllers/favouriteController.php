<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class favouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
  ->select('registers.Name','registers.id', 'registers.age','regli_tb.religion_name', 'eductiondetails_tb.name as eduname','registers.varan_id', 'states.state_name','subcastes.subcategory_name', 'jobdescription_tb.name', 'images.image_name',DB::raw('(CASE

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
  ->where('registers.status', '<>', '0')
  ->leftJoin('images',function($query) {
      $query->on('registers.varan_id','=','images.varanid')
      ->where('images.approve_status','<>','0')
      ->where('images.image_status','=','Main');
  })
  ->Join('favourites',function($query) use ($id){
      $query->on('registers.varan_id','=','favourites.liked_varan_id')
      ->where('favourites.user_varan_id','=',$id)
      ->where('favourites.status','=','Liked')
      ->orderBy('favourites.id', 'DESC');
  });


  $favourite = $query->get();



        return view('pages.favourite',compact('favourite'));
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
        return "Favourite";
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

    public function addFavourite(Request $request)
    {
        $uservaranid = $request->uservaranid;
             $partnervaranid = $request->partnervaranid;
             $status = $request->status;

        $favourites = DB::table('favourites')
        ->select('user_varan_id')
        ->where('user_varan_id', '=', $uservaranid)
        ->where('liked_varan_id','=',$partnervaranid)

        ->get()->count();
        date_default_timezone_set("Asia/Kolkata");
       $datetime = date('Y-m-d h:i:s');
       $datetime = date('Y-m-d H:i:s',strtotime('+30 second',strtotime($datetime)));
        if($favourites == 0)
        {

           $favourite = DB::table('favourites')->insert(
                array(
                       'user_varan_id'     =>   $uservaranid,
                       'liked_varan_id'   =>   $partnervaranid,
                       'status'   =>   $status,
                       'created_at' => $datetime
                )
            );

            DB::table('trackings')->insert(
                array(
                       'user_varan_id'     =>   $uservaranid,
                       'partner_varan_id'   =>   $partnervaranid,
                       'purpose'   =>   $status,
                       'created_at' => $datetime
                )
            );

            if($favourite)
            {
                // $data = $request->uservaranid;
                // return Redirect::back()->withInput($data);

                return back()->with('success',"Favourite Added");
            }
        }
        else
        {
            $delete=DB::table('favourites')
            ->where('user_varan_id', $uservaranid)
            ->where('liked_varan_id', $partnervaranid)
            ->delete();
            $status="Fav_Unliked";
            $fravouritetrack = DB::table('trackings')->insert(
                array(
                       'user_varan_id'     =>   $uservaranid,
                       'partner_varan_id'   =>   $partnervaranid,
                       'purpose'   =>   $status,
                       'created_at' => $datetime
                )
            );

            if($fravouritetrack)
            {
                // return back()->with(['favourites' => $favourites]);
                return back()->with('success','Favourite Removed');
            }
        }
    }
}
