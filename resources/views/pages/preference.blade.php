@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

<section class="register-section">

    <div class="container">
        <div class="register-inner">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 ">
                    <div class="row">
                        <div class="col-lg-4 ">
                            <h2 class="text-center" style="font-weight:bold;font-size:55px">{{$count1}}%</h2>
                        </div>
                        <div class="col-lg-8 ">
                            <div class="card" style="border-radius:50px;margin-top:10px">
                                <div class="card-body">
                                    <div class="progress ">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$count1}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="col-lg-10 offset-lg-1">
                    <div class="card " style="border-radius:20px 20px 20px 20px">
                        <div class="card-body" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:30px">
                            <ul class="menuicons p-0">
                                <li class="menulist" ><a class="menulink" href="/aboutme"><i class="bi bi-card-text" style="color:#fff;font-size:25px" ></i></a></li>
                                <li class="menulist" ><a class="menulink" href="/image"><i class="bi bi-card-image" style="color:#fff;font-size:25px" ></i></a></li>
                                <li class="menulist" ><a class="menulink" href="/basicdetails"><i class="bi bi-card-checklist" style="color:#fff;font-size:25px"></i> </a></li>
                                <li class="menulist" ><a class="menulink" href="/religion"><i class="bi bi-bank2" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist" ><a class="menulink" href="/location"><i class="bi bi-geo-alt-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist" ><a class="menulink" href="/professional"><i class="bi bi-bag-check-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist" ><a class="menulink" href="/family"><i class="bi bi-people-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist" style="background-color:#D1B162"><a class="menulink" href="/preference"><i class="bi bi-person-lines-fill" style="color:#6d1140;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/horoscope"><i class="bi bi-snow" style="color:#fff;font-size:25px"></i></a></li>
                            </ul>

                            <h3 style="font-weight:bold;margin-left:20px">Preference Details</h3>

                            <form method="POST" action="/updatepreference">
                                @csrf
                                <h5 style="margin-left:30px;margin-top:20px;font-weight:bold;font-size:18px;">Basic Preference</h5>
                                <div class="formcontainer">

                                    <div class="container">
                                        <div class="row mt-3">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    {{-- @dd($partners); --}}
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Partner Age From</label>
                                                    <input type="number" class="form-control form-design-2" name="agefrom" value="{{$partners->age_from}}">

                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Partner Age to</label>
                                                    <input type="number" class="form-control form-design-2" name="ageto" value="{{$partners->age_to}}">

                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Partner Height From</label>
                                                    <select class="form-control form-design-3  select2" name="heightfrom">
                                                        <option value="">-- Choose Height --</option>
                                                        @if($height1)
                                                        @foreach ($height1 as $ht)
                                                            <option value="{{$ht->id}}" {{ $ht->id == $partners->preference_height ? 'selected' : '' }}>{{$ht->height_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Partner Age to</label>
                                                    <select class="form-control form-design-3  select2" name="heightto">
                                                        <option value="">-- Choose Height --</option>
                                                        @if($height1)
                                                        @foreach ($height1 as $ht)
                                                            <option value="{{$ht->id}}" {{ $ht->id == $partners->preference_heightto ? 'selected' : '' }}>{{$ht->height_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Body Type</label>
                                                    <select class="form-control form-design-3 bodytype select2" name="bodytype[]" multiple>
                                                        <option value="">-- Choose Body Type --</option>
                                                        @if($btype_tb)
                                                        @foreach ($btype_tb as $body)
                                                            <option value="{{$body->id}}" {{ $body->id == $partners->preference_bodytype ? 'selected' : '' }}>{{$body->btype}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Complexion</label>
                                                    <select class="form-control form-design-3  select2" name="complexion[]" multiple>
                                                        <option value="">-- Choose Complexion --</option>
                                                        @if($complexion1)
                                                        @foreach ($complexion1 as $complexiondetails)
                                                            <option value="{{$complexiondetails->id}}" {{ $complexiondetails->id == $partners->preference_complexion ? 'selected' : '' }}>{{$complexiondetails->com_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Marital Status</label>
                                                    <select class="form-control form-design-3  select2" name="maritalstatus[]" multiple>
                                                        <option value="">-- Choose Marital Status --</option>
                                                        @if($matrial_tb)
                                                        @foreach ($matrial_tb as $marriage)
                                                            <option value="{{$marriage->id}}" {{ $marriage->id == $partners->marital_status ? 'selected' : '' }}>{{$marriage->matrial_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h5 style="margin-left:30px;margin-top:20px;font-weight:bold;font-size:18px;">Professional Preference</h5>

                                <div class="formcontainer">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label style="color:#000;font-weight:bold;margin-bottom:10px">Education Category</label>
                                                        <select class="form-control form-design-3 bodytype select2" name="educationcat[]" multiple>
                                                            <option value="">-- Choose Education --</option>
                                                            @if($education)
                                                            @foreach ($education as $edu)
                                                                <option value="{{$edu->id}}" {{ $edu->id == $partners->preference_educat ? 'selected' : '' }}>{{$edu->name}}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>

                                                    </div>

                                            </div>

                                            <div class="col-lg-6">

                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Education Details</label>

                                                    <input type="text" class="form-control form-design-2" name="educationdetail" value="{{$partners->preference_edudetails}}">
                                                </div>

                                        </div>

                                        <div class="col-lg-6 mt-3">
                                            <div class="form-group">
                                                <label style="color:#000;font-weight:bold;margin-bottom:10px">Job Category</label>
                                                <select class="form-control form-design-3 bodytype select2" name="jobcategory[]" multiple>
                                                    <option value="">-- Choose Job Category --</option>
                                                    @if($job)
                                                    @foreach ($job as $jobs)
                                                        <option value="{{$jobs->id}}" {{ $jobs->id == $partners->preference_jobcat ? 'selected' : '' }}>{{$jobs->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-lg-6 mt-3">

                                            <div class="form-group">
                                                <label style="color:#000;font-weight:bold;margin-bottom:10px">Job in Details</label>

                                                <input type="text" class="form-control form-design-2" name="jobdetail" value="{{$partners->preference_jobdetails}}">
                                            </div>

                                    </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 style="margin-left:30px;margin-top:20px;font-weight:bold;font-size:18px;">Religion Preference</h5>

                                <div class="formcontainer">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Religion</label>
                                                    <select class="form-control form-design-3 bodytype select2" name="religion[]" multiple>
                                                        <option value="">-- Choose Religion --</option>
                                                        @if($regli_tb)
                                                        @foreach ($regli_tb as $religion)
                                                            <option value="{{$religion->id}}" {{ $religion->id == $partners->preference_religion ? 'selected' : '' }}>{{$religion->religion_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Caste</label>
                                                    <select class="form-control form-design-3  select2" name="caste[]" multiple>
                                                        <option value="">-- Choose Caste --</option>
                                                        @if($caste)
                                                        @foreach ($caste as $cast)
                                                            <option value="{{$cast->id}}" {{ $cast->id == $partners->preference_caste ? 'selected' : '' }}>{{$cast->Caste_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Sub Caste</label>
                                                    <select class="form-control form-design-3  select2" name="subcaste[]" multiple>
                                                        <option value="">-- Choose Subcaste --</option>
                                                        @if($subcastes)
                                                        @foreach ($subcastes as $subcas)
                                                            <option value="{{$subcas->id}}" {{ $subcas->id == $partners->preference_subcaste ? 'selected' : '' }}>{{$subcas->subcategory_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 style="margin-left:30px;margin-top:20px;font-weight:bold;font-size:18px;">Location Preference</h5>

                                <div class="formcontainer">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">Country</label>
                                                    <select class="form-control form-design-3 bodytype select2" name="country[]" multiple>
                                                        <option value="">-- Choose Country --</option>
                                                        @if($country1)
                                                        @foreach ($country1 as $countrys)
                                                            <option value="{{$countrys->country_id}}" {{ $countrys->country_id == $partners->preference_country ? 'selected' : '' }}>{{$countrys->country_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">State</label>
                                                    <select class="form-control form-design-3 bodytype select2" name="state[]" multiple>
                                                        <option value="">-- Choose State --</option>
                                                        @if($state1)
                                                        @foreach ($state1 as $states)
                                                            <option value="{{$states->state_id}}" {{ $states->state_id == $partners->preference_state ? 'selected' : '' }}>{{$states->state_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:#000;font-weight:bold;margin-bottom:10px">District</label>
                                                    <select class="form-control form-design-3 bodytype select2" name="district[]" multiple>
                                                        <option value="">-- Choose District --</option>
                                                        @if($cities1)
                                                        @foreach ($cities1 as $city)
                                                            <option value="{{$city->city_id}}" {{ $city->city_id == $partners->preference_district ? 'selected' : '' }}>{{$city->city_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="varanid" value="{{session('LoggedUser')}}">
                                <button type="submit" class="btn btn-primary" style="border-radius:50px;background-image: linear-gradient(to right, #98803b 0%, #98803b 41%, #b69972 100%);border:0px;margin:25px auto;display:block;width:250px">Save & Continue</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
</div>
</section>
@endsection

