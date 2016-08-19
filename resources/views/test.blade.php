@extends('master')
@section('css')

@endsection
@section('content')


    <div class="panel-body">
        <a class="btn btn-info waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('info','top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Info</a>
        <a class="btn btn-success waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('success','top left','Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Success</a>
        <a class="btn btn-warning waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('warning','top left','Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Warning</a>
        <a class="btn btn-danger waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('error','top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Error</a>
        <a class="btn btn-inverse waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('black','top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Black</a>
        <a class="btn btn-default waves-effect" href="javascript:;" onclick="$.Notification.notify('white','top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">White</a>
    </div>
@endsection

@section('scripts')

    <script>



    </script>
@endsection
@section('jquery')
    <script>
        document.onload(
                $.Notification.notify('info','top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')
        )

    </script>
@endsection