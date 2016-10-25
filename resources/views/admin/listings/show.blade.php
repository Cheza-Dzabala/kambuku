@extends('adminMaster')
@section('css')
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet') }}" type="text/css" />
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
                            <span class="panel-title"><h4>{{ $listing->title }}</h4><small>Viewed {{ $listing->view_count }} times | Created On: {{ $listing->created_at }}</small></span>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="row">
                            <div class="panel-heading">
                                <div class="panel-title">Listers Details</div>
                            </div>
                            <div class="panel-body">
                                Name: {{ $user->name }}
                                <br/>
                                Email: {{ $user->email }}
                                <br/>
                                Phone Number: {{ $user->mobile }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel-heading">
                                <div class="panel-title">{{ $listing->title }} Details  ({{ $category->name }} - {{ $subcategory->name }})</div>
                            </div>
                            <div class="panel-body  col-md-8">
                                <form method="post" action="{{ route('admin.updateListing') }}">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="{{ $listing->title }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <textarea cols="10" rows="10" name="description" class="form-control">{{ $listing->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-6">
                                             <label for="category">Category</label>
                                        <select name="category_id" onchange="get_subcategory()" class="form-control" id="category">
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" @if($cat->id == $listing->category_id) selected @endif>{{  $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        </span>

                                        <span class="col-md-6">
                                             <label for="category">Sub Category</label>
                                        <select name="sub_category_id" class="form-control"id="subcategorylist">
                                            @foreach($subcategories as $subcat)
                                                <option value="{{ $subcat->id }}" @if($subcat->id == $listing->sub_category_id) selected @endif>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12" >

                                        @if($images != null)
                                            @foreach($images as $image)
                                                <div class="col-md-3">
                                                    <img name="images" src="{{ asset($image_path->value.$image->filename) }}" class="thumb" style="margin-bottom: 15px;">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="panel-footer">
                                        <div class="panel-title">
                                            <div class="form-group" style="margin-top: 5px">
                                                Actions: &nbsp;
                                                <input type="checkbox" name="is_active" @if($listing->is_active == 1) checked @endif> Active
                                                <input type="checkbox" name="is_featured" @if($listing->is_featured == 1) checked @endif> Featured
                                            </div>
                                        </div>

                                        <input type="hidden" value="{{ $listing->id }}" name="id">

                                        <input type="submit" class="btn btn-info">

                                    </div>
                                </form>
                            </div>
                        </div>
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
    <script src="{{ URL::asset('js/admin/categorySwitch.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection