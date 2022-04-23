<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class settingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varanid = session('LoggedUser');
       $register = DB::table('registers')
        ->select('*')
        ->where('varan_id','=',$varanid)
        ->first();

        $horoscope = DB::table('horoscopes')
        ->select('*')
        ->where('varan_id','=',$varanid)
        ->where('title','=','Horoscope')
        ->first();

        $images = DB::table('images')
        ->select('*')
        ->where('varanid','=',$varanid)
        ->first();

        $getrequest = DB::table('privacyphotolist')
        ->select('*')
        ->where('photoid','=',$varanid)

        ->get();


        return view('pages.settings',compact('register','horoscope','images','getrequest'));
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

    public function photoprivacy(Request $request)
    {
        $varanid=$request -> uservaranid;
        $status=$request -> status;

                    $updatedata= DB::table('images')->where('varanid',$varanid)
                    ->update(array(
                        'privacy_type'=>$status,
                    ));
                    if($updatedata)
                    {
                        return redirect()->back()->with('success', 'Photo Privacy Updated');
                    }

    }

    public function contactprivacy(Request $request)
    {
        $varanid=$request -> uservaranid;
       $status=$request -> status;

                   $updatedata= DB::table('registers')->where('varan_id',$varanid)
                   ->update(array(
                       'cprivacy_setting'=>$status,
                   ));

                   if($updatedata)
                    {
                        return redirect()->back()->with('success', 'Contact Privacy Updated');
                    }
    }

    public function bioprivacy(Request $request)
    {
        $varanid=$request -> uservaranid;
       $status=$request -> status;

                   $updatedata= DB::table('registers')->where('varan_id',$varanid)
                   ->update(array(
                       'bprivacy_setting'=>$status,
                   ));

                   if($updatedata)
                    {
                        return redirect()->back()->with('success', 'Bio Privacy Updated');
                    }
    }

    public function horoscopeprivacy(Request $request)
    {
        $varanid=$request -> uservaranid;
        $status=$request -> status;

        $updatedata= DB::table('horoscopes')
        ->where('varan_id','=',$varanid)
        ->where('title','=','Horoscope')
        ->update(array(
            'privacy_setting'=>$status,
        ));

        if($updatedata)
        {
            return redirect()->back()->with('success', 'Horoscope Privacy Updated');
        }
    }

    public function hideprofile(Request $request)
    {
        $varanid=$request -> uservaranid;
        $status=$request -> status;

        $updatedata= DB::table('registers')
        ->where('varan_id','=',$varanid)
        ->update(array(
            'account_setting'=>$status,
        ));

        if($updatedata)
        {
            return redirect()->back()->with('success', 'Profile Hide/Show Updated');
        }
    }

    public function deleteprofile(Request $request)
    {
        $varanid=$request -> uservaranid;
        $status=$request -> status;
        $deletereason = $request->deletereason;

        $updatedata= DB::table('registers')
        ->where('varan_id','=',$varanid)
        ->update(array(
            'delete_setting'=>$status,
            'delete_reason'=>$deletereason,
        ));

        if($updatedata)
        {
            return redirect()->back()->with('success', 'Delete Request Send');
        }
    }

    public function acceptcontactview(Request $request)
    {
        $requestid = $request->requestid;
        $userid = session('LoggedUser');

        $updatedata= DB::table('privacyphotolist')
        ->where('partner_id','=',$requestid)
        ->where('photoid','=',$userid)
        ->update(array(
            'status'=>1,
        ));

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');
        DB::table('trackings')->insert(
            [
                'user_varan_id' => $userid,
                'partner_varan_id' => $requestid,
                'purpose' => 'Request_Accept',
                'created_at' => $datetime
            ]);

        if($updatedata)
        {
            return redirect()->back()->with('success', 'Request Accepted');
        }
    }

    public function rejectcontactview(Request $request)
    {
        $requestid = $request->requestid;
        $userid = session('LoggedUser');

        $updatedata= DB::table('privacyphotolist')
        ->where('partner_id','=',$requestid)
        ->where('photoid','=',$userid)
        ->update(array(
            'status'=>2,
        ));

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');
        DB::table('trackings')->insert(
            [
                'user_varan_id' => $userid,
                'partner_varan_id' => $requestid,
                'purpose' => 'Request_Reject',
                'created_at' => $datetime
            ]);

        if($updatedata)
        {
            return redirect()->back()->with('success', 'Request Rejected');
        }
    }
}
