@extends('adminMaster')


@section('content')
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-picture text-center" style="background-image:url('images/big/bg.jpg')">
                    <div class="bg-picture-overlay"></div>
                    <div class="profile-info-name">
                        <img src="{{ asset($user->image_path) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                        <h3 class="text-white">{{ $user->name }}</h3>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <div class="row user-tabs">
            <div class="col-lg-6 col-md-9 col-sm-9">
                <ul class="nav nav-tabs tabs">
                    <li class="active tab">
                        <a href="#settings-1" data-toggle="tab" aria-expanded="false" class="active">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Contacts</span>
                        </a>
                    </li>
                    <div class="indicator"></div></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="tab-content profile-tab-content">
                    <div class="tab-pane active" id="settings-1">
                        <form method="post" action="{{ route('admin.saveModeration') }}">

                            {!! csrf_field() !!}
                            <div class="row">
                                <input type="hidden" value="{{ $user->id }}" name="id">

                                <div class="col-md-4">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Personal Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                                <strong>Full Name</strong>
                                                <br/>
                                                <input type="text" class="form-control" value="{{ $user->name }}" name="name"/>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Gender</strong>
                                                <br/>
                                                <select name="gender" class="form-control">
                                                    @if($user->gender == 'm')
                                                        <option value="m" selected>Male</option>
                                                        <option value="f">Female</option>
                                                    @elseif($user->gender == 'f')
                                                        <option value="f" selected>Female</option>
                                                        <option value="m" >Male</option>
                                                    @else
                                                        <option value="m" >Male</option>
                                                        <option value="m" >Female</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Date Of Birth</strong>
                                                <br/>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div><!-- input-group -->
                                            </div>

                                            <div class="about-info-p">
                                                <strong>Account Type</strong>
                                                <br/>
                                                <div class="input-group">
                                                   <select name="user_type_id" class="form-control">
                                                        @if($user->user_type_id == '4')
                                                            <option value="4" selected>Admin</option>
                                                            <option value="2">Natural User</option>
                                                        @else
                                                            <option value="2" selected>Natural User</option>
                                                            <option value="4">Admin</option>
                                                        @endif
                                                   </select>
                                                </div><!-- input-group -->
                                            </div>



                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>



                                <div class="col-md-4">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Social Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                                <strong>Facebooks</strong>
                                                <br/>
                                                <input type="text" class="form-control" value="{{ $user->facebook_page}}" name="facebook_page"/>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>twitter</strong>
                                                <br/>
                                                <input type="text" class="form-control" value="{{ $user->twitter_handle }}" name="twitter_handle"/>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Skype</strong>
                                                <br/>
                                                <input type="text" class="form-control" value="{{ $user->skype_id }}" name="skype_id"/>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Website</strong>
                                                <br/>
                                                <input type="text" class="form-control" value="{{ $user->website }}" name="website"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>


                                <div class="col-md-4">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Account Status</h3>
                                        </div>
                                        <div class="panel-body">
                                            <select name="is_active" class="form-control">
                                                @if($user->is_active == '1')
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">In Active</option>
                                                @elseif($user->is_active == '0')
                                                    <option value="0" selected>Inactive</option>
                                                    <option value="1" >Active</option>
                                                @else
                                                    <option value="2">Select Status</option>
                                                    <option value="1" >Active</option>
                                                    <option value="0" >Inactive</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Other Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                                <strong>Address</strong>
                                                <br/>
                                                <textarea name="address" class="form-control" cols="40" rows="5">{{ $user->address }}</textarea>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Mobile</strong>
                                                <br/>
                                                <input type="text" class="form-control" value="{{ $user->mobile }}" name="mobile"/>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Email</strong>
                                                <br/>
                                                <input type="text" class="form-control" value="{{ $user->email }}" name="email"/>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>
                                <button  class="btn btn-block btn-lg btn-primary waves-effect waves-light">Update Information</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- container -->
@endsection