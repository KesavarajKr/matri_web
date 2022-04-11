@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section">

            <div class="container">
                <div class="register-inner">
                    <div class="row">
                        <div class="col-lg-3 align-items-center">
                            <div class="card searchbox">

                                    <h3>Advanced Search</h3>
                                    <div class="searchbox">
                                    <form method="POST" action="/searchresult">
                                        @csrf
                                        <label>Looking For</label>
                                        <div class="form-group">

                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                                <p class="" style="color:#000" for="inlineRadio1">Male</p>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                                <p class=" text-dark" for="inlineRadio2">Female</p>
                                              </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="margin-bottom:15px;">Age From</label>
                                                    <select class="form-control select2 form-design-2" name="agefrom">
                                                        <option value="">Any</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="33">33</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">Age To</label>
                                                    <select class="form-control select2 form-design-2" name="ageto">
                                                        <option value="">Any</option>
                                                        <option value="">Any</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="33">33</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">Marital Status</label>
                                                    <select class="form-control select2 form-design-2" multiple name="maritalstatus[]">
                                                        {{-- <option value="">Any</option> --}}
                                                        @if($maritalstatus)
                                                            @foreach ($maritalstatus as $marital)
                                                                <option value="{{$marital->id}}">{{$marital->matrial_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">Religion</label>
                                                    <select class="form-control select2 form-design-2" multiple name="religion[]">
                                                        {{-- <option value="">Any</option> --}}

                                                        @if($religions)
                                                            @foreach ($religions as $religion)
                                                                <option value="{{$religion->id}}">{{$religion->religion_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom:15px;">Caste</label>
                                                    <select class="form-control select2 form-design-2" multiple name="caste[]">
                                                        @if($caste)
                                                            @foreach ($caste as $castes)
                                                                <option value="{{$castes->id}}">{{$castes->Caste_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">Sub Caste</label>
                                                    <select class="form-control select2 form-design-2" multiple name="subcaste[]">
                                                        @if($subcaste)
                                                        @foreach ($subcaste as $subcastes)
                                                            <option value="{{$subcastes->id}}">{{$subcastes->subcategory_name}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">Country</label>
                                                    <select class="form-control select2 form-design-2" multiple name="country[]">
                                                        @if($country)
                                                        @foreach ($country as $countries)
                                                            <option value="{{$countries->country_id}}">{{$countries->country_name}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">State</label>
                                                    <select class="form-control select2 form-design-2" multiple name="state[]">
                                                        @if($states)
                                                        @foreach ($states as $state)
                                                            <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">District</label>
                                                    <select class="form-control select2 form-design-2" multiple name="district[]">
                                                        @if($cities)
                                                        @foreach ($cities as $city)
                                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom:15px;">Height From</label>
                                                    <select class="form-control select2 form-design-2"  name="heightfrom">
                                                        @if($height)
                                                        @foreach ($height as $ht)
                                                            <option value="{{$ht->id}}">{{$ht->height_name}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group ">
                                                    <label style="margin-bottom:15px;">Height To</label>
                                                    <select class="form-control select2 form-design-2"  name="heightto">
                                                        @if($height)
                                                        @foreach ($height as $ht)
                                                            <option value="{{$ht->id}}">{{$ht->height_name}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="form-group">
                                                <h6 style="margin-bottom:15px;">Membership Type</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="membershiptype" id="exampleRadios1" value="All Members" checked>
                                                <label class="" for="exampleRadios1">
                                                  All Members
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="membershiptype" id="exampleRadios2" value="1">
                                                <label class="" for="exampleRadios2">
                                                  Premium Members
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="membershiptype" id="exampleRadios3" value="0">
                                                <label class="" for="exampleRadios3">
                                                  Free Members
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="varanid" value="{{session('LoggedUser')}}">
                                        <button type="submit" class="btn btn-primary w-100 submitbtn">Search</button>
                                    </form>
                                </div>
                              </div>

                        </div>

                        <div class="col-lg-9">

                            @if($search)
                                @foreach ($search as $profiles)

                                <div class="matches-container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4 ">
                                                <div class="matchimg">
                                                <img src="assets/images/Group_3.png" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <h3 class="profile-name">{{$profiles->Name}}<sub>{{$profiles->varan_id}}</sub></h3>
                                                <table class="table table-bordered mt-4">
                                                    <tr>
                                                        <th class="profilematches"><img src="assets/images/Vector.png" class="img-fluid" style="width:30px"><span class="">{{$profiles->age}} Years</span></th>
                                                        <th class="profilematches"><img src="assets/images/subcaste.png" class="img-fluid" style="width:30px"><span class="">{{$profiles->subcategory_name}}</span></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="profilematches"><img src="assets/images/occupation.png" class="img-fluid" style="width:30px"><span class="">
                                                            @if($profiles->name == "")
                                                                Nill
                                                                @else
                                                                {{$profiles->name}}
                                                            @endif
                                                        </span></th>
                                                        <th class="profilematches"><img src="assets/images/location.png" class="img-fluid" style="width:30px"><span class="">

                                                            @if($profiles->state_name == "")
                                                                Nill
                                                                @else
                                                                {{$profiles->state_name}}
                                                            @endif
                                                        </span></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="profilematches"><img src="assets/images/education.png" class="img-fluid" style="width:30px"><span class="">
                                                            @if($profiles->eduname == "")
                                                            Nill
                                                            @else
                                                            {{$profiles->eduname}}
                                                        @endif
                                                        </span></th>
                                                        <th class="profilematches"><img src="assets/images/religion.png" class="img-fluid" style="width:30px"><span class="">
                                                            @if($profiles->religion_name == "")
                                                            Nill
                                                            @else
                                                            {{$profiles->religion_name}}
                                                        @endif
                                                        </span></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cardbottom">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4">


                                                    @if($profiles->fav == 0)

                                                        <form method="POST" action="/addFavourite">
                                                            @csrf
                                                            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                            <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                            <input type="hidden" name="status" value="liked">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Add to Favourite</span></button>
                                                        </form>
                                                        @else

                                                        <form method="POST" action="/addFavourite">
                                                            @csrf
                                                            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                            <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                            <input type="hidden" name="status" value="liked">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Already in Favourite</span></button>
                                                        </form>
                                                    @endif




                                                </div>
                                                <div class="col-lg-4">
                                                    <a href="{{route('bio.show',$profiles->id)}}" class="btn btn-default"><img src="assets/images/viewprofile.png" style="width:30px" class="img-fluid"><span>View Profile</span></a>
                                                </div>
                                                <div class="col-lg-4">
                                                    <button class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Ignore</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @else
                            @endif

                        </div>

                    </div>



                </div>
            </div>
    </section>
@endsection

