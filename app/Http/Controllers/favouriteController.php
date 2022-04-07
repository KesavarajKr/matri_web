<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                return back()->with('success','Favourite Removed');
            }
        }
    }
}
