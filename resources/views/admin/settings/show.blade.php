@extends('adminMaster')


@section('content')


    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-picture text-center" style="background-image:url('images/big/bg.jpg')">
                    <div class="bg-picture-overlay"></div>
                    <div class="profile-info-name">
                        <img src="{{ asset($user_details->image_path) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                        <h3 class="text-white">{{ $user_details->name }}</h3>
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
                    <li class="tab">
                        <a href="#settings-2" data-toggle="tab" aria-expanded="false" class="active">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Permissions</span>
                        </a>
                    </li>
                    <div class="indicator"></div></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="tab-content profile-tab-content">
                    <div class="tab-pane active" id="settings-1">
                        <form method="post" action="{{ route('admin.updateinfo') }}">

                            {!! csrf_field() !!}
                        <div class="row">

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
                                            <input type="text" class="form-control" value="{{ $user_details->name }}" name="name"/>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Gender</strong>
                                            <br/>
                                            <select name="gender" class="form-control">
                                                @if($user_details->gender == 'm')
                                                <option value="m" selected>Male</option>
                                                    <option value="f">Female</option>
                                                @elseif($user_details->gender == 'f')
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
                                                <input type="date" class="form-control" name="date_of_birth" value="{{ $user_details->date_of_birth }}">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
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
                                            <input type="text" class="form-control" value="{{ $user_details->facebook_name }}" name="facebook_name"/>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>twitter</strong>
                                            <br/>
                                            <input type="text" class="form-control" value="{{ $user_details->twitter_handle }}" name="twitter_handle"/>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Skype</strong>
                                            <br/>
                                            <input type="text" class="form-control" value="{{ $user_details->skype_id }}" name="skype_id"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->
                                </div>


                                <div class="col-md-4">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Your Statistics</h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach($stats as $key => $value)
                                        <div class="about-info-p">
                                            <strong>{{ $key }}</strong>
                                            <br/>
                                            <label class="form-control">{{ $value }}</label>
                                        </div>
                                        @endforeach
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
                                            <textarea name="address" class="form-control" cols="40" rows="5">{{ $user_details->address }}</textarea>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Mobile</strong>
                                            <br/>
                                            <input type="text" class="form-control" value="{{ $user_details->mobile }}" name="mobile"/>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Email</strong>
                                            <br/>
                                            <input type="text" class="form-control" value="{{ $user_details->email }}" name="email"/>
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
                <div class="tab-content profile-tab-content">
                    <div class="tab-pane active" id="settings-2">
                        <div class="row">
                            <div class="table-responsive col-md-8">
                                <h3>Permissions</h3>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pemission Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1?>
                                    @foreach($permissions as $key => $value)

                                    <tr>
                                        <td></td>
                                        <td>{{ $key }}</td>
                                        <td>{{ $value['description'] }}</td>
                                        <td>
                                            @if( $value['status']  == 'Authorized')
                                                <span class="label label-success">Authorized</span>
                                                @else
                                                <span class="label label-danger">Unauthorized</span>
                                            @endif
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection