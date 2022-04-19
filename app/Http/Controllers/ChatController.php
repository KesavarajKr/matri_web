<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.chat');
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
        $userid = $request->userid;
        $partnerid = $request->partnerid;
        $sendby = $request->sendby;
        $sendmessage = $request->sendmessage;

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');

        $storedata= DB::table('chat_box')->insert(
            [
            'user_id' => $userid,
            'partner_id' => $partnerid,
            'send_message' => $sendmessage,
            'send_by' => $sendby,
            'send_at' => $datetime
            ]
        );

        if($storedata)
        {
            return back()->with('success','Request Send Successfully');
        }
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

    public function storechat(Request $request)
    {
        $userid = $request->userid;
        $partnerid = $request->partnerid;
        $sendby = $request->sendby;
        $sendmessage = $request->sendmessage;

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date('Y-m-d h:i:s');

        $storedata= DB::table('chat_box')->insert(
            [
            'user_id' => $userid,
            'partner_id' => $partnerid,
            'send_message' => $sendmessage,
            'send_by' => $sendby,
            'send_at' => $datetime
            ]
        );
        return response()->json(['success'=>'Message Sent']);

    }

    public function getchat($partnerid,$sessionid)
    {
        $data = $partnerid;
        $data1 = $sessionid;

        return $data1;
    }


}
