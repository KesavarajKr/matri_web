@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section">

            <div class="container">
                <div class="register-inner">
                    <div class="row">
                        <div class="col-lg-3 align-items-center">
                            <div class="card profilebox">

                                    <div class="card-body">
                                        <ul class="matchesbtn">
                                            {{-- {{$varanid}} --}}
                                            <li ><a href="/premiummatches" class=""><img src="assets/images/premiummatches.png" class="img-fluid" style="width:25px"><span class="">Premium Matches</span></a></li>
                                            <li ><a href="/newmatches" class=""><img src="assets/images/newmatches.png" class="img-fluid" style="width:25px"><span class="">New Matches</span></a></li>
                                            <li ><a href="/mutualmatches" class=""><img src="assets/images/mutualmatches.png" class="img-fluid" style="width:25px"><span class="">Mutual Matches</span></a></li>
                                            <li><a href="" class=""><img src="assets/images/dailysuggesion.png" class="img-fluid" style="width:25px"><span class="">Daily Matches</span></a></li>
                                            <li ><a href="/locationmatches" class=""><img src="assets/images/locationmatches.png" class="img-fluid" style="width:25px"><span class="">Location Matches</span></a></li>
                                            <li class="activematches"><a href="/professionalmatches" class=""><img src="assets/images/professionalmatches.png" class="img-fluid" style="width:25px"><span class="">Professional Matches</span></a></li>
                                            <li><a href="/starmatches" class=""><img src="assets/images/star_matches.png" class="img-fluid" style="width:25px"><span class="">Star Matches</span></a></li>
                                            <li><a href="/educationmatches" ><img src="assets/images/educationmatches.png" class="img-fluid" style="width:25px"><span class="">Education Matches</span></a></li>
                                            <li><a href="/whoviewprofiles" class=""><img src="assets/images/whoviewedprofile.png" class="img-fluid" style="width:25px"><span class="">Who Viewed Profiles</span></a></li>
                                            <li><a href="/myviewedhistory" class=""><img src="assets/images/myviewedhistory.png" class="img-fluid" style="width:25px"><span class="">My Viewed History</span></a></li>
                                        </ul>

                                    </div>
                              </div>

                        </div>

                        <div class="col-lg-9">
                            @if($professionalmatches)
                                @foreach ($professionalmatches as $profiles)
                                <div class="matches-container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4 ">
                                                @if($profiles->imageview == '0')
                                                <div class="matchimg">
                                                    <img src="../images/{{$profiles->image_name}}" class="img-fluid">
                                                    </div>
                                                    @else
                                                    <div class="matchimg">
                                                        <img src="../assets/images/imagelocked.png" class="img-fluid">
                                                        </div>
                                                @endif

                                            </div>
                                            <div class="col-lg-8">
                                                <h3 class="profile-name">{{$profiles->Name}}<sub>{{$profiles->varan_id}}</sub></h3>
                                                @if($profiles->member_shiptype == 1)
                                                            <button class="btn btnpremium btn-sm" style="font-size:12px;color:#000;font-weight:bold;border:0px;border-radius:50px;background-image: linear-gradient(to right, #E2C887 0%, #E2C887 41%, #B98E44 100%) !important;"><i class="bi bi-patch-check-fill"></i>&nbsp;&nbsp;Premium</button>
                                                        @else

                                                    @endif
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
                                                <div class="col-lg-6">

                                                    @if($profiles->fav == 0)

                                                    <form method="POST" action="/addFavourite">
                                                        @csrf
                                                        <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                        <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                        <input type="hidden" name="status" value="liked">
                                                        <button type="submit" class="btn btn-default m-auto d-block"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Add to Favourite</span></button>
                                                    </form>
                                                    @else

                                                    <form method="POST" action="/addFavourite">
                                                        @csrf
                                                        <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                        <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                        <input type="hidden" name="status" value="liked">
                                                        <button type="submit" class="btn btn-default m-auto d-block"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Already in Favourite</span></button>
                                                    </form>
                                                @endif
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="{{route('bio.show',$profiles->id)}}" class="btn btn-default m-auto d-block"><img src="assets/images/viewprofile.png" style="width:30px" class="img-fluid"><span>View Profile</span></a>
                                                </div>
                                                {{-- <div class="col-lg-4">
                                                    <button class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Ignore</span></button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                        </div>

                    </div>



                </div>
            </div>
    </section>
@endsection

