<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varanid = session('LoggedUser');
        $imgcount = DB::table('images')
        ->select('*')
        ->where('varanid','=',$varanid)
        ->get();
        $videocount = DB::table('videos')
        ->select('*')
        ->where('varan_id','=',$varanid)
        ->get();
        $horoscopecount = DB::table('horoscopes')
        ->select('*')
        ->where('varan_id','=',$varanid)
        ->get();

        $count=0;
           $reg  = DB::table('registers')->where('varan_id', $varanid)->first();
           $created_for=$reg->created_for;
           if($created_for!=""){$count=$count+1;}
           $looking_for=$reg->looking_for;
           if($looking_for!=""){ $count=$count+1; }
           $eduction=$reg->eduction;
           if($eduction!=""){$count=$count+1;}
             $Name=$reg->Name;
           if($Name!=""){$count=$count+1;}
            $Gender=$reg->Gender;
           if($Gender!=""){$count=$count+1;}
            $dob=$reg->dob;
           if($dob!=""){$count=$count+1;}
           $age=$reg->age;
           if($age!=""){$count=$count+1;}
            $Monther_tongue=$reg->Monther_tongue;
           if($Monther_tongue!=""){$count=$count+1;}
           $Religion=$reg->Religion;
           if($Religion!=""){$count=$count+1;}
           $Caste=$reg->Caste;
           if($Caste!=""){$count=$count+1;}
            $sub_caste=$reg->sub_caste;
           if($sub_caste!=""){$count=$count+1;}
           $mobileno_code=$reg->mobileno_code;
           if($mobileno_code!=""){$count=$count+1;}
            $mobile_no=$reg->mobile_no;
           if($mobile_no!=""){$count=$count+1;}
            $email_id=$reg->email_id;
           if($email_id!=""){$count=$count+1;}
           $password=$reg->password;
           if($password!=""){$count=$count+1;}
            $physical_status=$reg->physical_status;
           if($physical_status!=""){$count=$count+1;}
            $body_type=$reg->body_type;
           if($body_type!=""){$count=$count+1;}
            $complexion=$reg->complexion;
           if($complexion!=""){$count=$count+1;}
            $height=$reg->height;
           if($height!=""){$count=$count+1;}
            $marital_status=$reg->marital_status;
           if($marital_status!=""){$count=$count+1;}
            $no_of_children=$reg->no_of_children;
           if($no_of_children!=""){$count=$count+1;}
            $whatsapp_no=$reg->whatsapp_no;
           if($whatsapp_no!=""){$count=$count+1;}
            $com_address=$reg->com_address;
           if($com_address!=""){$count=$count+1;}
            $country=$reg->country;
           if($country!=""){$count=$count+1;}
            $state=$reg->state;
           if($state!=""){$count=$count+1;}
            $district=$reg->district;
           if($district!=""){$count=$count+1;}
            $municipality_panchayat=$reg->municipality_panchayat;
           if($municipality_panchayat!=""){$count=$count+1;}
            $other_countryaddress=$reg->other_countryaddress;
           if($other_countryaddress!=""){$count=$count+1;}
            $residential_address=$reg->residential_address;
           if($residential_address!=""){$count=$count+1;}
            $eduction_detail=$reg->eduction_detail;
           if($eduction_detail!=""){$count=$count+1;}
            $job_category=$reg->job_category;
           if($job_category!=""){$count=$count+1;}
            $job_detail=$reg->job_detail;
           if($job_detail!=""){$count=$count+1;}
            $job_country=$reg->job_country;
           if($job_country!=""){$count=$count+1;}
            $job_state=$reg->job_state;
           if($job_state!=""){$count=$count+1;}
            $job_city=$reg->job_city;
           if($job_city!=""){$count=$count+1;}
            $job_location=$reg->job_location;
           if($job_location!=""){$count=$count+1;}
            $annual_income=$reg->annual_income;
           if($annual_income!=""){$count=$count+1;}
            $father_name=$reg->father_name;
           if($father_name!=""){$count=$count+1;}
            $father_occuption=$reg->father_occuption;
           if($father_occuption!=""){$count=$count+1;}
            $mother_name=$reg->mother_name;
           if($mother_name!=""){$count=$count+1;}
            $mother_occuption=$reg->mother_occuption;
           if($mother_occuption!=""){$count=$count+1;}
            $total_sibblings=$reg->total_sibblings;
           if($total_sibblings!=""){$count=$count+1;}
            $elder_sister=$reg->elder_sister;
           if($elder_sister!=""){$count=$count+1;}
            $younger_sister=$reg->younger_sister;
           if($younger_sister!=""){$count=$count+1;}
            $elder_brother=$reg->elder_brother;
           if($elder_brother!=""){$count=$count+1;}
            $younger_brother=$reg->younger_brother;
           if($younger_brother!=""){$count=$count+1;}
            $about_myself=$reg->about_myself;
           if($about_myself!=""){$count=$count+1;}
            $rasi=$reg->rasi;
           if($rasi!=""){$count=$count+1;}
            $laknam=$reg->laknam;
           if($laknam!=""){$count=$count+1;}
            $stars=$reg->stars;
           if($stars!=""){$count=$count+1;}
            $dosam=$reg->dosam;
           if($dosam!=""){$count=$count+1;}
            $birth_time=$reg->birth_time;
           if($birth_time!=""){$count=$count+1;}
            $blood_group=$reg->blood_group;
           if($blood_group!=""){$count=$count+1;}

           $images = DB::table('images')
            ->select('varanid')
            ->where('varanid', '=', $varanid)
            ->get()->count();

            if ($images>0){
                $count=$count+1;
                }

                $horoscopes = DB::table('horoscopes')
            ->select('varan_id')
            ->where('varan_id', '=', $varanid)
            ->get()->count();

            if ($horoscopes>0){
                $count=$count+1;
                }
        //   $count=51;
           $count1 =round($count * 1.82);
        //    $count1=$count/100;
            $allimages = DB::table('images')
            ->select('*')
            ->where('varanid','=',$varanid)
            ->get();

            $allvideos = DB::table('videos')
            ->select('*')
            ->where('varan_id','=',$varanid)
            ->get();

            $allhoroscope = DB::table('horoscopes')
            ->select('*')
            ->where('varan_id','=',$varanid)
            ->get();

        return view('pages.images',compact('imgcount','videocount','horoscopecount','count1','allimages','allvideos','allhoroscope'));
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
        $varanid = session('LoggedUser');
        $delete=DB::table('images')->where('id', $id)->delete();
        if($delete){

             $updatedata= DB::table('images')->where('varanid',$varanid)
             ->limit(1)
                  ->update(array(
                      'image_status'=>"Main",
                  ));

                if($updatedata)
                {
                    return redirect('/image')->with('success','Image Deleted');
                }
        }
    }

    public function uploadimage(Request $request)
    {
        $varanid = $request->varanid;

       $validation = $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        if($validation)
        {
                $file = $request->file('image');
                $extension = $file ->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('images/',$filename);

                $imagecount = DB::table('images')
                ->select('image_name')
                ->where('varanid', '=', $varanid)
                ->get()->count();
                if($imagecount==0){
                    $uploadimage = DB::table('images')->insert(
                        array(
                            'image_name'     =>   $filename,
                            'varanid'   =>   $varanid,
                            'image_status'   =>   'Main',
                        )
                        );
                }
                else
                {
                    $uploadimage = DB::table('images')->insert(
                        array(
                            'image_name'     =>   $filename,
                            'varanid'   =>   $varanid,
                        )
                        );
                }

                if($uploadimage)
                {
                    return redirect('/image')->with('success','Image Uploaded Successfully');
                }
                else
                {
                    return "error";
                }
        }
        else
        {
            return redirect('/image')->with('success','Image Uploaded Failed');
        }


    }

    public function uploadvideo(Request $request)
    {
        $varanid = $request->varanid;

       $validation = $this->validate($request, [
            'video' => 'required|mimes:mp4|max:2024',
        ]);

        if($validation)
        {
                $file = $request->file('video');
                $extension = $file ->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('images/',$filename);

                $uploadimage = DB::table('videos')->insert(
                    array(
                        'video_name'     =>   $filename,
                        'varan_id'   =>   $varanid,
                    )
                );

                if($uploadimage)
                {
                    return redirect('/image')->with('success','Video Uploaded Successfully');
                }
                else
                {
                    return "error";
                }
        }
        else
        {
            // return redirect('/image')->with('success','Image Uploaded Failed');
        }


    }

    public function uploadhoroscope(Request $request)
    {
        $varanid = $request->varanid;
        $title = $request->horoscopetitle;

       $validation = $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        if($validation)
        {
                $file = $request->file('image');
                $extension = $file ->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('images/',$filename);

                $uploadimage = DB::table('horoscopes')->insert(
                    array(
                        'img_name'     =>   $filename,
                        'varan_id'   =>   $varanid,
                        'title'   =>   $title,
                    )
                );

                if($uploadimage)
                {
                    return redirect('/image')->with('success','Horoscope Details Uploaded Successfully');
                }
                else
                {
                    return "error";
                }
        }
        else
        {
            // return redirect('/image')->with('success','Image Uploaded Failed');
        }


    }

   public function deleteimage($id=null,$id1=null){



        $delete=DB::table('images')->where('id', $id)->delete();
        if($delete){

             $updatedata= DB::table('images')->where('varanid',$id1)
             ->limit(1)
                  ->update(array(
                      'image_status'=>"Main",
                  ));




            return response()->json([
            'status' => '200',
            'message' => 'Deleted Successfully',
        ]);
        }

    }


}
