@extends('adminMaster')
@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" />
    <link href="{{ asset('admin/assets/summernote/summernote.css" rel="stylesheet') }}" />
    @endsection

    @section('content')
            <!-- ============================================================== -->
    <!-- Start right Content here -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">.
                <form method="post" action="{{ route('admin.contentSave') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" value="{{ $page->id }}" name="contentPage_id">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">{{ $page->title }}</h3></div>
                            <div class="panel-body">
                                <textarea class="summernote" rows="9" name="content"></textarea>


                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info">
                </form>
            </div> <!-- End row -->
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection

@section('scripts')


    <script type="text/javascript" src="{{ URL::asset('admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/summernote/summernote.min.js') }}"></script>



    <script type="text/javascript">

        jQuery(document).ready(function(){
            $('.wysihtml5').wysihtml5();

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });

        });

    </script>


@endsection