@extends('adminMaster');

@section('content')

        <!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Edit {{ $subcategory->name }}</h3></div>
            <div class="panel-body">
                <form method="post" action="{{ route('admin.updatesubcategory') }}">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}">
                                        <span class="help-block">
                                            <small>
                                                This field is required, must be a text only field.
                                            </small>
                                        </span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('fa_icons') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="fa_icons" value="{{ $subcategory->fa_icons }}">
                                          <span class="help-block">
                                            <small>
                                                Please add a corresponding font awesome icon for the new subcategory. You can choose from the font awesome library
                                                <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Here.</a>
                                            </small>
                                        </span>
                        @if ($errors->has('fa_icons'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('fa_icons') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <input type="hidden" name="subcategory_id" value="{{ $subcategory->id }}">
                    <button type="submit" class="btn btn-info waves-effect waves-light w-md m-b-5">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>



</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
@endsection