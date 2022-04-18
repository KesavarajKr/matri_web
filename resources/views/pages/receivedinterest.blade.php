@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section" >

            <div class="container">
                <div class="register-inner">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                        @if($receivedinterest)
                        @foreach ($receivedinterest as $profiles)
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
                                        <div class="col-lg-3">

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
                                        <div class="col-lg-3">
                                            <a href="{{route('bio.show',$profiles->id)}}" class="btn btn-default"><img src="assets/images/viewprofile.png" style="width:30px" class="img-fluid"><span>View Profile</span></a>
                                        </div>

                                        <div class="col-lg-3">
                                            <form method="POST" action="/acceptinterest">
                                                @csrf
                                                <input type="hidden" name="userid" value="{{$profiles->varan_id}}">
                                                <button type="submit" class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Accept </span></button>
                                            </form>

                                        </div>
                                        <div class="col-lg-3">
                                            <form method="POST" action="/rejectinterest">
                                                @csrf
                                                <input type="hidden" name="userid" value="{{$profiles->varan_id}}">
                                                <button class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Reject</span></button>
                                            </form>

                                        </div>
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


