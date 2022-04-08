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

                                    <form>
                                        <label>Looking For</label>
                                        <div class="form-group">

                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                <p class="" style="color:#000" for="inlineRadio1">Male</p>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <p class=" text-dark" for="inlineRadio2">Female</p>
                                              </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Age From</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group ">
                                                    <label>Age To</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label>Marital Status</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label>Religion</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Caste</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group ">
                                                    <label>Sub Caste</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label>Country</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label>State</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group ">
                                                    <label>District</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Height From</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group ">
                                                    <label>Height To</label>
                                                    <select class="form-control select2 form-design-2">
                                                        <option value="">Any</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="form-group">
                                                <h6>Membership Type</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                <label class="" for="exampleRadios1">
                                                  Default radio
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                <label class="" for="exampleRadios2">
                                                  Second default radio
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                                <label class="" for="exampleRadios3">
                                                  Second default radio
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 submitbtn">Search</button>
                                    </form>
                              </div>

                        </div>

                        <div class="col-lg-9">

                            {{-- @if($newmatches)
                                @foreach ($newmatches as $profiles)

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
                            @endif --}}

                        </div>

                    </div>



                </div>
            </div>
    </section>
@endsection

