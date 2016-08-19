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
                    Edit Advert
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @if (Session::has('error'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            {!! Form::open(array('route'=>'admin.saveNewAd','method'=>'POST', 'files'=>true)) !!}
                            {!! csrf_field() !!}
                            <div class="row">
                                <h2>Client Details</h2>
                                <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="client_name" value="{{ $ad->client_name }}" required>

                                    @if ($errors->has('client_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('client_phoneNumber') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="client_phoneNumber"  value="{{ $ad->client_phonenumber }}" placeholder="Client Phone Number" required>

                                    @if ($errors->has('client_phoneNumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_phoneNumber') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('client_phonenumber2') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="client_phonenumber2" value="{{ $ad->client_phonenumber2 }}" placeholder="Client Phone Number 2 (Optional)">

                                    @if ($errors->has('client_phonenumber2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_phonenumber2') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('client_address') ? ' has-error' : '' }}  col-md-8">
                                    <textarea rows="10" name="client_address" class="form-control" placeholder="Client Address" required>{{ $ad->client_address }}</textarea>

                                    @if ($errors->has('client_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <h2>Ad Details</h2>

                                <div class="form-group{{ $errors->has('image_path') ? ' has-error' : '' }} col-md-8">

                                    {!! Form::label('image_path', 'Upload Ad (500KB Max)') !!}

                                    {!! Form::file('image_path', ['id'=>'image_path', 'class'=>'form-control']) !!}

                                    @if ($errors->has('image_path'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('ad_name') ? ' has-error' : '' }}  col-md-8">
                                    <input type="text" class="form-control" name="ad_name" value="{{ $ad->ad_name }}" placeholder="Advert Name" required>

                                    @if ($errors->has('ad_name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('ad_name') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}  col-md-8">
                                    <label for="page">Page:</label>
                                    <br/>


                                    @foreach($adPages as $page)
                                        <div>
                                            <input type="checkbox" name="{{ $page->page_name }}"> {{ $page->page_alias }}
                                        </div>
                                    @endforeach

                                </div>

                                @if ($errors->has('page'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('page') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('ad_type') ? ' has-error' : '' }}  col-md-8">
                                <label for="page">Ad Type:</label>
                                <select class="form-control" name="ad_type">
                                    @foreach($adTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_alias }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('ad_type'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('ad_type') }}</strong>
                                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_targeted') ? ' has-error' : '' }}  col-md-8">
                                <label for="is_targeted">Targeted:</label>
                                <select name="is_targeted" class="form-control" required>
                                    <option value="1">Targeted</option>
                                    <option value="0">Universal</option>
                                </select>
                                @if ($errors->has('is_targeted'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('is_targeted') }}</strong>
                                            </span>
                                @endif
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group{{ $errors->has('min_age') ? ' has-error' : '' }}  col-md-4">
                                    <input type="number" class="form-control" name="min_age" placeholder="Min Age (Optional)">
                                    @if ($errors->has('min_age'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('min_age') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('max_age') ? ' has-error' : '' }}  col-md-4">
                                    <input type="number" class="form-control" name="max_age" placeholder="Max Age (Optional)">
                                    @if ($errors->has('max_age'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('max_age') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="row col-md-12">

                                <div class="form-group{{ $errors->has('is_categoried') ? ' has-error' : '' }} col-md-12">
                                    <input type="checkbox" name="is_categoried" checked> Is Categorized
                                    @if ($errors->has('is_categoried'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('is_categoried') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-md-4">
                                    <select name="category_id" id="category_id" class="form-control" onchange="get_subcategory_admin()">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }} col-md-4">
                                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                                        <option>Select Sub Category</option>
                                    </select>
                                    @if ($errors->has('sub_category_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('sub_category_id') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="row col-md-12">
                                <div class="form-group{{ $errors->has('expiry_date') ? ' has-error' : '' }} col-md-4">
                                    <input name="expiry_date" type="date" class="form-control" required>
                                    @if ($errors->has('expiry_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('expiry_date') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}  col-md-4">
                                    <select name="is_active" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>

                                    @if ($errors->has('is_active'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('is_active') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('display_order') ? ' has-error' : '' }}  col-md-4">
                                <input type="number" class="form-control" name="display_order" placeholder="Display Order" required>
                                @if ($errors->has('display_order'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('display_order') }}</strong>
                                            </span>
                                @endif
                            </div>

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

    <script src="{{ URL::asset('admin/js/categorySwitcher.js') }}"></script>

    <script src="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection