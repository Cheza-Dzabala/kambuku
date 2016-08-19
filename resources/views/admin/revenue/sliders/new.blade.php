@extends('adminMaster')
@section('css')
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
    @endsection

    @section('content')


            <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   New Slide
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           {!! Form::open(array('route'=>'admin.addNewSlide','method'=>'POST', 'files'=>true)) !!}
                                {!! csrf_field() !!}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="name" placeholder="Slide Name">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="client_name" placeholder="Client Name">

                                    @if ($errors->has('client_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('client_phoneNumber') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="client_phoneNumber" placeholder="Client Phone Number">

                                    @if ($errors->has('client_phoneNumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_phoneNumber') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="header" placeholder="Slide Heading">

                                    @if ($errors->has('header'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('header') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('sub_header') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="sub_header" placeholder="Slide Sub Heading">

                                    @if ($errors->has('sub_header'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_header') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('web_link') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="web_link" placeholder="Web Link">

                                    @if ($errors->has('web_link'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('web_link') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('facebook_link') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="facebook_link" placeholder="Facebook Link">

                                    @if ($errors->has('facebook_link'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('facebook_link') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('twitter_link') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="twitter_link" placeholder="Twitter Link">

                                    @if ($errors->has('twitter_link'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('twitter_link') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}  col-md-5">
                                    <input type="text" class="form-control" name="order" placeholder="Display Order">
                                    @if ($errors->has('order'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('order') }}</strong>
                                            </span>
                                    @endif
                                </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-8">

                                <textarea name="description" rows="10" class="form-control"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('image_path') ? ' has-error' : '' }} col-md-8">

                                    {!! Form::label('image_path', 'Upload Your Banner (500KB Max)') !!}

                                    {!! Form::file('image_path', ['id'=>'image_path', 'class'=>'form-control']) !!}

                                    @if ($errors->has('image_path'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>
                                    @endif
                                </div>


                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}  col-md-8">
                                <select name="is_active" class="form-control">
                                    <option>Select Active Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>

                                @if ($errors->has('is_active'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('is_active') }}</strong>
                                        </span>
                                @endif
                            </div>


                            <div class="form-group col-md-12">
                              <button class="btn btn-info col-md-6">Save</button>
                            </div>




                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End row -->

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection