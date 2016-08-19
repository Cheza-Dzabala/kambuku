
@foreach($conversations as $key => $value)

        <li style="padding-bottom: 25px;">
            <a style="cursor: pointer" onclick="load_conversation({{ $value['other_id'].','. $value['conversation_id'].','. Auth::user()['id'] }});">
                <span ><img src="{{ $value['image'] }}" width="30px" class="img-circle" style="border: #61ff38 3px solid" alt=""></span>
                <span class="pull-right badge" id="convo_{{ $value['conversation_id'] }}">
                        0
                </span>

                <span class="user-title">{{ $value['name'] }}</span>
                <p class="user-desc">RE: {{ $value['conversation_name']}}</p>
            </a>

        </li>

@endforeach

