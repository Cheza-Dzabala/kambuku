/**
 * Created by cheza on 2/20/16.
 */
var socket = io('http://localhost:3000');
//  var socket = io('http://192.168.10.10:3000');
socket.on("test-channel:App\\Events\\TestEvent", function(message){
    // increase the power everytime we load test route
    alert(message.data.main_text);
});
