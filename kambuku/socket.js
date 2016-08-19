/**
 * Created by cheza on 2/20/16.
 */


var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);


var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('test-channel', function(err, count) {
});

redis.subscribe('comment-channel', function(err, count){
});

redis.subscribe('message-channel', function(err, count){
});

redis.subscribe('online-channel', function(err, count){
});

redis.psubscribe('*', function(err, count) {
    //
});

redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});


http.listen(3000, function(){
    console.log('Listening on Port 3000');
});