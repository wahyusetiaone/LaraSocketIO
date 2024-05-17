const app = require('express')();
const http = require('http').createServer(app);
const io = require('socket.io')(http, {
    cors: {
        origin: '*',
    }
});
const { createAdapter } = require('socket.io-redis');
const redis = require('redis');

// Create Redis client
const pubClient = redis.createClient();
const subClient = pubClient.duplicate();

// Configure Socket.IO with Redis adapter
io.adapter(createAdapter({ pubClient, subClient }));

io.on('connection', (socket) => {
    console.log('A user connected');

    // Event listeners for socket communication
    socket.on('disconnect', () => {
        console.log('User disconnected');
    });
});

// Listen for Laravel events in Redis
const redisClient = redis.createClient();
redisClient.subscribe('hotel-a-channel','hotel-b-channel','hotel-c-channel');

redisClient.on('message', (channel, message) => {
    const event = JSON.parse(message);
    console.log(`${channel} : ${event.room} => ${event.command}`)
    // forwarding to socket
    io.emit(channel, event);
});

http.listen(3000, () => {
    console.log('Socket.IO server running on port 3000');
});
