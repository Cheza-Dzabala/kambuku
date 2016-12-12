@extends('adminMaster')
@section('css')
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
                                           <span class="panel-title"><h4>Mobile App Main Image
                                                  </h4>
                                               </span>
                            </a>

                        </li>
                    </ul>


                </div>
                <div class="panel-body">
                    <div class="row">
                        Current Image
                        @if(isset($currentImage))
                            <img src="{{ asset($currentImage->image_path) }}" style="border: 1px solid #000000; height: 200px; width: auto"/>
                        @endif

                        <form method="post" action="{{ route('admin.app.image.post') }}" style="padding-top: 5px"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-lg btn-success">
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

@section('scripts')
    <script src="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection