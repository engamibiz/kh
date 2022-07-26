var app = require('express')();
var request = require('request');

// Local (No SSL)
var http = require('http');
var server = http.Server(app);
var serverPort = 3003;

// // Let's Encrypt SSL
// var fs = require('fs');
// var https = require('https');
// https.globalAgent.options.rejectUnauthorized = false; // Accept self-signed certificates
// var options = {
//     key: fs.readFileSync('/etc/letsencrypt/live/8worxcrm.com/privkey.pem'),
//     cert: fs.readFileSync('/etc/letsencrypt/live/8worxcrm.com/cert.pem'),
//     ca: fs.readFileSync('/etc/letsencrypt/live/8worxcrm.com/chain.pem'),
//     rejectUnauthorized: false,
//     transports: ['websocket'],
//     agent: https.globalAgent
// };
// var server = https.createServer(options, app);
// // process.env.NODE_TLS_REJECT_UNAUTHORIZED = '0'; // Accept self-signed certificates
// var serverPort = 2053;


// Setting Up Redis for event firing
var Redis = require('ioredis');
var redis = new Redis();

// Subscribe to general channel
redis.subscribe('test-channel', function(err, count) {
    console.log('Subscribed to test-channel');
});
// Emit redis messages
redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

// Subscribe to dynamic channel
redis.psubscribe('*', function(err, count) {});
// Emit redis messages
redis.on('pmessage', function(subscribed, channel, message) {
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

// // Let's Encrypt SSL
// io.set('origins', '*:*');

var io = require('socket.io')(server);
io.set('transports', ['websocket']);
server.listen(serverPort, function() {
    console.log('Listening on Port '+serverPort);
});


var mysql = require('mysql');

io.sockets.on('connection', function(socket) {
    console.log('==================================================================================');
    console.log('CLIENT CONNECTED');
    request.post(
        {
            url: 'http://' + socket.handshake.query.host + '/api/v1/socket/setConnectionId',
            form: {
                id: socket.handshake.query.id,
                connection_id: socket.id
            }
        },
        function(err, httpResponse, body){
            console.log('RESPONSE:', body);
            console.log('SET CONNECTION ID ERROR:', err);
            // If resposne is success and there are online parents, notify the online parents
            body = JSON.parse(body);
            if (body && body.status === true && body.data.user && body.data.connection_ids.length) {
                for (var i = 0; i < body.data.connection_ids.length; i++) {
                    io.sockets.to(body.data.connection_ids[i]).emit("user_connected", JSON.stringify({username: body.data.user.username}));
                }
            }
        }
    );
    console.log('==================================================================================');

    io.use(function (socket, next) {
      var handshake = socket.handshake;
      next();
    });

    /************************************************************************************
     * On Disconnect
     ************************************************************************************/
    socket.on('disconnect', function() {
        setTimeout(function () {
            console.log('==================================================================================');
            console.log('CLIENT DISCONNECTED');
            request.post(
                {
                    url: 'http://' + socket.handshake.query.host + '/api/v1/socket/unsetConnectionId',
                    form: {
                        connection_id: socket.id
                    }
                },
                function(err, httpResponse, body){
                    console.log('RESPONSE:', body);
                    console.log('UNSET CONNECTION ID ERROR:', err);
                    // If resposne is success and there are online parents, notify the online parents
                    body = JSON.parse(body);
                    if (body && body.status === true && body.data.user && body.data.connection_ids.length) {
                        for (var i = 0; i < body.data.connection_ids.length; i++) {
                            io.sockets.to(body.data.connection_ids[i]).emit("user_disconnected", JSON.stringify({username: body.data.user.username}));
                        }
                    }
                }
            );
            console.log('==================================================================================');
        }, 10000);
    });
});
