const io = require('socket.io')(4000, { origins: '*:*'});

io.on('connection', function (client) {

    console.log('a user connected');

  console.log('client connected...', client.id);

  client.on('disconnect', function () {
    console.log('client disconnect...', client.id);
  })

  client.on('error', function (err) {
    console.log('received error from client:', client.id);
    console.log(err);
  })

      client.on("chat", function (data) {
        io.sockets.emit("chat", data);
    });

	client.on("message", function (data) {
        io.sockets.emit("message", data);
    });

    client.on("typing", function (data) {
        io.broadcast.emit("typing", data)
    });
});
