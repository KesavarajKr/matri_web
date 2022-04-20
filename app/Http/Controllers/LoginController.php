<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\register;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
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

    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'mblnum'=>'required',
                'pwd'=>'required'
            ]
            );

            $mblnum = $request->input('mblnum');
            $pwd = $request->input('pwd');



                $user = DB::table('registers')
                ->select('*')
                ->where('mobile_no','=',$mblnum)
                ->where('password','=',$pwd)
                ->first();
                // dd($user);
                // $user = register::where('mobile_no',$mblnum)->first();
                // Auth::login($user);
                // return redirect('aboutme');

                if($user)
                {


                    $usercheck = DB::table('registers')
                    ->select('*')
                    ->where('mobile_no','=',$mblnum)
                    ->where('password','=',$pwd)
                    ->where('status','=','1')
                    ->get();
                    // dd($usercheck);
                    if($usercheck->count() == 1)
                    {
                        $request->session()->put('LoggedUser',$user->varan_id);

                        $ip = $request->ip();
                        $varanid=$user->varan_id;

                        $updatedata= DB::table('logdetails_tb')->insert(
                            ['user_id' => $varanid, 'user_ip' => $ip]);
                        return redirect('aboutme');
                        // return "Approved";

                    }
                    else
                    {
                        // return "Not Approved";
                        return back()->with('error','Your Details reviewed please wait while approvad');
                    }

                }
                else
                {
                    return back()->with('error','Incorrect Credientials');
                }

    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }
}
