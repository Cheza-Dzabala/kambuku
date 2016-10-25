@extends('adminMaster');
@section('title')
   Safety
    @endsection
    @section('content')
            <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
   <div class="row">
       <div class="col-md-12">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h3 class="panel-title">Guidelines</h3><a  data-toggle="modal" data-target="#newGuideModal" style="cursor: pointer">Create New Guide</a>
               </div>
               <div class="panel-body">
                   <div class="row">
                       <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="table-responsive">
                               <table class="table">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Guide</th>
                                       <th>Order</th>
                                       <th>Active Status</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($guides as $key => $value)
                                   <tr>
                                       <td></td>
                                       <td>{{ $value['guide'] }}</td>
                                       <td>{{ $value['order'] }}</td>
                                       <td>{{ $value['is_active'] }}</td>
                                       <td>
                                           <a href="#">
                                               <i class="fa fa-pencil-square fa-lg" style="cursor: pointer; color: lightskyblue"></i>&nbsp;
                                           </a>
                                           <a href="#">
                                               <i class="fa fa-trash fa-lg" style="cursor: pointer; color: red"></i>&nbsp;
                                           </a>
                                           <a href="#">
                                               <i class="fa fa-power-off fa-lg" style="cursor: pointer; color: darkslategrey"></i>&nbsp;
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
   </div> <!-- End row -->
   <div id="newGuideModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
       <div class="modal-dialog">

           <div class="modal-content p-0 b-0">
               <h5>New Category</h5>
               <form method="post" action="{{ route('admin.safety_guidelines.store') }}">
                   {!! csrf_field() !!}

                   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                       <input type="text" class="form-control" name="title" placeholder="Title" required>
                                          <span class="help-block">
                                            <small>
                                               Name Your Guide
                                            </small>
                                        </span>
                       @if ($errors->has('title'))
                           <span class="help-block">
                             <strong>{{ $errors->first('title') }}</strong>
                           </span>
                       @endif
                   </div>

                   <div class="form-group{{ $errors->has('guide') ? ' has-error' : '' }}">
                      <textarea class="form-control" rows="3" cols="10" name="guide" required></textarea>
                                        <span class="help-block">
                                            <small>
                                                This field is required, must be a text only field.
                                            </small>
                                        </span>
                       @if ($errors->has('guide'))
                           <span class="help-block">
                                            <strong>{{ $errors->first('guide') }}</strong>
                                        </span>
                       @endif
                   </div>
                   <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                       <input type="number" class="form-control" name="order" placeholder="Ordering" required>
                                          <span class="help-block">
                                            <small>
                                                This will determine in which order the guides will appear
                                              </small>
                                        </span>
                       @if ($errors->has('order'))
                           <span class="help-block">
                             <strong>{{ $errors->first('order') }}</strong>
                           </span>
                       @endif
                   </div>
                   <div class="checkbox checkbox-info checkbox-circle">
                       <input type="checkbox" name="is_active" checked>
                       <label for="is_active">
                           Set To Active?
                       </label>
                   </div>
                   <button type="submit" class="btn btn-info waves-effect waves-light w-md m-b-5">Create Guide</button>
               </form>
           </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

            <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection