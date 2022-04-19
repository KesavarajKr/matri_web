@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section" style="background-image:url('assets/images/mask_group.png');background-size:cover;background-attachment:fixed">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">


            <div class="container">
                <div class="register-inner" >

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="height:500px">
                                <div class="card-header">
                                    <h3 class="text-center">User Name</h3>
                                  </div>

                                <div class="card-body" style="height:700px;overflow-y:scroll">
                                    <div class="alert alert-success" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>
                                      <div class="alert alert-warning" role="alert">
                                        A simple success alert—check it out!
                                      </div>

                                </div>
                                <div class="card-footer text-muted">
                                    <form method="POST" action="">
                                        <input type="text" name="userid" value="{{session('LoggedUser')}}">
                                        <input type="text" name="partnerid" value="{{}}">
                                        <input type="text" name="sendby" value="">

                                        <div class="input-group mb-3">
                                            <input type="text" name="sendmessage" class="form-control" placeholder="Enter Message" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" style="background-color: #6d1140;color:#fff" type="button" id="button-addon2">Send</button>
                                          </div>
                                    </form>
                                  </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Photo Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/photoprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/photoprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/photoprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="horoscopesetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Horoscope Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/horoscopeprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/horoscopeprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/horoscopeprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="contactprivacy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/contactprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/contactprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/contactprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="bioprivacy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Biography Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/bioprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/bioprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/bioprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="hideprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profile Hide</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/hideprofile">
                @csrf
                <input type="hidden" class="form-control" name="status" value="Hide">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">Hide</button>
              </form>
          <form method="POST" action="/hideprofile">
            @csrf
            <input type="hidden" class="form-control" name="status" value="View">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Show</button>
          </form>

        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/deleteprofile">
                @csrf
                <input type="hidden" class="form-control" name="status" value="Pending">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <textarea style="height: 250px" class="form-control" name="deletereason" required placeholder="Delete Reason"></textarea>
                <button type="submit" class="btn btn-primary mt-3" style="text-align:center;width:200px;background-color:#6d1140;border:0px">Send Request</button>
              </form>


        </div>

      </div>
    </div>
  </div>
