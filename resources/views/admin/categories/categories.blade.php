@extends('adminMaster')
@section('css')
    <link href="{{ asset('public/dmin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <ul>
                                    <li class="dropdown" style="list-style: none">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                           <span class="panel-title"><h4>Categories
                                            <span class="caret"></span></h4>
                                               </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a data-toggle="modal" data-target="#newCategoryModal">New Category</a></li>
                                        </ul>
                                    </li>
                                </ul>


                            </div>
                            <div class="panel-body">
                                <div class="row">


                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Number Of Sub Categories</th>
                                                    <th>Display Order</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($categories_array as $key => $value)
                                                <tr>
                                                    <td>{{ $value['#']+1 }}</td>
                                                    <td>{{ $key }}</td>
                                                    <td>
                                                      <div class="col-lg-2">
                                                          {{ $value['subcategories'] }}
                                                      </div>
                                                        <div class="col-lg-8" >
                                                            <a href="{{ route('admin.subcategories', $value['category_id'])}}" >
                                                                Manage
                                                            </a>
                                                      </div>
                                                    </td>
                                                    <td>{{ $value['display_order'] }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.editcategory', [$value['category_id']]) }}">
                                                        <i class="fa fa-pencil-square fa-lg" style="cursor: pointer; color: lightskyblue"></i>&nbsp;
                                                        </a>

                                                        <a href="{{ route('admin.deletecategory', [$value['category_id']]) }}">
                                                            <i class="fa fa-trash fa-lg" style="cursor: pointer; color: red"></i>&nbsp;
                                                        </a>
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


        <div id="newCategoryModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">

                <div class="modal-content p-0 b-0">
                    <h5>New Category</h5>
                    <form method="post" action="{{ route('admin.postnewcategory') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
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
                            <input type="text" class="form-control" name="fa_icons" value="{{ old('fa_icons') }}" placeholder="fa icon code">
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
                        <div class="form-group{{ $errors->has('display_order') ? ' has-error' : '' }}">
                            <input type="number" class="form-control" name="display_order" value="{{ old('display_order') }}" placeholder="Display Orders">
                                          <span class="help-block">
                                            <small>
                                                Choose the order in which these categories should be displayed.
                                            </small>
                                        </span>
                            @if ($errors->has('display_order'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('display_order') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info waves-effect waves-light w-md m-b-5">Create</button>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>
    @if($errors)
        @if ($errors->has('name'))
            <script type="text/javascript">
                $('#newCategoryModal').modal('show');
            </script>
        @elseif($errors->has('fa_icons'))
            <script type="text/javascript">
                $('#newCategoryModal').modal('show');
            </script>
        @endif
    @endif

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection
