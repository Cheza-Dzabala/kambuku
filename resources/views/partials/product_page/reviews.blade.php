<div class="col-sm-12">
    @if(isset($review))
    @foreach($review as $key => $value)
    <ul>
        <li><a><i class="fa fa-user"></i>{{ $value['name'] }}</a></li>
        <li><a><i class="fa fa-calendar-o"></i>{{ $value['created_at'] }}</a></li>
    </ul>
    <p>{{ $value['comment'] }}</p>
    @endforeach
    @endif
    <p><b>Write Your Review</b></p>
   @if(Auth::check())
    <form action="{{ route('new_review') }}" method="POST">
        {!! csrf_field() !!}
										<span>
											<input type="text" name="name" value="{{ Auth::user()->name }}"/>
											<input type="email" name="email" placeholder="Email Address" value="{{ Auth::user()->email }}"/>
										</span>
        <textarea name="comment" ></textarea>
        <input type="hidden" name="classified_id" value="{{ $classified_details->id }}">
        <b>Rating: </b> <img src="{{ asset('images/product-details/rating.png') }}" alt="" />

            @if(Auth::user()['id'] != $user_info->id)
                <button type="submit" class="btn btn-default pull-right">
                    Submit
                </button>
            @endif

    </form>
       @else
      <p>You need to be logged in to write reviews</p>
   @endif
   <script type="text/javascript">
       document.getElementById('count').innerHTML = "{{  $comment_count }}";
   </script>
</div>