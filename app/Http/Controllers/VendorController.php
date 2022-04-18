<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.vendor');
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

            $vendortype = $request->vendortype;

            $image = $request->image;



            if($vendortype == 'Broker')
            {
                $validated = $request->validate([
                    'name' => 'required|max:25',
                    'email' => 'required|max:50',
                    'mblnum' => 'required|max:12',
                    'vendortype' => 'required',
                    'image' => '',
                    'pwd' => 'required',

                ]);

                $invID =0;
                $maxValue = DB::table('users')
                ->WHERE('role','3')
                ->count();
                $invID=$maxValue+1;
                $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

                $MatId="VARANBR".$invID;

                $savebroker = DB::table('users')->insert(
                    array(
                        'name'     =>   $request->name,
                         'email'   =>   $request->email,
                         'mblno'   =>   $request->mblnum,
                         'password'   =>   Hash::make($request->pwd),
                         'role'   =>   3,
                         'broker_id'   =>   $MatId,

                    )
                );
            }
            else
            {
                $validated = $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'mblnum' => 'required',
                    'vendortype' => 'required',
                    'image' => 'required|max:250',
                    'pwd' => '',
                ]);
            }

            if($validated)
            {
                if($request->image == '')
                {
                    // return "Image No";
                    $vendordata = DB::table('vendors')->insert(
                        array(
                            'Name'     =>   $request->name,
                             'email'   =>   $request->email,
                             'Mobile_number'   =>   $request->mblnum,
                             'Vendor_Type'   =>   $request->vendortype,
                             'Password'   =>   $request->pwd,
                             'Approval_Status'   =>   'Pending',

                        )
                    );
                }
                else
                {

                    $file = $request->file('image');
                    $extension = $file ->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('images/',$filename);

                    // dd($filename);
                    $vendordata = DB::table('vendors')->insert(
                        array(
                            'Name'     =>   $request->name,
                             'email'   =>   $request->email,
                             'Mobile_number'   =>   $request->mblnum,
                             'Vendor_Type'   =>   $request->vendortype,
                             'Logos'     =>   $filename,
                             'Approval_Status'   =>   'Pending',
                        )
                    );
                }

                return redirect('/vendor')->with('success','Request Send Successfully');

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
}
