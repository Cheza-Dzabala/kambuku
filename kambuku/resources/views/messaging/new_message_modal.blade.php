<!-- Modal -->
<div id="new_messageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #FF9D00; color: #fff">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Message</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('url'=>'/new_message','method'=>'POST')) !!}
                 {!! csrf_field() !!}
                <input type="hidden" value="{{ $user_info->id }}" name="receiver_id">
                <input type="hidden" value="{{ Auth::user()['id']}}" name="sender_id">

                <input type="text" placeholder="Subject" class="form-control" name="subject" style="margin-bottom: 5px;" required>

                <textarea rows="10" cols="10" name="body" class="form-control" placeholder="type your message here..." required></textarea>


            </div>
            <div class="modal-footer">
                <div class="col-md-8">
                    <small class="text-muted">
                        This message will be delivered to the listers kambuku inbox.
                        They will be notified of your mail and will respond in time.
                    </small>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-default" style="background-color: #FF9D00;
            color: #fff; margin-bottom: 8px;">
                        Send Message
                    </button>
                </div>

            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>


