@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
@section('title')
    Messages
@endsection

@section('middle_header')
    @include('partials.middle_header')
@endsection

@section('bottom_header')
    @include('partials.bottom_header')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <input type="hidden" value="{{ Auth::id() }}" id="current_user">
            <input type="hidden" value="{{ Auth::user()['name'] }}" id="current_user_name">
            <div class="message-container">
                <div class="message-north">
                    <ul class="message-user-list">
                        @include('partials.messaging.active_chats')
                    </ul>


                        <div class="message-thread" id="conversation_list">


                        </div>


                </div>
                <div class="message-south">
                    <form method="post" action="{{ url('/send_message') }}" name="sendForm" id="sendForm"/>
                        <textarea cols="20" rows="3" name="body" id="sendBody" class="sendForm"></textarea>
                        <input type="hidden" name="receiver_id" value="" id="receiver_id"/>
                        <input type="hidden" name="sender_id" value="" id="sender_id"/>
                        <input type="hidden" name="conversation_id" value="" id="conversation_id"/>
                        <button type="submit" class="form-control send_message">Send</button>
                    </form>
                </div>
            </div>
            </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        auth_user_id = document.getElementById('current_user').value;
      //  alert(auth_user_id);
        var frm = $('#sendForm');
        frm.submit(function (ev) {
          //  document.getElementById('chat').innerHTML += '<tr> Me:'+document.getElementById('body').value+'</tr><br/>';
            $.ajax({
                type: frm.attr('method'),
                url: main_link+'api/send_message/',
                data: frm.serialize(),
                success: function (data) {
                    var chat_section =  document.getElementById('conversation_list');
                    var main_div = document.createElement("div")
                    main_div.className = "message bubble-right";
                    var main_label = document.createElement('LABEL');
                    main_label.className = 'message-user';
                    var time_label = document.createElement('LABEL');
                    time_label.className = 'message-timestamp';
                    time_label.innerHTML = '2 hours Ago';
                    var main_text = document.createElement("P");
                    //image.setAttribute("src", item.image_path);
                    main_text.innerHTML = document.getElementById('sendBody').value;
                    main_label.innerHTML = document.getElementById('current_user_name').value;
                    //  avatar_div.appendChild(image);
                    //   avatar_div.appendChild(info);
                    main_div.appendChild(main_label);
                    main_div.appendChild(time_label);
                    main_div.appendChild(main_text);
                    chat_section.appendChild(main_div);
                    //alert(item.conversation_id);
                    document.getElementById('sendBody').value = "";
                    console.log(data);
                    $('#conversation_list').animate({
                        scrollTop: $('#conversation_list').get(0).scrollHeight}, 2000);
                },
                error: function(data){
                    alert('error');
                }
            });

            ev.preventDefault();
        });


        function load_conversation($sender_id, $conversation_id, $user_id){
            var chat_section =  document.getElementById('conversation_list');
            current_conversation = $conversation_id;
           chat_section.innerHTML = '';

            var spinner_container = document.createElement('div');
                spinner_container.style = 'margin-top: 30%; margin-left: 45%';
            var spinner_element = document.createElement('i');
                spinner_element.className = 'fa fa-spinner fa-spin fa-4x';

            spinner_container.appendChild(spinner_element);
            chat_section.appendChild(spinner_container);

            //alert($sender_id+' '+$conversation_id);
            $.ajax({
                type: 'POST',
                url: main_link+'api/messages/',
                dataType: 'json',
                data: {sender_id: $sender_id, conversation_id: $conversation_id, user_id: $user_id},
                success: function (data, status){
                    chat_section.innerHTML = '';
                    console.log(data);
                    document.getElementById('sender_id').value = $user_id;
                    document.getElementById('receiver_id').value = $sender_id;
                    document.getElementById('conversation_id').value = $conversation_id;
                    $.each(data, function(i, item){
                    var main_div = document.createElement("div")
                        if(item.sender_id == $user_id)
                        {
                            main_div.className = "message bubble-right";
                        }else{
                            main_div.className = "message bubble-left";
                        }

                   var main_label = document.createElement('LABEL');
                        main_label.className = 'message-user';
                   var time_label = document.createElement('LABEL');
                        time_label.className = 'message-timestamp';
                        time_label.innerHTML = '2 hours Ago';
                    var main_text = document.createElement("P");
                        //image.setAttribute("src", item.image_path);
                        main_text.innerHTML = item.body;
                        main_label.innerHTML = item.name;
                      //  avatar_div.appendChild(image);
                     //   avatar_div.appendChild(info);
                        main_div.appendChild(main_label);
                        main_div.appendChild(time_label);
                        main_div.appendChild(main_text);
                        chat_section.appendChild(main_div);
                        //alert(item.conversation_id);


                        });

                         $('#conversation_list').animate({
                        scrollTop: $('#conversation_list').get(0).scrollHeight}, 2000);

                    var new_msg =  document.getElementById('convo_'+$conversation_id);
                    new_msg.setAttribute('style','');
                    new_msg.innerHTML = 0;

                },
                error: function (data){
                    chat_section.innerHTML = '';
                    chat_section.innerHTML = 'Could not load your message at this time.'
                    console.log(data);
                    alert('error');
                }
            });
        }
    </script>
    <script>
        socket.on("message-channel:App\\Events\\NewMessage", function(message){
            var chat_section =  document.getElementById('conversation_list');
            if (message.data.human_target == auth_user_id)
            {

              if (current_conversation == message.data.conversation_id)
              {
                  var main_div = document.createElement("div");
                      main_div.className = "message bubble-left";

                  var main_label = document.createElement('LABEL');
                  main_label.className = 'message-user';
                  var time_label = document.createElement('LABEL');
                  time_label.className = 'message-timestamp';
                  time_label.innerHTML = '2 hours Ago';
                  var main_text = document.createElement("P");
                  //image.setAttribute("src", item.image_path);
                  main_text.innerHTML = message.data.message_body;
                  main_label.innerHTML = message.data.sender_name;
                  //  avatar_div.appendChild(image);
                  //   avatar_div.appendChild(info);
                  main_div.appendChild(main_label);
                  main_div.appendChild(time_label);
                  main_div.appendChild(main_text);
                  chat_section.appendChild(main_div);
                  //alert(item.conversation_id);
                    $('#conversation_list').animate({
                      scrollTop: $('#conversation_list').get(0).scrollHeight}, 2000);
              }else{
                 var new_msg =  document.getElementById('convo_'+message.data.conversation_id);
                  new_msg.setAttribute('style','background-color: #2ca02c');
                 new_msg.innerHTML = parseInt(new_msg.innerHTML)+1;
              }
            }
        });

    </script>
@endsection

@section('footer')
    @include('partials.footer')
@endsection